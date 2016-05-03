<?php
defined('BASEPATH') OR exit('No direct script access allowed');
session_start();
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
        $path = $this->Addmodel->getpath($selectvalue);
        $name = $_FILES['userfile']['name'];
        $user = $_SESSION['name'];

        $data0 = $this->Addmodel->getlanmu($selectvalue);
        $lanmu2 = $data0[0]['name'];

        if(!empty($path)){
            $config['upload_path']      = 'mulu/'.$path[0]['namepath'];
        }
        else{
            $config['upload_path']      = 'mulu/root/';
        }

        $config['allowed_types']    = 'gif|jpg|png|doc|docx|rar|zip|pdf';
        $config['file_name'] = md5(time());

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('userfile'))
        {
//            $error = array('error' => $this->upload->display_errors());
            echo '<script>alert("上传失败，请检查路径！")</script>';
            echo '<script>window.location.href=\''.site_url('Add/index').'\';</script>';
        }
        else
        {
            $data = array('upload_data' => $this->upload->data());
            $filepath = $data['upload_data']['full_path'];
            $filename = $data['upload_data']['file_name'];
            $this->Addmodel->insertcontent($title,$lanmu2,$content,$filename,$filepath,$path[0]['namepath'],$name,$user);
            echo '<script>alert("新增成功！")</script>';
            echo '<script>window.location.href=\''.site_url('Add/index').'\';</script>';
        }
    }

    public function progress(){
        $key = ini_get("session.upload_progress.prefix") . 'test';
        if (!empty($_SESSION[$key])) {
            $current = $_SESSION[$key]["bytes_processed"];
            $total = $_SESSION[$key]["content_length"];
            echo $current < $total ? ceil($current / $total * 100) : 100;
        }
        else{
            echo 100;
        }
    }
}

?>