<?php
  session_start();

  $GLOBALS['config'] = array(
    'mysql' => array(
      'host' => '',
      'username' => '',
      'password' => '',
      'dbname' =>   ''
    ),
    'seession' => array (
      'session_name' => '',
      'token_name' => ''
    )
  );

  spl_autoload_register(function($class){
    require_once "Classes/" . $class . ".php";
  });

  DB::getInstance();
  require_once "Functions/escape.php";
