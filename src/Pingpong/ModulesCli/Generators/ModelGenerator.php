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
     * @param $model
     */
    public function __construct($name, $model)
    {
        parent::__construct();

        $this->name = $name;
        $this->model = $model;
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
        return [
            'MODEL_NAME' => $this->getClassName(),
        ];
    }

}