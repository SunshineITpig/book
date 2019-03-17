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
	</head>

	<body>
		<!-- -  单元信息显示 begin - -->
		<div id="cellboardInfo" class="box round first" style="margin-top: 5px;">
		    <h2 id="infoTitle" style="height: 20px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;楼层管理</h2>
		    <div id="infoBody" class="block">
		        <table>
		        	<tr style="margin-bottom: 20px;">
					    <td class="col1">
					        <label style="font-size: 16px; font-weight: bolder; margin-left: 20px;margin-right: 40px; height:18px;">
					           H座阅览室
					        </label>
					    </td>
					    <td class="col2">
					        <input name="fullColor" type="radio" value="0" checked style="width:18px;height:18px;" /><span style="font-size:18px;" >开启</span>
					        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					        <input name="fullColor" type="radio" value="1"  style="width:18px;height:18px;"/><span style="font-size:18px;">关闭</span>
					    </td>
					</tr>

					<tr>
					    <td class="col1">
					        <label style="font-size: 16px; font-weight: bolder; margin-left: 20px;margin-right: 40px; height:18px;">
					           西苑图书馆
					        </label>
					    </td>
					    <td class="col2">
					        <input name="fullColo" type="radio" value="0" checked style="width:18px;height:18px;" /><span style="font-size:18px;" >开启</span>
					        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					        <input name="fullColo" type="radio" value="1"  style="width:18px;height:18px;"/><span style="font-size:18px;">关闭</span>
					    </td>
					</tr>

					<tr>
					    <td class="col1">
					        <label style="font-size: 16px; font-weight: bolder; margin-left: 20px;margin-right: 40px; height:18px;">
					           逸夫图书馆一楼
					        </label>
					    </td>
					    <td class="col2">
					        <input name="fullCol" type="radio" value="0" checked style="width:18px;height:18px;" /><span style="font-size:18px;" >开启</span>
					        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					        <input name="fullCol" type="radio" value="1"  style="width:18px;height:18px;"/><span style="font-size:18px;">关闭</span>
					    </td>
					</tr>

					<tr>
					    <td class="col1">
					        <label style="font-size: 16px; font-weight: bolder; margin-left: 20px;margin-right: 40px; height:18px;">
					           逸夫图书馆二楼
					        </label>
					    </td>
					    <td class="col2">
					        <input name="fullCo" type="radio" value="0" checked style="width:18px;height:18px;" /><span style="font-size:18px;" >开启</span>
					        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					        <input name="fullCo" type="radio" value="1"  style="width:18px;height:18px;"/><span style="font-size:18px;">关闭</span>
					    </td>
					</tr>

					<tr>
					    <td class="col1">
					        <label style="font-size: 16px; font-weight: bolder; margin-left: 20px;margin-right: 40px; height:18px;">
					           逸夫图书馆三楼
					        </label>
					    </td>
					    <td class="col2">
					        <input name="fullC" type="radio" value="0" checked style="width:18px;height:18px;" /><span style="font-size:18px;" >开启</span>
					        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					        <input name="fullC" type="radio" value="1"  style="width:18px;height:18px;"/><span style="font-size:18px;">关闭</span>
					    </td>
					</tr>

					<tr>
					    <td class="col1">
					        <label style="font-size: 16px; font-weight: bolder; margin-left: 20px;margin-right: 40px; height:18px;">
					           逸夫图书馆四楼
					        </label>
					    </td>
					    <td class="col2">
					        <input name="full" type="radio" value="0" checked style="width:18px;height:18px;" /><span style="font-size:18px;" >开启</span>
					        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					        <input name="full" type="radio" value="1"  style="width:18px;height:18px;"/><span style="font-size:18px;">关闭</span>
					    </td>
					</tr>

					<tr style="height: 70px;">
					    <td class="col1">
					        <label style="font-size: 16px; font-weight: bolder; margin-left: 20px;margin-right: 40px; height:18px;">
					           逸夫图书馆五楼
					        </label>
					    </td>
					    <td class="col2">
					        <input name="ful" type="radio" value="0" checked style="width:18px;height:18px;" /><span style="font-size:18px;" >开启</span>
					        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					        <input name="ful" type="radio" value="1"  style="width:18px;height:18px;"/><span style="font-size:18px;">关闭</span>
					    </td>
					</tr>
		            
		            <tr>
		                <td colspan="2">
		                    <button class="btn btn-blue" style="margin-left: 20px;">保存</button>
		                </td>
		            </tr>
		        </table>
		    </div>
		</div>
		<!-- -  单元信息显示 end - -->
	</body>

</html>