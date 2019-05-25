<?php

declare(strict_types=1);

namespace App\Sign\UI\Form;

use App\Front\Form\BaseForm;
use App\Front\Form\Form;
use Nette\Security\AuthenticationException;
use Nette\Security\User;

class SignFormFactory extends BaseForm
{
	/** @var User */
	private $user;

	public function __construct(User $user)
	{
		$this->user = $user;
	}

	public function create(callable $onSuccess): Form
	{
		$form = $this->formFactory->createForm();
		$form->setMappedType(SignDTO::class);

		$form->addText('username', 'Username')->setRequired();

		$form->addPassword('password', 'Password')->setRequired();

		$form->onSuccess[] = function (Form $form, SignDTO $signDTO) use ($onSuccess): void {
			$this->processSignForm($form, $signDTO, $onSuccess);
		};

		return $form;
	}

	private function processSignForm(Form $form, SignDTO $signDTO, callable $onSuccess): void
	{
		try {
			$this->user->login($signDTO->username, $signDTO->password);
		} catch (AuthenticationException $e) {
			$form->addError($e->getMessage());
			return;
		}

		$onSuccess();
	}
}
