<?php
namespace Admin\Controller;
use Think\Controller;

class IndexController extends Controller {
    function index(){
        $this->display('login');
    }
    
    public function login(){
        $this->display();
    }
    
    function verify(){
        //自定义配置项
        $config = array(
            'useCurve'  =>  false,            // 是否画混淆曲线
            'useNoise'  =>  false,            // 是否添加杂点
            'bg' => array(93, 202, 27),
            'imageH'    =>  38,               // 验证码图片高度
            'imageW'    =>  72,               // 验证码图片宽度
            'fontSize'  =>  15,
            'fontttf'   => '4.ttf',
            'length'    =>  4
        );
        //1. 实例化验证码类
        $v = new \Think\Verify($config);
        //2. 调用entry方法绘制验证码
        $v->login_verify();
    }
    
    function checkLogin(){
        //1. 接收用户输入的验证码
        $code = I('post.code');
        //2. 实例化验证码方法，
        $v = new \Think\Verify();
        //3. 调用check方法检查用户输入和系统产生验证码的匹配性
        if(!$v->check($code)){
            $this->error('验证码错误', U('login'), 3);
        }
        
        //检查用户名和密码是否存在于数据表，并且匹配
        //1. 接收用户名和密码
        $name = I('post.name');
        $passwd = md5(I('post.passwd'));
        
        //2. 实例化User模型，调用checkLoginfo方法检查用户和密码
        $user = D('User');
        if($user->checkLoginfo($name, $passwd)){
            $this->success('登录成功', U('Main/index'), 3);
        } else {
            $this->error('用户名或密码错误', U('login'), 3);
        }
    }

    function logout(){
        session(null);
        //页面重定向(也是跳转)
        //参数1: 跳转的控制器路径
        //参数2: get方式传递的数据
        //参数3: 延迟多少秒后跳转
        //参数4: 页面提示信息
        $this->redirect('Index/login', array(), 3, '正在退出...');
    }
}
















