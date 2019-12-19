<?php
Class Event {
	private $_db,
			$_data,
			$_table="events";
	
	public function __construct($event = null) {
		$this->_db = DB::getInstance();
		if($event) {
			$this->find($event);
		}
	}

	public function create($data) {
		if(!$this->_db->insert($this->_table, $data)) {
			throw new exception('There was a problem adding this event.');
		}
	}

	public function find($event = null) {
		if($event) {
			$field = is_numeric($event) ? "id" : "name";
			$result = $this->_db->get($this->_table, array($field, "=", $event));
			if($result->count()) {
				$this->_data = $result->first();
				return true;
			} else {
				echo "This event does not exist.";
				return false;
			}
		} else {
			return false;
		}
	}

	// TODO delete event
	// TODO update event

	public function data() {
		return $this->_data;
	}
}