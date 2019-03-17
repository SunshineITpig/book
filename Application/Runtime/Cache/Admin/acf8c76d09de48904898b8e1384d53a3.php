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
		    <h2 id="infoTitle" style="height: 20px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;编辑公告</h2>
		    <div id="infoBody" class="block">
		    	<form action="<?php echo U('add');?>" method="post" enctype="multipart/form-data">
					<table class="table">
						<tr>
							<td>内容</td>
							<td>
								<textarea id="editor_id" name="con" style="width:700px;height:300px;"></textarea>
							</td>
						</tr>
						<tr>
							<td colspan="2">
								<input type="submit" value="发表" class="input_button"/>
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