<?php
	// TODO access control
	// TODO allow only post requests
	// TODO validation
	require_once "Core/init.php";
	/*if(Empty("addevent")) {
		Redirect::to("index.php");
		return;
	}*/
	$name = Input::get("event-name");
	$organizer = Input::get("organizer");
	$location = Input::get("location");
	$startdate = Input::get("start-date");
	$enddate = Input::get("end-date");
	if(Empty($name) || Empty($organizer) || Empty($location) || Empty($startdate) || Empty($enddate)) {
		exit("please fill all the required fields.");
	}
	$event = new Event();
	$event->create(array(
		"name" => $name,
		"organizer" => $organizer,
		"location" => $location,
		"start_date" => $startdate,
		"end_date" => $enddate
	));
	echo "event added successfully!";
	//echo json_encode($event->data());
	return true;
	//Redirect::to("index.php");