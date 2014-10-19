<?php namespace Pingpong\ModulesCli\Console;

use Illuminate\Console\Command;
use Pingpong\ModulesCli\Generators\FormRequestGenerator;
use Pingpong\ModulesCli\Traits\ModuleCommandTrait;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;

class GenerateRequestCommand extends Command {

    use ModuleCommandTrait;

    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'generate:request';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate a new form request';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function fire()
    {
        $generator = new FormRequestGenerator($this->getModuleName(), $this->argument('request'));

        $generator->generate();

        $this->info("Form request class created successfully");
    }

    /**
     * Get the console command arguments.
     *
     * @return array
     */
    protected function getArguments()
    {
        return [
            ['request', InputArgument::REQUIRED, 'The name of form request class.'],
            ['module', InputArgument::OPTIONAL, 'The name of module will used.'],
		];
	}

    /**
     * Get the console command options.
     *
     * @return array
     */
    protected function getOptions()
    {
        return [];
    }

}
