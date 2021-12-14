<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use Log;

class ClearTempImage extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'clearTempImage:clear';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '定时清理零时文件';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        Log::info('开始清理文件-------------------------------------------------------');
        $allFiles  = Storage::disk('local')->allFiles('public/images/temp');

        if($allFiles) {
            $flag = Storage::disk('local')->delete($allFiles);
            if ($flag) {
                Log::info('删除临时文件: ', $allFiles);
            } else {
                Log::info('未删除文件');
            }
        }

        Log::info('任务结束-------------------------------------------------------');

    }
}
