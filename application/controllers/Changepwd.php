<?php
defined('BASEPATH') OR exit('No direct script access allowed');
session_start();
/**
 * Created by PhpStorm.
 * User: gujiangfei
 * Date: 16/4/11
 * Time: 20:14
 */

class Changepwd extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Changepwdmodel');
    }

    public function index(){

        $this->load->view('changepwdview');
    }

    public function  update(){
        $username = $this->input->post('loginid');
        $oldpassword = md5($this->input->post('oldpassword'));
        $newpassword = md5($this->input->post('newpassword'));
        $newpassword2 = md5($this->input->post('newpassword2'));

        $data = $this->Changepwdmodel->isoldpasswordright($username);

        if($newpassword != $newpassword2){
            echo '<script>alert("新密码两次不一致，请确认！")</script>';
            echo '<script>window.location.href=\''.site_url('Changepwd/index').'\';</script>';
        }

        if($data[0]['password'] != $oldpassword){
            echo '<script>alert("原密码不正确，请确认！")</script>';
            echo '<script>window.location.href=\''.site_url('Changepwd/index').'\';</script>';
        }

        if(($oldpassword == $newpassword) || ($oldpassword == $newpassword)){
            echo '<script>alert("新老密码一致，请确认！")</script>';
            echo '<script>window.location.href=\''.site_url('Changepwd/index').'\';</script>';
        }

        $this->Changepwdmodel->update($username,$newpassword);
        echo '<script>alert("修改成功！")</script>';
        echo '<script>window.location.href=\''.site_url('Login/index').'\';</script>';

    }
}

?>