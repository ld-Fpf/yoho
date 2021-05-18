<?php 
/**
 * 商品管理控制器
 */
class GoodsController extends Controller{
	//保存模型
	private $_model;
	public function __init(){
		$this->_model = K('Goods');
	}


	public function index(){
		$this->display();
	}

	public function add(){
		if(IS_POST){
			if(!$data = $this->_model->add_data()) $this->error($this->_model->error);
			// die;
			$this->success('添加成功', U('index'));
		}
		// get获取cid
		$cid = Q('get.cid',0,'intval');
		// 获取所有分类
		$cate = K('Category') -> get_all_data();
		// echo $cate[$cid];die;
		// p($cate[$cid]);die;
		// 取得$cate中个分类对应的type_id值
		$tid = $cate[$cid]['type_id'];
		// 获取类型属性表中 的所有属性
		$attr = K('Type') -> get($tid);
		// p($attr);die;
		// 获取类型属性表中 的所有规格
		$spec = K('GoodsSpec') -> get($tid);
		unset($attr['page']);
		unset($spec['page']);

		// 获取品牌
		// $brand = K('Brand')->get_all_data(array('category_id'=>$cid));
		$brand = K('Brand')->get_all_data();
		unset($brand['page']);
		// p($brand);die;
		$this->assign('spec', $spec);
		$this->assign('attr', $attr);
		$this->assign('brand', $brand);
		$this->assign('cate', $cate[$cid]);
		$this->display();
	}

	public function edit(){
		$this->display();
	}

	public function del(){

	}

	// public function get_tid(){

		
	// 	$data=K('TypeAttr')->get_all_data(array('type_id'=>Q('post.tid')));

	// 	foreach ($data as $k =>$v) {

	// 		$data[$k]['value']=explode(',', $v['value']);
	// 	}

	// 	// p($data);
	// 	$this->ajax($data);
	// }
	

	// 获得该分类对应的类型属性值
	// public function get_attrs(){
	// 	if (!IS_AJAX) $this->error("非法请求");
	// 	$type_id = Q('post.type_id');
	// 	$data = K("TypeAttr")->select($type_id);
	// 	// p($data);die;
	// 	$this->ajax($data);
	// }
	
	//栏目列表Ajax返回
	public function selectCate(){
		$cate = K('Category') -> get_all_data();
		$html="";
		foreach ($cate as $k => $v) {
			$html.="<option value='".$v['category_id']."'>".$v['_name']."</option>";
		}
		// echo json_encode($html);die;
		echo $html;die;
	}
}