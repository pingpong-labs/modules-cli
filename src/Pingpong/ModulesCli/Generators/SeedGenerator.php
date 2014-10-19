<?php namespace Pingpong\ModulesCli\Generators;

class SeedGenerator extends FileGenerator {

    /**
     * @var string
     */
    protected $seed;

    /**
     * @var bool
     */
    protected $master = false;

    /**
     * @var string
     */
    protected $type = 'seeder';

    /**
     * @var string
     */
    protected $stub = 'seeder';

    /**
     * @param $name
     * @param $seed
     * @param $master
     */
    public function __construct($name, $seed, $master)
    {
        parent::__construct();

        $this->name = $name;
        $this->seed = $seed;
        $this->master = $master;
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
        $end = $this->master ? 'DatabaseSeeder' : 'TableSeeder';

        return $this->getStudlyName($this->seed) . $end;
    }

}