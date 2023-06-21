<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Cweb_setting extends CI_Controller {

    public $menu;

    function __construct() {
        parent::__construct();
        $this->load->library('auth');
        $this->load->library('lweb_setting');
        $this->load->library('session');
        $this->load->library('ciqrcode');
        $this->load->model('Web_settings');
        $this->auth->check_admin_auth();
        $this->template->current_menu = 'web_setting';

      
    }

    public function inbox_delete()
    {
        // $id = $this->input->post('id');
        // $Getfiles = file_get_contents("assets/Email/inbox.txt");
        // $files = file("assets/Email/inbox.txt");
        // $split = explode("\n",$Getfiles);
        // foreach ($split as $key => $value) {
        // $inbox_split = explode("|",$value);
        //   if(trim($inbox_split[0] == trim($id))){
        //     // echo $value;
        //     unset($value);
        //   }
        // }
        // file_put_contents("inbox.txt", implode("\n", $files));
        // echo json_encode("Successfully Deleted!");
        $file = 'assets/Email/inbox.txt';  // Replace with your file path
        $specificWord = $this->input->post('id');  // The specific word to search for (change as needed)
        // Open the original file in read mode
        $handle = fopen($file, 'r');
        if ($handle) {
            $lines = [];
            // Read the original file line by line
            while (($line = fgets($handle)) !== false) {
                // If the line doesn't contain the specific word, store it in the array
                if (strpos($line, $specificWord) === false) {
                    $lines[] = $line;
                }
            }
            // Close the file handle
            fclose($handle);
            // Open the file in write mode to overwrite its contents
            $handle = fopen($file, 'w');
            // Write the lines from the array to the file
            foreach ($lines as $line) {
                fwrite($handle, $line);
            }
            // Close the file handle
            fclose($handle);
            echo "Lines containing '$specificWord' have been unset from the file.";
        } else {
            echo "Unable to open the file.";
        }
    }
    public function trash_email()
    {
        $id = $this->input->post('Trashid');
        $this->db->where('id', $id);
        $delete = $this->db->delete('email_data');
        // echo $this->db->last_query();
        return $delete;
    }
    public function delete_email()
    {
        $CI = & get_instance();
        $CI->auth->check_admin_auth();
        $CI->load->model('Web_settings');
        $pad_id = $this->input->post('id');
        $data_email = array(
          'is_deleted' => 1,
        );
        $this->db->where('pad_id', $pad_id);
       $this->db->update('email_data', $data_email);
        echo $this->db->last_query(); die();
    }
    public function update_email()
	{
		$pad_id = $this->input->post('pad_id');
        $email = $this->input->post('email');
        $message = $this->input->post('message');
	    $data = array(
	      'pad_id' => $pad_id,
	    );
        $this->db->where('to_email',$email);
        $this->db->where('message',$message);
        $this->db->update('email_data', $data);
        $this->template->full_admin_html_view($mail_setting);
	}
    // public function sendemail()
    // {
    //     $CI = & get_instance();
    //     $CI->load->library('phpmailer_lib');
    //     $data = array(
    //         'title' => display('Compose')
    //     );
    //     $content = $CI->parser->parse('web_setting/email_sendcus.php', $data, true);
    //     $this->template->full_admin_html_view($content);
    // }

    function invoice_design()
{
   $content = $this->lweb_setting->invoice_design();
        $this->template->full_admin_html_view($content);

   
}
    function update_templates()
{
      $this->db->select('*');

    $this->db->from('invoice_design');

    $this->db->where('uid', $this->session->userdata('user_id'));
  
 $query = $this->db->get()->num_rows();

if (empty($query) ) {
 
	if($_REQUEST['input']=='header')
			{
  $data=array(
        'header' => $_REQUEST['value'],
        'uid' => $_REQUEST['id']
    );
      $this->db->insert('invoice_design', $data);
        // echo $this->db->last_query();
   
	}
			if($_REQUEST['input']=='color')
			{
                  $data=array(
        'color' => $_REQUEST['value'],
        'uid' => $_REQUEST['id']
    );
    //   $this->db->insert('invoice_design', $data);
    //          echo $this->db->last_query();

	}
             $this->db->insert('invoice_design', $data);
  
		}
		else
		{
			
			if($_REQUEST['input']=='header')
			{
			//	 $query='update invoice_design set header="'.$_REQUEST['value'].'" where uid='.$_REQUEST['id'];
 $data=array(
        'header' => $_REQUEST['value'],
        'uid' => $_REQUEST['id']
    );
 $this->db->where('uid', $_REQUEST['id']);
            $this->db->update('invoice_design', $data);
            //  echo $this->db->last_query();
			}
			if($_REQUEST['input']=='color')
			{
                 $data=array(
        'color' => $_REQUEST['value'],
        'uid' => $_REQUEST['id']
    );
     $this->db->where('uid', $_REQUEST['id']);
            $this->db->update('invoice_design', $data);
        
			}
		}
       

		// $sql=mysqli_query($con,$query);
		// if($sql)
		// {
		 //	echo 'Updated';
		// }

}
function invoice_content()
{
   $content = $this->lweb_setting->invoice_content();
        $this->template->full_admin_html_view($content);
}










function updateinvoice2()
{

    $id=$_SESSION['user_id'];
    $this->db->select('*');
     $this->db->from('invoice_content');

    $this->db->where('uid', $id );
     $query = $this->db->get();

    if ( $query->num_rows() > 0 )
    {
        $sql='update invoice_content set 
        business_name="'.$_REQUEST['name'].'", 
        phone="'.$_REQUEST['phone'].'", 
        email="'.$_REQUEST['email'].'", 
        reg_number="'.$_REQUEST['regno'].'", 
        website="'.$_REQUEST['website'].'", 
        address="'.$_REQUEST['address'].'"
        where uid=
        '.$id;
    }

else
{
   
     $sql = "insert into invoice_content(business_name,phone,email,reg_number,website,address,uid) VALUES(
   '".$_REQUEST['name']."',
   '".$_REQUEST['phone']."',
   '".$_REQUEST['email']."',
   '".$_REQUEST['regno']."',
   '".$_REQUEST['website']."',
   '".$_REQUEST['address']."',
   '".$_SESSION['user_id']."'

) ";
}

$query=$this->db->query($sql);
if($query)
{
    ?>
    <script type="text/javascript">
        // alert('Updated');
        location.href='invoice_content';
    </script>
    <?php 
}



}




























    public function index() {
        $content = $this->lweb_setting->setting_add_form();
        $this->template->full_admin_html_view($content);
    }
    public function admin_user_mail_ids(){
         $val=$this->input->post('dataString');
           $CI = & get_instance();
           $CI->auth->check_admin_auth();
           $CI->load->model('Web_settings');
        $data = $CI->Web_settings->admin_user_mail_ids($val);
   echo json_encode($data);
   
       }
