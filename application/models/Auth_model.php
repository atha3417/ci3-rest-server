<?php 

class Auth_model extends CI_Model {
	public function getAllUser()
	{
		return $this->db->get('user')->result_array();
	}

	public function getUserByEmail($email)
	{
		return $this->db->get_where('user', ['email' => $email])->row_array();
	}

	public function register()
	{
		$email = $this->input->post('email', true);
		$data = [
			'email' => $email,
			'password' => $this->input->post('password1', true),
			'is_active' => 0
		];
		$token = base64_encode(random_bytes(64));
		$user_token = [
			'email' => $email,
			'token' => $token
		];
		$this->db->insert('user', $data);
		$this->db->insert('user_token', $user_token);
		$this->sendEmail($email, $token, 'verify');
	}

	public function getEmail($username)
	{
		return $this->db->get_where('admin_email', ['username' => $username])->row_array();
	}

	public function sendEmail($email, $token, $type)
	{
		$email = $this->getEmail("Atha.3417");
		$config = [
			'protocol'  => $email['protocol'],
			'smtp_host' => $email['smtp_host'],
			'smtp_user' => $email['smtp_user'],
			'smtp_pass'   => $email['smtp_pass'],
			'smtp_port'   => $email['smtp_port'],
			'mailtype'  => $email['mailtype'],
			'charset'   => $email['charset'],
			'newline' => "\r\n"
		];
		$this->load->library('email', $config);
		$this->email->initialize($config); 
		$this->email->from($email['smtp_user'], 'WPU API');
		$this->email->to($email);

		if ($type == 'verify') {
			$this->email->subject('Account Verification');
			$this->email->message('Click this link to verify your account : <a href="'.base_url() . 'auth/verify?email=' .$email .'&token=' . urlencode($token) . '">Verify</a>');
		} else if ($type == 'forgot') {
			$this->email->subject('Reset Password');
			$this->email->message('Click this link to reset your password : <a href="'.base_url() . 'auth/resetpassword?email=' .$email .'&token=' . urlencode($token) . '">Reset Password</a>');
		}

		if ($this->email->send()) {
			return true;
		} else {
			echo $this->email->print_debugger(); die;
		}
	}

	public function verifyAccount($email)
	{
		$this->db->set('is_active', 1);
		$this->db->where('email', $email);
		$this->db->update('user');
	}

	public function getToken($token)
	{
		return $this->db->get_where('user_token', ['token' => $token])->row_array();
	}

	public function deleteToken($email)
	{
		$this->db->where('email', $email);
		$this->db->delete('user_token');
	}

	public function setTokenForgotPassword()
	{
		$email = $this->input->post('email');
		$token = base64_encode(random_bytes(64));
		$user_token = [
			'email' => $email,
			'token' => $token
		];
		$this->db->insert('user_token', $user_token);
		$this->sendEmail($email, $token, 'forgot');
	}

	public function changeUserPassword()
	{
		$email = $this->session->userdata('reset_email');
		$password = $this->input->post('password1', true);
		$this->db->set('password', $password);
		$this->db->where('email', $email);
		$this->db->update('user');
		$this->db->delete('user_token', ['email' => $email]);
		$this->session->unset_userdata('reset_email');
	}
}