<?php

/**
 * Twitter class, extending from SimplePie class which is available at <code>wp-includes</code> folder.
 *
 * @author James Lloyd R. Atwil
 * @version 2.0
 */
class Padd_Theme_Twitter extends SimplePie {

	/**
	 * The Twitter username.
	 *
	 * @var string
	 */
	public $username;

	/**
	 * Number of tweets to be displayed at a time.
	 *
	 * @var int
	 */
	public $limit;

	/**
	 * Sets the tweets are in unordered list mode or not.
	 *
	 * @var boolean
	 */
	public $list_mode;

	/**
	 * Number of the followers in the twitter profile.
	 *
	 * @var int
	 */
	public $followers_count = 0;

	/**
	 * Number of friends in the twitter profile.
	 *
	 * @var int
	 */
	public $friends_count = 0;

	/**
	 * Number of times listed in the twitter profile.
	 *
	 * @var int
	 */
	public $listed_count = 0;

	/**
	 * Total number of the statuses (tweets) in a twitter profile.
	 *
	 * @var int
	 */
	public $statuses_count = 0;

	/**
	 * The URL of the twitter profile image.
	 *
	 * @var string
	 */
	public $profile_image_url = '';

	/**
	 * Constructor for Twitter class.
	 *
	 * @param string $username
	 * @param int $limit
	 * @param boolean $list_mode
	 */
	public function __construct($username, $limit = 1, $list_mode = false, $extract_info=false) {
		$this->username = $username;
		$this->limit = $limit;
		$this->list_mode = $list_mode;
		if (method_exists(parent,'__construct')) {
			parent::__construct();
		} else {
			$this->SimplePie();
		}
		if (!empty($this->username)) {
			$this->set_feed_url('http://twitter.com/statuses/user_timeline/' . $username . '.rss');
			$this->set_cache_class('WP_Feed_Cache');
			$this->init();
			$this->fetch_user_data();
			if ($extract_info) {
				$data = Padd_Theme_Option::get('data_twitter_users','');
				$data = unserialize($data);
				$next = Padd_Theme_Option::get('data_twitter_users_next','0000-00-00 00:00:00');
				$curr = date('Y-m-d H:i:s');
				if (empty($data)) {
					$this->store();
					var_dump('store');
				} else {
					if ($curr > $next) {
						$this->store();
					} else {
						$this->extract($data);
					}
				}
				Padd_Theme_Option::update();
			}
		}
	}

	/**
	 * Function to render the tweets.
	 */
	public function show_tweets() {

		if ($this->list_mode) {
			echo '<ul class="padd-twitter">';
		}

		if (empty($this->username)) {
			if ($this->list_mode) {
				echo '<li>';
			} else {
				echo '<p class="padd-twitter-message">';
			}
			echo __('Twitter settings is not configured.', PADD_THEME_SLUG);
			if ($this->list_mode) {
				echo '</li>';
			} else {
				echo '</p>';
			}
		} else {
			$count = $this->get_item_quantity();
			if ($count > 0) {
				$i = 0;
				foreach ($this->get_items(0, $this->limit) as $item) {
					$message = $item->get_description();
					$message = substr(strstr($message,': '), 2, strlen($message));
					if ($this->list_mode) {
						echo '<li class="padd-twitter-item">';
					} else if ($num != 1) {
						echo '<p class="padd-twitter-message">';
					}

			          $message = $this->parse_hyperlinks($message);
			          $message = $this->parse_twitter_users($message);

			          echo $message;
					$time = strtotime($item->get_date());

					if ((abs(time()-$time)) < 86400 ) {
						$h_time = sprintf(__('%s ago'), human_time_diff($time));
					} else {
						$h_time = date(__('g:i A F jS'), $time);
					}

			          echo ' <span class="padd-twitter-timestamp"><abbr title="' . date(__('Y/m/d H:i:s'), $time) . '">' . $h_time . '</abbr></span>';

					if ($this->list_mode) {
						echo '</li>';
					} elseif ($this->limit != 1) {
						echo '</p>';
					}
					$i++;
					if ( $i >= $this->limit ) {
						break;
					}
				}
			} else {
				if ($this->list_mode) {
					echo '<li>';
				} else {
					echo '<p class="padd-twitter-message">';
				}
				echo __('No tweets yet.', PADD_THEME_SLUG);
				if ($this->list_mode) {
					echo '</li>';
				} else {
					echo '</p>';
				}
			}
			if ($this->list_mode) {
				echo '</ul>';
			}
		}
	}

	/**
	 * Returns the number of followers in words.
	 *
	 * @param string $zero
	 * @param string $one
	 * @param string $more
	 * @return string
	 */
	public function get_followers_count_words($zero, $one, $more) {
		if ($this->followers_count > 1) {
			return sprintf($more, $this->followers_count);
		} else if ($this->followers_count == 1) {
			return $one;
		} else if ($this->followers_count < 1) {
			return $zero;
		}
	}

