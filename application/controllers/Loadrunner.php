<?php
defined('BASEPATH') OR exit('No direct script access allowed');
session_start();
/**
 * Created by PhpStorm.
 * User: gujiangfei
 * Date: 16/4/11
 * Time: 20:14
 */

class Loadrunner extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Loadrunnermodel');
    }

    public function index(){
        if(!isset($_SESSION['name'])){
            echo '<script>alert("请登录系统!")</script>';
            echo '<script>window.location.href=\''.site_url('Login/index').'\';</script>';
            return;
        }
        $data['content'] = $this->Loadrunnermodel->selectproject();
        $this->load->view('loadrunnerview',$data);
    }

    public function addproject(){
        $xiangmumingcheng = $this->input->post('xiangmumingcheng');
        $ceshijihua = $this->input->post('ceshijihua');
        $ceshijihuaguid = md5($xiangmumingcheng.'_'.time());
        $ceshineirong = $this->input->post('ceshineirong');
        $ceshirenyuan = $this->input->post('ceshirenyuan');
        $ceshibanben = $this->input->post('ceshibanben');
        $kaishijian = $this->input->post('kaishishijian');
        $jieshushijian = $this->input->post('jieshushijian');
        $this->Loadrunnermodel->addproject($xiangmumingcheng,$ceshijihua,$ceshijihuaguid,$ceshineirong,$ceshirenyuan,$ceshibanben,$kaishijian,$jieshushijian);
        redirect('Loadrunner/index');
    }

    public function addscenario($uid){
        $data['info'] = $uid;
        $this->load->view('loadrunneraddview',$data);

//        echo '<script>window.location.href=\' http://192.168.203.223/result/Report.htm \'</script>';
    }

    public function viewresult($uid){
        $data2 = $this->Loadrunnermodel->selectguid($uid);
        $ceshijihuaguid = $data2[0]['ceshijihuaguid'];
        $data['info'] = $this->Loadrunnermodel->selectscenario($ceshijihuaguid);
        $this->load->view('loadrunnerresultview',$data);
    }

    public function deleteproject($uid){

    }

    public function do_upload($uid){
        $scenariotitle = $this->input->post('scenariotitle');
        $config['upload_path']      = 'mulu/result/';

        $config['allowed_types']    = 'zip';
        $config['file_name'] = md5(time());

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('userfile'))
        {
//            $error = array('error' => $this->upload->display_errors());
            echo '<script>alert("上传失败，请检查路径！")</script>';
            echo '<script>window.location.href=\''.site_url('Loadrunner/index').'\';</script>';
        }
        else
        {
            $data = array('upload_data' => $this->upload->data());
            $filepath = $data['upload_data']['full_path'];
            $filename = $data['upload_data']['file_name'];
            $data2 = $this->Loadrunnermodel->selectguid($uid);
            $path = explode('.',$filename);
            $fileurl = 'http://192.168.203.223/LoadRunnerReport/'.$path[0].'/Report.htm';

            //todo
            $zip = new ZipArchive();
            if ($zip->open($filepath) === TRUE) {
                $zip->extractTo('/var/www/html/LoadRunnerReport/'.$path[0].'/');
                $zip->close();//关闭资源句柄
            }
            else{
                echo '文件打开失败';
            }

            $this->Loadrunnermodel->upload($data2[0]['ceshijihuaguid'],$filename,$filepath,$scenariotitle,$fileurl);
            echo '<script>alert("新增成功！")</script>';
            echo '<script>window.location.href=\''.site_url('Loadrunner/index').'\';</script>';
        }
    }
}
?>