<?php

/**
 * Amazon S3 Upload PHP class
 *
 * @version 0.1
 */

class Send_email {

	function __construct()
	{
		$this->CI =& get_instance();

		$this->CI->config->load('email', TRUE);
		$email_config = $this->CI->config->item('email');

		$this->CI->load->library('email');
		$this->CI->email->set_newline("\r\n");

		$config = array();
		$config['protocol'] = $email_config['protocol'];
		$config['smtp_host'] = $email_config['smtp_host'];
		$config['smtp_user'] = $email_config['smtp_user'];
		$config['smtp_pass'] = $email_config['smtp_pass'];
		$config['smtp_port'] = $email_config['smtp_port'];
		$config['smtp_crypto'] = 'tls';
		$config['charset']    = 'utf-8';
		$config['wordwrap'] = TRUE;
		$config['newline']    = "\r\n";
		$config['mailtype'] = 'html'; 
		$config['validation'] = TRUE;

		$this->CI->email->initialize($config);
	}

	function send($from_email, $to_email, $path_body, $subject, $params)
	{
        $this->CI->email->from($from_email, 'admin kyoob');
        $this->CI->email->to($to_email);
        $this->CI->email->subject($subject);

		$this->CI->email->message($this->CI->load->view($path_body,$params, true));
		
		if($this->CI->email->send()){
			$data['success'] = 'true';
		}else{
			$data['success'] = 'false'; 
		}
		// echo $this->CI->email->print_debugger(); die;
		return $data;
	}
}