<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Da_student extends CI_Model {		
	
	// PK is pf_id
	
	public $std_id;
	public $std_prefix;
	public $std_fName;
	public $std_lName;
	public $std_code;
	public $std_status;
	public $std_u_id;
	
	
	public $last_insert_id;

	function __construct() {
		parent::__construct();				
	}
	
	function insert() {
		// if there is no auto_increment field, please remove it
		$sql = "INSERT INTO student (std_prefix, std_fName, std_lName, std_code, std_status, std_u_id)
				VALUES(?, ?, ?, ?, ?, ?)";
		
		$this->db->query($sql, array($this->std_prefix, $this->std_fName, $this->std_lName, $this->std_code, $this->std_status, $this->std_u_id));
		$this->last_insert_id = $this->db->insert_id();
		
	}
	
	function update() {
		// if there is no auto_increment field, please remove it
		$sql = "UPDATE article
				SET	art_title = ? ,
					art_img = ?,
					art_body = ?					
				WHERE art_id = ? ";
		$this->db->query($sql, array($this->art_title, $this->art_img, $this->art_body,$this->art_id));
		$this->last_insert_id = $this->db->insert_id();		
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
