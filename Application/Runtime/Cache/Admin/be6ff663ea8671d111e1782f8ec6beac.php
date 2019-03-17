<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
	    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
	    <title></title>
	    <link rel="stylesheet" type="text/css" href="/book/Public/Base/CSS/reset.css" media="screen" />
	    <link rel="stylesheet" type="text/css" href="/book/Public/Base/CSS/text.css" media="screen" />
	    <link rel="stylesheet" type="text/css" href="/book/Public/Base/CSS/grid.css" media="screen" />
	    <link rel="stylesheet" type="text/css" href="/book/Public/Base/CSS/layout.css" media="screen" />
	    <link rel="stylesheet" type="text/css" href="/book/Public/Base/CSS/nav.css" media="screen" />
	    <link rel="stylesheet" type="text/css" href="/book/Public/Base/CSS/jquery-ui.css" media="screen" />
	    <link rel="stylesheet" type="text/css" href="/book/Public/Develop/CSS/public.css" />
	</head>

	<body>
		<!-- -  单元信息显示 begin - -->
		<div id="cellboardInfo" class="box round first" style="margin-top: 5px;">
		    <h2 id="infoTitle" style="height: 20px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;修改密码</h2>
		    <div id="infoBody" class="block">
				<form action="<?php echo U('passwd');?>" method="post">
					<table class="table">
						<tr>
							<td>密码：</td>
							<td><input type="password" name="passwdF"/></td>
						</tr>
						<tr>
							<td>确认密码：</td>
							<td><input type="password" name="passwdS"/></td>
						</tr>
						<tr>
							<td colspan="2">
								<input type="submit" value="修改" class="input_button"/>
								<input type="reset" class="input_button"/>
							</td>
						</tr>
					</table>
				</form>
		    </div>
		</div>
		<!-- -  单元信息显示 end - -->
	</body>

</html>