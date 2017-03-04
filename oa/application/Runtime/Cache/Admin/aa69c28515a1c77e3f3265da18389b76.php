<?php if (!defined('THINK_PATH')) exit(); if(is_array($user_list)): $i = 0; $__LIST__ = $user_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
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