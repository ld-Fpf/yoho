<?php 
class BrandModel extends Model{
	public $table = 'yoho_brand';
	// 自动验证
	public $validate = array(
		array('name', 'nonull', '名称不可为空', 2,3),
	);
	// 自动完成
	public $auto = array(
		// logo
		array('logo','_logo','method',2,3)
	);

	public function _logo(){
		//执行上传
		$upload = new Upload();
		$file = $upload->upload();
		// // 判断有没有上传
		if($file){
			$info = $file[0]['path'];
			return $info;
		}else{
			if($logoh = Q('post.logo')) return $logoh;
		}
	}

	// 新增数据
	public function add_data(){
		// 判断分类名是否重复  重复返回false
		$name = Q('post.name');
		// p($this->get_one_data(array('cname' => $cname)));die;
		if($this->get_one_data(array('name' => $name))){
			$this->error = '该名称已经存在';
			return false;
		}

		// 自动执行验证  必须使用create方法 并且验证规则的数组变量名必须是$validate
		if(!$this->create()) return false;
		return $this->add();
	}

	// 编辑数据
	public function edit_data(){
		// 判断标签名是否重复  重复返回false
		$name = Q('post.name');
		$bid = Q('post.brand_id');
		// p($this->get_one_data(array('name' => $name)));die;
		// 设置下面即将查询的where数组条件
		// 两个条件合在一起表示 获取name的名称 并且此品牌跟要修改的品牌的bid不相等的那个bid
		$where['name']=$name;
		$where['brand_id'] = array('neq', $bid);
		if($this->get_one_data($where)){
			$this->error = $name . '名称已经存在';
			return false;
		}
		// 自动验证
		if(!$this->create()) return false;
		return $this->save();
	}

	// 删除数据
	public function del_data(){
		// 执行直接del函数
		$bid = Q('get.bid', 0, 'intval');
		return $this->del($bid);
	}

	// 获得一条数据  通过 find 操作进行简单的单条查询操作 返回值是布尔值
	public function get_one_data($where=null, $field=null){
		return $this->where($where)->field($field)->find();
	}


	// /**
	//  * 获得所有数据
	//  * @param $where where条件
	//  */
	// public function get_all_data($where=NULL){
	// 	return $this->where($where)->all();
	// }

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