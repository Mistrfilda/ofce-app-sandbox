<?php

declare(strict_types=1);

namespace App\Front\Datagrid;

class BaseDatagrid
{
	/** @var DatagridFactory */
	protected $datagridFactory;

	public function injectDatagridFactory(DatagridFactory $datagridFactory): void
	{
		$this->datagridFactory = $datagridFactory;
	}
}
