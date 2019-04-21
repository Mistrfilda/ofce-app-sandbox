<?php

declare(strict_types=1);

namespace App\Doctrine;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\QueryBuilder;


abstract class BaseRepository
{
	/** @var EntityManager */
	protected $entityManager;

	/** @var EntityRepository */
	protected $doctrineRepository;

	public function __construct(string $class, EntityManagerInterface $entityManager)
	{
		$this->entityManager = $entityManager;
		$this->doctrineRepository = $entityManager->getRepository($class);
	}

	public abstract function createQueryBuilder(): QueryBuilder;
}