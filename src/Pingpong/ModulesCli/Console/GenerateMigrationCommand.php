<?php namespace Pingpong\ModulesCli\Console;

use Illuminate\Console\Command;
use Pingpong\ModulesCli\Generators\MigrationGenerator;
use Pingpong\ModulesCli\Traits\ModuleCommandTrait;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;

class GenerateMigrationCommand extends Command {

    use ModuleCommandTrait;

    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'generate:migration';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate a new migration';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function fire()
    {
        $generator = new MigrationGenerator(
            $this->getModuleName(),
            $this->argument('migration'),
            $this->option('fields'),
            $this->option('plain')
        );

        $generator->generate();

        $this->info("Migration created successfully");

        if ($this->option('dump'))
        {
            passthru('php artisan dump');
        }
    }

    /**
     * Get the console command arguments.
     *
     * @return array
     */
    protected function getArguments()
    {
        return array(
            array('migration', InputArgument::REQUIRED, 'The migration name.'),
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
            array('fields', null, InputOption::VALUE_OPTIONAL, 'The migration fields.', null),
            array('plain', null, InputOption::VALUE_NONE, 'Create plain migration.'),
            array('dump',null,InputOption::VALUE_NONE,'Run \'artisan dump-autoload\' after the migration created.'),
        );
    }

}
