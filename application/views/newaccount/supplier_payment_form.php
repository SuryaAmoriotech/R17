<script src="<?php echo base_url() ?>my-assets/js/admin_js/account.js" type="text/javascript"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<div class="content-wrapper">
<style>

.input-symbol-euro::before {
 content: '<?php echo $currency; ?>';
  
  font-size: 1.5em;
  position: absolute;
  left: 5px;
  top: 50%;
  transform: translateY(-50%);
}
.input-symbol-euro {
      font-size: 10px;
  display: inline-block;
  position: relative;
}

    </style>
    <section class="content-header">

        <div class="header-icon">

            <i class="pe-7s-note2"></i>

        </div>

        <div class="header-title">

            <h1><?php echo display('accounts') ?></h1>

            <small><?php //echo display('supplier_payment') ?></small>

            <ol class="breadcrumb">

                <li><a href="#"><i class="pe-7s-home"></i> <?php echo display('home') ?></a></li>

                <li><a href="#"><?php echo display('accounts') ?></a></li>

                <li class="active" style="color:orange;"><?php echo display('supplier_payment') ?></li>

            </ol>

        </div>

    </section>


<style>
.select2-selection__rendered{
    display:none;
}
    </style>

    <section class="content">

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

    <div class="col-sm-12 col-md-12">

        <div class="panel panel-bd lobidrag">

            <div class="panel-heading">

                <div class="panel-title">

                    <h4>

                      <?php echo display('supplier_payment')?>   

                    </h4>

                </div>

            </div>

            <div class="panel-body">

              

                         <?php echo  form_open_multipart('accounts/create_supplier_payment','id="validate"') ?>

                     <div class="form-group row">

                        <label for="vo_no" class="col-sm-2 col-form-label"><?php echo display('voucher_no')?></label>

                        <div class="col-sm-4">

                             <input type="text" name="txtVNo" id="txtVNo" value="" class="form-control" placeholder="Voucher No">

                        </div>

                    </div> 

                     <div class="form-group row">

                        <label for="date" class="col-sm-2 col-form-label"><?php echo display('date')?><i class="text-danger">*</i></label>

                        <div class="col-sm-4">

                             <input type="text" name="dtpDate" id="dtpDate" class="form-control datepicker" value="<?php  echo date('Y-m-d');?>" required>

                        </div>

                    </div> 

                                  <div class="form-group row">

                                    <label for="payment_type" class="col-sm-2 col-form-label"><?php

                                        echo display('payment_type');

                                        ?> <i class="text-danger">*</i></label>

                                    <div class="col-sm-4">

                                        <select name="paytype" class="form-control paytype" required id="pay_type" onchange="bank_paymet(this.value)">

                                  <option value="2" selected><?php echo display('bank_payment');?></option>

                                  <option value="1"><?php echo display('cash_payment');?></option> 
<?php foreach($payment_type as $ptype){?>
    <option value="<?php echo $ptype['payment_type'];?>"><?php echo $ptype['payment_type'] ;?></option>
<?php }?>
                                        </select>

                                      



                                     

                                    </div>

                                 

                               

                    </div>



                       

                            <div class="form-group row" id="bank_div">

                                <label for="bank" class="col-sm-2 col-form-label"><?php

                                    echo display('bank');

                                    ?> <i class="text-danger">*</i></label>

                                <div class="col-sm-4">

                                   <select name="bank_id" class="form-control bankpayment " required id="bank_id">

                         <option value="">Select Bank</option>
