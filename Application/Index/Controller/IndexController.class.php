<?php
//测试控制器类
class IndexController extends CommonController{
	public function __init(){
		$this-> banner();
	}
    //动作方法
    public function index(){
        // 首页人气单品
        $pop = K('Goods') -> get_all_data(array('is_hot'=>1));
        unset($pop['page']);
        $this->assign('pop', $pop);

        //banner图片
        $banner = K('Banner') -> get_all_data(array('is_show' => 1));
        unset($banner['page']);
        $this->assign('banner', $banner);

        // 一楼层左侧分类
        $floor1 = K('Category') -> get_all_cate(array('pid'=>1));
        $this->assign('floor1', $floor1);

        // 一楼层左侧品牌
        $f1b = K('Brand') -> get_all_brand(array('category_id'=>1));
        $this->assign('f1b', $f1b);

        // 二楼层左侧分类
        $floor2 = K('Category') -> get_all_cate(array('pid'=>16));
        $this->assign('floor2', $floor2);

        // 二楼层左侧品牌
        $f2b = K('Brand') -> get_all_brand(array('category_id'=>16));
        $this->assign('f2b', $f2b);

        // 三楼层左侧分类
        $floor3 = K('Category') -> get_all_cate(array('pid'=>25));
        $this->assign('floor3', $floor3);

        // 三楼层左侧品牌
        $f3b = K('Brand') -> get_all_brand(array('category_id'=>15));
        $this->assign('f3b', $f3b);

        // 四楼层左侧分类
        $floor4 = K('Category') -> get_all_cate(array('pid'=>1));
        $this->assign('floor4', $floor4);

        // 四楼层左侧品牌
        $f4b = K('Brand') -> get_all_brand(array('category_id'=>1));
        $this->assign('f4b', $f4b);
        $this->display();
    }

    
}
