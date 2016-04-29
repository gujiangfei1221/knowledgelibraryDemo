<?php
defined('BASEPATH') OR exit('No direct script access allowed');
session_start();
/**
 * Created by PhpStorm.
 * User: gujiangfei
 * Date: 16/4/11
 * Time: 20:15
 */
class Manage extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Managemodel');
    }

    public function index()
    {
        if (!isset($_SESSION['name'])) {
            echo '<script>alert("请登录系统!")</script>';
            echo '<script>window.location.href=\'' . site_url('Login/index') . '\';</script>';
            return;
        }
        $data['lanmu'] = $this->Managemodel->selectlanmu();
        $data['content'] = $this->Managemodel->selectcontent();
        $data['user'] = $this->Managemodel->selectuser();

//        var_dump($this->input->post('lanmu'),$this->input->post('content'),$this->input->post('user'));
        
        $this->load->view('manageview', $data);
    }

    public function addlanmu()
    {
        $selectvalue = $this->input->post('lanmus');
        $lanmuname = $this->input->post('lanmuname');
        if ($selectvalue == 'root') {
            $level = 1;
            $parentpath = 'root/';
            $namepath = $parentpath . $lanmuname . '/';
            if (!is_dir('mulu/' . $namepath)) {
                $this->Managemodel->addlanmu($selectvalue, $lanmuname, $level, $parentpath, $namepath);
                mkdir('mulu/' . $namepath, 0777);
                redirect('Manage/index');
            } else {
                echo '<script>alert("目录已经存在!")</script>';
                echo '<script>window.location.href=\'' . site_url('Manage/index') . '\';</script>';
            }
        } else {
            $data = $this->Managemodel->selectall($selectvalue);
            $level = intval($data[0]['level']);
            $parentpath = $data[0]['namepath'];
            $namepath = $parentpath . $lanmuname . '/';
            if (!is_dir('mulu/' . $namepath)) {
                $this->Managemodel->addlanmu($selectvalue, $lanmuname, $level + 1, $parentpath, $namepath);
                mkdir('mulu/' . $namepath, 0777);
                redirect('Manage/index');
            } else {
                echo '<script>alert("目录已经存在!")</script>';
                echo '<script>window.location.href=\'' . site_url('Manage/index') . '\';</script>';
            }
        }
    }

    public function adduser(){
        $loginid = $this->input->post('loginid');
        $loginname = $this->input->post('loginname');
        $password = $this->input->post('password');
        $password = md5($password);
        $this->Managemodel->adduser($loginid,$loginname,$password);
        echo '<script>alert("用户新增成功!")</script>';
        echo '<script>window.location.href=\'' . site_url('Manage/index') . '\';</script>';
    }

    public function resetpassword($uid){
        $this->Managemodel->resetuserpassword($uid);
        echo '<script>alert("重置密码成功!")</script>';
        echo '<script>window.location.href=\'' . site_url('Manage/index') . '\';</script>';
    }

    public function deletelanmu()
    {
        $lanmu = $this->input->post('lanmu');
        foreach ($lanmu as $row) {
            var_dump($row);
            $this->Managemodel->deletelanmu($row);
        echo '<script>alert("删除成功!")</script>';
        echo '<script>window.location.href=\'' . site_url('Manage/index') . '\';</script>';
        }
    }

    public function deleteuser()
    {
        $user = $this->input->post('user');
        foreach($user as $row){
            var_dump($row);
            $this->Managemodel->deleteuser($row);
            echo '<script>alert("删除成功!")</script>';
            echo '<script>window.location.href=\'' . site_url('Manage/index') . '\';</script>';
        }
    }
}

?>