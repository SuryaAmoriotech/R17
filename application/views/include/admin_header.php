<script src="https://kit.fontawesome.com/38e0f06f81.js" crossorigin="anonymous"></script>


<?php
$CI = & get_instance();
$CI->load->model('Web_settings');
$CI->load->model('Reports');
$CI->load->model('Users');
$Web_settings = $CI->Web_settings->retrieve_setting_editdata();
$users = $CI->Users->profile_edit_data();
$out_of_stock = $CI->Reports->out_of_stock_count();
      


?>
  
<style>

.navbar-custom-menu>.navbar-nav>li>.dropdown-menu {
    position: absolute;
    right: 0;
    left: auto;
    width: 850px;
    top: 111%;
    padding: 20px;

    border-radius: 10px;
    background-color: #fff;
}

ul.dropdown-submenu {
    padding: 0;
}

ul.dropdown-submenu>li {
    list-style: none;
}
    ul.dropdown-submenu>li>a {
    padding: 5px 10px;
    color: #777;
    display: block;
    clear: both;
    font-weight: 400;
    line-height: 1.42857143;
    white-space: nowrap;
}

ul.dropdown-submenu>li>.menu-title a{
    color: #777;
    font-size: 16px;
    font-weight: 500;

}

ul.dropdown-submenu>li>a:hover{
    background-color: #e1e3e9;
    color: #333;
}

 ul.dropdown-submenu>li>a>i {

    font-size: 16px;
    margin-right: 10px;

 }

</style>

<header class="main-header"> 
    <a href="<?php echo base_url() ?>" class="logo"> <!-- Logo -->
        <span class="logo-mini">
            <!--<b>A</b>BD-->
            <img src="<?php
            if (isset($Web_settings[0]['favicon'])) {
                echo html_escape($Web_settings[0]['favicon']);
            }
            ?>" alt="">
        </span>

        <span class="logo-lg">
            <!--<b>Admin</b>BD-->
            <img src="<?php
            echo base_url().html_escape($_SESSION['logo']);
            ?>" alt="">
        </span>
    </a>
    <!-- Header Navbar -->


    <nav class="navbar navbar-static-top text-center">

        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button"> <!-- Sidebar toggle button-->
            <span class="sr-only">Toggle navigation</span>

            <span class="pe-7s-keypad"></span>
        </a>

     
          <?php
          $urcolp = '0';
          if($this->uri->segment(2) =="gui_pos" ){
            $urcolp = "gui_pos";
          }
          if($this->uri->segment(2) =="pos_invoice" ){
            $urcolp = "pos_invoice";
          }

           if($this->uri->segment(2) != $urcolp ){

           if($this->permission1->method('new_invoice','create')->access()){
         

           ?>
           <a href="<?php echo base_url('Cinvoice')?>" class="btn btn-success btn-outline"><i class="fa fa-balance-scale"></i> <?php  echo display('invoice') ?></a>
     <?php }?>

     
        <?php if($this->permission1->method('customer_receive','create')->access()){ ?>
           <a href="<?php echo base_url('accounts/customer_receive')?>" class="btn btn-success btn-outline"><i class="fa fa-money"></i> Sales Payments</a>
       <?php } ?>
      
  <?php if($this->permission1->method('supplier_payment','create')->access()){ ?>
          <a href="<?php echo base_url('accounts/supplier_payment')?>" class="btn btn-success btn-outline"><i class="fa fa-money" aria-hidden="true"></i> Expenses Payment</a>
      <?php } ?>

<?php if($this->permission1->method('add_purchase','create')->access()){ ?>
          <a href="<?php echo base_url('Cpurchase')?>" class="btn btn-success btn-outline"><i class="ti-shopping-cart"></i> <?php echo display('purchase') ?></a>
 <?php }} ?>

        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <li class="dropdown notifications-menu">
                    <a href="<?php echo base_url('Cinvoice/addCart') ?>">
                        <i class="pe-7s-cart" title="View Cart"></i>
                        <span class="label total-count"></span>
                    </a>
                </li>

                 <li class="dropdown notifications-menu">
                    <a href="<?php echo base_url('Cservice/help_desk_show') ?>" >
                        <i class="pe-7s-help1" title="Help"></i>
                        <span class="label" style="background-color: #e53952;">?</span>
                    </a>
                </li>


                <li class="dropdown notifications-menu">
                    <a href="<?php echo base_url('Creport/out_of_stock') ?>" >
                        <i class="pe-7s-attention" title="<?php echo display('out_of_stock') ?>"></i>
                        <span class="label"><?php echo html_escape($out_of_stock) ?></span>
                    </a>
                </li>
                <!-- settings -->
                <li class="dropdown dropdown-user">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <i class="pe-7s-settings"></i></a>
                  <!--   <ul class="dropdown-menu">
                        <li><a href="<?php echo base_url('Admin_dashboard/edit_profile') ?>"><i class="pe-7s-users"></i><?php echo display('user_profile') ?></a></li>
                        <li><a href="<?php echo base_url('Admin_dashboard/dashboardsetting') ?>"><i class="ti-dashboard"></i><?php echo 'Dashboard Settings' ?></a></li>
                        <li><a href="<?php echo base_url('Admin_dashboard/change_password_form') ?>"><i class="pe-7s-settings"></i><?php echo display('change_password') ?></a></li>
                        <li><a href="<?php echo base_url('Admin_dashboard/logout') ?>"><i class="pe-7s-key"></i><?php echo display('logout') ?></a></li>
                    </ul> -->


                <div class="dropdown-menu">
                <?php 
                if($_SESSION['u_type']==2 || $_SESSION['u_type']==3)
                    { ?>
    <div class="row">
                  <!-- <div class="menuCol col-xl-3 col-lg-3 col-md-12">
                    <ul class="dropdown-submenu">
                       <li class="menu-title" style="color:#17202a"><b>Manage Setting</b></li>
                       <li><a href="<?php //echo base_url('Admin_dashboard/edit_profile') ?>"><i class="pe-7s-users"></i>myManage Companys</a></li>
                        <li><a href="<?php //echo base_url('Admin_dashboard/dashboardsetting') ?>"><i class="ti-dashboard"></i>Add Company5</a></li>
                        <li><a href="<?php //echo base_url('Admin_dashboard/change_password_form') ?>"><i class="pe-7s-settings"></i>Manage Company </a></li> -->
                        <!-- <li><a href="<?php //echo base_url('Admin_dashboard/logout') ?>"><i class="pe-7s-key"></i>Language </a></li> -->
                        <!-- <li><a href="<?php //echo base_url('Currency') ?>"><i class="pe-7s-key"></i>Currency</a></li>
                        <li><a href="<?php //echo base_url('Cweb_setting') ?>"><i class="pe-7s-key"></i>&nbsp;&nbsp;Setting </a></li>
                        <li><a href="<?php //echo base_url('Cweb_setting/mail_setting') ?>"><i class="pe-7s-key"></i>Mail Setting </a></li>
                        <li><a href="<?php //echo base_url('Admin_dashboard/Help') ?>"><i class="pe-7s-key"></i>&nbsp;&nbsp;Help</a></li>
                    </ul>
                  </div> -->
                  <div class="menuCol col-xl-3 col-lg-3 col-md-12">
                    <ul class="dropdown-submenu">
                          <li class="menu-title" style="color:#17202a"><b><?php echo display('role_permission');  ?></b></li>
                        <li><a href=" <?php echo base_url('Permission/add_role') ?>"><i class="pe-7s-users"></i><?php echo display('add_role'); ?></a></li>
                        <li><a href="<?php echo base_url('Permission/role_list') ?>"><i class="ti-dashboard"></i><?php echo display('role_list'); ?></a></li>
                        <li><a href=" <?php echo base_url('Permission/user_assign') ?>"><i class="pe-7s-settings"></i><?php echo display('user_assign_role'); ?></a></li>
                    </ul>
                  </div>
                   <div class="menuCol col-xl-3 col-lg-3 col-md-12">
                    <ul class="dropdown-submenu">
                         <li class="menu-title" style="color:#17202a"><b>SMS</b></li>
                        <li><a href=" <?php echo base_url('Csms/configure') ?>"><i class="pe-7s-users"></i><?php echo display('sms_configure'); ?></a></li>
                    </ul>
                  </div>
                
                  <div class="menuCol col-xl-3 col-lg-3 col-md-12">
                    <ul class="dropdown-submenu">
                         <li class="menu-title" style="color:#17202a"><b><?php echo display('Admin Details');  ?></b></li>
                        <li><a href="  <?php echo base_url('Admin_dashboard/edit_profile') ?>"><i class="pe-7s-users"></i> <?php  echo  display('user_profile'); ?></a></li>
                        <!-- <li><a href=" <?php echo base_url('Admin_dashboard/dashboardsetting') ?>"><i class="ti-dashboard"></i>Dashboard Settings</a></li> -->
                        <li><a href=" <?php echo base_url('Admin_dashboard/change_password_form') ?>"><i class="pe-7s-settings"></i><?php   echo display('Change Password'); ?></a></li>
                        <li><a href="<?php echo base_url('Admin_dashboard/logout') ?>"><i class="pe-7s-key"></i>&nbsp;&nbsp;<?php echo display('logout');  ?></a></li>
                    </ul>
                  </div>
                  <div class="menuCol col-xl-3 col-lg-3 col-md-12">
                    <ul class="dropdown-submenu">
                         <li class="menu-title" style="color:#17202a"><b><?php echo display('User Setting');  ?> </b></li>
                         <!-- <li><a href="<?php echo base_url('Admin_dashboard/logout') ?>"><i class="pe-7s-key"></i>&nbsp;&nbsp;Language </a></li> -->
                         <li><a href="<?php echo base_url('Currency/currency_form') ?>"><i class="pe-7s-key"></i>&nbsp;&nbsp;<?php echo display('currency');  ?></a></li>
                         <li><a href="<?php echo base_url('Cweb_setting/mail_setting') ?>"><i class="pe-7s-key"></i>&nbsp;&nbsp;<?php echo display('mail_setting'); ?> </a></li>
                        <li><a href=" <?php echo base_url('Admin_dashboard/dashboardsetting') ?>"><i class="ti-dashboard"></i><?php  echo  display('Dashboard Settings');?></a></li>
                    </ul>
                  </div>
              </div>
              <?php } ?>
              <?php 
                if($_SESSION['u_type']==1 )
                    { ?>

<div class="menuCol col-xl-3 col-lg-3 col-md-12">
                    <ul class="dropdown-submenu">
                         <li class="menu-title" style="color:#17202a"><b><?php echo display('Admin Details');  ?></b></li>
                        <li><a href="  <?php echo base_url('Admin_dashboard/edit_profile') ?>"><i class="pe-7s-users"></i><?php echo  display('user_profile'); ?> </a></li>
                        <!-- <li><a href=" <?php echo base_url('Admin_dashboard/dashboardsetting') ?>"><i class="ti-dashboard"></i>Dashboard Settings</a></li> -->
                        <li><a href=" <?php echo base_url('Admin_dashboard/change_password_form') ?>"><i class="pe-7s-settings"></i><?php   echo display('Change Password'); ?> </a></li>
                        <li><a href="<?php echo base_url('Admin_dashboard/logout') ?>"><i class="pe-7s-key"></i>&nbsp;&nbsp;<?php echo display('logout');  ?></a></li>
                    </ul>
                  </div>
                         <?php } ?>
