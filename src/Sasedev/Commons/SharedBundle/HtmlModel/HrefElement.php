<?php

namespace Sasedev\Commons\SharedBundle\HtmlModel;

use Sasedev\Commons\SharedBundle\HtmlModel\AttributeElement;

/**
 *
 * @author sasedev <seif.salah@gmail.com>
 */
class HrefElement extends AttributeElement
{
	/**
	 *
	 * @param string $value
	 */
	public function __construct($value, $isAsset = false)
	{
		parent::__construct('href', $value, $isAsset);
	}
}