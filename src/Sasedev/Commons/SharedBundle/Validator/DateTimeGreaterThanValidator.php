<?php

namespace Sasedev\Commons\SharedBundle\Validator;

use Symfony\Component\Validator\Constraints\AbstractComparisonValidator;

/**
 * DateTimeGreaterThan ConstraintValidator
 * Validates values are greater than the previous (>).
 *
 * @author sasedev <seif.salah@gmail.com>
 */
class DateTimeGreaterThanValidator extends AbstractComparisonValidator
{
	/**
	 * @inheritDoc
	 */
	protected function compareValues($value1, $value2)
	{
		return $value1 > new \DateTime($value2);
	}
}
