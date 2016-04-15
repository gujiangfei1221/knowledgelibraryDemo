<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: gujiangfei
 * Date: 16/4/11
 * Time: 20:15
 */

class Add extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->Model('Addmodel');
    }

    public function index(){
        if(!isset($_SESSION['name'])){
            echo '<script>alert("请登录系统!")</script>';
            echo '<script>window.location.href=\''.site_url('Login/index').'\';</script>';
            return;
        }
        $data['lanmu'] = $this->Addmodel->selectlanmu();
        $this->load->view('addview',$data);
    }

    public function do_upload(){
        $title = $this->input->post('title');
        $selectvalue = $this->input->post('lanmus');
        $content = $this->input->post('content');

        $config['upload_path']      = './uploads/';
        $config['allowed_types']    = 'gif|jpg|png|doc|docx|rar|zip|pdf';
        $config['max_size']     = 102400;
        $config['max_width']        = 0;
        $config['max_height']       = 0;

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('userfile'))
        {
            $error = array('error' => $this->upload->display_errors());

            var_dump($error);
        }
        else
        {
            $data = array('upload_data' => $this->upload->data());

            var_dump($data);
        }
    }
}

?>