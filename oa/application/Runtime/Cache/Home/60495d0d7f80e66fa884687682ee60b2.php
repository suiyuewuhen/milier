<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Insert title here</title>
</head>
<body>
<form action="<?php echo U('addOk');?>" method="post">
学生名:<input type="text" name="name" /><br>
密码：<input type="text" name="passwd" /><br>
密码确认:<input type="text" name="re-passwd" /><br>
年龄:<input type="text" name="age" /><br>
性别:<input type="text" name="sex" /><br>
<input type="submit" value="注册" />
</form>
</body>
</html>