<?php
require 'slog.php';
use sunbirder\Slog;
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
), 'config');
