<?php 

class Auth extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Auth_model');
	}

	public function index()
	{
		if ($this->session->userdata('email')) {
			redirect('member/clients/list');
		}
		$data = [
			'title' => 'Login',
			'body' => 'login'
		];
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
		if ($this->form_validation->run() == false) {
			$this->load->view('templates/auth_header', $data);
			$this->load->view('auth/login');
			$this->load->view('templates/auth_footer');
		} else {
			$email = $this->input->post('email', true);
			$password = $this->input->post('password', true);
			$user = $this->Auth_model->getUserByEmail($email);
			if ($user) {
				if ($user['is_active'] == 1) {
					if ($password == $user['password']) {
						$data = [
							'id' => $user['user_id'],
							'email' => $user['email']
						];
						$this->session->set_userdata($data);
						redirect('member/clients/list');
						die();exit();
					} else {
						$this->session->set_flashdata('message', '<div class="alert alert-danger text-center" role="alert">Wrong Password!</div>');
					}
				} else {
					$this->session->set_flashdata('message', '<div class="alert alert-danger text-center" role="alert">This email has not been activated!</div>');
				}
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger text-center" role="alert">This email is not registered!</div>');
			}
			redirect('auth/');
		}
	}

	public function registration()
	{
		if ($this->session->userdata('email')) {
			redirect('member/clients/list');
		}
		$data = [
			'title' => 'Registration',
			'body' => 'login'
		];
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
			'is_unique' => 'This email has already registered, please login!'
		]);
		$this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[7]|matches[password2]', [
			'matches' => "password don't match!",
			'min_length' => 'Password too short! at least 7'
		]);
		$this->form_validation->set_rules('password2', 'Confirmation Password', 'trim|required|matches[password1]');
		if ($this->form_validation->run() == false) {
			$this->load->view('templates/auth_header', $data);
			$this->load->view('auth/register');
			$this->load->view('templates/auth_footer');
		} else {
			$this->Auth_model->register();
			if ($this->db->affected_rows() > 0) {
				$this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">We have sent you an email, please check your email to verify your account!</div>');
			}
			redirect('auth/');
		}
	}

	public function verify()
	{
		$email = $this->input->get('email');
		$token = $this->input->get('token');
		$user = $this->Auth_model->getUserByEmail($email);
		$user_token = $this->Auth_model->getToken($token);

		if ($user) {
			if ($user['is_active'] !== 1) {
				if ($user_token) {
					$this->Auth_model->verifyAccount($email);
					$this->Auth_model->deleteToken($email);
					$this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">'. $email .' has been activated! please login!</div>');
				} else {
					$this->session->set_flashdata('message', '<div class="alert alert-danger text-center" role="alert">Account verification failed! Wrong token!</div>');
				}
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-warning text-center" role="alert">Account verification failed! '.$email.' Already activated!</div>');
			}
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Account verification failed! Wrong email!</div>');
		}
		redirect('auth');
	}

	public function forgot()
	{
		if ($this->session->userdata('email')) {
			redirect('member/clients/list');
		}
		$data = [
			'title' => 'Forgot Password',
			'body' => 'login'
		];
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
		if ($this->form_validation->run() == false) {
			$this->load->view('templates/auth_header', $data);
			$this->load->view('auth/forgot');
			$this->load->view('templates/auth_footer');
		} else {
			$email = $this->input->post('email');
			$user = $this->Auth_model->getUserByEmail($email);
			if ($user) {
				$this->Auth_model->setTokenForgotPassword();
				$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">We have sent you an email, please check your email to reset your password!</div>');
				redirect('auth/');
			} else {
				if ($user['is_active'] == 1) {
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">This email is not registered!</div>');
					redirect('auth/forgot');
				} else {
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">This email has not been activated!</div>');
					redirect('auth/registration');
				}
			}
		}
	}

	public function resetPassword()
	{
		if ($this->session->userdata('email')) {
			redirect('member/clients/list');
		}
		$email = $this->input->get('email');
		$token = $this->input->get('token');
		$user = $this->Auth_model->getUserByEmail($email);
		if ($user) {
			$user_token = $this->Auth_model->getToken($token);
			if ($user_token) {
				$this->session->set_userdata('reset_email', $email);
				$this->changePassword();
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Reset password failed! Wrong token!</div>');
				redirect('auth/');
			}
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Reset password failed! Wrong email!</div>');
			redirect('auth/');
		}
	}

	public function changePassword()
	{
		if ($this->session->userdata('email')) {
			redirect('member/clients/list');
		}

		if (!$this->session->userdata('reset_email')) {
			redirect('auth/forgot');
		}

		$data = [
			'title' => 'Reset Password',
			'body' => 'login'
		];
		$this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[7]|matches[password2]', [
			'matches' => "password don't match!",
			'min_length' => 'Password too short! at least 7'
		]);
		$this->form_validation->set_rules('password2', 'Confirmation Password', 'trim|required|matches[password1]');
		if ($this->form_validation->run() == false) {
			$this->load->view('templates/auth_header', $data);
			$this->load->view('auth/reset-password');
			$this->load->view('templates/auth_footer');
		} else {
			$this->Auth_model->changeUserPassword();
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Your password has been updated. please login!</div>');
			redirect('auth/');
		}
	}

	public function logout()
	{
		$this->session->unset_userdata('id');
		$this->session->unset_userdata('email');
		$this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">You have been logged out!</div>');
		redirect('auth/');
	}
}