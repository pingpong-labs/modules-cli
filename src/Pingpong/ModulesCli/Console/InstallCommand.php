<?php namespace Pingpong\ModulesCli\Console;

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputArgument;

class InstallCommand extends Command {

    /**
     * @var string
     */
    protected $name = 'install';

    /**
     * @var string
     */
    protected $description = 'Install a module by given (username/repo) git';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function fire()
    {
        // TODO : add install feature
    }

    /**
     * Get the console command arguments.
     *
     * @return array
     */
    protected function getArguments()
    {
        return [
            ['module', InputArgument::REQUIRED, 'The name of module want to install.'],
        ];
    }
}