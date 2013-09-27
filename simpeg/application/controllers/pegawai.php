<?php
/**
 * Kelas Pegawai
 */
class pegawai extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		$this->load->model('pegawai_model');	
		$this->cek_session();
	}

	private function cek_session(){	
		/*
		$kode_role = $this->session->userdata('id_jabatan');
		if($kode_role == NULL) {
			redirect('login');
		}
		else {

		}
		*/
	}

	function displayDaftarPegawai(){
		$data['daftar_pegawai']=$this->pegawai_model->get_all_pegawai();
		$this->load->view("daftar_pegawai",$data);
	}

	function displayTambahPegawai($data=""){
		$this->load->view("form_tambah_pegawai",$data);
	}

	function displayUpdatePegawai($nib=0,$data=""){
		$data['pegawai']=$this->pegawai_model->getPegawaiByNIB($nib);
		$this->load->view("form_update_pegawai",$data);
	}

	function hapusPegawai($nib){
		$this->pegawai_model->hapusPegawai($nib);
		$this->displayDaftarPegawai();
	}

	function tambahPegawai(){
		$this->form_validation->set_rules('nib', 			'NIB', 			'required');
		$this->form_validation->set_rules('nama', 			'Nama', 		'required');
		$this->form_validation->set_rules('no_ktp', 		'No KTP', 		'required');
		$this->form_validation->set_rules('nip', 			'NIP', 			'required');
		$this->form_validation->set_rules('alamat', 		'Alamat', 		'required');
		$this->form_validation->set_rules('tanggal_lahir', 	'Tanggal Lahir','required');

		if ($this->form_validation->run() == FALSE){
			$this->displayTambahPegawai();
		}
		else{

			//config kriteria foto
			$config['upload_path'] 		= './foto/';
			$config['allowed_types'] 	= 'gif|jpg|png';
			//$config['max_size']		= '100';
			//$config['max_width']  	= '1024';
			//$config['max_height']  	= '768';
			$config['overwrite'] = true;
			$config['file_name']		= $this->input->post('nib');

			$this->load->library('upload', $config);

			if (!$this->upload->do_upload())
			{
				$error = array('error' => $this->upload->display_errors());
				$this->displayTambahPegawai($error);
			}
			else
			{
				

				//ubah format tanggal ke yyyy-mm-dd	
		    	$tanggal_lahir = explode('-', $this->input->post('tanggal_lahir'));
				$tanggal_lahir = $tanggal_lahir[2].'-'.$tanggal_lahir[1].'-'.$tanggal_lahir[0];

				$upload_data = $this->upload->data();
		    	$pegawai = array(
		    		'NIB' 				=> $this->input->post('nib'),
					'JenisPegawai' 		=> $this->input->post('jenis_pegawai'),
					'NoKTP'  			=> $this->input->post('no_ktp'),
					'Nama'				=> $this->input->post('nama'),
					'TempatLahir'		=> $this->input->post('tempat_lahir'),
		            'TanggalLahir' 		=> $tanggal_lahir,
					'JenisKelamin'  	=> $this->input->post('jenis_kelamin'),
					'StatusPerkawinan'	=> $this->input->post('status_perkawinan'),
					'NamaPasangan' 		=> $this->input->post('nama_pasangan'),
					'JumlahAnak'  		=> $this->input->post('jumlah_anak'),
					'AlamatRumah'		=> $this->input->post('alamat'),
					'GolonganDarah'  	=> $this->input->post('golongan_darah'),
					'Telepon'			=> $this->input->post('telepon'),
					'Email' 			=> $this->input->post('email'),
					'NoKarpeg'  		=> $this->input->post('no_karpeg'),
					'NoTaspen'  		=> $this->input->post('no_taspen'),
					'NPWP'				=> $this->input->post('npwp'),
					'Foto'  			=> $upload_data['file_name'],
					'Unit'				=> $this->input->post('unit'),
					'NUPTK' 			=> $this->input->post('nuptk'),
					'NIP'  				=> $this->input->post('nip'),
					'KodePos'			=> $this->input->post('kode_pos'),
					'NamaAyah' 			=> $this->input->post('nama_ayah'),
					'NamaIbu'  			=> $this->input->post('nama_ibu')	
				);
			
				$data['success']= 'Selamat data pegawai telah ditambahkan. Kembali ke <strong><a href="'.base_url().'index.php/pegawai/displayDaftarPegawai">Daftar Pegawai</a></strong>';
				$this->pegawai_model->tambahPegawai($pegawai);
				$this->displayTambahPegawai($data);
			
			}
		}
	}

	protected $nib_lama;
	function updatePegawai(){
		$this->form_validation->set_rules('nib', 			'NIB', 			'required|callback_nib_check');
		$this->form_validation->set_rules('nama', 			'Nama', 		'required');
		$this->form_validation->set_rules('no_ktp', 		'No KTP', 		'required');
		$this->form_validation->set_rules('nip', 			'NIP', 			'required');
		$this->form_validation->set_rules('alamat', 		'Alamat', 		'required');
		$this->form_validation->set_rules('tanggal_lahir', 	'Tanggal Lahir','required');

		$this->nib_lama = $this->input->post('nib_lama');

		if ($this->form_validation->run() == FALSE){
			$this->displayUpdatePegawai($this->nib_lama);
		}
		else{
				//ubah format tanggal ke yyyy-mm-dd	
		    	$tanggal_lahir = explode('-', $this->input->post('tanggal_lahir'));
				$tanggal_lahir = $tanggal_lahir[2].'-'.$tanggal_lahir[1].'-'.$tanggal_lahir[0];
				
		    	$pegawai = array(
		    		'NIB' 				=> $this->input->post('nib'),
					'JenisPegawai' 		=> $this->input->post('jenis_pegawai'),
					'NoKTP'  			=> $this->input->post('no_ktp'),
					'Nama'				=> $this->input->post('nama'),
					'TempatLahir'		=> $this->input->post('tempat_lahir'),
		            'TanggalLahir' 		=> $tanggal_lahir,
					'JenisKelamin'  	=> $this->input->post('jenis_kelamin'),
					'StatusPerkawinan'	=> $this->input->post('status_perkawinan'),
					'NamaPasangan' 		=> $this->input->post('nama_pasangan'),
					'JumlahAnak'  		=> $this->input->post('jumlah_anak'),
					'AlamatRumah'		=> $this->input->post('alamat'),
					'GolonganDarah'  	=> $this->input->post('golongan_darah'),
					'Telepon'			=> $this->input->post('telepon'),
					'Email' 			=> $this->input->post('email'),
					'NoKarpeg'  		=> $this->input->post('no_karpeg'),
					'NoTaspen'  		=> $this->input->post('no_taspen'),
					'NPWP'				=> $this->input->post('npwp'),
					'Unit'				=> $this->input->post('unit'),
					'NUPTK' 			=> $this->input->post('nuptk'),
					'NIP'  				=> $this->input->post('nip'),
					'KodePos'			=> $this->input->post('kode_pos'),
					'NamaAyah' 			=> $this->input->post('nama_ayah'),
					'NamaIbu'  			=> $this->input->post('nama_ibu')	
				);
			
				$data['success']= 'Selamat data pegawai telah diperbarui.';
				$this->pegawai_model->updatePegawai($this->nib_lama,$pegawai);
				$this->displayUpdatePegawai($this->input->post('nib'),$data);
		}
	}

	function nib_check($nib){
		$pegawai = $this->pegawai_model->getPegawaiByNIB($nib);
		if ($pegawai && $pegawai->NIB !=$this->nib_lama){
			$this->form_validation->set_message('nib_check', '%s '.$nib.' telah terpakai.');
			return FALSE;
		}
		else{
			return TRUE;
		}
	}

	function ubahFotoPegawai(){
		$this->nib_lama = $this->input->post('nib_lama_foto');

		$config['upload_path'] 	= './foto/';
		$config['allowed_types']= 'gif|jpg|png';
		//$config['max_size']	= '100';
		//$config['max_width']  = '1024';
		//$config['max_height'] = '768';
		$config['overwrite'] = true;
		$config['file_name']	= $this->nib_lama;

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload()){
			$error = array('error' => $this->upload->display_errors());
			$this->displayUpdatePegawai($this->nib_lama,$error);
		}
		else{
			$upload_data = $this->upload->data();
			
			$pegawai = array('Foto'	=> $upload_data['file_name']);
			
			$data['success']= 'Selamat data pegawai telah diperbarui.';
			$this->pegawai_model->updatePegawai($this->nib_lama,$pegawai);
				
			$this->displayUpdatePegawai($this->nib_lama,$data);
		}
	}


}

?>