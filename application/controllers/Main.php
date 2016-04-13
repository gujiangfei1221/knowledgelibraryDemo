<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: gujiangfei
 * Date: 16/4/11
 * Time: 20:15
 */

class Main extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Mainmodel');
    }

    public function index(){
        if(!isset($_SESSION['name'])){
            echo '<script>alert("请登录系统!")</script>';
            echo '<script>window.location.href=\''.site_url('Login/index').'\';</script>';
            return;
        }
        $data = $this->Mainmodel->selectlanmu();
        $data2['lanmu'] = $this->getmulu($data);

        var_dump($data2['lanmu']);
        $this->load->view('mainview',$data2);
    }

    public function getmulu($data,$parentname = 'root'){
        $tree = array();
        foreach($data as $row){
            if($row['parentname']==$parentname){
                $tmp = $this->getmulu($data,$row['name']);
                if($tmp){
                    $row['child']=$tmp;
                }
                $tree[]=$row;
            }
        }
        return $tree;
    }
}

?>