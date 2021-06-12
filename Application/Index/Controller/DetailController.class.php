<?php
//测试控制器类
class DetailController extends CommonController{
    public function __init(){
        $this-> banner();
    }
    
    public function index(){
        $gid=Q('gid', 0, 'intval');
        $cid = Q('cid', 0, 'intval');
        // $categoryCache=cache('categoryCache');
        $cate = K('Category')->get_all_data();
        // p($cate);die;
        // $goodsTypeCache=cache('goodsTypeCache');
        $cname = K('Category')->get_one_data(array('category_id'=>$cid));
        $this->assign('cname', $cname['name']);
        $goodsType = K('Type')->get_all_data();
        $goods=M('yoho_goods')->find($gid);
        $this->assign('goods', $goods);
        $bname = K('Brand')->get_one_data(array('brand_id'=>$goods['brand_id']));
        $this->assign('bname', $bname['name']);
        // p($goods);die;
        $tid=$cate[$goods['category_id']]['type_id'];
        // p($tid);die;
        // $pre = C('DB_PREFIX');
        //分配商品规格
        $attrClass=M('yoho_type_attr')->where('attr_type=1')->all("type_id=$tid");
        // p($attrClass);die;
        foreach ($attrClass as $k => $v) {
            $sql="SELECT ga.avalue,ga.taid FROM yoho_attr_value AS av 
                    JOIN yoho_goods_attr AS ga ON av.avid=ga.taid 
                    WHERE ga.good_id={$gid} AND av.taid={$v['taid']}
                    ";
                    // echo $sql;die;
            $attrClass[$k]['_val']=M()->query($sql);
        }
        // p($attrClass);die;
        //判断是否第一次加载
        $avid=Q('avid');
        if($avid){ //此时avid格式为   3_12格式
            $stid=$this->getStock($gid,$avid);
            if($stid){
                $stock=M('yoho_stock')->where("good_id=$gid")->find($stid);
                $stVal=explode('_', $avid);
            }else{
                $stVal=explode('_', $avid);
            }
        }else{ //第一次加载，就分配avid.取库存表第一条数据，让其商品规格默认选中一个属性
            $stock=M('yoho_stock')->find("good_id=$gid");
            //获取当前商品第一条库存属性值id
            $stVal=M('yoho_stock_attr')->where("stid={$stock['stid']}")->getField('taid',true);
        }
        //查询商品图片
        $pic=M('yoho_goods_detail')->where("good_id=$gid")->all();
        // p($pic);die;
        //查找面包屑
        // $tips = Category::getParents($categoryCache,$goods['cid']);
        // p($tips);
        //分配面包屑
        // $this->tips=$tips;
        //分配产品图片
        $this->assign('pic', $pic);
        //分配产品
        // p($pic);die;
        $this->assign('field', array_merge($goods,$stock));
        //分配属性
        $this->assign('attrClass', $attrClass);
        //分配属性默认选中
        $this->assign('stVal', $stVal);

        // p($goods);

       $this->display();
    }



    /**
     * 根据gid,avid属性获得库存ID
     * @param  [type] $gid  [description]
     * @param  [type] $avid [3_12或者array()]
     * @return [type]       [description]
     */
    public function getStock($gid,$avid=array()){
        if(strstr($avid, '_')){
            $avid=explode('_', $avid);
        }else{
            if(!is_array($avid)) return false;
        }
        //组合SQL语句
        // select * from yoho_stock_attr as a0 join yoho_stock_attr as a1
        // ON a0.stid = a1.stid
        // WHERE a0.avid=6 AND a1.avid=13
        // AND a0.gid=1
        $JOIN='';$ON=' ON ';$WHERE=' WHERE ';
        foreach ($avid as $k => $v) {
            $JOIN.=' JOIN yoho_stock_attr AS a'.$k;
            $WHERE.='a'.$k.'.avid='.$v.' AND ';
        }
        $JOIN=substr($JOIN,5);
        for($i=0;$i<count($avid)-1;$i++){
            $ON.='a'.$i.'.stid=a'.($i+1).'.stid AND ';
        }
        $ON=substr($ON,0,-4);
        $WHERE.='a0.good_id='.$gid;
        $SQL="SELECT a0.stid FROM ".$JOIN.$ON.$WHERE;
        // 根据avid自关联stock_attr表查询是否有商品
        $re = M()->query($SQL);
        //返回库存id
        return $re?$re[0]['stid']:null;
    }

}
