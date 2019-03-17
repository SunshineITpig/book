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
	    <script type="text/javascript" src="/book/Public/Develop/JS/jquery-3.2.1.min.js"></script>
		<script type="text/javascript" src="/book/Public/Develop/JS/public.js"></script>
	</head>

	<body>
		<!-- -  单元信息显示 begin - -->
		<div id="cellboardInfo" class="box round first" style="margin-top: 5px;">
		    <h2 id="infoTitle" style="height: 20px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;查看账号</h2>
		    <div id="infoBody" class="block">
				<table class="table">
					<tr>
						<th>UID</th>
						<th>账号</th>
					</tr>
					<?php if(is_array($category)): $i = 0; $__LIST__ = $category;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$n): $mod = ($i % 2 );++$i;?><tr>	
							<td><?php echo ($n["id"]); ?></td>
							<td><?php echo ($n["username"]); ?></td>	
						</tr><?php endforeach; endif; else: echo "" ;endif; ?>
				</table>
				<div class="page">
					<?php echo ($page); ?>
				</div>
		    </div>
		</div>
		<!-- -  单元信息显示 end - -->
	</body>

</html>