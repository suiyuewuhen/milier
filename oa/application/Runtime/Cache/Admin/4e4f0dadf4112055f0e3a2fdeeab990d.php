<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="/Public/Admin/css/base.css" />
<link rel="stylesheet" type="text/css" href="/Public/Admin/css/jquery.dialog.css" />
<link rel="stylesheet" href="/Public/Admin/css/index.css" />
<link rel="stylesheet" href="/Public/Common/lobibox/dist/css/Lobibox.min.css"/>
<script src="/Public/Common/lobibox/lib/jquery.1.11.min.js"></script>
<script src="/Public/Common/lobibox/js/Lobibox.js"></script>
<title>移动办公自动化系统</title>
<style type="text/css">
.lobibox-notify.lobibox-notify-default {
    border-color: red;
    background-color: green;
    color: blue;
}

.lobibox-notify.lobibox-notify-default:hover {
    border-color: red;
    background-color: green;
    color: blue;
}
</style>
</head>

<body>
<div id="container">
  <div id="hd">
    <div class="hd-wrap ue-clear">
      <div class="top-light"></div>
      <h1 class="logo"></h1>
      <div class="login-info ue-clear">
        <div class="welcome ue-clear" style="width:150px"><span>欢迎您,</span><a href="javascript:;" class="user-name"><?php echo (session('nickname')); ?></a></div>
        <div class="login-msg ue-clear" style="width:180px"> 
        	<a href="javascript:;" class="msg-txt">未读邮件</a> 
        	<a href="javascript:;" class="msg-num">2</a> 
        </div>
      </div>
      <div class="toolbar ue-clear"> <a href="javascript:;" class="home-btn">首页</a> <a href="javascript:;" class="quit-btn exit"></a> </div>
    </div>
  </div>
  <div id="bd">
    <div class="wrap ue-clear">
      <div class="sidebar">
        <h2 class="sidebar-header">
          <p>功能导航</p>
        </h2>
        <ul class="nav">


          <?php if(is_array($levelA)): foreach($levelA as $key=>$vo): ?><li class="<?php echo ($vo["node_title"]); ?>">
              <div class="nav-header">
               	 <a href="javascript:;" class="ue-clear">
                	<span><?php echo ($vo["node_name"]); ?></span><i class="icon"></i>
                 </a>
              </div>
           <ul class="subnav">
              <?php if(is_array($levelB)): foreach($levelB as $key=>$v): if($vo["node_id"] == $v["node_pid"] ): ?><li>
                  <a href="javascript:;" date-src="<?php echo U($v[node_controller].'/'.$v[node_action]);?>"><?php echo ($v["node_name"]); ?>
                  </a>
                </li><?php endif; endforeach; endif; ?>



            
          </ul>
          </li><?php endforeach; endif; ?>
        </ul>
      </div>
      <div class="content">
        <iframe src="<?php echo U('home');?>" id="iframe" width="100%" height="100%" frameborder="0"></iframe>
      </div>
    </div>
  </div>
  <div id="ft" class="ue-clear">
    <div class="ft-left"> <span>中国移动</span> <em>Office&nbsp;System</em> </div>
    <div class="ft-right"> <span>Automation</span> <em>V2.0&nbsp;2014</em> </div>
  </div>
</div>
<div class="exitDialog">
  <div class="dialog-content">
    <div class="ui-dialog-icon"></div>
    <div class="ui-dialog-text">
      <p class="dialog-content">你确定要退出系统？</p>
      <p class="tips">如果是请点击“确定”，否则点“取消”</p>
      <div class="buttons">
        <input type="button" class="button long2 ok" value="确定" />
        <input type="button" class="button long2 normal" value="取消" />
      </div>
    </div>
  </div>
</div>
</body>
<script type="text/javascript" src="/Public/Admin/js/common.js"></script>
<script type="text/javascript" src="/Public/Admin/js/core.js"></script>
<script type="text/javascript" src="/Public/Admin/js/jquery.dialog.js"></script>
<script type="text/javascript" src="/Public/Admin/js/index.js"></script>
<script type="text/javascript">
//定义访问后台PHP的ajax程序
function getEmails(){
	$.ajax({
		// 定义访问的后台PHP程序的名称
		'url':"<?php echo U('getEmails');?>",
		//定义访问类型
		'type':'post',
		// 定义异步
		'async':true,
		// 定义返回值类型
		'dataType':'text',
		// 定义成功后的触发事件
		'success':function(data){
			//alert(msg);
			// 获取当前页面显示的已有未读邮件的数量
			var old_num = $('.msg-num').html();
			// 判断已显示未读邮件数是否小于最新获取的未读邮件数
			if(data - old_num > 0){
				//更新当前页面中未读邮件的数量
				$('.msg-num').html(data);
				//alert('您有新邮件，请注意查收');
				Lobibox.notify('default', {
					// 通知栏的标题
					'title': '新邮件提醒',
					// 通知栏的内容
				    'msg': '您有'+data+'封新邮件，请注意查收',
				    // 宽高
				    'width': 400,
				    'height': 'auto',
				    // 声音
				    'soundExt': '.ogg',
				    'soundPath': '/Public/Common/lobibox/sounds/',
				    'sound': 'sound1',
				    // 头像
				    'img': '/Public/Common/lobibox/demo/img/1.jpg',
				    // 设置消失时间
				    'delay': false
				});
			}
		}
	});
}
//定义每隔5秒，执行getEmails函数
setInterval("getEmails()", 1000);
</script>
</html>