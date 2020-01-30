<?php
date_default_timezone_set('Europe/Paris');
require_once 'functions/autoloader.php';
spl_autoload_register('classAutoLoader');
require 'functions/debug.php';


$chat = new Mammiferes();
var_dump($chat);

$form = new Form('#', 'frmconf');
echo $form->displayForm();
