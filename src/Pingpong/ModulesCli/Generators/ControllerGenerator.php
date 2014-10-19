<?php namespace Pingpong\ModulesCli\Generators;

class ControllerGenerator extends FileGenerator {

    /**
     * @var string
     */
    protected $controller;

    /**
     * @var string
     */
    protected $type = 'controller';

    /**
     * @var string
     */
    protected $stub = 'controller';

    /**
     * @param $name
     * @param $controller
     */
    public function __construct($name, $controller)
    {
        parent::__construct();

        $this->name = $name;
        $this->controller = $controller;
    }

    /**
     * Get stub replacements.
     *
     * @return array
     */
    public function getStubReplacements()
    {
        return [
            'CONTROLLER_NAME' => $this->getClassName()
        ];
    }

    /**
     * Get class name.
     *
     * @return string
     */
    protected function getClassName()
    {
        return $this->getStudlyName($this->controller);
    }
}