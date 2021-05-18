<?php
//测试控制器类
class CommonController extends Controller{
    //动作方法
    public function banner(){
    	echo 1;die;
        // 服饰下上装的分类
        $makeup = K('Category') -> get_all_cate(array('pid'=>1));
        p($makeup);die;
        $this->assign('makeup', $makeup);
    }

    
}
