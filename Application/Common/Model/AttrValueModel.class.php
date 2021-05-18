<?php 
class AttrValueModel extends Model{
	public $table = 'yoho_attr_value';

	// 新增数据
	public function add_data($taid, $avalue){
		
		// echo $taid;die;
		// p($avalue);die;
		//循环依次添加
		foreach ($avalue as $v) {
			if(empty($v)) continue;
			$this->add(array('taid'=>$taid, 'attr_value'=>$v));
		}
	}

	// 删除数据
	public function del_data($taid){
		$where['taid'] = $taid;
		$this->where($where)->del();
	}


}