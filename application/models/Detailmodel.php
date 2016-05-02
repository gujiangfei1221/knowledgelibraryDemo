<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: gujiangfei
 * Date: 16/5/1
 * Time: 23:46
 */

class Detailmodel extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getcontent($uid){
        $query = $this->db->query('select * from content where uid = \'' . $uid . '\'');
        return $query->result_array();
    }
}

?>