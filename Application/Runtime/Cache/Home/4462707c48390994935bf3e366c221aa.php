<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html>
<html>

	<head>
		<title>图书馆在线选座</title>
		<link rel="stylesheet" type="text/css" href="/book/Public/Develop/CSS/jquery.seat-charts.css">
		<link rel="stylesheet" type="text/css" href="/book/Public/Develop/CSS/style.css">
		<link rel="stylesheet" type="text/css" href="/book/Public/Develop/CSS/jquery-ui.css"/>
		<script src="/book/Public/Develop/JS/jquery-3.2.1.min.js" type="text/javascript"></script>
	    <script src="/book/Public/Develop/JS/jquery-ui.min.js" type="text/javascript" ></script>
	    <script src="/book/Public/Develop/JS/setup.js" type="text/javascript"></script>
	    <script src="/book/Public/Develop/JS/jquery.seat-charts.min.js"></script>
	</head>

	<body>
		<div class="wrapper">
			<div class="clear"></div>
		    <div class="container">
			    <div id="seat-map" class="seat_map">
			        <div class="front">
			        	<?php echo ($fname); ?>
			        </div>
			    </div>
			    <div class="booking-details">
			    	<div class="my">
			    		<a href="javascript:openpasswdDialog();">
			    		<img src="/book/Public/Develop/Imgs/img-profile.jpg" alt="Profile Pic" style="float: left;" />
			    		</a>
			    		<a href="<?php echo U('information');?>" style="float: left; color: #2E5E79; font-size: 16px; text-decoration:none; margin-left: 20px;">我的</a>
			    		<a href="<?php echo U('Login/out');?>" style="float: left; color: #2E5E79; font-size: 16px; text-decoration:none; margin-left: 20px;">退出</a>
			    	</div>
			        <h3 style="margin-top: 30px;">
			        	已选中的座位:
			        </h3>
			        <h3 id="selected-seats">
			        </h3>
			        <div class="aha">
				        <p>
				        	<button class="checkout-button"  id="bookbutton">预定</button>
				        	<button class="checkout-button"  id="leftbutton">签离</button>
				        	<button class="checkout-button" onclick="javascript:openreportDialog();" >举报</button>
				        </p>      
				        <div id="legend"></div>
			        </div>
			    </div>
			</div>
	    	<div id="Dialog" title="提示">
		        <p>预订成功！</p>
	    	</div>
	    	<div id="leftDialog" title="提示">
		        <p>签离成功！</p>
	    	</div>
	    	<div id="reportDialog" title="举报">
		        <p>
	            座位号：<input id="username" type="text" value="" /><br /><br />
	            举报内容：<input id="userpwd" type="text" value="" /><br /><br />
	            <button id="reportbutton" class="checkout-button" style="margin-left: 80px; background-color: rgb(46, 94, 121);">举报</button>
        		</p>
	    	</div>
	    	<div id="passwdDialog" title="修改密码">
                <p>
                    <label for="pwd">密码：</label>
                    <input type="password" name='pwd' id='pwd' class='input'/>
                </p>
                <p>
                    <label for="pwd">确认密码：</label>
                    <input type="password" name='repwd' id="repwd" class='input'/>
                </p>
                <p>
                <button class="checkout-button" id="changebutton" style="margin-left: 80px; background-color: rgb(46, 94, 121);">修改</button>
                </p>  
            </div>
		</div> 
		<script>
			var firstSeatLabel = 1;
			var url = "/book/index.php/Home/Index/bookseat";
			var urlleft = "/book/index.php/Home/Index/leftseat";
			var urlchange = "/book/index.php/Home/Index/change";
			var urlreport = "/book/index.php/Home/Index/report";
			var data = <?php echo ($res); ?>;
			var cache = <?php echo ($fid); ?>;
			var str = <?php echo ($return); ?>;
		</script>
	</body>
</html>