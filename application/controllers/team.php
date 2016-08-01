<?php
defined('BASEPATH') OR exit('No direct script access allowed');
session_start();
/**
 * Created by PhpStorm.
 * User: gujiangfei
 * Date: 16/4/11
 * Time: 20:14
 */

class Team extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Teammodel');
    }

    public function index(){
        if(!isset($_SESSION['name'])){
            echo '<script>alert("请登录系统!")</script>';
            echo '<script>window.location.href=\''.site_url('Login/index').'\';</script>';
            return;
        }
        $data['info'] = $this->Teammodel->show();
        $data['gongnengceshi'] = $this->Teammodel->gongnengceshi()[0]['count(*)'];
        $data['xingnengceshi'] = $this->Teammodel->xingnengceshi()[0]['count(*)'];
        $data['anquanceshi'] = $this->Teammodel->anquanceshi()[0]['count(*)'];
        $data['zidonghuaceshi'] = $this->Teammodel->zidonghuaceshi()[0]['count(*)'];
        $data['yanjiurenwu'] = $this->Teammodel->yanjiurenwu()[0]['count(*)'];
        $this->load->view('teamview',$data);
    }

    public function add(){
        $xiangmumingcheng = $this->input->post('xiangmumingcheng');
        $renwumingcheng = $this->input->post('remwumingcheng');
        $leibie = $this->input->post('leibie');
        $ceshirenyuan = $this->input->post('ceshirenyuan');
        $ceshilunci = $this->input->post('ceshilunci');
        $kaishishijian = $this->input->post('kaishishijian');
        $jieshushijian = $this->input->post('jieshushijian');
        $renwugongshi = $this->input->post('renwugongshi');
        $yusuanlaiyuan = $this->input->post('yusuanlaiyuan');
        $beizhu = $this->input->post('beizhu');
        $this->Teammodel->add($xiangmumingcheng,$renwumingcheng,$leibie,$ceshirenyuan,$ceshilunci,$kaishishijian,$jieshushijian,$renwugongshi,$yusuanlaiyuan,$beizhu);
        redirect('Team/index');
    }

    public function delete($uid){
        $uid = urldecode($uid);
        $this->Teammodel->delete($uid);
        echo '<script>alert("删除成功！")</script>';
        echo '<script>window.location.href=\''.site_url('Team/index').'\';</script>';
    }

    public function search(){
        $value = $this->input->post('search');
        if($value != ''){
            $data['info'] = $this->Teammodel->search($value);
            $this->load->view('teamview',$data);
        }
        else{
            echo '<script>alert("搜索值不能为空！")</script>';
            echo '<script>window.location.href=\''.site_url('Team/index').'\';</script>';
        }
    }
}

?>