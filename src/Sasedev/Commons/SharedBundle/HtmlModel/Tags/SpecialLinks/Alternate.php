<?php

namespace Sasedev\Commons\SharedBundle\HtmlModel\Tags\SpecialLinks;

use Sasedev\Commons\SharedBundle\HtmlModel\Attributes\Href;
use Sasedev\Commons\SharedBundle\HtmlModel\Attributes\Hreflang;
use Sasedev\Commons\SharedBundle\HtmlModel\Attributes\Media;
use Sasedev\Commons\SharedBundle\HtmlModel\Attributes\Rel;
use Sasedev\Commons\SharedBundle\HtmlModel\Attributes\Title;
use Sasedev\Commons\SharedBundle\HtmlModel\Attributes\Type;
use Sasedev\Commons\SharedBundle\HtmlModel\Tags\Link;

/**
 *
 * @author sasedev <seif.salah@gmail.com>
 */
class Alternate extends Link
{

	/**
	 * Constructor
	 *
	 * @param Href|string $href
	 * @param string $type
	 * @param string $title
	 * @param string $hreflang
	 * @param string $media
	 */
	public function __construct($href = null, $type = null, $title = null, $hreflang = null, $media = null)
	{

		$attributes = array();

		$attributes[] = new Rel('alternate');
		if (null != $type) {
			$attributes[] = new Type($type);
		}
		if (null != $title) {
			$attributes[] = new Title($title);
		}
		if (null != $hreflang) {
			$attributes[] = new Hreflang($hreflang);
		}
		if (null != $media) {
			$attributes[] = new Media($media);
		}
		if (null != $href) {
			if ($href instanceof Href) {
				$attributes[] = $href;
			} else {
				$attributes[] = new Href($href);
			}

		}

		parent::__construct($attributes);

	}

}