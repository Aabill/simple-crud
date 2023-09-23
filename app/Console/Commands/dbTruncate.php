<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class dbTruncate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:db-truncate {tablename : The name of the table}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Truncate a table';

    /**
     * Execute the console command.
     */
    public function handle()
    {
      DB::table($this->argument('tablename'))->truncate();
    }
}
