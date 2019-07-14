<?php

declare(strict_types=1);

namespace App\Front\Navigation;

class PageNavigation
{
	/** @var string|null */
	private $title;

	/** @var Breadcrumb[] */
	private $breadcrumbs;

	public function __construct(?string $title = null)
	{
		$this->title = $title;
		$this->breadcrumbs = [];
	}

	public function setTitle(string $title): void
	{
		$this->title = $title;
	}

	public function addBreadcrumb(Breadcrumb $breadcrumb): void
	{
		$this->breadcrumbs[] = $breadcrumb;
	}

	/**
	 * @return string|null
	 */
	public function getTitle(): ?string
	{
		return $this->title;
	}

	/**
	 * @return Breadcrumb[]
	 */
	public function getBreadcrumbs(): array
	{
		return $this->breadcrumbs;
	}
}
