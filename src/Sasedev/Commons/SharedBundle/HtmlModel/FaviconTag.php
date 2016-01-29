<?php

namespace Sasedev\Commons\SharedBundle\HtmlModel;

/**
 *
 * @author sasedev <seif.salah@gmail.com>
 */
class FaviconTag extends LinkTag
{


	public function __construct($url = 'favicon.ico', $type = 'image/x-icon', $isAsset = true)
	{
		parent::__construct();
		$relElement = new RelElement('icon');
		$typeElement = new AttributeElement('type', $type);
		$hrefElement = new HrefElement($url, $isAsset);
		$this->addElement($relElement);
		$this->addElement($typeElement);
		$this->addElement($hrefElement);
	}

}