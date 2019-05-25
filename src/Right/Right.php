<?php

declare(strict_types=1);

namespace App\Right;

use App\User\User;
use App\Utils\Database\Entity;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class Right implements Entity
{
	/** @var int */
	public const ALL = 1;

	/** @var int */
	public const USERS = 2;

	/** @var int */
	public const RIGHTS = 3;

	/** @var int[] */
	public const ALL_RIGHTS = [
		self::ALL,
		self::USERS,
		self::RIGHTS,
	];

	/**
	 * @var int
	 * @ORM\Id
	 * @ORM\Column(type="integer")
	 */
	private $id;

	/**
	 * @var string
	 * @ORM\Column(type="string")
	 */
	private $name;

	/**
	 * @var Collection
	 * @ORM\ManyToMany(targetEntity="App\User\User", inversedBy="rights")
	 */
	private $users;

	public function __construct(int $id, string $name)
	{
		$this->id = $id;
		$this->name = $name;
	}

	/**
	 * @return int
	 */
	public function getId(): int
	{
		return $this->id;
	}

	/**
	 * @return string
	 */
	public function getName(): string
	{
		return $this->name;
	}

	/**
	 * @return User[]
	 */
	public function getUsers(): array
	{
		return $this->users->toArray();
	}
}
