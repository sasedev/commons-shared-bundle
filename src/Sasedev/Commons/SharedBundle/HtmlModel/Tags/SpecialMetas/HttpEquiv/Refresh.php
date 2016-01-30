<?php

namespace Sasedev\Commons\SharedBundle\HtmlModel\Tags\SpecialMetas\HttpEquiv;

use Sasedev\Commons\SharedBundle\HtmlModel\Tags\SpecialMetas\HttpEquivContentMeta;

/**
 *
 * @author sasedev <seif.salah@gmail.com>
 */
class Refresh extends HttpEquivContentMeta
{

	/**
	 * Contructor
	 *
	 * @param string $refresh
	 */
	public function __construct($refresh)
	{

		parent::__construct('refresh', $refresh);

	}

}