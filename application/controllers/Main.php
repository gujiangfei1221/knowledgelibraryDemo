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

    public function index()
    {
        if (!isset($_SESSION['name'])) {
            echo '<script>alert("请登录系统!")</script>';
            echo '<script>window.location.href=\'' . site_url('Login/index') . '\';</script>';
            return;
        }
        $data = $this->Mainmodel->selectlanmu();
        $data2 = $this->getmulu($data);

        var_dump($this->handledata($data2));

        $tmp = json_encode($data2, JSON_UNESCAPED_UNICODE);
        $tmp = str_replace('parentname', 'href', $tmp);
        $tmp = str_replace('name', 'text', $tmp);
        $tmp = str_replace('child', 'nodes', $tmp);
        $data3['lanmu'] = $tmp;
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
            $row['parentname'] = $row['name'];
            if (isset($row['child'])) {
                $tmp = $this->handledata($row['child']);
                $arr[] = $tmp;
//                var_dump($tmp);
            }
            $arr[] = $row;
        }
        return $arr;
    }
}

?>