<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Created by PhpStorm.
 * User: gujiangfei
 * Date: 16/4/13
 * Time: 20:20
 */
class Securitymodel extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function selectlanmu()
    {
        $query = $this->db->query('select parentname,name from lanmu where duiwai = \'yes\'');
        return $query->result_array();
    }

    public function getcontent($lanmu,$offset,$pagesize)
    {
        if ($lanmu == 'all') {
            $query = $this->db->query('select * from content where duiwai = \'yes\' limit '.$offset.','.$pagesize);
        } else {
            $query0 = $this->db->query('select namepath from lanmu where name =\''.$lanmu.'\'');
            $data = $query0->result_array();
            $query = $this->db->query('select * from content where  duiwai = \'yes\' and  lanmupath like \'%' . $data[0]['namepath'] . '%\' limit '.$offset.','.$pagesize);
        }
        return $query->result_array();
    }

    public function deletecontent($uid)
    {
        $this->db->query('delete from content where uid = \'' . $uid . '\'');
    }

    public function getpath($uid)
    {
        $query = $this->db->query('select * from content where uid = \'' . $uid . '\'');
        return $query->result_array();
    }

    public function getpath2($filename){
        $query = $this->db->query('select * from content where filename = \'' . $filename . '\'');
        return $query->result_array();
    }

    public function getcount($lanmu){
        if($lanmu == 'all'){
            $query = $this->db->query('select count(*) from content where duiwai = \'yes\'');
            return $query->result_array();
        }
        else{
            $query0 = $this->db->query('select namepath from lanmu where name =\''.$lanmu.'\'');
            $data = $query0->result_array();
            $query = $this->db->query('select count(*) from content where lanmupath like \'%'.$data[0]['namepath'].'%\'');
            return $query->result_array();
        }

    }

    public function search($value){
        $query = $this->db->query('select * from content where title like \'%'.$value.'%\' and duiwai = \'yes\'');
        return $query->result_array();
    }

}