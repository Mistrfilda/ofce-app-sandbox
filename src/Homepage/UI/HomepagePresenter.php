<?php

declare(strict_types=1);

namespace App\Homepage\UI;

use App\Front\Navigation\Breadcrumb;
use App\Front\UI\SecurePresenter;

class HomepagePresenter extends SecurePresenter
{
	public function beforeRender(): void
	{
		parent::beforeRender();
		$this->pageNavigation->addBreadcrumb(new Breadcrumb('Dashboard', 'Homepage:default'));
	}

	public function renderDefault(): void
	{
		$this->pageNavigation->setTitle('Dashboard');
	}
}
