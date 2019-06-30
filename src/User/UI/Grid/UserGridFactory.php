<?php

declare(strict_types=1);

namespace App\User\UI\Grid;

use App\Front\Datagrid\BaseDatagrid;
use App\Front\Datagrid\Datagrid;
use App\User\UserRepository;

class UserGridFactory extends BaseDatagrid
{
	/** @var UserRepository */
	private $userRepository;

	public function __construct(UserRepository $userRepository)
	{
		$this->userRepository = $userRepository;
	}

	public function create(): Datagrid
	{
		$grid = $this->datagridFactory->create();

		$grid->setDataSource($this->userRepository->createQueryBuilder());

		$grid->addColumnText('id', 'ID')
			->setSortable()
			->setFilterText();

		$grid->addColumnText('name', 'Name')
			->setSortable()
			->setFilterText();

		$grid->addColumnText('email', 'Email')
			->setSortable()
			->setFilterText();

		return $grid;
	}
}
