<?php

namespace Sasedev\Commons\SharedBundle\Model;

use Symfony\Component\Security\Core\Encoder\Pbkdf2PasswordEncoder;
use Symfony\Component\Security\Core\User\UserInterface;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;

/**
 *
 * @author sasedev <seif.salah@gmail.com>
 */
abstract class BaseUser implements UserInterface, \Serializable
{

	/**
	 *
	 * @var integer
	 */
	const SEXE_MISS = 1;

	/**
	 *
	 * @var integer
	 */
	const SEXE_MRS = 2;

	/**
	 *
	 * @var integer
	 */
	const SEXE_MR = 3;

	/**
	 *
	 * @var integer
	 */
	const LOCKOUT_UNLOCKED = 1;

	/**
	 *
	 * @var integer
	 */
	const LOCKOUT_LOCKED = 2;

	/**
	 *
	 * @var guid
	 */
	protected $id;

	/**
	 *
	 * @var string
	 */
	protected $username;

	/**
	 *
	 * @var string
	 */
	protected $email;

	/**
	 *
	 * @var string
	 */
	protected $clearPassword;

	/**
	 *
	 * @var string
	 */
	protected $password;

	/**
	 *
	 * @var string
	 */
	protected $salt;

	/**
	 *
	 * @var string
	 */
	protected $recoveryCode;

	/**
	 *
	 * @var \DateTime
	 */
	protected $recoveryExpiration;

	/**
	 *
	 * @var integer
	 */
	protected $lockout;

	/**
	 *
	 * @var \DateTime
	 */
	protected $dtCrea;

	/**
	 *
	 * @var \DateTime
	 */
	protected $dtUpdate;

	/**
	 *
	 * @var integer
	 */
	protected $logins;

	/**
	 *
	 * @var \DateTime
	 */
	protected $lastLogin;

	/**
	 *
	 * @var \DateTime
	 */
	protected $lastActivity;

	/**
	 *
	 * @var Collection
	 */
	protected $userRoles;

