<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Da_section extends CI_Model {		
	
	// PK is pf_id
	
	public $sec_id;
	public $sec_number;
	public $sec_s_id;
	public $sec_time_start;
	public $sec_time_end;
	public $sec_time_limit;
	public $sec_day_of_week;
	public $sec_first_day;
	

	public $last_insert_id;

	function __construct() {
		parent::__construct();				
	}
	
	function insert() {
		// if there is no auto_increment field, please remove it
		$sql = "INSERT INTO section (sec_number, sec_s_id, sec_time_start, sec_time_end, sec_time_limit, sec_day_of_week, sec_first_day)
				VALUES(?, ?, ?, ?, ?, ?, ?)";
		
		$this->db->query($sql, array($this->sec_number, $this->sec_s_id, $this->sec_time_start, $this->sec_time_end, $this->sec_time_limit, $this->sec_day_of_week, $this->sec_first_day));
		$this->last_insert_id = $this->db->insert_id();
		
	}
	
	function update() {
		// if there is no auto_increment field, please remove it
		$sql = "UPDATE section
				SET	sec_number = ? ,
					sec_time_start = ?,
					sec_time_end = ?,
					sec_time_limit = ?,
					sec_day_of_week = ?					
				WHERE sec_id = ? ";
		$this->db->query($sql, array($this->sec_number, $this->sec_time_start, $this->sec_time_end,$this->sec_time_limit,$this->sec_day_of_week,$this->sec_id));
		$this->last_insert_id = $this->db->insert_id();		

		// echo $this->db->last_query();die;
	}

	function update_2() {
		// if there is no auto_increment field, please remove it
		$sql = "UPDATE section
				SET	sec_number = ? ,
					sec_time_start = ?,
					sec_time_end = ?,
					sec_time_limit = ?,
					sec_day_of_week = ?,
					sec_first_day = ?					
				WHERE sec_id = ? ";
		$this->db->query($sql, array($this->sec_number, $this->sec_time_start, $this->sec_time_end,$this->sec_time_limit,$this->sec_day_of_week,$this->sec_first_day,$this->sec_id));
		$this->last_insert_id = $this->db->insert_id();		
		//echo $this->db->last_query();die;
	}
	
	function delete() {
		$sql = "DELETE FROM section				
				WHERE sec_id = ? ";
				
		$this->db->query($sql, array($this->sec_id));
	}	
	
}	 //=== end class Da_ac_inventory_unit
?>
