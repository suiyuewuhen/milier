<?php
namespace Admin\Controller;
class UserController extends  CommonController{
    function index(){
        //定义每页显示数量
        $pagesize = 1;
        //将每页显示数量分配到模板
        $this->assign('pagesize', $pagesize);
        //定义当前页号,使用I方法接收get方式传递p参数（页号）
        //第一次执行时，没有p参数，所以设置默认值为1
        $pageno = I('get.p', 1);
        //实例化User模型
        $user = D('User');
        // 调用select方法查询
        // page : 分页查找函数
        $user_list = $user->page($pageno,$pagesize)->select();
        // 分配到模板
        $this->assign('user_list',$user_list);
        
        //使用page类构造分页导航条
        //查询总记录数
        $count = $user->count();
        //将总记录数分配到模板
        $this->assign('count', $count);
        $page = new \Think\Page($count, $pagesize);
        //show方法用来产生分页导航条的字符串
        $show = $page->show();
        // 将字符串分配到模板
        $this->assign('show', $show);
        // 调用模板进行显示
        $this->display();
    }
    
    function getContent(){
        // 获取页号
        $pageno = I('get.p');
        $pagesize = 1;
        // 调用User模型进行查询
        $user = D('User');
        $user_list = $user->page($pageno, $pagesize)->select();
        //将查询出的用户列表数据分配到模板并进行输出
        // 那么前台的 $.get中的msg参数就能接收到值
        $this->assign('user_list', $user_list);
        $this->display();
        
        // 另一种写法：
        //$str = $this->fetch();
        //echo $str;
    }
    
    function charts(){
        //1. 实例化Dept模型
        $dept = D('Dept');
        //2. 编写SQL语句
        $sql = "SELECT dept_name,COUNT(*) num FROM oa_user u
                LEFT JOIN oa_dept d ON u.user_deptid=d.dept_id 
                GROUP BY user_deptid";
        //3. 调用query方法进行查询
        $data = $dept->query($sql);
        //4. 将$data 分配到模板
        //$this->assign('data', $data);
        
        //将$data拼接成模板需要的样式
        $str = "";
        foreach($data as $value){
            $str .= "['".$value['dept_name']."', ".$value['num']."],";
        } 
        $this->assign('str', $str);
        
        $this->display();
    }
}


























