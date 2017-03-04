<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="/Public/Admin/css/base.css" />
<link rel="stylesheet" href="/Public/Admin/css/info-mgt.css" />
<link rel="stylesheet" href="/Public/Admin/css/WdatePicker.css" />
<title>移动办公自动化系统</title>
</head>

<body>
<div class="title"><h2>信息管理</h2></div>
<div class="table-operate ue-clear">
	<a href="javascript:;" class="add">添加</a>
    <a href="javascript:;" class="del">删除</a>
    <a href="javascript:;" class="edit">编辑</a>
    <a href="javascript:;" class="count">统计</a>
    <a href="javascript:;" class="check">审核</a>
</div>
<div class="table-box">
	<table>
    	<thead>
        	<tr>
        		<th style="width:20px"></th>
            	<th class="num">序号</th>
                <th class="name">部门名称</th>
                <th class="process">上级部门</th>
                <th class="node">排序</th>
                <th class="time">备注信息</th>
                <th class="operate">操作</th>
            </tr>
        </thead>
        <tbody>
        	<?php if(is_array($dept_list)): foreach($dept_list as $key=>$vo): ?><tr>
        		<td><input type="checkbox" value="<?php echo ($vo["dept_id"]); ?>"></td>
            	<td class="num"><?php echo ($vo["dept_id"]); ?></td>
                <td class="name">
                	<?php echo (str_repeat('&nbsp;&nbsp;&nbsp;&nbsp;',$vo["dept_level"])); echo ($vo["dept_name"]); ?>
                </td>
                <td class="process"><?php echo ((isset($vo["dname"]) && ($vo["dname"] !== ""))?($vo["dname"]):"顶级部门"); ?></td>
                <td class="node"><?php echo ($vo["dept_sort"]); ?></td>
                <td class="time"><?php echo ($vo["dept_remark"]); ?></td>
                <td class="operate">
                	<a href="<?php echo U('edit', 'id='.$vo[dept_id]);?>">编辑</a>&nbsp;&nbsp;&nbsp;&nbsp;
                	<a href="<?php echo U('del', 'id='.$vo[dept_id]);?>">删除</a>
                </td>
            </tr><?php endforeach; endif; ?>
        </tbody>
    </table>
</div>
<div class="pagination ue-clear"></div>
</body>
<script type="text/javascript" src="/Public/Admin/js/jquery.js"></script>
<script type="text/javascript" src="/Public/Admin/js/common.js"></script>
<script type="text/javascript" src="/Public/Admin/js/WdatePicker.js"></script>
<script type="text/javascript" src="/Public/Admin/js/jquery.pagination.js"></script>
<script type="text/javascript">
//1. 为删除按钮注册点击事件
$('.del').click(function(){
	//2. 获取所有复选框 $(':checkbox')
	// 获取所有选中的复选框, check类似于数组的对象
	var check = $(':checkbox:checked');
	// jquery遍历类似于数组对象时，使用each方法
	// check对象中包含多个选中的checkbox对象
	// str字符串用来保存取出的dept_id的拼接结果
	var str = ''; 
	check.each(function(){
		// $(this) 每次循环取出的checkbox对象
		var dept_id = $(this).val();
		// 将取出的dept_id值拼接到str中
		str = str + dept_id + ','
	})
	// 截取掉最后一个 ,
	str = str.substr(0, str.length - 1);
	// /Admin/Dept : index.php/Admin/Dept
	location.href = '/Admin/Dept/dels/ids/'+str;
})


$(".select-title").on("click",function(){
	$(".select-list").hide();
	$(this).siblings($(".select-list")).show();
	return false;
})
$(".select-list").on("click","li",function(){
	var txt = $(this).text();
	$(this).parent($(".select-list")).siblings($(".select-title")).find("span").text(txt);
})

$('.pagination').pagination(100,{
	callback: function(page){
		alert(page);	
	},
	display_msg: true,
	setPageNo: true
});

$("tbody").find("tr:odd").css("backgroundColor","#eff6fa");

showRemind('input[type=text], textarea','placeholder');
</script>
</html>