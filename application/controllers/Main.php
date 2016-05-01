<?php
defined('BASEPATH') OR exit('No direct script access allowed');
session_start();
/**
 * Created by PhpStorm.
 * User: gujiangfei
 * Date: 16/4/11
 * Time: 20:15
 */
class Main extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Mainmodel');
    }

    public function index($p=1,$lanmu = 'all')
    {
        if (!isset($_SESSION['name'])) {
            echo '<script>alert("请登录系统!")</script>';
            echo '<script>window.location.href=\'' . site_url('Login/index') . '\';</script>';
            return;
        }
        $lanmu = urldecode($lanmu);
        $count = $this->Mainmodel->getcount($lanmu);
        $count = $count[0]['count(*)'];
        $pagesize = 5;
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
            $data3['content'] = $this->Mainmodel->getcontent($lanmu,$offset,$pagesize);
        }
        else{

            $data3['content'] = $this->Mainmodel->getcontent($lanmu,$offset,$pagesize);
        }

        $page = array();
        for($i=0;$i<$count;$i++){
            if($i % $pagesize == 0){
                $page[] = $i / $pagesize + 1;
            }
        }
        $data3['page'] = $page;
        $data3['lanmu2'] = $lanmu;

        $this->load->view('mainview', $data3);
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
            $row['parentname'] = site_url('Main/index/1/'.$row['name']);
            if (isset($row['child'])) {
                $row['child'] = $this->handledata($row['child']);
            }
            $arr[] = $row;
        }
        return $arr;
    }

    public function deletecontent($title){
        $data = $this->Mainmodel->getpath($title);
        unlink($data[0]['filepath']);
        $this->Mainmodel->deletecontent($title);
        echo '<script>alert("删除成功！")</script>';
        echo '<script>window.location.href=\''.site_url('Main/index').'\';</script>';
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