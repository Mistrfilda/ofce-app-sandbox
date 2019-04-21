<?php

declare(strict_types=1);

namespace App\Doctrine;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityRepository;

abstract class BaseRepository
{
	/** @var EntityManager */
	protected $entityManager;

	/** @var EntityRepository */
	protected $doctrineRepository;

	public function __construct(string $class, EntityManager $entityManager)
	{
		$this->entityManager = $entityManager;
		$this->doctrineRepository = $entityManager->getRepository($class);
	}
}
