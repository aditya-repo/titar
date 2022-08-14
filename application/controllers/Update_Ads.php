<?php

class Update_Ads extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Ads_model');
    }

    function index()
        {
            $this->load->model('Ads_model');
            $data['ads'] = $this->Ads_model->fetch_ads();
            $data['_view'] = 'admin-panel/ads/index';
            $this->load->view('template/admin',$data);
        }
        
    function add_ads()
        {
            $this->load->library('form_validation');
            $this->form_validation->set_rules('caption', 'Caption', 'trim|required');
            $this->form_validation->set_rules('url', 'URL', 'trim|required');
            $this->form_validation->set_rules('date', 'Date', 'trim|required');
            $query = $this->Ads_model->last_row();
            $query = $query['0']->sid + 1;

            $filename = $query;
            $config['file_name']            = $filename;
            $config['upload_path']          = './resources/img/ads';
            $config['allowed_types']        = 'jpg|jpeg';
            $config['max_size']             = 5000;
            $config['max_width']            = 10000;
            $config['max_height']           = 10000;
            $config['overwrite']           = TRUE;
            $this->load->library('upload', $config);
                if ( ! $this->upload->do_upload('upl_file')){
                  $errors = $this->upload->display_errors();
                  $this->session->set_flashdata('error', $errors);
                  $data['_view'] = 'admin-panel/ads/index';
                  $this->load->view('template/admin',$data);
                }else{
                  $data = array('upload_data' => $this->upload->data());}
                    if ($this->form_validation->run()) {
                        $params = array(
                              'caption' => $this->input->post('caption'),                            
                              'url' => $this->input->post('url'),                            
                              'date' => $this->input->post('date'));                            
                              $this->Ads_model->insert_ads($params);
                              $this->session->set_flashdata('success','<div class="alert alert-success">
                              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                              New Recored Added Successfully.</div>');
                              redirect('update_ads/index');
                    }else{
                      echo "Something Went Wrong";
                        }
                }
    function edit_ads($value){
        $data['singleads'] = $this->Ads_model->edit_single_ads($value); 
        $data['_view'] = 'admin-panel/ads/edit';
        $this->load->view('template/admin',$data);
                            }
    function update_ads($value){
        $srno = $this->input->post('sid');
            $filename = $srno;
            $config['file_name']            = $filename;
            $config['upload_path']          = './resources/img/ads';
            $config['allowed_types']        = 'jpg|jpeg';
            $config['max_size']             = 5000;
            $config['max_width']            = 10000;
            $config['max_height']           = 10000;
            $config['overwrite']           = TRUE;
            $this->load->library('upload', $config);
                if ( ! $this->upload->do_upload('upl_file')){
                    $errors = $this->upload->display_errors();
                    $this->session->set_flashdata('error', $errors);
                    $data['_view'] = 'admin-panel/ads/index';
                    $this->load->view('template/admin',$data);
                  }else{
                    $data = array('upload_data' => $this->upload->data());
                  }
            $this->load->library('form_validation');
            $this->form_validation->set_rules('url', 'Notice Details', 'trim|required');
            $this->form_validation->set_rules('caption', 'Notice Details', 'trim|required');
            $this->form_validation->set_rules('date', 'Date', 'trim|required');
            if ($this->form_validation->run()) {
            $params = array(
            'url' => $this->input->post('url'), 'caption' => $this->input->post('caption'),
             'date' => $this->input->post('date'));
            $this->Ads_model->update_ads($params, $value);
            $this->session->set_flashdata('success','<div class="alert alert-success">
                                          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                          Recored Updated Successfully.</div>');            
                                          redirect('update_ads/index');
        }else{
            $this->session->set_flashdata('errors', validation_errors());
            $data['singleProduct'] = $this->Ads_model->update_ads($value); 
            $data['_view'] = 'admin-panel/ads/edit';
            $this->load->view('template/admin',$data);
            return false;
          }
        }
    function delete_ads($id){
        $result = $this->Ads_model->delete_ads($id);
        if ($result == true) {
            $this->session->set_flashdata('success', '<div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                     One Recored Deleted Successfully.</div>');
                    redirect('update_ads/index');
            }
        }

    
}?>