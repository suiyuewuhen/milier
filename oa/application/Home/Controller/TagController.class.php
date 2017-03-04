<?php
namespace Home\Controller;
use Think\Controller;
class TagController extends Controller{
    function volist_test(){
        $arr = array('aaa','bbb','ccc');
        $this->assign('arr', $arr);
        
        $info = array('id'=>101, 'name'=>'linda', 'age'=>20);
        $this->assign('info', $info);
        
        $list = array(
            array('id'=>101, 'name'=>'linda', 'age'=>20),
            array('id'=>102, 'name'=>'lisa', 'age'=>21),
            array('id'=>103, 'name'=>'mary', 'age'=>22),
        );
        $this->assign('list', $list);
        
        $arr1 = array('a','b','c','d','e','f','g');
        $this->assign('arr1', $arr1);
        
        $this->display();
    }
    
    function foreach_test(){
        $arr = array('aaa','bbb','ccc');
        $this->assign('arr', $arr);
        
        $info = array('id'=>101, 'name'=>'linda', 'age'=>20);
        $this->assign('info', $info);
        
        $list = array(
            array('id'=>101, 'name'=>'linda', 'age'=>20),
            array('id'=>102, 'name'=>'lisa', 'age'=>21),
            array('id'=>103, 'name'=>'mary', 'age'=>22),
        );
        $this->assign('list', $list);
        
        $this->display();
    }
    
    function if_test(){
        $iq = 60;
        $this->assign('iq', $iq);
        $this->display();
    }
    
    function php_test(){
        $this->display();
    }
    
    function include_test(){
        $this->display();
    }
    
    function include_test1(){
        $this->display();
    }
    
    function import_test(){
        $this->display();
    }
}

















