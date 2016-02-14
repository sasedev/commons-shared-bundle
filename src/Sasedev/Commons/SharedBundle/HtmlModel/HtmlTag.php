<?php

namespace Sasedev\Commons\SharedBundle\HtmlModel;

/**
 *
 * @author sasedev <seif.salah@gmail.com>
 */
class HtmlTag implements \JsonSerializable
{

	/**
	 *
	 * @var boolean
	 */
	const SELF_CLOSING = false;

	/**
	 *
	 * @var string $name
	 */
	private $name;

	/**
	 *
	 * @var array
	 */
	private $attributes;

	/**
	 *
	 * @var boolean
	 */
	private $self_closing;

	/**
	 *
	 * @var string
	 */
	private $content;

	/**
	 *
	 * @var string
	 */
	private $prepend = null;

	/**
	 *
	 * @var string
	 */
	private $append = null;

	/**
	 * Contructor
	 *
	 * @param string $name
	 * @param array $attributes
	 * @param boolean $self_closing
	 * @param string $content
	 */
	public function __construct($name, $attributes = array(), $self_closing = self::SELF_CLOSING, $content = null)
	{

		$this->name = $name;
		$this->attributes = $attributes;
		$this->self_closing = $self_closing;
		$this->content = $content;

	}

	/**
	 * Get $name
	 *
	 * @return string
	 */
	public function getName()
	{

		return $this->name;

	}

	/**
	 * Set $name
	 *
	 * @param string $name
	 *
	 * @return HtmlTag $this
	 */
	public function setName($name)
	{

		$this->name = $name;

		return $this;

	}

	/**
	 * Get $attributes
	 *
	 * @return array
	 */
	public function getAttributes()
	{

		return $this->attributes;

	}

	/**
	 * Set $attributes
	 *
	 * @param array $attributes
	 *
	 * @return HtmlTag $this
	 */
	public function setAttributes(array $attributes)
	{

		$this->attributes = $attributes;

		return $this;

	}

	/**
	 * Add $attribute
	 *
	 * @param AttributeAttribute $attribute
	 *
	 * @return HtmlTag $this
	 */
	public function addAttribute(HtmlAttribute $attribute)
	{

		$this->attributes[] = $attribute;

		return $this;

	}

	/**
	 *
	 * @return boolean
	 */
	public function getSelfClosing()
	{

		return $this->self_closing;

	}

	/**
	 *
	 * @param boolean $self_closing
	 */
	public function setSelfClosing($self_closing)
	{

		$this->self_closing = $self_closing;

		return $this;

	}

	/**
	 * Get $content
	 *
	 * @return string
	 */
	public function getContent()
	{

		return $this->content;

	}

	/**
	 * Set $content
	 *
	 * @param string $content
	 *
	 * @return HtmlTag $this
	 */
	public function setContent($content)
	{

		if (!$this->self_closing) {
			$this->content = $content;
		}

		return $this;

	}

	/**
	 * Get $prepend
	 *
	 * @return string
	 */
	public function getPrepend()
	{

		return $this->prepend;

	}

	/**
	 * Set $prepend
	 *
	 * @param string $prepend
	 *
	 * @return HtmlTag $this
	 */
	public function setPrepend($prepend)
	{

		$this->prepend = $prepend;

		return $this;

	}

	/**
	 * Get $append
	 *
	 * @return string
	 */
	public function getAppend()
	{

		return $this->append;

	}

	/**
	 * Set $append
	 *
	 * @param string $append
	 *
	 * @return HtmlTag $this
	 */
	public function setAppend($append)
	{

		$this->append = $append;

		return $this;

	}

	/**
	 * Default string representation
	 */
	public function __toString()
	{

		$str = "";
		if (null != $this->prepend) {
			$str .= $this->prepend.PHP_EOL;
		}
		$str .= '<';
		$str .= $this->name;
		foreach ($this->attributes as $attribute) {
			$str .= ' ' . $attribute;
		}
		if ($this->self_closing) {
			$str .= '/>';
		} else {
			$str .= '>' . PHP_EOL . $this->content . PHP_EOL . '<' . $this->name . '>';
		}
		if (null != $this->append) {
			$str .= PHP_EOL.$this->append;
		}

		return $str;

	}

	// function called when encoded with json_encode
	public function jsonSerialize()
	{

		return get_object_vars($this);

	}

}