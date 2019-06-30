<?php

declare(strict_types=1);

namespace App\Login\UI;

use App\Front\Form\BaseForm;
use App\Front\Form\Form;
use App\User\Exception\UserNotLoggedInException;
use App\User\UserFacade;
use Nette\Security\AuthenticationException;

class LoginFormFactory extends BaseForm
{
	/** @var UserFacade */
	private $userFacade;

	public function __construct(UserFacade $userFacade)
	{
		$this->userFacade = $userFacade;
	}

	public function create(callable $onSuccess): Form
	{
		$form = $this->formFactory->createForm(LoginFormDTO::class);

		$form->addText('email', 'Email')
			->setRequired()
			->addRule(Form::EMAIL);

		$form->addPassword('password', 'Password')
			->setRequired();

		$form->onSuccess[] = function (Form $form, LoginFormDTO $values) use ($onSuccess): void {
			$this->processForm($form, $values, $onSuccess);
		};

		$form->addSubmit('submit', 'Submit');

		return $form;
	}

	private function processForm(Form $form, LoginFormDTO $values, callable $onSuccess): void
	{
		try {
			$this->userFacade->login($values->email, $values->password);
		} catch (AuthenticationException $e) {
			$form->addError('Invalid login');
			return;
		} catch (UserNotLoggedInException $e) {
			$form->addError('Invalid login');
			return;
		}

		$onSuccess();
	}
}
