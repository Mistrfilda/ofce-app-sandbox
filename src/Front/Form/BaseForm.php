<?php

declare(strict_types=1);

namespace App\Front\Form;

abstract class BaseForm
{
	/** @var FormFactory */
	protected $formFactory;

	public function injectFormFactory(FormFactory $formFactory): void
	{
		$this->formFactory = $formFactory;
	}
}
