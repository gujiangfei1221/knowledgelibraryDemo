<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: gujiangfei
 * Date: 16/4/11
 * Time: 20:14
 */

class Imagemap extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index($filename=null)
    {
        $this->load->view('imagemapview');
    }

    public function do_upload(){
        $config['upload_path']      = '/var/www/html/imagemap/';

        $config['allowed_types']    = 'jpg|jepg|bmp|png';
        $config['file_name'] = md5(time());

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('userfile'))
        {
//            $error = array('error' => $this->upload->display_errors());
            echo '<script>alert("上传失败，请检查路径！")</script>';
            echo '<script>window.location.href=\''.site_url('Imagemap/index').'\';</script>';
        }
        else
        {
            $data = array('upload_data' => $this->upload->data());
            $filepath = $data['upload_data']['full_path'];
            $filename = $data['upload_data']['file_name'];
            echo '<script>alert("新增成功！")</script>';
            echo '<script>window.location.href=\''.site_url('Imagemap/index/'.$filename).'\';</script>';
        }
    }
}