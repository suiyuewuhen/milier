<?php
namespace Home\Controller;
use Think\Controller;

class IndexController extends Controller {
    function upload(){
        $this->display();
    }
    
    function upfile(){
        //自定义文件上传配置项
        $config = array(
            // 设置上传文件的最大尺寸
            // 使用bit作为单位，所以3M = 1024 * 1024 * 3
            'maxSize' => 3145728,
            // 设置文件上传后保存的根路径
            'rootPath' => './Upload/',
            // 设置允许上传的文件后缀
            'exts' => array('doc','txt','jpg','rar'),
        );
        //1. 实例化文件上传类
        $file = new \Think\Upload($config);
        //2. 调用upload方法进行上传
        // $result 有两种情况，1 false上传失败 2上传成功的文件信息
        $result = $file->upload();
        if(!$result){
            // 当文件上传失败时，输出错误信息
            echo $file->getError();
        } else {
            // 上传成功后，显示上传文件信息
            dump($result);
        }
    }
    
    
    function verify_test(){
        //自定义配置项
        $arr = array(
            'codeSet' => 'abcdefg',
            'useCurve'  =>  false,
            'useNoise'  =>  false,
            // 背景图优先级高于背景色
            //'bg'        =>  array(10, 100, 200),
            'bg'        =>  array(243, 251, 254),
            // 背景图: ThinkPHP/library/Think/Verify/bgs中
            //'useImgBg'  =>  true,
            // 验证码图大小和字体大小相关
            'fontSize'  =>  25,
            // 如果宽高为0，图片大小和字体大小相关
            //'imageH'    =>  50,               // 验证码图片高度
            //'imageW'    =>  100,               // 验证码图片宽度
            //'length'    =>  2,
            //是否使用中文验证码
            // 使用中文验证时，必须先将要使用的字符复制到：
            // ThinkPHP/library/Think/Verify/zhttfs目录中
            'useZh'     =>  true,
            'zhSet'     =>  '们以我到他会作时要动国产的一是工就年阶义',
            'fontttf'   =>  'YGYXSZITI2.0.TTF'
        );
        
        //1. 实例化验证码类
        $v = new \Think\Verify($arr);
        //2. 调用entry方法绘制验证码
        $v->entry();
    }
    
    
    function aaa(){
         phpinfo();
    }
    
    public function index(){
        $this->display();
    }
    
    function modify_test(){
        $this->assign('str', 'abcdefg');
        
        $this->assign('t', 14746328172);
        $this->assign('tt', time());
        
        $this->display();
    }
    
    function default_test(){
        $this->assign('str', 'aaa');
        $this->display();
    }
    
    function cal_test(){
        $this->assign('a', 20);
        $this->assign('b', 5);
        $this->display();
    }
    
    function i_post(){
        $this->display();
    }
    function i_post1(){
        echo I('post.name');
    }
    
    function i_get(){
        echo I('get.name');
    }
    
    function i_test(){
        // zs 默认值
        //echo I('get.name', 'zs');
        echo I('get.name', 'zs', 'addslashes');
    }
    
    function conv1(){
        $new = htmlspecialchars("<a href='test'>Test</a>", ENT_QUOTES);
        echo $new; // &lt;a href=&#039;test&#039;&gt;Test&lt;/a&gt; 
    }
    
    function conv2(){
        $str = "A 'quote' is <b>bold</b>";
        // Outputs: A 'quote' is &lt;b&gt;bold&lt;/b&gt;
        echo htmlentities($str);
        echo "<hr />"; 
        // Outputs: A &#039;quote&#039; is &lt;b&gt;bold&lt;/b&gt;
        // ENT_QUOTES 转义单个或者成对的特殊字符 （成对的特殊字  " '）
        echo htmlentities($str, ENT_QUOTES); 
    }
    
    function conv3(){
        $str = "Is your name O'reilly?";
        // 输出： Is your name O\'reilly?
        echo addslashes($str); 
    }
    
    function tran_test(){
        //1. 实例化tp_user表模型
        $user = D('User');
        $money = 50000;
        // 定义标志
        $flag = true;
        //2. 开启事务
        $user->startTrans();
        //3. 执行转账, zs账号减少5w
        $sql = "update tp_user set umoney=umoney-$money where uid=1";
        if(!$user->execute($sql)){
            $flag = false;
        }
        // ls账号增加5W
        $sql = "update tp_user set umoney=umoney+$money where uid=2";
        if(!$user->execute($sql)){
            $flag = false;
        }
        //4. 提交事务
        if($flag){
            $user->commit();
        } else {
            $user->rollback();
        }
    }
    
    function func_test(){
        //echo setNowTime();
        delDir();
        getDirSize();
        myfunc();
    }
    
    function func_test1(){
        //1. 使用load函数载入homeFunc.php文件
        load('@/homeFunc');
        //2. 调用函数
        homef();
    }
    
    function class_test(){
        $shop = new \Tools\Shop();
        $shop->index();
        $shop->add();
    }
}

















