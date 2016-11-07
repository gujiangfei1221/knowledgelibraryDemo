<?php
defined('BASEPATH') OR exit('No direct script access allowed');
session_start();

class Deploy extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        if(!isset($_SESSION['name'])){
            echo '<script>alert("请登录系统!")</script>';
            echo '<script>window.location.href=\''.site_url('Login/index').'\';</script>';
            return;
        }
        if($_SESSION['duiwai'] == 'yes'){
            echo '<script>alert("您没有权限访问该模块!")</script>';
            echo '<script>window.location.href=\''.site_url('Select/index').'\';</script>';
            return;
        }

        $this->load->view('deployview');
    }
}