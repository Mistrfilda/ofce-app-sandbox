<?php

declare(strict_types=1);

namespace App\Doctrine;

use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\QueryBuilder;

abstract class BaseRepository
{
	/** @var EntityManagerInterface */
	protected $entityManager;

	/** @var EntityRepository */
	protected $doctrineRepository;

	public function __construct(string $class, EntityManagerInterface $entityManager)
	{
		$this->entityManager = $entityManager;
		$this->doctrineRepository = $entityManager->getRepository($class);
	}

	abstract public function createQueryBuilder(): QueryBuilder;
}
