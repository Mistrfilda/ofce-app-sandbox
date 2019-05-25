<?php

declare(strict_types=1);

namespace App\User;

use App\Doctrine\BaseRepository;
use App\User\Exception\UserNotFoundException;
use Doctrine\ORM\NoResultException;
use Doctrine\ORM\QueryBuilder;

class UserRepository extends BaseRepository
{
	public function createQueryBuilder(): QueryBuilder
	{
		return $this->doctrineRepository->createQueryBuilder('user');
	}

	public function getById(int $id): User
	{
		$qb = $this->createQueryBuilder();
		$qb->where($qb->expr()->eq('user.id', ':id'));
		$qb->setParameter('id', $id);

		try {
			return $qb->getQuery()->getSingleResult();
		} catch (NoResultException $e) {
			throw new UserNotFoundException();
		}
	}

	public function getByEmail(string $email): User
	{
		$qb = $this->createQueryBuilder();
		$qb->where($qb->expr()->eq('user.email', ':email'));
		$qb->setParameter('email', $email);

		try {
			return $qb->getQuery()->getSingleResult();
		} catch (NoResultException $e) {
			throw new UserNotFoundException();
		}
	}
}
