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
            echo '<script>alert("请登录系统!")</script>';
            echo '<script>window.location.href=\''.site_url('Login/index').'\';</script>';
            return;
        }
        $data['output'] = array();
        if($_FILES != null){
            $file = $_FILES['txt']['tmp_name'];
            $content = file_get_contents($file);
            $array = explode("\r\n", $content);

            if(isset($_POST['urlbianma'])){
                foreach($array as $row){
                    $tmp = urlencode(iconv('gb2312','utf-8',$row));
                    array_push($data['output'],$tmp);
                }
            }
            elseif(isset($_POST['urljiema'])){
                foreach($array as $row){
                    $tmp = urldecode('%B2%E2%CA%D4');
                    array_push($data['output'],$tmp);
                }
            }
            else{
                foreach($array as $row){
                    $tmp = md5($row);
                    array_push($data['output'],$tmp);
                }
            }
        }

        $this->load->view('urltoolview',$data);
    }

}

?>
