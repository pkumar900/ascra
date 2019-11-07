<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('login/login');
	}
	
	public function checklogin()
	{
		
		if($this->form_validation->run('login') === FALSE)
		{
			$this->load->view('login/login');
		}
		else
		{
			$result=$this->Login_model->login($this->input->post('username'),$this->input->post('password'));
			if(!empty($result))
			{
				$session = array(
					'status'=>'logged_in',
					'name' =>$result[0]->name,
					'last_name' =>$result[0]->last_name,
					'email'=>$result[0]->email,
					'admin_id'=>$result[0]->id,
				);
				$this->session->set_userdata($session);
				
				redirect('Dashboard','refresh');

			}
			else
			{

				$data['msg']=1;
				$this->load->view('login/login',$data);
			}
		}
		
	}

	public function Logout()
	{
		session_destroy();
		redirect('Login','refresh');
	}
}
