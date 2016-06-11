<?php
defined('BASEPATH') OR exit('No direct script access allowed');
session_start();

class Urltool extends CI_Controller{
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

        $lefttextarea = $this->input->post('lefttextarea');
        $data = explode('\r\n',$lefttextarea);
        var_dump($data);

        $this->load->view('urltoolview');
    }

}

?>
