<?php

declare(strict_types=1);

namespace App\Front\Form;

use App\Front\Form\Input\DatetimePicker;
use Nette\Application\UI\Form as NetteForm;

class Form extends NetteForm
{
	public function addDatetimePicker(string $name, string $label): DatetimePicker
	{
		return $this[$name] = new DatetimePicker($label);
	}
}
