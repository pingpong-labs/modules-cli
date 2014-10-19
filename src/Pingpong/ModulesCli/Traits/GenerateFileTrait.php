<?php namespace Pingpong\ModulesCli\Traits;

use Pingpong\ModulesCli\Exceptions\FileAlreadyExistException;

trait GenerateFileTrait {

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

} 