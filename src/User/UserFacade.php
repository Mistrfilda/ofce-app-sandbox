<?php

declare(strict_types=1);

namespace App\User;

use App\User\Exception\DuplicateEmailException;
use App\User\Exception\UserNotFoundException;
use Doctrine\ORM\EntityManagerInterface;
use Nette\Security\Passwords;

class UserFacade
{
	/** @var EntityManagerInterface */
	private $entityManager;

	/** @var UserRepository */
	private $userRepository;

	/** @var CurrentUserGetter */
	private $currentUserGetter;

	/** @var Passwords */
	private $passwords;

	public function __construct(
		EntityManagerInterface $entityManager,
		UserRepository $userRepository,
		CurrentUserGetter $currentUserGetter,
		Passwords $passwords
	) {
		$this->entityManager = $entityManager;
		$this->userRepository = $userRepository;
		$this->currentUserGetter = $currentUserGetter;
		$this->passwords = $passwords;
	}

	public function login(string $email, string $password): User
	{
		return $this->currentUserGetter->login($email, $password);
	}

	public function create(string $name, string $email, string $password): User
	{
		try {
			$this->userRepository->getByEmail($email);
			throw new DuplicateEmailException();
		} catch (UserNotFoundException $e) {
		}

		$user = new User(
			$name,
			$email,
			$this->passwords->hash($password)
		);

		$this->entityManager->persist($user);
		$this->entityManager->flush();

		//Refresh to get fresh ID
		$this->entityManager->refresh($user);

		return $user;
	}
}
