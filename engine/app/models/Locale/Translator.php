<?php

namespace App\Locale;

use Nette;

class Translator implements Nette\Localization\ITranslator
{
    /**
     * Translates the given string.
     * @param  string   message
     * @param  int      plural count
     * @return string
     */
    public function translate($message, $count = NULL)
    {
        return $message;
    }
}