function email_template()
{
  $content = $this->lweb_setting->email_template();
        $this->template->full_admin_html_view($content);
}
public function insert_email() {
    $pdf=0;
    $pdf = $this->input->post('pdf',TRUE);
    $greeting =$this->input->post('select1',TRUE).'_'.$this->input->post('select2',TRUE);
    
    $id=$_SESSION['user_id'];

    $this->db->select('*');

    $this->db->from('invoice_email');

    $this->db->where('uid', $id);

    $query = $this->db->get();
    if ($query->num_rows() > 0) {
        $this->db->set('pdf_attached', $pdf);
        $this->db->set('subject',$this->input->post('subject',TRUE));
        $this->db->set('greeting',  $greeting);
        $this->db->set('message', $this->input->post('message',TRUE));
        $this->db->where('uid', $id);
        $this->db->update('invoice_email');
    }else{
        $data = array(
        'pdf_attached'=>$this->input->post('pdf'),
        'subject'=>$this->input->post('subject'),
        'greeting'=> $greeting,
         'message'  => $this->session->userdata('message'),
         'uid'   => $id
     );

     $this->db->insert('nvoice_email', $data);
     echo $this->db->last_query();
    }

}

    public function email_setting() {
        $CI = & get_instance();
        $id = $this->session->userdata('user_id');
        $view_email = $this->db->select('*')->from('email_data')->where('is_deleted', 0)->get()->result();
        $email_con = $this->db->select('*')->from('email_config')->get()->result();
        $del_email = $this->db->select('*')->from('email_data')->where('is_deleted', 1)->get()->result();
        // print_r($email_con); die();
        $content = $this->lweb_setting->email_setting($view_email, $email_con, $del_email);
        $this->template->full_admin_html_view($content);
        // return $content;
    }

    

     public function invoice_template() {
        $content = $this->lweb_setting->invoice_setting();
        $this->template->full_admin_html_view($content);
    }


    
      public function expense_invoice_template() {
        $content = $this->lweb_setting->expense_invoice_setting();
        $this->template->full_admin_html_view($content);
    }
    public function web_Invoice(){
        $CI = & get_instance();
        $CI->auth->check_admin_auth();
        $CI->load->model('Web_settings');


        $CI->Web_settings->update_invoice_set();



        $this->session->set_userdata(array('message' => display('successfully_added')));
        if (isset($_POST['add-customer'])) {
           // print_r($_POST['add-ocean-export']);
          redirect(base_url('Cweb_setting/invoice_template'));
            exit;
        }
    
    }



    
    public function invoice_desgn(){
        $CI = & get_instance();
        $CI->auth->check_admin_auth();
        $CI->load->model('Web_settings');
        $CI->Web_settings->invoice_desgn();
        $this->session->set_userdata(array('message' => display('successfully_added')));
        if (isset($_POST['add-customer'])) {
           // print_r($_POST['add-ocean-export']);
          redirect(base_url('Cweb_setting/invoice_template'));
            exit;
        }
    
    }


     public function update_invoice_setting($param="") {
        
        $this->load->model('Web_settings');



        if($param=='new_sale')
        {
                  if ($_FILES['logo']['name']) {
          

        $config['upload_path']    = './my-assets/image/invoice_logo/sale/new_sale/';
        $config['allowed_types']  = 'gif|jpg|png|jpeg|JPEG|GIF|JPG|PNG'; 
        $config['encrypt_name']   = TRUE;

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('logo')) {
                $error = array('error' => $this->upload->display_errors());
                $this->session->set_userdata(array('error_message' => $this->upload->display_errors()));
                redirect(base_url('Cweb_setting'));
            } else {
            $data = $this->upload->data();  
            $logo = $config['upload_path'].$data['file_name']; 
            $config['image_library']  = 'gd2';
            $config['source_image']   = $logo;
            $config['create_thumb']   = false;
            $config['maintain_ratio'] = TRUE;
            $config['width']          = 200;
            $config['height']         = 200;
            $this->load->library('image_lib', $config);
            $this->image_lib->resize();
            $logo = base_url() . $logo;

            }
        } 

        $old_logo = $this->input->post('old_logo',true);
        // $old_invoice_logo = $this->input->post('old_invoice_logo',true);
        // $old_favicon = $this->input->post('old_favicon',true);

        $data = array(
        'invoice_heading'          => $this->input->post('invoice_heading',true),
        'logo'              => (!empty($logo) ? $logo : $old_logo),
        'company_address' => $this->input->post('company_address',true),
        );

        $invoice_type = $this->input->post('invoice_type',true);
        $user_id = $this->session->userdata('user_id');

        }

        if($param=='profarma_invoice')
        {

              if ($_FILES['logo']['name']) {
          

        $config['upload_path']    = './my-assets/image/invoice_logo/sale/profarma/';
        $config['allowed_types']  = 'gif|jpg|png|jpeg|JPEG|GIF|JPG|PNG'; 
        $config['encrypt_name']   = TRUE;

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('logo')) {
                $error = array('error' => $this->upload->display_errors());
                $this->session->set_userdata(array('error_message' => $this->upload->display_errors()));
                redirect(base_url('Cweb_setting'));
            } else {
            $data = $this->upload->data();  
            $logo = $config['upload_path'].$data['file_name']; 
            $config['image_library']  = 'gd2';
            $config['source_image']   = $logo;
            $config['create_thumb']   = false;
            $config['maintain_ratio'] = TRUE;
            $config['width']          = 200;
            $config['height']         = 200;
            $this->load->library('image_lib', $config);
            $this->image_lib->resize();
            $logo = base_url() . $logo;

            }
        } 

        $old_logo = $this->input->post('old_logo',true);
        // $old_invoice_logo = $this->input->post('old_invoice_logo',true);
        // $old_favicon = $this->input->post('old_favicon',true);

        $data = array(
        'invoice_heading'          => $this->input->post('invoice_heading',true),
        'logo'              => (!empty($logo) ? $logo : $old_logo),
        'company_address' => $this->input->post('company_address',true),
        );

        $invoice_type = $this->input->post('invoice_type',true);
        $user_id = $this->session->userdata('user_id');

        }


         if($param=='packing_list')
        {

              if ($_FILES['logo']['name']) {
          

        $config['upload_path']    = './my-assets/image/invoice_logo/sale/packinglist/';
        $config['allowed_types']  = 'gif|jpg|png|jpeg|JPEG|GIF|JPG|PNG'; 
        $config['encrypt_name']   = TRUE;

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('logo')) {
                $error = array('error' => $this->upload->display_errors());
                $this->session->set_userdata(array('error_message' => $this->upload->display_errors()));
                redirect(base_url('Cweb_setting'));
            } else {
            $data = $this->upload->data();  
            $logo = $config['upload_path'].$data['file_name']; 
            $config['image_library']  = 'gd2';
            $config['source_image']   = $logo;
            $config['create_thumb']   = false;
            $config['maintain_ratio'] = TRUE;
            $config['width']          = 200;
            $config['height']         = 200;
            $this->load->library('image_lib', $config);
            $this->image_lib->resize();
            $logo = base_url() . $logo;

            }
        } 

        $old_logo = $this->input->post('old_logo',true);
        // $old_invoice_logo = $this->input->post('old_invoice_logo',true);
        // $old_favicon = $this->input->post('old_favicon',true);

        $data = array(
        'invoice_heading'          => $this->input->post('invoice_heading',true),
        'logo'              => (!empty($logo) ? $logo : $old_logo),
        'company_address' => $this->input->post('company_address',true),
        );

        $invoice_type = $this->input->post('invoice_type',true);
        $user_id = $this->session->userdata('user_id');
        
        }

     


         if($param=='oet')
        {

              if ($_FILES['logo']['name']) {
          

        $config['upload_path']    = './my-assets/image/invoice_logo/sale/oet/';
        $config['allowed_types']  = 'gif|jpg|png|jpeg|JPEG|GIF|JPG|PNG'; 
        $config['encrypt_name']   = TRUE;

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('logo')) {
                $error = array('error' => $this->upload->display_errors());
                $this->session->set_userdata(array('error_message' => $this->upload->display_errors()));
                redirect(base_url('Cweb_setting'));
            } else {
            $data = $this->upload->data();  
            $logo = $config['upload_path'].$data['file_name']; 
            $config['image_library']  = 'gd2';
            $config['source_image']   = $logo;
            $config['create_thumb']   = false;
            $config['maintain_ratio'] = TRUE;
            $config['width']          = 200;
            $config['height']         = 200;
            $this->load->library('image_lib', $config);
            $this->image_lib->resize();
            $logo = base_url() . $logo;

            }
        } 

        $old_logo = $this->input->post('old_logo',true);
        // $old_invoice_logo = $this->input->post('old_invoice_logo',true);
        // $old_favicon = $this->input->post('old_favicon',true);

        $data = array(
        'invoice_heading'          => $this->input->post('invoice_heading',true),
        'logo'              => (!empty($logo) ? $logo : $old_logo),
        'company_address' => $this->input->post('company_address',true),
        );

        $invoice_type = $this->input->post('invoice_type',true);
        $user_id = $this->session->userdata('user_id');
        
        }

         if($param=='trucking')
        {

              if ($_FILES['logo']['name']) {
          

        $config['upload_path']    = './my-assets/image/invoice_logo/sale/trucking/';
        $config['allowed_types']  = 'gif|jpg|png|jpeg|JPEG|GIF|JPG|PNG'; 
        $config['encrypt_name']   = TRUE;

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('logo')) {
                $error = array('error' => $this->upload->display_errors());
                $this->session->set_userdata(array('error_message' => $this->upload->display_errors()));
                redirect(base_url('Cweb_setting'));
            } else {
            $data = $this->upload->data();  
            $logo = $config['upload_path'].$data['file_name']; 
            $config['image_library']  = 'gd2';
            $config['source_image']   = $logo;
            $config['create_thumb']   = false;
            $config['maintain_ratio'] = TRUE;
            $config['width']          = 200;
            $config['height']         = 200;
            $this->load->library('image_lib', $config);
            $this->image_lib->resize();
            $logo = base_url() . $logo;

            }
        } 

        $old_logo = $this->input->post('old_logo',true);
        // $old_invoice_logo = $this->input->post('old_invoice_logo',true);
        // $old_favicon = $this->input->post('old_favicon',true);

        $data = array(
        'invoice_heading'          => $this->input->post('invoice_heading',true),
        'logo'              => (!empty($logo) ? $logo : $old_logo),
        'company_address' => $this->input->post('company_address',true),
        );

        $invoice_type = $this->input->post('invoice_type',true);
        $user_id = $this->session->userdata('user_id');
        
        }
  

        $json = json_encode($data);
        $insertField = array('invoice_template'=>$invoice_type,'user_id'=>$user_id,'data' => $json);

        $this->Web_settings->update_invoice_setting($insertField);

        $this->session->set_userdata(array('message' => display('successfully_updated')));
        redirect(base_url('Cweb_setting/invoice_template'));
        exit;
    }




    public function update_expense_invoice_setting($param=""){
        $this->load->model('Web_settings');



        if($param=='new_expense')
        {
                  if ($_FILES['logo']['name']) {
          

        $config['upload_path']    = './my-assets/image/invoice_logo/sale/new_sale/';
        $config['allowed_types']  = 'gif|jpg|png|jpeg|JPEG|GIF|JPG|PNG'; 
        $config['encrypt_name']   = TRUE;

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('logo')) {
                $error = array('error' => $this->upload->display_errors());
                $this->session->set_userdata(array('error_message' => $this->upload->display_errors()));
                redirect(base_url('Cweb_setting'));
            } else {
            $data = $this->upload->data();  
            $logo = $config['upload_path'].$data['file_name']; 
            $config['image_library']  = 'gd2';
            $config['source_image']   = $logo;
            $config['create_thumb']   = false;
            $config['maintain_ratio'] = TRUE;
            $config['width']          = 200;
            $config['height']         = 200;
            $this->load->library('image_lib', $config);
            $this->image_lib->resize();
            $logo = base_url() . $logo;

            }
        } 

        $old_logo = $this->input->post('old_logo',true);
        // $old_invoice_logo = $this->input->post('old_invoice_logo',true);
        // $old_favicon = $this->input->post('old_favicon',true);

        $data = array(
        'invoice_heading'          => $this->input->post('invoice_heading',true),
        'logo'              => (!empty($logo) ? $logo : $old_logo),
        'company_address' => $this->input->post('company_address',true),
        );

        $invoice_type = $this->input->post('invoice_type',true);
        $user_id = $this->session->userdata('user_id');

        }

        if($param=='purchase_order')
        {

              if ($_FILES['logo']['name']) {
          

        $config['upload_path']    = './my-assets/image/invoice_logo/sale/profarma/';
        $config['allowed_types']  = 'gif|jpg|png|jpeg|JPEG|GIF|JPG|PNG'; 
        $config['encrypt_name']   = TRUE;

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('logo')) {
                $error = array('error' => $this->upload->display_errors());
                $this->session->set_userdata(array('error_message' => $this->upload->display_errors()));
                redirect(base_url('Cweb_setting'));
            } else {
            $data = $this->upload->data();  
            $logo = $config['upload_path'].$data['file_name']; 
            $config['image_library']  = 'gd2';
            $config['source_image']   = $logo;
            $config['create_thumb']   = false;
            $config['maintain_ratio'] = TRUE;
            $config['width']          = 200;
            $config['height']         = 200;
            $this->load->library('image_lib', $config);
            $this->image_lib->resize();
            $logo = base_url() . $logo;

            }
        } 

        $old_logo = $this->input->post('old_logo',true);
        // $old_invoice_logo = $this->input->post('old_invoice_logo',true);
        // $old_favicon = $this->input->post('old_favicon',true);

        $data = array(
        'invoice_heading'          => $this->input->post('invoice_heading',true),
        'logo'              => (!empty($logo) ? $logo : $old_logo),
        'company_address' => $this->input->post('company_address',true),
        );

        $invoice_type = $this->input->post('invoice_type',true);
        $user_id = $this->session->userdata('user_id');

        }


         if($param=='oit')
        {

              if ($_FILES['logo']['name']) {
          

        $config['upload_path']    = './my-assets/image/invoice_logo/sale/packinglist/';
        $config['allowed_types']  = 'gif|jpg|png|jpeg|JPEG|GIF|JPG|PNG'; 
        $config['encrypt_name']   = TRUE;

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('logo')) {
                $error = array('error' => $this->upload->display_errors());
                $this->session->set_userdata(array('error_message' => $this->upload->display_errors()));
                redirect(base_url('Cweb_setting'));
            } else {
            $data = $this->upload->data();  
            $logo = $config['upload_path'].$data['file_name']; 
            $config['image_library']  = 'gd2';
            $config['source_image']   = $logo;
            $config['create_thumb']   = false;
            $config['maintain_ratio'] = TRUE;
            $config['width']          = 200;
            $config['height']         = 200;
            $this->load->library('image_lib', $config);
            $this->image_lib->resize();
            $logo = base_url() . $logo;

            }
        } 

        $old_logo = $this->input->post('old_logo',true);
        // $old_invoice_logo = $this->input->post('old_invoice_logo',true);
        // $old_favicon = $this->input->post('old_favicon',true);

        $data = array(
        'invoice_heading'          => $this->input->post('invoice_heading',true),
        'logo'              => (!empty($logo) ? $logo : $old_logo),
        'company_address' => $this->input->post('company_address',true),
        );

        $invoice_type = $this->input->post('invoice_type',true);
        $user_id = $this->session->userdata('user_id');
        
        }


        

         if($param=='trucking_expense')
        {

              if ($_FILES['logo']['name']) {
          

        $config['upload_path']    = './my-assets/image/invoice_logo/sale/trucking/';
        $config['allowed_types']  = 'gif|jpg|png|jpeg|JPEG|GIF|JPG|PNG'; 
        $config['encrypt_name']   = TRUE;

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('logo')) {
                $error = array('error' => $this->upload->display_errors());
                $this->session->set_userdata(array('error_message' => $this->upload->display_errors()));
                redirect(base_url('Cweb_setting'));
            } else {
            $data = $this->upload->data();  
            $logo = $config['upload_path'].$data['file_name']; 
            $config['image_library']  = 'gd2';
            $config['source_image']   = $logo;
            $config['create_thumb']   = false;
            $config['maintain_ratio'] = TRUE;
            $config['width']          = 200;
            $config['height']         = 200;
            $this->load->library('image_lib', $config);
            $this->image_lib->resize();
            $logo = base_url() . $logo;

            }
        } 

        $old_logo = $this->input->post('old_logo',true);
        // $old_invoice_logo = $this->input->post('old_invoice_logo',true);
        // $old_favicon = $this->input->post('old_favicon',true);

        $data = array(
        'invoice_heading'          => $this->input->post('invoice_heading',true),
        'logo'              => (!empty($logo) ? $logo : $old_logo),
        'company_address' => $this->input->post('company_address',true),
        );

        $invoice_type = $this->input->post('invoice_type',true);
        $user_id = $this->session->userdata('user_id');
        
        }
  

        $json = json_encode($data);
        $insertField = array('invoice_template'=>$invoice_type,'user_id'=>$user_id,'data' => $json);

        $this->Web_settings->update_invoice_setting($insertField);

        $this->session->set_userdata(array('message' => display('successfully_updated')));
        redirect(base_url('Cweb_setting/invoice_template'));
        exit;
    }

    // Update setting
    public function update_setting() {
        $this->load->model('Web_settings');

        if ($_FILES['logo']['name']) {
          

        $config['upload_path']    = './my-assets/image/logo/';
        $config['allowed_types']  = 'gif|jpg|png|jpeg|JPEG|GIF|JPG|PNG'; 
        $config['encrypt_name']   = TRUE;

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('logo')) {
                $error = array('error' => $this->upload->display_errors());
                $this->session->set_userdata(array('error_message' => $this->upload->display_errors()));
                redirect(base_url('Cweb_setting'));
            } else {
            $data = $this->upload->data();  
            $logo = $config['upload_path'].$data['file_name']; 
            $config['image_library']  = 'gd2';
            $config['source_image']   = $logo;
            $config['create_thumb']   = false;
            $config['maintain_ratio'] = TRUE;
            $config['width']          = 200;
            $config['height']         = 200;
            $this->load->library('image_lib', $config);
            $this->image_lib->resize();
            $logo =  $logo;

            }
        }

        if ($_FILES['favicon']['name']) {
            $config['upload_path']   = './my-assets/image/logo/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg|JPEG|GIF|JPG|PNG';
            $config['max_size']      = "*";
            $config['max_width']     = "*";
            $config['max_height']    = "*";
            $config['encrypt_name']  = TRUE;

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('favicon')) {
                $error = array('error' => $this->upload->display_errors());
                $this->session->set_userdata(array('error_message' => $this->upload->display_errors()));
                redirect(base_url('Cweb_setting'));
            } else {
                $image = $this->upload->data();
                $favicon = base_url() . "my-assets/image/logo/" . $image['file_name'];
            }
        }

        if ($_FILES['invoice_logo']['name']) {

        $config['upload_path']    = './my-assets/image/logo/';
        $config['allowed_types']  = 'gif|jpg|png|jpeg|JPEG|GIF|JPG|PNG'; 
        $config['encrypt_name']   = TRUE;

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('invoice_logo')) {
                $error = array('error' => $this->upload->display_errors());
                $this->session->set_userdata(array('error_message' => $this->upload->display_errors()));
                redirect(base_url('Cweb_setting'));
            } else {
            $data = $this->upload->data();  
            $invoice_logo = $config['upload_path'].$data['file_name']; 
            $config['image_library']  = 'gd2';
            $config['source_image']   = $invoice_logo;
            $config['create_thumb']   = false;
            $config['maintain_ratio'] = TRUE;
            $config['width']          = 200;
            $config['height']         = 200;
            $this->load->library('image_lib', $config);
            $this->image_lib->resize();
            $invoice_logo = $invoice_logo;

            }
        }

        $old_logo = $this->input->post('old_logo',true);
        $old_invoice_logo = $this->input->post('old_invoice_logo',true);
        $old_favicon = $this->input->post('old_favicon',true);

        $data = array(
    'logo'              => (!empty($logo) ? $logo : $old_logo),
    'invoice_logo'      => (!empty($invoice_logo) ? $invoice_logo : $old_invoice_logo),
    'favicon'           => (!empty($favicon) ? $favicon : $old_favicon),
    'currency'          => $this->input->post('currency',true),
    'currency_position' => $this->input->post('currency_position',true),
    'footer_text'       => $this->input->post('footer_text',true),
    'language'          => $this->input->post('language',true),
    'rtr'               => $this->input->post('rtr',true),
    'timezone'          => $this->input->post('timezone',true),
    'captcha'           => $this->input->post('captcha',true),
    'site_key'          => $this->input->post('site_key',true),
    'secret_key'        => $this->input->post('secret_key',true),
    'discount_type'     => $this->input->post('discount_type',true),
    'create_by'         => $this->session->userdata('user_id')
        );

        $this->Web_settings->update_setting($data);

        $this->session->set_userdata(array('message' => display('successfully_updated')));
        redirect(base_url('Cweb_setting'));
        exit;
    }


        public function app_setting() {
         $data['qr_image'] = "";
         $data['server_image'] = "";
         $data['hotspotqrimg'] = "";
          $app_settingdata = $this->Web_settings->app_settingsdata();
           $this->load->library('ciqrcode');
            $qr_image=rand().'.png';
            $params['data'] = $app_settingdata[0]['localhserver'];
            $params['level'] = 'L';
            $params['size'] = 8;
            $params['savename'] =FCPATH."my-assets/image/qr/".$qr_image;
            if($this->ciqrcode->generate($params))
            {
                $localqr = $qr_image;
            }


             $serverqr=rand().'.png';
            $params['data'] = $app_settingdata[0]['onlineserver'];
            $params['level'] = 'O';
            $params['size'] = 8;
            $params['savename'] =FCPATH."my-assets/image/qr/".$serverqr;
            if($this->ciqrcode->generate($params))
            {
                $server_qrimg = $serverqr;
            }



             $hotspotqr=rand().'.png';
            $params['data'] = $app_settingdata[0]['hotspot'];
            $params['level'] = 'U';
            $params['size'] = 8;
            $params['savename'] =FCPATH."my-assets/image/qr/".$hotspotqr;
            if($this->ciqrcode->generate($params))
            {
                $hotspot_qrimg = $hotspotqr;
            }


             $data = array(
            'title'           => display('print_qrcode'),
            'qr_image'        => $localqr,
            'server_image'    => $server_qrimg,
            'hotspotqrimg'    => $hotspot_qrimg,
            'localhserver'    => $app_settingdata[0]['localhserver'],
            'onlineserver'    => $app_settingdata[0]['onlineserver'],
            'hotspot'         => $app_settingdata[0]['hotspot'],
            'id'              => $app_settingdata[0]['id'],
        ); 


        $content = $this->parser->parse('web_setting/app_setting', $data, true);

        $this->template->full_admin_html_view($content);
    }

    public function update_app_setting(){

        $id = $this->input->post('id',TRUE);
        $data  = array(
        'localhserver' => $this->input->post('localurl',true),
        'onlineserver' => $this->input->post('onlineurl',true),
        'hotspot'      => $this->input->post('hotspoturl',true),

        );
        if(!empty($this->input->post('localurl',TRUE)) || !empty($this->input->post('onlineurl',true)) || !empty($this->input->post('hotspoturl',true)))

     if(!empty($id)){
            $this->db->where('id',$id)
                     ->update('app_setting',$data);
                 }else{
                    $this->db->insert('app_setting',$data);
                 }

         $this->session->set_flashdata('message', 'Successfully Updated');
         redirect(base_url('Cweb_setting/app_setting'));          
    }

      //    =========== its for mail settings ===============
    public function mail_setting() {
        $data['title'] = display('mail_configuration');
        $data['mail_setting'] = $this->db->select('*')->from('email_config')->where('id', 1)->get()->result();       
        $content = $this->parser->parse('web_setting/mail_setting', $data, true);
        $this->template->full_admin_html_view($content);
    }

//    ============ its for mail_config_update ============
    public function mail_config_update() {
        $protocol  = $this->input->post('protocol',true);
        $smtp_host = $this->input->post('smtp_host',true);
        $smtp_port = $this->input->post('smtp_port',true);
        $smtp_user = $this->input->post('smtp_user',true);
        $smtp_pass = $this->input->post('smtp_pass',true);
        $mailtype  = $this->input->post('mailtype',true);
        $invoice   = $this->input->post('isinvoice',true);
        $service   = $this->input->post('isservice',true);
        $quotation  = $this->input->post('isquotation',true);

        $mail_data = array(
            'protocol' => $protocol,
            'smtp_host' => $smtp_host,
            'smtp_port' => $smtp_port,
            'smtp_user' => $smtp_user,
            'smtp_pass' => $smtp_pass,
            'mailtype'  => $mailtype,
            'isinvoice' => $invoice,
            'isservice' => $service,
            'isquotation'=>$quotation,
        );
        $this->db->where('id', 1)->update('email_config', $mail_data);
        $this->session->set_userdata(array('message' => display('update_successfully')));
        redirect(base_url('Cweb_setting/mail_setting'));
    }


}
