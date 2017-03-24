<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: gujiangfei
 * Date: 16/4/11
 * Time: 21:52
 */
class Teammodel extends CI_Model{
    public function __construct()
    {
        parent::__construct();
    }

    public function add($ceshileibie,$xiangmumingcheng,$jihuamingcheng,$ceshirenyuan,$ceshineirong,$kaishishijian,$jieshushijian,$beizhu){
        $this->db->query('insert into team(ceshileibie,xiangmumingcheng,jihuamingcheng,ceshineirong,ceshirenyuan,kaishishijian,jieshushijian,beizhu) values(\''.$ceshileibie.'\',\''.$xiangmumingcheng.'\',\''.$jihuamingcheng.'\',\''.$ceshineirong.'\',\''.$ceshirenyuan.'\',\''.$kaishishijian.'\',\''.$jieshushijian.'\',\''.$beizhu.'\')');
    }

    public function update($ceshileibie,$xiangmumingcheng,$jihuamingcheng,$ceshirenyuan,$ceshineirong,$kaishishijian,$jieshushijian,$beizhu,$uid){
        $this->db->query('update team set xiangmumingcheng = \''.$xiangmumingcheng.'\',jihuamingcheng =\''.$jihuamingcheng.'\',ceshileibie=\''.$ceshileibie.'\',ceshirenyuan=\''.$ceshirenyuan.'\',ceshineirong=\''.$ceshineirong.'\',kaishishijian=\''.$kaishishijian.'\',jieshushijian=\''.$jieshushijian.'\',beizhu=\''.$beizhu.'\' where uid=\''.$uid.'\'');
    }

    public function show($offset,$pagesize){
        $query = $this->db->query('select * from team order by uid desc limit '.$offset.','.$pagesize);
        return $query->result_array();
    }

    public function show2($uid){
        $query = $this->db->query('select * from team where uid =\''.$uid.'\''.'order by uid desc');
        return $query->result_array();
    }

    public function delete($uid){
        $this->db->query('delete from team where uid = \'' . $uid . '\'');
    }


    public function search($value){
        $query = $this->db->query('select * from team
where xiangmumingcheng like \'%'.$value.'%\' or jihuamingcheng like \'%'.$value.'%\' or ceshileibie like \'%'.$value.'%\'
or ceshirenyuan like \'%'.$value.'%\' or ceshineirong like \'%'.$value.'%\''.'order by uid desc');
        return $query->result_array();
    }

    public function search2($value,$kaishishijian2,$jieshushijian2){
        if($value != '' ){
            if($kaishishijian2 != ''){
                if($jieshushijian2 != ''){
                    $query = $this->db->query('select * from team
where xiangmumingcheng like \'%'.$value.'%\' or jihuamingcheng like \'%'.$value.'%\' or ceshileibie like \'%'.$value.'%\'
or ceshirenyuan like \'%'.$value.'%\' or ceshineirong like \'%'.$value.'%\''.'order by uid desc');
                }
                else {
                    $query = $this->db->query('select * from team
where xiangmumingcheng like \'%'.$value.'%\' or jihuamingcheng like \'%'.$value.'%\' or ceshileibie like \'%'.$value.'%\'
or ceshirenyuan like \'%'.$value.'%\' or ceshineirong like \'%'.$value.'%\''.'order by uid desc');
                }
            }
            else{
                if($jieshushijian2 != ''){
                    $query = $this->db->query('select * from team
where xiangmumingcheng like \'%'.$value.'%\' or jihuamingcheng like \'%'.$value.'%\' or ceshileibie like \'%'.$value.'%\'
or ceshirenyuan like \'%'.$value.'%\' or ceshineirong like \'%'.$value.'%\''.'order by uid desc');
                }
                else {
                    $query = $this->db->query('select * from team
where xiangmumingcheng like \'%'.$value.'%\' or jihuamingcheng like \'%'.$value.'%\' or ceshileibie like \'%'.$value.'%\'
or ceshirenyuan like \'%'.$value.'%\' or ceshineirong like \'%'.$value.'%\''.'order by uid desc');
                }
            }
        }
        else{
            if($kaishishijian2 != ''){
                if($jieshushijian2 != ''){
                    $query = $this->db->query('select * from team
where kaishishijian >= \''.$kaishishijian2.'\' and jieshushijian <= \''.$jieshushijian2.'\''.'order by uid desc');
                }
                else {
                    $query = $this->db->query('select * from team
where kaishishijian >= \''.$kaishishijian2.'\''.'order by uid desc');
                }
            }
            else{
                if($jieshushijian2 != ''){
                    $query = $this->db->query('select * from team
where jieshushijian <= \''.$jieshushijian2.'\''.'order by uid desc');
                }
                else {
                    $query = $this->db->query('select * from team order by uid desc');
                }
            }
        }
        return $query->result_array();
    }

    public function getcount(){
        $query = $this->db->query('select count(*) from team');
        return $query->result_array();
    }
}

?>