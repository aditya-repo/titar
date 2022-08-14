<?php

 
class Login extends CI_Controller{

    function account()
    {
        $data['_view'] = 'account';
        $this->load->view('template/main',$data);
    }
    function verify()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('phone','Enter Registered Phone','required|trim');
        $this->form_validation->set_rules('dob','Enter Date of Birth(dd-mm-yyyy)','required|trim');
        $userid = $this->input->post('phone');
        $pass = $this->input->post('dob');
        if($this->form_validation->run())     
        {  
            $this->load->model('Login_model');

            $params = array(
                'user' => $userid,
                'pass' => $pass);   

            $logindata = $this->Login_model->get_login($params);

// var_dump($logindata);
            if ($logindata != null){
                $array = array(
                    'id' => $logindata['id'],  
                    'name' => $logindata['name'], 
                    'dob' => $logindata['dob'], 
                    'gender' => $logindata['gender'], 
                    'phone' => $logindata['phone'],
                    'email' => $logindata['email'], 
                    'address' => $logindata['address'],
                    'pincode' => $logindata['pincode'],
                    'city' => $logindata['city'],
                    'state' => $logindata['state'],
                    'ctype' => $logindata['ctype'],
                    'refferal' => $logindata['refferal'],
                  );

                $this->session->set_userdata($array);
                redirect('Panel/index');
                // echo "Successful login";
            }else{
                            $this->session->set_flashdata('error', '<div class="alert alert-danger">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                             Login Failed.
                        </div>');
                    $data['_view'] = 'signin';
                    $this->load->view('template/back',$data);
            }
        }else{
                // redirect('index/login');
            echo validation_errors();
        }
    }
    
}?>