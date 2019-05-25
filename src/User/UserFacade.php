<?php

declare(strict_types=1);

namespace App\User;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Nette\Security\User as NetteUser;

class UserFacade
{
	/** @var EntityManager */
	private $entityManager;

	/** @var UserRepository */
	private $userRepository;

	/** @var NetteUser */
	private $netteUser;

	public function __construct(
		EntityManagerInterface $entityManager,
		UserRepository $userRepository,
		NetteUser $netteUser
	) {
		$this->entityManager = $entityManager;
		$this->userRepository = $userRepository;
		$this->netteUser = $netteUser;
	}
}
