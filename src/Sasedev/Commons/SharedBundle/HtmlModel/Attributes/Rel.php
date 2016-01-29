<?php

namespace Sasedev\Commons\SharedBundle\HtmlModel\Attributes;

use Sasedev\Commons\SharedBundle\HtmlModel\HtmlAttribute;

/**
 *
 * @author sasedev <seif.salah@gmail.com>
 */
class Rel extends HtmlAttribute
{

	/**
	 * Contructor
	 *
	 * @param string $value
	 */
	public function __construct($value)
	{

		parent::__construct('rel', $value);

	}

}