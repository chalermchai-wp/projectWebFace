<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//include_once("welcome.php");
include_once("Da_section.php");

class M_section extends Da_section {
	
	/*
	 * aOrderBy = array('fieldname' => 'ASC|DESC', ... )
	*/

	function count_enroll(){
		
		$sql = "SELECT * FROM enroll				
					LEFT JOIN section on section.sec_s_id = enroll.e_sec_id
					LEFT JOIN subject on section.sec_s_id = subject.s_id
					WHERE enroll.e_sec_id = ?";
		$query = $this->db->query($sql, array($this->sec_id));
				
		return $query;
	}		

	function get_first_day(){
		$sql = "SELECT sec_first_day FROM section				
				WHERE sec_id = ?";
		$query = $this->db->query($sql, array($this->sec_id));
				
		return $query;
	}

} // end class M_vip
?>




