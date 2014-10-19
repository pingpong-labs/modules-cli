<?php namespace Pingpong\ModulesCli\Console;

use Illuminate\Console\Command;
use Pingpong\ModulesCli\Generators\ControllerGenerator;
use Pingpong\ModulesCli\Traits\ModuleCommandTrait;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class GenerateControllerCommand extends Command {

    use ModuleCommandTrait;

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'generate:controller';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Generate a new controller';

	/**
	 * Execute the console command.
	 *
	 * @return mixed
	 */
	public function fire()
	{
		$generator = new ControllerGenerator($this->getModuleName(), $this->argument('controller'));

        $generator->generate();

        $this->info("Controller created successfully");
	}

	/**
	 * Get the console command arguments.
	 *
	 * @return array
	 */
	protected function getArguments()
	{
		return [
			['controller', InputArgument::REQUIRED, 'Controller name.'],
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
		return [
//			array('example', null, InputOption::VALUE_OPTIONAL, 'An example option.', null),
		];
	}

}
