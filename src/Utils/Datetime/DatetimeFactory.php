<?php

declare(strict_types=1);

namespace App\Utils\Datetime;

use DateTimeImmutable;

use function date;

class DatetimeFactory
{
	public function createNow(): DateTimeImmutable
	{
		return new DateTimeImmutable();
	}

	public function createToday(): DateTimeImmutable
	{
		return new DateTimeImmutable(date('Y-m-d') . '00:00:00');
	}
}
