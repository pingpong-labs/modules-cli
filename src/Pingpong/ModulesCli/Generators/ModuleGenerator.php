<?php namespace Pingpong\ModulesCli\Generators;

use Illuminate\Support\Str;
use Pingpong\ModulesCli\Storage;

class ModuleGenerator extends Generator {

    /**
     * @var string
     */
    protected $name;

    /**
     * @var Storage
     */
    protected $storage;

    /**
     * @param $name
     */
    public function __construct($name)
    {
        parent::__construct();

        $this->name = $name;

        $this->storage = Storage::getInstance();

        if (is_null($this->storage->path))
        {
            throw new \RuntimeException("Modules path is not defined");
        }
    }

    /**
     * @param $name
     * @return self
     */
    public static function make($name)
    {
        return new static($name);
    }

    /**
     * @param string $name
     * @return $this
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getLowerName()
    {
        return strtoupper($this->name);
    }

    /**
     * @return string
     */
    public function getStudlyName()
    {
        return Str::studly($this->name);
    }

    public function generate()
    {
        var_dump($this->name);
    }

}