<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('uploadImage'))
{
    function uploadImage($name, $path) 
    {
        $CI =& get_instance();

        $config['upload_path'] = $path;
        $config['allowed_types'] = 'jpg|png|jpeg|PNG';
        $config['max_size']  = '2048';
        $config['remove_space'] = TRUE;

        $CI->load->library('upload', $config);
        if($CI->upload->do_upload($name)){ 
            $return = array('result' => 'success', 'file' => $CI->upload->data(), 'error' => '');
            return $return;
        }else{
            $return = array('result' => 'failed', 'file' => '', 'error' => $CI->upload->display_errors());
            return $return;
        }
    }
}
