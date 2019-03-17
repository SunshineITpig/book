<?php
return array(

	'LOAD_EXT_CONFIG'	=>'db',// 加载扩展配置文件

    'MODULE_ALLOW_LIST' => array('Home','Admin'),//可见模块
	/* URL配置 */
    'URL_CASE_INSENSITIVE' => true, //默认false 表示URL区分大小写 ,true则表示不区分大小写
    'URL_PATHINFO_DEPR'    => '/', //PATHINFO URL分割符

     /* 认证相关 */
    'USER_AUTH_KEY'	=>'auth_id',	// 用户认证SESSION标记
    'USER_AUTH_GATEWAY'	=>'login/index',// 默认认证网关0
//  'SHOW_PAGE_TRACE'=>0, //显1示调试信息
	/* 系统数据加密设置 */
    'DATA_AUTH_KEY'		=> '1*NX+Jds|p!IFqltgD)"?4;ic<{,wuya239Ax^]-', //默认数据加密KEY

	/* 模板相关配置 */
	'TMPL_PARSE_STRING' => array(
		'__PUBLIC__' => __ROOT__ . '/Public',
		'__BCSS__' => __ROOT__ . '/Public/Base/CSS',
		'__BJS__' => __ROOT__ . '/Public/Base/JS',
		'__BIMG__' => __ROOT__ . '/Public/Base/Imgs',
		'__BFonts__' => __ROOT__ . '/Public/Base/Fonts',
		
		'__DCSS__' => __ROOT__ . '/Public/Develop/CSS',
		'__DJS__' => __ROOT__ . '/Public/Develop/JS',
		'__DIMG__' => __ROOT__ . '/Public/Develop/Imgs',
		'__DFonts__' => __ROOT__ . '/Public/Develop/Fonts',
		
	),
);
