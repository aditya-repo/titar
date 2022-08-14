<?php

class Update_Voucher extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Ads_model');
    }

    function index()
        {
            $this->load->model('Ads_model');
            $data['ads'] = $this->Ads_model->fetch_voucher();
            $data['_view'] = 'admin-panel/voucher/index';
            $this->load->view('template/admin',$data);
        }
    function add_ads()
        {
            $this->load->library('form_validation');
            $this->form_validation->set_rules('caption', 'Caption', 'trim|required');
            $this->form_validation->set_rules('url', 'URL', 'trim|required');
            $this->form_validation->set_rules('startDate', ' Start Date', 'trim|required');
            $this->form_validation->set_rules('endDate', 'End Date', 'trim|required');
            $this->form_validation->set_rules('name', 'Name', 'trim|required');
            $this->form_validation->set_rules('type', 'Type', 'trim|required');
            $this->form_validation->set_rules('remarks', 'Remark', 'trim|required');
            $this->form_validation->set_rules('money', 'Money', 'trim|required');
            $query = $this->Ads_model->last_voucherrow();
            $query = $query['0']->id + 1;

            $filename = $query;
            $config['file_name']            = $filename;
            $config['upload_path']          = './resources/img/voucher';
            $config['allowed_types']        = 'jpg';
            $config['max_size']             = 5000;
            $config['max_width']            = 10000;
            $config['max_height']           = 10000;
            $config['overwrite']           = TRUE;
            $this->load->library('upload', $config);
                if ( ! $this->upload->do_upload('upl_file')){
                  $errors = $this->upload->display_errors();
                  $this->session->set_flashdata('error', $errors);
                  $data['_view'] = 'admin-panel/voucher/index';
                  $this->load->view('template/admin',$data);
                }else{
                  $data = array('upload_data' => $this->upload->data());}
                    if ($this->form_validation->run()) {
                        $params = array(
                              'caption' => $this->input->post('caption'),                            
                              'url' => $this->input->post('url'),                            
                              'startDate' => $this->input->post('startDate'),                            
                              'endDate' => $this->input->post('endDate'),                            
                              'name' => $this->input->post('name'),              
                              'type' => $this->input->post('type'),                            
                              'remarks' => $this->input->post('remarks'),                            
                              'money' => $this->input->post('money'));                            
                              $this->Ads_model->insert_voucher($params);
                              $this->session->set_flashdata('success','<div class="alert alert-success">
                              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                              New Recored Added Successfully.</div>');
                              redirect('update_voucher/index');
                    }else{
                      echo "Something Went Wrong";
                        }
                }
    function edit_ads($value){
        $data['singleads'] = $this->Ads_model->edit_single_voucher($value); 
        $data['_view'] = 'admin-panel/voucher/edit';
        $this->load->view('template/admin',$data);
                            }
    function update_ads($value){
        $srno = $this->input->post('id');
            $filename = $srno;
            $config['file_name']            = $filename;
            $config['upload_path']          = './resources/img/voucher';
            $config['allowed_types']        = 'jpg|jpeg';
            $config['max_size']             = 5000;
            $config['max_width']            = 10000;
            $config['max_height']           = 10000;
            $config['overwrite']           = TRUE;
            $this->load->library('upload', $config);
                if ( ! $this->upload->do_upload('upl_file')){
                    $errors = $this->upload->display_errors();
                    $this->session->set_flashdata('error', $errors);
                    $data['_view'] = 'admin-panel/voucher/index';
                    $this->load->view('template/admin',$data);
                  }else{
                    $data = array('upload_data' => $this->upload->data());
                  }
            $this->load->library('form_validation');
            $this->form_validation->set_rules('caption', 'Caption', 'trim|required');
            $this->form_validation->set_rules('url', 'URL', 'trim|required');
            $this->form_validation->set_rules('startDate', ' Start Date', 'trim|required');
            $this->form_validation->set_rules('endDate', 'End Date', 'trim|required');
            $this->form_validation->set_rules('name', 'Name', 'trim|required');
            $this->form_validation->set_rules('type', 'Type', 'trim');
            $this->form_validation->set_rules('remarks', 'Remark', 'trim|required');
            $this->form_validation->set_rules('money', 'Money', 'trim|required');
            $params = array(
                              'caption' => $this->input->post('caption'),                            
                              'url' => $this->input->post('url'),                            
                              'startDate' => $this->input->post('startDate'),                            
                              'endDate' => $this->input->post('endDate'),                            
                              'name' => $this->input->post('name'),                            
                              'type' => $this->input->post('type'),                            
                              'remarks' => $this->input->post('remarks'),                            
                              'money' => $this->input->post('money'));
            if ($this->form_validation->run()) {
            $this->Ads_model->update_voucher($params, $value);
            $this->session->set_flashdata('success','<div class="alert alert-success">
                                          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                          Recored Updated Successfully.</div>');            
                                          redirect('update_voucher/index');
        }else{
            $this->session->set_flashdata('errors', validation_errors());
            $data['singleProduct'] = $this->Ads_model->update_voucher($value,$srno); 
            var_dump($data['singleProduct']);
            // $data['_view'] = 'admin-panel/voucher/edit';
            // $this->load->view('template/admin',$data);
          }
        }
    function delete_ads($id){
        $result = $this->Ads_model->delete_voucher($id);
        if ($result == true) {
            $this->session->set_flashdata('success', '<div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                     One Recored Deleted Successfully.</div>');
                    redirect('update_voucher/index');
            }
        }

    
}?>