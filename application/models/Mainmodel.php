<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Created by PhpStorm.
 * User: gujiangfei
 * Date: 16/4/13
 * Time: 20:20
 */
class Mainmodel extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function selectlanmu()
    {
        $query = $this->db->query('select parentname,name from lanmu');
        return $query->result_array();
    }

    public function getcontent($lanmu)
    {
        if ($lanmu == 'all') {
            $query = $this->db->query('select * from content');
        } else {
            $query = $this->db->query('select * from content where lanmu = \'' . $lanmu . '\'');
        }
        return $query->result_array();
    }

    public function deletecontent($title)
    {
        $this->db->query('delete from content where title = \'' . $title . '\'');
    }

    public function getpath($title)
    {
        $query = $this->db->query('select * from content where title = \'' . $title . '\'');
        return $query->result_array();
    }

    public function getpath2($filename){
        $query = $this->db->query('select * from content where filename = \'' . $filename . '\'');
        return $query->result_array();
    }

    public function getcount(){
        $query = $this->db->query('select count(*) from content');
        return $query->result_array();
    }

}