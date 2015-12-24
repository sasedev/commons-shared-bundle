<?php

namespace Sasedev\Commons\SharedBundle\Validator;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\Constraints\AbstractComparison;

/**
 * @Annotation
 * 
 * @author sasedev <seif.salah@gmail.com>
 */
class DateTimeGreaterThan extends AbstractComparison
{

	public $message = 'This value should be greater than {{ compared_value }}.';

	/**
	 * {@inheritDoc} @see Constraint::validatedBy()
	 * 
	 * @return string Validator Class
	 */
	public function validatedBy()
	{
		return get_class($this) . 'Validator';
	}
}
