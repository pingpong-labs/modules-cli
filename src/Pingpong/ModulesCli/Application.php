<?php namespace Pingpong\ModulesCli;

use Illuminate\Container\Container;
use Pingpong\Modules\Module;

class Application extends \Symfony\Component\Console\Application {

    /**
     * @var Module
     */
    protected $module;

    /**
     * @var array
     */
    protected $consoles = [
        'New',
        'Use',
        'Setup'
    ];

    /**
     * @return Module
     */
    public function getModule()
    {
        return $this->module;
    }

    /**
     * @param Module $module
     * @return $this
     */
    public function setModule(Module $module)
    {
        $this->module = $module;

        return $this;
    }

    /**
     * @param Container $container
     */
    public function registerCommands(Container $container)
    {
        foreach ($this->consoles as $console)
        {
            $this->add($container->make($this->getConsoleClassName($console)));
        }
    }

    /**
     * @param $console
     * @return string
     */
    private function getConsoleClassName($console)
    {
        return __NAMESPACE__ . '\\Console\\' . $console . 'Command';
    }

}