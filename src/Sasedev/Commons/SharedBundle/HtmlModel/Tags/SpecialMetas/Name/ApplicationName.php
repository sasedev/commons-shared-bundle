<?php

namespace Sasedev\Commons\SharedBundle\HtmlModel\Tags\SpecialMetas\Name;

use Sasedev\Commons\SharedBundle\HtmlModel\Tags\SpecialMetas\NameContentMeta;

/**
 *
 * @author sasedev <seif.salah@gmail.com>
 */
class ApplicationName extends NameContentMeta
{

	/**
	 * Contructor
	 *
	 * @param string $application_name
	 */
	public function __construct($application_name)
	{

		parent::__construct('application-name', $application_name);

	}

}