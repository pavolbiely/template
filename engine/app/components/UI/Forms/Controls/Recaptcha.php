<?php

namespace App\UI\Forms\Controls;

use Nette;

class Recaptcha extends Nette\Forms\Controls\BaseControl
{
	/**
	 * @param string
	 * @param string
	 * @return void
	 */
	public function __construct($caption = 'Recaptcha', $message = 'Recaptcha validation failed.')
	{
		parent::__construct($caption);

		$this->setRequired(true);
		$this->addRule(function (Nette\Forms\IControl $control) {
			if (!isset($_POST['g-recaptcha-response'])) {
				return false;
			}

			$context = $control->getForm()->getPresenter()->getContext();

			$recaptchaUrl = 'https://www.google.com/recaptcha/api/siteverify?' . http_build_query([
					'secret' => $context->parameters['recaptcha']['secret'],
					'response' => $_POST['g-recaptcha-response'],
					'remoteip' => $_SERVER['REMOTE_ADDR'],
				]);

			try {
				$response = Nette\Utils\Json::decode(@file_get_contents($recaptchaUrl));
				return isset($response->success) && $response->success;
			} catch (\Exception $e) {
				return false;
			}
		}, $message);
	}



	/**
	 * @return \Nette\Utils\Html
	 */
	public function getControl()
	{
		$context = $this->getForm()->getPresenter()->getContext();
		return Nette\Utils\Html::el('div')->class('g-recaptcha')->data('sitekey', $context->parameters['recaptcha']['sitekey']);
	}



	/**
	 * @return bool
	 */
	public function isFilled()
	{
		return true;
	}
}
