<?php

namespace Sasedev\Commons\SharedBundle\Listener;

use Doctrine\Bundle\DoctrineBundle\Registry as Doctrine;
use Doctrine\ORM\EntityManager;
use Symfony\Component\HttpKernel\Event\FilterControllerEvent;
use Symfony\Component\HttpKernel\HttpKernel;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorage;
use Sasedev\Commons\SharedBundle\Model\BaseUser;

/**
 * Activity Listener
 *
 * @author sasedev <seif.salah@gmail.com>
 */
class Activity
{

	/**
	 *
	 * @var TokenStorage
	 */
	private $tokenStorage;

	/**
	 *
	 * @var EntityManager
	 */
	private $em;

	/**
	 * Constructor
	 *
	 * @param TokenStorage $tokenStorage
	 * @param Doctrine $doctrine
	 */
	public function __construct(TokenStorage $tokenStorage, Doctrine $doctrine)
	{
		$this->tokenStorage = $tokenStorage;
		$this->em = $doctrine->getManager();
	}

	/**
	 * Update the user "lastActivity" on each request
	 *
	 * @param FilterControllerEvent $event
	 */
	public function onCoreController(FilterControllerEvent $event)
	{
		// Here we are checking that the current request is a "MASTER_REQUEST",
		// and ignore any
		// subrequest in the process (for example when
		// doing a render() in a twig template)
		if ($event->getRequestType() !== HttpKernel::MASTER_REQUEST) {
			return;
		}

		// We are checking a token authentification is available before using
		// the User
		if ($this->tokenStorage->getToken()) {
			$user = $this->tokenStorage->getToken()->getUser();

			// We are using a delay during wich the user will be considered as
			// still active, in order to
			// avoid too much UPDATE in the
			// database
			// $delay = new \DateTime ();
			// $delay->setTimestamp (strtotime ('2 minutes ago'));

			// We are checking the Admin class in order to be certain we can
			// call "getLastActivity".
			// && $user->getLastActivity() < $delay) {
			if ($user instanceof BaseUser) {
				$user->isActiveNow();
				$this->em->persist($user);
				$this->em->flush();
			}
		}
	}
}
