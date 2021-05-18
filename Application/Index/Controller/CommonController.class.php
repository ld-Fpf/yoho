<?php
//测试控制器类
class CommonController extends Controller{
    //动作方法
    public function banner(){
        // 服饰下上装的分类
        $upperClo = K('Category') -> get_all_cate(array('pid'=>1));
        $this->assign('upperClo', $upperClo);

        // 服饰下装的分类
        $lowerClo = K('Category') -> get_all_cate(array('pid'=>16));
        $this->assign('lowerClo', $lowerClo);

        // 服饰下的热门品牌
        $hbrand = K('Brand') -> get_all_brand(array('category_id'=>1, 'is_hot'=>1));
        $this->assign('hbrand', $hbrand);

        // 鞋履分类
        $shoes = K('Category') -> get_all_cate(array('pid'=>25));
        $this->assign('shoes', $shoes);

         //鞋履下的热门品牌
        $sbrand = K('Brand') -> get_all_brand(array('category_id'=>25, 'is_hot'=>1));
        $this->assign('sbrand', $sbrand);
    }

    
}
