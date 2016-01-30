<?php

namespace Sasedev\Commons\SharedBundle\HtmlModel\Tags\SpecialMetas\Name;

use Sasedev\Commons\SharedBundle\HtmlModel\Tags\SpecialMetas\NameContentMeta;

/**
 *
 * @author sasedev <seif.salah@gmail.com>
 */
class Author extends NameContentMeta
{

	/**
	 * Contructor
	 *
	 * @param string $author
	 */
	public function __construct($author)
	{

		parent::__construct('author', $author);

	}

}