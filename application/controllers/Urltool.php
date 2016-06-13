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
            if($_FILES['txt']['name'] != null && $_FILES['txt']['type'] == 'text/plain'){
                $file = $_FILES['txt']['tmp_name'];
                $content = file_get_contents($file);
                $array = explode("\r\n", $content);

                //ok
                if(isset($_POST['urlbianma_utf8'])){
                    foreach($array as $row){
                        $tmp = urlencode(iconv('gb2312','utf-8',$row));
                        array_push($data['output'],$tmp);
                    }
                }
                //ok
                elseif(isset($_POST['urlbianma_gb2312'])){
                    foreach($array as $row){
                        $tmp = urlencode($row);
                        array_push($data['output'],$tmp);
                    }
                }
                //ok
                elseif(isset($_POST['urljiema_utf8'])){
                    foreach($array as $row){
                        $tmp = urldecode(iconv('gb2312','utf-8',$row));
                        array_push($data['output'],$tmp);
                    }
                }
                //ok
                elseif(isset($_POST['urljiema_gb2312'])){
                    foreach($array as $row){
                        $tmp = urldecode($row);
                        $tmp = iconv('gb2312','utf-8',$tmp);
                        array_push($data['output'],$tmp);
                    }
                }
                //ok
                elseif(isset($_POST['md5_32low'])){
                    foreach($array as $row){
                        $tmp = md5($row);
                        array_push($data['output'],$tmp);
                    }
                }
            }
            else{
                echo '<script>alert("请上传附件或者请上传txt格式附件！")</script>';
                echo '<script>window.location.href=\''.site_url('Urltool/index').'\';</script>';
            }
        }


        $this->load->view('urltoolview',$data);
    }

}

?>
