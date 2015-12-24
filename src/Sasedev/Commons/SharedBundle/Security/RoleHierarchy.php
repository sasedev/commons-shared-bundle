<?php

namespace Sasedev\Commons\SharedBundle\Security;

use Doctrine\Bundle\DoctrineBundle\Registry as Doctrine;
use Doctrine\ORM\EntityManager;
use Symfony\Component\Security\Core\Role\RoleHierarchy as BaseRoleHierarchy;

/**
 *
 * @author sasedev <seif.salah@gmail.com>
 */
abstract class RoleHierarchy extends BaseRoleHierarchy
{

	/**
	 *
	 * @var EntityManager
	 */
	private $em;

	/**
	 *
	 * @param array $hierarchy
	 */
	public function __construct(Doctrine $doctrine)
	{
		$this->em = $doctrine->getManager();
		parent::__construct($this->buildRolesTree());
	}

	/**
	 * @return EntityManager
	 */
	public function getEntitymanager()
	{
		return $this->em;
	}

	/**
	 * Here we build an array with roles.
	 * It looks like a two-levelled tree - just
	 * like original Symfony roles are stored in security.yml
	 *
	 * @return array
	 */

	abstract public function buildRolesTree();
	/*{
		$hierarchy = array();
		$roles = $this->em->getRepository('SasedevCommonsSharedBundle:Role')
			->getAll();

		foreach ($roles as $role) {
			if (count($role->getParents()) > 0) {
				$roleParents = array();

				foreach ($role->getParents() as $parent) {
					$roleParents[] = $parent->getRole();
				}

				$hierarchy[$role->getRole()] = $roleParents;
			}
		}

		return $hierarchy;
	}*/
}
