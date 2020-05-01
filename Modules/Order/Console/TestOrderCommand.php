<?php

namespace Modules\Order\Console;

use Illuminate\Console\Command;

/**
 * 测试命令
 * Class TestOrderCommand
 * @package App\Console\Commands
 */
class TestOrderCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'test:order';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'test order';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }


    public function handle()
    {
        echo 'hello order!';
    }

}
