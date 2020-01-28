<?php
date_default_timezone_set('Europe/Paris');
require_once 'functions/autoloader.php';
spl_autoload_register('classAutoLoader');

$chat = new Mammiferes();
var_dump($chat);

$form = new Form('#', 'frmConfig');
echo $form->displayForm();
