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
        $data0 = $this->Loginmodel->userisexist($username);
        if($data0){
            $data = $this->Loginmodel->dologin($username,$password);
            if($data){
                if($data[0]['password'] != 'e10adc3949ba59abbe56e057f20f883e'){
                    $_SESSION['name'] = $data[0]['name'];
                    $_SESSION['quanxian'] = $data[0]['quanxian'];
                    $_SESSION['team'] = $data[0]['team'];
                    $_SESSION['duiwai'] = $data[0]['duiwai'];
                    redirect('Select/index');
                }
                else{
                    echo '<script>alert("您的密码是初始密码，请修改后再登录！")</script>';
                    echo '<script>window.location.href=\''.site_url('Changepwd/index').'\';</script>';
                }
            }
            else{
                echo '<script>alert("账号或密码不正确,请确认!")</script>';
                echo '<script>window.location.href=\''.site_url('Login/index').'\';</script>';
            }
        }
        else{
            echo '<script>alert("账号不存在,请确认!")</script>';
            echo '<script>window.location.href=\''.site_url('Login/index').'\';</script>';
        }
    }


}
?>
