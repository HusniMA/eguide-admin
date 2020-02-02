<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class Api extends REST_Controller {

    function __construct($config = 'rest') {
        parent::__construct($config);
        $this->load->database();
    }

    //Menampilkan data 
    function ambil_wisata_get() {
        $sort = $this->get('sort');
        if ($sort == '') {

            $this->db->select('tb_wisata.*');
            $this->db->select_max('tb_rating.rating');
            $this->db->from('tb_wisata');
            $this->db->join('tb_rating', 'tb_wisata.id_wisata=tb_rating.id_wisata','left');
            $this->db->group_by('tb_wisata.id_wisata');
            $this->db->order_by('tb_wisata.id_wisata', 'desc');
            $wisata = $this->db->get()->result();
        } else if ($sort == 'rating'){
            $this->db->select('tb_wisata.*');
            $this->db->select_max('tb_rating.rating');
            $this->db->from('tb_wisata');
            $this->db->join('tb_rating', 'tb_wisata.id_wisata=tb_rating.id_wisata','left');
            $this->db->group_by('tb_wisata.id_wisata');
            $this->db->order_by('tb_rating.rating', 'desc');
            $wisata = $this->db->get()->result();
        }else if ($sort == 'harga'){
            $this->db->select('tb_wisata.*');
            $this->db->select_max('tb_rating.rating');
            $this->db->from('tb_wisata');
            $this->db->join('tb_rating', 'tb_wisata.id_wisata=tb_rating.id_wisata','left');
            $this->db->group_by('tb_wisata.id_wisata');
            $this->db->order_by('tb_wisata.harga_tiket', 'asc');
            $wisata = $this->db->get()->result();
        }
        $this->response($wisata, 200);
    }

    function ambil_penginapan_get(){
        $this->db->where('id_wisata', $this->get('id_wisata'));
        $this->db->order_by('id_penginapan', 'desc');
        $penginapan = $this->db->get('tb_penginapan')->result();
        $this->response($penginapan, 200);
    }

    function tambah_rating_post(){
        $id_wisata = $this->post('id_wisata');
        $id_user = $this->post('id_user');
        $rating = $this->post('rating');

        $data = array(
            'id_wisata' => $id_wisata,
            'id_user' => $id_user,
            'rating' => $rating,
        );

        $this->db->insert('tb_rating', $data);

        $this->response(array('status' => 'sukses', 'data' => $data));
    }

    function tambah_destinasi_post(){
        $saran = $this->post('saran');
        $lokasi = $this->post('lokasi');
        $id_user = $this->post('id_user');
        $lat = $this->post('lat');
        $lng = $this->post('lng');

        $data = array(
            'saran' => $saran,
            'lokasi' => $lokasi,
            'id_user' => $id_user,
            'lat' => $lat,
            'lng' => $lng,
        );

        $this->db->insert('tb_destinasi', $data);

        $this->response(array('status' => 'sukses', 'data' => $data));
    }

    function check_rating_by_user_get(){
        $this->db->select('tb_user.id_user, tb_wisata.id_wisata');
        $this->db->select_max('tb_rating.rating');
        $this->db->from('tb_rating');
        $this->db->join('tb_user', 'tb_rating.id_user=tb_user.id_user','left');
        $this->db->join('tb_wisata', 'tb_wisata.id_wisata=tb_rating.id_wisata','left');
        $this->db->where('tb_rating.id_user', $this->get('id_user'));
        $this->db->where('tb_wisata.id_wisata', $this->get('id_wisata'));
        $this->db->group_by('tb_wisata.id_wisata');
        $rating = $this->db->get()->result();
        $this->response($rating, 200);
    }
    
    function login_post(){
        $username = $this->post('username');
        $password = $this->post('password');

        $this->db->where('username',$username);
        $this->db->where('password', $password);

        $result = $this->db->get('tb_user', 1);

        if($result->num_rows() > 0){
            
            $this->response(array('status' => true,'message' => 'Login Sukses', 'data' => $result->row_array()));

        }else{
            $this->response(array('status' => false,'message' => 'Username atau Password Tidak Benar'));
        }
    }

    function register_post(){
        $nama = $this->post('nama');
        $username = $this->post('username');
        $password = $this->post('password');

        $data = array(
            'nama' => $nama,
            'username' => $username,
            'password' => $password
        );

        $this->db->insert('tb_user', $data);

        $this->response(array('status' => true));
    }

    function wilayah_terdekat_get(){
        $lat = $this->get('lat');
        $lng = $this->get('lng');

        $this->db->select('*, ROUND(111.045 * DEGREES(ACOS(COS(RADIANS('.$lat.')) * COS(RADIANS(lat)) * COS(RADIANS(lng) - RADIANS('.$lng.')) + SIN(RADIANS('.$lat.')) * SIN(RADIANS(lat)))), 2) AS distance_in_km');
        $this->db->select_max('tb_rating.rating');
        $this->db->from('tb_wisata');
        $this->db->join('tb_rating', 'tb_wisata.id_wisata=tb_rating.id_wisata','left');
        $this->db->group_by('tb_wisata.id_wisata');
        $this->db->order_by('distance_in_km', 'asc');
        $wilayah = $this->db->get()->result();
        $this->response($wilayah, 200);
    }

    function cari_wilayah_get(){
        $cari = $this->get('cari');
        $lat = $this->get('lat');
        $lng = $this->get('lng');

        $this->db->select('*, ROUND(111.045 * DEGREES(ACOS(COS(RADIANS('.$lat.')) * COS(RADIANS(lat)) * COS(RADIANS(lng) - RADIANS('.$lng.')) + SIN(RADIANS('.$lat.')) * SIN(RADIANS(lat)))), 2) AS distance_in_km');
        $this->db->select_max('tb_rating.rating');
        $this->db->from('tb_wisata');
        $this->db->join('tb_rating', 'tb_wisata.id_wisata=tb_rating.id_wisata','left');
        $this->db->like('tb_wisata.nama',$cari);
        $this->db->group_by('tb_wisata.id_wisata');
        $this->db->order_by('distance_in_km', 'asc');
        $wilayah = $this->db->get()->result();
        $this->response($wilayah, 200);
    }
}
?>