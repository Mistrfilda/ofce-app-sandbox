<?php

declare(strict_types=1);

namespace App\User\UI;

use App\Front\Datagrid\Datagrid;
use App\Front\UI\SecurePresenter;
use App\User\UI\Grid\UserGridFactory;

class UserPresenter extends SecurePresenter
{
	/** @var UserGridFactory */
	private $userGridFactory;

	public function __construct(UserGridFactory $userGridFactory)
	{
		parent::__construct();
		$this->userGridFactory = $userGridFactory;
	}

	public function renderDefault(): void
	{
		$this->pageNavigation->setTitle('Users');
	}

	protected function createComponentUserGrid(): Datagrid
	{
		return $this->userGridFactory->create();
	}
}
