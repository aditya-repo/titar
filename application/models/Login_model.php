<?php
defined('BASEPATH') OR exit('No direct script access allowed');

 
class Login_model extends CI_Model {
    function __construct()
    {
        parent::__construct();
    }

    function get_login($para)
    {

        $id = $para['user'];
        $password = $para['pass'];
        $status = '1';
        $d = $this->db->query("
            SELECT
                *
            FROM
                `user`
            WHERE
                `phone` = ?
            AND
                `dob` = ?
        ",array($id,$password))->row_array();

        if (is_array($d))
        {
            if (sizeof($d) > 5){
                return $d;
            }else{
            return false;
            }
        }
        else{
            return false;
        }
        
    }
 
        
}
