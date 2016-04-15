<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: gujiangfei
 * Date: 2016/4/15
 * Time: 12:30
 */
class Addmodel extends CI_Model{
    public function __construct()
    {
        parent::__construct();
    }

    public function selectlanmu(){
        $query = $this->db->query('select name from lanmu');
        return $query->result_array();
    }

    public function getpath($name){
        $query = $this->db->query('select namepath from lanmu where name=\''.$name.'\'');
        return $query->result_array();
    }

    public function insertcontent($title,$lanmu,$content,$filename,$filepath){
        $this->db->query('insert into content(title,lanmu,content,filename,filepath) values(\''.$title.'\',\''.$lanmu.'\',\''.$content.'\',\''.$filename.'\',\''.$filepath.'\')');
    }
}

?>