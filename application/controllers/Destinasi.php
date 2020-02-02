<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Destinasi extends CI_Controller{

	public function __construct()
	{
		parent::__construct();
	}
	
    function index()
    {
       $data['judul']='Destinasi';
	   $data['header']='include/header';
	   $data['menu']='include/menu';
	   $data['content']='content/destinasi/index';

	   $this->db->select('tb_user.nama, tb_destinasi.*');
       $this->db->from('tb_destinasi');
       $this->db->join('tb_user', 'tb_user.id_user=tb_destinasi.id_user');
	   $this->db->order_by('tb_destinasi.id_destinasi', 'DESC');
       $data['destinasi'] = $this->db->get()->result();

	   $this->load->view('include/main', $data);
	}

	function detail($id_destinasi){
		$data['judul']='Detail Destinasi';
		$data['header']='include/header';
		$data['menu']='include/menu';
		$data['content']='content/destinasi/detail';

		$this->db->where('id_destinasi', $id_destinasi);
		$data['destinasi'] = $this->db->get('tb_destinasi')->result();

		$this->load->view('include/main', $data);
	}

	function delete($id_destinasi){
		$this->db->where('id_destinasi', $id_destinasi);
		$this->db->delete('tb_destinasi');
		redirect('destinasi');
	}

}