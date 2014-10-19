<?php namespace Pingpong\ModulesCli\Traits;

trait ClassNameTrait {

	/**
	 * Get called class name.
	 * 
	 * @return string 
	 */
	public static function className()
	{
		return get_called_class();
	}

}