	/**
	 * Returns the number of friends in words.
	 *
	 * @param string $zero
	 * @param string $one
	 * @param string $more
	 * @return string
	 */
	public function get_friends_count_words($zero, $one, $more) {
		if ($this->friends_count > 1) {
			return sprintf($more, $this->friends_count);
		} else if ($this->friends_count == 1) {
			return $one;
		} else if ($this->friends_count < 1) {
			return $zero;
		}
	}

	/**
	 * Returns the number of tweets since registration in words.
	 *
	 * @param string $zero
	 * @param string $one
	 * @param string $more
	 * @return string
	 */
	public function get_statuses_count_words($zero, $one, $more) {
		if ($this->statuses_count > 1) {
			return sprintf($more, $this->statuses_count);
		} else if ($this->statuses_count == 1) {
			return $one;
		} else if ($this->statuses_count < 1) {
			return $zero;
		}
	}

	/**
	 * Stores and extracts XML data from the theme options.
	 */
	private function store() {
		$data = $this->fetch_user_data();
		if ($data) {
			$sdat = serialize($data);
			Padd_Theme_Option::set('data_twitter_users', $sdat);
			$next = date('Y-m-d H:i:s', time() + 3600);
			Padd_Theme_Option::set('data_twitter_users_next', $next);
			$this->extract($data);
		}
	}

	/**
	 * Extracts the XML data.
	 *
	 * @param string $data
	 */
	private function extract($data) {
		try {
			$xml = new SimpleXMLElement($data);
			$this->followers_count = intval($xml->followers_count);
			$this->friends_count = intval($xml->friends_count);
			$this->listed_count = intval($xml->listed_count);
			$this->statuses_count = intval($xml->statuses_count);
			$this->profile_image_url = $xml->profile_image_url;
		} catch (Exception $e) {
		}
	}

	/**
	 * Get user data.
	 *
	 * @return string
	 */
	private function fetch_user_data() {
		$url = 'http://twitter.com/users/show.xml?screen_name=' . $this->username;
		$http = new WP_Http();
		$data = $http->get($url);
		if ($data instanceof WP_Error) {
			return false;
		} else {
			return $data['body'];
		}
	}

	/**
	 * Function to parse the hyperlinks (anchors).
	 *
	 * @param string $text The twitter message.
	 * @return string
	 */
	private function parse_hyperlinks($text) {
		// Props to Allen Shaw & webmancers.com
		// match protocol://address/path/file.extension?some=variable&another=asf%
		//$text = preg_replace("/\b([a-zA-Z]+:\/\/[a-z][a-z0-9\_\.\-]*[a-z]{2,6}[a-zA-Z0-9\/\*\-\?\&\%]*)\b/i","<a href=\"$1\" class=\"twitter-link\">$1</a>", $text);
		$text = preg_replace('/\b([a-zA-Z]+:\/\/[\w_.\-]+\.[a-zA-Z]{2,6}[\/\w\-~.?=&%#+$*!]*)\b/i',"<a href=\"$1\" class=\"twitter-link\">$1</a>", $text);
		// match www.something.domain/path/file.extension?some=variable&another=asf%
		//$text = preg_replace("/\b(www\.[a-z][a-z0-9\_\.\-]*[a-z]{2,6}[a-zA-Z0-9\/\*\-\?\&\%]*)\b/i","<a href=\"http://$1\" class=\"twitter-link\">$1</a>", $text);
		$text = preg_replace('/\b(?<!:\/\/)(www\.[\w_.\-]+\.[a-zA-Z]{2,6}[\/\w\-~.?=&%#+$*!]*)\b/i',"<a href=\"http://$1\" class=\"twitter-link\">$1</a>", $text);

		// match name@address
		$text = preg_replace("/\b([a-zA-Z][a-zA-Z0-9\_\.\-]*[a-zA-Z]*\@[a-zA-Z][a-zA-Z0-9\_\.\-]*[a-zA-Z]{2,6})\b/i","<a href=\"mailto://$1\" class=\"twitter-link\">$1</a>", $text);
		//mach #trendingtopics. Props to Michael Voigt
		$text = preg_replace('/([\.|\,|\:|\¡|\¿|\>|\{|\(]?)#{1}(\w*)([\.|\,|\:|\!|\?|\>|\}|\)]?)\s/i', "$1<a href=\"http://twitter.com/#search?q=$2\" class=\"twitter-link\">#$2</a>$3 ", $text);
		return $text;
	}

	/**
	 * Function to parse the user tag (the @ sign).
	 *
	 * @param string $text The twitter message.
	 * @return string
	 */
	private function parse_twitter_users($text) {
		$text = preg_replace('/([\.|\,|\:|\¡|\¿|\>|\{|\(]?)@{1}(\w*)([\.|\,|\:|\!|\?|\>|\}|\)]?)\s/i', "$1<a href=\"http://twitter.com/$2\" class=\"twitter-user\">@$2</a>$3 ", $text);
		return $text;
	}


}

