<?php

declare(strict_types=1);

namespace App\User;

use App\User\Exception\UserNotLoggedInException;
use Nette\Security\User as NetteUser;

class CurrentUserGetter
{
	/** @var NetteUser */
	private $netteUser;

	/** @var UserRepository */
	private $userRepository;

	public function __construct(NetteUser $netteUser, UserRepository $userRepository)
	{
		$this->netteUser = $netteUser;
		$this->userRepository = $userRepository;
	}

	public function isLoggedIn(): bool
	{
		return $this->netteUser->isLoggedIn();
	}

	public function getUser(): User
	{
		if (! $this->isLoggedIn() || $this->netteUser->getIdentity() === null) {
			throw new UserNotLoggedInException();
		}

		return $this->userRepository->getById($this->netteUser->getIdentity()->getId());
	}

	public function login(string $email, string $password): User
	{
		$this->netteUser->login($email, $password);

		if ($this->netteUser->getIdentity() === null) {
			throw new UserNotLoggedInException();
		}

		return $this->userRepository->getById($this->netteUser->getIdentity()->getId());
	}

	public function logout(): void
	{
		$this->netteUser->logout(true);
	}
}
