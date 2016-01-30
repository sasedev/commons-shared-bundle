<?php

namespace Sasedev\Commons\SharedBundle\HtmlModel\Tags\SpecialMetas;

use Sasedev\Commons\SharedBundle\HtmlModel\Tags\Meta;
use Sasedev\Commons\SharedBundle\HtmlModel\Attributes\Charset;

/**
 *
 * @author sasedev <seif.salah@gmail.com>
 */
class CharsetMeta extends Meta
{

	/**
	 * Contructor
	 *
	 * @param string $charset
	 */
	public function __construct($charset = 'utf-8')
	{

		$attributes = array();
		$attributes[] = new Charset($charset);
		parent::__construct($attributes);

	}

}