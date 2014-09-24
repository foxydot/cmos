<?php

/**
 * Social Bookmark class.
 *
 * @author James Lloyd Atwil
 */
class Padd_Theme_SocialBookmark {

	/**
	 * Name of the social bookmark network.
	 *
	 * @var string
	 */
	public $network;

	/**
	 * A short name for social bookmark network.
	 *
	 * @var string
	 */
	public $slug;

	/**
	 * URL of the social bookmark network
	 *
	 * @var string
	 */
	public $net_url;

	/**
	 * The article URL. Accepts the following formats:
	 * <ul>
	 * <li><code>%url%</code> - the URL of the article to be bookmarked</li>
	 * <li><code>%title%</code> - the title of the article to be bookmarked</li>
	 * <li><code>%author%</code> - the author of the article</li>
	 * <li><code>%excerpt%</code> - the excerpt of the article</li>
	 * </ul>
	 *
	 * @var string
	 */
	public $ref_url;

	/**
	 * The title of the article to bookmark.
	 *
	 * @var string
	 */
	public $title;

	/**
	 * The author of the article to bookmark.
	 *
	 * @var string
	 */
	public $author;

	/**
	 * The exercpt of the article.
	 *
	 * @var string
	 */
	public $excerpt;

	/**
	 * The content of the bookmark. It can be an image or a plain text.
	 *
	 * @var string
	 */
	public $content;

	/**
	 * Constructor for Padd_Theme_SocialBookmark class.
	 *
	 * @param string $network
	 * @param string $net_url
	 * @param string $content
	 */
	function __construct($network,$net_url,$content='') {
		$this->network = $network;
		$this->net_url = $net_url;
		$this->content = $content;
	}

	/**
	 * Returns the social bookmark in HTML format.
	 *
	 * @return string
	 */
	public function __toString() {
		$url = str_replace('%url%',$this->ref_url,$this->net_url);
		$url = str_replace('%title%',$this->title,$url);
		$url = str_replace('%author%',$this->title,$url);
		$url = str_replace('%excerpt%',$this->excerpt,$url);
		return '<a href="' . $url . '">' . $this->content . '</a>';
	}

}
