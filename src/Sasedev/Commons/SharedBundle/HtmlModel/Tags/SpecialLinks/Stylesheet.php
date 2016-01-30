<?php

namespace Sasedev\Commons\SharedBundle\HtmlModel\Tags\SpecialLinks;

use Sasedev\Commons\SharedBundle\HtmlModel\Attributes\Href;
use Sasedev\Commons\SharedBundle\HtmlModel\Attributes\Media;
use Sasedev\Commons\SharedBundle\HtmlModel\Attributes\Rel;
use Sasedev\Commons\SharedBundle\HtmlModel\Attributes\Title;
use Sasedev\Commons\SharedBundle\HtmlModel\Attributes\Type;
use Sasedev\Commons\SharedBundle\HtmlModel\Tags\Link;

/**
 *
 * @author sasedev <seif.salah@gmail.com>
 */
class Stylesheet extends Link
{

	/**
	 * Constructor
	 *
	 * @param Href|string $href
	 * @param string $type
	 * @param string $media
	 * @param string $title
	 * @param boolean $alternate
	 */
	public function __construct($href, $type = 'text/css', $media = null, $title = null, $alternate = false)
	{

		$attributes = array();

		if (!$alternate) {
			$attributes[] = new Rel('stylesheet');
		} else {
			$attributes[] = new Rel('alternate stylesheet');
		}
		if (null != $type) {
			$attributes[] = new Type($type);
		}
		if ($href instanceof Href) {
			$attributes[] = $href;
		} else {
			$attributes[] = new Href($href);
		}
		if (null != $title) {
			$attributes[] = new Title($title);
		}
		if (null != $media) {
			$attributes[] = new Media($media);
		}

		parent::__construct($attributes);

	}

}