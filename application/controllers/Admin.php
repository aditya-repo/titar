<?php

 
class Admin extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        $id = $this->session->userdata('id');
        if ($id == NULL) {
            redirect('dashboard/account');
        }
    }

    function user_report()
    {
        $this->load->model('Balance_model');
        $this->load->model('User_model');
        $data['all_user'] = $this->User_model->get_alluser();

        $data['_view'] = 'admin-panel/user_report';
        $this->load->view('template/admin',$data);
    }
    function upload_ads()
    {
        $data['_view'] = 'admin-panel/ads/index';
        $this->load->view('template/back',$data);
    }
    public function balance()
    {
        $id = $this->session->userdata('id');
        $this->load->model('Balance_model');
        $data['result'] = $this->Balance_model->get_balance($id);


        $data['_view'] = 'dashboard/balance';
        $this->load->view('template/back',$data);
    }
    function logout()
    {
        $this->session->sess_destroy();
        redirect('');
    }
}?>