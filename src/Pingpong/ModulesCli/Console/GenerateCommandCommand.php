<?php namespace Pingpong\ModulesCli\Console;

use Illuminate\Console\Command;
use Pingpong\ModulesCli\Generators\CommandGenerator;
use Pingpong\ModulesCli\Traits\ModuleCommandTrait;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class GenerateCommandCommand extends Command {

    use ModuleCommandTrait;

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'generate:command';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Generate a new command';

	/**
	 * Execute the console command.
	 *
	 * @return mixed
	 */
	public function fire()
	{
		$generator = new CommandGenerator(
			$this->getModuleName(),
			$this->argument('commandName'),
			$this->option('name')
		);

        $generator->generate();

        $this->info("Command created successfully");
	}

	/**
	 * Get the console command arguments.
	 *
	 * @return array
	 */
	protected function getArguments()
	{
		return [
			['commandName', InputArgument::REQUIRED, 'Command name.'],
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
			['name', null, InputOption::VALUE_OPTIONAL, 'The command name.', 'command:name'],
		];
	}

}
