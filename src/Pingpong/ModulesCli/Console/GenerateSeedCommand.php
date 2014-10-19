<?php namespace Pingpong\ModulesCli\Console;

use Illuminate\Console\Command;
use Pingpong\ModulesCli\Generators\SeedGenerator;
use Pingpong\ModulesCli\Traits\ModuleCommandTrait;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;

class GenerateSeedCommand extends Command {

    use ModuleCommandTrait;

    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'generate:seed';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate a new seed';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function fire()
    {
        $generator = new SeedGenerator($this->getModuleName(), $this->argument('seeder'), $this->option('master'));

        $generator->generate();

        $this->info("Seed created successfully");
    }

    /**
     * Get the console command arguments.
     *
     * @return array
     */
    protected function getArguments()
    {
        return [
            ['seeder', InputArgument::REQUIRED, 'Seeder name.'],
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
            ['master', null, InputOption::VALUE_NONE, 'Indicates the seeder will created is a master database seeder.'],
        ];
    }

}
