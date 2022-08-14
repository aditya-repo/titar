<?php

 
class Signup extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Signup_model');
    }

    function verify(){
        // Declare Validation rules //
        $this->load->library('form_validation');
        $this->form_validation->set_rules('name','Name','required|trim');
        $this->form_validation->set_rules('phone','Phone','required|trim');
        $this->form_validation->set_rules('gender','Gender','required|trim');
        $this->form_validation->set_rules('dob','Date Of Birth','required|trim');
        $this->form_validation->set_rules('email','Email Id','required|trim');
        $this->form_validation->set_rules('refferal','Referral ID','trim');

        // Fetch Post details //
        $name = $this->input->post('name');
        $gender = $this->input->post('gender');
        $dob = $this->input->post('dob');
        $phone = $this->input->post('phone');
        $email = $this->input->post('email');
        $refferal = $this->input->post('refferal');

        //  Check Validation is working ? //
        if($this->form_validation->run())     
        {
        //  Put post data is array //

            $params = array(
                'id' => '',
                'name' => $name,
                'gender' => $gender,
                'dob' => $dob,
                'phone' => $phone,
                'email' => $email,
                'refferal' => $refferal,
            );

        // Check If record is previously Found or Not //

            $record = $this->Signup_model->check_record($params);
            $no_of_unique_record = $record['IsAvail'];

            if ($no_of_unique_record == 0){

                $result = $this->Signup_model->create_new_user($params);
                $this->session->set_userdata($result);
                // var_dump($this->session->userdata('fname'));

                $resultKey = array('');
                foreach ($result as $key => $value) {
                    array_push($resultKey,$key);
                }

                redirect('Panel/');
                // echo "Successful login";
            }else{
                $this->session->set_flashdata('error', '<div class="text-center text-danger">Phone Number  already found | Try again</div>');
                $data['_view'] = 'account';
                $this->load->view('template/main',$data);
            }
        }else{
                $data['_view'] = 'account';
                $this->load->view('template/main',$data);
        }
    }
    
}?>