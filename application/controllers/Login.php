<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Login extends CI_Controller{

	public function __construct()
	{
        parent::__construct();
        $this->load->model('loginmodel');

	}
	
    function index()
    {

        if($this->loginmodel->logged_id())
        {
            redirect("home");
        }else{
            $this->load->view('content/login');
        }   
	   
    }
    
    function login(){
        //get data dari FORM
        $username = $this->input->post("username", TRUE);
        $password = $this->input->post('password', TRUE);

        //checking data via model
        $checking = $this->loginmodel->check_login('tb_admin', array('username' => $username), array('password' => $password));

        //jika ditemukan, maka create session
        if ($checking != FALSE) {
            foreach ($checking as $apps) {

                $session_data = array(
                    'user_id'   => $apps->id,
                    'user_name' => $apps->username,
                    'user_pass' => $apps->password,
                );
                //set session userdata
                $this->session->set_userdata($session_data);

                redirect('home/');

            }
        }else{
            $data['error'] = '<div class="alert alert-danger" style="margin-top: 3px">
                    <div class="header"><b><i class="fa fa-exclamation-circle"></i> ERROR</b> username atau password salah!</div></div>';
        }

        $this->load->view('content/login', $data);
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('login');
    }

}