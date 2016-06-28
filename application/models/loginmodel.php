<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: gujiangfei
 * Date: 16/4/11
 * Time: 20:56
 */

class loginmodel extends CI_Model{
    public function __construct()
    {
        parent::__construct();
    }

    public function dologin($username,$password){
        $query = $this->db->query('select * from user where username = \''.$username.'\' and password = \''.$password.'\'');
        return $query->result_array();
    }

    public function userisexist($username){
        $query = $this->db->query('select * from user where username = \''.$username.'\'' );
        return $query->result_array();
    }
}