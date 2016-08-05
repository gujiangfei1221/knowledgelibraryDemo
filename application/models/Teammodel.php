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

    public function add($xiangmumingcheng,$renwumingcheng,$leibie,$ceshirenyuan,$ceshilunci,$kaishishijian,$jieshushijian,$renwugongshi,$yusuanlaiyuan,$beizhu){
        $this->db->query('insert into team(xiangmumingcheng,renwumingcheng,leibie,ceshirenyuan,ceshilunci,kaishishijian,jieshushijian,gongshi,yusuanlaiyuan,beizhu) values(\''.$xiangmumingcheng.'\',\''.$renwumingcheng.'\',\''.$leibie.'\',\''.$ceshirenyuan.'\',\''.$ceshilunci.'\',\''.$kaishishijian.'\',\''.$jieshushijian.'\',\''.$renwugongshi.'\',\''.$yusuanlaiyuan.'\',\''.$beizhu.'\')');
    }

    public function update($xiangmumingcheng,$renwumingcheng,$leibie,$ceshirenyuan,$ceshilunci,$kaishishijian,$jieshushijian,$renwugongshi,$yusuanlaiyuan,$beizhu,$uid){
        $this->db->query('update team set xiangmumingcheng = \''.$xiangmumingcheng.'\',renwumingcheng =\''.$renwumingcheng.'\',leibie=\''.$leibie.'\',ceshirenyuan=\''.$ceshirenyuan.'\',ceshilunci=\''.$ceshilunci.'\',kaishishijian=\''.$kaishishijian.'\',jieshushijian=\''.$jieshushijian.'\',gongshi=\''.$renwugongshi.'\',yusuanlaiyuan=\''.$yusuanlaiyuan.'\',beizhu=\''.$beizhu.'\' where uid=\''.$uid.'\'');
    }

    public function show($offset,$pagesize){
        $query = $this->db->query('select * from team limit '.$offset.','.$pagesize);
        return $query->result_array();
    }

    public function show2($uid){
        $query = $this->db->query('select * from team where uid =\''.$uid.'\'');
        return $query->result_array();
    }

    public function delete($uid){
        $this->db->query('delete from team where uid = \'' . $uid . '\'');
    }

    public function search($value){
        $query = $this->db->query('select * from team where xiangmumingcheng like \'%'.$value.'%\' or renwumingcheng like \'%'.$value.'%\' or leibie like \'%'.$value.'%\'or ceshirenyuan like \'%'.$value.'%\' or yusuanlaiyuan like \'%'.$value.'%\'');
        return $query->result_array();
    }

    public function search2($value,$kaishishijian2,$jieshushijian2){
        if($value != '' ){
            if($kaishishijian2 != ''){
                if($jieshushijian2 != ''){
                    $query = $this->db->query('select * from team 
where (xiangmumingcheng like \'%'.$value.'%\' or renwumingcheng like \'%'.$value.'%\' or leibie like \'%'.$value.'%\'or 
ceshirenyuan like \'%'.$value.'%\' or yusuanlaiyuan like \'%'.$value.'%\') and kaishishijian >= \''.$kaishishijian2.'\' and jieshushijian <= \''.$jieshushijian2.'\'');
                }
                else {
                    $query = $this->db->query('select * from team 
where (xiangmumingcheng like \'%'.$value.'%\' or renwumingcheng like \'%'.$value.'%\' or leibie like \'%'.$value.'%\'or 
ceshirenyuan like \'%'.$value.'%\' or yusuanlaiyuan like \'%'.$value.'%\') and kaishishijian >= \''.$kaishishijian2.'\'');
                }
            }
            else{
                if($jieshushijian2 != ''){
                    $query = $this->db->query('select * from team 
where (xiangmumingcheng like \'%'.$value.'%\' or renwumingcheng like \'%'.$value.'%\' or leibie like \'%'.$value.'%\'or 
ceshirenyuan like \'%'.$value.'%\' or yusuanlaiyuan like \'%'.$value.'%\') and jieshushijian <= \''.$jieshushijian2.'\'');
                }
                else {
                    $query = $this->db->query('select * from team 
where (xiangmumingcheng like \'%'.$value.'%\' or renwumingcheng like \'%'.$value.'%\' or leibie like \'%'.$value.'%\'or 
ceshirenyuan like \'%'.$value.'%\' or yusuanlaiyuan like \'%'.$value.'%\')');
                }
            }
        }
        else{
            if($kaishishijian2 != ''){
                if($jieshushijian2 != ''){
                    $query = $this->db->query('select * from team 
where kaishishijian >= \''.$kaishishijian2.'\' and jieshushijian <= \''.$jieshushijian2.'\'');
                }
                else {
                    $query = $this->db->query('select * from team 
where kaishishijian >= \''.$kaishishijian2.'\'');
                }
            }
            else{
                if($jieshushijian2 != ''){
                    $query = $this->db->query('select * from team 
where jieshushijian <= \''.$jieshushijian2.'\'');
                }
                else {
                    $query = $this->db->query('select * from team');
                }
            }
        }
        return $query->result_array();
    }

    public function gongnengceshi(){
        $query = $this->db->query('select count(*) from team where leibie =\'功能测试\'');
        return $query->result_array();
    }

    public function xingnengceshi(){
        $query = $this->db->query('select count(*) from team where leibie =\'性能测试\'');
        return $query->result_array();
    }

    public function anquanceshi(){
        $query = $this->db->query('select count(*) from team where leibie =\'安全测试\'');
        return $query->result_array();
    }

    public function zidonghuaceshi(){
        $query = $this->db->query('select count(*) from team where leibie =\'自动化测试\'');
        return $query->result_array();
    }

    public function yanjiurenwu(){
        $query = $this->db->query('select count(*) from team where leibie =\'研究任务\'');
        return $query->result_array();
    }

    public function getcount(){
        $query = $this->db->query('select count(*) from team');
        return $query->result_array();
    }
}

?>