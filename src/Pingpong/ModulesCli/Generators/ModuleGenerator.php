<?php namespace Pingpong\ModulesCli\Generators;

use Illuminate\Support\Str;
use Pingpong\ModulesCli\Exceptions\ModuleAlreadyExistException;
use Pingpong\ModulesCli\Exceptions\ModulesPathNotDefinedException;
use Pingpong\ModulesCli\Storage;
use Pingpong\ModulesCli\Stub;
use Pingpong\ModulesCli\Traits\NamesTrait;

class ModuleGenerator extends Generator {

    use NamesTrait;

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
     * @return array
     */
    protected function getFolders()
    {
        return array_values($this->storage->generator);
    }

    /**
     * @param $path
     */
    protected function createGitKeep($path)
    {
        $this->filesystem->put($path . '/.gitkeep', new Stub('blank'));
    }

    /**
     * @return bool
     */
    protected function exists()
    {
        return $this->filesystem->isDirectory($this->getModulePath());
    }

    /**
     * @throws ModuleAlreadyExistException
     */
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
     * @param string|null $path
     * @return string
     */
    protected function getModulePath($path = null)
    {
        return $this->storage->getModulePath($this->getStudlyName(), $path);
    }

}