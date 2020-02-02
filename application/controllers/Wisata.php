<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Wisata extends CI_Controller{

	public function __construct()
	{
		parent::__construct();
	}
	
    function index()
    {
       $data['judul']='Wisata';
	   $data['header']='include/header';
	   $data['menu']='include/menu';
	   $data['content']='content/wisata/index';

       $this->db->select('tb_lokasi.kota, tb_wisata.*');
       $this->db->from('tb_wisata');
       $this->db->join('tb_lokasi', 'tb_lokasi.id_lokasi=tb_wisata.id_lokasi');
	   $this->db->order_by('tb_wisata.id_wisata', 'DESC');
       $data['wisata'] = $this->db->get()->result();

	   $this->load->view('include/main', $data);
	}

	function add(){
		$data['judul']='Tambah Wisata';
		$data['header']='include/header';
		$data['menu']='include/menu';
        $data['content']='content/wisata/add';
        
        $data['lokasi'] = $this->db->get('tb_lokasi')->result();

		$this->load->view('include/main', $data);
	}

	function edit($id_wisata){
		$data['judul']='Edit Wisata';
		$data['header']='include/header';
		$data['menu']='include/menu';
		$data['content']='content/wisata/edit';

		$this->db->where('id_wisata', $id_wisata);
        $data['wisata'] = $this->db->get('tb_wisata')->result();
        
        $data['lokasi'] = $this->db->get('tb_lokasi')->result();

		$this->load->view('include/main', $data);
    }
    
    function upload(){
        sleep(3);
        if($_FILES["files"]["name"] != ''){
            $output = '';
            $config["upload_path"] = './assets/upload/';
            $config["allowed_types"] = 'gif|jpg|png';
            $config['encrypt_name'] = TRUE; 
            
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            for($count = 0; $count<count($_FILES["files"]["name"]); $count++){
                $_FILES["file"]["name"] = $_FILES["files"]["name"][$count];
                $_FILES["file"]["type"] = $_FILES["files"]["type"][$count];
                $_FILES["file"]["tmp_name"] = $_FILES["files"]["tmp_name"][$count];
                $_FILES["file"]["error"] = $_FILES["files"]["error"][$count];
                $_FILES["file"]["size"] = $_FILES["files"]["size"][$count];

                if($this->upload->do_upload('file'))
                {
                    $data = $this->upload->data();
                    $output .= '
                    <div id="img'.($count+1).'" class="col-md-3">
                    <img data-filename="'.$data["file_name"].'" src="'.base_url().'assets/upload/'.$data["file_name"].'" class="img-responsive img-thumbnail" />
                    </div>
                    ';
                }
            }
            echo $output;
        }
    }

	function save(){

		$id_wisata = $this->input->post('id_wisata');
        $id_lokasi = $this->input->post('id_lokasi');
        $foto = $this->input->post('foto');
		$nama = $this->input->post('nama');
        $harga = $this->input->post('harga');
		$deskripsi = $this->input->post('deskripsi');
		$link = $this->input->post('link');
        $alamat = $this->input->post('alamat');
		$lat = $this->input->post('lat');
		$lng = $this->input->post('lng');
		
		if($id_wisata == ""){ //insert
			$data = array(
                'id_lokasi' => $id_lokasi,
                'nama' => $nama,
                'harga_tiket' => $harga,
				'foto' => $foto,
				'deskripsi' => $deskripsi,
				'link' => $link,
				'alamat' => $alamat,
				'lat' => $lat,
				'lng' => $lng
			);

            $this->db->insert('tb_wisata', $data);
            
            echo json_encode($data);
		}else{ //update
			$data = array(
                'id_lokasi' => $id_lokasi,
                'nama' => $nama,
                'harga_tiket' => $harga,
				'foto' => $foto,
				'deskripsi' => $deskripsi,
				'link' => $link,
				'alamat' => $alamat,
				'lat' => $lat,
				'lng' => $lng
			);

			$this->db->where('id_wisata', $id_wisata);
			$this->db->update('tb_wisata', $data);

			echo json_encode($data);
		}
	}

	function delete($id_wisata){
		$this->db->where('id_wisata', $id_wisata);
		$this->db->delete('tb_wisata');
		redirect('wisata');
	}

}