</div>
                </li>
            </ul>
        </div>
    </nav>
</header>

<aside class="main-sidebar">
    <!-- sidebar -->
    <div class="sidebar">
       
        <!-- Sidebar user panel -->
        <div class="user-panel text-center row" style="display: flex; align-items: center;">
            <div class="image col-md-6">
                <?php 
                if($_SESSION['u_type']==1)
                    { ?>
                         <img src="<?php
            if (isset($Web_settings[0]['logo'])) {
                echo html_escape($Web_settings[0]['logo']);
            }
            ?>" class="img-circle" alt="User Image">
                    <?php  } elseif($_SESSION['u_type']==2) {?>
             <img src="<?php
            if (isset($Web_settings[0]['logo'])) {
                echo html_escape($Web_settings[0]['logo']);
            }
            ?>" class="img-circle" alt="User Image">
            <?php } 
             elseif($_SESSION['u_type']==3)
             {
                ?>
               <img src="<?php
            if (isset($Web_settings[0]['logo'])) {
                echo html_escape($Web_settings[0]['logo']);
            }
            ?>" class="img-circle" alt="User Image">
                <?php 
             }
            ?>
            </div>
            <div class="info col-md-6">
                <?php 

                if($_SESSION['u_type']==1)
                { 

                    ?>
                <p>Super User </p>
           <?php } elseif($_SESSION['u_type']==2) { ?>
            <p>Admin User 
            </p>
            
          <p style="color:white;"> <?php echo $_SESSION['unique_id']; ?>   </p>



           <?php } elseif($_SESSION['u_type']==3) { ?>


            <p>User <?php 
           
            $data=$this->session->all_userdata();
//print_r($data) ;
 ?></p>
  <p style="color:white;"> <?php  echo $_SESSION['unique_id']; ?>   </p>
           <?php } ?>
            </div>
        </div>

        <?php 

if($_SESSION['u_type']==1)
{ 

    ?>
        <!-- sidebar menu -->
        <!-- user 1 -->

<ul class="sidebar-menu">

            <li class="active">
                <a href="<?php echo base_url(); ?>/"><i class="ti-dashboard"></i> <span><?php echo  display('dashboard'); ?></span>
                    <span class="pull-right-container">
                        <span class="label label-success pull-right"></span>
                    </span>
                </a>
            </li>
    
            <li >
                <a href="<?php echo base_url(); ?>user/managecompany"><i class="ti-dashboard"></i> <span><?php echo display('manage_company'); ?></span>
                    <span class="pull-right-container">
                        <span class="label label-success pull-right"></span>
                    </span>
                </a>
            </li>
            <li >
                <a href="<?php echo base_url(); ?>user/adadmin"><i class="ti-dashboard"></i> <span><?php   echo  display('Add Admin');  ?></span>
                    <span class="pull-right-container">
                        <span class="label label-success pull-right"></span>
                    </span>
                </a>
            </li>       
        



        <li class="treeview  ">
                <a href="#">
                    <i class="ti-key"></i> <span><?php echo ('Admin Role');  ?></span>

                    <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
             
                                            <li class="treeview  "><a href="<?php echo base_url(); ?>/Permission/superadmin_add_role"><?php echo ('Add Role'); ?></a></li>
                                                                  <li class="treeview  "><a href="<?php echo base_url(); ?>/Permission/super_role_list"><?php echo ('Role List');  ?></a></li>
                                                                <li class="treeview  "><a href="<?php echo base_url(); ?>/Permission/company_role_assign"><?php echo  ("Admin Assign Role");  ?></a></li>
                                     

                    </ul>
                </li>


                </ul>



<?php 

}




