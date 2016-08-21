<?php
defined('BASEPATH') OR exit('No direct script access allowed');
session_start();
/**
 * Created by PhpStorm.
 * User: gujiangfei
 * Date: 16/4/11
 * Time: 20:14
 */

class Moniter extends CI_Controller{
    public function __construct()
    {
        parent::__construct();

    }

    public function index(){
        $data = $this->uri->segment(2);
        var_dump($data);
        $this->load->view('moniterview');
    }
}

?>
