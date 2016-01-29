<?php

namespace Sasedev\Commons\SharedBundle\HtmlModel\Attributes;

use Sasedev\Commons\SharedBundle\HtmlModel\HtmlAttribute;

/**
 *
 * @author sasedev <seif.salah@gmail.com>
 */
class Href extends HtmlAttribute
{

	/**
	 *
	 * @var boolean $isAsset
	 */
	private $isAsset;

	/**
	 * Constructor
	 *
	 * @param string $value
	 */
	public function __construct($value, $isAsset = false)
	{

		parent::__construct('href', $value);

		$this->isAsset = $isAsset;

	}

	/**
	 * Get $isAsset
	 *
	 * @return boolean
	 */
	public function getIsAsset()
	{

		return $this->isAsset;

	}

	/**
	 * Set $isAsset
	 *
	 * @param boolean $isAsset
	 *
	 * @return Href $this
	 */
	public function setIsAsset($isAsset)
	{

		$this->isAsset = $isAsset;

		return $this;

	}

}