if($_SESSION['u_type']==2)
{ 

    ?>


        <!-- user 2 -->

<ul class="sidebar-menu">

            <li class="active">
                <a href="<?php echo base_url(); ?>/"><i class="ti-dashboard"></i> <span><?php  echo display('dashboard'); ?></span>
                    <span class="pull-right-container">
                        <span class="label label-success pull-right"></span>
                    </span>
                </a>
            </li>



            <?php 
     foreach(  $this->session->userdata('admin_data') as $admtest){
        // echo $admtest; die();
     $split=explode('-',$admtest);
     if(trim($split[0])=='sale'){
      ?>
    <!-- Invoice menu start -->
   
                        <li class="treeview  ">
                <a href="#">
                    <i class="fa fa-balance-scale"></i><span><?php echo display('invoice');?></span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                                        <li class="treeview  "><a href="<?php echo base_url(); ?>/Cinvoice/manage_invoice"><?php echo display('Create Invoice');?></a></li>
                                                    <li class="treeview  "><a href="<?php echo base_url(); ?>/Cinvoice/manage_profarma_invoice"><?php echo display('Quote');?></a></li>
                                                     <!--       <li class="treeview  "><a href="<?php //echo base_url(); ?>/Cinvoice/manage_packing_list"><?php echo display('Packing List');?></a></li>-->
                                            <li class="treeview  "><a href="<?php echo base_url(); ?>/Cinvoice/manage_ocean_export_tracking"><?php echo display('Ocean Export Tracking');?></a></li>
                    

                                          <li class="treeview  "><a href="<?php echo base_url(); ?>/Cinvoice/manage_trucking"><?php echo display('Road Transport');?></a></li>
                    

                </ul>
            </li>
 

            <?php 

 }
 }  ?>


                         <!-- Invoice menu end -->

  <?php 
     foreach(  $this->session->userdata('admin_data') as $admtest){
     $split=explode('-',$admtest);
     if(trim($split[0])=='customer'){
      ?>


                <!-- Customer menu start -->
                        <li class="treeview  ">

             <a href="<?php echo base_url(); ?>/Ccustomer/manage_customer">
                    <i class="fa fa-handshake-o"></i><span><?php  echo  display('customer'); ?></span>
               
                </a>

            </li>
            <?php            
            break;
 }
 } ?>




<?php 
     foreach(  $this->session->userdata('admin_data') as $admtest){
     $split=explode('-',$admtest);
     if(trim($split[0])=='product'){
      ?>

               <!-- Product menu start -->
                       <li class="treeview  ">
             <a href="<?php echo base_url(); ?>/Cproduct/manage_product">
                    <i class="ti-bag"></i><span><?php  echo display('product'); ?></span>                 
                </a>
            </li>
                        <!-- Product menu end -->
                        <?php            
            break;
 }
 } ?>



                         
<?php 
     foreach(  $this->session->userdata('admin_data') as $admtest){
     $split=explode('-',$admtest);
     if(trim($split[0])=='vendor'){
      ?>
                    <!-- Supplier menu start -->
                       <li class="treeview  ">
             <a href="<?php echo base_url(); ?>/Csupplier/manage_supplier">
                    <i class="ti-user"></i><span><?php echo display('Vendor');?></span>            
                </a>
            </li>
                         <!-- Supplier menu end -->
                         <?php            
            break;
 }
 } ?>



            
<?php 
     foreach(  $this->session->userdata('admin_data') as $admtest){
     $split=explode('-',$admtest);
     if(trim($split[0])=='expense'){
      ?>

                     <!-- Purchase menu start -->
                                  <li class="treeview  ">
                <a href="#">
                    <i class="ti-shopping-cart"></i><span><?php  echo display('purchase');?></span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                                         <li class="treeview  "><a href="<?php echo base_url(); ?>/Cpurchase/manage_purchase"><?php echo display('Create Expense');?></a></li>
                                                                <li class="treeview  "><a href="<?php echo base_url(); ?>/Cpurchase/manage_purchase_order"><?php echo display('Purchase Order');?></a></li>

                                            <li class="treeview  "><a href="<?php echo base_url(); ?>/Ccpurchase/manage_ocean_import_tracking"><?php echo display('Ocean Import Tracking');?></a></li>
                       

                                            <li class="treeview  "><a href="<?php echo base_url(); ?>/Ccpurchase/manage_trucking"><?php echo display('Road Transport');?></a></li>
                                       </ul>
            </li>
            <!-- Purchase menu end -->  
            <?php            
            break;
 }
 } ?>



<?php 
     foreach(  $this->session->userdata('admin_data') as $admtest){
     $split=explode('-',$admtest);
     if(trim($split[0])=='quotation'){
      ?>

             <!-- Quotation Menu Start -->
                     <li class="treeview  ">
                <a href="<?php echo base_url(); ?>/Cquotation/manage_quotation">
                    <i class="fa fa-book"></i><span><?php echo display('Quotation');?></span>               
                </a>
            </li>
                    <!-- quotation Menu end -->
                    <?php            
            break;
 }
 } ?>
  



  <?php 
     foreach(  $this->session->userdata('admin_data') as $admtest){
     $split=explode('-',$admtest);
     if(trim($split[0])=='taxes'){
      ?>

        <!-- Taxes menu start -->
 <li class="treeview  ">
<a href="<?php echo base_url(); ?>/Caccounts/manage_tax">
       <i class="ti-bar-chart"></i><span><?php echo display('Taxes');?></span>
</a>
</li> 
            <!-- Taxes menu end -->
            <?php            
            break;
 }
 } ?>
  


  <?php 
     foreach(  $this->session->userdata('admin_data') as $admtest){
     $split=explode('-',$admtest);
     if(trim($split[0])=='return'){
      ?>



                    <li class="treeview  ">
                <a href="#">
                    <i class="fa fa-retweet" aria-hidden="true"></i><span><?php echo  display('return'); ?></span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                                         <li class="treeview  "><a href="<?php echo base_url(); ?>/Cretrun_m"><?php echo  display('return'); ?></a></li>
                                                               <li class="treeview  "><a href="<?php echo base_url(); ?>/Cretrun_m/return_list"><?php echo  display('stock_return_list'); ?></a></li>
                                                               <li class="treeview  "><a href="<?php echo base_url(); ?>/Cretrun_m/supplier_return_list"><?php echo  display('supplier_return_list'); ?></a></li>
                                                              <li class="treeview  "><a href="<?php echo base_url(); ?>/Cretrun_m/wastage_return_list"><?php echo  display('wastage_return_list'); ?></a></li>
                      
                </ul>
            </li>


            <?php            
            break;
 }
 } ?>



<?php 
     foreach(  $this->session->userdata('admin_data') as $admtest){
     $split=explode('-',$admtest);
     if(trim($split[0])=='report'){
      ?>

            <!-- Report menu start -->
                         <li class="treeview  ">
                <a href="#">
                    <i class="ti-book"></i><span><?php echo display('report'); ?></span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                                      <li class="treeview  "><a href="<?php echo base_url(); ?>/Admin_dashboard/closing"><?php echo display('closing'); ?></a></li>
                                                  <li class="treeview  "><a href="<?php echo base_url(); ?>/Admin_dashboard/closing_report"><?php echo display('closing_report'); ?></a></li>
                                                     <li class="treeview  "><a href="<?php echo base_url(); ?>/Admin_dashboard/all_report"><?php echo  display('todays_report');  ?></a></li>
                                                      <li class="treeview  "><a href="<?php echo base_url(); ?>/Admin_dashboard/todays_customer_receipt"><?php echo  display('todays_customer_receipt');  ?></a></li>
                                                      <li class="treeview  "><a href="<?php echo base_url(); ?>/Admin_dashboard/todays_sales_report"><?php  echo display('sales_report'); ?></a></li>
                                                                 <li class="treeview  "><a href="<?php echo base_url(); ?>/Admin_dashboard/user_sales_report"><?php  echo display('user_wise_sales_report'); ?></a></li>
                                                          <li class="treeview  "><a href="<?php echo base_url(); ?>/Admin_dashboard/retrieve_dateWise_DueReports"><?php echo  display('due_report');  ?></a></li>
                                                                 <li class="treeview  "><a href="<?php echo base_url(); ?>/Admin_dashboard/retrieve_dateWise_Shippingcost"><?php echo  display('shipping_cost_report');  ?></a></li>
                                                        <li><a href="<?php echo base_url(); ?>/Admin_dashboard/todays_purchase_report"><?php echo  display('purchase_report');  ?></a></li>
                                                      <li class="treeview  "><a href="<?php echo base_url(); ?>/Admin_dashboard/purchase_report_category_wise"><?php echo  display('purchase_report_category_wise');  ?></a></li>
                                                      <li class="treeview  "><a href="<?php echo base_url(); ?>/Admin_dashboard/product_sales_reports_date_wise"><?php echo  display('sales_report_product_wise');  ?></a></li>
                                                      <li class="treeview  "><a href="<?php echo base_url(); ?>/Admin_dashboard/sales_report_category_wise"><?php echo  display('sales_report_category_wise');  ?></a></li>
                                                                <li class="treeview  "><a href="<?php echo base_url(); ?>/Admin_dashboard/sales_return"<?php echo  display('invoice_return');  ?></a></li>
                                                                    <li class="treeview  "><a href="<?php echo base_url(); ?>/Admin_dashboard/supplier_return"><?php echo display('supplier_return'); ?></a></li>
                                                                  <li class="treeview  "><a href="<?php echo base_url(); ?>/Admin_dashboard/retrieve_dateWise_tax"><?php echo display('tax_report'); ?></a></li>
                                                                  <li class="treeview  "><a href="<?php echo base_url(); ?>/Admin_dashboard/total_profit_report"><?php  echo display('profit_report');?></a></li>
                                                                                                                  <li class="treeview  "><a href="<?php echo base_url(); ?>/Creport/product_stock"><?php  echo display('stock_report_product_wise');?></a></li>
                                    </ul>
            </li>
                    <!-- Report menu end -->
                    <?php            
            break;
 }
 } ?>





<?php 
     foreach(  $this->session->userdata('admin_data') as $admtest){
     $split=explode('-',$admtest);
     if(trim($split[0])=='accounts'){
      ?>

<!--New Account start-->
             <li class="treeview  ">
                <a href="#">
                    <i class="fa fa-money"></i><span><?php echo display('accounts'); ?></span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                      <li class="treeview  "><a href="<?php echo base_url(); ?>/accounts/financial_year"><?php  echo display('Financial Year');  ?></a></li>
                                        <li class="treeview  "><a href="<?php echo base_url(); ?>/accounts/financial_year_end"><?php  echo display('Financial Year Ending');  ?></a></li>
                                         <li class="treeview  "><a href="<?php echo base_url(); ?>/accounts/show_tree"><?php echo display('c_o_a');  ?></a></li>
                                                     <li class="treeview  "><a href="<?php echo base_url(); ?>/accounts/supplier_payment"><?php echo display('supplier_payment');  ?></a></li>
                                                              <li class="treeview  "><a href="<?php echo base_url(); ?>/accounts/customer_receive"><?php echo  display('customer_receive');  ?></a></li>
                    
                                         <li class="treeview  "><a href="<?php echo base_url(); ?>/accounts/cash_adjustment"><?php echo display('cash_adjustment');  ?></a></li>
                                                             <li class="treeview  "><a href="<?php echo base_url(); ?>/accounts/debit_voucher"><?php  echo display('debit_voucher');?></a></li>
                                                                <li class="treeview  "><a href="<?php echo base_url(); ?>/accounts/credit_voucher"><?php echo display('credit_voucher');?></a></li>
                                         
                                             <li class="treeview  "><a href="<?php echo base_url(); ?>/accounts/contra_voucher"><?php  echo display('contra_voucher'); ?></a></li>
                                                                   <li class="treeview  "><a href="<?php echo base_url(); ?>/accounts/journal_voucher"><?php echo display('journal_voucher');?></a></li> 
                     
                                             <li class="treeview  "><a href="<?php echo base_url(); ?>/accounts/aprove_v"><?php echo  display('voucher_approval');?></a></li> 
                                                                      <li class="treeview  "><a href=""><?php echo  display('report');?>                           <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                               <li class="treeview  "><a href="<?php echo base_url(); ?>/accounts/voucher_report"><?php  echo display('Voucher Report');?></a></li>
                                     <li class="treeview  "><a href="<?php echo base_url(); ?>/accounts/cash_book"><?php  echo display('cash_book'); ?></a></li>
                                                     <li class="treeview  "><a href="<?php echo base_url(); ?>/accounts/inventory_ledger"><?php echo display('inventory_ledger');  ?></a></li>
                                                              <li class="treeview  "><a href="<?php echo base_url(); ?>/accounts/bank_book"><?php echo display('bank_book');  ?></a></li>
                                                                        <li class="treeview  "><a href="<?php echo base_url(); ?>/accounts/general_ledger"><?php echo display('general_ledger');  ?></a></li>
                                                                         <li class="treeview  "><a href="<?php echo base_url(); ?>/accounts/trial_balance"><?php echo display('trial_balance');  ?></a></li>
                                                   <li class="treeview  "><a href="<?php echo base_url(); ?>/accounts/profit_loss_report"><?php echo  display('profit_loss'); ?></a></li>
                                                   <li class="treeview  "><a href="<?php echo base_url(); ?>/accounts/cash_flow_report"><?php echo  display('cash_flow'); ?></a></li>
                                                                          <li class="treeview  "><a href="<?php echo base_url(); ?>/accounts/coa_print"><?php echo  display('coa_print'); ?></a></li>
                                                                          <li class="treeview  "><a href="<?php echo base_url(); ?>/accounts/balance_sheet"><?php  echo display('Balance Sheet');?></a></li>
                                            </ul>   

            </li>
                        </ul>
            </li>
           <!-- New Account End -->
           <?php            
            break;
 }
 } ?>




<?php 
     foreach(  $this->session->userdata('admin_data') as $admtest){
     $split=explode('-',$admtest);
     if(trim($split[0])=='bank'){
      ?>


            <!-- Bank menu start -->
                          <li class="treeview  ">
                <a href="#">
                    <i class="ti-briefcase"></i><span><?php  echo display('bank'); ?></span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                                          <li class="treeview  "><a href="<?php echo base_url(); ?>/Csettings/index"><?php  echo display('add_new_bank'); ?></a></li>
                                
                                      <li class="treeview  "><a href="<?php echo base_url(); ?>/Csettings/bank_list"><?php  echo display('manage_bank'); ?></a></li>
                                                      <li class="treeview  "><a href="<?php echo base_url(); ?>/Csettings/bank_transaction"><?php  echo display('bank_transaction'); ?></a></li>
                
                                      <li class="treeview  "><a href="<?php echo base_url(); ?>/Csettings/ledger_lists"><?php  echo display('bank_ledger'); ?></a></li>
                                </ul>
            </li>
                    <!-- Bank menu end -->
                    <?php            
            break;
 }
 } ?>




<?php 
     foreach(  $this->session->userdata('admin_data') as $admtest){
     $split=explode('-',$admtest);
     if(trim($split[0])=='hrm'){
      ?>


                <!-- Human Resource New menu start -->
                        <li class="treeview  ">
                <a href="#">
                    <i class="fa fa-balance-scale"></i><span><?php  echo display('hrm_management'); ?></span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="treeview  "><a href="<?php echo base_url(); ?>/Chrm/manage_employee"><?php  echo display('Employee Info (W4 form)');?></a></li>
                                        <!-- <li class="treeview  "><a href="<?php //echo base_url(); ?>/Chrm/add_employee"><?php  echo display('Employee Info (W4 form)');?></a></li> -->
                                        <li class="treeview  "><a href="<?php echo base_url(); ?>/Chrm/manage_timesheet"><?php  echo display('Time sheet');?></a></li>

                                                            <li class="treeview  "><a href="<?php echo base_url(); ?>/Chrm/pay_slip_list"><?php  echo display('Pay slip / Checks per user');?></a></li>
                                            <li class="treeview  "><a href="<?php echo base_url(); ?>/Chrm/payroll_setting"><?php  echo display('Payroll settings');?></a></li>
                    

                                          <li class="treeview  "><a href="<?php echo base_url(); ?>/Chrm/expense_list"><?php echo display("expense");?></a></li>
                    



                                           <li class="treeview  "><a href="<?php echo base_url(); ?>/Chrm/add_office_loan"><?php echo display("office_loan");?></a></li>
                    


                                         <li class="treeview  "><a href="<?php echo base_url(); ?>/Chrm/payroll_reports"><?php  echo display('Payroll reports');?></a></li>
                    


                </ul>
            </li>
                         <!-- Human Resource New menu end -->
                         <?php            
            break;
 }
 } ?>






<?php 
     foreach(  $this->session->userdata('admin_data') as $admtest){
     $split=explode('-',$admtest);
     if(trim($split[0])=='email'){
      ?>



                   
            <li class="treeview  ">

             <a href="<?php echo base_url(); ?>/Cweb_setting/email_setting">
                    <i class="ti-user"></i><span><?php echo display('email'); ?></span>
                 
                </a>
          
            </li>
             
            <?php            
            break;
 }
 } ?>

              
         


          
<?php 
     foreach(  $this->session->userdata('admin_data') as $admtest){
     $split=explode('-',$admtest);
     if(trim($split[0])=='setting'){
      ?>

 

            

            <!-- Software Settings menu start -->
            <li class="treeview  ">
                <a href="#">
                    <i class="ti-settings"></i><span><?php echo display('settings'); ?></span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">




                <li class="treeview  ">

<a href="fa fa-asl-interpreting">
       <i class="ti-user"></i><span><?php echo display('Manage Invoice Template') ?></span>
    
   </a>


   <ul class="treeview-menu">
           <li class="treeview">
                        <a href="<?php echo base_url('Cweb_setting/invoice_template') ?>"><?php echo display('Sales Invoice'); ?> </a>
                    </li>
                    <li class="treeview">
                        <a href="<?php echo base_url('Cweb_setting/invoice_design') ?>"><?php echo display('Invoice Design'); ?></a>
                    </li>
                    <li class="treeview">
                        <a href="<?php echo base_url('Cweb_setting/invoice_content') ?>"><?php echo display('Invoice Content'); ?></a>
                    </li>


</ul>
</li>

 






                      <li class="treeview  ">
                <a href="">
                  
               <i class="fa-solid fa-list"></i> <span><?php echo display('Template Content') ?></span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>

                <ul class="treeview-menu">
                
                        <li class="treeview"><a href=""><?php echo display('Email Template') ?></a></li>


                   


                        <li class="treeview  ">
                <a href="#">
                    <i class=" "></i> <span><?php echo display('Alerts Template') ?></span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                
                                     
                    
                <li class="treeview  ">
                <a href="#">
                    <i class=""></i> <span><?php echo display('Sale Template') ?></span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                                     
 
         



                      <li class="treeview  ">
                <a href="#">
                    <i class=""></i> <span><?php echo display('new_invoice'); ?></span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                
                
                      <li class="treeview  "><a href=""><?php echo display('Payment Due date');?></a></li>
                      <li class="treeview  "><a href=""><?php echo display('Estimated Time of Arrival');?> </a></li>
                      <li class="treeview  "><a href=""><?php echo display('Estimated Time of Departure');?></a></li>


 
                </ul>
             </li>


             <li class="treeview  ">
                <a href="#">
                    <i class=""></i> <span><?php echo display('Ocean Export tracking'); ?></span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                
                
                      <li class="treeview  "><a href=""><?php echo display('Estimated Time of Arrival');?>  </a></li>
                      <li class="treeview  "><a href=""><?php echo display('Estimated Time of Departure');?></a></li>
                   


 
                </ul>
             </li>


             <li class="treeview  ">
                <a href="#">
                    <i class=""></i> <span><?php echo display('Road Transport');?></span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                
                
                      <li class="treeview  "><a href=""><?php echo display('Container / Goods Pick up date');?></a></li>
                      <li class="treeview  "><a href=""> <?php echo display('Delivery date');?></a></li>
                 


 
                </ul>
             </li>
         
              </ul>
             </li> 
         
                    




                    </li>







                        
                      <li class="treeview  ">
                <a href="#">
                    <i class=""></i> <span>Expense Template</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                
                
                    

            <li class="treeview  ">
                <a href="#">
                    <i class=""></i> <span><?php echo display('new_purchase'); ?></span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                      <li class="treeview  "><a href=""><?php echo display('Payment Due Date');?>      </a></li>
                      <li class="treeview  "><a href=""><?php echo display('Estimated Time of Arrival');?>      </a></li>
                      <li class="treeview  "><a href=""><?php echo display('Estimated Time of Departure');?> </a></li>

                </ul>
             </li>






         <li class="treeview  ">
                <a href="#">
                    <i class=""></i> <span><?php echo display('Purchase Order');?></span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                      <li class="treeview  "><a href="">Est. Shipment date  </a></li>
                </ul>
             </li>




           <li class="treeview  ">
                <a href="#">
                    <i class=""></i> <span><?php echo display('Ocean Import tracking');?></span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                      <li class="treeview  "><a href=""><?php echo display('Estimated Time of Arrival');?>  </a></li>
                      <li class="treeview  "><a href=""><?php echo display('Estimated Time of Departure');?></a></li>            
                </ul>
             </li>




                      <li class="treeview  ">
                <a href="#">
                    <i class=""></i> <span><?php echo display('Road Transport');?></span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                
                
                      <li class="treeview  "><a href=""> <?php echo display('Container / Goods Pick up date');?>  </a></li>
                      <li class="treeview  "><a href=""><?php echo display('Delivery date');?></a></li>
                   


 
                </ul>
             </li>


 
                </ul>
             </li>

                        
 
                </ul>
             </li>
         

       

                </ul>
             </li>









                      <!-- Software Settings menu start -->
                          <li class="treeview  ">
                <a href="#">
                    <i class="ti-settings"></i> <span><?php echo display('settings'); ?></span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                                         <li class="treeview  "><a href="<?php echo base_url(); ?>/Company_setup/manage_company"><?php  echo display('Manage my Company'); ?></a></li>
                                                
                                                    <li class="treeview  "><a href="<?php echo base_url(); ?>/Language"><?php  echo display('language'); ?> </a></li>
                                                      <li class="treeview  "><a href="<?php echo base_url(); ?>/Currency"><?php  echo display('currency'); ?> </a></li>
                                                    <li class="treeview  "><a href="<?php echo base_url(); ?>/Cweb_setting"><?php  echo display('setting'); ?> </a></li>
                
                                     <li class="treeview  "><a href="<?php echo base_url(); ?>/Cweb_setting/mail_setting"><?php  echo display('mail_setting'); ?> </a></li>
                                 <li style="display:none" class="treeview  "><a href="<?php echo base_url(); ?>/Cweb_setting/app_setting"><?php echo  display('app_setting');  ?> </a></li>
                </ul>
            </li>
                 <!-- Role permission start -->




              <li class="treeview  ">
                <a href="#">
                    <i class="ti-key"></i> <span><?php echo display('role_permission');  ?></span>
                    <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
             
                                            <li class="treeview  "><a href="<?php echo base_url(); ?>/Permission/add_role"><?php echo display('add_role'); ?></a></li>
                                                                  <li class="treeview  "><a href="<?php echo base_url(); ?>/Permission/role_list"><?php echo display('role_list');  ?></a></li>
                                                                <li class="treeview  "><a href="<?php echo base_url(); ?>/Permission/user_assign"><?php echo  display("user_assign_role");  ?></a></li>
                                     

                    </ul>
                </li>
                            <!-- Role permission End -->
                 <!-- sms menu start -->
                 <li class="treeview  ">
                <a href="#">
                    <i class="fa fa-comments"></i> <span>SMS</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                
                
                      <li class="treeview  "><a href="<?php echo base_url(); ?>/Csms/configure"><?php echo display('sms_configure'); ?></a></li>
                     
 
                </ul>
             </li>
         


                          <!-- sms menu start -->
                 <li class="treeview  ">
                <a href="<?php echo base_url(); ?>/Cservice/help_desk">
                    <i class="fa fa-comments"></i> <span><?php echo display('Help');?></span>
                   
                </a>
         
             </li>
         

             <?php            
            break;
 }
 } ?>


<li class="treeview  ">

     <li class="treeview  "><a href="<?php echo base_url(); ?>User/manage_user"><?php echo display('manage_users'); ?></a></li>
     
     </li>










<?php 

}





