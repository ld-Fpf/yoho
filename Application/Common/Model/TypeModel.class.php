<?php 
class TypeModel extends Model{
	public $table = 'yoho_type';
	// 自动验证
	public $validate = array(
		array('name', 'nonull', '名称不可为空', 2,3),
	);

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
		$tid = Q('post.type_id');
		// p($this->get_one_data(array('name' => $name)));die;
		// 设置下面即将查询的where数组条件
		$where['name']=$name;
		$where['type_id'] = array('neq', $tid);
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
		$tid = Q('get.tid', 0, 'intval');
		$where['type_id'] = $tid;
		$data = K('TypeAttr')->get_one_data($where);
		// p($data);die;
		if($data){
			$this->error = '该类型下有属性，不可删除';
			return false;
		}
		return $this->del($tid);
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




	//添加商品,获得属性表单=================
	public function get($type_id,$data=null){
		$aclass = M('yoho_type_attr')->where(array('type_id'=>$type_id,'attr_type'=>0))->all();
		if($aclass){
			foreach ($aclass as $n => $v) {
				if(method_exists($this, $v['show_type'])){
					$field =M('yoho_attr_value')->where(array('taid'=>$v['taid']))->all();
					$aclass[$n]['html'] = $this->$v['show_type']($field,$data);
				}
			}
		}
		return $aclass;
	}

	//执行商品类型的函数
	private function input($fields,$data){
		if($data){
			$v = $data[$fields[0]['avid']]['avalue'];
		}else{
			$v=$fields[0]['attr_value'];
		}
		$html = '';
		$html.='<input name="attr['.$fields[0]['taid'].'|'.$fields[0]['avid'].']" type="text" value="'.$v.'">';
		return $html;
	}
	private function selected($fields,$data){
		$html = '<select name="attr['.$fields[0]['taid'].']">';
		foreach ($fields as $v) {
			// if($data){
				$sel = isset($data[$v['avid']])? 'selected=""' : '';
			// }
			$html.='<option '.$sel.' value="'.$v['avid'].'|'.$v['attr_value'].'">'.$v['attr_value'].'</option>';
		}
		$html.='</select>';
		return $html;
	}
	private function radio($fields,$data){
		$html = '';
		$i=0;
		foreach ($fields as $v) {
			// if($data){
				$sel = isset($data[$v['avid']])? 'checked=""' : '';
			// }
			if($i){
				$html.='<label class="mr10" for="'.$v['avid'].'"> <input '.$sel.' id="'.$v['avid'].'" name="attr['.$v['taid'].']" type="radio" value="'.$v['avid'].'|'.$v['attr_value'].'"> '.$v['attr_value'].'</label>';
			}else{
				$html.='<label class="mr10" for="'.$v['avid'].'"> <input '.$sel.' id="'.$v['avid'].'" name="attr['.$v['taid'].']" type="radio" checked="" value="'.$v['avid'].'|'.$v['attr_value'].'"> '.$v['attr_value'].'</label>';
			}
			$i++;
		}
		return $html;
	}
	private function checkbox($fields,$data){
		$html = '';
		foreach ($fields as $v) {
			// if($data){
				$sel = isset($data[$v['avid']])? 'checked=""' : '';
			// }
			$html.='<label class="mr10" for="'.$v['avid'].'"> <input '.$sel.' id="'.$v['avid'].'" name="attr['.$v['avid'].']" type="checkbox" value="'.$v['avid'].'|'.$v['attr_value'].'" /> '.$v['attr_value'].'</label>';
		}
		return $html;
	}
	private function textarea($fields,$data){
		if($data){
			$v = $data[$fields[0]['avid']]['avalue'];
		}else{
			$v=$fields[0]['attr_value'];
		}
		$html = '';
		$html.='<textarea class="pct50" name="attr['.$fields[0]['taid'].'|'.$fields[0]['avid'].']">'.$v.'</textarea>';
		return $html;
	}
}