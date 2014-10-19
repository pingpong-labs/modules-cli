<?php namespace Pingpong\ModulesCli\Generators;

class FormRequestGenerator extends FileGenerator {

    /**
     * @var string
     */
    protected $request;

    /**
     * @var string
     */
    protected $type = 'request';

    /**
     * @var string
     */
    protected $stub = 'request';

    /**
     * @param $name
     * @param $request
     */
    public function __construct($name, $request)
    {
        parent::__construct();

        $this->name = $name;
        $this->request = $request;
    }

    /**
     * @return string
     */
    public function getClassName()
    {
        return $this->getStudlyName($this->request);
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