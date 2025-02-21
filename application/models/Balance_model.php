<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Balance_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get user by us_id
     */


    function get_balance($bl_id)
    {
        return $this->db->get_where('balance',array('pid'=>$bl_id))->row_array();
    }
    
    function get_my_pgid($us_id)
    {
        return $this->db->get_where('users',array('collegecode'=>$us_id))->row_array();
    }


    function get_my_pgsecret($us_id)
    {
        return $this->db->get_where('users',array('collegecode'=>$us_id))->row_array();
    }
     
        function get_user_dash($us_id)
    {
        return $this->db->get_where('users',array('collegecode'=>$us_id))->row_array();
    }   
    /*
     * Get all users
     */
    function get_all_users()
    {
        $this->db->order_by('us_id', 'desc');
        return $this->db->get('users')->result_array();
    }

        function get_pg_charging_College()
    {
        $this->db->select('collegecode');
        $this->db->order_by('us_id', 'desc');
        $this->db->where('pgCharge', "1");
        return $this->db->get('users')->result_array();
    }

    function information()

    {
     

        $this->db->select("collegecode,collegename,email,phone1,phone2,admissionHelpline,address");
        $this->db->order_by('us_id', 'desc');
        $this->db->where('status','1');

    
            return $this->db->get('users')->result_array();
    
        
    }
 function information_one($college) {
        $this->db->select("collegecode,collegename,email,phone1,phone2,admissionHelpline,address");
        $this->db->order_by('us_id', 'desc');
        $this->db->where('status','1');
        $this->db->where('collegecode',$college);


       
        return $this->db->get('users')->row_array();

 }


        
    

    /*
     * function to add new user
     */
    function add_user($params)
    {
        $this->db->insert('users',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update user
     */
    function update_user($us_id,$params)
    {
        $this->db->where('us_id',$us_id);
        return $this->db->update('users',$params);
    }
    
    /*
     * function to delete user
     */
    function delete_user($us_id)
    {
        return $this->db->delete('users',array('us_id'=>$us_id));
    }
}
