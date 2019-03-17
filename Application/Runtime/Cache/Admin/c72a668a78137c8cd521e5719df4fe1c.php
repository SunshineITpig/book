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
		<h2 id="infoTitle" style="height: 20px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;举报信息</h2>
		    <div id="infoBody" class="block">
				<table class="table">
					<tr>
						<th>LID</th>
						<th>举报内容</th>
						<th>举报人</th>
						<th>时间</th>
						<th>操作</th>
					</tr>
					<?php if(is_array($category)): $i = 0; $__LIST__ = $category;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$n): $mod = ($i % 2 );++$i;?><tr>	
							<td><?php echo ($n["lid"]); ?></td>
							<td><?php echo ($n["content"]); ?></td>
							<?php if($n["from"] == 0): ?><td>匿名</td>
							<?php else: ?>
								<td><?php echo ($n["from"]); ?></td><?php endif; ?>
							<td><?php echo (date('Y-m-d  H:i:s',$n["rtime"])); ?></td>
							<td>
								<a href="<?php echo U('del' , array('lid'=>$n['lid']));?>" class="del">[删除]</a>
							</td>	
						</tr><?php endforeach; endif; else: echo "" ;endif; ?>
				</table>
				<div class="page">
					<?php echo ($page); ?>
				</div
		    </div>
		</div>
		<!-- -  单元信息显示 end - -->
	</body>

</html>