<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class DemoCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'demo:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
      // \Log::info("Cron is working fine!");
      // $users = DB::select("select DISTINCT u.id, u.name, u.email from users as u inner JOIN messages as m ON u.id IN(m.from,m.to)
      // where u.id<>3 and( m.from= 3 or m.to=3) group by u.id, u.name, u.email;");



      /*
             Write your database logic we bellow:
             Item::create(['name'=>'hello new']);
          */
    }
}
