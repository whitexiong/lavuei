<?php
namespace App\Workerman;
use \GatewayWorker\Lib\Gateway;
use Workerman\Timer;

class Events
{
    // businessWorker进程启动事件
    public static function onWorkerStart($businessWorker)
    {
    }
    //连接事件
    public static function onConnect($client_id)
    {
        // 向当前client_id发送数据
        Gateway::sendToClient($client_id, "Hello $client_id");
    }
    //进程退出事件
    public static function onWebSocketConnect($client_id, $data)
    {
    }
    //消息事件
    public static function onMessage($client_id, $message)
    {
        // 向所有人发送
        Gateway::sendToAll((string) $message);

    }
    // 连接断开事件
    public static function onClose($client_id)
    {
    }
}