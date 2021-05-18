<?php 
class BannerModel extends Model{
	public $table = 'yoho_banner';
	// 自动验证
	public $validate = array(
		// array('pic', 'nonull', '图片不可为空', 2,3),
	);
	// 自动完成
	public $auto = array(
		// pic
		array('pic','_pic','method',2,3)
	);

	public function _pic(){
		//执行上传
		$upload = new Upload();
		$file = $upload->upload();
		// // 判断有没有上传
		if($file){
			$info = $file[0]['path'];
			return $info;
		}else{
			if($pich = Q('post.pic')) return $pich;
		}
	}

	// 新增数据
	public function add_data(){
		// 自动执行验证  必须使用create方法 并且验证规则的数组变量名必须是$validate
		if(!$this->create()) return false;
		return $this->add();
	}

	// 编辑数据
	public function edit_data(){
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

	/**
	 * 获得所有数据(前台调数据使用)
	 */
	public function get_all_banner($where=NULL){		
		$data = $this->order('sort ASC')->where($where)->all();
		return $data;
	}
}