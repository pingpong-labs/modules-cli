<?php namespace Pingpong\ModulesCli\Console;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;
use Pingpong\ModulesCli\Storage;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;

class SetupCommand extends Command {

    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'setup';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Setup modules path';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function fire()
    {
        $path = getcwd() . DIRECTORY_SEPARATOR . $this->argument('path');

        if ( ! is_dir($path))
        {
            mkdir($path);
        }

        Storage::getInstance()->set('path', $path);

        $this->info("Modules path setup successfully");
    }

    /**
     * Get the console command arguments.
     *
     * @return array
     */
    protected function getArguments()
    {
        return [
            ['path', InputArgument::REQUIRED, 'The path of modules want to use.'],
        ];
    }

}
