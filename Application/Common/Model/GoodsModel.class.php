<?php 
class GoodsModel extends Model{
	public $table = 'yoho_goods';
	public $pics; //内容页上传图片
	// 自动验证
	public $validate = array(
		array('name', 'nonull', '名称不可为空', 2,3),
	);
	// 自动完成
	public $auto = array(
		array('addtime','time','function',1,3),
		// array('flag','cFlag','method',1,3),
		array('indexpic','cIndexPic','method',2,3),
		array('listpic','cListPic','method',2,3)
	);

	public function cIndexPic($pic){
		if(!empty($_FILES['indexpic']['name'])){
			if(isset($_POST['indexPic'])) @unlink($_POST['indexPic']);
			$u = new Upload();
			$info = $u->upload('indexpic');
			return $info[0]['path'];
		}
	}

	public function cListPic($pic){
		if(!empty($_FILES['listpic']['name'])){
			if(isset($_POST['listPic'])) @unlink($_POST['listPic']);
			$u = new Upload();
			$info = $u->upload('listpic');
			return $info[0]['path'];
		}
	}
	public function add_data(){
		// if(!$this->create()) return false;
		// return $this->add();
		if($this->create()){
			$this->cPic();
			$good_id = $this->add();
			if($good_id){
				$this->addContPic($good_id); //添加内容页图片
				$this->addGoodsAttr($good_id); //添加商品属性
				$this->addStock($good_id); //添加库存
				return $good_id;
			}else{
				$this->error='添加商品失败';
				return false;
			}
			return false;
		}
	}



	//内容页图处理，删除旧图片，上传新图片
	private function cPic(){
		if(!empty($_FILES['pic']['name'])){
			if(isset($_POST['pic'])) @unlink($_POST['pic']);
			$u = new Upload();
			$info = $u->upload('pic');
			$this->pics = $info;
		}
	}


	//添加内容页图片，生成缩略图，并删除原图片
	private function addContPic($good_id){
		if($this->pics){
			$pd = M('yoho_goods_detail');
			$intro = Q('post.intro');
			$service = Q('post.service');
			$i = new Image();
			foreach ($this->pics as $v) {
				$big = $v['dir'].$v['filename'].'_420x560.'.$v['ext'];
				$medium = $v['dir'].$v['filename'].'_235x314.'.$v['ext'];
				$small = $v['dir'].$v['filename'].'_75x100.'.$v['ext'];
				$i->thumb($v['path'],$big,800,800);
				$i->thumb($v['path'],$medium,350,350);
				$i->thumb($v['path'],$small,50,50);
				// @unlink(__ROOT__. '/' .$v['path']);
				$pd->add(array('big_pic'=>$big,'small_pic'=>$small,'mid_pic'=>$medium,'intro'=>$intro,'service'=>$service,'good_id'=>$good_id));
			}
		}
	}

	//添加商品属性
	private function addGoodsAttr($good_id,$attrValue=null){
		$db = M('yoho_goods_attr');
		is_null($attrValue)?$attr=$_POST['attr']:$attr=$attrValue;
		$cid = Q('category_id',0,'intval');
		foreach ($attr as $k => $v) {
			$data['cid']=$cid;
			$data['good_id']=$good_id;
			//组合input,textarea
			if(strchr($k,'|')){
				$info = explode('|',$k);
				$data['taid']=$info[1];
				$data['avalue']=$v;
			}else{
				//组合select,radio,checkbox
				$info = explode('|',$v);
				$data['taid']=$info[0];
				$data['avalue']=$info[1];
			}
			$db->add($data);
		}
	}


	//添加库存
	public function addStock($good_id,$s=null){
		$db=M('yoho_stock');
		$saDb=M('yoho_stock_attr');
		//第二个参数为编辑，先清空后插入数据
		$db->where('good_id='.$good_id)->del();
		if($s){
			$saDb->where('good_id='.$good_id)->del();
		}
		$specData['good_id']=$good_id;
		$spec = isset($_POST['spec'])?$_POST['spec']:false;
		//组合库存表数据
		if($spec){
			foreach($spec['stock'] as $k => $v){
				if(isset($spec['stid'][$k])){
					$specData['stid']=$spec['stid'][$k];
				}else{
					$specData['stid']=null;
				}
				$specData['stock'] = $spec['stock'][$k];
				$specData['price'] = $spec['price'][$k];
				$specData['goods_sn'] = $spec['goods_sn'][$k];
				//写入库存表
				// p($specData);
				$stid = $db->add($specData);
				if($stid){
					//组合库存值表数据
					$cid = Q('category_id',0,'intval');
					// $total = count($spec['stock']);
					foreach ($spec['attr'] as $key => $value) {
						// $info = explode('|', $spec['attr'][$key][$k]);
						$info = explode('|', $value[$k]);
						$stData['stid']=$stid;
						$stData['good_id']=$good_id;
						$stData['cid']=$cid;
						$stData['taid']=$info[0];
						//写入库存值表
						$saDb->add($stData);
					}	
				}
			}
			//组合商品属性表数据
			foreach ($spec['attr'] as $v) {
				foreach ($v as $key => $value) {
					//去除重复
					$info = explode('|', $value);
					$attr[$info[0]]=$value;
				}
			}
			//同时将规格写入商品属性表
			$this->addGoodsAttr($good_id,$attr);
		}else{
			//没有规格情况下写入库存表
			$storckData['good_id'] = $good_id;
			$storckData['stock'] = $_POST['stock'];
			$storckData['price'] = $_POST['price'];
			$storckData['goods_sn'] = $_POST['goods_sn'];
			$db->add($storckData);
		}
		//修改原商品的价格与库存
		$data['price'] = M('yoho_stock')->where("good_id=$good_id")->order('price ASC')->getField('price');
		$data['stock'] = M('yoho_stock')->where("good_id=$good_id")->sum('stock');
		M('yoho_goods')->where("good_id=$good_id")->save($data);
	}







	// 获得一条数据  通过 find 操作进行简单的单条查询操作 返回值是布尔值
	public function get_one_data($where=null, $field=null){
		return $this->where($where)->field($field)->find();
	}

	/**
	 * 获得所有数据
	 */
	public function get_all_data($where=NULL){		
		$pageObj = new Page($this->where($where)->count(),10,3);
		$data = $this->where($where)->limit($pageObj->limit())->all();
		$data['page'] = $pageObj->show();
		
		return $data;
	}

}