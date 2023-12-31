<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Chrm extends CI_Controller {

    public $menu;

    function __construct() {
        parent::__construct();
        $this->db->query('SET SESSION sql_mode = ""');
        $this->load->library('auth');
        $this->load->library('session');
        $this->load->model('Hrm_model');
        $this->auth->check_admin_auth();
    }


    public function edit_timesheet($id) {
        $this->load->model('Hrm_model');
         $data['title']            = display('Payment_Administration');
     
        $data['employee_name'] = $this->Hrm_model->employee_name();
$data['designation'] = $this->db->select('designation')->from('employee_history')->where('id',$data['employee_name'][0]['id'])->get()->row()->designation;
        $data['payment_terms'] = $this->Hrm_model->get_payment_terms();
   

       $data['dailybreak'] = $this->Hrm_model->get_dailybreak();
       
       $data['duration'] = $this->Hrm_model->get_duration_data();

       $data['administrator'] = $this->Hrm_model->administrator_data();
          $data['time_sheet_data'] = $this->Hrm_model->time_sheet_data($id);
      // print_r($data);
   
         $content                  = $this->parser->parse('hr/edit_timesheet', $data, true);
         $this->template->full_admin_html_view($content);
        }

    public function employee_payslip_permission($id) {
        $this->load->model('Hrm_model');
         $data['title']            = display('Payment_Administration');
     
        $data['employee_name'] = $this->Hrm_model->employee_name();
$data['designation'] = $this->db->select('designation')->from('employee_history')->where('id',$data['employee_name'][0]['id'])->get()->row()->designation;
        $data['payment_terms'] = $this->Hrm_model->get_payment_terms();
   

       $data['dailybreak'] = $this->Hrm_model->get_dailybreak();
       
       $data['duration'] = $this->Hrm_model->get_duration_data();

       $data['administrator'] = $this->Hrm_model->administrator_data();
          $data['time_sheet_data'] = $this->Hrm_model->time_sheet_data($id);
     //  print_r($data);
   
         $content                  = $this->parser->parse('hr/emp_payslip_permission', $data, true);
         $this->template->full_admin_html_view($content);
        }
    




        public function manage_timesheet() {
            $this->load->model('Hrm_model');
             $data['title']            = display('manage_employee');
             $data['timesheet_list']    = $this->Hrm_model->timesheet_list();
             $content                  = $this->parser->parse('hr/timesheet_list', $data, true);
            $this->template->full_admin_html_view($content);
            }


    public function add_dailybreak_info(){
        $CI = & get_instance();
        $CI->auth->check_admin_auth();
        $CI->load->model('Hrm_model');
        $postData = $this->input->post('dailybreak_name');
        // print_r($postData);
        $data = $this->Hrm_model->insert_dailybreak_data($postData);
        echo json_encode($data);
    }
    
    











     
        



public function timesheed_inserted_data($id) {
           echo $id; die();
           $CI = & get_instance();
           $CC = & get_instance();
           $CA = & get_instance();
           $w = & get_instance();
           $w->load->model('Ppurchases');
           $CI->load->model('Invoices');
           $CI->load->model('Web_settings');
           $CA->load->model('invoice_design');
           $CC->load->model('invoice_content');
           $CI = & get_instance();
           $this->auth->check_admin_auth();
           $CI->load->model('Hrm_model');
              $timesheet_data = $CI->Hrm_model->timesheet_data($id);
              $setting=  $CI->Web_settings->retrieve_setting_editdata();
              $dataw = $CA->invoice_design->retrieve_data();
              $datacontent = $CC->invoice_content->retrieve_data();
               $data=array(
               'curn_info_default' =>$curn_info_default[0]['currency_name'],
               'currency'  =>$currency_details[0]['currency'],
               'header'=> $dataw[0]['header'],
               'logo'=> $setting[0]['invoice_logo'],
               'color'=> $dataw[0]['color'],
               'template'=> $dataw[0]['template'],
              'first_name'      => $timesheet_data[0]['first_name'],
               'last_name'     => $timesheet_data[0]['last_name'],
               'designation'   => $timesheet_data[0]['designation'],
               'phone'            => $timesheet_data[0]['phone'],
               'rate_type' => $timesheet_data[0]['rate_type'],
               'hrate' => $timesheet_data[0]['hrate'],
               'email'=> $timesheet_data[0]['email'],
               'blood_group'=> $timesheet_data[0]['blood_group'],
               'social_security_number'=> $timesheet_data[0]['social_security_number'],
               'routing_number'=> $timesheet_data[0]['routing_number'],
               'address_line_1'=> $timesheet_data[0]['address_line_1'],
               'address_line_2'=> $timesheet_data[0]['address_line_2'],
               'country'=> $timesheet_data[0]['country'],
               'city'=> $timesheet_data[0]['city'],
               'zip'=> $timesheet_data[0]['zip'],
               'company'=> $datacontent,
           );
            // print_r($data);
            print_r($dataw[0]['color']);
            // $timesheet_data[0]['first_name']
       $content = $this->load->view('invoice/employe_timesheet_html', $data, true);
       $this->template->full_admin_html_view($content);
       }

     //Designation form


     public function pay_slip1() {

        $CC = & get_instance();
        $CI = & get_instance();


        $CC->load->model('invoice_content');
        $CI->load->model('Hrm_model');



    $data['title'] = display('pay_slip');

    $datacontent = $CC->invoice_content->retrieve_data();
    
    $employeeinfo = $CC->Hrm_model->employeeinfo();

    print_r($employeeinfo);
    
    $data=array(
    'company'=> $datacontent,
    // 'business_name' => $datacontent,
    'business_name'=> $datacontent[0]['business_name'],
    'address'=> $datacontent[0]['address'],
    'email'=> $datacontent[0]['email'],
    'phone'=> $datacontent[0]['phone'],

    'templ_name'=> $employeeinfo[0]['templ_name'],
    'job_title'=> $employeeinfo[0]['job_title'],
   

      );

// print_r($data); die();

    $content = $this->parser->parse('hr/pay_slip', $data, true);
    $this->template->full_admin_html_view($content);
    }


// Pdf Pass Data List
public function time_list($timesheet_id = null)
{
   $CI = & get_instance();
   $CI->load->model('invoice_content');
   $datacontent = $CI->invoice_content->retrieve_data();
   print_r($datacontent);
   $data = array(
    'company' =>  $datacontent
   );
   $content = $this->parser->parse('hr/pay_slip', $data, true);
    $this->template->full_admin_html_view($content);
}


// Manage Pay Slip Lists
public function pay_slip_list() 
{
    $data['title'] = display('pay_slip_list');
    $data['timesheet_list'] = $this->db->select('*')->from('timesheet_info')->get()->result_array();
    // print_r($data['timesheet_list']); 
    $content = $this->parser->parse('hr/pay_slip_list', $data, true);
    $this->template->full_admin_html_view($content);
}

 


    public function pay_slip_list() {
    $data['title'] = display('pay_slip_list');
    $content = $this->parser->parse('hr/pay_slip_list', $data, true);
    $this->template->full_admin_html_view($content);
    }


public function add_state(){
  $CI = & get_instance();
$state_name = $this->input->post('state_name');
        $data=array(
             'state' => $state_name,
             'created_by' => $this->session->userdata('user_id')
        );
      $this->db->insert('state_and_tax', $data);
      $this->session->set_userdata(array('message' => 'New State Added Successfully'));
     redirect("Chrm/payroll_setting");
}
public function add_state_tax(){
  $CI = & get_instance();
$tx = $this->input->post('state_tax_name');
$selected_state = $this->input->post('selected_state');

 $this->db->where('state', $selected_state);
 $this->db->set('tax', "CONCAT(tax,',','".$tx."')", FALSE); 
 $this->db->update('state_and_tax'); 
 $query = $this->db->get();

$sql1="UPDATE state_and_tax
SET tax = TRIM(BOTH ',' FROM tax)";
$query1=$this->db->query($sql1);
 //echo $this->db->last_query();
 $this->session->set_userdata(array('message' =>'New Tax Has been assigned Successfully'));
 redirect("Chrm/payroll_setting");
}

public function add_designation_data(){
        $this->load->model('Hrm_model');
        $postData = $this->input->post('designation');
        $data = $this->Hrm_model->designation_info($postData);
        echo json_encode($data);
    }




        public function add_office_loan() {
              $CI = & get_instance();
        $CI->load->model('Web_settings');
          $CI->load->model('Invoices');
         $CI->load->model('Settings');
$data['person_list'] =  $CI->Settings->office_loan_person();
  $bank_name = $CI->db->select('bank_id,bank_name')
        ->from('bank_add')
        ->get()
        ->result_array();
         $data['bank_list']   =  $CI->Web_settings->bank_list();
           $paytype=$CI->Invoices->payment_type();
    $CI = & get_instance();
    $CI->load->model('Web_settings');
       $data['payment_typ']  =$paytype;
         $data['bank_name']  =$bank_name;
    $currency_details    = $CI->Web_settings->retrieve_setting_editdata();
             $data['title'] = display('add_office_loan');
             $data['currency']=  $currency_details[0]['currency'];
    $content = $this->parser->parse('hr/add_office_loan', $data, true);
    $this->template->full_admin_html_view($content);

    }


    public function add_expense_item()
    {
        $CI = & get_instance();
        $CI->load->model('Web_settings');
        $currency_details    = $CI->Web_settings->retrieve_setting_editdata();
        $data['title'] = display('expense_item_form');
        $data['currency']=  $currency_details[0]['currency'];
    $content = $this->parser->parse('hr/expense_item_form', $data, true);
    $this->template->full_admin_html_view($content);
    }



    public function tax_list() {
    $data['title'] = display('tax_list');
    $content = $this->parser->parse('hr/payroll_setting', $data, true);
    $this->template->full_admin_html_view($content);
    }

     public function payroll_setting() {
    $data['title'] = display('federal_taxes');
     $data['states_list'] = $this->db->select("state,tax")->from('state_and_tax')->where('created_by',$this->session->userdata('user_id'))->get()->result_array();
    $content = $this->parser->parse('hr/federal_taxes', $data, true);
    $this->template->full_admin_html_view($content);
    }
public function delete_tax() {
  
$tax= $this->input->post('tax');
$state= $this->input->post('state');
 $this->load->model('Hrm_model');
    $this->Hrm_model->delete_tax($tax,$state);
        $this->session->set_flashdata('show', display('successfully_delete'));
      
    
     
        // alert('Successfully Delete');
     // redirect('Cinvoice/manage_invoice');
  //  $this->session->set_userdata(array('message' => display('successfully_delete')));
     redirect("Chrm/payroll_setting");
}




public function getemployee_data(){
    $CI = & get_instance();
    $this->auth->check_admin_auth();
    $CI->load->model('Hrm_model');
    $value = $this->input->post('value',TRUE);
    $customer_info = $CI->Hrm_model->getemp_data($value);
 
    echo json_encode($customer_info);
    
}








public function add_state_taxes_detail($tax=0) {
   $tax= str_replace("_"," ",$tax);
    $data['taxinfo'] = $this->db->select("*")->from('state_localtax')->where('tax',$tax)->get()->result_array();
    // $data['taxinfo'] = $this->db->select("*")->from('federal_tax')->where('tax',$tax)->get()->result_array();
    // print_r($data['taxinfo']); 
    // echo $this->db->last_query(); die();

    
    $data['title'] = display('add_taxes_detail');
    $content = $this->parser->parse('hr/add_state_tax_detail', $data, true);
    $this->template->full_admin_html_view($content);
    // echo json_encode($data);
    }

   public function add_taxes_detail() {
     $tax = $this->input->post('tax');
    $data['taxinfo'] = $this->db->select("*")->from('federal_tax')->where('tax','Federal Income tax')->get()->result_array();
    // $data['taxinfo'] = $this->db->select("*")->from('federal_tax')->where('tax',$tax)->get()->result_array();
    // print_r($data['taxinfo']); die();
    // echo $this->db->last_query(); die();
    $data['title'] = display('add_taxes_detail');
    $content = $this->parser->parse('hr/add_taxes_detail', $data, true);
    $this->template->full_admin_html_view($content);
    // echo json_encode($data);
    }
    public function socialsecurity_detail() {
    // $tax = $this->input->post('tax');
    $data['taxinfo'] = $this->db->select("*")->from('federal_tax')->where('tax','Social Security')->get()->result_array();
    $data['title'] = display('add_taxes_detail');
 
    $content = $this->parser->parse('hr/social_security_list', $data, true);
    $this->template->full_admin_html_view($content);
    }
    public function medicare_detail() {
    $data['taxinfo'] = $this->db->select("*")->from('federal_tax')->where('tax','Medicare')->get()->result_array();
    $data['title'] = display('add_taxes_detail');
    $content = $this->parser->parse('hr/medicare_list', $data, true);
    $this->template->full_admin_html_view($content);
    }
    public function federalunemployment_detail() {
    $data['taxinfo'] = $this->db->select("*")->from('federal_tax')->where('tax','Federal unemployment')->get()->result_array();
    $data['title'] = display('add_taxes_detail');
    $content = $this->parser->parse('hr/federalunemployment_list', $data, true);
    $this->template->full_admin_html_view($content);
    }


     public function add_timesheet() {
    $data['title'] = display('add_timesheet');
    
        $this->load->model('Hrm_model');

        $data['employee_name'] = $this->Hrm_model->employee_name();

         $data['payment_terms'] = $this->Hrm_model->get_payment_terms();
    

        $data['dailybreak'] = $this->Hrm_model->get_dailybreak();
        
        $data['duration'] = $this->Hrm_model->get_duration_data();
    
        $content = $this->parser->parse('hr/add_timesheet', $data, true);
        $this->template->full_admin_html_view($content);
        }
    

        public function add_durat_info(){
            $CI = & get_instance();
            $CI->auth->check_admin_auth();
            $CI->load->model('Hrm_model');
            $postData = $this->input->post('duration_name');
            $data = $this->Hrm_model->insert_duration_data($postData);
            echo json_encode($data);
        }
    // $content = $this->parser->parse('hr/add_timesheet', $data, true);
    // $this->template->full_admin_html_view($content);
    // }

    public function add_adm_data(){
        $CI = & get_instance();
        $CI->auth->check_admin_auth();
        $CI->load->model('Hrm_model');
        $postData = $this->input->post('data_name');
        $postData = $this->input->post('data_adres');

        //  print_r($postData); die();

        $data = $this->Hrm_model->insert_adsrs_data($postData);
        echo json_encode($data);
    }



    public function insert_data_adsr(){
        $CI = & get_instance();
        $CI->auth->check_admin_auth();
        $CI->load->model('Hrm_model');
    $data = array(
        'adm_name'   => $this->input->post('adms_name',TRUE),
        'adm_address'=> $this->input->post('address',TRUE),
        'create_by'       => $this->session->userdata('user_id'),
  );
//   print_r($data); die();
    // $result = $this->Customers->customer_entry($data);
    $data = $this->Hrm_model->insert_adsrs_data($data);
    echo json_encode($data);
    }








    //Designation form
    public function add_designation() {
    $data['title'] = display('add_designation');
    $content = $this->parser->parse('hr/employee_type', $data, true);
    $this->template->full_admin_html_view($content);
    }
    // create designation
    public function create_designation(){
    $this->form_validation->set_rules('designation',display('designation'),'required|max_length[100]');
    $this->form_validation->set_rules('details',display('details'),'max_length[250]');
        #-------------------------------#
        if ($this->form_validation->run()) {
            $postData = [
                'id'            => $this->input->post('id',true),
                'designation'   => $this->input->post('designation',true),
                'details'       => $this->input->post('details',true),
            ];   
           if(empty($this->input->post('id',true))){
            if ($this->Hrm_model->create_designation($postData)) { 
                $this->session->set_flashdata('message', display('save_successfully'));
            } else {
                $this->session->set_flashdata('error_message',  display('please_try_again'));
            }
        }else{
             if ($this->Hrm_model->update_designation($postData)) { 
                $this->session->set_flashdata('message', display('successfully_updated'));
            } else {
                $this->session->set_flashdata('error_message',  display('please_try_again'));
            }
           
        }
  redirect("Chrm/manage_designation");
        }
         redirect("Chrm/add_designation");
    }


    //Manage designation
    public function manage_designation() {
        $this->load->model('Hrm_model');
     $data['title']            = display('manage_designation');
     $data['designation_list'] = $this->Hrm_model->designation_list();
     $content                  = $this->parser->parse('hr/designation_list', $data, true);
    $this->template->full_admin_html_view($content);
    }

    //designation Update Form
    public function designation_update_form($id) {
    $this->load->model('Hrm_model');
     $data['title']            = display('designation_update_form');
     $data['designation_data'] = $this->Hrm_model->designation_editdata($id);
     $content                  = $this->parser->parse('hr/employee_type', $data, true);
     $this->template->full_admin_html_view($content);
    }

    // designation delete
    public function designation_delete($id) {
    $this->load->model('Hrm_model');
    $this->Hrm_model->delete_designation($id);
    $this->session->set_userdata(array('message' => display('successfully_delete')));
     redirect("Chrm/manage_designation");
    }
    // ================== Employee part ============================= 
  public function add_employee() {
    $this->auth->check_admin_auth();
    $this->load->model('Hrm_model');
    $data['title'] = display('add_employee');
    $data['desig'] = $this->Hrm_model->designation_dropdown();
    $data['paytype'] = $this->Hrm_model->paytype_dropdown();
    $data['desig'] = $this->Hrm_model->designation_dropdown();
    // print_r( $data['desig'] ); die();
    $content = $this->parser->parse('hr/employee_form', $data, true);
    $this->template->full_admin_html_view($content);
    }

   public function employee_create()
    {
        $config = array(
            'upload_path' => "assets/images/profile/",
            'allowed_types' => "gif|jpg|png|jpeg|pdf",
            'encrypt_name' => true
        );
        $this->load->library('upload',$config);
        if($this->upload->do_upload('image'))
        {
            $view = $this->upload->data();
            $image = base_url($config['upload_path'] . $view['file_name']);
        }else{
            $view = $this->upload->data();
            $image = base_url($config['upload_path'] . $view['file_name']);
        }
        $data_empolyee['last_name'] = $this->input->post('last_name');
        $data_empolyee['designation'] = $this->input->post('designation');
        $data_empolyee['first_name'] = $this->input->post('first_name');
        $data_empolyee['phone'] = $this->input->post('phone');
        $data_empolyee['image'] = $image;
        $data_empolyee['rate_type'] = $this->input->post('rate_type');
        $data_empolyee['email'] = $this->input->post('email');
        $data_empolyee['hrate'] = $this->input->post('hrate');
        $data_empolyee['address_line_1'] = $this->input->post('address_line_1');
        $data_empolyee['address_line_2'] = $this->input->post('address_line_2');
        $data_empolyee['blood_group'] = $this->input->post('blood_group');
        $data_empolyee['social_security_number'] = $this->input->post('ssn');
        $data_empolyee['routing_number'] = $this->input->post('routing_number');
        $data_empolyee['country'] = $this->input->post('country');
        $data_empolyee['city'] = $this->input->post('city');
        $data_empolyee['zip'] = $this->input->post('zip');
    //     echo '<pre>';
    //    print_r($data_empolyee); exit();
    //    echo '</pre>';
       $this->db->insert('employee_history', $data_empolyee);
    //    echo $this->db->last_query(); exit();
       $this->session->set_flashdata('message', display('save_successfully'));
       redirect(base_url('Chrm/add_employee'));
    }


    // create employee
//     public function create_employee(){
//         $this->load->model('Hrm_model');
        
//         echo '<pre>';
//        print_r($_POST);
//         echo '</pre>';
//         exit();

//      $this->form_validation->set_rules('first_name',display('first_name'),'required|max_length[100]');
//       $this->form_validation->set_rules('last_name',display('last_name'),'required|max_length[100]');
//       $this->form_validation->set_rules('designation',display('designation'),'required|max_length[100]');
//     $this->form_validation->set_rules('phone',display('phone'),'max_length[20]');
//      $this->form_validation->set_rules('hrate',display('salary'),'max_length[20]');
//         #-------------------------------#
//         if ($this->form_validation->run()) {
//          if ($_FILES['image']['name']) {
//             $config['upload_path'] = 'assets/images/employee/';
//             $config['allowed_types'] = 'gif|jpg|png';
//             $config['max_size'] = "*";
//             $config['max_width'] = "*";
//             $config['max_height'] = "*";
//             $config['encrypt_name'] = TRUE;

//             $this->load->library('upload', $config);
//             if (!$this->upload->do_upload('image')) {
//                 $error = array('error' => $this->upload->display_errors());
//                 $this->session->set_userdata(array('error_message' => $this->upload->display_errors()));
//                 redirect(base_url('Chrm/add_employee'));
//             } else {
//                 $image = $this->upload->data();
//                 $image_url = base_url() . "assets/images/employee/" . $image['file_name'];
//             }
//         }


//          $postData = [
//                 'first_name'    => $this->input->post('first_name',true),
//                 'last_name'     => $this->input->post('last_name',true),
//                 'designation'   => $this->input->post('designation',true),
//                 'phone'         => $this->input->post('phone',true),
//                 'image'         => $image_url,
//                 'rate_type'     => $this->input->post('rate_type',true),
//                 'email'         => $this->input->post('email',true),
//                 'hrate'         => $this->input->post('hrate',true),
//                 'address_line_1'=> $this->input->post('address_line_1',true),
//                 'address_line_2'=> $this->input->post('address_line_2',true),
//                 'blood_group'   => $this->input->post('blood_group',true),
//                 'social_security_number'   => $this->input->post('social_security_number',true),
//                 'routing_number'   => $this->input->post('routing_number',true),
//                 'country'       => $this->input->post('country',true),
//                 'city'          => $this->input->post('city',true),
//                 'zip'           => $this->input->post('zip',true),
//             ];   

//              if ($this->Hrm_model->create_employee($postData)) { 
//                 $this->session->set_flashdata('message', display('save_successfully'));
//                  redirect("Chrm/manage_employee");
//             } else {
//                 $this->session->set_flashdata('error_message',  display('please_try_again'));
//                  redirect("Chrm/manage_employee");
//             }
//               } else {
//                 $this->session->set_flashdata('error_message',  display('please_try_again'));
//                  redirect("Chrm/add_employee");
//             }
//     }

//     // Manage employee
    public function manage_employee() {
    $this->load->model('Hrm_model');
     $data['title']            = display('manage_employee');
     $data['employee_list']    = $this->Hrm_model->employee_list();

     print_r($data['employee_list']);

     $content                  = $this->parser->parse('hr/employee_list', $data, true);
    $this->template->full_admin_html_view($content);
    }


    // Employee Update form
   public function employee_update_form($id) {
    $this->load->model('Hrm_model');
     $data['title']            = display('employee_update');
     $data['employee_data']    = $this->Hrm_model->employee_editdata($id);
     $data['desig']            = $this->Hrm_model->designation_dropdown();
     $content                  = $this->parser->parse('hr/employee_updateform', $data, true);
     $this->template->full_admin_html_view($content);
    }





 
    







//     // Update employee
    public function update_employee(){
        $this->load->model('Hrm_model');

         if ($_FILES['image']['name']) {
            $config['upload_path'] = './my-assets/image/employee/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg|JPEG|GIF|JPG|PNG';
            $config['max_size'] = "*";
            $config['max_width'] = "*";
            $config['max_height'] = "*";
            $config['encrypt_name'] = TRUE;
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('image')) {
                $error = array('error' => $this->upload->display_errors());
                $this->session->set_userdata(array('error_message' => $this->upload->display_errors()));
                redirect(base_url('Chrm/add_employee'));
            } else {
                $image = $this->upload->data();
                $image_url = base_url() . "my-assets/image/employee/" . $image['file_name'];
            }
        }
        $headname = $this->input->post('id',true).'-'.$this->input->post('old_first_name',true).''.$this->input->post('old_last_name',true);
         $postData = [
                'id'            => $this->input->post('id',true),
                'first_name'    => $this->input->post('first_name',true),
                'last_name'     => $this->input->post('last_name',true),
                'designation'   => $this->input->post('designation',true),
                'phone'         => $this->input->post('phone',true),
                'image'         => (!empty($image_url) ? $image_url :$this->input->post('old_image',true)),
                'rate_type'     => $this->input->post('rate_type',true),
                'email'         => $this->input->post('email',true),
                'hrate'         => $this->input->post('hrate',true),
                'address_line_1'=> $this->input->post('address_line_1',true),
                'address_line_2'=> $this->input->post('address_line_2',true),
                'blood_group'   => $this->input->post('blood_group',true),
                'country'       => $this->input->post('country',true),
                'city'          => $this->input->post('city',true),
                'zip'           => $this->input->post('zip',true),
            ];   

             if ($this->Hrm_model->update_employee($postData,$headname)) { 
                $this->session->set_flashdata('message', display('successfully_updated'));
            } else {
                $this->session->set_flashdata('error_message',  display('please_try_again'));
            }
             redirect("Chrm/manage_employee");
    }
    // delete employee
    public function employee_delete($id) {
    $this->load->model('Hrm_model');
    $this->Hrm_model->delete_employee($id);
    $this->session->set_userdata(array('message' => display('successfully_delete')));
   redirect("Chrm/manage_employee");
    }


    public function employee_details($id) {
    $this->load->model('Hrm_model');
     $data['title']            = display('employee_update');
     $data['row']              = $this->Hrm_model->employee_details($id);
     $content                  = $this->parser->parse('hr/resumepdf', $data, true);
     $this->template->full_admin_html_view($content);
    }
    

    // Expense List Data
    public function expense_list()
    {
       $data['expen_list'] = $this->db->select('*')->from('expense')->get()->result_array();
       // print_r($data['expen_list']); 
       $content = $this->parser->parse('hr/expense_list', $data, true);
       $this->template->full_admin_html_view($content);
    }

    // Delete Expense
    public function delete_expense($id = null)
    {
        // echo $id; die();
        $this->db->where('id', $id);
        $this->db->delete('expense');
        redirect('Chrm/expense_list');
        $this->template->full_admin_html_view($content);
    }

    // Edit Expense Data
    public function edit_expense($id)
    {  
       $this->load->library('lsettings');
       $content = $this->lsettings->expense_show_by_id($id);
       $this->template->full_admin_html_view($content);  
    }

    // Pdf Download Expenses
    public function expense_download($id)
    {
        $CI = & get_instance();
        $CC = & get_instance();
        $CA = & get_instance();
        $CI->load->model('Web_settings');
        $CI->load->model('Hrm_model');
        $CA->load->model('invoice_design');
        $CC->load->model('invoice_content');


        $expense_pdf = $CI->Hrm_model->pdf_expense($id);
         // print_r($expense_pdf); 

        $setting=  $CI->Web_settings->retrieve_setting_editdata();
        $dataw = $CA->invoice_design->retrieve_data();
        // print_r($dataw); die();
        $datacontent = $CC->invoice_content->retrieve_data();
        $currency_details = $CI->Web_settings->retrieve_setting_editdata();
        $curn_info_default = $CI->db->select('*')->from('currency_tbl')->where('icon',$currency_details[0]['currency'])->get()->result_array();

        $data=array(
            'curn_info_default' =>$curn_info_default[0]['currency_name'],
            'currency'  =>$currency_details[0]['currency'],
            'header'=> $dataw[0]['header'],
            'logo'=> $setting[0]['invoice_logo'],
            'color'=> $dataw[0]['color'],
            'template'=> $dataw[0]['template'],
            'company'=> $datacontent,
            'expense_pdf' => $expense_pdf
        );

        $content = $this->load->view('hr/expense_html_pdf', $data, true);

        $this->template->full_admin_html_view($content);
    }


    public function update_expense($id)
    {
       $this->load->library('lsettings');
       $content = $this->lsettings->update_expense_id($id);
       $this->template->full_admin_html_view($content);
        redirect('Chrm/expense_list');
    }



   // Expense Insert data
    public function create_expense()
    {
        $this->form_validation->set_rules('expense_name',display('expense_name'),'required|max_length[100]');
        $this->form_validation->set_rules('expense_date',display('expense_date'),'required|max_length[100]');
        $this->form_validation->set_rules('expense_payment_date',display('expense_payment_date'),'required|max_length[100]');

         $postData = [
            'expense_name'    => $this->input->post('expense_name',true),
            'expense_date'     => $this->input->post('expense_date',true),
            'expense_amount'   => $this->input->post('expense_amount',true),
            'total_amount'         => $this->input->post('total_amount',true),
            'expense_payment_date'     => $this->input->post('expense_payment_date',true),
            'description'         => $this->input->post('description',true),
            'created_by' => $this->session->userdata('user_id')
        ];

        $this->db->insert('expense',$postData);
        // echo $this->db->last_query(); die();
        redirect(base_url('Chrm/expense_list'));
    }




  // create employee
  public function create_employee(){
    $this->load->model('Hrm_model');
    


  $this->form_validation->set_rules('first_name',display('first_name'),'required|max_length[100]');
  $this->form_validation->set_rules('last_name',display('last_name'),'required|max_length[100]');
  $this->form_validation->set_rules('designation',display('designation'),'required|max_length[100]');
  $this->form_validation->set_rules('phone',display('phone'),'max_length[20]');
  $this->form_validation->set_rules('hrate',display('salary'),'max_length[20]');
    #-------------------------------#
    if ($this->form_validation->run()) {
     if ($_FILES['image']['name']) {
        $config['upload_path'] = 'assets/images/employee/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = "*";
        $config['max_width'] = "*";
        $config['max_height'] = "*";
        $config['encrypt_name'] = TRUE;

        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('image')) {
            $error = array('error' => $this->upload->display_errors());
            $this->session->set_userdata(array('error_message' => $this->upload->display_errors()));
            // redirect(base_url('Chrm/add_employee'));
        } else {
            $image = $this->upload->data();
            $image_url = base_url() . "assets/images/employee/" . $image['file_name'];
        }
    }


     $postData = [
            'first_name'    => $this->input->post('first_name',true),
            'last_name'     => $this->input->post('last_name',true),
            'designation'   => $this->input->post('designation',true),
            'phone'         => $this->input->post('phone',true),
            'image'         => $image_url,
            'rate_type'     => $this->input->post('rate_type',true),
            'email'         => $this->input->post('email',true),
            'hrate'         => $this->input->post('hrate',true),
            'address_line_1'=> $this->input->post('address_line_1',true),
            'address_line_2'=> $this->input->post('address_line_2',true),
            'blood_group'   => $this->input->post('blood_group',true),
            'social_security_number'   => $this->input->post('social_security_number',true),
            'routing_number'   => $this->input->post('routing_number',true),
            'country'       => $this->input->post('country',true),
            'city'          => $this->input->post('city',true),
            'zip'           => $this->input->post('zip',true),
        ];  

        // $this->db->insert('acc_coa',$postData);
        // redirect(base_url('Csettings/bank_list'));



        // pritn

         if ($this->Hrm_model->create_employee($postData)) { 
            $this->session->set_flashdata('message', display('save_successfully'));
             redirect("Chrm/manage_employee"); 
        } else {
            $this->session->set_flashdata('error_message',  display('please_try_again'));
             redirect("Chrm/manage_employee");
        }
          } else {
            $this->session->set_flashdata('error_message',  display('please_try_again'));
             redirect("Chrm/add_employee");
        }
         
}








}
