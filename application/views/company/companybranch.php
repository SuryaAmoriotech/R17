


<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css"/>
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap/3/css/bootstrap.css" />
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>my-assets/css/css.css" />







<!-- Add User start -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<div class="content-wrapper">
    <section class="content-header">
        <div class="header-icon">
            <i class="pe-7s-note2"></i>
        </div>
        <div class="header-title">
            <h1><?php echo display('Create Company Branch' )?></h1>
            <small></small>
            <ol class="breadcrumb">
                <li><a href="index.html"><i class="pe-7s-home"></i> <?php echo display('home') ?></a></li>
                <li><a href="#"><?php echo display('web_settings') ?></a></li>
                <li class="active" style="color:orange;" ><?php echo ('Company Branch')?></li>
            </ol>
        </div>
    </section>
<style>
.select2{
    display:none;
}
    </style>
    <section class="content">
        <!-- Alert Message -->
        <?php
            $message = $this->session->userdata('message');
            if (isset($message)) {
        ?>
        <div class="alert alert-info alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <?php echo $message ?>                    
        </div>
        <?php 
            $this->session->unset_userdata('message');
            }
            $error_message = $this->session->userdata('error_message');
            if (isset($error_message)) {
        ?>
        <div class="alert alert-danger alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <?php echo $error_message ?>                    
        </div>
        <?php 
            $this->session->unset_userdata('error_message');
            }
        ?>


        <div class='row'> 
                    
        </div>
        <!-- New user -->
        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-bd lobidrag">
              

                    <div class="panel-heading">
                        <div class="panel-title">
                        </div>
                    </div>
                    
                    <div class="panel-body">
                    <?php echo form_open_multipart('User/company_insert_branch');?>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label"><?php echo display('CompanyName') ?><i class="text-danger">*</i></label>
                          
                            <div class="col-sm-6">
                                <input type="text" tabindex="1" class="form-control" name="company_name" id="company_name" placeholder="Enter your Companyname" required />
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label"><?php echo display('CompanyEmail') ?><i class="text-danger">*</i></label>
                          
                            <div class="col-sm-6">
                                <input type="text" tabindex="1" class="form-control" name="email" id="email" required placeholder="Enter your Companyemail" />
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label"><?php echo display('Mobile') ?><i class="text-danger">*</i></label>
                          
                            <div class="col-sm-6">
                                <input type="number" tabindex="1" class="form-control" name="mobile" id="mobile" required placeholder="Enter your mobile" />
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label"><?php echo display('Address') ?><i class="text-danger">*</i></label>
                          
                            <div class="col-sm-6">
                                <input type="text" tabindex="1" class="form-control" name="address" id="address" placeholder="Enter your address" />
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label"><?php echo display('Website') ?><i class="text-danger">*</i></label>
                          
                            <div class="col-sm-6">
                                <input type="text" tabindex="1" class="form-control" name="website" id="website" placeholder="Enter your website" required />
                            </div>
                        </div>

                 
                  

                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-4 col-form-label"></label>
                            <div class="col-sm-6">
                                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
                                    <input type="hidden" name="uid" value="<?php echo $_SESSION['user_id']; ?>">
                                <input type="submit" id="add-customer" style="color:white;background-color:#38469f;" class="btnclr btn m-b-5 m-r-2" name="add-user" value="<?php echo display('save') ?>" tabindex="6"/>
              
								
                            </div>
                        </div>
                   <?php echo form_close(); ?>
                    </div>
                 
                </div>
            </div>
        </div>
    </section>
</div>

