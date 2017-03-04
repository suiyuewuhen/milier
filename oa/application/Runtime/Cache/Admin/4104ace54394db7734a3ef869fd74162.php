<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="/Public/Admin/css/base.css" />
<link rel="stylesheet" href="/Public/Admin/css/info-reg.css" />
<title>移动办公自动化系统</title>
</head>

<body>
<div class="title"><h2>信息登记</h2></div>
<form action="<?php echo U('addOk');?>" method="post">
<div class="main">
    <p class="short-input ue-clear">
    	<label>部门名称：</label>
        <input type="text" name="name" placeholder="部门名称" />
    </p>
    <div class="short-input select ue-clear">
    	<label>上级部门：</label>
        <select name="pid">
        	<option value="0">顶级部门</option>
        	<?php if(is_array($dept_list)): foreach($dept_list as $key=>$vo): ?><option value="<?php echo ($vo["dept_id"]); ?>"><?php echo ($vo["dept_name"]); ?></option><?php endforeach; endif; ?>
		</select>
    </div>
    <p class="short-input ue-clear">
    	<label>排序：</label>
        <input type="text" name="sort" />
    </p>
    <p class="short-input ue-clear">
    	<label>备注信息：</label>
        <textarea name="remark" placeholder="请输入内容"></textarea>
    </p>
</div>
<div class="btn ue-clear">
	<a href="javascript:;" class="confirm">确定</a>
    <a href="javascript:;" class="clear">清空内容</a>
</div>
</form>
</body>
<script type="text/javascript" src="/Public/Admin/js/jquery.js"></script>
<script type="text/javascript" src="/Public/Admin/js/common.js"></script>
<script type="text/javascript" src="/Public/Admin/js/WdatePicker.js"></script>
<script type="text/javascript">
//1. 获取“确定”标签对象,并注册点击事件(类选择器)
$('.confirm').click(function(){
	//2. 获取form标签对象(标签选择器)
	//submit是jquery内置的表单提交事件
	$('form').submit();
});

$(".select-title").on("click",function(){
	$(".select-list").toggle();
	return false;
});
$(".select-list").on("click","li",function(){
	var txt = $(this).text();
	$(".select-title").find("span").text(txt);
});


showRemind('input[type=text], textarea','placeholder');
</script>
</html>