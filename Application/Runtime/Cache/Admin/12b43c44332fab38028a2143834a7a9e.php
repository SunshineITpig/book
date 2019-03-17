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
		    <h2 id="infoTitle" style="height: 20px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;添加账号</h2>
		    <div id="infoBody" class="block">
				<form action="<?php echo U('add');?>" method="post">
					<table class="table">
						<tr>
							<td>起始账号</td>
							<td><input type="text" name="start"/></td>
						</tr>
						<tr>
							<td>添加人数</td>
							<td><input type="text" name="num"/></td>
						</tr>
						<tr>
							<td>设置密码</td>
							<td><input type="text" name="psw"/></td>
						</tr>
						<tr>
							<td colspan="2">
								<input type="submit" value="添加" class="input_button"/>
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