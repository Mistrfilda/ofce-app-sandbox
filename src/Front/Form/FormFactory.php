<?php

declare(strict_types=1);

namespace App\Front\Form;

class FormFactory
{
	public function createForm(): Form
	{
		$form = new Form();
		$form->setRenderer(new FormRenderer());
		return $form;
	}

	public function createInlineForm(): Form
	{
		return new Form();
	}
}
