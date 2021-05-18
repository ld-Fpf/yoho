<?php 
/**
 * 分类管理控制器
 */
class CategoryController extends Controller{
	//保存模型
	private $_model;
	public function __init(){
		$this->_model = K('Category');
	}
	/**
	 * 显示分类
	 */
	public function index(){
		//获得所有分类数据
		$this->assign('data',$this->_model->get_all_data());
		$this->display();
	}
	
	/**
	 * 添加顶级分类
	 */
	public function add(){
		if(IS_POST){
			//执行模型添加，在添加的动作之前，有自动验证
			if(!$this->_model->add_data()){
				$this->error($this->_model->error);
			}
			$this->success('添加成功', U('index'));
		}
		$this->display();
	}
	
	/**
	 * 添加子集分类
	 */
	public function add_son(){
		if(IS_POST){
			if(!$this->_model->add_data()) $this->error($this->_model->error);
			$this->success('添加成功',U('index'));
		}
		// 获得类型表所有类型
		$type = K('Type')->get_all_data();
		unset($type['page']);
		// p($type);die;
		//获得所属分类名称
		$data = $this->_model->get_one_data(array('category_id'=>Q('get.cid', 0, 'intval')),'name');
		$this->assign('name',$data['name']);
		$this->assign('type', $type);
		$this->display();
	}
	
	/**
	 * ajax获得子集分类id
	 */
	public function ajax_get_son(){
		if(!IS_AJAX) $this->error('非法请求');
		$sonId = $this->_model->get_son_data(Q('post.cid',0,'intval'));
		//给js返回json数据
		$this->ajax($sonId);
	}
	
	/**
	 * 删除分类(应该还判断分类下面的文章是否存在，如果存在也不能删除)
	 */
	public function del(){
		if($this->_model->del_data(Q('get.cid',0,'intval'))){
			$this->success('删除成功');
		}
		$this->error($this->_model->error);
	}
	
	/**
	 * 修改
	 */
	public function edit(){
		if(IS_POST){
			// p($_POST);die;
			 if(!$this->_model->edit_data()) $this->error($this->_model->error);
			$this->success('修改成功', U('index'));
		}
		
		
		$cid = Q('get.cid',0,'intval');
		//获得旧数据
		$oldData = $this->_model->get_one_data(array('category_id'=>$cid));
		// p($oldData);die;
		$this->assign('oldData',$oldData);
		// //获得可以更换选择的父级分类(排除自己和自己子集)
		// $cateData = $this->_model->get_change_cate($cid);
		// $this->assign('cateData',$cateData);
		$this->display();
	}
	
}