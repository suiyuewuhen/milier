<?php
namespace Admin\Controller;
use Think\Controller;
class EmailController extends CommonController{
    function send(){
        $this->display();
    }
    
    function getNames(){
        //1 接收前台传递值
        $name = I('get.name');
        //2. 实例化User模型，进行模糊查询
        $user = D('User');
        $names = $user
            ->field('user_id,user_nickname')
            ->where("user_nickname like '%$name%'")
            ->select();
        //3. 返回查询结果
        echo json_encode($names);
    }
}









