<?php
use \Bitrix\Main\Application as App;
use \Bitrix\Main\IO\File;

if(File::isFileExists(App::getDocumentRoot() . '/local/php_interface/include/constants.php'))
    require_once(App::getDocumentRoot() . '/local/php_interface/include/constants.php');

if(File::isFileExists(App::getDocumentRoot() . '/local/php_interface/include/functions.php'))
    require_once(App::getDocumentRoot() . '/local/php_interface/include/functions.php');

if(File::isFileExists(App::getDocumentRoot() . '/local/php_interface/include/events.php'))
    require_once(App::getDocumentRoot() . '/local/php_interface/include/events.php');