<?php

namespace Sasedev\Commons\SharedBundle\HtmlModel;

/**
 *
 * @author sasedev <seif.salah@gmail.com>
 */
class AttributeElement
{

	/**
	 *
	 * @var string $key
	 */
	private $key;

	/**
	 *
	 * @var string $value
	 */
	private $value;

	/**
	 *
	 * @var boolean $isAsset
	 */
	private $isAsset;

	/**
	 *
	 * @param string $key
	 * @param string $value
	 * @param boolean $isAsset
	 */
	public function __construct($key, $value, $isAsset = false)
	{

		$this->key = $key;
		$this->value = $value;
		$this->isAsset = $isAsset;

	}

	/**
	 * Get $key
	 *
	 * @return string
	 */
	public function getKey()
	{

		return $this->key;

	}

	/**
	 * Set $key
	 *
	 * @param string $key
	 *
	 * @return AttributeElement $this
	 */
	public function setKey($key)
	{

		$this->key = $key;

		return $this;

	}

	/**
	 * Get $value
	 *
	 * @return string
	 */
	public function getValue()
	{

		return $this->value;

	}

	/**
	 * Set $value
	 *
	 * @param string $value
	 *
	 * @return AttributeElement $this
	 */
	public function setValue($value)
	{

		$this->value = $value;

		return $this;

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
	 * @return AttributeElement $this
	 */
	public function setIsAsset($isAsset)
	{

		$this->isAsset = $isAsset;

		return $this;

	}


}