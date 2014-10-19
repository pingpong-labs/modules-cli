<?php namespace Pingpong\ModulesCli\Console;

use Illuminate\Console\Command;
use Pingpong\ModulesCli\Generators\ProviderGenerator;
use Pingpong\ModulesCli\Traits\ModuleCommandTrait;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class GenerateProviderCommand extends Command {

    use ModuleCommandTrait;

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'generate:provider';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Generate a new service provider';

	/**
	 * Execute the console command.
	 *
	 * @return mixed
	 */
	public function fire()
	{
		$generator = new ProviderGenerator($this->getModuleName(), $this->argument('provider'));

        $generator->generate();

        $this->info("Service provider created successfully");
	}

	/**
	 * Get the console command arguments.
	 *
	 * @return array
	 */
	protected function getArguments()
	{
		return array(
            array('provider', InputArgument::REQUIRED, 'Service provider name.'),
            array('module', InputArgument::OPTIONAL, 'The name of module will used.'),
		);
	}

	/**
	 * Get the console command options.
	 *
	 * @return array
	 */
	protected function getOptions()
	{
		return array(
//			array('example', null, InputOption::VALUE_OPTIONAL, 'An example option.', null),
		);
	}

}
