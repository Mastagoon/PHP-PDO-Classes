<?php
	require_once "Core/init.php";
	$event_id = Input::get("event-id");
	if(Empty($event_id)) {
		echo "invalid request";
		return false;
	}
	$event = new Event();
	if($event->find($event_id)) {
		echo json_encode($event->data());
		return true;	
	} else {
		//the error message comes from the user class here
		return false;
	}
