<?php
namespace Home\Controller;
use Think\Controller;
class SCController extends Controller{
    function setS(){
        session('id', 101);
        session('name', 'aaa');
    }
    
    function getS(){
        echo session('name');
        $s = session();
        dump($s);
    }
    
    function delS(){
        //session('name', null);
        session(null);
    }
    
    function issetS(){
        echo (int)session('?name');
    }
    
    function setC(){
        cookie('bgcolor', 'red');
        cookie('fontcolor', 'green');
    }
    
    function getC(){
        echo cookie('bgcolor');
        $c = cookie();
        dump($c);
    }
    
    function delC(){
        //cookie('bgcolor', null);
        //有bug，要删除全部cookie需要为cookie增加前缀
        cookie(null); 
    }
}



















