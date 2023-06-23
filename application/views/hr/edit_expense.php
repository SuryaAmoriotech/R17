
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>my-assets/css/css.css" />
<input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap/3/css/bootstrap.css" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css"/>

<div class="content-wrapper">

    <section class="content-header">

        <div class="header-icon">

            <i class="pe-7s-note2"></i>

        </div>

        <div class="header-title">

            <h1>Expense</h1>

            <small> </small>

            <ol class="breadcrumb">

                <li><a href="#"><i class="pe-7s-home"></i> <?php echo display('home') ?></a></li>

                <li><a href="#"><?php echo display('expense_edit') ?></a></li>

                <li class="active" style="color:orange">Edit Expense</li>

            </ol>

        </div>

    </section>

    <style>
            input {
    border: none;
    background-color: #eee;
 }
textarea:focus, input:focus{
   
    outline: none;
}
 .text-right {
    text-align: left; 
}
   
    </style>

 <section class="content emply_form">

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


        <!-- New Employee Type -->

        <div class="row">

            <div class="col-sm-12">

                <div class="panel panel-bd lobidrag">

                    <div class="panel-heading">

                        <div class="panel-title">

                            <!-- <h4>Expense Item</h4> -->

                        </div>

                    </div>

                  

                    <div class="panel-body">



                         <?php echo form_open_multipart('Chrm/update_expense/'.$expense_list[0]['id'],'id="validate"') ?>

                    <div class="form-group row">

                        <label for="first_name" class="col-sm-2 col-form-div">Expenses Name <i class="text-danger">*</i></label>

                        <div class="col-sm-4">

                            <input name="expense_name" class="form-control" type="text" placeholder="Expenses Name" required id="expense_name" value="<?php echo $expense_list[0]['expense_name']?>">
                            <input type="hidden" name="oldname" value="<?php echo $expense_list[0]['expense_name']?>">
                        </div>

                         <label for="last_name" class="col-sm-2 col-form-div">Date<i class="text-danger">*</i></label>

                        <div class="col-sm-4">
                    <input class="datepicker form-control" type="date" size="50" name="expense_date" id="expense_date" required  tabindex="4" value="<?php echo $expense_list[0]['expense_date']?>" />
                        </div>

                    </div>

                    <div class="form-group row">

                        <label for="designation" class="col-sm-2 col-form-div">Amount <i class="text-danger">*</i></label>

                        <div class="col-sm-4">
                        <span class='form-control' style='background-color: #eee;'><?php echo $currency; ?>
                <input name="expense_amount"  type="text" placeholder="Amount" required id="expense_amount" value="<?php echo $expense_list[0]['expense_amount']?>">
    </span>
                        </div>

                         <label for="phone" class="col-sm-2 col-form-div">Total Amount<i class="text-danger">*</i></label>

                        <div class="col-sm-4">
                        <span class='form-control' style='background-color: #eee;'><?php   echo $currency; ?>
                            <input name="total_amount"  type="text" placeholder="Total_amount" id="phone" value="<?php echo $expense_list[0]['total_amount']?>" required>
    </span>
                        </div>

                    </div>

                    <div class="form-group row">

                         <label for="last_name" class="col-sm-2 col-form-div">Expected Payment Date<i class="text-danger">*</i></label>

                        <div class="col-sm-4">

                           <input class="datepicker form-control" type="date" size="50" name="expense_payment_date" id="expense_payment_date" value="<?php echo $expense_list[0]['expense_payment_date']?>" required  tabindex="4" />
                        </div>


                       
                    <label for="address_line_1" class="col-sm-2 col-form-div">Description</label>

                        <div class="col-sm-4">
                          

                          <input name="description" class="form-control" type="text" placeholder="<?php echo display('description') ?>" required id="address_line_1" value="<?php echo $expense_list[0]['description']?>">
                            <input type="hidden" value="<?php echo $expense_list[0]['description']?>">
                           <!-- <textarea name="description" class="form-control" value="<?php //echo $expense_list[0]['description']?>" placeholder="<?php //echo display('description') ?>" id="address_line_1"></textarea>  -->

                        </div>
                         

                    </div>

<!-- 
                    <div class="form-group row">

                         <label for="picture" class="col-sm-2 col-form-div">Attachments</label>

                        <div class="col-sm-4">

                            <input type="file" name="w4from" class="form-control"  placeholder="<?php echo display('picture') ?>" id="w4from">

                        </div>
                      

                      

                         

                    </div> -->

                    



                    <div class="form-group text-right">

                        <button type="submit" style="float:right;color:white;background-color: #38469f;"  class="btn btn-success w-md m-b-5">Save</button>

                    </div>

                <?php echo form_close() ?>

                    </div>

                

                </div>

            </div>

        </div>

    </section>

</div>