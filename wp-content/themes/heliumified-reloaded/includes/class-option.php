<?php

/**
 * A singleton class for getting and updating the theme options.
 *
 * @author James Lloyd R. Atwil
 */
class Padd_Theme_Option {

	/**
	 * Option name. The name of the option to serve as an identifier for settings table.
	 *
	 * @var string
	 */
	private $option_name;

	/**
	 * Option value. An array contains the theme-specific options.
	 *
	 * @var array
	 */
	private $option_value;

	/**
	 * An instance of Padd_Theme_Option.
	 *
	 * @var Padd_Theme_Option
	 */
	private static $instance;

	/**
	 * Constructor for Padd_Theme_Option.
	 *
	 */
	private function __construct() {
		$this->option_name = PADD_NAME_SPACE . '_' . PADD_THEME_SLUG . '_settings';
		$this->option_value = array();
		$value = get_option($this->option_name, NULL);
		if (NULL != $value) {
			$this->option_value = unserialize($value);
		} else {
			add_option($this->option_name);
		}
	}

	/**
	 * Create an instance of Padd_Theme_Option class.
	 *
	 * @return Padd_Theme_Option
	 */
	public static function instantiate() {
		if (!isset(self::$instance)) {
			self::$instance = new Padd_Theme_Option();
		}
		return self::$instance;
	}

	/**
	 * Get the theme option value.
	 *
	 * @param string $name
	 * @param mixed $coalesce
	 * @return mixed
	 */
	public static function get($name,$coalesce='') {
		if (isset(self::$instance->option_value[$name])) {
			return self::$instance->option_value[$name];
		} else {
			return $coalesce;
		}
	}

	/**
	 * Set the theme option name.
	 *
	 * @param string $name
	 * @param mixed $value
	 */
	public static function set($name,$value) {
		self::$instance->option_value[$name] = $value;
	}

	/**
	 * Update the theme options to the database.
	 */
	public static function update() {
		$value = serialize(self::$instance->option_value);
		update_option(self::$instance->option_name, $value);
	}

}

