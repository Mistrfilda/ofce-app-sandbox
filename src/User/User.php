<?php

declare(strict_types=1);

namespace App\User;

use App\Notification\Notification;
use App\Right\Right;
use App\Utils\Database\Entity;
use App\Utils\Database\Identifier;
use Doctrine\Common\Collections\Collection;
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

	/**
	 * @var string
	 * @ORM\Column(type="string")
	 */
	private $email;

	/**
	 * @var string
	 * @ORM\Column(type="string")
	 */
	private $password;

	/**
	 * @var Collection
	 * @ORM\ManyToMany(targetEntity="App\Right\Right", mappedBy="users")
	 */
	private $rights;

	/**
	 * @var Collection
	 * @ORM\OneToMany(targetEntity="App\Notification\Notification", mappedBy="user")
	 */
	private $notifications;

	public function __construct(string $name, string $email, string $password)
	{
		$this->name = $name;
		$this->email = $email;
		$this->password = $password;
	}

	/**
	 * @return string
	 */
	public function getName(): string
	{
		return $this->name;
	}

	/**
	 * @return string
	 */
	public function getEmail(): string
	{
		return $this->email;
	}

	/**
	 * @return string
	 */
	public function getPassword(): string
	{
		return $this->password;
	}

	/**
	 * @return Right[]
	 */
	public function getRights(): array
	{
		return $this->rights->toArray();
	}

	/**
	 * @return Notification[]
	 */
	public function getNotifications(): array
	{
		return $this->notifications->toArray();
	}
}
