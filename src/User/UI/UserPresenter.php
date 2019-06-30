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

	protected function createComponentUserGrid(): Datagrid
	{
		return $this->userGridFactory->create();
	}
}
