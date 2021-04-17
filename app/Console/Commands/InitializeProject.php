<?php

namespace App\Console\Commands;

use Illuminate\Support\Facades\Artisan;
use Illuminate\Console\Command;

class InitializeProject extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'initialize';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Initialize the project.';

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
        copy(".env.example", ".env");
        Artisan::call('cache:clear');
        Artisan::call('key:generate');
    }
}
