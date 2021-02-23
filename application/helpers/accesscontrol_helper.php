<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
function LoggedSystem()
{
	$CI =& get_instance();
 	$log = $CI->session->all_userdata();
 	$logged = $CI->session->userdata('userLogged');
 	
 	if(!$logged){
 		redirect("/login");
 	}
 	else
 		return true;
}