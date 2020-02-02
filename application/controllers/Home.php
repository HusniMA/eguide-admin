<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Home extends CI_Controller{

	public function __construct()
	{
		parent::__construct();

		$this->load->model('loginmodel');

		
	}
	
    function index()
    {
		if($this->loginmodel->logged_id())
        {
			$data['judul']='Dashboard';
			$data['header']='include/header';
			$data['menu']='include/menu';
			$data['content']='content/dashboard';
			$data['total_wisata'] = $this->db->count_all('tb_wisata');
			$data['total_lokasi'] = $this->db->count_all('tb_lokasi');
			$data['total_penginapan'] = $this->db->count_all('tb_penginapan');
			$data['total_user'] = $this->db->count_all('tb_user');
			$this->load->view('include/main', $data);
            
        } else{
			redirect("login");
		}
       
	}	

}