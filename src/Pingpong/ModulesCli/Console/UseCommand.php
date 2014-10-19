<?php namespace Pingpong\ModulesCli\Console;

use Illuminate\Console\Command;
use Pingpong\ModulesCli\Storage;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;

class UseCommand extends Command {

    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'use';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Use the specified module for cli session';

    /**
     * @var Storage
     */
    protected $storage;

    /**
     * Create a new command instance.
     */
    public function __construct()
    {
        parent::__construct();

        $this->storage = Storage::getInstance();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function fire()
    {
        $this->storage->set('used', $module = $this->argument('module'));

        $this->info("Module [{$module}] used successfully");
    }

    /**
     * Get the console command arguments.
     *
     * @return array
     */
    protected function getArguments()
    {
        return array(
            array('module', InputArgument::REQUIRED, 'The name of module want to use.'),
        );
    }

}
