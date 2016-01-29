<?php

namespace Sasedev\Commons\SharedBundle\HtmlModel\Attributes;

use Sasedev\Commons\SharedBundle\HtmlModel\HtmlAttribute;

/**
 *
 * @author sasedev <seif.salah@gmail.com>
 */
class Defer extends HtmlAttribute
{

	/**
	 * Constructor
	 */
	public function __construct($value)
	{

		parent::__construct('defer', 'defer');

	}

}