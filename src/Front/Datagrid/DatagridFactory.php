<?php

declare(strict_types=1);

namespace App\Front\Datagrid;

class DatagridFactory
{
	public function create(): Datagrid
	{
		return new Datagrid();
	}
}
