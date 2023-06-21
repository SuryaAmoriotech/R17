<!-- Add new tax start -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="<?php echo base_url() ?>my-assets/js/admin_js/account.js" type="text/javascript"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css"/>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/jquery.base64.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/drag_drop_index_table.js"></script>
  <script type="text/javascript" src="<?php echo base_url()?>assets/js/html2canvas.js"></script>
 <script type="text/javascript" src="<?php echo base_url()?>assets/js/jspdf.plugin.autotable"></script>
  <script type="text/javascript" src="<?php echo base_url()?>assets/js/jspdf.umd.js"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap/3/css/bootstrap.css" />
<script type="text/javascript" src="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />
 <script type="text/javascript" src="<?php echo base_url()?>my-assets/js/tableManager.js"></script>
<script type="text/javascript" src="https://unpkg.com/xlsx@0.15.1/dist/xlsx.full.min.js"></script>
<script type="text/javascript" src="http://mrrio.github.io/jsPDF/dist/jspdf.debug.js"></script>
<input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>my-assets/css/css.css" />
<script type="text/javascript" src="http://www.bacubacu.com/colresizable/js/colResizable-1.5.min.js"></script>


<div class="content-wrapper">

    <section class="content-header">

        <div class="header-icon">

            <i class="pe-7s-note2"></i>

        </div>

        <div class="header-title">

            <h1><?php echo display('add_tax') ?></h1>

            <small></small>

            <ol class="breadcrumb">

                <li><a href="#"><i class="pe-7s-home"></i> <?php echo display('home') ?></a></li>

                <li><a href="#"><?php echo display('accounts') ?></a></li>

                <li class="active"><?php echo display('add_tax') ?></li>

            </ol>

        </div>

    </section>



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



        <div class="row">

            <div class="col-sm-12">

                <div class="column">

 <?php if($this->permission1->method('manage_tax','read')->access()){ ?>

                  <a href="<?php echo base_url('Caccounts/tax_list')?>" class="btn btn-success m-b-5 m-r-2"><i class="ti-align-justify"> </i>  <?php echo display('manage_tax')?> </a>

              <?php }?>



                </div>

            </div>

        </div>



        <!-- new tax -->

        <div class="row">

            <div class="col-sm-12">

                <div class="panel panel-bd lobidrag">

                    <div class="panel-heading">

                        <div class="panel-title">


                        </div>

                    </div>

                   <?php echo form_open_multipart('Caccounts/tax_entry',array('class' => 'form-vertical','id' => 'tax_entry' ))?>

                    <div class="panel-body">

                        <p><?php echo display('Create a name for your tax rate, and give us a few details about how you want to apply it') ?>.</p>

                    	<div class="form-group row">

                        <label for="enter_tax" class="col-sm-3 col-form-label"><?php echo display('enter_tax') ?> <i class="text-danger">*</i></label>

<div class="col-sm-6">

    <input type="text" class="form-control" name="enter_tax" id="enter_tax" required="" placeholder="<?php echo display('enter_tax') ?>" />

</div>

                            <div class="col-sm-2">

                                <i class="text-success">%</i>

                            </div>

                        </div>




                        <div class="form-group row">

                        <label for="description" class="col-sm-3 col-form-label"><?php echo display('Description') ?> <i class="text-danger">*</i></label>

<div class="col-sm-6">

    <textarea class="form-control" name="description" id="description" required=""> </textarea>

                            </div>

                         

                        </div>


                         <div class="form-group row">

                         <label for="tax_agency" class="col-sm-3 col-form-label"><?php echo display('Tax Agency') ?> <i class="text-danger">*</i></label>

