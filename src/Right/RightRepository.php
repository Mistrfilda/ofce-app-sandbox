<?php

declare(strict_types=1);

namespace App\Right;

use App\Doctrine\BaseRepository;
use Doctrine\ORM\QueryBuilder;


class RightRepository extends BaseRepository
{
	public function createQueryBuilder(): QueryBuilder
	{
		return $this->doctrineRepository->createQueryBuilder('right');
	}
}
