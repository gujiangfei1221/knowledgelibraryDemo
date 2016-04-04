<?php
/**
 * Created by PhpStorm.
 * User: gujiangfei
 * Date: 16/4/3
 * Time: 17:03
 */

class Login extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
    }

    public function index(){
        $this->load->view('loginview');
    }
}
?>
