<?php

declare(strict_types=1);

namespace App\Front\Navigation;

class Breadcrumb
{
	/** @var string */
	private $text;

	/** @var string */
	private $link;

	public function __construct(string $text, string $link)
	{
		$this->text = $text;
		$this->link = $link;
	}

	/**
	 * @return string
	 */
	public function getText(): string
	{
		return $this->text;
	}

	/**
	 * @return string
	 */
	public function getLink(): string
	{
		return $this->link;
	}
}
