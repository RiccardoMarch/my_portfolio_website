<?php

session_start();

$GLOBALS['config'] = array(
  'mysql' => array(
    'host' => '[HOST_NAME_HERE]',
    'username' => '[USERNAME_HERE]',
    'password' => '[PASSWORD_HERE]',
    'db' => "[DB_NAME_HERE]"
  )
);

spl_autoload_register(function($class) {
  require_once 'php/db/'. $class . '.php';
});
