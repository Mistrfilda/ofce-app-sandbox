<?php

declare(strict_types=1);

namespace App\Front\UI;

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
}
