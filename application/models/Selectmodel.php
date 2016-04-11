<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: gujiangfei
 * Date: 16/4/11
 * Time: 21:52
 */
class Selectmodel extends CI_Model{
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