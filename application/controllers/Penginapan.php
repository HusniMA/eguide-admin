<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Penginapan extends CI_Controller{

	public function __construct()
	{
		parent::__construct();
	}
	
    function index()
    {
       $data['judul']='Penginapan';
	   $data['header']='include/header';
	   $data['menu']='include/menu';
	   $data['content']='content/penginapan/index';

	   $this->db->select('tb_wisata.nama as nama_wisata, tb_penginapan.*');
       $this->db->from('tb_penginapan');
       $this->db->join('tb_wisata', 'tb_wisata.id_wisata=tb_penginapan.id_wisata');
	   $this->db->order_by('tb_penginapan.id_penginapan', 'DESC');
       $data['penginapan'] = $this->db->get()->result();

	   $this->load->view('include/main', $data);
	}

	function add(){
		$data['judul']='Tambah Penginapan';
		$data['header']='include/header';
		$data['menu']='include/menu';
		$data['content']='content/penginapan/add';

		$data['wisata'] = $this->db->get('tb_wisata')->result();

		$this->load->view('include/main', $data);
	}

	function edit($id_penginapan){
		$data['judul']='Edit Penginapan';
		$data['header']='include/header';
		$data['menu']='include/menu';
		$data['content']='content/penginapan/edit';

		$this->db->where('id_penginapan', $id_penginapan);
		$data['penginapan'] = $this->db->get('tb_penginapan')->result();

		$data['wisata'] = $this->db->get('tb_wisata')->result();

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

		$id_penginapan = $this->input->post('id_penginapan');
		$id_wisata = $this->input->post('id_wisata');
		$nama = $this->input->post('nama');
		$kontak = $this->input->post('kontak');
		$foto = $this->input->post('foto');
		$tarif = $this->input->post('tarif');
		$deskripsi = $this->input->post('deskripsi');
		$alamat = $this->input->post('alamat');
		$lat = $this->input->post('lat');
		$lng = $this->input->post('lng');
		
		if($id_penginapan == ""){ //insert
			$data = array(
				'id_wisata' => $id_wisata,
				'nama' => $nama,
				'kontak' => $kontak,
				'foto' => $foto,
				'tarif' => $tarif,
				'deskripsi' => $deskripsi,
				'alamat' => $alamat,
				'lat' => $lat,
				'lng' => $lng
			);

			$this->db->insert('tb_penginapan', $data);

			echo json_encode($data);
		}else{ //update
			$data = array(
				'id_wisata' => $id_wisata,
				'nama' => $nama,
				'kontak' => $kontak,
				'foto' => $foto,
				'tarif' => $tarif,
				'deskripsi' => $deskripsi,
				'alamat' => $alamat,
				'lat' => $lat,
				'lng' => $lng
			);

			$this->db->where('id_penginapan', $id_penginapan);
			$this->db->update('tb_penginapan', $data);

			echo json_encode($data);
		}
	}

	function delete($id_penginapan){
		$this->db->where('id_penginapan', $id_penginapan);
		$this->db->delete('tb_penginapan');
		redirect('penginapan');
	}

}