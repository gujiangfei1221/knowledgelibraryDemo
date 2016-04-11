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
    }

    public function index(){
        $this->load->view('selectview');
    }

}

?>
