<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="/Public/Admin/css/base.css" />
<link rel="stylesheet" href="/Public/Admin/css/info-mgt.css" />
<link rel="stylesheet" href="/Public/Admin/css/WdatePicker.css" />
<title>移动办公自动化系统</title>
<style type='text/css'>
	table tr .num {width:50px;}
	table tr .name {width:320px;}
	table tr .process {width:80px;}
	table tr .file {width:115px; padding-left:13px;}
	table tr .file img {margin-top:5px;}
	table tr .node {width:80px;}
	table tr .addtime {width:80px;}
	.i-content {height:400px; overflow:auto;}
</style>
</head>

<body>
<div class="title"><h2>信息管理</h2></div>
<div class="table-operate ue-clear">
	<a href="javascript:;" class="add">添加</a>
    <a href="javascript:;" class="del" id='btnDel'>删除</a>
    <a href="javascript:;" class="edit" id='btnEdit'>编辑</a>
</div>
<div class="table-box">
	<table>
    	<thead>
        	<tr>
            	<th class="num">序号</th>
                <th class="name">标题</th>
                <th class="process">内容</th>
				<th class="file">缩略图</th>
                <th class="node">作者</th>
                <th class="time">添加时间</th>
                <th class="operate">操作</th>
            </tr>
        </thead>
        <tbody>
        	<tr>
            	<td class="num">4</td>
                <td class="name">微信硬件平台——合作伙伴沟通会(PPT)</td>
                <td class="process">
                	<a class='show'>查看全文</a>
                </td>
				<td class="file">
					<img src='/Uploads/knowledge/2016-04-06/sm_57048ae6bd358.png' />
				</td>
                <td class="node">任逍遥</td>
                <td class="time">2016-04-06 12:04:54</td>
                <td class="operate">
                	<input type='checkbox' name='checkbox' value='4' />
                </td>
            </tr><tr>
            	<td class="num">3</td>
                <td class="name">App Annie：美国各年龄段用户的应用使用行为（中文版）</td>
                <td class="process">
                	<a class='show'>查看全文</a>
                </td>
				<td class="file">
					<img src='/Uploads/knowledge/2016-04-06/sm_57048a58d9034.png' />
				</td>
                <td class="node">任逍遥</td>
                <td class="time">2016-04-06 12:02:32</td>
                <td class="operate">
                	<input type='checkbox' name='checkbox' value='3' />
                </td>
            </tr><tr>
            	<td class="num">2</td>
                <td class="name">2015中国媒体消费者调研报告——中美媒体消费者画像</td>
                <td class="process">
                	<a class='show'>查看全文</a>
                </td>
				<td class="file">
					<img src='/Uploads/knowledge/2016-04-06/sm_570489c0a35fa.png' />
				</td>
                <td class="node">任逍遥</td>
                <td class="time">2016-04-06 12:00:00</td>
                <td class="operate">
                	<input type='checkbox' name='checkbox' value='2' />
                </td>
            </tr>        </tbody>
    </table>
</div>
</body>
<script type="text/javascript" src="/Public/Admin/js/jquery.js"></script>
<script type="text/javascript" src="/Public/Admin/js/common.js"></script>
<script type="text/javascript" src="/Public/Admin/js/core.js"></script>
<script type="text/javascript" src="/Public/Admin/js/WdatePicker.js"></script>
<script type="text/javascript" src="/Public/Admin/js/jquery.pagination.js"></script>
<script type="text/javascript">	
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