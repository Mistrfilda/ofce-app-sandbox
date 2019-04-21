<?php

declare(strict_types = 1);


namespace App\Notification;


use App\User\User;
use App\Utils\Database\Entity;
use App\Utils\Database\Identifier;
use Doctrine\ORM\Mapping as ORM;


/**
 * @ORM\Entity
 */
class Notification implements Entity
{
	use Identifier;

	/**
	 * @var string
	 * @ORM\Column(type="string")
	 */
	private $title;

	/**
	 * @var string
	 * @ORM\Column(type="string")
	 */
	private $content;

	/**
	 * @var string
	 * @ORM\Column(type="string")
	 */
	private $priority;

	/**
	 * @var string|null
	 * @ORM\Column(type="string", nullable=true)
	 */
	private $icon;

	/**
	 * @var User
	 * @ORM\ManyToOne(targetEntity="App\User\User", inversedBy="notifications")
	 */
	private $user;

	public function __construct(string $title, string $content, string $priority, User $user, ?string $icon = null)
	{
		$this->title = $title;
		$this->content = $content;
		$this->priority = $priority;
		$this->user = $user;
		$this->icon = $icon;
	}

	/**
	 * @return string
	 */
	public function getTitle(): string
	{
		return $this->title;
	}

	/**
	 * @return string
	 */
	public function getContent(): string
	{
		return $this->content;
	}

	/**
	 * @return string
	 */
	public function getPriority(): string
	{
		return $this->priority;
	}

	/**
	 * @return string|null
	 */
	public function getIcon(): ?string
	{
		return $this->icon;
	}

	/**
	 * @return User
	 */
	public function getUser(): User
	{
		return $this->user;
	}
}