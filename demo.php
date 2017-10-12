<?php

require_once __DIR__ . '/vendor/autoload.php';
/*use sunbirder\Slog;
function slog($log, $type = 'log', $css = '')
{
if (is_string($type)) {
$type = preg_replace_callback('/_([a-zA-Z])/', create_function('$matches', 'return strtoupper($matches[1]);'), $type);
if (method_exists('\sunbirder\Slog', $type) || in_array($type, Slog::$log_types)) {
return call_user_func(array('\sunbirder\Slog', $type), $log, $css);
}
}

if (is_object($type) && 'mysqli' == get_class($type)) {
return Slog::mysqlilog($log, $type);
}

if (is_resource($type) && ('mysql link' == get_resource_type($type) || 'mysql link persistent' == get_resource_type($type))) {
return Slog::mysqllog($log, $type);
}

if (is_object($type) && 'PDO' == get_class($type)) {
return Slog::pdolog($log, $type);
}

throw new Exception($type . ' is not SocketLog method');
}

//配置
slog(array(
'host' => 'localhost', //websocket服务器地址，默认localhost
'optimize' => false, //是否显示利于优化的参数，如果运行时间，消耗内存等，默认为false
'show_included_files' => false, //是否显示本次程序运行加载了哪些文件，默认为false
'error_handler' => false, //是否接管程序错误，将程序错误显示在console中，默认为false
'force_client_ids' => array( //日志强制记录到配置的client_id,默认为空,client_id必须在allow_client_ids中
//'client_01',
//'client_02',
),
'allow_client_ids' => array( //限制允许读取日志的client_id，默认为空,表示所有人都可以获得日志。
'sunbirder',
//'client_02',
//'client_03',
),
), 'config');*/

//输出日志
slog('hello world'); //一般日志
slog('msg', 'log'); //一般日志
slog('msg', 'error'); //错误日志
slog('msg', 'info'); //信息日志
slog('msg', 'warn'); //警告日志
slog('msg', 'trace'); // 输入日志同时会打出调用栈
slog('msg', 'alert'); //将日志以alert方式弹出
slog('msg', 'log', 'color:red;font-size:20px;'); //自定义日志的样式，第三个参数为css样式

/*

include './php/slog.function.php';

//配置
slog(array(
'host'                => 'localhost',//websocket服务器地址，默认localhost
'optimize'            => false,//是否显示利于优化的参数，如果运行时间，消耗内存等，默认为false
'show_included_files' => false,//是否显示本次程序运行加载了哪些文件，默认为false
'error_handler'       => false,//是否接管程序错误，将程序错误显示在console中，默认为false
'force_client_ids'    => array(//日志强制记录到配置的client_id,默认为空,client_id必须在allow_client_ids中
//'client_01',
//'client_02',
),
'allow_client_ids'    => array(//限制允许读取日志的client_id，默认为空,表示所有人都可以获得日志。
//'client_01',
//'client_02',
//'client_03',
),
),'config');

//输出日志
slog('hello world');  //一般日志
slog('msg','log');  //一般日志
slog('msg','error'); //错误日志
slog('msg','info'); //信息日志
slog('msg','warn'); //警告日志
slog('msg','trace');// 输入日志同时会打出调用栈
slog('msg','alert');//将日志以alert方式弹出
slog('msg','log','color:red;font-size:20px;');//自定义日志的样式，第三个参数为css样式

//调试sql
/*
$link=mysql_connect( 'localhost:3306' , 'root' , '123456' , true ) ;
mysql_select_db('kuaijianli',$link);
$sql="DELETE * FROM `uxxxser`";
slog($sql,$link);
 */
