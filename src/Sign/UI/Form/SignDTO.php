<?php

declare(strict_types=1);

namespace App\Sign\UI\Form;

use Nette\SmartObject;

class SignDTO
{
	use SmartObject;

	/** @var string */
	public $username;

	/** @var string */
	public $password;
}
