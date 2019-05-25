<?php

declare(strict_types=1);

namespace App\Notification;

use App\Doctrine\BaseRepository;
use Doctrine\ORM\QueryBuilder;

class NotificationRepository extends BaseRepository
{
	public function createQueryBuilder(): QueryBuilder
	{
		return $this->doctrineRepository->createQueryBuilder('notification');
	}
}
