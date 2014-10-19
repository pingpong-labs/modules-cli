<?php namespace Pingpong\ModulesCli\Generators;

use Illuminate\Support\Str;
use Pingpong\ModulesCli\Exceptions\ModuleAlreadyExistException;
use Pingpong\ModulesCli\Exceptions\ModulesPathNotDefinedException;
use Pingpong\ModulesCli\Storage;
use Pingpong\ModulesCli\Stub;

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
     * @throws ModulesPathNotDefinedException
     */
    public function __construct($name)
    {
        parent::__construct();

        $this->name = $name;

        $this->storage = Storage::getInstance();

        if ( ! $this->storage->path())
        {
            throw new ModulesPathNotDefinedException("Modules path is not defined");
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

    protected function getFolders()
    {
        return array_values($this->storage->generator);
    }

    protected function createGitKeep($path)
    {
        $this->filesystem->put($path . '/.gitkeep', new Stub('blank'));
    }

    protected function exists()
    {
        return $this->filesystem->isDirectory($this->getModulePath());
    }

    public function generate()
    {
        if ($this->exists())
        {
            $message = "Module [{$this->getStudlyName()}] already exist";

            throw new ModuleAlreadyExistException($message);
        }

        foreach ($this->getFolders() as $folder)
        {
            $path = $this->getModulePath($folder);

            $this->filesystem->makeDirectory($path, 0775, true);

            $this->createGitKeep($path);
        }
    }

    /**
     * @param null $path
     * @return string
     */
    protected function getModulePath($path = null)
    {
        return $this->storage->path() . '/' . $this->getStudlyName() . ($path ? '/' . $path : '');
    }

}