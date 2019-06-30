<?php

declare(strict_types=1);

namespace App\Login\UI;

use Nette\SmartObject;

class LoginFormDTO
{
	use SmartObject;

	/** @var string */
	public $email;

	/** @var string */
	public $password;
}
