<?php

namespace Sasedev\Commons\SharedBundle\HtmlModel\Tags\SpecialScripts;

use Sasedev\Commons\SharedBundle\HtmlModel\Attributes\Src;
use Sasedev\Commons\SharedBundle\HtmlModel\Tags\Script;

/**
 *
 * @author sasedev <seif.salah@gmail.com>
 */
class Javascript extends Script
{

	/**
	 * Constructor
	 *
	 * @param Src|string $src
	 * @param string $charset
	 * @param boolean $defer
	 * @param boolean $async
	 * @param string $content
	 */
	public function __construct($src = null, $charset = null, $defer = false, $async = false, $content = null)
	{
		parent::__construct($src, 'text/javascript', $charset, $defer, $async, $content);
	}

}