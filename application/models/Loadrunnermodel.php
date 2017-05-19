<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Created by PhpStorm.
 * User: gujiangfei
 * Date: 16/4/13
 * Time: 20:20
 */
class Loadrunnermodel extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function addproject($xiangmumingcheng,$ceshijihua,$ceshijihuaguid,$ceshineirong,$ceshirenyuan,$ceshibanben,$kaishijian,$jieshushijian){
        $this->db->query('insert into result(xiangmumingcheng,ceshijihua,ceshijihuaguid,ceshineirong,ceshirenyuan,ceshibanben,kaishishijian,jieshushijian) values(\''.$xiangmumingcheng.'\',\''.$ceshijihua.'\',\''.$ceshijihuaguid.'\',\''.$ceshineirong.'\',\''.$ceshirenyuan.'\',\''.$ceshibanben.'\',\''.$kaishijian.'\',\''.$jieshushijian.'\')');
    }

    public function selectproject(){
        $query = $this->db->query('select * from result');
        return $query->result_array();
    }

    public function upload($ceshijihuaguid,$filename,$filepath,$scenariotitle,$fileurl){
        $this->db->query('insert into scenario(filename,filepath,ceshijihuaguid,scenarioname,fileurl) values(\''.$filename.'\',\''.$filepath.'\',\''.$ceshijihuaguid.'\',\''.$scenariotitle.'\',\''.$fileurl.'\')');
    }

    public function selectguid($uid){
        $query = $this->db->query('select * from result where uid = \''.$uid.'\'');
        return $query->result_array();
    }

    public function  selectscenario($ceshijihuaguid){
        $query = $this->db->query('select * from scenario where ceshijihuaguid = \''.$ceshijihuaguid.'\'');
        return $query->result_array();
    }

    public function delete($uid){
        $this->db->query('delete from result where uid = \''.$uid.'\'');
    }

    public function delete2($ceshijihuaguid){
        $this->db->query('delete from scenario where uid = \''.$ceshijihuaguid.'\'');
    }

    public function delete3($ceshijihuaguid){
        $query = $this->db->query('select * from scenario where ceshijihuaguid = \''.$ceshijihuaguid.'\'');
        return $query->result_array();
    }

}