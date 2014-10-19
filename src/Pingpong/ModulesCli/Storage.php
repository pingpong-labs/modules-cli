<?php namespace Pingpong\ModulesCli;

use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Contracts\ArrayableInterface;
use stdClass;

class Storage implements ArrayableInterface {

    /**
     * @var Filesystem
     */
    protected $filesystem;

    /**
     * @var string
     */
    protected $contents;

    /**
     * @param Filesystem $filesystem
     */
    public function __construct(Filesystem $filesystem)
    {
        $this->filesystem = $filesystem;
    }

    /**
     * @return self
     */
    public static function getInstance()
    {
        return new static(new Filesystem);
    }

    /**
     * @return Filesystem
     */
    public function getFilesystem()
    {
        return $this->filesystem;
    }

    /**
     * @param Filesystem $filesystem
     * @return $this
     */
    public function setFilesystem(Filesystem $filesystem)
    {
        $this->filesystem = $filesystem;

        return $this;
    }

    /**
     * @return string
     */
    public function getPath()
    {
        return __DIR__ . '/../../storage/modules.json';
    }

    /**
     * @return string
     */
    public function getContents()
    {
        return $this->filesystem->get($this->getPath());
    }

    /**
     * @param int $option
     * @return mixed
     */
    public function getData($option = 1)
    {
        return json_decode($this->getContents(), $option);
    }

    /**
     * Get the instance as an array.
     *
     * @return array
     */
    public function toArray()
    {
        return array_map(function ($value)
        {
            if (is_object($value) || $value instanceof stdClass)
            {
                return (array)$value;
            }

            return $value;
        }, $this->getData());
    }

    /**
     * @param string $key
     * @param string $value
     * @return int
     */
    public function set($key, $value)
    {
        $data = $this->getData();

        unset($data[$key]);

        $data[$key] = $value;

        return $this->update($data);
    }

    /**
     * @param array $data
     * @return int
     */
    public function update(array $data)
    {
        $contents = json_encode($data, JSON_PRETTY_PRINT);

        return $this->filesystem->put($this->getPath(), $contents);
    }

    /**
     * @param $key
     * @param null $default
     * @return mixed
     */
    public function get($key, $default = null)
    {
        return array_get($this->toArray(), $key, $default);
    }

    /**
     * @param $key
     * @return mixed
     */
    public function __get($key)
    {
        return $this->get($key);
    }


}