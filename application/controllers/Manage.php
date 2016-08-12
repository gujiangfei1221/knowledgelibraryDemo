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
        if($_SESSION['duiwai'] == 'yes'){
            echo '<script>alert("您没有权限访问该模块!")</script>';
            echo '<script>window.location.href=\''.site_url('Select/index').'\';</script>';
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
        $duiwai = $this->input->post('duiwai2');
        if ($selectvalue == 'root') {
            $level = 1;
            $parentpath = 'root/';
            $namepath = $parentpath . $lanmuname . '/';
            if (!is_dir('mulu/' . $namepath)) {
                $this->Managemodel->addlanmu($selectvalue, $lanmuname, $level, $parentpath, $namepath,$duiwai);
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
                $this->Managemodel->addlanmu($selectvalue, $lanmuname, $level + 1, $parentpath, $namepath,$duiwai);
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
        $duiwai = $this->input->post('duiwai');
        $data = $this->Managemodel->isuserexist($loginid);
        if(!$data){
            $this->Managemodel->adduser($loginid,$loginname,$password,$duiwai);
            echo '<script>alert("用户新增成功!")</script>';
            echo '<script>window.location.href=\'' . site_url('Manage/index') . '\';</script>';
        }
        else{
            echo '<script>alert("用户已存在，请确认!")</script>';
            echo '<script>window.location.href=\'' . site_url('Manage/index') . '\';</script>';
        }

    }

    public function resetpassword($uid){
        $this->Managemodel->resetuserpassword($uid);
        echo '<script>alert("重置密码成功!")</script>';
        echo '<script>window.location.href=\'' . site_url('Manage/index') . '\';</script>';
    }

    public function deletelanmu()
    {
        $lanmu = $this->input->post('lanmu');
        $path = $this->Managemodel->selectall($lanmu[0]);
        $this->deldir('mulu/'.$path[0]['namepath'],$path[0]['namepath']);
        echo $this->db->last_query();
        foreach ($lanmu as $row) {
            $this->Managemodel->deletelanmu($row);
            echo '<script>alert("删除成功!")</script>';
            echo '<script>window.location.href=\'' . site_url('Manage/index') . '\';</script>';
        }
    }

    public function deleteuser()
    {
        $user = $this->input->post('user');
        foreach($user as $row){
            $this->Managemodel->deleteuser($row);
            echo '<script>alert("删除成功!")</script>';
            echo '<script>window.location.href=\'' . site_url('Manage/index') . '\';</script>';
        }
    }

    public function deldir($dir,$namepath) {
        //先删除目录下的文件：
        $dh=opendir($dir);
        while ($file=readdir($dh)) {
            if($file!="." && $file!="..") {
                $fullpath=$dir."/".$file;
                if(!is_dir($fullpath)) {
                    $this->Managemodel->deletecontent($namepath);
                    $this->Managemodel->deletelanmu2($namepath);
                    unlink($fullpath);
                } else {
                    $this->deldir($fullpath,$namepath.$file.'/');
                }
            }
        }

        closedir($dh);
        //删除当前文件夹：
        if(rmdir($dir)) {
            return true;
        } else {
            return false;
        }
    }
}

?>