<?php namespace Pingpong\ModulesCli\Traits;

use Illuminate\Support\Str;

trait NamesTrait {

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
     * @param null $name
     * @return string
     */
    public function getStudlyName($name = null)
    {
        return Str::studly($name ?: $this->name);
    }

} 