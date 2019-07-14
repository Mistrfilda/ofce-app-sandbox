<?php

declare(strict_types=1);

namespace App\Front\UI;

abstract class SecurePresenter extends BasePresenter
{
	public function startup(): void
	{
		parent::startup();
		if (! $this->user->isLoggedIn()) {
			$this->redirect('Login:default', ['backlink' => $this->storeRequest()]);
		}

		$this->template->loggedUser = $this->currentUserGetter->getUser();
	}
}
