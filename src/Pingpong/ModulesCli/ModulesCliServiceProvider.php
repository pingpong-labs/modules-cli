<?php namespace Pingpong\ModulesCli;

use Illuminate\Support\ServiceProvider;

class ModulesCliServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	/**
	 * The list of clie name.
	 * 
	 * @var string
	 */
	protected $commands = [
		'Use'
	];

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		foreach ($this->commands as $command)
		{
			$this->commands($this->getClassName($command))
		}
	}

	/**
	 * Get class name by given short command name.
	 * 
	 * @param  string $command 
	 * @return string          
	 */
	protected function getClassName($command)
	{
		return __NAMESPACE__ . '\\Console\\' . $command . 'Command';
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		$provides = [];

		foreach ($this->commands as $command)
		{
			$provides[] = $this->getClassName($command);
		}

		return $provides;
	}

}
