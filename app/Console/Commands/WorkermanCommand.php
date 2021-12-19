<?php
namespace App\Console\Commands;
use GatewayWorker\BusinessWorker;
use GatewayWorker\Gateway;
use GatewayWorker\Register;
use Illuminate\Console\Command;
use Workerman\Worker;
class WorkermanCommand extends Command
{
    protected $signature = 'workman {action} {--d}';
    protected $description = 'Start a Workerman server.';
    public function handle()
    {
        global $argv;
        $action = $this->argument('action');
        $argv[0] = 'wk';
        $argv[1] = $action;
        $argv[2] = $this->option('d') ? '-d' : '';
        $this->start();
    }
    private function start()
    {
        $this->startGateWay();
        $this->startBusinessWorker();
        $this->startRegister();
        Worker::runAll();
    }
    private function startBusinessWorker()
    {
        $worker                  = new BusinessWorker();
        //work名称
        $worker->name            = 'BusinessWorker';
        //businessWork进程数
        $worker->count           = 2;
        //服务注册地址
        $worker->registerAddress = '127.0.0.1:1236';
        //设置\App\Workerman\Events类来处理业务
        $worker->eventHandler    = \App\Workerman\Events::class;
    }
    private function startGateWay()
    {
        //gateway进程
        $gateway = new Gateway("websocket://0.0.0.0:2346");
        //gateway名称 status方便查看
        $gateway->name                 = 'Gateway';
        //gateway进程
        $gateway->count                = 2;
        //本机ip
        $gateway->lanIp                = '127.0.0.1';
        //内部通讯起始端口，如果$gateway->count = 4 起始端口为2300
        //则一般会使用 2300，2301 2个端口作为内部通讯端口
        $gateway->startPort            = 2300;
        //心跳间隔
        $gateway->pingInterval         = 30;
        //客户端连续$pingNotResponseLimit次$pingInterval时间内不发送任何数据则断开链接，并触发onClose。
        //我们这里使用的是服务端主动发送心跳所以设置为0
        $gateway->pingNotResponseLimit = 0;
        //心跳数据
        $gateway->pingData             = '{"type":"@heart@"}';
        //服务注册地址
        $gateway->registerAddress      = '127.0.0.1:1236';
    }
    private function startRegister()
    {
        new Register('text://0.0.0.0:1236');
    }
}