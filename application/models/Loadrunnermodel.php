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

    public function  selecttransaction($filename){
        $query = $this->db->query('select * from transactions where filename = \''.$filename.'\'');
        return $query->result_array();
    }

    public function delete($uid){
        $this->db->query('delete from result where uid = \''.$uid.'\'');
    }

    public function delete2($ceshijihuaguid){
        $this->db->query('delete from scenario where ceshijihuaguid = \''.$ceshijihuaguid.'\'');
    }

    public function delete22($uid){
        $this->db->query('delete from scenario where uid = \''.$uid.'\'');
    }

    public function delete3($ceshijihuaguid){
        $query = $this->db->query('select * from scenario where ceshijihuaguid = \''.$ceshijihuaguid.'\'');
        return $query->result_array();
    }

    public function delete33($ceshijihuaguid){
        $query = $this->db->query('select * from result where ceshijihuaguid = \''.$ceshijihuaguid.'\'');
        return $query->result_array();
    }

    public function delete4($filename){
        $this->db->query('delete from transactions where filename = \''.$filename.'\'');
    }

    public function search2($value,$kaishishijian2,$jieshushijian2){
        if($value != '' ){
            if($kaishishijian2 != ''){
                if($jieshushijian2 != ''){
                    $query = $this->db->query('select * from result
where xiangmumingcheng like \'%'.$value.'%\' or ceshijihua like \'%'.$value.'%\' or ceshineirong like \'%'.$value.'%\'
or ceshirenyuan like \'%'.$value.'%\' or ceshibanben like \'%'.$value.'%\''.'order by uid desc');
                }
                else {
                    $query = $this->db->query('select * from result
where xiangmumingcheng like \'%'.$value.'%\' or ceshijihua like \'%'.$value.'%\' or ceshineirong like \'%'.$value.'%\'
or ceshirenyuan like \'%'.$value.'%\' or ceshibanben like \'%'.$value.'%\''.'order by uid desc');
                }
            }
            else{
                if($jieshushijian2 != ''){
                    $query = $this->db->query('select * from result
where xiangmumingcheng like \'%'.$value.'%\' or ceshijihua like \'%'.$value.'%\' or ceshineirong like \'%'.$value.'%\'
or ceshirenyuan like \'%'.$value.'%\' or ceshibanben like \'%'.$value.'%\''.'order by uid desc');
                }
                else {
                    $query = $this->db->query('select * from result
where xiangmumingcheng like \'%'.$value.'%\' or ceshijihua like \'%'.$value.'%\' or ceshineirong like \'%'.$value.'%\'
or ceshirenyuan like \'%'.$value.'%\' or ceshibanben like \'%'.$value.'%\''.'order by uid desc');
                }
            }
        }
        else{
            if($kaishishijian2 != ''){
                if($jieshushijian2 != ''){
                    $query = $this->db->query('select * from result
where kaishishijian >= \''.$kaishishijian2.'\' and jieshushijian <= \''.$jieshushijian2.'\''.'order by uid desc');
                }
                else {
                    $query = $this->db->query('select * from result
where kaishishijian >= \''.$kaishishijian2.'\''.'order by uid desc');
                }
            }
            else{
                if($jieshushijian2 != ''){
                    $query = $this->db->query('select * from result
where jieshushijian <= \''.$jieshushijian2.'\''.'order by uid desc');
                }
                else {
                    $query = $this->db->query('select * from result order by uid desc');
                }
            }
        }
        return $query->result_array();
    }

    public function doedit($xiangmumingcheng,$ceshijihua,$ceshineirong,$ceshirenyuan,$ceshibanben,$kaishijian,$jieshushijian,$uid){
        $this->db->query("update result set xiangmumingcheng ='" .$xiangmumingcheng."' ,ceshijihua = '" .$ceshijihua."' ,ceshineirong = '" .$ceshineirong ."' ,ceshirenyuan='" . $ceshirenyuan."' ,ceshibanben = '" .$ceshibanben."' ,kaishishijian = '" .$kaishijian."' ,jieshushijian = '".$jieshushijian."' where uid = '". $uid."'");
    }


}