<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Da_term extends CI_Model {		
	
	// PK is pf_id
	
	public $te_id;
	public $te_s_id;
	public $te_term;

	public $last_insert_id;

	function __construct() {
		parent::__construct();				
	}
	
	function insert() {
		// if there is no auto_increment field, please remove it
		$sql = "INSERT INTO term (te_id, te_s_id, te_term)
				VALUES(?, ?, ?)";
		
		$this->db->query($sql, array($this->te_id, $this->te_s_id, $this->te_term));
		$this->last_insert_id = $this->db->insert_id();
		
	}
	
	function update() {
		// if there is no auto_increment field, please remove it
		$sql = "UPDATE term
				SET	te_term = ? 				
				WHERE te_s_id = ? ";
		$this->db->query($sql, array($this->te_term, $this->te_s_id));
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
