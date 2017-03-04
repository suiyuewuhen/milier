<?php
namespace Home\Controller;
use Think\Controller;
class StudentController extends Controller{
    function  add(){
        $this->display();
    }
    
    function addOk(){
        //1. 实例化student模型
        $student = D('Student');
        //2. 调用create方法收集表单数据
        $data = $student->create();
        //3. 判断$data(如果验证未通过，则create方法会返回false)
        if(!$data){ //如果没有通过验证 $data为false时，可以调用getError来获取错误信息
            //getError方法用来获取错误信息
            echo $student->getError();
        } else {
            $student->add($data);
        }
    }
    
    function index(){
        // M方法是 ThinkPHP/Common/functions.php文件中的函数
        $model = M('Student');
        //是TP自己定义函数，能够输出任何类型的变量
        dump($model);
    }
    
    function index1(){
        $model = D('Student');
        dump($model);
    }
    
    function add_test(){
        //1. 实例化Student模型
        $student = D('Student');
        //2. 构造要插入的数据（数组）
        $arr = array(
            //'sno' => 10002,  因为sno是主键自增长，所以可以不进行设置
            'sname' => '蛮族之王',
            'sage' => 25,
            'ssex' => '男',
            'sdept' => 8
        );
        //3. 调用add方法来进行数据插入
        $student->add($arr);
    }
    
    function save_test(){
        //1. 实例化student表
        $m = D('Student');
        //2. 构造要修改的数据
        $arr = array(
            //修改数据时必须使用主键，TP会自动认为主键时修改条件
            'sno' => 10002,
            'sage' => 27,
            'sdept' => 9
        );
        //2. 调用save方法进行数据修改
        $m->save($arr);
    }
    
    function del_test(){
        //1.实例化数据表模型
        $model = D('Student');
        //2. 调用delete进行删除,根据主键来删除
        $model->delete(10001);
    }
    
    function find_test(){
        $model = D('Student');
        //find方法的参数只能是主键
        //$arr = $model->find(10002);
        // 如果find不给参数，会查询数据表的第一行数据
        $arr = $model->find();
        dump($arr);
    }
    
    function select_test(){
        $model = D('Student');
        $list = $model->select();
        dump($list);
    }
    
    function where_test(){
        //1. 实例化student表模型
        $student = D('Student');
        //2. 调用where连贯操作
        $data = $student->where('sno>10003')->select();
        // 查看最后一条执行的SQL语句
        echo $student->getLastSql();
        echo "<hr />";
        dump($data);
    }

    function where_test1(){
        //1. 实例化student表模型
        $student = D('Student');
        //2. 调用where连贯操作
        $data = $student->where('sno>10003 and ssex="女"')->select();
        echo $student->getLastSql();
        echo "<hr />";
        dump($data);
    }
    
    function order_test(){
        //1. 实例化student表模型
        $student = D('Student');
        //2. 调用where查询，order排序
        // 连贯操作中的方法是没有顺序的
        $data = $student->order('sno desc')->where('sno>10003 and ssex="男"')->select();
        echo $student->getLastSql();
        echo "<hr />";
        dump($data);
    }
    
    function group_test(){
        //1. 实例化student表模型
        $student = D('Student');
        //2. 调用group方法
        $data = $student->field('ssex,count(*)')->group('ssex')->select();
        echo $student->getLastSql();
        echo "<hr />";
        dump($data);
    }
    
    function group_test1(){
        //1. 实例化student表模型
        $student = D('Student');
        //2. 调用group、where、field连贯操作
        $data = $student->field('ssex,count(*) num')
            ->where('sno>10003')->group('ssex')->select();
        echo $student->getLastSql();
        echo "<hr />";
        dump($data);
    }
    
    function limit_test(){
        //1. 实例化student表模型
        $student = D('Student');
        $data = $student->where('sno>10002 and ssex="女"')
                ->order('sno desc')
                ->limit(1,2)
                ->select();
        echo $student->getLastSql();
        echo "<hr />";
        dump($data);
    }
    
    function table_test(){
        //1. 实例化空表模型
        $model = D();
        //2. 调用table方法设置要连接查询的数据表
        $data = $model
            // 使用table方法时，需要指定查询字段
            ->field('s.sno,s.sname,d.name')
            ->table('tp_student s,tp_department d')
            //->where('tp_student.sdept=tp_department.id')
            ->select();
        echo $model->getLastSql();
        echo "<hr />";
        dump($data);
    }
    
    function join_test(){
        //1. 实例化student模型（左表模型）
        $student = D('Student');
        //2. 调用join方法来进行查询
        // alias方法为student设置别名
        $data = $student->alias('s')
            ->join('tp_department d on s.sdept=d.id')
            ->select();
        echo $student->getLastSql();
        echo "<hr />";
        dump($data);
    }
    
    function join_test1(){
        //1. 实例化student模型（左表模型）
        $student = D('Student');
        //2. 调用join方法来进行查询
        // alias方法为student设置别名
        $data = $student->alias('s')
        ->join('left join tp_department d on s.sdept=d.id')
        ->select();
        echo $student->getLastSql();
        echo "<hr />";
        dump($data);
    }
    
    function count_test(){
        //1. 实例化student模型（左表模型）
        $student = D('Student');
        //2. 调用count进行统计
        echo $student->count();
    }
    
    function max_test(){
        //1. 实例化student模型（左表模型）
        $student = D('Student');
        //2. 调用count进行统计
        echo $student->max('sage');
    }
    
    function min_test(){
        //1. 实例化student模型（左表模型）
        $student = D('Student');
        //2. 调用count进行统计
        echo $student->min('sage');
    }
    
    function avg_test(){
        //1. 实例化student模型（左表模型）
        $student = D('Student');
        //2. 调用count进行统计
        echo $student->avg('sage');
    }
    
    function sum_test(){
        //1. 实例化student模型（左表模型）
        $student = D('Student');
        //2. 调用count进行统计
        echo $student->sum('sage');
    }
    
    function query_test(){
        //1. 实例化空表模型
        // 如果D方法中没有参数，则实例化Model.class.php基类模型
        $model = D();
        //2. 编写SQL语句
        $sql = "SELECT * FROM tp_student s
                LEFT JOIN tp_department d ON s.sdept=d.id
                WHERE d.name IN ('软件工程','网络工程')
                AND s.sno>10002 AND s.ssex='女' 
                ORDER BY sage DESC";
        //3. 使用query查询
        $data = $model->query($sql);
        dump($data);
    }
    
    function execute_test(){
        //1. 实例化空表模型
        $model = D(); 
        //2. 编写sql语句
        $sql = "insert into tp_student value(null, '金克斯', 18, '女', 4)";
        //3. 使用execute执行SQL
        echo $model->execute($sql);
    }
}


















