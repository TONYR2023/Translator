<?php

require __DIR__ . '/../vendor/autoload.php';

use Anthonybourdeau\Translator\Translator;

$translator = new Translator();
echo $translator->translate("Bonjour");
