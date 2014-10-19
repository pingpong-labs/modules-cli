<?php namespace Pingpong\ModulesCli\Generators;

use Pingpong\ModulesCli\Contracts\FileGeneratorInterface;
use Pingpong\ModulesCli\Exceptions\FileAlreadyExistException;
use Pingpong\ModulesCli\Storage;
use Pingpong\ModulesCli\Stub;
use Pingpong\ModulesCli\Traits\NamesTrait;

class ControllerGenerator extends Generator implements FileGeneratorInterface {

    use NamesTrait;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $controller;

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
     * @throws FileAlreadyExistException
     */
    public function generate()
    {
        $this->generateFile();
    }

    /**
     * Get template contents.
     *
     * @return string
     */
    public function getTemplateContents()
    {
        return new Stub('controller', [
            'MODULE_NAME' => $this->getStudlyName(),
            'CONTROLLER_NAME' => $this->getControllerName()
        ]);
    }

    /**
     * Get destination file path.
     *
     * @return string
     */
    public function getDestinationFilePath()
    {
        $storage = Storage::getInstance();

        return $storage->getModulePath($this->getStudlyName(), $this->getExtraPath($storage));
    }

    /**
     * Generate a new file.
     *
     * @throws FileAlreadyExistException
     * @return void
     */
    public function generateFile()
    {
        try
        {
            $this->filesystem->put($this->getDestinationFilePath(), $this->getTemplateContents());
        }
        catch (\Exception $e)
        {
            throw new FileAlreadyExistException($e->getMessage());
        }
    }

    /**
     * @param $storage
     * @return string
     */
    protected function getExtraPath($storage)
    {
        return $storage->generator['controller'] . '/' . $this->getControllerName() . '.php';
    }

    /**
     * @return string
     */
    private function getControllerName()
    {
        return $this->getStudlyName($this->controller);
    }
}