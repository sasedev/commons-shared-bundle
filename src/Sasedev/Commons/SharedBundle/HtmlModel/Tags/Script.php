<?php

namespace Sasedev\Commons\SharedBundle\HtmlModel\Tags;

use Sasedev\Commons\SharedBundle\HtmlModel\Attributes\Src;
use Sasedev\Commons\SharedBundle\HtmlModel\Attributes\Type;
use Sasedev\Commons\SharedBundle\HtmlModel\Attributes\Charset;
use Sasedev\Commons\SharedBundle\HtmlModel\Attributes\Defer;
use Sasedev\Commons\SharedBundle\HtmlModel\Attributes\Async;
use Sasedev\Commons\SharedBundle\HtmlModel\HtmlTag;

/**
 *
 * @author sasedev <seif.salah@gmail.com>
 */
class Script extends HtmlTag
{

	/**
	 *
	 * @var string
	 */
	const NAME = 'script';

	/**
	 *
	 * @var boolean
	 */
	const SELF_CLOSING = false;

	/**
	 * Constructor
	 *
	 * @param Src|string $src
	 * @param string $type
	 * @param string $charset
	 * @param boolean $defer
	 * @param boolean $async
	 * @param string $content
	 */
	public function __construct($src = null, $type = null, $charset = null, $defer = false, $async = false, $content = null)
	{

		$attributes = array();
		if (null != $src) {
			if ($src instanceof Src) {
				$srcAttribute = $src;
			} else {
				$srcAttribute = new Src($src);
			}
			$attributes[] = $srcAttribute;
		}
		if (null != $type) {
			$typeAttribute = new Type($type);
			$attributes[] = $typeAttribute;
		}
		if (null != $charset) {
			$charsetAttribute = new Charset($charset);
			$attributes[] = $charsetAttribute;
		}
		if (null != $defer) {
			$deferAttribute = new Defer();
			$attributes[] = $deferAttribute;
		}
		if (null != $async) {
			$asyncAttribute = new Async();
			$attributes[] = $asyncAttribute;
		}

		parent::__construct(self::NAME, $attributes, self::SELF_CLOSING, $content);

	}

}