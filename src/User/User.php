<?php

declare(strict_types=1);

namespace App\User;

use App\Utils\Database\Entity;
use App\Utils\Database\Identifier;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class User implements Entity
{
	use Identifier;

	/**
	 * @var string
	 * @ORM\Column(type="string")
	 */
	private $name;

	public function __construct(string $name)
	{
		$this->name = $name;
	}

	/**
	 * @return string
	 */
	public function getName(): string
	{
		return $this->name;
	}
}
