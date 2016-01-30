<?php

namespace Sasedev\Commons\SharedBundle\HtmlModel\Tags\SpecialMetas\Name;

use Sasedev\Commons\SharedBundle\HtmlModel\Tags\SpecialMetas\NameContentMeta;

/**
 *
 * @author sasedev <seif.salah@gmail.com>
 */
class Keywords extends NameContentMeta
{

	/**
	 * Contructor
	 *
	 * @param string $keywords
	 */
	public function __construct($keywords)
	{

		parent::__construct('keywords', $keywords);

	}

}