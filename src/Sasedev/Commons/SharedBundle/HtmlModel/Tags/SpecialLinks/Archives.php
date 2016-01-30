<?php

namespace Sasedev\Commons\SharedBundle\HtmlModel\Tags\SpecialLinks;

use Sasedev\Commons\SharedBundle\HtmlModel\Attributes\Href;
use Sasedev\Commons\SharedBundle\HtmlModel\Attributes\Rel;
use Sasedev\Commons\SharedBundle\HtmlModel\Tags\Link;

/**
 *
 * @author sasedev <seif.salah@gmail.com>
 */
class Archives extends Link
{

	/**
	 * Constructor
	 *
	 * @param Href|string $href
	 */
	public function __construct($href)
	{

		$attributes = array();

		$attributes[] = new Rel('archives');
		if ($href instanceof Href) {
			$attributes[] = $href;
		} else {
			$attributes[] = new Href($href);
		}

		parent::__construct($attributes);

	}

}