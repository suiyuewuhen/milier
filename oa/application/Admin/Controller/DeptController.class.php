<?php
namespace Admin\Controller;
class DeptController extends CommonController{
    function index(){
        //1. 实例化Dept模型
        $dept = D('Dept');
        //2. 调用select方法进行查询
        $dept_list = $dept->alias('d1')
            //注意：两个 dept_name，后面的dept_name会覆盖前面的，所以需要设置别名
            ->field('d1.dept_id, d1.dept_name, d1.dept_pid, d1.dept_level, d2.dept_name dname, d1.dept_sort, d1.dept_remark')
            ->join('left join oa_dept d2 on d1.dept_pid=d2.dept_id')
            ->select();
        $dept_list = getDeptTree($dept_list);
        //echo $dept->getLastSql();
        //dump($dept_list);die;
        //3. 分配到模板
        $this->assign('dept_list', $dept_list);
        
        $this->display();
    }
    
    function add(){
        //1. 实例化Dept模型
        $dept = D('Dept');
        //2. 调用select方法进行查询
        $dept_list = $dept->select();
        //3. 分配到模板
        $this->assign('dept_list', $dept_list);
        
        $this->display();
    }
    
    
    function addOk(){
        //1. 实例化Dept模型
        $dept = D('Dept');
        //2. 调用create方法收集表单数据
        $data = $dept->create();
        // 补充ctime字段
        $data['dept_ctime'] = time();
        //3. 使用dump查看数据
        //dump($data);
        // 根据add方法的返回值，判断添加是否成功
        if($dept->add($data)){
            //参数1: 提示信息
            //参数2: 跳转的地址
            //参数3: 延迟几秒后进行跳转
            $this->success('添加部门成功', U('index'), 3);
        } else {
            $this->error('添加部门失败', U('add'), 3);
        }
    }
    
    
    /* function addOk(){
        //1. 接收表单数据
        $name = I('post.dept_name');
        $pid = I('post.dept_pid');
        $sort = I('post.dept_sort');
        $remark = I('post.dept_remark');
        $ctime = time();
        //2. 实例化Dept模型
        $dept = D('Dept');
        //3. 构造要插入的数据
        $arr = array(
            'dept_name' => $name,
            'dept_pid' => $pid,
            'dept_sort' => $sort,
            'dept_remark' => $remark,
            'dept_ctime' => $ctime
        );
        //4. 调用add方法进行数据表插入操作
        $dept->add($arr);
    } */
    
    
    function edit(){
        //1.接收get传参
        $id = I('get.id');
        //2. 根据id查询具体部门信息
        $dept_info = D('Dept')->find($id);
        //3. 将部门信息分配到模板
        $this->assign('dept_info',$dept_info);
        
        //查询所有已存在的部门信息
        $dept_list = D('Dept')->select();
        $this->assign('dept_list', $dept_list);
        
        //4. 调用模板显示
        $this->display();
    }
    
    function modify(){
        //1. 实例化Dept模型
        $dept = D('Dept');
        //2. 调用create收集表单数据
        $data = $dept->create();
        //dump($data);
        //3. 判断$data的值，如果为false，输出错误信息
        if(!$data){
            echo $dept->getError();
        } else {
            if($dept->save($data)){
                $this->success('修改部门成功', U('index'), 3);
            } else {
                $this->error('修改部门失败', U('edit', 'id='.$data['dept_id']), 3);
            }
        }
    }
    
    function del(){
        //1. 接收get传递的dept_id
        $id = I('get.id');
        //2. 实例化Dept模型
        $dept = D('Dept');
        //3. 执行删除
        if($dept->delete($id)){
            $this->success('删除部门成功', U('index'), 3);
        } else {
            $this->error('删除部门失败', U('index'), 3);
        }
    }
    
    function dels(){
        //1. 接收get传递的ids值
        $ids = I('get.ids');
        //2. 实例化Dept模型
        $dept = D('Dept');
        //3. 调用delete执行删除
        // 将ids字符串直接传入delete方法
        // delete from oa_dept where dept_id in ('1,8,2,4');
        if($dept->delete($ids)){
            $this->success('批量删除部门成功', U('index'), 3);
        } else {
            $this->error('批量删除部门失败', U('index'), 3);
        }
    }
}

















