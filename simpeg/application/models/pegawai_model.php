<?php
class pegawai_model extends CI_Model {

	public function __construct(){
        parent::__construct();
    }

    function tambahPegawai($pegawai){
		$this->db->insert('pegawai', $pegawai);
	}

	function get_all_pegawai(){
		$query = $this->db->query("SELECT * FROM pegawai order by NIB");
		return $query; 
	}

	function getPegawaiByNIB($nib){
		$this->db->where('nib', $nib);		
		return $this->db->get('pegawai')->row();		
	}

	function hapusPegawai($nib){
		$this->db->where('nib', $nib);
		$this->db->delete('pegawai'); 
	}

	function updatePegawai($nib_lama,$pegawai){
			$this->db->where('NIB', $nib_lama);
			$this->db->update('pegawai', $pegawai); 	
	}

}

?>