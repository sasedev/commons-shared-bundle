<?php

namespace Sasedev\Commons\SharedBundle\HtmlModel;

use Sasedev\Commons\SharedBundle\HtmlModel\AttributeElement;

/**
 *
 * @author sasedev <seif.salah@gmail.com>
 */
class RelElement extends AttributeElement
{
	/**
	 *
	 * @param string $value
	 */
	public function __construct($value)
	{
		parent::__construct('rel', $value);
	}
}