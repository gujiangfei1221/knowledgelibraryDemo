<?php
/**
 * Created by PhpStorm.
 * User: gujiangfei
 * Date: 2016/6/13
 * Time: 19:54
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Testinfomodel extends CI_Model{
    public function __construct()
    {
        parent::__construct();
    }

    public function selecttestinfo(){
        $query = $this->db->query('select * from user ');
        return $query->result_array();
    }

    public function searchvalue($value){
        $query = $this->db->query('select * from user where name like \'%'.$value.'%\' or osinfo like \'%'.$value.'%\' or ieinfo like \'%'.$value.'%\'' );
        return $query->result_array();
    }
}
?>