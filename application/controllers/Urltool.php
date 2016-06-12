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
        $data['output'] = array();
        if($_FILES != null){
            $file = $_FILES['txt']['tmp_name'];
            $content = file_get_contents($file);
            $array = explode("\r\n", $content);
            foreach($array as $row){
                $tmp = urlencode($row);
                array_push($data['output'],$tmp);
            }
        }

        $this->load->view('urltoolview',$data);
    }

}

?>
