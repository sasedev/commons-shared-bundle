<?php

namespace Sasedev\Commons\SharedBundle\HtmlModel\Tags;

use Sasedev\Commons\SharedBundle\HtmlModel\HtmlTag;

/**
 *
 * @author sasedev <seif.salah@gmail.com>
 */
class Meta extends HtmlTag
{

	/**
	 *
	 * @var string
	 */
	const NAME = 'meta';

	/**
	 *
	 * @var boolean
	 */
	const SELF_CLOSING = true;

	/**
	 * Contructor
	 *
	 * @param array $attributes
	 */
	public function __construct($attributes = array())
	{

		parent::__construct(self::NAME, $attributes, self::SELF_CLOSING);

	}

}