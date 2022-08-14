<?php

 
class Panel extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        $id = $this->session->userdata('id');
        if ($id == NULL) {
            redirect('dashboard/account');
        }
    }

    function index()
    {
        $this->load->model('Ads_model');
        $data['allcoupon'] = $this->Ads_model->fetch_all_coupon();
        $data['allvoucher'] = $this->Ads_model->fetch_all_voucher();
        $data['allreferral'] = $this->Ads_model->fetch_all_referral();
        $data['_view'] = 'dashboard/dashboard';
        $this->load->view('template/back',$data);
    }
    function profile()
    {
        $data['_view'] = 'dashboard/profile';
        $this->load->view('template/back',$data);
    }
    function ads()
    {
        $this->load->model('Ads_model');
        date_default_timezone_set("Asia/Calcutta");   //India time (GMT+5:30)
        $current_date =  date('d/m/Y');

        $data['advs'] = $this->Ads_model->fetch_ads_for_user($current_date);
        $data['_view'] = 'dashboard/ads';
        $this->load->view('template/back',$data);
    }
    public function balance()
    {
        $id = $this->session->userdata('id');
        // var_dump($id);

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