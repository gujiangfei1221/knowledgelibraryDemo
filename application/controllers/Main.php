<?php
defined('BASEPATH') OR exit('No direct script access allowed');

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

    public function index($lanmu = 'all')
    {
        if (!isset($_SESSION['name'])) {
            echo '<script>alert("请登录系统!")</script>';
            echo '<script>window.location.href=\'' . site_url('Login/index') . '\';</script>';
            return;
        }
        $data = $this->Mainmodel->selectlanmu();
        $data2 = $this->getmulu($data);

        $data3 = $this->handledata($data2);

        $tmp = json_encode($data3, JSON_UNESCAPED_UNICODE);
        $tmp = str_replace('parentname', 'href', $tmp);
        $tmp = str_replace('name', 'text', $tmp);
        $tmp = str_replace('child', 'nodes', $tmp);
        $data3['lanmu'] = $tmp;
        if($lanmu == 'all'){
            $data3['content'] = $this->Mainmodel->getcontent($lanmu);
        }
        else{
            $lanmu = urldecode($lanmu);
            $data3['content'] = $this->Mainmodel->getcontent($lanmu);
        }
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
            $row['parentname'] = site_url('Main/index/'.$row['name']);
            if (isset($row['child'])) {
                $row['child'] = $this->handledata($row['child']);
            }
            $arr[] = $row;
        }
        return $arr;
    }

}

?>