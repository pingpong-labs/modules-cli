<?php namespace Pingpong\ModulesCli\Generators;

use Pingpong\Modules\Generators\Generator;

class FilterGenerator extends FileGenerator {

    /**
     * @var string
     */
    protected $filter;

    /**
     * @var string
     */
    protected $stub = 'filter';

    /**
     * @var string
     */
    protected $type = 'filter';

    /**
     * @param $name
     * @param $filter
     */
    public function __construct($name, $filter)
    {
        parent::__construct();

        $this->name = $name;
        $this->filter = $filter;
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

    /**
     * Get class name.
     *
     * @return string
     */
    protected function getClassName()
    {
        return $this->getStudlyName($this->filter);
    }
}