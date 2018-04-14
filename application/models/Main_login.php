<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main_login extends CI_Model {		
	
	// PK is pf_id
	
	public $u_id;
	public $u_username;
	public $u_password;	
	public $u_type;	
	public $u_status;	
	
	public $last_insert_id;

	function __construct() {
		parent::__construct();				
	}
	
	function checkLogin(){
		
		$sql = "SELECT * FROM user 				
				WHERE u_username = ? AND u_password = ?	";
		$query = $this->db->query($sql, array($this->u_username,$this->u_password));
				
		// echo $this->db->last_query();
		// die;
		return $query;
	}
	
}	
?>
