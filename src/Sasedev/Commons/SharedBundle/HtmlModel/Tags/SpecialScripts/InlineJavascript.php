<?php

namespace Sasedev\Commons\SharedBundle\HtmlModel\Tags\SpecialScripts;

use Sasedev\Commons\SharedBundle\HtmlModel\Tags\Script;

/**
 *
 * @author sasedev <seif.salah@gmail.com>
 */
class InlineJavascript extends Script
{

	/**
	 * Constructor
	 *
	 * @param string $content
	 */
	public function __construct($content)
	{
		parent::__construct(null, 'text/javascript', null, false, false, $content);
	}
}
