<?php
defined('BASEPATH') OR exit('No direct script access allowed');
session_start();

class Md5tool extends CI_Controller{
    public function __construct()
    {
        parent::__construct();

    }

    public function index(){
        if(!isset($_SESSION['name'])){
            echo '<script>alert("ÇëµÇÂ¼ÏµÍ³!")</script>';
            echo '<script>window.location.href=\''.site_url('Login/index').'\';</script>';
            return;
        }
        $this->load->view('Md5toolview');
    }

}

?>
