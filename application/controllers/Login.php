<?php
defined('BASEPATH') OR exit('No direct script access allowed');
session_start();
/**
 * Created by PhpStorm.
 * User: gujiangfei
 * Date: 16/4/3
 * Time: 17:03
 */

class Login extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Loginmodel');
    }

    public function index(){
        $this->load->view('loginview');
    }

    public function login(){
        $username = $this->input->post('loginid');
        $password = $this->input->post('password');
        $password = md5($password);
        $data = $this->Loginmodel->dologin($username,$password);
        if($data){
//            echo '登录成功';
            $_SESSION['name'] = $data[0]['name'];
            $_SESSION['quanxian'] = $data[0]['quanxian'];
            redirect('Select/index');
        }
        else{
            echo '<script>alert("账号或密码不正确,请确认!")</script>';
            echo '<script>window.location.href=\''.site_url('Login/index').'\';</script>';
        }
    }


}
?>
