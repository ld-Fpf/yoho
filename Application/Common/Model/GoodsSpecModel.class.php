<?php 
class GoodsSpecModel extends Model{
	public $table = 'yoho_type';
	/**
	 * 获取商品规格表单
	 * @param  [type] $type_id [description]
	 * @param  [type] $data [description]
	 * @return [type]       [description]
	 */
	public function get($type_id,$data=null){
		$gid = Q('gid',0,'intval');
		$aclass = M('yoho_type_attr')->where(array('type_id'=>$type_id,'attr_type'=>1))->all();
		// p($aclass);
		// $stock = M('stock')->where('gid='.$gid)->all();
		if($aclass){
			foreach ($aclass as $n => $v) {
				if(method_exists($this, $v['show_type'])){
					$field =M('yoho_attr_value')->where(array('taid'=>$v['taid']))->all();
					if($data){ //组合修改需要的数据
						foreach ($data as $k=>$d) {
							foreach ($field as $key => $value) {
								if($d['avid'] == $value['avid']){
									$field[$key]['state']=1;
								}
								// $field[$key]['stid']=$stock[$k]['stid'];
							}
						}
					}
					$aclass[$n]['html'] = $this->$v['show_type']($field);
				}
			}
		}
		return $aclass;
	}

	private function selected($fields){
		// p($fields);
		$html='';
		// $html.='<input type="text" name="spec[stid][]" value="'.$stock[$k]['stid'].'">';
		$html .= '<select name="spec[attr]['.$fields[0]['taid'].'][]">';
		foreach ($fields as $k => $v) {
			$sel = isset($v['state'])? 'selected=""' : '';
			$html.='<option '.$sel.' value="'.$v['avid'].'|'.$v['attr_value'].'">'.$v['attr_value'].'</option>';
		}
		$html.='</select>';
		return $html;
	}
}