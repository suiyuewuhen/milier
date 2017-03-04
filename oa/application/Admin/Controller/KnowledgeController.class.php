<?php
namespace Admin\Controller;
class KnowledgeController extends CommonController{
    function add(){
        $this->display();
    }
    
    function upfile(){
        //自定义配置项
        $config = array(
            'maxSize' => 3000000,
            'rootPath' => './Upload/',
            'exts' => array('jpg', 'png', 'gif')
        );
        //1. 实例化文件上传类
        $upload = new \Think\Upload($config);
        //2. 调用upload方法进行文件上传
        $result = $upload->upload();
        if(!$result){
            echo $upload->getError();
        } else {
            //dump($result);
            //正确上传完成后，制作缩略图
            //1. 实例化图像处理类
            $img = new \Think\Image();
            //2. 加载要进行缩略处理的图片
            $path = './Upload/'.$result['Filedata']['savepath'].$result['Filedata']['savename'];
            $img->open($path);
            //3. 制作缩略图
            $img->thumb(145, 122);
            //4. 保存缩略图
            $smallpath = './Upload/'.$result['Filedata']['savepath'].'thumb_'.$result['Filedata']['savename'];
            $img->save($smallpath); 
            
            echo $smallpath;
        }
    }
}











