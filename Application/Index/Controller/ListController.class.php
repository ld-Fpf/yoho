<?php
//测试控制器类
class ListController extends CommonController{
    public function __init(){
        $this-> banner();
    }
    
    public function index(){
        $cid = Q('cid',0,'intval');
        // $cate=cache('cate');
        $cate = K('Category')->get_all_data();
        // 左侧大分类
        $lcate = K('Category')->where(array('pid'=>0))->all();
        // p($cate);die;
        $this->assign('lcate', $lcate);
        $cname = K('Category')->get_one_data(array('category_id'=>$cid));
        $this->assign('cname', $cname['name']);
        //如果不是正常进入，返回首页
        if(!isset($cate[$cid])) go(__ROOT__);
        //如果参数没有s变量生成此变量
        if(!Q('get.s')){ //生成 0-0-0-0-0-0
            $tid=$cate[$cid]['type_id'];
            $totalAttrClass=M('yoho_type_attr')->where('type_id='.$tid)->count();
            $attrUrl='';
            for($i=0;$i<$totalAttrClass;$i++){
                $attrUrl.='-0';
            }
            $attrUrl=substr($attrUrl, 1);
            go(U('List/index',array('cid'=>$cid,'s'=>$attrUrl)));
        }
        //分配左侧栏目属性
        // $category = M('yoho_category')->where('category_id='.$cid)->find();
        // $this->assign('category', $category);
        // $cates = M('yoho_category')->all();
        // $this->cate = Category::getChildsAll($cates,$category['category_id']);
        // $this->cate = M('category')->where('gtid='.$category['gtid'])->all();
        //分配商品列表
        $this->assignGoods($cid);
        //查找面包屑
        // $tips = Category::getParents($cate,$cid);
        // $cids = $this->_get_son_id($cid);
        // p($cids);die;
        //分配面包屑
        // $this->assign('cids', $cids);
        //分配搜索属性
        $this->assignSerachAttr($cid);
       $this->display();
    }

    //分配搜索属性
    public function assignSerachAttr($cid){
        //$categoryCache=cache('categoryCache'); //栏目
        $cate = K('Category')->get_all_data();
        //$goodsTypeCache=cache('goodsType');     //商品类型
        $goodsType = K('Type')->get_all_data();
        $tid=$cate[$cid]['type_id'];
        $attrClass=M('yoho_type_attr')->where('type_id='.$tid)->all(); //查询类型
        // p($attrClass);die;
        foreach ($attrClass as $k => $v) {  //组合
            $attrClass[$k]['attrValue']=M('yoho_attr_value')->where('taid='.$v['taid'])->all();
            // p($attrClass[$k]['attrValue']);
        }
        $this->assign('attrClass', $attrClass);
    }

    //分配商品
    public function assignGoods($cid){
        // print_const();
        $order = isset($_GET['order'])?'price ASC':'addtime DESC';
        $s=explode('-',Q('s'));
        //移除属性为0的值
        $arr=array();
        foreach ($s as $k => $v) {
            if($v==0) continue;
            $arr[]=$v;
        }
        if($arr){ //组合sql语句，查询属性值并分配
            $this->handleSql($arr,$cid);
        }else{
            $page=new page(M('yoho_goods')->where('category_id='.$cid)->count(),20);
            $res = M('yoho_goods')->limit($page->limit())->where('category_id='.$cid)->order($order)->all();
            if(empty($res)) go(__ROOT__);
            foreach($res as $key=>$value){
                $bname = K('Brand')->get_one_data(array('brand_id'=>$value['brand_id']));
                $value['bname'] = $bname['name'];
                $data[] = $value;
            }
            $this->page=$page->show(2);
            $this->assign('goods', $data);
        }
    }


        private function handleSql($arr,$cid=0){
        $table='yoho_goods_attr';
        $JOIN='';$ON=' ON ';$WHERE=' WHERE ';
        foreach ($arr as $k => $v) {
            $JOIN.=' JOIN '.$table.' AS a'.$k;
            $WHERE.='a'.$k.'.taid='.$v.' AND ';
        }
        for($i=0;$i<count($arr)-1;$i++){
            $ON.='a'.$i.'.good_id=a'.($i+1).'.good_id AND ';
        }
        $ON.='g.good_id=a0.good_id';
        $WHERE.='g.category_id='.$cid;
        //获取所有数据用于分页
        $count=M()->query("SELECT count(*) AS c FROM yoho_goods AS g ".$JOIN.$ON.$WHERE);
        $page=new page($count[0]['c'],20);
        $sql = "SELECT * FROM yoho_goods AS g ".$JOIN.$ON.$WHERE.' LIMIT '.$page->limit(1);
        $data=M()->query($sql);

        $this->page=$page->show(2);
        $this->goods=$data;
    }



    /**
     * 获得所有子集分类cid
     */
    private function _get_son_id($cid){
        $data = M('yoho_category')->all();
        $cids = $this->_get_son($data,$cid);
        $cids[] = $cid;
        return $cids;
    }

    private function _get_son($data,$cid){
        $temp = array();
        foreach ($data as $k => $v) {
            if($v['pid'] == $cid){
                $temp[] = $v['cid'];
                $temp = array_merge($temp,$this->_get_son($data,$v['cid']));
            }
        }

        return $temp;
    }


    /**
     * ajax获得子集分类id
     */
    public function ajax_get_son(){
        if(!IS_AJAX) $this->error('非法请求');
        $sonId = K('Category')->get_son_data(Q('post.cid',0,'intval'));
        //给js返回json数据
        $this->ajax($sonId);
    }

    
}
