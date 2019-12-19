<?php
	require_once "Core/init.php";
	// TODO access control
	// TODO allow only post requests
	// TODO allow booking by email
	$user_id = Input::get("user-id");
	$event_id = Input::get("event-id");
	if(Empty($user_id) || Empty($event_id)){
		echo "Invalid information";
		return false;
	}
	$user = new User();
	if(!$user->find($user_id)) {
		//the error message comes from the user class here
		return false;
	}
	$event = new Event();
	if(!$event->find($event_id)) {
		return false;
	}
	$ticket = new Ticket();
	$ticket->create(array(
		"user_id" => $user_id,
		"event_id" => $event_id
	));
	echo "ticket booked successfully !";
	return true;