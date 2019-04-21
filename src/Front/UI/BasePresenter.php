<?php

declare(strict_types=1);

namespace App\Front\UI;

use App\Front\Menu\MenuBuilder;
use Nette\Application\UI\InvalidLinkException;
use Nette\Application\UI\Presenter;

class BasePresenter extends Presenter
{
	/**
	 * @return string[]
	 */
	public function formatLayoutTemplateFiles(): array
	{
		return array_merge([__DIR__ . '/templates/@layout.latte'], parent::formatLayoutTemplateFiles());
	}

	public function startup(): void
	{
		parent::startup();
		$this->template->menu = (new MenuBuilder())->buildMenu();
	}

	/**
	 * @param string[] $links
	 * @return bool
	 * @throws InvalidLinkException
	 */
	public function isMenuLinkActive(array $links): bool
	{
		foreach ($links as $link) {
			if ($this->isLinkCurrent($link)) {
				return true;
			}
		}

		return false;
	}
}
