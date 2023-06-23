<!-- Add Prerson start -->

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<style>
    .select2{
        display:none;
    }
    </style>
<div class="content-wrapper">
    <section class="content-header" style="height: 70px;">
        <div class="header-icon">
            <i class="pe-7s-note2"></i>
        </div>
        <div class="header-title">
            <h1><?php echo ('Edit Office Loan') ?></h1>
            <small><?php //echo display('add_loan') ?></small>
            <ol class="breadcrumb">
                <li><a href="#"><i class="pe-7s-home"></i> <?php echo display('home') ?></a></li>
                <li><a href="#"><?php echo display('office_loan') ?></a></li>
                <li class="active" style="color:orange;"><?php echo ('Edit office loan') ?></li>
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
               
         
            </div>
        </div>
        <style>
            input {
    border: none;
    background-color: #eee;
 }
textarea:focus, input:focus{
   
    outline: none;
}

   
    </style>
    <?php  //print_r($bank_name); ?>
        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-bd lobidrag">
                    <div class="panel-heading">
                        <div class="panel-title"  style="height:35px;">
                        <div class="panel-title form_employee"  style="float:right ;">
                            <a href="<?php echo base_url('Chrm/manage_officeloan') ?>"   style="color:white;background-color: #38469f;"  class="btn btn-info m-b-5 m-r-2"><i class="ti-align-justify"> </i> Manage Office Loan </a>
                            </div>

                    </div>
                    </div>
                   <?php echo form_open_multipart('Cloan/submit_loan',array('class' => 'form-vertical','id' => 'inflow_entry' ))?>
                    <div class="panel-body">
<input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
                    	<div class="form-group row">
                            <input type="text" value="<?php echo  $transaction_id;  ?>"  name="transaction_id"/>
                            <label for="name" class="col-sm-3 col-form-label"><?php echo display('name') ?> <i class="text-danger">*</i></label>
                            <div class="col-sm-6">
                         
                            <select class="form-control" name="person_id" id="nameofficeloanperson"  tabindex="1">
                                    <option value="<?php echo $id; ?>"><?php echo $person_id; ?></option>
                                <?php  foreach($person_list as $person) {?>  
                                    <option value="<?php  echo $person['id']?>"><?php  echo $person['first_name']." ".$person['last_name']?></option>
                              <?php }  ?>
                            </select>


                            </div>
                        </div>



                        <div class="form-group row">
                            <label for="phone" class="col-sm-3 col-form-label"><?php echo display('phone') ?> <i class="text-danger">*</i></label>
                            <div class="col-sm-6">
                                <input type="number" class="form-control phone" name="phone" id="phone" required=""  value="<?php echo $phone; ?>" min="0" tabindex="2"/>
                            </div>
                        </div>




                        <div class="form-group row">
                            <label for="ammount" class="col-sm-3 col-form-label"><?php echo display('ammount') ?> <i class="text-danger">*</i></label>
                            <div class="col-sm-6">
                               <input type="number" class="form-control" name="ammount" id="ammount" required="" placeholder=""  value="<?php echo $debit; ?>"    min="0" tabindex="3"/>
                           

                            </div>
                        </div>


                         <div class="form-group row" id="payment_from">
                                
                                    <label for="payment_type" class="col-sm-3 col-form-label"><?php
                                        echo display('payment_type');
                                        ?> <i class="text-danger">*</i></label>
                                    <div class="col-sm-6">
                                        <select name="paytype" id="paytype" class="form-control" required="" onchange="bank_paymet(this.value)" tabindex="3">
                                         <option value="" selected disabled> <?php echo $paytype; ?></option>
                            <option value="<?php echo display('cash_payment')?>"><?php echo display('cash_payment')?></option>
                            <option value="<?php echo display('bank_payment')?>"><?php echo display('bank_payment')?></option> 
                            
                            <?php  foreach($payment_typ as $pt){ ?>
                                            <option value="<?php  echo $pt['payment_type'] ;?>"><?php  echo $pt['payment_type'] ;?></option>
                                        <?php  } ?>

                                        </select>    

                                    </div>
                                    </div>







                                    <div class="form-group row" id="bank_div">
                                <label for="bank" class="col-sm-3 col-form-label"><?php
                                    echo display('bank');
                                    ?> <i class="text-danger">*</i></label>
                                                                        <div class="col-sm-6">

                               <select name="bank_id" class="form-control"  id="bankpayment">
                                        <option value="<?php echo $bank_name1; ?>"><?php echo $bank_name1; ?></option>
                                      
                                        <?php foreach($bank_name as $bank){ ?>
                                            <option value="<?php echo $bank['bank_id']?>"><?php echo $bank['bank_name'];?></option>
                                        <?php }?>

                                    </select>
                            
                        </div>
                        </div>




  <div class="form-group row">
                            <label for="date" class="col-sm-3 col-form-label"><?php echo display('date') ?> <i class="text-danger"></i></label>
                            <div class="col-sm-6">
                               <input type="date" class="form-control datepicker" name="date" id="date" value="<?php echo date("Y-m-d");?>" placeholder="<?php echo display('date') ?>" tabindex="4"/>
                            </div>
                        </div>



                        <div class="form-group row">
                            <label for="details" class="col-sm-3 col-form-label"><?php echo display('details') ?> <i class="text-danger"></i></label>
                            <div class="col-sm-6">
                                <!-- <textarea class="form-control" name="details" id="details" value="<?php //echo $details; ?>" tabindex="5"></textarea> -->
                                <input type="text" class="form-control datepicker" name="text" id="text" value="<?php echo $details; ?>"  tabindex="4"/>

                            
                            </div>
                        </div>







                     
                      
                      
                            <div class="form-group row">
                            <label for="example-text-input" ></label>
                                <input type="submit" id="add-deposit" style="color:white;background-color:#38469f;" class="btn" name="add-deposit" value="<?php echo display('save') ?>" tabindex="7"/>

                        </div>
                      
                      
                        </div>
                    </div>
                    <?php echo form_close()?>
                </div>
            </div>
        </div>
    </section>
</div>
 

  <div class="modal-footer">

      <div class="row">
        <div class="col-sm-8">
</div>
    
<div class="col-sm-4">
    <a href="#" class="btn" style="color:white;background-color:#38469f;" data-dismiss="modal"><?php echo display('Close') ?></a>
     <input type="submit" id="addBank"  style="color:white;background-color:#38469f;"  class="btn btn-primary btn-large" name="addBank" value="<?php echo display('save') ?>"/>
     <!--  <input type="submit" class="btn btn-success" value="Submit"> -->

  </div>
  </div>  </div>

</form>
  </div>
  </div>
  </div>        