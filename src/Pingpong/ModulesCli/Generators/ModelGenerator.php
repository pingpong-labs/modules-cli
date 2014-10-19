<?php namespace Pingpong\ModulesCli\Generators;

class ModelGenerator extends FileGenerator {

    /**
     * @var string
     */
    protected $model;

    /**
     * @var string
     */
    protected $type = 'model';

    /**
     * @var string
     */
    protected $stub = 'model';

    /**
     * @param $name
     * @param $provider
     */
    public function __construct($name, $provider)
    {
        parent::__construct();

        $this->name = $name;
        $this->model = $provider;
    }

    /**
     * @return string
     */
    public function getClassName()
    {
        return $this->getStudlyName($this->model);
    }

    /**
     * Get stub replacements.
     *
     * @return array
     */
    public function getStubReplacements()
    {
        return [];
    }

}