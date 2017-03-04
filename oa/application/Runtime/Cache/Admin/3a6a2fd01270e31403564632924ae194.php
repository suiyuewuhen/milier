<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="/Public/Admin/css/base.css" />
<link rel="stylesheet" href="/Public/Admin/css/info-mgt.css" />
<link rel="stylesheet" href="/Public/Admin/css/WdatePicker.css" />
<!-- iDialog核心文件路径 -->
<script src="/Public/Common/iDialog/jquery-1.8.3.min.js"></script>
<script src="/Public/Common/iDialog/jquery.iDialog.js" dialog-theme="default"></script>

<title>移动办公自动化系统</title>
<style type='text/css'>
	table tr .num {width:50px;}
	table tr .name {width:320px;}
	table tr .process {width:80px;}
	table tr .file {width:80px; padding-left:13px;}
	table tr .node {width:80px;}
	table tr .addtime {width:80px;}
	.i-content {height:400px; overflow:auto;}
</style>
</head>

<body>
<div class="title"><h2>信息管理</h2></div>
<div class="table-operate ue-clear">
	<a href="/thinkoa/index.php/admin/doc/add" class="add">添加</a>
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
				<th class="file">附件下载</th>
                <th class="node">作者</th>
                <th class="time">添加时间</th>
                <th class="operate">操作</th>
            </tr>
        </thead>
        <tbody>
        	<?php if(is_array($doc_list)): foreach($doc_list as $key=>$vo): ?><tr>
            	<td class="num"><?php echo ($vo["doc_id"]); ?></td>
                <td class="name"><?php echo ($vo["doc_title"]); ?></td>
                <td class="process">
                	<a class='show' onclick="show(<?php echo ($vo["doc_id"]); ?>)">查看全文</a>
                </td>
				<td class="file">
					<?php if($vo["doc_file"] == 'kong' ): ?>无附件
					<?php else: ?>
					<a href="<?php echo U('download', 'id='.$vo[doc_id]);?>">附件下载</a><?php endif; ?>
				</td>
                <td class="node"><?php echo ($vo["user_nickname"]); ?></td>
                <td class="time"><?php echo (date('Y-m-d H:i:s',$vo["doc_ctime"])); ?></td>
                <td class="operate">
                	<input type='checkbox' name='checkbox' value='2' />
                </td>
            </tr><?php endforeach; endif; ?>
        </tbody>
    </table>
</div>
</body>
 <script type="text/javascript" src="/Public/Admin/js/jquery.js"></script> 
<script type="text/javascript" src="/Public/Admin/js/common.js"></script>
<script type="text/javascript" src="/Public/Admin/js/core.js"></script>
<script type="text/javascript" src="/Public/Admin/js/WdatePicker.js"></script>
<script type="text/javascript" src="/Public/Admin/js/jquery.pagination.js"></script>
<script type="text/javascript">
//定义页面载入事件
/*$(function()
{
	//alert(12344);
	iDialog({
		title:'hello world',
		id:'DemoDialog',
		content:'<p>大家好:<br> 有个傻子</p>',
		lock:true,
		width:210,
		fixed:false,
		height:210
	});
});*/



function show(id)
{
	//参数1: 要访问的后台PHP程序的路径
	//参数2: 传递的参数，json对象。
	// get有可能会产生缓存，所以在传值时必须增加一个随机数 {'id':id, '_':Math.random()}
	//参数3: 当onReadyStates值等于4时的触发函数，参数是后台返回的结果
	//参数4: 返回值类型，text，json，xml
	$.post("<?php echo U('getDoc');?>", {'id':id}, function(msg)
	{
		//alert(msg);die;
		iDialog
		({
		    title: msg.doc_title,
		    content: msg.doc_content,
		    lock: true,
		    width:800,
		    fixed: true,
		    height:500
		});
	}, 'json');
}
//定义页面载入事件
$(function(){
	
});
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