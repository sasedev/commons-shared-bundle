<?php

namespace Sasedev\Commons\SharedBundle\HtmlModel\Tags\SpecialMetas\HttpEquiv;

use Sasedev\Commons\SharedBundle\HtmlModel\Tags\SpecialMetas\HttpEquivContentMeta;

/**
 *
 * @author sasedev <seif.salah@gmail.com>
 */
class ContentType extends HttpEquivContentMeta
{

	/**
	 * Contructor
	 *
	 * @param string $content_type
	 */
	public function __construct($content_type)
	{

		parent::__construct('content-type', $content_type);

	}

}