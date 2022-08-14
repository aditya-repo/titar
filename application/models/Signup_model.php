<?php
defined('BASEPATH') OR exit('No direct script access allowed');

 
class Signup_model extends CI_Model {
    function __construct()
    {
        parent::__construct();
    }

    function check_record($para)
    {
        $phone = $para['phone'];

        $d = $this->db->query("
            SELECT
                COUNT(`phone`) AS `IsAvail`
            FROM
                `user`

            WHERE
                `phone` = ?       
        ",array($phone))->row_array();
        return $d;
    }


    function create_new_user($value){
// var_dump($value);
// die();
        // Database column name used as userid and pass
        $definedColumnName = 'phone';

        // Array Value to be inserted in new row
        $columnValue = array();
        foreach ($value as $key => $value) {
            $value = $value;
            array_push($columnValue,$value);
        }
        $valueCount = count($columnValue);

        // Array of database column in which data to be inserted
        $sql = "SELECT * FROM `user`";
        $sql = $this->db->query($sql)->row_array();
        $columnName = array();
        foreach ($sql as $key => $value) {
            array_push($columnName,$key);}
        $nameCount = count($columnValue);

        if ($valueCount == $nameCount) {

        // Combined Array of Column and Value

        $finalArray = array_combine(array_map(function($el) use ($columnName) {
            return $columnName[$el];
        }, array_keys($columnValue)), array_values($columnValue));


        // Database insert query
        $this->db->insert('user', $finalArray);

        // Database column name used as userid and pass
        $userid = $finalArray['phone'];
        $password = $finalArray['dob'];

        $userss = array($userid,$password);

        $sql = "SELECT
                *
            FROM
                `user`
            WHERE
                $definedColumnName = '$userid'";

        $sql = $this->db->query($sql)->row_array();
        return $sql;

        }else{
            echo "database column name and entered data count not matched";
        }
}

    }
 