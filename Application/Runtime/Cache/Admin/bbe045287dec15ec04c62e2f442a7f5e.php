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
		    <h2 id="infoTitle" style="height: 20px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;查看楼层</h2>
		    <div id="infoBody" class="block">
				<table class="table">
					<tr>
						<th>FID</th>
						<th>楼层名称</th>
						<th>状态</th>
						<th>操作</th>
					</tr>
					<?php if(is_array($category)): $i = 0; $__LIST__ = $category;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$n): $mod = ($i % 2 );++$i;?><tr>	
							<td><?php echo ($n["fid"]); ?></td>
							<td><a href="<?php echo U('edit', array('fid'=>$n['fid']));?>"><?php echo ($n["fname"]); ?></a></td>
							<?php if($n["isoff"] == 0): ?><td>开启</td>
							<?php else: ?>
								<td>关闭</td><?php endif; ?>
							<td>
								<?php if($n["isoff"] == 0): ?><a href="<?php echo U('isoff', array('fid'=>$n['fid'], 'w'=>1));?>">[关闭]</a>
								<?php else: ?>
									<a href="<?php echo U('isoff', array('fid'=>$n['fid']));?>">[开启]</a><?php endif; ?>
								<a href="<?php echo U('edit', array('fid'=>$n['fid']));?>">[编辑]</a>
								<a href="<?php echo U('del' , array('fid'=>$n['fid']));?>" class="del">[删除]</a>
							</td>	
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