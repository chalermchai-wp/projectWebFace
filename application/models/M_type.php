<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//include_once("welcome.php");
include_once("Da_type.php");

class M_type extends Da_type {
	
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
	
	function get_all($per_page,$page){
		
		$sql = "SELECT * FROM article 
				LEFT JOIN slug 
				ON sl_art_id = art_id		
				WHERE art_status = 'Y' 
				ORDER BY art_date DESC
				LIMIT $page , $per_page";
		$query = $this->db->query($sql);
				
		return $query;
	}
	
	function get_article(){
		
		$sql = "SELECT * FROM article
				WHERE art_status = 'Y' AND art_id = ?";
		$query = $this->db->query($sql,array($this->art_id));
				
		return $query;
	}
	
	function get_article_admin(){
		
		$sql = "SELECT * FROM article
				WHERE art_status = 'Y'";
		$query = $this->db->query($sql,array($this->art_id));
				
		return $query;
	}
	/*
	function get_all($per_page,$page){
		
		$sql = "SELECT * FROM vip
				LEFT JOIN sex ON sex_id = vip_sex
				LEFT JOIN province ON pv_id = vip_province
				WHERE vip_status = 'Y' 
				ORDER BY vip_time DESC
				LIMIT $page , $per_page";
		$query = $this->db->query($sql);
				
		return $query;
	}
	
	function get_profile(){
		
		$sql = "SELECT * FROM vip
				LEFT JOIN sex ON sex_id = vip_sex
				LEFT JOIN province ON pv_id = vip_province
				WHERE vip_status = 'Y' AND vip_id = ?	";
		$query = $this->db->query($sql, array($this->vip_id));
				
		return $query;
	}		
	
	function get_vip_y(){
		$sql = "SELECT * FROM vip 
				LEFT JOIN sex ON sex_id = vip_sex
				LEFT JOIN province ON pv_id = vip_province
				WHERE vip_status = 'Y' 
				ORDER BY vip_time DESC";
		$query = $this->db->query($sql);
				
		return $query;
	}
	
	function get_vip(){
		$sql = "SELECT * FROM vip 
				LEFT JOIN sex ON sex_id = vip_sex
				LEFT JOIN province ON pv_id = vip_province
				ORDER BY vip_time DESC";
		$query = $this->db->query($sql);
				
		return $query;
	}
	
	function sex_all(){
		
		$sql = "SELECT * FROM sex ";
		
		$query = $this->db->query($sql);
				
		return $query;
	}
	
	function province_all(){
		
		$sql = "SELECT * FROM province ";
		
		$query = $this->db->query($sql);
				
		return $query;
	}		*/

} // end class M_vip
?>




