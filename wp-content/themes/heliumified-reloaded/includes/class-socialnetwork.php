<?php

/**
 * Class for Social Network.
 *
 * @author James Lloyd Atwil
 */
class Padd_Theme_SocialNetwork {

	/**
	 * The social network name. Facebook, MySpace, Twitter, name it.
	 *
	 * @var string
	 */
	public $network;

	/**
	 * The URL of the social network user profile. If the default user profile
	 * URL is <code>http://yoursocialnet.com/myusername</code>, the format to be used is
	 * <code>http://yoursocialnet.com/%u%</code>.
	 *
	 * @var string
	 */
	public $url;

	/**
	 * Social network username.
	 *
	 * @var string
	 */
	public $username;

	/**
	 * Consdtructor for Padd_Theme_SocialNetwork class.
	 *
	 * @param string $network
	 * @param string $url
	 * @param string $username
	 */
	function __construct($network, $url, $username='') {
		$this->network = $network;
		$this->url = $url;
		$this->username = $username;
	}

	/**
	 * Returns the social network in HTML format.
	 *
	 * @return string
	 */
	public function __toString() {
		$string = str_replace('%u%',$this->username,$this->url);
		return $string;
	}

}

/**
 * Class for Facebook Social Network
 *
 * @author James Lloyd Atwil
 */
class Padd_Theme_SocialNetwork_Facebook extends Padd_Theme_SocialNetwork {

	function __construct($name) {
		if ($this->check_url($name)) {
			parent::__construct('Facebook', $name, '');
		} else {
			parent::__construct('Facebook','http://www.facebook.com/%u%', $name);
		}
	}

	/**
	 * Checks if the value of the Facebook field is URL or username.
	 *
	 * @param <type> $string
	 * @return boolean
	 */
	private function check_url($string) {
		$url = false;
		if ('http://' == substr($string, 0, 7)) {
			$url = true;
		}
		return $url;
	}

}