<?php

namespace Sasedev\Commons\SharedBundle\HtmlModel\Tags\SpecialMetas;

use Sasedev\Commons\SharedBundle\HtmlModel\Tags\Meta;
use Sasedev\Commons\SharedBundle\HtmlModel\Attributes\Name;
use Sasedev\Commons\SharedBundle\HtmlModel\Attributes\Content;

/**
 *
 * @author sasedev <seif.salah@gmail.com>
 */
class NameContentMeta extends Meta
{

	/**
	 * Contructor
	 *
	 * @param string $charset
	 */
	public function __construct($name, $content)
	{

		$attributes = array();
		$attributes[] = new Name($name);
		$attributes[] = new Content($content);
		parent::__construct($attributes);

	}

}