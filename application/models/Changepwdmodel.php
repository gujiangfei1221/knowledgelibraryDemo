<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: gujiangfei
 * Date: 16/4/11
 * Time: 21:52
 */
class Changepwdmodel extends CI_Model{
    public function __construct()
    {
        parent::__construct();
    }

    public function isoldpasswordright($username){
        $query = $this->db->query('select * from user where username =\''.$username.'\'');
        return $query->result_array();
    }

    public function update($username,$newpassword){
        $this->db->query('update user set password = \''.$newpassword.'\''.' where username = \''.$username.'\'');
    }
}

?>