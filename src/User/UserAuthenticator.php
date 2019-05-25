<?php

declare(strict_types=1);

namespace App\User;

use App\User\Exception\UserNotFoundException;
use Nette\Security\AuthenticationException;
use Nette\Security\IAuthenticator;
use Nette\Security\Identity;
use Nette\Security\IIdentity;
use Nette\Security\Passwords;

class UserAuthenticator implements IAuthenticator
{
	/** @var UserRepository */
	private $userRepository;

	/** @var Passwords */
	private $passwords;

	public function __construct(UserRepository $userRepository, Passwords $passwords)
	{
		$this->userRepository = $userRepository;
		$this->passwords = $passwords;
	}

	/**
	 * @param string[] $credentials
	 * @return IIdentity
	 */
	public function authenticate(array $credentials): IIdentity
	{
		[$username, $password] = $credentials;

		try {
			$user = $this->userRepository->getByEmail($username);
		} catch (UserNotFoundException $e) {
			throw new AuthenticationException('User not found');
		}

		if (! $this->passwords->verify($password, $user->getPassword())) {
			throw new AuthenticationException('Invalid password');
		}

		return new Identity($user->getId());
	}
}
