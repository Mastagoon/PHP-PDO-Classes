<?php
	require_once "Core/init.php";
/*	if(!Input::get("register")) {
		Redirect::to("index.php");
		return;
	}*/
	$name = Input::get("name");
	$email = Input::geT("email");
	$password = Input::get("password");
	$gender = Input::get("gender");
	$area = Input::get("area");
	$phone_number = Input::get("phone");
	// validation
	if(Empty($email) || Empty($password)) {
		exit("please fill all the required fields");
	}
	if(!filter_var($email, 	FILTER_VALIDATE_EMAIL)) {
		exit("Invalid email format");
	}
	if(strlen($password) < 6) {
		exit("your password must be atleast 6 characters long");
	}
	$user = new User();
	if($user->find($email)){
		exit("this email adress is already used!");
	}
	$user->create(array(
		"name" => $name,
		"email" => $email,
		"password" => Hash::make($password),
		"gender" => $gender,
		"area" => $area,
		"phone_number" => $phone_number
	));
	echo "user registered successfully!";
	Redirect::to("index.php");
