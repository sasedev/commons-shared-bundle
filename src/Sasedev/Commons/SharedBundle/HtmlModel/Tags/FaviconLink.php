<?php

namespace Sasedev\Commons\SharedBundle\HtmlModel\Tags;

use Sasedev\Commons\SharedBundle\HtmlModel\Attributes\Href;
use Sasedev\Commons\SharedBundle\HtmlModel\Attributes\Rel;
use Sasedev\Commons\SharedBundle\HtmlModel\Attributes\Type;

/**
 *
 * @author sasedev <seif.salah@gmail.com>
 */
class FaviconLink extends Link
{

	/**
	 * Constructor
	 *
	 * @param string $url
	 * @param string $type
	 * @param string $rel
	 * @param string $isAsset
	 */
	public function __construct($url = 'favicon.ico', $type = 'image/x-icon', $rel = 'icon', $isAsset = false)
	{

		$attributes = array();

		$attributes[] = new Rel($rel);
		$attributes[] = new Type($type);
		$attributes[] = new Href($url, $isAsset);
		parent::__construct($attributes);

	}

}