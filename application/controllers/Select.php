<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: gujiangfei
 * Date: 16/4/11
 * Time: 20:14
 */

class Select extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Selectmodel');
    }

    public function index(){
        $this->load->view('selectview');
    }

    public function search(){
        $value = $this->input->post('search');
        $this->Selectmodel->search($value);
    }

}

?>