	/**
	 * Constructor
	 */
	public function __construct()
	{
		$this->setDtCrea(new \DateTime('now'));
		$this->setLockout(self::LOCKOUT_UNLOCKED);
		$this->setLogins(0);
		$this->setSalt(md5(uniqid(null, true)));
		$this->setClearPassword(self::generateRandomChar(8, 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789'));
		
		$this->userRoles = new ArrayCollection();
	}

	/**
	 * Get id
	 * 
	 * @return guid
	 */
	public function getId()
	{
		return $this->id;
	}

	/**
	 * Set username
	 * 
	 * @param string $username        	
	 *
	 * @return BaseUser
	 */
	public function setUsername($username)
	{
		$this->username = trim(strtolower($username));
		
		return $this;
	}

	/**
	 * Get username
	 * {@inheritDoc} @see UserInterface::getUsername()
	 * 
	 * @return string
	 */
	public function getUsername()
	{
		return $this->username;
	}

	/**
	 * Set email
	 * 
	 * @param string $email        	
	 *
	 * @return BaseUser
	 */
	public function setEmail($email)
	{
		$this->email = trim(strtolower($email));
		
		return $this;
	}

	/**
	 * Get email
	 * 
	 * @return string
	 */
	public function getEmail()
	{
		return $this->email;
	}

	/**
	 * Set clearPassword
	 * 
	 * @param string $clearPassword        	
	 *
	 * @return BaseUser
	 */
	public function setClearPassword($clearPassword)
	{
		$this->clearPassword = $clearPassword;
		
		return $this->setPassword($clearPassword);
	}

	/**
	 * Get clearPassword
	 * 
	 * @return string
	 */
	public function getClearPassword()
	{
		return $this->clearPassword;
	}

	/**
	 * Set password
	 * 
	 * @param string $password        	
	 *
	 * @return BaseUser
	 */
	public function setPassword($password)
	{
		$encoder = new Pbkdf2PasswordEncoder('sha512', true, 1000);
		$this->password = $encoder->encodePassword($password, $this->getSalt());
		
		return $this;
	}

	/**
	 * Get password
	 * {@inheritDoc} @see UserInterface::getPassword()
	 * 
	 * @return string
	 */
	public function getPassword()
	{
		return $this->password;
	}

	/**
	 * Set salt
	 * 
	 * @param string $salt        	
	 *
	 * @return BaseUser
	 */
	public function setSalt($salt)
	{
		$this->salt = $salt;
		
		return $this;
	}

	/**
	 * Get salt
	 * {@inheritDoc} @see UserInterface::getSalt()
	 * 
	 * @return string
	 */
	public function getSalt()
	{
		return $this->salt;
	}

	/**
	 * Set recoveryCode
	 * 
	 * @param string $recoveryCode        	
	 *
	 * @return BaseUser
	 */
	public function setRecoveryCode($recoveryCode)
	{
		$this->recoveryCode = urlencode(base64_encode($recoveryCode));
		
		return $this;
	}

	/**
	 * Get recoveryCode
	 * 
	 * @return string
	 */
	public function getRecoveryCode()
	{
		return $this->recoveryCode;
	}

	/**
	 * Set recoveryExpiration
	 * 
	 * @param \DateTime $recoveryExpiration        	
	 *
	 * @return BaseUser
	 */
	public function setRecoveryExpiration(\DateTime $recoveryExpiration = null)
	{
		$this->recoveryExpiration = $recoveryExpiration;
		
		return $this;
	}

	/**
	 * Get recoveryExpiration
	 * 
	 * @return \DateTime
	 */
	public function getRecoveryExpiration()
	{
		return $this->recoveryExpiration;
	}

	/**
	 * Set lockout
	 * 
	 * @param integer $lockout        	
	 *
	 * @return BaseUser
	 */
	public function setLockout($lockout)
	{
		$this->lockout = $lockout;
		
		return $this;
	}

	/**
	 * Get lockout
	 * 
	 * @return integer
	 */
	public function getLockout()
	{
		return $this->lockout;
	}

	/**
	 * Set dtCrea
	 * 
	 * @param \DateTime $dtCrea        	
	 *
	 * @return BaseUser
	 */
	public function setDtCrea(\DateTime $dtCrea = null)
	{
		$this->dtCrea = $dtCrea;
		
		return $this;
	}

	/**
	 * Get dtCrea
	 * 
	 * @return \DateTime
	 */
	public function getDtCrea()
	{
		return $this->dtCrea;
	}

	/**
	 * Set dtUpdate
	 * 
	 * @param \DateTime $dtUpdate        	
	 *
	 * @return BaseUser
	 */
	public function setDtUpdate(\DateTime $dtUpdate = null)
	{
		$this->dtUpdate = $dtUpdate;
		
		return $this;
	}

	/**
	 * Get dtUpdate
	 * 
	 * @return \DateTime
	 */
	public function getDtUpdate()
	{
		return $this->dtUpdate;
	}

	/**
	 * Set logins
	 * 
	 * @param integer $logins        	
	 *
	 * @return BaseUser
	 */
	public function setLogins($logins)
	{
		$this->logins = $logins;
		
		return $this;
	}

	/**
	 * Get logins
	 * 
	 * @return integer
	 */
	public function getLogins()
	{
		return $this->logins;
	}

	/**
	 * Set lastLogin
	 * 
	 * @param \DateTime $lastLogin        	
	 *
	 * @return BaseUser
	 */
	public function setLastLogin(\DateTime $lastLogin = null)
	{
		$this->lastLogin = $lastLogin;
		
		return $this;
	}

	/**
	 * Get lastLogin
	 * 
	 * @return \DateTime
	 */
	public function getLastLogin()
	{
		return $this->lastLogin;
	}

	/**
	 * Set lastActivity
	 * 
	 * @param \DateTime $lastActivity        	
	 *
	 * @return BaseUser
	 */
	public function setLastActivity(\DateTime $lastActivity = null)
	{
		$this->lastActivity = $lastActivity;
		
		return $this;
	}

	/**
	 * Get lastActivity
	 * 
	 * @return \DateTime
	 */
	public function getLastActivity()
	{
		return $this->lastActivity;
	}

	/**
	 * Add Role
	 * 
	 * @param Role $role        	
	 *
	 * @return User
	 */
	public function addUserRole(BaseRole $role)
	{
		$this->userRoles[] = $role;
		
		return $this;
	}

	/**
	 * Remove Role
	 * 
	 * @param Role $role        	
	 *
	 * @return User
	 */
	public function removeUserRole(BaseRole $role)
	{
		$this->userRoles->removeElement($role);
		
		return $this;
	}

	/**
	 * set BaseRole Collection
	 * 
	 * @param Collection $roles        	
	 *
	 * @return User
	 */
	public function setUserRoles(Collection $roles = null)
	{
		$this->userRoles = $roles;
		
		return $this;
	}

	/**
	 * Get Role ArrayCollection
	 * 
	 * @return ArrayCollection
	 */
	public function getUserRoles()
	{
		return $this->userRoles;
	}

	/*
	 * {@inheritDoc} @see UserInterface::getRoles()
	 */
	public function getRoles()
	{
		return $this->userRoles->toArray();
	}

	/**
	 * Get calculated fullName From username, firstName and lastName
	 * 
	 * @return string
	 */
	abstract public function getFullname();

	/*
	 * {
	 * if (null == $this->getFirstName() && null == $this->getLastName()) {
	 * return $this->getUsername();
	 * } elseif (null != $this->getFirstName() && null != $this->getLastName()) {
	 * return $this->getFirstName() . " " . $this->getLastName();
	 * } else {
	 * if (null != $this->getLastName()) {
	 * return $this->getLastName();
	 * }
	 * if (null != $this->getFirstName()) {
	 * return $this->getFirstName();
	 * }
	 * }
	 * }
	 */
	
	/**
	 * Set the lastActivity to now
	 * 
	 * @return BaseUser
	 */
	public function isActiveNow()
	{
		return $this->setLastActivity(new \DateTime());
	}

	/**
	 * Erases the user credentials.
	 * {@inheritDoc} @see UserInterface::eraseCredentials()
	 */
	public function eraseCredentials()
	{
		// $this->clearPassword = null;
	}

	/**
	 * Serializes the BaseUser.
	 * The serialized data have to contain the fields used by the equals method
	 * and the username.
	 * {@inheritDoc} @see Serializable::serialize()
	 * 
	 * @return string
	 */
	public function serialize()
	{
		return serialize(array($this->password, $this->salt, $this->username, $this->email, $this->lockout, $this->id));
	}

	/**
	 * Unserializes the BaseUser.
	 * {@inheritDoc} @see Serializable::unserialize()
	 * 
	 * @param string $serialized        	
	 */
	public function unserialize($serialized)
	{
		$data = unserialize($serialized);
		// add a few extra elements in the array to ensure that we have enough
		// keys when
		// unserializing
		// older data which does not include all properties.
		$data = array_merge($data, array_fill(0, 2, null));
		
		list ($this->password, $this->salt, $this->username, $this->email, $this->lockout, $this->id) = $data;
	}

	/**
	 * Choice Form lockout
	 * 
	 * @return multitype:string
	 */
	public static function choiceLockout()
	{
		return array('Lockout.choice.' . self::LOCKOUT_UNLOCKED => self::LOCKOUT_UNLOCKED, 
			'Lockout.choice.' . self::LOCKOUT_LOCKED => self::LOCKOUT_LOCKED);
	}

	/**
	 * Choice Validator lockout
	 * 
	 * @return multitype:string
	 */
	public static function choiceLockoutCallback()
	{
		return array(self::LOCKOUT_UNLOCKED, self::LOCKOUT_LOCKED);
	}

	/**
	 * Choice Form sexe
	 * 
	 * @return multitype:string
	 */
	public static function choiceSexe()
	{
		return array('Sexe.choice.' . self::SEXE_MISS => self::SEXE_MISS, 'Sexe.choice.' . self::SEXE_MRS => self::SEXE_MRS, 
			'Sexe.choice.' . self::SEXE_MR => self::SEXE_MR);
	}

	/**
	 * Choice Validator sexe
	 * 
	 * @return multitype:integer
	 */
	public static function choiceSexeCallback()
	{
		return array(self::SEXE_MISS, self::SEXE_MRS, self::SEXE_MR);
	}

	/**
	 * Get a random char (for generated password)
	 * 
	 * @param integer $length        	
	 * @param string $charset        	
	 *
	 * @return string
	 */
	public static function generateRandomChar($length, $charset = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789#@!?+=*/-')
	{
		$str = '';
		$count = strlen($charset);
		while ($length --) {
			$str .= $charset[mt_rand(0, $count - 1)];
		}
		
		return $str;
	}

	/**
	 * string representation of the object
	 * 
	 * @return string
	 */
	public function __toString()
	{
		return (string) $this->getFullname();
	}
}
