<?php namespace Pingpong\ModulesCli\Traits;

use Pingpong\ModulesCli\Exceptions\FileAlreadyExistException;

trait GenerateFileTrait {

    /**
     * Generate a new file.
     *
     * @throws FileAlreadyExistException
     * @return bool
     */
    public function generateFile()
    {
        $path = $this->getDestinationFilePath();

        if($this->filesystem->exists($path))
        {
            throw new FileAlreadyExistException("File already exist : {$path}");
        }

        $this->autoCreateDirectory($path);

        return $this->filesystem->put($path, $this->getTemplateContents());
    }

    /**
     * Auto create directory.
     * 
     * @param  string $path 
     * @return void       
     */
    protected function autoCreateDirectory($path)
    {
        if( ! is_dir($dir = dirname($path)))
        {
            $this->filesystem->makeDirectory($dir);
        }
    }

} 