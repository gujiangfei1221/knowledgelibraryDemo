<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: gujiangfei
 * Date: 16/4/12
 * Time: 19:48
 */
class Managemodel extends CI_Model{
    public function __construct()
    {
        parent::__construct();
    }

    public function addlanmu($parentname,$name,$level,$parentpath,$namepath){
        $this->db->query('insert into lanmu(parentname,name,level,parentpath,namepath) values(\''.$parentname.'\',\''.$name.'\',\''.$level.'\',\''.$parentpath.'\',\''.$namepath.'\')');
    }

    public function selectlanmu(){
        $query = $this->db->query('select name from lanmu');
        return $query->result_array();
    }

    public function selectall($value){
        $query = $this->db->query('select * from lanmu where name = \''.$value.'\'');
        return $query->result_array();
    }
}

?>