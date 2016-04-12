<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: gujiangfei
 * Date: 2016/4/12
 * Time: 10:28
 */
class Common extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Commonmodel');
    }

    public function logout(){
        session_destroy();
        redirect('Login/index');
    }

    public function search(){
        $value = $this->input->post('search');
        $this->Commonmodel->search($value);
    }

    public function xiugaimima(){
        $oldpassword = md5($this->input->post('oldpassword'));
        $newpassword = md5($this->input->post('newpassword'));
        $controlname = $this->input->post('controlname');
        $name = $_SESSION['name'];
        $data = $this->Commonmodel->searchuser($oldpassword,$name);
        if($data){
            $this->Commonmodel->xiugaimima($newpassword,$name);
            redirect($controlname.'/index');
        }
        else{
            echo '<script>alert("原密码不正确,请确认!")</script>';
            echo '<script>window.location.href=\''.site_url($controlname.'/index').'\';</script>';
        }
    }
}

?>