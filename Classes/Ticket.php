<?php
Class Ticket {
	private $_db,
			$_data,
			$_user,
			$_table="tickets";
			//TODO expiration

	public function __construct($ticket = null) {
		$this->_db = DB::getInstance();
		if($ticket) {
			$this->find($ticket);
		}
	}
	// TODO format ticket date
	public function create($data) {
		if(!$this->_db->insert($this->_table, $data)) {
			throw new exception('There was a problem booking this ticket.');
		}
	}

	public function findTicketById($ticket = null) {
		if($ticket) {
			$result = $this->_db->get($this->_table, array("id", "=", $ticket));
			if($result->count()) {
				$this->_data = $result->first();
				return true;
			} else {
				echo "This ticket does not exist.";
				return false;
			}		
		} else {
			return false;
		}
	}

	public function getUserTickets($user = null) {
		if($user) {
			// assuming this method always recieves user id
			// TODO allow method to work with email aswell
			// TODO exempt expired tickets
			$result = $this->_db->get($this->_table, array("user_id", "=", $user));
			if($result->count()) {
				$this->_data = $result->first(); //??
				return true;
			} else {
				echo "You do not have any active tickets.";
				return false;
			}		
		} else {
			return false;
		}
	}

	// TODO delete ticket
	// TODO update ticket

	public function data() {
		return $this->_data;
	}
}