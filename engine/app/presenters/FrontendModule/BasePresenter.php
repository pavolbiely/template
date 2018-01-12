<?php

namespace App\FrontendModule\Presenters;

use Nette\Application\UI\Form;
use Nette\Application\UI\Presenter;
use App\Locale\Translator;

abstract class BasePresenter extends Presenter
{
    public function beforeRender()
    {
        parent::beforeRender();
        $this->getTemplate()->setTranslator(new Translator());
    }
}
