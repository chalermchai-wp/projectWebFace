<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Da_class_schedule extends CI_Model {		
	
	// PK is pf_id
	
	public $cs_id;
	public $cs_sec_id;
	public $cs_week;
	public $cs_date;
	
	public $last_insert_id;

	function __construct() {
		parent::__construct();				
	}
	
	function insert() {
		// if there is no auto_increment field, please remove it
		$sql = "INSERT INTO class_schedule (cs_sec_id, cs_week, cs_date)
				VALUES(?, ?, ?)";
		
		$this->db->query($sql, array($this->cs_sec_id, $this->cs_week, $this->cs_date));
		$this->last_insert_id = $this->db->insert_id();
		
		// echo $this->db->last_query();die;
	}
	
	function update() {
		// if there is no auto_increment field, please remove it
		$sql = "UPDATE class_schedule
				SET	cs_date = ?
				WHERE cs_sec_id = ? AND cs_week = ?";
		$this->db->query($sql, array($this->cs_date, $this->cs_sec_id, $this->cs_week));
		$this->last_insert_id = $this->db->insert_id();		
		// /echo $this->db->last_query();die;
	}

	function update_noimg() {
		// if there is no auto_increment field, please remove it
		$sql = "UPDATE article
				SET	art_title = ? ,
					art_body = ?					
				WHERE art_id = ? ";
		$this->db->query($sql, array($this->art_title, $this->art_body,$this->art_id));
		$this->last_insert_id = $this->db->insert_id();		
	}
	
	function delete() {
		$sql = "UPDATE article
				SET	art_status = 'N'
				WHERE art_id = ? ";
				
		$this->db->query($sql, array($this->art_id));
	}	
	
}	 //=== end class Da_ac_inventory_unit
?>
