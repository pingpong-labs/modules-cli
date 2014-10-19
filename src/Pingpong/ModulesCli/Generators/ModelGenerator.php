<?php namespace Pingpong\ModulesCli\Generators;

use Pingpong\ModulesCli\Contracts\FileGeneratorInterface;
use Pingpong\ModulesCli\Storage;
use Pingpong\ModulesCli\Stub;
use Pingpong\ModulesCli\Traits\GenerateFileTrait;
use Pingpong\ModulesCli\Traits\NamesTrait;

class ModelGenerator extends Generator implements FileGeneratorInterface {

    use NamesTrait, GenerateFileTrait;

    /**
     * @var
     */
    protected $name;

    /**
     * @var string
     */
    private $model;

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
     * Generate a model.
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
        return new Stub('model', [
            'MODEL_NAME' => $this->getClassName(),
            'MODULE_NAME' => $this->getStudlyName()
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
     * @param $storage
     * @return string
     */
    protected function getExtraPath($storage)
    {
        return $storage->generator['model'] . DIRECTORY_SEPARATOR . $this->getFilename();
    }

    /**
     * @return string
     */
    public function getClassName()
    {
        return $this->getStudlyName($this->model);
    }

    /**
     * Get filename.
     *
     * @return string
     */
    public function getFilename()
    {
        return $this->getClassName() . '.php';
    }

}