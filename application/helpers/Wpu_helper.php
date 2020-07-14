<?php 

function is_logged_in()
{
    $ci = get_instance();
    if (!$ci->session->userdata('email')) {
        redirect('auth/');
    }
}

function randomAccessKey() {
	return base64_encode(uniqid(password_hash(hash('sha256', base64_encode(base64_encode(microtime()))), PASSWORD_DEFAULT)));
}