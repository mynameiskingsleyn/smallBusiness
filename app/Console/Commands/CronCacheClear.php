<?php

namespace App\Console\Commands;

use App\Helpers\UserHelper;
use Illuminate\Console\Command;
use App\Traits\CacheTrait;

class CronCacheClear extends Command
{
    use CacheTrait;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cron:CacheClear{cachename?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Clears cache';

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
     * @return mixed
     */
    public function handle()
    {
        //
        $cacheName = $this->argument('cachename');
        $this->clearCache($cacheName);
    }

    public function clearCache($cacheName = null)
    {
//        $cacheBase = null; ///$this->userHelper->zipcodeKeyBase;
//        if($cacheName){
//            $this->line('<-------------Clearing cache for '.$cacheName.' ---------------->');
//            $this->cacheDelete($cacheName);
//        }else if($cacheBase){
//            //$this->line('what a joke');
//            $this->bulkDelete($cacheBase);
//        } else{
//            $this->cacheFlushAll();
//            $this->line('<-----------------clearing all cached items------------->');
//        }

    }
}
