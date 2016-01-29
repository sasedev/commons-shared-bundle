<?php

namespace Sasedev\Commons\SharedBundle\HtmlModel;

/**
 *
 * @author sasedev <seif.salah@gmail.com>
 */
class MetaTag
{

	/**
	 *
	 * @var array
	 */
	private $elements;

	public function __construct()
	{

		$this->elements = array();

	}

	/**
	 * Add $element
	 *
	 * @param AttributeElement $element
	 *
	 * @return MetaTag $this
	 */
	public function addElement(AttributeElement $element)
	{

		$this->elements[] = $element;

		return $this;

	}

	/**
	 * Get $elements
	 *
	 * @return array
	 */
	public function getElements()
	{

		return $this->elements;

	}

	/**
	 * Set $elements
	 *
	 * @param array $elements
	 *
	 * @return MetaTag $this
	 */
	public function setElements(array $elements)
	{

		$this->elements = $elements;

		return $this;

	}

}