<div class="col-sm-6">

     <select name="tax_agency" class="form-control">
        <option value=""><?php echo display('GST') ?></option>
        <option value="VAT" rel=""><?php echo display('VAT') ?></option>
        <option value="Service Tax" rel="" selected=""><?php echo display('Service Tax') ?></option>
        <option value="Swachh Bharat Cess" rel=""><?php echo display('Swachh Bharat Cess') ?></option>
        <option value="Krishi Kalyan Cess" rel=""><?php echo display('Krishi Kalyan Cess') ?></option>
        <option value="CST" rel=""><?php echo display('CST') ?></option>
    </select>

                            </div>              
                        </div>




                        

                        <div class="form-group row">

                            

                            <div class="col-sm-6 sale_checkbox">

                               <div class="col-sm-1"> 
                                <input type="checkbox" name="is_show"  checked id="sales_tax" class="form-control" value="1">
                            </div>

                            <label for="isshow" class="col-sm-1 col-form-label"   ><?php echo display('Sales') ?></label>

                           

                            </div>

                        </div>













                        

                        <div class="checkbox_toggle">
                        <div class="form-group row">

                        
                          

                        <div class="form-group row">
<label for="sale_rate" class="col-sm-3 col-form-label"><?php echo display('Sales Rate') ?><i class="text-danger">*</i></label>
<div class="col-sm-6">
<input type="text" name="sale_rate" id="sale_rate" placeholder="%"  style="width:100%;"   class="form-control">
</div>
</div>



<div class="form-group row">
<label for="account" class="col-sm-3 col-form-label"><?php echo display('Account') ?><i class="text-danger">*</i></label>
<div class="col-sm-6">
     <select name="account" class="form-control">
                                     <option><?php echo display('Liability') ?></option>
                                     <option><?php echo display('Expense') ?></option>
    </select>
</div>
</div>


<div class="form-group row">
<label for="show_taxonreturn" class="col-sm-3 col-form-label"><?php echo display('Show Tax On Return Line') ?> <i class="text-danger">*</i></label>
<div class="col-sm-6">
     <select name="show_taxonreturn" class="form-control">
                                      <option><?php echo display('Output-Service Tax') ?></option>
                                      <option><?php echo display('Output-Education Tax') ?></option>
                                      <option><?php echo display('Output-Higher Education Tax') ?></option>
    </select>
</div>
</div>


                        </div>

                        </div>






                         <div class="form-group row">
                         <div class="col-sm-6 sale_checkbox">                       
                        <div class="checkbox_toggle2">
                        </div>
                        </div>
















                        <div class="form-group row">

<label for="example-text-input" class="col-sm-4 col-form-label"></label>

<div class="col-sm-6">

    <input type="submit" id="add-deposit" class="btnclr btn  btn-sm" style="background-color: #3CA5DE; color: #fff;" name="add-deposit" value="<?php echo display('save') ?>" />

</div>

</div>




                    </div>

                    <?php echo form_close()?>

                </div>

            </div>

        </div>

    </section>

</div>




<!-- Add new tax end -->


<script type="text/javascript">
    $('#sales_tax').click(function() {
    $("#Age").toggle(this.checked);
});
</script>

<script type="text/javascript">

$(function(){
    $(".checkbox_toggle").show();
$("#sales_tax").click(function() {
    if($(this).is(":checked")) {
        $(".checkbox_toggle").show(300);
    } else {
        $(".checkbox_toggle").hide(200);
    }
});



$(".checkbox_toggle2").hide();

$("#purchase_tax").click(function() {
    if($(this).is(":checked")) {
        $(".checkbox_toggle2").show(300);
    } else {
        $(".checkbox_toggle2").hide(200);
    }
});


});


        </script>

<style>
    .sale_checkbox label{
        margin-top: 6px;
        padding: 0;
    }
    .sale_checkbox input {
        width: 18px;
        margin: 0px !important;
    }
    .checkbox_toggle input {
        width: 57px;
    }
    .checkbox_toggle2 input {
        width: 57px;
    }
    .checkbox_toggle {
        margin-left: 15px;
    }
    .checkbox_toggle2 {
        margin-left: 15px;
    }
    .select2-container .select2-selection--single {
        height: 40px;
    }

    .select2-container--default .select2-selection--single .select2-selection__rendered {
        line-height: 38px !important;
    }

    .select2-container--default .select2-selection--single .select2-selection__arrow {
        line-height: 38px !important;
        height: 38px !important;

    }
    #select2-tax_agency-hd-container{
        display:none;
    }
    .select2-selection__rendered{
        display:none;tax_edit
    }
</style>