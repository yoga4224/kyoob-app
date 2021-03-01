<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('uploadImage'))
{
    function uploadImage($name, $path) 
    {
        $CI =& get_instance();
        $new_name = time().$_FILES[$name]['name'];

        $config['upload_path'] = $path;
        $config['allowed_types'] = 'jpg|png|jpeg|PNG';
        $config['max_size']  = '2048';
        $config['remove_space'] = TRUE;
        $config['file_name'] = $new_name;

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

if ( ! function_exists('templateForm'))
{
    function templateForm($id) 
    {
        switch ($id) {
            case '1':
                $form = 'Wuling';
              break;
            case '2':
                $form = 'Social Ads';
              break;
            case '3':
                $form = 'Page';
              break;
            default:
                $form = '';
          }

          return $form;
    }
}