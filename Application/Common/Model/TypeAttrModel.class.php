<?php 
class TypeAttrModel extends Model{
	public $table = 'yoho_type_attr';
	// 自动验证
	public $validate = array(
		array('title', 'nonull', '属性名称不可为空', 2,3),
	);

	// 新增数据
	public function add_data(){
		if(!$this->create()) return false;
		return $this->add();
	}

	// 编辑数据
	public function edit_data(){
		if(!$this->create()) return false;
		return $this->save();
	}

	// 删除数据
	public function del_data(){
		// 执行直接del函数
		$taid = Q('get.taid', 0, 'intval');
		return $this->del($taid);
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




	// ===============================================
	//根据show_type的值插入属性值
	private function input($id,$d){
		$db = M('yoho_attr_value');
		$data = array(
			'acid'=>$id,
			'attr_value'=>$d[0]
		);
		return $db->add($data);
	}
	private function selected($id,$d){
		$db = M('yoho_attr_value');
		$s=null;
		foreach ($d as $v) {
			//如果属性值为空跳过
			if(empty($d)) continue;
			$data = array(
				'acid'=>$id,
				'attr_value'=>$v
			);
			$s[]=$db->add($data);
		}
		return $s;
	}
	//文本域
	private function textarea($id,$d){
		$db = M('yoho_attr_value');
		$data = array(
			'acid'=>$id,
			'attr_value'=>$d[0]
		);
		return $db->add($data);
	}
	//单选
	private function radio($id,$d){
		$db = M('yoho_attr_value');
		$s=null;
		foreach ($d as $v) {
			//如果属性值为空跳过
			if(empty($d)) continue;
			$data = array(
				'acid'=>$id,
				'attr_value'=>$v
			);
			$s[]=$db->add($data);
		}
		return $s;
	}
	//复选
	private function checkbox($id,$d){
		$db = M('yoho_attr_value');
		$s=null;
		foreach ($d as $v) {
			//如果属性值为空跳过
			if(empty($d)) continue;
			$data = array(
				'acid'=>$id,
				'attr_value'=>$v
			);
			$s[]=$db->add($data);
		}
		return $s;
	}
}