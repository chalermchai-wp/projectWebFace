<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//include_once("welcome.php");
include_once("Da_enroll.php");

class M_enroll extends Da_enroll {
	
	/*
	 * aOrderBy = array('fieldname' => 'ASC|DESC', ... )
	*/
	
	function get_list_std_from_sec_id(){
		
		$sql = "SELECT * FROM enroll
				LEFT JOIN student ON student.std_id = enroll.e_std_id
				WHERE enroll.e_sec_id = ?";
		$query = $this->db->query($sql,array($this->e_sec_id));
				
		return $query;
	}
	

} // end class M_vip
?>




