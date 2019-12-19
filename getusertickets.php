<?php
	// TODO access control
	// TODO allow only post requests
	require_once "Core/init.php";
	$ticket = new Ticket();
	$user_id = Input::get("user-id");
	if(Empty($user_id)) {
		echo "Invalid request.";
		return false;
	}
	// TODO check if user exists
	if($ticket->getUserTickets($user_id)) {
		echo json_encode($ticket->data());
		return true;
	} else {
		return false;
	}
	
	