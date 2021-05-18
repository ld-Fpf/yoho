<?php 
/**
 * 分类管理模型
 */
class CategoryModel extends Model{
	public $table = 'yoho_category';
	
	public $validate = array(
		array('name', 'nonull', '分类名称不能为空 ', 2,3),
		array('name', 'maxlen:20', '分类名称不能超过20个字符 ', 2,3),
		array('sort', 'num:1,65535','排序字段必须为数字',2,3),
	);
	
	
	/**
	 * 添加数据
	 */
	public function add_data(){
		if(!$this->create()) return false;
		//分类不能有同名
		$name = Q('post.name');
		if($this->get_one_data(array('name'=>$name))){
			$this->error = $name . '分类已经存在';
			return false;
		}
		return $this->add();
	}
	
	/**
	 * 获得所有数据
	 */
	public function get_all_data($where=NULL){
		$data = $this->order('sort ASC')->where($where)->all();
		//格式化树状的数据
		$data = Data::tree($data,'name','category_id','pid');
		return $data;
	}
	
	/**
	 * 获得一条数据
	 */
	public function get_one_data($where=NULL,$field=NULL){
		return $this->where($where)->field($field)->find();
	}
	
	
	/**
	 * 获得所有子集
	 */
	public function get_son_data($cid){
		$data = $this->all();
		return $this->get_son($data,$cid);
	}
	
	/**
	 * 递归获得所有子集分类
	 */
	public function get_son($data,$cid){
		$temp = array();
		foreach ($data as $v) {
			if($v['pid'] == $cid){
				$temp[] = $v['category_id'];
				$temp = array_merge($temp,$this->get_son($data, $v['category_id']));
			}
		}
		return $temp;
	}
	
	/**
	 * 删除分类
	 */
	public function del_data($cid){
		//判断是否有子集
		$data = $this->where(array('pid'=>$cid))->find();
		if($data){
			$this->error = '请先删除该分类下面的子集';
			return false;
		}
		return $this->del($cid);
	}
	
	
	//获得可以更换选择的父级分类(排除自己和自己子集)
	public function get_change_cate($cid){
		$son = $this->get_son_data($cid);
		$son[] = $cid;
		//'SLEECT * FROM hd_category WHERE cid not in (8,11)'
		$data = $this->get_all_data('category_id not in(' . implode(',', $son) . ')');
		return $data;
		
	}
	
	// 编辑数据
	public function edit_data(){
		// 判断标签名是否重复  重复返回false
		$name = Q('post.name');
		$cid = Q('post.category_id');
		// p($this->get_one_data(array('name' => $name)));die;
		// 设置下面即将查询的where数组条件
		// 两个条件合在一起表示 获取name的名称 并且此品牌跟要修改的品牌的bid不相等的那个bid
		$where['name']=$name;
		$where['category_id'] = array('neq', $cid);
		if($this->get_one_data($where)){
			$this->error = $name . '名称已经存在';
			return false;
		}
		// 自动验证
		if(!$this->create()) return false;
		return $this->save();
	}
	
	
	
	
}
















 ?>