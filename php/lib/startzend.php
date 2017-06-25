<?php
set_include_path(get_include_path() . PATH_SEPARATOR .
realpath(__DIR__ . '/framework/library')
);

require 'Zend/Loader/Autoloader.php';

$autoloader = Zend_Loader_Autoloader::getInstance();