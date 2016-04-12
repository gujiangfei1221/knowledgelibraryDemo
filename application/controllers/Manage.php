<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: gujiangfei
 * Date: 16/4/11
 * Time: 20:15
 */

class Manage extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Managemodel');
    }

    public function index(){
        if(!isset($_SESSION['name'])){
            echo '<script>alert("请登录系统!")</script>';
            echo '<script>window.location.href=\''.site_url('Login/index').'\';</script>';
            return;
        }
        $data['lanmu'] = $this->Managemodel->selectlanmu();
        $this->load->view('manageview',$data);
    }

    public function addlanmu(){
        $selectvalue = $this->input->post('lanmus');
        $lanmuname = $this->input->post('lanmuname');
        if($selectvalue == 'root'){
            $level = 1;
            $parentpath = 'root/';
            $namepath = $parentpath.$lanmuname.'/';
            $this->Managemodel->addlanmu($selectvalue,$lanmuname,$level,$parentpath,$namepath);
            redirect('Manage/index');
        }
        else{
            $data = $this->Managemodel->selectall($selectvalue);
//            var_dump($data);
            $level = intval($data[0]['level']);
            $parentpath = $data[0]['namepath'];
            $namepath = $parentpath.$lanmuname.'/';
            $this->Managemodel->addlanmu($selectvalue,$lanmuname,$level+1,$parentpath,$namepath);
            redirect('Manage/index');
        }
//        $data2 = $this->Managemodel->selectall();
//        var_dump($data2);
//        if(!is_dir('mulu/'.$selectvalue.'/'.$lanmuname)){
//            $this->Managemodel->addlanmu($selectvalue,$lanmuname);
//            mkdir('mulu/'.$selectvalue.'/'.$lanmuname,0777);
//            redirect('Manage/index');
//        }
//        else{
//            echo '<script>alert("目录已经存在!")</script>';
//            echo '<script>window.location.href=\''.site_url('Manage/index').'\';</script>';
//        }
    }
}

?>