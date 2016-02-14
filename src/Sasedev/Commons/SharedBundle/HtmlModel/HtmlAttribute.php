<?php

namespace Sasedev\Commons\SharedBundle\HtmlModel;

/**
 *
 * @author sasedev <seif.salah@gmail.com>
 */
class HtmlAttribute implements \JsonSerializable
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
	 * Contructor
	 *
	 * @param string $key
	 * @param string $value
	 * @param boolean $isAsset
	 */
	public function __construct($key, $value)
	{

		$this->key = $key;
		$this->value = $value;

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
	 * @return HtmlAttribute $this
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
	 * @return HtmlAttribute $this
	 */
	public function setValue($value)
	{

		$this->value = $value;

		return $this;

	}

	/**
	 * Default string representation
	 */
	public function __toString()
	{

		return $this->key . '="' . $this->value . '"';

	}

	// function called when encoded with json_encode
	public function jsonSerialize()
	{

		return get_object_vars($this);

	}

}