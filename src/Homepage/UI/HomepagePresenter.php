<?php

declare(strict_types=1);

namespace App\Homepage\UI;

use App\Front\Datagrid\DatagridFactory;
use App\Front\Form\Form;
use App\Front\Form\FormFactory;
use App\Front\UI\BasePresenter;
use Nette\Utils\ArrayHash;

class HomepagePresenter extends BasePresenter
{
	private $formFactory;

	private $datagridFactory;

	public function __construct(FormFactory $formFactory, DatagridFactory $datagridFactory)
	{
		parent::__construct();
		$this->formFactory = $formFactory;
		$this->datagridFactory = $datagridFactory;
	}

	public function createComponentForm(): Form
	{
		$form = $this->formFactory->createForm();

		$form->addText('testik', 'Testicek')
			->setRequired();

		$form->addSelect('selectTest', 'SelectTest', [null => 'Vyberte', 1 => 'fdsaas', 2 => 'fdsafds', 3 => 'reqwreqw', 4 => 'fadsfads'])->setRequired()->setPrompt('dasdsa');

		$form->addMultiSelect('multiSelectTest', 'multiSelectTest', [1 => 'fdsaas', 2 => 'fdsafds', 3 => 'reqwreqw', 4 => 'fadsfads'])->setRequired();

		$form->addCheckbox('checkbox', 'checkboxSelectTest')->setRequired()->setDefaultValue(true);

		$form->addRadioList('radioTest', 'radio test', [
			1 => 'dasdsa',
			'43243223',
		])->setRequired()->setDefaultValue(1);

		$form->addUpload('uploadTest', 'upload test')
			->setRequired();

		$form->addDatetimePicker('testicek', 'testcek');

		$form->addSubmit('submit', 'Ulozit');

		$form->onSuccess[] = function (Form $form, ArrayHash $values): void {
			dump($form);
			dump($values);
			die();
		};

		return $form;
	}
}
