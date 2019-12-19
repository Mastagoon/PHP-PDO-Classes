<?php
/*
The Init.php file holds all the global variables needed in this project(the database connection only so far)
It also gets an instance of the database which means you are always connected when you require Core/init.php
It also automatically loads the classes using spl_autoload function
*/
  $GLOBALS['config'] = array(	//global variable config equals this array
    'mysql' => array(
      'host' => '127.0.0.1',
      'username' => 'root',
      'password' => '',
      'dbname' =>   'rawaz'
	)
  );

  spl_autoload_register(function($class){	//this function automatically loads the given class ONLY when it's called, when you use Input::get() this function requires it immediately.
    require_once "Classes/" . $class . ".php";
  });

  DB::getInstance();
  require_once "Functions/escape.php";	
