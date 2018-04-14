<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Da_subject extends CI_Model {		
	
	// PK is pf_id
	
	public $s_id;
	public $s_code;
	public $s_name_th;
	public $s_name_en;
	public $s_credit;
	public $s_year;
	public $s_groups;
	public $t_id;
	public $sec_id;

	public $last_insert_id;

	function __construct() {
		parent::__construct();				
	}
	
	function insert() {
		// if there is no auto_increment field, please remove it
		$sql = "INSERT INTO subject (s_code, s_name_th, s_name_en, s_credit, s_year, s_groups)
				VALUES(?, ?, ?, ?, ?, ?)";
		
		$this->db->query($sql, array($this->s_code, $this->s_name_th, $this->s_name_en, $this->s_credit, $this->s_year, $this->s_groups));
		$this->last_insert_id = $this->db->insert_id();
		
	}

	function insert_file() {
		// if there is no auto_increment field, please remove it
		$sql = "INSERT INTO subject (s_code, s_name_th, s_name_en, s_credit, s_year)
				VALUES(?, ?, ?, ?, ?)";
		
		$this->db->query($sql, array($this->s_code, $this->s_name_th, $this->s_name_en, $this->s_credit, $this->s_year));
		$this->last_insert_id = $this->db->insert_id();
		
	}
	
	function update() {
		// if there is no auto_increment field, please remove it
		$sql = "UPDATE subject
				SET	s_code = ? ,
					s_name_th = ?,
					s_name_en = ?,
					s_credit = ?,
					s_year = ?
				WHERE s_id = ? ";
		$this->db->query($sql, array($this->s_code, $this->s_name_th, $this->s_name_en,$this->s_credit,$this->s_year,$this->s_id));
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
