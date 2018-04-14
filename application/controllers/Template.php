<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Template extends CI_Controller {
	
	function header()
	{					
		if($this->checkUser())
		{
			$this->load->view('template/user/header');
		}
		else
		{
			redirect('Login/index','refresh');
		}				
	}
	
	function javascript()
	{
		if($this->checkUser())
		{
			$this->load->view('template/user/javascript');
		}
		else
		{
			redirect('Login/index','refresh');
		}				
	}
	
	function topbar()
	{	
		if($this->checkUser())
		{
			$this->load->view('template/user/topbar');
		}
		else
		{
			redirect('Login/index','refresh');
		}		
	}
	
	function sidebar()
	{	
		if($this->checkUser())
		{
			$username = $this->session->userdata('username');
			$data['username'] = $username;
			$this->load->view('template/user/sidebar',$data);
		}
		else
		{
			redirect('Login/index','refresh');
		}		
	}
	// footer() => This Function is show normal footer 
	function footer()
	{
		if($this->checkUser())
		{
			$this->load->view('template/user/footer');
		}
		else
		{
			redirect('Login/index','refresh');
		}		
	}
	
	// checkUser() => This Function is check session of This user login or not? return true and false
	function checkUser()
	{
		if($this->session->userdata('user_logged_in'))
			return true;
		else
			return false;
	}
	
	public function output($body='',$data='')
	{		
		if($this->checkUser())
		{
			$this->header();			
			$this->topbar();
			$this->sidebar();			
			$this->load->view($body,$data);
			$this->footer();
			$this->javascript();
		}
		else
		{
			redirect('Login/index','refresh');
		}
	}	

}
?>
