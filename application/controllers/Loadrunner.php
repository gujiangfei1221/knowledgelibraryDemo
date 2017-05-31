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
        $tmp = array();

        $data2 = $this->Loadrunnermodel->selectguid($uid);
        $ceshijihuaguid = $data2[0]['ceshijihuaguid'];
        $data['info'] = $this->Loadrunnermodel->selectscenario($ceshijihuaguid);
        for($i = 0;$i<count($data['info']);$i++){
            $filename = $data['info'][$i]['filename'];
            $data['info'][$i]['info2'] = array();
            array_push($data['info'][$i]['info2'],$this->Loadrunnermodel->selecttransaction($filename));
        }
//        var_dump($data['info']);
        $this->load->view('loadrunnerresultview',$data);
    }

    public function editproject($uid){
        $data['info'] = $this->Loadrunnermodel->selectguid($uid);
        $this->load->view('loadrunnereditview',$data);
    }

    public function doedit(){
        $xiangmumingcheng = $this->input->post('xiangmumingcheng');
        $ceshijihua = $this->input->post('ceshijihua');
        $uid = $this->uri->segment(3);
        $ceshineirong = $this->input->post('ceshineirong');
        $ceshirenyuan = $this->input->post('ceshirenyuan');
        $ceshibanben = $this->input->post('ceshibanben');
        $kaishijian = $this->input->post('kaishishijian');
        $jieshushijian = $this->input->post('jieshushijian');
        $this->Loadrunnermodel->doedit($xiangmumingcheng,$ceshijihua,$ceshineirong,$ceshirenyuan,$ceshibanben,$kaishijian,$jieshushijian,$uid);
//        echo $this->db->last_query();
        redirect('Loadrunner/index');
    }

    public function delscenario($ceshijihuaguid){
        $data3 = $this->Loadrunnermodel->delete3($ceshijihuaguid);

        unlink($data3[0]['filepath']);

        $path = explode('.',$data3[0]['filename']);
        $this->delDirAndFile('/var/www/html/LoadRunnerReport/'.$path[0].'/');

        $this->Loadrunnermodel->delete2($ceshijihuaguid);
        $this->Loadrunnermodel->delete4($data3[0]['filename']);

        echo '<script>alert("删除成功！")</script>';
        echo '<script>window.location.href=\''.site_url('Loadrunner/viewresult/'.$data3[0]['uid']).'\';</script>';
    }

    public function deleteproject($uid){
        $data2 = $this->Loadrunnermodel->selectguid($uid);
        $data3 = $this->Loadrunnermodel->delete3($data2[0]['ceshijihuaguid']);
        if(!$data3){
//            echo '1';
            $this->Loadrunnermodel->delete($uid);
            echo '<script>alert("删除成功！")</script>';
            echo '<script>window.location.href=\''.site_url('Loadrunner/index').'\';</script>';
        }
        else{
//            echo '2';
            unlink($data3[0]['filepath']);

            $path = explode('.',$data3[0]['filename']);
            $this->delDirAndFile('/var/www/html/LoadRunnerReport/'.$path[0].'/');

            $this->Loadrunnermodel->delete($uid);
            $this->Loadrunnermodel->delete2($data2[0]['ceshijihuaguid']);
            $this->Loadrunnermodel->delete4($data3[0]['filename']);

            echo '<script>alert("删除成功！")</script>';
            echo '<script>window.location.href=\''.site_url('Loadrunner/index').'\';</script>';
        }

    }

    public function delDirAndFile($path, $delDir = 1) {
        $handle = opendir($path);
        if ($handle) {
            while (false !== ( $item = readdir($handle) )) {
                if ($item != "." && $item != "..")
                    is_dir("$path/$item") ? $this->delDirAndFile("$path/$item", $delDir) : unlink("$path/$item");
            }
            closedir($handle);
            if ($delDir)
                return rmdir($path);
        }else {
            if (file_exists($path)) {
                return unlink($path);
            } else {
                return FALSE;
            }
        }
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

            //解压缩
            $zip = new ZipArchive();
            if ($zip->open($filepath) === TRUE) {
                $zip->extractTo('/var/www/html/LoadRunnerReport/'.$path[0].'/');
                $zip->close();//关闭资源句柄
            }
            else{
                echo '文件打开失败';
            }
            $myfile = fopen("/var/www/html/LoadRunnerReport/sum.txt", "a") or die("Unable to open file!");
            $tmp = filesize("/var/www/html/LoadRunnerReport/sum.txt");
            if($tmp != 0){
                $txt = "\r\n".$path[0]."#1";
            }
            else{
                $txt = $path[0]."#1";
            }
            fwrite($myfile, $txt);
            fclose($myfile);
            $this->Loadrunnermodel->upload($data2[0]['ceshijihuaguid'],$filename,$filepath,$scenariotitle,$fileurl);
            echo '<script>alert("新增成功！")</script>';
            echo '<script>window.location.href=\''.site_url('Loadrunner/index').'\';</script>';
        }
    }

    public function search(){
        if (!isset($_SESSION['name'])) {
            echo '<script>alert("请登录系统!")</script>';
            echo '<script>window.location.href=\'' . site_url('Login/index') . '\';</script>';
            return;
        }
        if($_SESSION['duiwai'] == 'yes'){
            echo '<script>alert("您没有权限访问该模块!")</script>';
            echo '<script>window.location.href=\''.site_url('Select/index').'\';</script>';
            return;
        }
        $value = $this->input->post('search2');
        $kaishishijian2 = $this->input->post('kaishishijian2');
        $jieshushijian2 = $this->input->post('jieshushijian2');

        $data['content'] = $this->Loadrunnermodel->search2($value,$kaishishijian2,$jieshushijian2);

        $this->load->view('loadrunnerview',$data);
    }
}
?>