<?php

namespace Sasedev\Commons\SharedBundle\HtmlModel\Tags;

use Sasedev\Commons\SharedBundle\HtmlModel\HtmlTag;

/**
 *
 * @author sasedev <seif.salah@gmail.com>
 */
class Style extends HtmlTag
{

	/**
	 *
	 * @var string
	 */
	const NAME = 'style';

	/**
	 *
	 * @var boolean
	 */
	const SELF_CLOSING = false;

	/**
	 * Constructor
	 *
	 * @param string $content
	 */
	public function __construct($content = null)
	{

		$attributes = array();

		parent::__construct(self::NAME, $attributes, self::SELF_CLOSING, $content);

	}

}