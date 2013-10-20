<?php
class user_model extends CI_Model{

	public function __construct(){
        parent::__construct();
    }

	function addUser($user)
	{
		$this->db->insert('user',$user);
		
	}

	function getAllUser()
	{
		$query = $this->db->query("Select * from User order by id");
		return $query;
	}

	function editUser($id, $user){
		$this->db->where('id',$id);
		$this->db->update('user',$user);
	}

	function getUserById($id){
		$this->db->where('id',$id);
		return $this->db->get('user')->row();
	}

	function deleteUser($id){
		$this->db->where('id', $id);
		$this->db->delete('user');
	}
}
?>