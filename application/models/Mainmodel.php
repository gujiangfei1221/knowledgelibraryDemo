<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: gujiangfei
 * Date: 16/4/13
 * Time: 20:20
 */

class Mainmodel extends CI_Model{
    public function __construct()
    {
        parent::__construct();
    }

    public function selectlanmu(){
        $query = $this->db->query('select parentname,name from lanmu');
        return $query->result_array();
    }

    public function getcontent($lanmu){
        if($lanmu == 'all'){
            $query = $this->db->query('select * from content');
        }
        else{
            $query = $this->db->query('select * from content where lanmu = \''.$lanmu.'\'');
        }
        return $query->result_array();
    }

    public function downloadfile($filename){
        if (false == file_exists($filename)) {
            return false;
        }
        // http headers
        header('Content-Type: application-x/force-download');
        header('Content-Disposition: attachment; filename="' . basename($filename) .'"');
        header('Content-length: ' . filesize($filename));

        // for IE6
        if (false === strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE 6')) {
            header('Cache-Control: no-cache, must-revalidate');
        }
        header('Pragma: no-cache');

        // read file content and output
        return readfile($filename);;
    }
}