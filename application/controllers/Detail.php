<?php
defined('BASEPATH') OR exit('No direct script access allowed');
session_start();
/**
 * Created by PhpStorm.
 * User: gujiangfei
 * Date: 16/5/1
 * Time: 23:46
 */

class Detail extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Detailmodel');
        $this->load->model('Mainmodel');
    }

    public function index($uid){
        if(!isset($_SESSION['name'])){
            echo '<script>alert("请登录系统!")</script>';
            echo '<script>window.location.href=\''.site_url('Login/index').'\';</script>';
            return;
        }
        $data['content'] = $this->Detailmodel->getcontent($uid);
        $this->load->view('detailview',$data);
    }

    public function download($filename){
        $data = $this->Mainmodel->getpath2($filename);
        $filename0 = $data[0]['filepath'];
        $out_filename0 = $data[0]['name'];
        $this->forceDownload($filename0,$out_filename0);
    }

    function forceDownload($filename,$out_filename) {
        if( ! file_exists($filename)){
            return false;
        }
        else {
            // We'll be outputting a file
            header('Accept-Ranges: bytes');
            header('Accept-Length: ' . filesize($filename));
            // It will be called
            header('Content-Transfer-Encoding: binary');
            header('Content-type: application/octet-stream');
            header('Content-Disposition: attachment; filename=' . $out_filename);
            header('Content-Type: application/octet-stream; name=' . $out_filename);
            // The source is in filename
            return readfile($filename);;
        }
    }

}
?>