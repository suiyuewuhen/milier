<?php
namespace Admin\Controller;
use Think\Controller;
class CommonController extends  Controller{
    function _initialize(){
        if(!session('?id')){
            $this->error('您尚未登录，请登录后再访问', U('Index/login'), 3);
        }
        
        //获取当前访问的模块-控制器-方法字符串
        $now_path = MODULE_NAME.'-'.CONTROLLER_NAME.'-'.ACTION_NAME;
        //从session中获取role_paths字段
        $role_paths = session('role_paths');
        // 将role_paths转为数组
        $role_paths = explode(',', $role_paths);
        if(!in_array($now_path, $role_paths)){
            $this->error('您无权访问该页面,请重新登录后再访问', U('Index/logout'), 3);
        }
    }
}

