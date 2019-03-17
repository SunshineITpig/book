
<?php

return array(
	//'close' => array('close', 60)//60秒执行一次 妥妥的 写0即每秒执行一次

	//myplan为我们计划定时执行的方法文件,2是间隔时间，nextruntime下次执行时间
	//此myplan文件位于/Application/Cron/目录下
	'cron' => array('myplan', 2, nextruntime),
);