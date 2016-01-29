<?php

namespace Sasedev\Commons\SharedBundle\HtmlModel\Attributes;

use Sasedev\Commons\SharedBundle\HtmlModel\HtmlAttribute;

/**
 *
 * @author sasedev <seif.salah@gmail.com>
 */
class Async extends HtmlAttribute
{

	/**
	 * Constructor
	 */
	public function __construct()
	{

		parent::__construct('async', 'async');

	}

}