<?php

namespace Sasedev\Commons\SharedBundle\Validator;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;
use Symfony\Component\Validator\ConstraintValidatorInterface;

/**
 * PhoneValidator ConstraintValidator
 * 
 * @author sasedev <seif.salah@gmail.com>
 */
class PhoneValidator extends ConstraintValidator
{

	/**
	 * Check if a Phonenumber is valid
	 * 
	 * @param string $value        	
	 * @param Constraint $constraint        	
	 *
	 * @return bool
	 *
	 */
	public function isValid($value, Constraint $constraint)
	{
		if (empty($value)) {
			return true;
		}
		
		$ret = $this->validateNumber($value, $constraint->format);
		
		if (!$ret) {
			$this->setMessage($constraint->message);
		}
		
		return $ret;
	}

	/**
	 * Validate Phonenumber
	 * 
	 * @param string $value        	
	 * @param string $format        	
	 *
	 * @return bool
	 *
	 */
	protected function validateNumber($value, $format)
	{
		$ret = preg_match($format, trim($value));
		
		return ($ret !== false && $ret >= 1);
	}

	/**
	 * {@inheritDoc} @see ConstraintValidatorInterface::validate()
	 * 
	 * @param string $value        	
	 * @param Constraint $constraint        	
	 *
	 *
	 */
	public function validate($value, Constraint $constraint)
	{
		if (!empty($value)) {
			if (!preg_match($constraint->format, $value)) {
				$this->context->addViolation($constraint->message, array('%string%' => $value));
			}
		}
	}
}
