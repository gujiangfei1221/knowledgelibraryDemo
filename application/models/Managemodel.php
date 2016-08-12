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

    public function addlanmu($parentname,$name,$level,$parentpath,$namepath,$duiwai){
        if($duiwai == null){
            $duiwai = 'no';
        }
        elseif($duiwai == 'on'){
            $duiwai = 'yes';
        }
        $this->db->query('insert into lanmu(parentname,name,level,parentpath,namepath,duiwai) values(\''.$parentname.'\',\''.$name.'\',\''.$level.'\',\''.$parentpath.'\',\''.$namepath.'\',\''.$duiwai.'\')');
    }

    public function adduser($loginid,$loginname,$password,$duiwai){
        if($duiwai == null){
            $duiwai = 'no';
        }
        elseif($duiwai == 'on'){
            $duiwai = 'yes';
        }
        $this->db->query('insert into user(name,username,password,quanxian,duiwai) values (\''.$loginname.'\',\''.$loginid.'\',\''.$password.'\',\''.'普通用户\''.',\''.$duiwai.'\')');
    }

    public function resetuserpassword($uid){
        $this->db->query('update user set password =\'e10adc3949ba59abbe56e057f20f883e\' where uid =\''.$uid.'\'');
    }

    public function selectlanmu(){
        $query = $this->db->query('select * from lanmu');
        return $query->result_array();
    }

    public function selectall($value){
        $query = $this->db->query('select * from lanmu where name = \''.$value.'\'');
        return $query->result_array();
    }

    public function selectcontent(){
        $query = $this->db->query('select * from content');
        return $query->result_array();
    }

    public function selectcontent2($title){
        $query = $this->db->query('select * from content where title =\''.$title.'\'');
        return $query->result_array();
    }

    public function selectuser(){
        $query = $this->db->query('select * from user');
        return $query->result_array();
    }

    public function deletelanmu($lanmu){
        $this->db->query('delete from lanmu where name = \''.$lanmu.'\'');
    }

    public function deletelanmu2($lanmupath){
        $this->db->query('delete from lanmu where namepath = \''.$lanmupath.'\'');
    }

    public function deleteuser($user){
        $this->db->query('delete from user where username = \''.$user.'\'');
    }

    public function deletecontent($lanmupath){
        $this->db->query('delete from content where lanmupath =\''.$lanmupath.'\'');
    }

    public function isuserexist($username){
        $query = $this->db->query('select * from user where username = \''.$username.'\'');
        return $query->result_array();
    }
}

?>