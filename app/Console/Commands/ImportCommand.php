<?php

namespace App\Console\Commands;

use App\Helpers\ImportMarkethot;
use Illuminate\Console\Command;

class ImportCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import_cat:start';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Импортирует информацию из markethot.ru';

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
    public function handle(ImportMarkethot $importMarkethot)
    {
        $importMarkethot->retrieveData();
    }
}
