<?php

namespace Sasedev\Commons\SharedBundle\HtmlModel\Tags\SpecialMetas\Name;

use Sasedev\Commons\SharedBundle\HtmlModel\Tags\SpecialMetas\NameContentMeta;

/**
 *
 * @author sasedev <seif.salah@gmail.com>
 */
class Description extends NameContentMeta
{

	/**
	 * Contructor
	 *
	 * @param string $description
	 */
	public function __construct($description)
	{

		parent::__construct('description', $description);

	}

}