<?php namespace Pingpong\ModulesCli\Generators;

class CommandGenerator extends FileGenerator {

    /**
     * @var string
     */
    protected $command;

    /**
     * @var string
     */
    protected $commandName;

    /**
     * @var string
     */
    protected $type = 'command';

    /**
     * @var string
     */
    protected $stub = 'command';

    /**
     * @param $name
     * @param $command
     */
    public function __construct($name, $command, $commandName = 'command:name')
    {
        parent::__construct();

        $this->name = $name;
        $this->command = $command;
        $this->commandName = $commandName;
    }

    /**
     * Get stub replacements.
     *
     * @return array
     */
    public function getStubReplacements()
    {
        return ['COMMAND_NAME' => $this->commandName];
    }

    /**
     * Get class name.
     *
     * @return string
     */
    protected function getClassName()
    {
        return $this->getStudlyName($this->command);
    }
}