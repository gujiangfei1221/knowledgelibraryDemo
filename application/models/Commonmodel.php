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

    public function search($value){
        $query = $this->db->query('');
        return $query->result_array();
    }
}
?>