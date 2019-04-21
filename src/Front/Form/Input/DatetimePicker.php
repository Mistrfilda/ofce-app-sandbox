<?php

declare(strict_types=1);

namespace App\Front\Form\Input;

use DateTimeImmutable;
use Exception;
use InvalidArgumentException;

use Nette\Forms\Controls\TextInput;

use Nette\Utils\Html;
use function date;

class DatetimePicker extends TextInput
{
	/** @var string */
	private $format = 'Y-m-d H:i:s';

	/**
	 * @param string|null $label
	 * @param int|null $maxLength
	 */
	public function __construct($label = null, ?int $maxLength = null)
	{
		parent::__construct($label, $maxLength);
	}

	/**
	 * @return bool|DateTimeImmutable|mixed
	 * @throws Exception
	 */
	public function getValue()
	{
		if (strlen($this->value) > 0) {
			try {
				return new DateTimeImmutable(date('Y-m-d H:i:s', strtotime($this->value)));
			} catch (InvalidArgumentException $e) {
				$this->addError('Unknown datetime format!');
				return false;
			}
		}

		return $this->value;
	}

	/**
	 * @param mixed $value
	 */
	public function setValue($value)
	{
		if ($value instanceof DateTimeImmutable) {
			$value = $value->format($this->format);
		}

		parent::setValue($value);
	}


	public function getControl(): Html
	{
		$control = parent::getControl();
		$control->class = 'datetimepicker form-control';
		return $control;
	}
}
