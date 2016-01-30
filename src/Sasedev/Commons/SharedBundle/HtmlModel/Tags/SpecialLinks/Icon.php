<?php

namespace Sasedev\Commons\SharedBundle\HtmlModel\Tags\SpecialLinks;

use Sasedev\Commons\SharedBundle\HtmlModel\Attributes\Href;
use Sasedev\Commons\SharedBundle\HtmlModel\Attributes\Rel;
use Sasedev\Commons\SharedBundle\HtmlModel\Attributes\Type;
use Sasedev\Commons\SharedBundle\HtmlModel\Tags\Link;

/**
 *
 * @author sasedev <seif.salah@gmail.com>
 */
class Icon extends Link
{

	/**
	 * Constructor
	 *
	 * @param Href|string $href
	 * @param string $type
	 */
	public function __construct($href, $type = 'image/x-icon')
	{

		$attributes = array();

		$attributes[] = new Rel('icon');
		$attributes[] = new Type($type);
		if ($href instanceof Href) {
			$attributes[] = $href;
		} else {
			$attributes[] = new Href($href);
		}
		parent::__construct($attributes);

	}

}