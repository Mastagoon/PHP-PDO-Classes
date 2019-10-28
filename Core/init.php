<?php
  session_start();

  $GLOBALS['config'] = array(
    'mysql' => array(
      'host' => '127.0.0.1',
      'username' => 'root',
      'password' => '',
      'dbname' =>   'oophp'
    ),
    'seession' => array (
      'session_name' => 'user',
      'token_name' => 'token'
    )
  );

  spl_autoload_register(function($class){
    require_once "Classes/" . $class . ".php";
  });

  DB::getInstance();
  require_once "Functions/escape.php";
