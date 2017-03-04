<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="/Public/Admin/css/base.css" />
<link rel="stylesheet" href="/Public/Admin/css/info-reg.css" />

<link href="/Public/Common/ueditor/themes/default/css/umeditor.css" type="text/css" rel="stylesheet">
<script type="text/javascript" src="/Public/Common/ueditor/third-party/jquery.min.js"></script>
<script type="text/javascript" charset="utf-8" src="/Public/Common/ueditor/umeditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="/Public/Common/ueditor/umeditor.min.js"></script>
<script type="text/javascript" src="/Public/Common/ueditor/lang/zh-cn/zh-cn.js"></script>

<title>移动办公自动化系统</title>
</head>

<body>
<div class="title"><h2>信息登记</h2></div>
<form action="<?php echo U('addOk');?>" method="post" enctype='multipart/form-data'>
<div class="main">
    <p class="short-input ue-clear">
    	<label>标题：</label>
        <input name="title" type="text" placeholder="公文标题" />
    </p>
	<p class="short-input ue-clear">
    	<label>附件：</label>
        <input type="file" name="file" />
    </p>
    <p class="short-input ue-clear" style="float:left;">
    	<label>内容：</label>
    </p>
	<p style='width:900px; padding-left:0; float:left;'>
		<textarea name="content" id="content"></textarea>
	</p>
	<div style='clear:both;'></div>
</div>
<div class="btn ue-clear">
	<a href="javascript:;" class="confirm" id='btnSubmit'>确定</a>
    <a href="javascript:;" class="clear" id='btnReset'>清空内容</a>
</div>
</form>
</body>

<script type="text/javascript" src="/Public/Admin/js/common.js"></script>
<script type="text/javascript" src="/Public/Admin/js/WdatePicker.js"></script>
<script type="text/javascript">
//实例化富文本编辑器
var um = UM.getEditor('content', {
	// 设置富文本编辑器的宽高
	'initialFrameWidth': 700,
	'initialFrameHeight': 300,
	// 自定义工具栏
	'toolbar':[
	            'source | undo redo | bold italic underline strikethrough | superscript subscript | forecolor backcolor | removeformat |',
	            'insertorderedlist insertunorderedlist | selectall cleardoc paragraph | fontfamily fontsize' ,
	            '| justifyleft justifycenter justifyright justifyjustify |',
	            'link unlink | emotion image video  | map',
	            '| horizontal print preview fullscreen', 'drafts', 'formula'
	        ],
	'isShow' : true,
});
$(function(){   //$(document).ready()
	//获取确定的标签对象，并绑定点击事件
	$('#btnSubmit').bind('click',function(){
		// 提交表单  submit是jquery内置的表单提交方法
		$('form').submit();
	});
	
	// 获取清空内容标签对象，绑定点击事件
	$('#btnReset').bind('click',function(){
		// 复原表单。 原生js的表单重置方法
		$('form')[0].reset();
		// 重置富文本编辑器的方法
		// 设置重置的内容
		um.setContent("编辑器内部变量已经被重置!");
        // 执行重置操作
		um.reset();
	});
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