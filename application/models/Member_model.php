<?php 

class Member_model extends CI_Model {

	public function getAllClients()
	{
		$this->db->select('clients.id, user.email as user_email, clients.project_name, keys.key as user_key');
		$this->db->from('clients');
		$this->db->join('keys', 'clients.key = keys.id');
		$this->db->join('user', 'clients.user_id = user.user_id');
		$this->db->where('clients.user_id', $this->session->userdata('id'));
		return $this->db->get()->result_array();
	}

	public function getClientById($id)
	{
		$this->db->select('clients.id, user.email as user_email, clients.project_name, keys.key as user_key');
		$this->db->from('clients');
		$this->db->join('keys', 'clients.key = keys.id');
		$this->db->join('user', 'clients.user_id = user.user_id');
		$this->db->where('clients.id', $id);
		return $this->db->get()->row_array();
	}

	public function insertNewData()
	{
		$random_key = randomAccessKey();
		$access_key = [
			'user_id' => $this->session->userdata('id'),
			'key' => $random_key,
			'level' => 1
		];
		$this->db->insert('keys', $access_key);
		$clients = [
			'user_id' => $this->session->userdata('id'),
			'project_name' => $this->input->post('project_name', true),
			'key' => $this->db->insert_id()
		];
		$this->db->insert('clients', $clients);
		return $this->db->affected_rows();
	}

	public function deleteData($id, $access_key)
	{
		$this->db->delete('clients', ['id' => $id]);
		$this->db->delete('keys', ['key' => $access_key]);
		$this->db->delete('limits', ['api_key' => $access_key]);
	}
}