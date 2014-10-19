<?php namespace Pingpong\ModulesCli\Generators;

use Pingpong\ModulesCli\Contracts\FileGeneratorInterface;
use Pingpong\ModulesCli\Storage;
use Pingpong\ModulesCli\Stub;
use Pingpong\ModulesCli\Traits\GenerateFileTrait;
use Pingpong\ModulesCli\Traits\NamesTrait;

abstract class FileGenerator extends Generator implements FileGeneratorInterface {

    use GenerateFileTrait, NamesTrait;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $type = '';

    /**
     * @var string
     */
    protected $stub = '';

    /**
     * Get stub replacements.
     *
     * @return array
     */
    abstract public function getStubReplacements();

    /**
     * Get filename.
     *
     * @return string
     */
    public function getFilename()
    {
        return $this->getClassName() . '.php';
    }

    /**
     * Get class name.
     *
     * @return string
     */
    abstract protected function getClassName();

    /**
     * Generate the file.
     *
     * @return bool
     */
    public function generate()
    {
        return $this->generateFile();
    }

    /**
     * Get template contents.
     *
     * @return string
     */
    public function getTemplateContents()
    {
        return new Stub($this->stub, array_merge(['MODULE_NAME' => $this->getStudlyName()], $this->getStubReplacements()));
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
     * Get extra path.
     *
     * @param $storage
     * @return string
     */
    protected function getExtraPath($storage)
    {
        return $storage->generator[$this->type] . DIRECTORY_SEPARATOR . $this->getFilename();
    }

}