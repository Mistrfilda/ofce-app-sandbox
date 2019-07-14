<?php

declare(strict_types=1);

namespace App\Login\UI;

use App\Front\Form\Form;
use App\Front\UI\BasePresenter;
use App\Utils\FlashMessage\FlashMessageType;

class LoginPresenter extends BasePresenter
{
	/** @var LoginFormFactory */
	private $loginFormFactory;

	public function __construct(LoginFormFactory $loginFormFactory)
	{
		parent::__construct();
		$this->loginFormFactory = $loginFormFactory;
	}

	public function createComponentLoginForm(): Form
	{
		$onSuccess = function (): void {
			$this->flashMessage('Successfully logged in', FlashMessageType::SUCCESS);
			if ($this->backlink !== null) {
				$this->restoreRequest($this->backlink);
			}

			$this->redirect('Homepage:default');
		};

		return $this->loginFormFactory->create($onSuccess);
	}
}
