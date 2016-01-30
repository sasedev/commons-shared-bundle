<?php

namespace Sasedev\Commons\SharedBundle\HtmlModel\Tags\SpecialMetas\Name;

use Sasedev\Commons\SharedBundle\HtmlModel\Tags\SpecialMetas\NameContentMeta;

/**
 *
 * @author sasedev <seif.salah@gmail.com>
 */
class Generator extends NameContentMeta
{

	/**
	 * Contructor
	 *
	 * @param string $generator
	 */
	public function __construct($generator)
	{

		parent::__construct('generator', $generator);

	}

}