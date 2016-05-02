<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: gujiangfei
 * Date: 2016/4/12
 * Time: 10:31
 */
class Commonmodel extends CI_Model{
    public function __construct()
    {
        parent::__construct();
    }

    public function searchuser($oldpassword,$name){
        $query = $this->db->query('select * from user where name =\''.$name.'\' and password = \''.$oldpassword.'\'');
        return $query->result_array();
    }

    public function xiugaimima($newpassword,$name){
        $this->db->query('update user set password = \''.$newpassword.'\' where name = \''.$name.'\'');
    }
}
?>