<?php
defined('BASEPATH') OR exit('No direct script access allowed');
session_start();
/**
 * Created by PhpStorm.
 * User: gujiangfei
 * Date: 16/4/11
 * Time: 20:14
 */

class Loadrunner extends CI_Controller{
    public function __construct()
    {
        parent::__construct();

    }

    public function index(){
        if(!isset($_SESSION['name'])){
            echo '<script>alert("���¼ϵͳ!")</script>';
            echo '<script>window.location.href=\''.site_url('Login/index').'\';</script>';
            return;
        }

        $this->load->view('loadrunnerview');
    }
}

?>