<?php
defined('BASEPATH') OR exit('No direct script access allowed');
session_start();

class Testinfo extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Testinfomodel');
    }

    public function index()
    {
        if (!isset($_SESSION['name'])) {
            echo '<script>alert("请登录系统!")</script>';
            echo '<script>window.location.href=\'' . site_url('Login/index') . '\';</script>';
            return;
        }
        if($_SESSION['duiwai'] == 'yes'){
            echo '<script>alert("您没有权限访问该模块!")</script>';
            echo '<script>window.location.href=\''.site_url('Select/index').'\';</script>';
            return;
        }
        $data['info'] = $this->Testinfomodel->selecttestinfo();
        $this->load->view('testinfoview',$data);
    }

    public function search(){
        $value = strtolower($this->input->post('search'));
        if($value != ''){
            $data['info'] = $this->Testinfomodel->searchvalue($value);
            $this->load->view('testinfoview',$data);
        }
        else{
            echo '<script>alert("搜索值不能为空！")</script>';
            echo '<script>window.location.href=\''.site_url('Testinfo/index').'\';</script>';
        }

    }
}
?>