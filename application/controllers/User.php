<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class User extends CI_Controller{

	public function __construct()
	{
		parent::__construct();
	}
	
    function index()
    {
       $data['judul']='User';
	   $data['header']='include/header';
	   $data['menu']='include/menu';
	   $data['content']='content/user/index';

	   $this->db->order_by('id_user', 'DESC');
	   $data['user'] = $this->db->get('tb_user')->result();

	   $this->load->view('include/main', $data);
	}

	function add(){
		$data['judul']='Tambah User';
		$data['header']='include/header';
		$data['menu']='include/menu';
		$data['content']='content/user/add';

		$this->load->view('include/main', $data);
	}

	function edit($id_user){
		$data['judul']='Edit User';
		$data['header']='include/header';
		$data['menu']='include/menu';
		$data['content']='content/user/edit';

		$this->db->where('id_user', $id_user);
		$data['user'] = $this->db->get('tb_user')->result();

		$this->load->view('include/main', $data);
	}

	function save(){

		$id_user = $this->input->post('id_user');
		$nama = $this->input->post('nama');
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		
		if($id_user == ""){ //insert
			$data = array(
				'nama' => $nama,
				'username' => $username,
				'password' => $password
			);

			$this->db->insert('tb_user', $data);

			redirect('user');
		}else{ //update
			$data = array(
				'nama' => $nama,
				'username' => $username,
				'password' => $password
			);

			$this->db->where('id_user', $id_user);
			$this->db->update('tb_user', $data);

			redirect('user');
		}
	}

	function delete($id_user){
		$this->db->where('id_user', $id_user);
		$this->db->delete('tb_user');
		redirect('user');
	}

}