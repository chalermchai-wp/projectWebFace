<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
include_once ("Template.php");

class Login extends Template {

	public function index(){
		if($this->checkUser())
		{
			redirect('User/index','refresh');
		}
		else
		{			
			$this->load->view('login/login');
		}		
	}
	
	public function logout(){
	
		$this->session->sess_destroy();
		
		redirect('Login/index','refresh');
		
	}
	
	public function check_login(){
		
		$this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
        $this->form_validation->set_rules('username', 'username', 'trim|required|xss_clean');
		$this->form_validation->set_rules('password', 'password', 'trim|required|xss_clean');	
		
		if ($this->form_validation->run() == FALSE) {
			
			redirect('Login/index','refresh');
			
		}else{
			
			if($this->session->userdata('user_logged_in') == 1 ){
				redirect('User/index','refresh');
			}else{
								
				$this->load->model('Main_login','M_login');
			
				$user = trim($this->input->post('username'));
				$pass = trim($this->input->post('password'));
						
				//echo $user."  ".$pass;

				$this->M_login->u_username = $user;
				$this->M_login->u_password = hash( 'sha512', hash( 'sha256',sha1(md5($pass))));				
				
				$check = $this->M_login->checkLogin();
				
				if($check -> num_rows() == 1){
					foreach ($check->result() as $val){
						if($val->u_username == $user && $val->u_password == hash( 'sha512', hash( 'sha256',sha1(md5($pass))))){
							$this->session->set_userdata('user_logged_in', 1);
							$this->session->set_userdata('username', $val->u_username);
							$this->session->set_userdata('u_id', $val->u_id);														
							$this->session->set_userdata('type', $val->u_type);

							if($val->u_type == 1){
								$this->load->model('M_teacher','M_t');
								$this->M_t->t_u_id = $val->u_id;
								$name = $this->M_t->get_name_teacher()->row();
								$this->session->set_userdata('u_name', $name->t_fName.' '.$name->t_lName);
								$this->session->set_userdata('t_id', $name->t_id);
							}else{

							}
						

							redirect('User/index','refresh');
							
						}else {
							redirect('Login/index','refresh');
						}
					}
				}else{
					redirect('Login/index','refresh');
				}
			}
		}
	}	

}
?>
