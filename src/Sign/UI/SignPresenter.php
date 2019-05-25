<?php

declare(strict_types=1);

namespace App\Sign\UI;

use App\Front\Form\Form;
use App\Front\UI\BasePresenter;
use App\Sign\UI\Form\SignFormFactory;

class SignPresenter extends BasePresenter
{
	/** @var SignFormFactory */
	private $signFormFactory;

	public function __construct(SignFormFactory $signFormFactory)
	{
		parent::__construct();
		$this->signFormFactory = $signFormFactory;
	}

	public function createComponentLoginForm(): Form
	{
		$onSuccess = function (): void {
			$this->flashMessage('Successully	 logged in');
			$this->redirect('Homepage:default');
		};

		return $this->signFormFactory->create($onSuccess);
	}
}