<option value="Axis Bank Ltd.">Axis Bank Ltd.</option>
<option value="Bandhan Bank Ltd.">Bandhan Bank Ltd.</option>
<option value="Bank of Baroda">Bank of Baroda</option>
<option value="Bank of India">Bank of India</option>
<option value="Bank of Maharashtra">Bank of Maharashtra</option>
<option value="Canara Bank">Canara Bank</option>
<option value="Central Bank of India">Central Bank of India</option>
<option value="City Union Bank Ltd.">City Union Bank Ltd.</option>
<option value="CSB Bank Ltd.">CSB Bank Ltd.</option>
<option value="DCB Bank Ltd.">DCB Bank Ltd.</option>
<option value="Dhanlaxmi Bank Ltd.">Dhanlaxmi Bank Ltd.</option>
<option value="Federal Bank Ltd.">Federal Bank Ltd.</option>
<option value="HDFC Bank Ltd">HDFC Bank Ltd</option>
<option value="ICICI Bank Ltd.">ICICI Bank Ltd.</option>
<option value="IDBI Bank Ltd.">IDBI Bank Ltd.</option>
<option value="IDFC First Bank Ltd.">IDFC First Bank Ltd.</option>
<option value="Indian Bank">Indian Bank</option>
<option value="Indian Overseas Bank">Indian Overseas Bank</option>
<option value="Induslnd Bank Ltd">Induslnd Bank Ltd</option>
<option value="Jammu & Kashmir Bank Ltd.">Jammu & Kashmir Bank Ltd.</option>
<option value="Karnataka Bank Ltd.">Karnataka Bank Ltd.</option>
<option value="Karur Vysya Bank Ltd.">Karur Vysya Bank Ltd.</option>
<option value="Kotak Mahindra Bank Ltd">Kotak Mahindra Bank Ltd</option>
<option value="Nainital Bank Ltd.">Nainital Bank Ltd.</option>
<option value="Punjab & Sind Bank">Punjab & Sind Bank</option>
<option value="Punjab National Bank">Punjab National Bank</option>
<option value="RBL Bank Ltd.">RBL Bank Ltd.</option>
<option value="South Indian Bank Ltd.">South Indian Bank Ltd.</option>
<option value="State Bank of India">State Bank of India</option>
<option value="Tamilnad Mercantile Bank Ltd.">Tamilnad Mercantile Bank Ltd.</option>
<option value="UCO Bank">UCO Bank</option>
<option value="Union Bank of India">Union Bank of India</option>
<option value="YES Bank Ltd.">YES Bank Ltd.</option>
                                        <?php foreach($bank_list as $bank){?>

                                            <option value="<?php echo html_escape($bank['bank_id'])?>"><?php echo html_escape($bank['bank_name']);?></option>

                                        <?php }?>

                                    </select>

                                 

                                </div>

                             

                            </div>

                       <div class="form-group row">

                        <label for="txtRemarks" class="col-sm-2 col-form-label"><?php echo display('remark')?></label>

                        <div class="col-sm-4">

                          <textarea  name="txtRemarks" id="txtRemarks" class="form-control"></textarea>

                        </div>

                    </div> 

                   

                       <div class="table-responsive">

                            <table class="table table-bordered table-hover" id="debtAccVoucher"> 

                                <thead>

                                    <tr>

                                <th class="text-center"><?php echo display('supplier_name')?><i class="text-danger">*</i></th>

                                <th class="text-center"><?php echo display('code')?></th>

                                <th class="text-center"><?php echo display('amount')?><i class="text-danger">*</i></th>

                                          

                                    </tr>

                                </thead>

                                <tbody id="debitvoucher">

                                   

                                    <tr>

                                        <td class="" width="300">  

       <select name="supplier_id" id="supplier_id_1" class="form-control" onchange="load_supplier_code(this.value,1)" required>

        <option value="">Select Supplier</option>

     

         <?php foreach ($supplier_list as $suplier) {?>

   <option value="<?php echo html_escape($suplier->supplier_id);?>"><?php echo html_escape($suplier->supplier_name);?></option>

         <?php }?>

       </select>



                                         </td>

                                        <td><input type="text" name="txtCode" value="" class="form-control "  id="txtCode_1" readonly=""></td>

                                        <td style="width:600px;"><span class="input-symbol-euro"><input type="number" name="txtAmount" style="width:600px;text-align:start;padding-left: 20px;" placeholder="0.00"  value="" class="form-control total_price text-right"  id="txtAmount_1" onkeyup="supplierRcvcalculation(1)" required></span>

                                           </td>

                                 

                                    </tr>                              

                              

                                </tbody>                               

                             <tfoot>

                                    <tr>

                                      <td >



                                        </td>

                                        <td colspan="1" class="text-right"><label  for="reason" class="  col-form-label"><?php echo display('total') ?></label>

                                           </td>

                                        <td class="text-right">

                                          <span class="input-symbol-euro">  <input type="text" id="grandTotal" class="form-control text-right " name="grand_total" value="" placeholder="0.00"  readonly="readonly" style="width:600px;text-align:start;padding-left: 20px;" /></span>

                                        </td>

                                    </tr>

                                </tfoot>

                            </table>

                        </div>

                        <div class="form-group row">

                           

                            <div class="col-sm-12 text-right">



                                <input type="submit" id="add_receive" style="color:white;background-color: #38469f;" class="btn btn-success btn-large" name="save" value="<?php echo display('save') ?>" tabindex="9"/>

                               

                            </div>

                        </div>

                  <?php echo form_close() ?>

            </div>  

        </div>

    </div>

</div>

</section>

</div>

