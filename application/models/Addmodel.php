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
        $query = $this->db->query('select * from lanmu');
        return $query->result_array();
    }

    public function getpath($name){
        $query = $this->db->query('select namepath from lanmu where namepath=\''.$name.'\'');
        return $query->result_array();
    }

    public function getlanmu($lanmupath){
        $query = $this->db->query('select name from lanmu where namepath=\''.$lanmupath.'\'');
        return $query->result_array();
    }

    public function insertcontent($title,$lanmu,$content,$filename,$filepath,$lanmupath,$name,$user){
        $this->db->query('insert into content(title,lanmu,content,filename,filepath,lanmupath,name,user) values(\''.$title.'\',\''.$lanmu.'\',\''.$content.'\',\''.$filename.'\',\''.$filepath.'\',\''.$lanmupath.'\',\''.$name.'\',\''.$user.'\')');
    }
}

?>