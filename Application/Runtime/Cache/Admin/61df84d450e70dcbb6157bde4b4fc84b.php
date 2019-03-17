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
		    <h2 id="infoTitle" style="height: 20px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;修改楼层</h2>
		    <div id="infoBody" class="block">
				<form action="<?php echo U('edit');?>" method="post">
					<table class="table">
						<tr>
							<td>栏目楼层</td>
							<td><input type="text" name="fname" value="<?php echo ($category["fname"]); ?>"/></td>
						</tr>
						<tr>
							<td>开启状态</td>
							<?php if($category["isoff"] == 0): ?><td>
									<input type="radio" name="isoff" value="0" checked="checked"/>开启
									<input type="radio" name="isoff" value="1" />关闭
								</td>
							<?php else: ?>
								<td>
									<input type="radio" name="isoff" value="0" />开启
									<input type="radio" name="isoff" value="1" checked="checked" />关闭
								</td><?php endif; ?>
						</tr>
						<tr>
							<td>列</td>
							<td><input type="text" name="col" value="<?php echo ($category["column"]); ?>"/></td>
						</tr>
						<tr>
							<td>座位图</td>
							<td>
								<textarea name="seatmap" id="description" class="textarea"><?php echo ($category["content"]); ?></textarea>
							</td>
						</tr>
						<tr>
							<td colspan="2">
								<input type="hidden" name="cid" value="<?php echo ($category["fid"]); ?>"/>
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