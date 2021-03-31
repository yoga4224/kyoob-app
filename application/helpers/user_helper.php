<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('uploadImage'))
{
    function uploadImage($name, $path) 
    {
        $CI =& get_instance();

        $config = array();
        $config['upload_path'] = $path;
        $config['allowed_types'] = 'jpg|png|jpeg|PNG|GIF|gif';
        $config['max_size']  = '2048';
        $config['remove_space'] = TRUE;
        $config['encrypt_name'] = TRUE;
        $config['overwrite']     = FALSE;
        
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

if ( ! function_exists('impServed'))
{
    function impServed($total_imp) 
    {
        if($total_imp < 1000){
            $imp = $total_imp;
        }elseif($total_imp >= 1000 && $total_imp < 1000000){
            $imp = round(($total_imp/1000),1)."<span style='font-size:15px;'>K</span>";
        }elseif($total_imp >= 1000000){
            $imp = round(($total_imp/1000000),1)."<span style='font-size:15px;'>M</span>";
        }

        return $imp;
    }
}