<?php
date_default_timezone_set('Europe/Paris');
require_once 'functions/autoloader.php';
spl_autoload_register('classAutoLoader');
require 'functions/debug.php';

Demo::afficherMessage('Coucou');

Log::logWrite('Bonjour Michel');

$chat = new Mammiferes();

$form = new Form('#', 'frmconf');

$html = $form->beginHtml('Je fais des formulaires en objet');
$html .= $form->displayForm();
$html .= $form->endHtml();

echo $html;