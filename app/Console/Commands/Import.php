<?php

namespace App\Console\Commands;

use App\Jobs\ProcessImport;
use Illuminate\Console\Command;

class Import extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'data:import';

    /**,
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Imports the data from the eobce.sk webpage.';

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
        ProcessImport::dispatch();
    }
}
