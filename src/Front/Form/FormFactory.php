<?php

declare(strict_types=1);

namespace App\Front\Form;

class FormFactory
{
	public function createForm(): Form
	{
		return new Form();
	}
}
