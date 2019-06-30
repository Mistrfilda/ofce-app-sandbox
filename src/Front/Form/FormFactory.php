<?php

declare(strict_types=1);

namespace App\Front\Form;

class FormFactory
{
	public function createForm(?string $mappedClass = null): Form
	{
		$form = new Form();

		if ($mappedClass !== null) {
			$form->setMappedType($mappedClass);
		}

		$form->setRenderer(new FormRenderer());
		return $form;
	}
}
