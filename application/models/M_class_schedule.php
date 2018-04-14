<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//include_once("welcome.php");
include_once("Da_class_schedule.php");

class M_class_schedule extends Da_class_schedule {
	
	/*
	 * aOrderBy = array('fieldname' => 'ASC|DESC', ... )
	*/

	function get_num_rows_by_sec_id(){
		
		$sql = "SELECT * FROM class_schedule
				WHERE cs_sec_id = ?";
		$query = $this->db->query($sql,array($this->cs_sec_id));
				
		return $query;
	}
	

} // end class M_vip
?>




