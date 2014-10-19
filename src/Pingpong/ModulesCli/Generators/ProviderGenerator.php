<?php namespace Pingpong\ModulesCli\Generators;

class ProviderGenerator extends FileGenerator {

    /**
     * @var string
     */
    protected $provider;

    /**
     * @var string
     */
    protected $type = 'provider';

    /**
     * @var string
     */
    protected $stub = 'provider';

    /**
     * @param $name
     * @param $provider
     */
    public function __construct($name, $provider)
    {
        parent::__construct();

        $this->name = $name;
        $this->provider = $provider;
    }

    /**
     * @return string
     */
    public function getClassName()
    {
        return $this->getStudlyName($this->provider);
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