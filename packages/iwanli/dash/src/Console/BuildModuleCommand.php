<?php
namespace Iwanli\Dash\Console;

use Illuminate\Console\Command;

class BuildModuleCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'idash:build {module}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a permission module';

    /**
     * Create a new command instance.
     *
     * @param  DripEmailer  $drip
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
        echo "hehe";
    }
}