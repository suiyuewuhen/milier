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
            	<th class="num">序号</th>
                <th class="name">姓名</th>
                <th class="nickname">昵称</th>
                <th class="dept">部门</th>
                <th class="sex">性别</th>
                <th class="birthday">生日</th>
                <th class="tel">电话</th>
                <th class="email">邮箱</th>
                <th class="ctime">添加时间</th>
                <th class="operate">操作</th>
            </tr>
        </thead>
        <tbody>
        	<?php if(is_array($user_list)): $i = 0; $__LIST__ = $user_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
            	<td class="num"><?php echo ($vo["user_id"]); ?></td>
                <td class="name"><?php echo ($vo["user_name"]); ?></td>
                <td class="nickname"><?php echo ($vo["user_nickname"]); ?></td>
                <td class="dept"><?php echo ($vo["user_deptid"]); ?></td>
                <td class="sex"><?php echo ($vo["user_sex"]); ?></td>
                <td class="birthday"><?php echo (date('Y-m-d',$vo["birthday"])); ?></td>
                <th class="tel"><?php echo ($vo["user_tel"]); ?></th>
                <th class="email"><?php echo ($vo["user_email"]); ?></th>
                <th class="ctime"><?php echo ($vo["user_ctime"]); ?></th>
                <th class="operate">操作</th>
            </tr><?php endforeach; endif; else: echo "" ;endif; ?>
            
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
$(".select-title").on("click",function(){
	$(".select-list").hide();
	$(this).siblings($(".select-list")).show();
	return false;
})
$(".select-list").on("click","li",function(){
	var txt = $(this).text();
	$(this).parent($(".select-list")).siblings($(".select-title")).find("span").text(txt);
})

$('.pagination').pagination(<?php echo ($count); ?>,{
	//点击分页导航条中页面的触发函数
	// page: 点击的页号，但是少1
	callback: function(page){
		//实际页号应该为 page+1
		//alert(page+1);
		$.get("<?php echo U('getContent');?>", {'p':page+1}, function(msg){
			//alert(msg);
			// 获取tbody对象，用后台取得数据覆盖原来的数据
			$('tbody').html(msg);
		},'text');
	},
	// 是否显示左侧的分页信息
	display_msg: false,
	// 是否显示使用页号进行跳转
	setPageNo: false,
	// 每页显示多少条记录
	items_per_page : <?php echo ($pagesize); ?>, 
});

$("tbody").find("tr:odd").css("backgroundColor","#eff6fa");

showRemind('input[type=text], textarea','placeholder');
</script>
</html>