<?php

namespace Sasedev\Commons\SharedBundle\HtmlModel\Tags\SpecialMetas\HttpEquiv;

use Sasedev\Commons\SharedBundle\HtmlModel\Tags\SpecialMetas\HttpEquivContentMeta;

/**
 *
 * @author sasedev <seif.salah@gmail.com>
 */
class DefaultStyle extends HttpEquivContentMeta
{

	/**
	 * Contructor
	 *
	 * @param string $default_style
	 */
	public function __construct($default_style)
	{

		parent::__construct('default-style', $default_style);

	}

}