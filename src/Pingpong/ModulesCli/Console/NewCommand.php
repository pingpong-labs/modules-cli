<?php namespace Pingpong\ModulesCli\Console;

use Illuminate\Console\Command;
use Pingpong\ModulesCli\Generators\ModuleGenerator;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;

class NewCommand extends Command {

    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'new';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate a new module';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function fire()
    {
        $module = $this->argument('module');

        $generator = ModuleGenerator::make($module);

        $generator->generate();

        $this->info("Module [{$generator->getStudlyName()}] created successfully");

        if ($this->option('use'))
        {
            $this->call('use', ['module' => $module]);
        }
    }

    /**
     * Get the console command arguments.
     *
     * @return array
     */
    protected function getArguments()
    {
        return [
            ['module', InputArgument::REQUIRED, 'The name of module want to use.'],
        ];
    }

    /**
     * @return array
     */
    protected function getOptions()
    {
        return [
            ['use', null, InputOption::VALUE_NONE, 'Indicates the created module will use for current session.', null],
        ];
    }


}
