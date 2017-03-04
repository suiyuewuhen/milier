<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="/Public/Admin/css/base.css" />
<link rel="stylesheet" href="/Public/Admin/css/info-reg.css" />
<title>移动办公自动化系统</title>
<style type='text/css'>
	select {
		background: rgba(0, 0, 0, 0) url("/Public/Admin/images/inputbg.png") repeat-x scroll 0 0;
	    border: 1px solid #c5d6e0;
	    height: 28px;
	    outline: medium none;
	    padding: 0 10px;
	    width: 240px;
	}
	textarea {
		width:800px;
	}
	#tip {
		position:absolute;
		z-index:999;
		top:96px;
		left:114px;
		width:260px;
		height:auto;
		display:none;
		background:#fff;
		border:1px #C5D6E0 solid;
	}
	#tip div {
		padding:0 10px;
	}
</style>
</head>

<body>
<div class="title"><h2>信息登记</h2></div>
<form action="/thinkoa/index.php/Admin/Email/addOk" method="post" enctype='multipart/form-data'>
<div class="main">
	<p class="short-input ue-clear">
    	<label>收件人：</label>
        <input name="truename" id='truename' type="text" placeholder="收件人名称" autocomplete='off' />
		<div id='tip'></div>
    </p>
    <p class="short-input ue-clear">
    	<label>主题：</label>
        <input name="title" type="text" placeholder="邮件主题" />
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
<script type="text/javascript" src="/Public/Admin/js/jquery.js"></script>
<script type="text/javascript" src="/Public/Admin/js/common.js"></script>
<script type="text/javascript" src="/Public/Admin/js/WdatePicker.js"></script>
<script type="text/javascript">
$('#btnSubmit').click(function(){
	$('form').submit();
});
//获取收件人文本框标签,注册键盘弹起事件
$('#nickname').keyup(function()
{
	//2.弹起是获取文本框内容
	var name=$(this).val();
	//3.将name发送到后台php程序
	$.ajax(
	{
		'url':"<?php echo U('getNames');?>",
		'type':'get',
		'cache':false,
		'data':{'name':name},
		'dataType':'json',
		'async':true,
		'success':function(msg)
		{
			//alert('msg'+msg);
			//获取下拉菜单
			var tip=$('#tip');
			//清空下拉菜单
			tip.empty();
			//循环返回的json对象,取出每个user_nickname
			for(i=0;i<msg.length;i++)
			{
				//alert(msg[i].user_nickname);
				//创建div标签
				var div = $('<div>');
				//将取出的用户名添加到div标签中
				div.html(msg[i].user_nickname);
				//为div标签增加鼠标悬浮事件,悬浮时背景变为蓝色
				div.mouseover(function()
				{
					$(this).css({'background-color':'blue'});
				})
				//位div增加鼠标移除事件,移除后背景恢复白色
				div.mouseout(function()
				{
					$(this).css({'background-color';'white'});
				})
				//为div增加单击事件,将选中的div中的内容填写收件人文本框中
				div.click(function()
				{
					//获取选中的用户名
					var tmp=$(this).html();
					//将用户名填入收件人文本框中
					$('#nickname').val(tmp);
					//选择完成后,隐藏下拉菜单
					tip.hide();
				})
				//将div追加到tip标签中 
				tip.append(div);
			}
			tip.show();
		}
	});
})



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