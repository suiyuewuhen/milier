<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="/Public/Admin/css/base.css" />
<link rel="stylesheet" href="/Public/Admin/css/info-mgt.css" />
<link rel="stylesheet" href="/Public/Admin/css/WdatePicker.css" />
<title>移动办公自动化系统</title>
<style type='text/css'>
	table tr .num{ width:63px; text-align: center;}
	table tr .name{ width:63px; padding-left:17px;}
	table tr .nickname{ width:63px; padding-left:13px;}
	table tr .dept{ width:63px; padding-left:13px;}
	table tr .role{ width:63px; padding-left:13px;}
	table tr .sex{ width:63px; padding-left:13px;}
	table tr .birthday{ width:63px; padding-left:13px;}
	table tr .tel{ width:63px; padding-left:13px;}
	table tr .email{ width:63px; padding-left:13px;}
	table tr .ctime{ width:63px; padding-left:13px;}
	table tr .operate{ width:63px; padding-left:15px;}
	table tr .operate a{ color:#2c7bbc;}
	table tr .operate a:hover{ text-decoration:underline;}
</style>
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
        		<th style="width:15px"></th>
            	<th class="num">序号</th>
                <th class="name">权限名</th>
                <th class="dept">父权限</th>
                <th class="role">模块名</th>
                <th class="sex">控制器名</th>
                <th class="birthday">方法名</th>
                <th class="tel">路径</th>
                <th class="operate">是否显示</th>
            </tr>
        </thead>
        <tbody>
        	<?php if(is_array($node_list)): foreach($node_list as $key=>$vo): ?><tr>
        		<td><input type="checkbox" value="<?php echo ($vo["node_id"]); ?>" /></td>
            	<td class="num"><?php echo ($vo["node_id"]); ?></th>
                <td class="name"><?php echo ($vo["node_name"]); ?></th>
                <td class="dept"><?php echo ($vo["node_pid"]); ?></th>
                <td class="role"><?php echo ($vo["node_module"]); ?></th>
                <td class="sex"><?php echo ($vo["node_controller"]); ?></th>
                <td class="birthday"><?php echo ($vo["node_action"]); ?></th>
                <th class="tel"><?php echo ($vo["node_path"]); ?></th>
                <th class="operate"><?php echo ($vo["node_show"]); ?></th>
            </tr><?php endforeach; endif; ?>
        
        </tbody>
    </table>
    <button id="btn">提交权限</button>
    <button id="all">全选</button>
    <button id="cancel">取消</button>
</div>
<div class="pagination ue-clear"></div>
</body>
<script type="text/javascript" src="/Public/Admin/js/jquery.js"></script>
<script type="text/javascript" src="/Public/Admin/js/common.js"></script>
<script type="text/javascript" src="/Public/Admin/js/WdatePicker.js"></script>
<script type="text/javascript" src="/Public/Admin/js/jquery.pagination.js"></script>
<script type="text/javascript">
//1. 获取提交权限按钮标签，注册点击事件
$('#btn').click(function(){
	//2. 获取已选中的复选框
	var check_list = $(':checkbox:checked');
	//3. 遍历check_list取出所有的value值，拼接成一个字符串
	var str = "";
	check_list.each(function(){
		// 取出value值，拼接到str中
		str += $(this).val() + ',';
	})
	//4. 去掉末尾的,
	str = str.substr(0, str.length - 1);
	//alert(str);
	//5. 将str发送到后台控制器, 注意将role_id随超链接发送到后台控制器
	location.href = '/Admin/Role/distributeOk/ids/'+str+'/roleid/'+<?php echo ($_GET['id']); ?>;
})
//获取全选按钮，注册点击事件
$('#all').click(function(){
	// 获取所有复选框
	var checkboxes = $(':checkbox');
	// 将checkbox中的checked属性全部设置为true
	checkboxes.each(function(){
		$(this).attr({'checked':true});
	})
});

$('#cancel').click(function(){
	// 获取所有复选框
	var checkboxes = $(':checkbox');
	// 将checkbox中的checked属性全部设置为true
	checkboxes.each(function(){
		$(this).attr({'checked':false});
	})
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