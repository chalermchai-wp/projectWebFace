<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//include_once("welcome.php");
include_once("Da_user.php");

class M_user extends Da_user {
	
	/*
	 * aOrderBy = array('fieldname' => 'ASC|DESC', ... )
	*/
	
	function count_rows(){
		
		$sql = "SELECT * FROM article	
				LEFT JOIN slug 
				ON sl_art_id = art_id
				WHERE art_status = 'Y' 
				ORDER BY art_date DESC";
		$query = $this->db->query($sql);
				
		return $query;
	}
	
	function check_user(){
		$sql = "SELECT * FROM user	
		WHERE user.u_username = ? ";
		$query = $this->db->query($sql,array($this->u_username));

		return $query;
	}

} // end class M_vip
?>




