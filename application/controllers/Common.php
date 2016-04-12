<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: gujiangfei
 * Date: 2016/4/12
 * Time: 10:28
 */
class Common extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Commonmodel');
    }

    public function logout(){
        session_destroy();
        redirect('Login/index');
    }

    public function search(){
        $value = $this->input->post('search');
        $this->Commonmodel->search($value);
    }
}

?>