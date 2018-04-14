<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Da_enroll extends CI_Model {		
	
	// PK is pf_id
	
	public $e_id;
	public $e_std_id;
	public $e_sec_id;
	

	public $last_insert_id;

	function __construct() {
		parent::__construct();				
	}
	
	function insert() {
		// if there is no auto_increment field, please remove it
		$sql = "INSERT INTO enroll (e_std_id, e_sec_id)
				VALUES(?, ?)";
		
		$this->db->query($sql, array($this->e_std_id, $this->e_sec_id));
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
