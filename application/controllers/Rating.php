<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Rating extends CI_Controller{

	public function __construct()
	{
		parent::__construct();
	}
	
    function index()
    {
       $data['judul']='Rating';
	   $data['header']='include/header';
	   $data['menu']='include/menu';
	   $data['content']='content/rating/index';

	   $this->db->select('tb_wisata.nama, tb_user.username, tb_rating.rating, tb_rating.id_rating');
       $this->db->from('tb_rating');
       $this->db->join('tb_user', 'tb_rating.id_user=tb_user.id_user','left');
        $this->db->join('tb_wisata', 'tb_wisata.id_wisata=tb_rating.id_wisata','left');
	   $this->db->order_by('tb_rating.id_rating', 'DESC');
       $data['rating'] = $this->db->get()->result();

	   $this->load->view('include/main', $data);
	}

	function detail($id_rating){
		$data['judul']='Detail Rating';
		$data['header']='include/header';
		$data['menu']='include/menu';
		$data['content']='content/rating/detail';

		$this->db->where('id_rating', $id_rating);
		$data['destinasi'] = $this->db->get('tb_rating')->result();

		$this->load->view('include/main', $data);
	}

	function delete($id_rating){
		$this->db->where('id_rating', $id_rating);
		$this->db->delete('tb_rating');
		redirect('rating');
	}

}