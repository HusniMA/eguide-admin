<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Lokasi extends CI_Controller{

	public function __construct()
	{
		parent::__construct();
	}
	
    function index()
    {
       $data['judul']='Lokasi';
	   $data['header']='include/header';
	   $data['menu']='include/menu';
	   $data['content']='content/lokasi/index';

	   $this->db->order_by('id_lokasi', 'DESC');
	   $data['lokasi'] = $this->db->get('tb_lokasi')->result();

	   $this->load->view('include/main', $data);
	}

	function add(){
		$data['judul']='Tambah Lokasi';
		$data['header']='include/header';
		$data['menu']='include/menu';
		$data['content']='content/lokasi/add';

		$this->load->view('include/main', $data);
	}

	function edit($id_lokasi){
		$data['judul']='Edit Lokasi';
		$data['header']='include/header';
		$data['menu']='include/menu';
		$data['content']='content/lokasi/edit';

		$this->db->where('id_lokasi', $id_lokasi);
		$data['lokasi'] = $this->db->get('tb_lokasi')->result();

		$this->load->view('include/main', $data);
	}

	function save(){

		$id_lokasi = $this->input->post('id_lokasi');
		$kota = $this->input->post('kota');
		$kecamatan = $this->input->post('kecamatan');
		$alamat = $this->input->post('alamat');
		$lat = $this->input->post('lat');
		$lng = $this->input->post('lng');
		
		if($id_lokasi == ""){ //insert
			$data = array(
				'kota' => $kota,
				'kecamatan' => $kecamatan,
				'alamat' => $alamat,
				'lat' => $lat,
				'lng' => $lng
			);

			$this->db->insert('tb_lokasi', $data);

			redirect('lokasi');
		}else{ //update
			$data = array(
				'kota' => $kota,
				'kecamatan' => $kecamatan,
				'alamat' => $alamat,
				'lat' => $lat,
				'lng' => $lng
			);

			$this->db->where('id_lokasi', $id_lokasi);
			$this->db->update('tb_lokasi', $data);

			redirect('lokasi');
		}
	}

	function delete($id_lokasi){
		$this->db->where('id_lokasi', $id_lokasi);
		$this->db->delete('tb_lokasi');
		redirect('lokasi');
	}

}