if($_SESSION['u_type']==3)
{ 

    ?>
        <!-- user 3 -->

<ul class="sidebar-menu">

            <li class="active">
                <a href="<?php echo base_url(); ?>/"><i class="ti-dashboard"></i> <span><?php echo display('dashboard'); ?></span>
                    <span class="pull-right-container">
                        <span class="label label-success pull-right"></span>
                    </span>
                </a>
            </li>



 <?php 
foreach(  $this->session->userdata('perm_data') as $test){
    $split=explode('-',$test);
    if(trim($split[0])=='sales'){
        ?>


    <!-- Invoice menu start -->
                        <li class="treeview  ">
                <a href="#">
                    <i class="fa fa-balance-scale"></i><span><?php echo display('invoice');?></span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                                        <li class="treeview  "><a href="<?php echo base_url(); ?>/Cinvoice/manage_invoice"><?php echo display('New Sale');?></a></li>
                                                    <li class="treeview  "><a href="<?php echo base_url(); ?>/Cinvoice/manage_profarma_invoice"><?php echo display('Profarma Invoice');?></a></li>
                                            <li class="treeview  "><a href="<?php echo base_url(); ?>/Cinvoice/manage_ocean_export_tracking"><?php echo display('Ocean Export Tracking');?></a></li>
                                            <li class="treeview  "><a href="<?php echo base_url(); ?>/Cinvoice/manage_trucking"><?php echo display('Road Transport');?></a></li>
                    

                </ul>
            </li>
                   
                        <!-- Invoice menu end -->

       
<?php 
break;
}
}
foreach(  $this->session->userdata('perm_data') as $test){
    $split=explode('-',$test);

    if(trim($split[0])=='customer'){


   
        ?>

                <!-- Customer menu start -->
                        <li class="treeview  ">

             <a href="<?php echo base_url(); ?>/Ccustomer/manage_customer">
                    <i class="fa fa-handshake-o"></i><span><?php echo  display('customer');  ?></span>
               
                </a>


            </li>
                         <!-- Customer menu end -->



<?php 
break;
}
//break;
}
  foreach(  $this->session->userdata('perm_data') as $test){
    $split=explode('-',$test);
    if(trim($split[0])=='product'){
        ?>


               <!-- Product menu start -->
                       <li class="treeview  ">

             <a href="<?php echo base_url(); ?>/Cproduct/manage_product">
                    <i class="ti-bag"></i><span><?php  echo  display('product'); ?></span>
                 
                </a>

       
          
            </li>
                         <!-- Product menu end -->


<?php 
break;
}
  }
 foreach(  $this->session->userdata('perm_data') as $test){
    $split=explode('-',$test);
    if(trim($split[0])=='supplier'){
  
        ?>

                    <!-- Supplier menu start -->
                       <li class="treeview  ">

             <a href="<?php echo base_url(); ?>/Csupplier/manage_supplier">
                    <i class="ti-user"></i><span><?php echo  display('Vendor');?></span>
                 
                </a>

           
       
          
            </li>
                         <!-- Supplier menu end -->

<?php break;
}
 }
  foreach(  $this->session->userdata('perm_data') as $test){
    $split=explode('-',$test);
    if(trim($split[0])=='purchase'){
 
        ?>

            
                     <!-- Purchase menu start -->



                                  <li class="treeview  ">
                <a href="#">
                    <i class="ti-shopping-cart"></i><span><?php echo  display('purchase');  ?></span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                                         <li class="treeview  "><a href="<?php echo base_url(); ?>/Cpurchase/manage_purchase"><?php echo display('new_purchase'); ?></a></li>
                                                                <li class="treeview  "><a href="<?php echo base_url(); ?>/Cpurchase/manage_purchase_order"><?php echo display('Purchase Order');?></a></li>
                       


            

                                            <li class="treeview  "><a href="<?php echo base_url(); ?>/Ccpurchase/manage_ocean_import_tracking"><?php echo display('Ocean Import Tracking');?></a></li>
                       

                                            <li class="treeview  "><a href="<?php echo base_url(); ?>/Ccpurchase/manage_trucking"><?php echo display('Road Transport');?></a></li>
                                       </ul>
            </li>
        
<?php 
break;
}
  }
    foreach(  $this->session->userdata('perm_data') as $test){
    $split=explode('-',$test);
    if(trim($split[0])=='quotation'){

        ?>

          
            <!-- Purchase menu end -->  
             <!-- Quotation Menu Start -->
                     <li class="treeview  ">
                <a href="<?php echo base_url(); ?>/Cquotation/manage_quotation">
                    <i class="fa fa-book"></i><span><?php echo  display('Quotation');?></span>
                   
                </a>
              
            </li>
              <?php break;
}
    }

 foreach(  $this->session->userdata('perm_data') as $test){
    $split=explode('-',$test);
    if(trim($split[0])=='stock'){
        ?>      <!-- quotation Menu end -->
             <!-- Stock menu start -->
                    <li class="treeview ">
            <a href="#">
                <i class="ti-bar-chart"></i><span><?php echo  display('stock'); ?></span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                                 <li class="treeview  "><a href="<?php echo base_url(); ?>/Creport"><?php echo  display('Stock Report'); ?></a></li>
            
            </ul>
        </li>
            <!-- Stock menu end -->

<?php break;
}
 }

  foreach(  $this->session->userdata('perm_data') as $test){
    $split=explode('-',$test);
    if(trim($split[0])=='tax'){

        ?>


        <!-- Taxes menu start -->
                    <li class="treeview ">
            <a href="<?php echo base_url(); ?>/Caccounts/manage_tax">
                <i class="ti-bar-chart"></i><span><?php echo  display('Taxes'); ?></span>
           
            </a>
         

        </li>
            <!-- Taxes menu end -->


<?php 
break;
}
  }


    foreach(  $this->session->userdata('perm_data') as $test){
    $split=explode('-',$test);
    if(trim($split[0])=='return'){

        ?>
                    <li class="treeview  ">
                <a href="#">
                    <i class="fa fa-retweet" aria-hidden="true"></i><span><?php echo  display('return'); ?></span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                                         <li class="treeview  "><a href="<?php echo base_url(); ?>/Cretrun_m"><?php echo  display('return'); ?></a></li>
                                                               <li class="treeview  "><a href="<?php echo base_url(); ?>/Cretrun_m/return_list"><?php echo  display('stock_return_list'); ?></a></li>
                                                               <li class="treeview  "><a href="<?php echo base_url(); ?>/Cretrun_m/supplier_return_list"><?php echo  display('supplier_return_list'); ?></a></li>
                                                              <li class="treeview  "><a href="<?php echo base_url(); ?>/Cretrun_m/wastage_return_list"><?php echo  display('wastage_return_list'); ?></a></li>
                      
                </ul>
            </li>

<?php 
break;
}
    }


    foreach(  $this->session->userdata('perm_data') as $test){
    $split=explode('-',$test);
    if(trim($split[0])=='report'){
  
        ?>

            <!-- Report menu start -->
                         <li class="treeview  ">
                <a href="#">
                    <i class="ti-book"></i><span><?php  echo display('report'); ?></span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                                      <li class="treeview  "><a href="<?php echo base_url(); ?>/Admin_dashboard/closing"><?php echo display('closing'); ?></a></li>
                                                  <li class="treeview  "><a href="<?php echo base_url(); ?>/Admin_dashboard/closing_report"><?php echo display('closing_report'); ?></a></li>
                                                     <li class="treeview  "><a href="<?php echo base_url(); ?>/Admin_dashboard/all_report"><?php echo  display('todays_report');  ?></a></li>
                                                      <li class="treeview  "><a href="<?php echo base_url(); ?>/Admin_dashboard/todays_customer_receipt"><?php echo  display('todays_customer_receipt');  ?></a></li>
                                                      <li class="treeview  "><a href="<?php echo base_url(); ?>/Admin_dashboard/todays_sales_report"><?php  echo display('sales_report'); ?></a></li>
                                                                 <li class="treeview  "><a href="<?php echo base_url(); ?>/Admin_dashboard/user_sales_report"><?php  echo display('user_wise_sales_report'); ?></a></li>
                                                          <li class="treeview  "><a href="<?php echo base_url(); ?>/Admin_dashboard/retrieve_dateWise_DueReports"><?php echo  display('due_report');  ?></a></li>
                                                                 <li class="treeview  "><a href="<?php echo base_url(); ?>/Admin_dashboard/retrieve_dateWise_Shippingcost"><?php echo  display('shipping_cost_report');  ?></a></li>
                                                        <li><a href="<?php echo base_url(); ?>/Admin_dashboard/todays_purchase_report"><?php echo  display('purchase_report');  ?></a></li>
                                                      <li class="treeview  "><a href="<?php echo base_url(); ?>/Admin_dashboard/purchase_report_category_wise"><?php echo  display('purchase_report_category_wise');  ?></a></li>
                                                      <li class="treeview  "><a href="<?php echo base_url(); ?>/Admin_dashboard/product_sales_reports_date_wise"><?php echo  display('sales_report_product_wise');  ?></a></li>
                                                      <li class="treeview  "><a href="<?php echo base_url(); ?>/Admin_dashboard/sales_report_category_wise"><?php echo  display('sales_report_category_wise');  ?></a></li>
                                                                <li class="treeview  "><a href="<?php echo base_url(); ?>/Admin_dashboard/sales_return"><?php echo  display('invoice_return');  ?></a></li>
                                                                    <li class="treeview  "><a href="<?php echo base_url(); ?>/Admin_dashboard/supplier_return"><?php echo display('supplier_return'); ?></a></li>
                                                                  <li class="treeview  "><a href="<?php echo base_url(); ?>/Admin_dashboard/retrieve_dateWise_tax"><?php echo display('tax_report'); ?></a></li>
                                                                  <li class="treeview  "><a href="<?php echo base_url(); ?>/Admin_dashboard/total_profit_report"><?php  echo display('profit_report');?></a></li>
                                                                                                                  <li class="treeview  "><a href="<?php echo base_url(); ?>/Creport/product_stock"><?php  echo display('stock_report_product_wise');?></a></li>
                                                                </ul>
            </li>
                    <!-- Report menu end -->

<?php 
break;
}
    }
    
    foreach(  $this->session->userdata('perm_data') as $test){
    $split=explode('-',$test);
    if(trim($split[0])=='accounts'){

        ?>
<!--New Account start-->
             <li class="treeview  ">
                <a href="#">
                    <i class="fa fa-money"></i><span><?php echo display('accounts'); ?></span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                  <li class="treeview  "><a href="<?php echo base_url(); ?>/accounts/financial_year"><?php echo display('Financial Year'); ?></a></li>
                                        <li class="treeview  "><a href="<?php echo base_url(); ?>/accounts/financial_year_end"><?php echo display('Financial Year Ending'); ?></a></li>           
                <li class="treeview  "><a href="<?php echo base_url(); ?>/accounts/show_tree"><?php echo display('c_o_a');  ?></a></li>
                                                     <li class="treeview  "><a href="<?php echo base_url(); ?>/accounts/supplier_payment"><?php echo display('supplier_payment');  ?></a></li>
                                                              <li class="treeview  "><a href="<?php echo base_url(); ?>/accounts/customer_receive"><?php echo  display('customer_receive');  ?></a></li>
                    
                                         <li class="treeview  "><a href="<?php echo base_url(); ?>/accounts/cash_adjustment"><?php echo display('cash_adjustment');  ?></a></li>
                                                             <li class="treeview  "><a href="<?php echo base_url(); ?>/accounts/debit_voucher"><?php  echo display('debit_voucher');?></a></li>
                                                                <li class="treeview  "><a href="<?php echo base_url(); ?>/accounts/credit_voucher"><?php echo display('credit_voucher');  ?></a></li>
                                         
                                             <li class="treeview  "><a href="<?php echo base_url(); ?>/accounts/contra_voucher"><?php  echo display('contra_voucher'); ?></a></li>
                                                                   <li class="treeview  "><a href="<?php echo base_url(); ?>/accounts/journal_voucher"><?php echo display('journal_voucher');?></a></li> 
                     
                                             <li class="treeview  "><a href="<?php echo base_url(); ?>/accounts/aprove_v"><?php echo  display('voucher_approval');?></a></li> 
                                                                      <li class="treeview  "><a href=""><?php  echo display('report');?>                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                             <li class="treeview  "><a href="<?php echo base_url(); ?>/accounts/voucher_report"><?php echo display('Voucher Report'); ?></a></li>
                                     <li class="treeview  "><a href="<?php echo base_url(); ?>/accounts/cash_book"><?php echo display('cash_book'); ?></a></li>
                                                     <li class="treeview  "><a href="<?php echo base_url(); ?>/accounts/inventory_ledger"><?php echo display('inventory_ledger');  ?></a></li>
                                                              <li class="treeview  "><a href="<?php echo base_url(); ?>/accounts/bank_book"><?php echo display('bank_book');  ?></a></li>
                                                                        <li class="treeview  "><a href="<?php echo base_url(); ?>/accounts/general_ledger"><?php  echo display('general_ledger'); ?></a></li>
                                                                         <li class="treeview  "><a href="<?php echo base_url(); ?>/accounts/trial_balance"><?php echo display('trial_balance');  ?></a></li>
                                                   <li class="treeview  "><a href="<?php echo base_url(); ?>/accounts/profit_loss_report"><?php echo  display('profit_loss'); ?></a></li>
                                                   <li class="treeview  "><a href="<?php echo base_url(); ?>/accounts/cash_flow_report"><?php echo  display('cash_flow'); ?></a></li>
                                                                          <li class="treeview  "><a href="<?php echo base_url(); ?>/accounts/coa_print"><?php echo  display('coa_print'); ?></a></li>
                                           <li class="treeview  "><a href="<?php echo base_url(); ?>/accounts/balance_sheet"><?php echo display('Balance Sheet'); ?></a></li>
                                            </ul>   

            </li>
                        </ul>
            </li>
            <?php 
            break;

}
    }


foreach(  $this->session->userdata('perm_data') as $test){
    $split=explode('-',$test);
    if(trim($split[0])=='bank'){
   
        ?>
           <!-- New Account End -->

            <!-- Bank menu start -->
                                            <li class="treeview  ">
                <a href="#">
                    <i class="ti-briefcase"></i><span><?php  echo display('bank'); ?></span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                                          <li class="treeview  "><a href="<?php echo base_url(); ?>/Csettings/index"><?php  echo display('add_new_bank'); ?></a></li>
                                
                                      <li class="treeview  "><a href="<?php echo base_url(); ?>/Csettings/bank_list"><?php  echo display('manage_bank'); ?></a></li>
                                                      <li class="treeview  "><a href="<?php echo base_url(); ?>/Csettings/bank_transaction"><?php  echo display('bank_transaction'); ?></a></li>
                
                                      <li class="treeview  "><a href="<?php echo base_url(); ?>/Csettings/bank_ledger"><?php  echo display('bank_ledger'); ?></a></li>
                                </ul>
            </li>
                    <!-- Bank menu end -->

           
<?php 
break;
}
}
    foreach(  $this->session->userdata('perm_data') as $test){
    $split=explode('-',$test);
    if(trim($split[0])=='hrm_management'){
  
        ?>


           






                <!-- Human Resource New menu start -->
                                    <li class="treeview  ">
                <a href="#">
                    <i class="fa fa-balance-scale"></i><span><?php  echo display('hrm_management'); ?></span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="treeview  "><a href="<?php echo base_url(); ?>/Chrm/manage_employee"><?php  echo display('Employee Info (W4 form)');?></a></li>
                                        <!-- <li class="treeview  "><a href="<?php echo base_url(); ?>/Chrm/add_employee"><?php  echo display('Employee Info (W4 form)');?></a></li> -->
                                        <li class="treeview  "><a href="<?php echo base_url(); ?>/Chrm/manage_timesheet"><?php  echo display('Time sheet');?></a></li>
                                     
                                                            <li class="treeview  "><a href="<?php echo base_url(); ?>/Chrm/pay_slip_list"><?php  echo display('Pay slip / Checks per user');?></a></li>
                                            <li class="treeview  "><a href="<?php echo base_url(); ?>/Chrm/payroll_setting"><?php  echo display('Payroll settings');?></a></li>
                    

                                          <li class="treeview  "><a href="<?php echo base_url(); ?>/Chrm/expense_list"><?php echo display("expense");?></a></li>
                    



                                           <li class="treeview  "><a href="<?php echo base_url(); ?>/Chrm/add_office_loan"><?php echo display("office_loan");?></a></li>
                    


                                         <li class="treeview  "><a href="<?php echo base_url(); ?>/Chrm/payroll_reports"><?php  echo display('Payroll reports');?></a></li>
                    


                </ul>
            </li>
               

              
         <?php 
         break;
}
    }


       foreach(  $this->session->userdata('perm_data') as $test){
    $split=explode('-',$test);
    if(trim($split[0])=='service'){


        ?>





      
            <!-- service menu start -->


                            
                             
            <li class="treeview  ">

             <a href="<?php echo base_url(); ?>/Cservice/manage_service">
                    <i class="ti-user"></i><span>Service</span>
                 
            </a>

           
       
          
            </li>
                         <!-- service menu end -->



<?php 
break;
}

       }    
                              
     ?>       
             



           

        </ul>
        <!-- /.User 3 -->
    </div> <!-- /.sidebar -->

<?php } ?>
</aside>
