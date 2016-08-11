<?php
defined('BASEPATH') OR exit('No direct script access allowed');
session_start();
/**
 * Created by PhpStorm.
 * User: gujiangfei
 * Date: 2016/8/11
 * Time: 10:26
 */

class Security extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Securitymodel');
    }

    public function index($p=1,$lanmu = 'all')
    {
        if (!isset($_SESSION['name'])) {
            echo '<script>alert("���¼ϵͳ!")</script>';
            echo '<script>window.location.href=\'' . site_url('Login/index') . '\';</script>';
            return;
        }
        $lanmu = urldecode($lanmu);
        $count = $this->Securitymodel->getcount($lanmu);
        $count = $count[0]['count(*)'];
        $pagesize = 20;
        $offset = ($p-1)*$pagesize;
        $value = $this->input->post('search');
//        var_dump($value);


        $data = $this->Securitymodel->selectlanmu();
        $data2 = $this->getmulu($data);

        $data3 = $this->handledata($data2);

        $tmp = json_encode($data3, JSON_UNESCAPED_UNICODE);
        $tmp = str_replace('parentname', 'href', $tmp);
        $tmp = str_replace('name', 'text', $tmp);
        $tmp = str_replace('child', 'nodes', $tmp);

        $data3['lanmu'] = $tmp;
        $data3['value'] = $value;
        if($lanmu == 'all'){
            if($value != null && $value != ''){
                $data3['content'] = $this->Securitymodel->search($value);
            }
            else{
                $data3['content'] = $this->Securitymodel->getcontent($lanmu,$offset,$pagesize);
            }
        }
        else{
            if($value != null && $value != ''){
                $data3['content'] = $this->Securitymodel->search($value);
            }
            else{
                $data3['content'] = $this->Securitymodel->getcontent($lanmu,$offset,$pagesize);
//                echo $this->db->last_query();
            }
        }

        $page = array();
        for($i=0;$i<$count;$i++){
            if($i % $pagesize == 0){
                $page[] = $i / $pagesize + 1;
            }
        }
        $data3['page'] = $page;
        $data3['lanmu2'] = $lanmu;
        $data3['p'] = $p;
        $this->load->view('securityview', $data3);
    }

    public function getmulu($data, $parentname = 'root')
    {
        $tree = array();
        foreach ($data as $row) {
            if ($row['parentname'] == $parentname) {
                $tmp = $this->getmulu($data, $row['name']);
                if ($tmp) {
                    $row['child'] = $tmp;
                }
                $tree[] = $row;
            }
        }
        return $tree;
    }

    public function handledata($data)
    {
        $arr = array();
        foreach ($data as $row) {
//            $row['parentname'] = 'Main/index'.'/'.$row['name'];
            $row['parentname'] = site_url('Security/index/1/'.$row['name']);
            if (isset($row['child'])) {
                $row['child'] = $this->handledata($row['child']);
            }
            $arr[] = $row;
        }
        return $arr;
    }

    public function deletecontent($uid){
        $uid = urldecode($uid);
        $data = $this->Mainmodel->getpath($uid);
        unlink($data[0]['filepath']);
        $this->Mainmodel->deletecontent($uid);
        echo '<script>alert("ɾ���ɹ���")</script>';
        echo '<script>window.location.href=\''.site_url('Security/index').'\';</script>';
    }

    public function download($filename){
        $data = $this->Mainmodel->getpath2($filename);
        $filename0 = $data[0]['filepath'];
        $out_filename0 = $data[0]['name'];
        $this->forceDownload($filename0,$out_filename0);
    }

    function forceDownload($filename,$out_filename) {
        $ua = $_SERVER["HTTP_USER_AGENT"];
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
            if (preg_match("/MSIE/", $ua)){
                header('Content-Disposition: attachment; filename=' . urlencode($out_filename));
            }
            else if(preg_match("/Firefox/", $ua)){
                header('Content-Disposition: attachment; filename=' . $out_filename);
            }
            else{
                header('Content-Disposition: attachment; filename=' . urlencode($out_filename));
            }
            header('Content-Type: application/octet-stream; name=' . $out_filename);
            // The source is in filename
            return readfile($filename);;
        }
    }

    public function search($p=1,$lanmu = 'all'){
        $value = $this->input->post('search');
        $lanmu = urldecode($lanmu);
        $count = $this->Mainmodel->getcount($lanmu);
        $count = $count[0]['count(*)'];
        $pagesize = 20;
        $offset = ($p-1)*$pagesize;


        $data = $this->Mainmodel->selectlanmu();
        $data2 = $this->getmulu($data);

        $data3 = $this->handledata($data2);

        $tmp = json_encode($data3, JSON_UNESCAPED_UNICODE);
        $tmp = str_replace('parentname', 'href', $tmp);
        $tmp = str_replace('name', 'text', $tmp);
        $tmp = str_replace('child', 'nodes', $tmp);

        $data3['lanmu'] = $tmp;
        if($lanmu == 'all'){
            $data3['content'] = $this->Mainmodel->search($value);
        }
        else{

            $data3['content'] = $this->Mainmodel->search($value);
        }

        $page = array();
        for($i=0;$i<$count;$i++){
            if($i % $pagesize == 0){
                $page[] = $i / $pagesize + 1;
            }
        }
        $data3['page'] = $page;
        $data3['lanmu2'] = $lanmu;

        $this->load->view('securityview', $data3);
    }
}