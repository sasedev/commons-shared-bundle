<?php

namespace Sasedev\Commons\SharedBundle\Model;

use Symfony\Component\Security\Core\Role\RoleInterface;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;

/**
 *
 * @author sasedev <seif.salah@gmail.com>
 */
class BaseRole implements RoleInterface
{

	/**
	 *
	 * @var guid
	 */
	protected $id;

	/**
	 *
	 * @var string
	 */
	/**
	 *
	 * @var string
	 */
	protected $name;

	/**
	 *
	 * @var string
	 */
	protected $description;

	/**
	 *
	 * @var Collection
	 */
	protected $parents;

	/**
	 *
	 * @var Collection
	 */
	protected $childs;

	/**
	 * Constructor
	 */
	public function __construct()
	{
		$this->parents = new ArrayCollection();
		$this->childs = new ArrayCollection();
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
	 * Set name
	 * 
	 * @param string $name        	
	 *
	 * @return Role
	 */
	public function setName($name)
	{
		$this->name = trim(strtoupper($name));
		
		return $this;
	}

	/**
	 * Get name
	 * 
	 * @return string
	 */
	public function getName()
	{
		return $this->name;
	}

	/**
	 * Set description
	 * 
	 * @param string $roleDescription        	
	 *
	 * @return Role
	 */
	public function setDescription($roleDescription)
	{
		$this->description = $roleDescription;
		
		return $this;
	}

	/**
	 * Get description
	 * 
	 * @return string
	 */
	public function getDescription()
	{
		return $this->description;
	}

	/**
	 * Add BaseRole
	 * 
	 * @param BaseRole $role        	
	 *
	 * @return BaseRole
	 */
	public function addParent(BaseRole $role)
	{
		$this->parents[] = $role;
		
		return $this;
	}

	/**
	 * Remove BaseRole
	 * 
	 * @param BaseRole $role        	
	 *
	 * @return BaseRole
	 */
	public function removeParent(BaseRole $role)
	{
		$this->parents->removeElement($role);
		
		return $this;
	}

	/**
	 * Set BaseRole Collection
	 * 
	 * @param Collection $roles        	
	 *
	 * @return Role
	 */
	public function setParents(Collection $roles)
	{
		$this->parents = $roles;
		
		return $this;
	}

	/**
	 * Get BaseRole ArrayCollection
	 * 
	 * @return ArrayCollection
	 */
	public function getParents()
	{
		return $this->parents;
	}

	/**
	 * Add BaseRole
	 * 
	 * @param BaseRole $role        	
	 *
	 * @return BaseRole
	 */
	public function addChild(BaseRole $role)
	{
		$this->childs[] = $role;
		
		return $this;
	}

	/**
	 * Remove BaseRole
	 * 
	 * @param BaseRole $role        	
	 *
	 * @return BaseRole
	 */
	public function removeChild(BaseRole $role)
	{
		$this->childs->removeElement($role);
		
		return $this;
	}

	/**
	 * Set BaseRole Collection
	 * 
	 * @param Collection $roles        	
	 *
	 * @return Role
	 */
	public function setChilds(Collection $roles)
	{
		$this->childs = $roles;
		
		return $this;
	}

	/**
	 * Get BaseRole ArrayCollection
	 * 
	 * @return ArrayCollection
	 */
	public function getChilds()
	{
		return $this->childs;
	}

	/**
	 * {@inheritDoc} @see RoleInterface::getRole()
	 * 
	 * @return string
	 */
	public function getRole()
	{
		return $this->getName();
	}

	/**
	 * string representation of the object
	 * 
	 * @return string
	 */
	public function __toString()
	{
		return (string) $this->getName();
	}
}
