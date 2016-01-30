<?php

namespace Sasedev\Commons\SharedBundle\HtmlModel\Tags\SpecialMetas;

use Sasedev\Commons\SharedBundle\HtmlModel\Tags\Meta;
use Sasedev\Commons\SharedBundle\HtmlModel\Attributes\HttpEquiv;
use Sasedev\Commons\SharedBundle\HtmlModel\Attributes\Content;

/**
 *
 * @author sasedev <seif.salah@gmail.com>
 */
class HttpEquivContentMeta extends Meta
{

	/**
	 * Contructor
	 *
	 * @param string $charset
	 */
	public function __construct($http_equiv, $content)
	{

		$attributes = array();
		$attributes[] = new HttpEquiv($http_equiv);
		$attributes[] = new Content($content);
		parent::__construct($attributes);

	}

}