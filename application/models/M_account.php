<?php

class M_account extends CI_Model
{
	public function regist($data)
	{
		$this->db->trans_start();
		$this->db->insert('user', $data);
		$this->db->trans_complete();
	}

	public function login($username, $password)
	{
		$cek = array('username' => $username, 'password' => $password);
		$this->db->select('*');
		$this->db->from('user');
		$this->db->where($cek);
		$query = $this->db->get();

		if ($query->num_rows() == 1) {
			return true;
		} else {
			return false;
		}
	}

	public function getAccount($username)
	{
		$cek = array('username' => $username);
		$this->db->select('*');
		$this->db->from('user');
		$this->db->where($cek);
		$query = $this->db->get();
		return $query->result();
	}


}

