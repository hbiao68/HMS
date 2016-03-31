<?php
return array(
	//'配置项'=>'配置值'
    'PAGE_NUM' => 15,
    //视图配置
    'LAYOUT_ON' => TRUE, // 是否启用布局
    'LAYOUT_NAME' => 'layout_common', // 当前布局名称 默认为layout
    'TMPL_ACTION_ERROR' => 'Public:dispatch_jump', // 默认错误跳转对应的模板文件
    'TMPL_ACTION_SUCCESS' => 'Public:dispatch_jump', // 默认成功跳转对应的模板文件
);