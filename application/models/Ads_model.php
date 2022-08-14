<?php
defined('BASEPATH') OR exit('No direct script access allowed');

 
class Ads_model extends CI_Model {
    function __construct()
    {
        parent::__construct();
    }

    function fetch_ads() {
        $query =$this->db->get('statusads');

        if ($query) {      
            return $query->result();
        }
    }

    function fetch_voucher() {
        $query =$this->db->get('campain');

        if ($query) {      
            return $query->result();
        }
    }


    function fetch_ads_for_user($current_date)
    {
        $d = $this->db->get_where('statusads',array('date'=>$current_date))->row_array();
        return $d;
    }
    function fetch_all_coupon()
    {
        $d = $this->db->get_where('campain',array('type'=>'coupon'))->result();
        return $d;
    }
    function fetch_all_voucher()
    {
        $d = $this->db->get_where('campain',array('type'=>'voucher'))->result();
        return $d;
    }
    function fetch_all_referral()
    {
        $d = $this->db->get_where('campain',array('type'=>'referral'))->result();
        return $d;
    }

    function fetch_voucher_for_user($current_date)
    {
        $d = $this->db->get_where('statusads',array('date'=>$current_date))->row_array();
        return $d;
    }

    function edit_single_ads($value)
    {
        $this->db->where('sid', $value);
        $query = $this->db->get('statusads');

        if ($query) {
            return $query->row();
        }
    }
    function edit_single_voucher($value)
    {
        $this->db->where('id', $value);
        $query = $this->db->get('campain');

        if ($query) {
            return $query->row();
        }
    }
    function insert_ads($data){
        // var_dump($data);

        if ($data != null) {
            $this->db->insert('statusads',$data);
           }
        else{
            echo "Sorry Babu";
        }
    }
    function insert_voucher($data){
        // var_dump($data);

        if ($data != null) {
            $this->db->insert('campain',$data);
           }
        else{
            echo "Sorry Babu";
        }
    }
    function last_row() {
        $this->db->limit(1);
        $this->db->order_by('sid','desc');
        $query = $this->db->get('statusads');

        if ($query) {      
            return $query->result();
        }
    }
    function last_voucherrow() {
        $this->db->limit(1);
        $this->db->order_by('id','desc');
        $query = $this->db->get('campain');

        if ($query) {      
            return $query->result();
        }
    }
    function delete_ads($id)
    {
        echo $id;
        $this->db->where('sid', $id);
        $query = $this->db->delete('statusads');

        if ($query) {
            return true;
        }
        else {
            return false;
        }
    }
    function delete_voucher($id)
    {
        echo $id;
        $this->db->where('sid', $id);
        $query = $this->db->delete('statusads');

        if ($query) {
            return true;
        }
        else {
            return false;
        }
    }
    function update_ads($data,$id)
    {
        $this->db->where('sid', $id);

        $query = $this->db->update('statusads', $data);
        if ($query) {
            return true;
            # code...
        }
        else{
            return false;
        }
    }
    function update_voucher($data,$id)
    {
        $this->db->where('id', $id);

        $query = $this->db->update('campain', $data);
        if ($query) {
            return true;
            # code...
        }
        else{
            return false;
        }
    }
}
 