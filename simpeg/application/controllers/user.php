<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('user_model');
	}

	function displayTambahUser($data=""){
		$this->load->view("users/new_user",$data);
	}

	function adduser(){
		$this->form_validation->set_rules('username', 'Username', 'required|min_length[5]|max_length[12]|is_unique[user.username]');
		$this->form_validation->set_rules('nama', 'nama', 'required');
		$this->form_validation->set_rules('email', 'email', 'required|valid_email|is_unique[user.email]');
		$this->form_validation->set_rules('password', 'Password', 'required|matches[passconf]');
		$this->form_validation->set_rules('passconf', 'Password Confirmation', 'required');

		if ($this->form_validation->run() == FALSE){
			$this->displayTambahUser();
		}
		else{
			$user = array(
			   		'username'	=> $this->input->post('username'),
			   		'nama'		=> $this->input->post('nama'),
			   		'password'	=> $this->input->post('password'),
			   		'email'		=> $this->input->post('email'),
			   		'id_role'	=> $this->input->post('role'),
			   		'status'	=> $this->input->post('status')
				);
			$this->user_model->addUser($user);
			$data['success']= 'Selamat data user telah ditambahkan. Kembali ke <strong><a href="'.base_url().'index.php/pegawai/displayDaftarPegawai">Daftar Pegawai</a></strong>';
			$this->viewUser();
		}
	}

	function viewUser(){
		$data['users']= $this->user_model->getAllUser();
		$this->load->view("users/daftar_user",$data);
	}

	function displayEditUser($id){
		$data['user']=$this->user_model->getUserById($id);
		$this->load->view('users/edit_user',$data);
	}

	protected $id;
	function editUser(){
		$this->form_validation->set_rules('username', 'username', 'required');
		$this->form_validation->set_rules('nama', 'nama', 'required');
		$this->form_validation->set_rules('email', 'email', 'required|valid_email|is_unique[user.email]');
		$this->form_validation->set_rules('password', 'password', 'required');

		if ($this->form_validation->run() == FALSE){
			$this->displayTambahUser();
		}
		else{		
			$user = array(
			   		'username'	=> $this->input->post('username'),
			   		'nama'		=> $this->input->post('nama'),
			   		'email'		=> $this->input->post('email'),		   		
			   		'password'	=> $this->input->post('password'),
			   		'id_role'	=> $this->input->post('role'),
			   		'status'	=> $this->input->post('status')
			);
			$this->id = $this->input->post('id');

			$this->user_model->editUser($this->id, $user);
			$data['success']= 'Selamat data user berhasil dirubah. Kembali ke <strong><a href="'.base_url().'index.php/pegawai/displayDaftarPegawai">Daftar Pegawai</a></strong>';
			$this->viewUser();
		}
	}

	function deleteUser($id){
		$this->user_model->deleteUser($id);
		$this->viewUser();
	}

}
?>