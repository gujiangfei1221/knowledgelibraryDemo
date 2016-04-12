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
    }

    public function index(){
        if(!isset($_SESSION['name'])){
            echo '<script>alert("请先登录系统！")</script>';
            echo '<script>window.location.href=\''.site_url('Login/index').'\';</script>';
            return;
        }
        $this->load->view('addview');
    }
}

?>