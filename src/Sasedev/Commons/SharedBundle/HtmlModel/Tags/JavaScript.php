<?php

namespace Sasedev\Commons\SharedBundle\HtmlModel\Tags;

use Sasedev\Commons\SharedBundle\HtmlModel\Tags\Script;

/**
 *
 * @author sasedev <seif.salah@gmail.com>
 */
class JavaScript extends Script
{

	/**
	 * Constructor
	 *
	 * @param string $src
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