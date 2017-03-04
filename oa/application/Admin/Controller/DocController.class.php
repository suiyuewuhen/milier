<?php
namespace Admin\Controller;
// 先继承基类，便于调试
//use Think\Controller;
class DocController extends CommonController{
    function index(){
        $doc = D('Doc');
        $doc_list = $doc->alias('d')
            ->field('doc_id, doc_title, doc_content, doc_file, user_nickname, doc_ctime')
            ->join('left join oa_user u on d.doc_author=u.user_id')
            ->select();
        //dump($doc_list);die; 
        $this->assign('doc_list', $doc_list);
        $this->display();
    }
    
    function download(){
        //1. 接收get传递的id
        $id = I('get.id');
        //2. 根据$id查询附件的路径
        $data = D('Doc')->field('doc_file')->find($id);
        $path = $data['doc_file'];
        //3. 调用4句下载函数，执行下载
        header("Content-type: application/octet-stream");
        header('Content-Disposition: attachment; filename="' . basename($path) . '"');
        header("Content-Length: ". filesize($path));
        readfile($path);
    }
    
    function getDoc(){
        //1. 接收前台传递数据
        $id = I('post.id');
        //2. 实例化Doc模型执行查询
        $data = D('Doc')->field('doc_title,doc_content')->find($id);
        // 将doc_content中的内容翻转
        $data['doc_content'] = htmlspecialchars_decode($data['doc_content']);
        //dump($data);die;
        //3. 将一维数组$data转为json返回前台
        echo json_encode($data);
    }
    
    function add(){
        $this->display();
    }

    function addOk(){
        $path = 'kong';
        //判断是否存在上传文件，如果没有则不用执行文件上传操作
        if($_FILES['file']['size'] != 0){
            //1. 自定义配置项
            $config = array(
                'maxSize' => 3000000,
                'rootPath' => './Upload/',
                'exts'  => array('doc', 'txt', 'jpg', 'png')
            );
            //2. 实例化Upload类
            $upload = new \Think\Upload($config);
            //3. 调用upload方法进行上传
            $result = $upload->upload();
            //4. 判断$result,如果为false则输出错误信息
            if(!$result){
                echo $upload->getError();
            } 
            // 如果上传成功，则拼接正确的文件保存路径
            $path = './Upload/'.$result['file']['savepath'].$result['file']['savename'];
        }
        // 获取表单数据，执行插入操作
        $doc = D('Doc');
        // 参数2：声明要执行插入（1）还是修改（2）
        $data = $doc->create('', 1);
        // 将路径加入要插入的数组
        $data['doc_file'] = $path;
        // 判断$data的值
        if(!$data){
            echo $doc->getError();
        } else {
            if($doc->add($data)){
                $this->success('添加公文成功', U('index'), 3);
            } else {
                $this->error('添加公文失败', U('add'), 3);
            }
        }
    }
}








