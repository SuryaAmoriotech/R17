 <!-- Invoice js -->

 <script src="<?php echo base_url() ?>my-assets/js/admin_js/invoice.js" type="text/javascript"></script>
 <script src="<?php echo base_url() ?>my-assets/js/countrypicker.js" type="text/javascript"></script>


<!-- Customer type change by javascript end -->



<!-- Add New Invoice Start -->

<div class="content-wrapper">

    <section class="content-header">

        <div class="header-icon">

            <i class="pe-7s-note2"></i>

        </div>

        <div class="header-title">

            <h1><?php echo display('Edit Sale') ?></h1>

            <small></small>

            <ol class="breadcrumb">

                <li><a href="#"><i class="pe-7s-home"></i> <?php echo display('home') ?></a></li>

                <li><a href="#"><?php echo display('invoice') ?></a></li>

                <li class="active" style="color:orange;"><?php echo display('Edit Sale') ?></li>

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

    




        <!--Add Invoice -->

        <div class="row">

            <div class="col-sm-12">

                <div class="panel panel-bd lobidrag">

                    <div class="panel-heading" style="height: 60px;">
  <div class="panel-title">
<div class="Row">
                                 <div class="Column" style="float: left;">
                          <h4><?php //echo "Edit Invoice" ?></h4>
                          
                               </div> 
                                <div class="Column" style="float: right;"> <form id="histroy" method="post" >
<input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
<input type="hidden"  value="<?php echo $all_invoice[0]['payment_id']; ?>" name="payment_id" class="payment_id" id="payment_id"/>
<input type="submit" id="payment_history" name="payment_history" class="btn" style="float:right;color:white;background-color: #38469f;float:right;margin-bottom:30px;"   value="<?php echo display('Payment History') ?>"/>
                                            </form> </div> 
                             <div class="Column" style="float: right;">
                            <?php if($this->permission1->method('manage_invoice','read')->access()){ ?>

                    <a style="background-color:#38469f;color:white;" href="<?php echo base_url('Cinvoice/manage_invoice') ?>" class="btn  m-b-5 m-r-2"><i class="ti-align-justify"> </i> <?php echo display('manage_invoice') ?> </a>

                    <?php }?>
           
                     </div>    </div>






                        


                        </div>

                    </div>



                    

                 



                    

                    <div class="panel-body">

                        <?php //echo form_open_multipart('Cinvoice/manual_sales_insert',array('class' => 'form-vertical', 'id' => 'insert_sale','name' => 'insert_sale'))?>

                        <form id="insert_trucking"  method="post">  
                       
                        <div class="row">



<div class="col-sm-6" id="payment_from_1">

    <div class="form-group row">

        <label for="customer_name" class="col-sm-4 col-form-label"><?php

            echo display('customer_name');

            ?> </label>

        <div class="col-sm-8">

        <select name="customer_name" class="form-control customer_name" onselect="calculate();" id="customer_name">

        <option value="<?php echo $customer_id; ?>"><?php echo $customer_name; ?></option>

<?php foreach($customer as $customer){?>

<option value="<?php echo html_escape($customer['customer_id'])?>"><?php echo html_escape($customer['customer_name']);?></option>

<?php }?>

<input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">

            <input id="autocomplete_customer_id" class="customer_hidden_value abc" type="hidden" name="customer_id" value="{customer_name}" style="width100">

        </div>

         <?php if($this->permission1->method('add_customer','create')->access()){ ?>

      

          

      

    <?php } ?>

    </div>


</div>
                            <div class="col-sm-6" id="payment_from">

<div class="form-group row">

    <label for="payment_type" class="col-sm-4 col-form-label"><?php

        echo display('payment_type');

        ?> <i class="text-danger">*</i></label>

    <div class="col-sm-8">

    <select name="paytype" id="paytype" class="form-control" required=""  tabindex="3" style="width100">
        <option value="{paytype}">{paytype}</option>
                                        <?php  foreach($payment_type as $pt){ ?>
                                            <option value="<?php  echo $pt['payment_type'] ;?>"><?php  echo $pt['payment_type'] ;?></option>
                                        <?php  } ?>
            

        </select>

    </div>




                                 

                                </div>

                            </div>

                        </div>



                        <div class="row">

                            <div class="col-sm-6">

                                <div class="form-group row">

                                <label for="date" class="col-sm-4 col-form-label"><?php echo display('Sales Invoice date') ?> <i class="text-danger">*</i></label>

                                    <div class="col-sm-8">
                                    <?php

                               

$date = date('Y-m-d');

                                   ?>

                                    <input class=" form-control" type="date" size="50" name="invoice_date" id="date" required  value="<?php  echo $all_invoice[0]['date'] ; ?>" tabindex="4" />

                                    </div>

                                </div>


                                      <div class="form-group row">

                                    <label for="billing_address" class="col-sm-4 col-form-label"><?php echo display('Billing Address') ?></label>

                                    <div class="col-sm-8">

                                    <textarea rows="5" cols="50" name="billing_address" class=" form-control"  placeholder='Billing Address' id="billing_address"> <?php  echo $all_invoice[0]['billing_address'] ; ?></textarea>
                                    </div>

                                </div> 
                                <input type="hidden"  value="<?php echo $all_invoice[0]['payment_id']; ?>" name="payment_id" class="payment_id"/>
                                <div class="form-group row">

<label for="shipping_address" class="col-sm-4 col-form-label"><?php echo display('Shipping Address') ?></label>

<div class="col-sm-8">

    <textarea rows="5" cols="50" name="shipping_address" class=" form-control" placeholder='Shipping Address' id="shipping_address"><?php  echo $all_invoice[0]['shipping_address'] ; ?> </textarea>

</div>

</div> 
<div class="form-group row">

<label for="payment_terms" class="col-sm-4 col-form-label"><?php echo display('Payment Terms') ?><i class="text-danger">*</i></label>

<div class="col-sm-8">

    <select   name="terms" id="payment_terms" class=" form-control" placeholder='Payment Terms' id="payment_terms">
        <option value="<?php   echo $payment_terms; ?>"><?php  echo $payment_terms; ?></option>   
    <option value="CAD">CAD</option> 
    <option value="COD">COD</option> 
    <option value="ADVANCE">ADVANCE</option> 
    <option value="7DAYS">7 DAYS<option> 
    <option value="15DAYS">15 DAYS</option> 
    <option value="30DAYS">30 DAYS</option> 
    <option value="45DAYS">45 DAYS<option> 
    <option value="60DAYS">60 DAYS</option> 
    <option value="75DAYS">75 DAYS</option> 
    <option value="90DAYS">90 DAYS<option> 
    <option value="180DAYS">180 DAYS</option> 
    </select>

</div>
<!-- <a href="#" class="client-add-btn btn " style="color:white;background-color:#38469f;" aria-hidden="true" data-toggle="modal" data-target="#payment_terms"><i class="ti-plus m-r-2"></i></a> -->
</div>

                                  <!-- <div class="form-group row">

                                    <label for="billing_address" class="col-sm-4 col-form-label">Number of days</label>

                                    <div class="col-sm-8">

                                        <select type="text"  name="number_of_days" id=number_of_days class=" form-control" placeholder='Number of days' id="number_of_days"> 
                                            <option value="<?php  //echo $number_of_days ;  ?>"><?php // echo// $number_of_days ;  ?></option>
                                            <?php 
                                           // for($i=1;$i<100;$i++)
                                           // {
                                                ?>
                                                <option value="<?php //echo $i; ?>"><?php //echo $i; ?>days</option>
                                                <?php
                                           // }
                                            ?>
                                            <select>
                                    </div>

                                </div>  -->
                         

                            </div>
                         

                             <div class="col-sm-6">

                                <div class="form-group row">

                                    <label for="date" class="col-sm-4 col-form-label"><?php echo display('Invoice Number') ?><i class="text-danger">*</i></label>

                                    <div class="col-sm-8">
                                        <input class="form-control" placeholder="Commercial Invoice Number" type="text" name="commercial_invoice_number"  value= "<?php  echo $all_invoice[0]['commercial_invoice_number'] ; ?>" readonly />
                                    </div>
                                </div>


                                      <div class="form-group row">

                                    <label for="container_number" class="col-sm-4 col-form-label"><?php echo display('Container Number') ?> <i class="text-danger">*</i></label>

                                    <div class="col-sm-8">

                                       <input class="form-control" placeholder="Container Number" type="text" size="50" name="container_no" id="date" required value= "<?php  echo $container_no ; ?>" tabindex="4" />

                                    </div>

                                </div> 

                            </div>



                                <div class="col-sm-6">

                                <div class="form-group row">

                                    <label for="date" class="col-sm-4 col-form-label"><?php echo display('B/L No') ?><i class="text-danger">*</i></label>

                                    <div class="col-sm-8">


                                        <input class="form-control" placeholder="BL Number" type="text" size="50" name="bl_no" required value= "<?php  echo $all_invoice[0]['bl_no'] ; ?>"/>

                                    </div>
     <input type="hidden" id="invoice_hdn"/> <input type="hidden" id="invoice_hdn1"/>
                                </div>

                           

             
                                  <div class="form-group row">

                                    <label for="port_of_discharge" class="col-sm-4 col-form-label"><?php echo display('Payment Due date') ?></label>

                                   <div class="col-sm-8">

                                      

                                        <input class="form-control" type="date" size="50" value= "<?php  echo $all_invoice[0]['payment_due_date'] ; ?>" name="payment_due_date" id="date1" required  tabindex="4" />

                                    </div>

                                </div>
                                <div class="form-group row">

                                    <label for="ETA" class="col-sm-4 col-form-label"><?php echo display('Estimated Time of Arrival') ?></label>

                                   <div class="col-sm-8">


                                        <input class="form-control" type="date" size="50" value="<?php echo $all_invoice[0]['eta'] ; ?>"  name="eta" id="date1" required  tabindex="4" />

                                    </div>

                                </div>








                                <div class="form-group row">

<label for="ETA" class="col-sm-4 col-form-label"><?php echo display('Estimated Time of Departure') ?></label>

<div class="col-sm-8">

    <input type="date" name="etd"  value= "<?php  echo $all_invoice[0]['etd'] ; ?>" class="form-control">
</div>

</div> 


<div class="form-group row">

<label for="port_of_discharge" class="col-sm-4 col-form-label"><?php echo display('Port Of Discharge') ?></label>

<div class="col-sm-8">

<input class="form-control" type="" size="50" name="Port_of_discharge" id="date1"   value= "<?php  echo $invoice_detail[0]['Port_of_discharge']; ?>"  tabindex="4" />
</div>

</div> 


                                    <div class="form-group row">

                                    <label for="ETA" class="col-sm-4 col-form-label"><?php echo display('Attachments') ?></label>

                                    <div class="col-sm-8">

                                        <input type="file" name="file" class="form-control">
                                    </div>

                                </div> 

                            </div>


                          

                        <div class="col-sm-5" id="bank_div">

                            <div class="form-group row">

                                <label for="bank" class="col-sm-5   col-form-label"><?php

                                    echo display('bank');

                                    ?> <i class="text-danger">*</i></label>

                                <div class="col-sm-6">

                                   <select name="bank_id" class="form-control bankpayment"  id="bank_id">

                                        <option value=""><?php echo display('Select Location') ?></option>

                                        <?php foreach($bank_list as $bank){?>

                                            <option value="<?php echo html_escape($bank['bank_id'])?>"><?php echo html_escape($bank['bank_name']);?></option>

                                        <?php }?>

                                    </select>

                                 

                                </div>
                                 <?php if($this->permission1->method('add_customer','create')->access()){ ?>

                                    <div  class=" col-sm-1">

                                         <!-- <a href="#" class="client-add-btn btn btn-info" aria-hidden="true" data-toggle="modal" data-target="#bank_info"><i class="ti-plus m-r-2"></i></a> -->
                                         <a href="#" class="client-add-btn btn btn-info" aria-hidden="true"   data-toggle="modal" data-target="#bank_info" ><?php echo display('Add New Bank') ?></a>
                                    </div>

                                <?php } ?>
                             

                            </div>

                        </div>
                        <!-- <div class="form-group row">
      <button type="button" class="btn btn-info" style="background-color: #38469f;" data-toggle="modal" data-target="#packmodal" id="packbutton">Choose Packing Invoice   </button>
      <input type="text" name="packing_id" value="<?php echo $all_invoice[0]['packing_id'];  ?>" id="packing_id" style="font-weight:bold;" >
  </div> -->
                        </div>
<?php  $d= $tax_details; 
 $t='';
 if($d !=='' && !empty($d)){
    preg_match('#\((.*?)\)#', $d, $match);

    $t=$match[1];$t=trim($t);
    
  }else{

    $t=$t=trim($t);
    
  }
?> 
                        <br>
                <style>
    /*                 .removebundle, .addbundle{*/
    /*    padding:5px;*/
    /*    border-radius:5px;*/
    /*}*/
    
     .removebundle, .addbundle{
    padding: 10px 12px 10px 12px;
        border-radius:5px;
    }
    
    
                      .taxtab {
     table-layout: fixed;
     width: 100%;
     text-align: center;
     border-collapse: collapse;
  }
  .taxtab td{
     border: 1px solid #dddddd;
     padding: 8px;
  }
  input[type=number]::-webkit-inner-spin-button, 
input[type=number]::-webkit-outer-spin-button { 
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
    margin: 0; 
}
                </style>      
                        <div class="table-responsive">
     
   <div id="content">
        <?php
        // $count='';
        // $list_count=array();
        // foreach($all_invoice as $inv){
        //     $count = substr($inv['tableid'], 0, 1);
        //  $items[] =$count   ;                            
                                      




        // }
  
  
        
?>
<?php 


for($m=1;$m<count($all_invoice);$m++){ 
    ?>
<table class="table table-bordered normalinvoice table-hover" id="normalinvoice_<?php  echo $m; ?>" >
                                <thead>
                                     <tr>
                                     <th rowspan="2" class="text-center" style="width:180px;" ><?php echo display('product_name') ?><i class="text-danger">*</i>  </th>
                                            <th rowspan="2" class="text-center" style="width:60px;"><?php echo display('Bundle No') ?><i class="text-danger">*</i></th>
                                            <th rowspan="2"  class="text-center"><?php echo display('Description') ?></th>
                                            <th rowspan="2" class="text-center" style="width:60px;"><?php echo display('Thick ness') ?><i class="text-danger">*</i></th>
                                            <th rowspan="2" class="text-center"><?php echo display('Supplier Block No') ?><i class="text-danger">*</i></th>

                                            <th rowspan="2" class="text-center" ><?php echo display('Supplier Slab No') ?><i class="text-danger">*</i> </th>
                                            <th colspan="2"   style="width:150px;" class="text-center"><?php echo display('Gross Measurement') ?><i class="text-danger">*</i> </th>
                                            <th rowspan="2" class="text-center"><?php echo display('Gross Sq.Ft') ?></th>
                                           
                                            <th rowspan="2" style="width:40px;" class="text-center"><?php echo display('Slab No') ?><i class="text-danger">*</i></th>
                                            <th colspan="2"  style="width:150px;" class="text-center"><?php echo display('Net Measure') ?><i class="text-danger">*</i></th>
                                            <th rowspan="2" class="text-center"><?php echo display('Net Sq.Ft') ?></th>
                                            <th rowspan="2"  class="text-center"><?php echo display('Cost per Sq.Ft') ?></th>
                                            <th rowspan="2"  class="text-center"><?php echo display('Cost per Slab') ?></th>
                                            <th rowspan="2"  class="text-center"><?php echo display('Sales') ?><br/><?php echo display('Price per Sq.Ft') ?></th>
                                            <th rowspan="2"  class="text-center"><?php echo display('Sales Slab Price') ?></th>
                                            <th rowspan="2" class="text-center"><?php echo display('Weight') ?></th>
                                            <th rowspan="2" class="text-center"><?php echo display('Origin') ?></th>
                                           
                                            <th rowspan="2" style="width: 100px" class="text-center"><?php echo display('Total') ?></th>
                                            <th rowspan="2" class="text-center"><?php echo display('Action') ?></th>
                                        </tr>

                                        <tr>
                                             <th class="text-center"><?php echo display('Width') ?></th>
                                            <th class="text-center"><?php echo display('Height') ?></th>  
                                          <th class="text-center"  ><?php echo display('Width') ?></th>
                                            <th class="text-center" ><?php echo display('Height') ?></th>    
                                        </tr>

                                </thead>
                                <style>
input{
    border:none;
}
textarea:focus, input:focus{
   
    outline: none;
}
 .text-right {
    text-align: left; 
}


th,
td {
    word-wrap: break-word
  border: 1px solid black;
  width: 80px;

}
.select2 {
    display:none;
}

.Row {
    display: table;
    width: 100%; /*Optional*/
    table-layout: fixed; /*Optional*/
    border-spacing: 10px; /*Optional*/
}
.Column {
    display: table-cell;
 
}
.input-symbol-euro {
  position: absolute;
  font-size: 14px;
}
.input-symbol-euro input {
  padding-left: 18px;
}
.input-symbol-euro:after {
  position: absolute;
  top: 7px;
 content: '<?php echo $currency; ?>';
  left: 5px;
}
 #download_select:focus option:first-of-type , #print_select:focus option:first-of-type{
    display: none;
}
</style>
                                <tbody id="addPurchaseItem_<?php echo $m;  ?>">
                                    <?php  $n=0; ?>
                                    <?php foreach($all_invoice as $inv){
                                        
                                      

$a = substr($inv['tableid'], 0, 1);
if($a==$m){
                                    
                                        ?>

                                    <tr>
                                        <td>
                                              <input type="hidden" name="tableid[]" id="tableid_1" value="<?php  echo $inv['tableid'];   ?>"/>


                                 




                           <input list="magicHouses" name="prodt[]" id="prodt_<?php  echo $m.$n; ?>" class="form-control product_name" value="<?php  echo $inv['product_name'];  ?>" style="width:160px;" />
	<datalist id="magicHouses">

   <?php                                
                                            foreach($product as $tx){?>
                                       
                                                <option value="<?php echo $tx['product_name'].'-'.$tx['product_model'];?>">  <?php echo $tx['product_name'].'-'.$tx['product_model'];  ?></option>
                                           <?php } ?>

</datalist> 







                                        <input type='hidden' class='common_product autocomplete_hidden_value  product_id_1' value="<?php  echo $inv['product_id'];  ?>" name='product_id[]' id='SchoolHiddenId_<?php  echo $m.$n; ?>' />
                                        </td>
                                           <td>
                                                <input type="text" id="bundle_no_<?php  echo $m.$n; ?>" name="bundle_no[]"  value="<?php  echo $inv['bundle_no'];  ?>" class="bundle_no form-control" />
                                            </td>
                                        <td>
                                                <input type="text" id="description_<?php  echo $m.$n; ?>" name="description[]" value="<?php  echo $inv['description'];  ?>" class="form-control" />
                                            </td>
                                        
                                            <td >
                                                <input type="text" name="thickness[]" id="thickness_<?php  echo $m.$n; ?>" required="" value="<?php  echo $inv['thickness'];  ?>" class="form-control"/>
                                            </td>
                                            <td>
                                                <input type="text" id="supplier_b_no_<?php  echo $m.$n; ?>" name="supplier_block_no[]" required="" value="<?php  echo $inv['supplier_block_no'];  ?>" class="form-control" />
                                            </td>
                                        
                                            <td >
                                                <input type="text"  id="supplier_s_no_<?php  echo $m.$n; ?>" name="supplier_slab_no[]" required="" value="<?php  echo $inv['supplier_slab_no'];  ?>" class="form-control"/>
                                            </td>
                                           <td>
                                                <input type="text" id="gross_width_<?php  echo $m.$n; ?>" name="gross_width[]" required="" value="<?php  echo $inv['g_width'];  ?>" class="gross_width  form-control" />
                                            </td>
                                            <td>
                                                <input type="text" id="gross_height_<?php  echo $m.$n; ?>" name="gross_height[]"  required=""  value="<?php  echo $inv['g_height'];  ?>" class="gross_height form-control" />
                                            </td>
                                        
                                            <td >
                                                <input type="text"   style="width:60px;" readonly id="gross_sq_ft_<?php  echo $m.$n; ?>" name="gross_sq_ft[]" value="<?php  echo $inv['gross_sqft'];  ?>" class="gross_sq_ft form-control"/>
                                            </td>
                                        
                                        
                                            <td >
                                                <input type="text"  id="slab_no_<?php  echo $m.$n; ?>"  name="slab_no[]"  readonly  required="" value="<?php  echo $n+1;  ?>" class="form-control"/>
                                            </td>
                                            <td>
                                                <input type="text" id="net_width_<?php  echo $m.$n; ?>" name="net_width[]" required="" value="<?php  echo $inv['n_width'];  ?>" class="net_width form-control" />
                                            </td>
                                            <td>
                                                <input type="text" id="net_height_<?php  echo $m.$n; ?>" name="net_height[]"    required="" value="<?php  echo $inv['n_height'];  ?>" class="net_height form-control" />
                                            </td>
                                            <td >
                                                <input type="text"   style="width:60px;" readonly id="net_sq_ft_<?php  echo $m.$n; ?>" name="net_sq_ft[]" value="<?php  echo $inv['net_sqft'];  ?>" class="net_sq_ft form-control"/>
                                            </td>
                                            <td>

       <span class="input-symbol-euro"><input type="text" id="cost_sq_ft_<?php  echo $m.$n; ?>"  name="cost_sq_ft[]" readonly  style="width:60px;" value="<?php  echo $inv['cost_sqft'];  ?>"  class="cost_sq_ft form-control" ></span>

                                        
                                            <td >
                     
      <span class="input-symbol-euro"> <input type="text"  id="cost_sq_slab_<?php  echo $m.$n; ?>" name="cost_sq_slab[]" readonly   style="width:60px;" value="<?php  echo $inv['cost_slab'];  ?>"  class="form-control"/></span>
 


                                               
                                            </td>
                                            <td>
                                        
         <span class="input-symbol-euro">  <input type="text" id="sales_amt_sq_ft_<?php  echo $m.$n; ?>"  name="sales_amt_sq_ft[]"  style="width:60px;"  value="<?php  echo $inv['sales_price_sqft'];  ?>" class="sales_amt_sq_ft form-control" /></span>



                                               
                                            </td>
                                        
                                            <td >
                                    
      <span class="input-symbol-euro">   <input type="text"  id="sales_slab_amt_<?php  echo $m.$n; ?>" name="sales_slab_amt[]"  style="width:60px;" value="<?php  echo $inv['sales_slab_price'];  ?>"  class="sales_slab_amt form-control"/></td> </span>
      </td>
                                            <td>
                                                <input type="text" id="weight_<?php  echo $m.$n; ?>" name="weight[]"  value="<?php  echo $inv['weight'];  ?>" class="weight form-control" />
                                            </td>
                                        
                                            <td >
                                                <input type="text"  id="origin_<?php  echo $m.$n; ?>" name="origin[]" value="<?php  echo $inv['origin'];  ?>" class="form-control"/>
                                            </td>

                                            <td >
                                                  <span class="input-symbol-euro"><input  type="text" class="total_price form-control" style="width:70px;"   value="<?php  echo $inv['total_price'];  ?>"  id="total_<?php  echo $m.$n; ?>"     name="total_amt[]"/></span>
                                            </td>
                                               
                                          
                                              <td style="text-align:center;">
                                                <button  class='delete btn btn-danger' type='button' value='Delete' ><i class='fa fa-trash'></i></button>
                                            </td>
                                            
                                            </tr>
                                            
                                            <?php $n++;   } }  ?>
                                            </tbody>
                                <tfoot>
                                     <input type="hidden" id="paid_convert" name="paid_convert"/>   <input type="hidden" id="bal_convert" name="bal_convert"/>
                                    <tr>
                                    <td style="text-align:right;" colspan="8"><b><?php echo display('Gross Sq.Ft') ?> :</b></td>
                                        <td >
             <input type="text" id="overall_gross_<?php echo $m; ?>" name="overall_gross[]"    class="overall_gross form-control" style="width: 60px"   readonly="readonly"  /> 
            </td>
             <td style="text-align:right;" colspan="3"><b><?php echo display('Net Sq.Ft') ?> :</b></td>
                                        <td >
             <input type="text" id="overall_net_<?php echo $m; ?>" name="overall_net[]"  class="overall_net form-control"  style="width: 60px"   readonly="readonly"  /> 
            </td>
             <td style="text-align:right;" colspan="4"><b><?php echo display('Weight') ?> :</b></td>
                                        <td >
             <input type="text" id="overall_weight_<?php echo $m; ?>" name="overall_weight[]"  class="overall_weight form-control"  style="width: 70px"  readonly="readonly"  /> 
            </td> 

                                        <td style="text-align:right;" colspan="1"><b><?php echo display('TOTAL') ?> :</b></td>
                                        <td >
               <span class="input-symbol-euro">     <input type="text" id="Total_<?php echo $m; ?>" name="total[]"   class="b_total form-control"   style="padding-top: 6px;width: 70px"    readonly="readonly"  />
            </td>
                                                <td colspan="21" style="text-align: center;">
 <i id="buddle_<?php echo $m; ?>" class="btn-danger removebundle fa fa-minus"  aria-hidden="true"></i>    

                                            </td>                    
                                    </tr>

                                            </tfoot>
                            </table>
                            <?php   } ?>
                            
                            
                            
                             <!--<i id="buddle_1" class="addbundle fa fa-plus" style="float:right;color:white;background-color: #38469f;font-size:24px;" aria-hidden="true" onclick="addbundle(); "></i>    -->
                             
                             <i id="buddle_1" class="addbundle fa fa-plus" style=" padding: 10px 12px 10px 12px;margin-right: 18px;float:right;color:white;background-color:#38469f;"   onclick="addbundle(); "aria-hidden="true"></i>
    
                             
                             
                             
                         </div> </div>
                                               <table class="taxtab table table-bordered table-hover">
                        <tr>
                        <td class="hiden" style="width:22%;border:none;text-align:end;font-weight:bold;">
                        <?php echo display('Live Rate') ?> : 
                         </td>
                
                               <td class="hiden" style="width:12%;text-align-last: center;padding:5px;background-color: #38469f;border:none;font-weight:bold;color:white;">1 <?php  echo $curn_info_default;  ?>
                                 = <input style="width: 80px;text-align:center;color:black;padding:5px;" type="text" id="custocurrency_rate"/>&nbsp;<label for="custocurrency" style="color:white;background-color: #38469f;"></label></td>
                    <td style="border:none;text-align:right;font-weight:bold;">  <?php echo display('Tax') ?> : 
                                 </td>
                              <td style="width:12%">
<select name="tx"  id="product_tax" class="form-control" >
<option value="<?php  echo $t; ?>" selected="selected"><?php  echo $t; ?></option>
<?php foreach($all_tax as $tx){?>
  
    <option value="<?php echo $tx['tax_id'].'-'.$tx['tax'].'%';?>">  <?php echo $tx['tax_id'].'-'.$tx['tax'].'%';  ?></option>
<?php } ?>
</select>
</td>
<td  style="width:20%;"></td>
</tr>
</table>
<table border="0" style="table-layout: auto;" class="overall table table-bordered table-hover">
    <tr>
        <td   style="vertical-align:top;text-align:right;border:none;"></td>
        <td  style="text-align:right;border:none;"></td>
         <td  style="text-align:right;border:none;"></td>
         <td  style="text-align:right;border:none;"> </td>
</tr>
  <tr>
        <td  colspan="2" style="vertical-align:top;text-align:right;border:none;"><b>  <?php echo display('Overall TOTAL') ?> :</b></td>
        <td colspan="1" style="border:none;padding-bottom: 40px;"><span class="input-symbol-euro"><input type="text" id="Over_all_Total" name="Over_all_Total"  style="width:185px;" class="form-control" value="<?php echo $invoice_detail[0]['total_amount'];  ?>"  readonly="readonly"  /> </span></td>
         <td colspan="4" style="text-align:right;border:none;width:250px;"><b>  <?php echo display('TAX DETAILS') ?> :</b></td><td colspan="1" style="border:none;">  <span class="input-symbol-euro">     <input type="text" class="form-control" style="width:150px;"  id="tax_details" value="<?php echo $invoice_detail[0]['taxs'];  ?>" name="tax_details"  readonly="readonly" /></span></td>
</tr>
   <tr>
        <td  colspan="2" style="vertical-align:top;text-align:right;border:none;"><b>  <?php echo display('Overall Gross Sq.Ft') ?> :</b></td>
        <td colspan="1" style="border:none;"><input type="text" id="total_gross" name="total_gross" value="<?php echo  $invoice_detail[0]['total_gross'];  ?>"  class="form-control"   readonly="readonly"  /> </td>
         <td colspan="4" style="text-align:right;border:none;"><b>  <?php echo display('GRAND TOTAL') ?> :</b></td><td colspan="1" style="border:none;">  <span class="input-symbol-euro">    <span class="input-symbol-euro">   <input type="text" id="gtotal"   class="form-control" style="width:150px;" name="gtotal" value="<?php echo $all_invoice[0]['gtotal'];  ?>"  readonly="readonly" /></td>
</tr>
    <tr>
        <td  colspan="2" style="vertical-align:top;text-align:right;border:none;"><b>  <?php echo display('Overall Net Sq.Ft') ?> :</b></td>
        <td colspan="1" style="border:none;"><input type="text" id="total_net" name="total_net" value="<?php echo  $invoice_detail[0]['total_net'];  ?>" class="form-control"    readonly="readonly"  /> </td>
        <td colspan="4" style="text-align:right;border:none;"><b><?php echo display('GRAND TOTAL') ?> :<br/><?php echo display('Preferred Currency') ?></b></td><td colspan="1" style="border:none;"> <table><tr> <td class="cus" name="cus" style="width: 40px;"></td> <td><input  type="text"  readonly id="customer_gtotal"  value="<?php echo $all_invoice[0]['gtotal_preferred_currency'];  ?>"   name="customer_gtotal"  required   /></td></tr></table></td>
</tr>

    <tr>
    <td colspan="2"  style="vertical-align:top;text-align:right;border:none;"><b><?php echo display('Overall Weight') ?> :</b></td><td colspan="1" style="border:none;"><input type="text" id="total_weight" name="total_weight"   class="form-control"   readonly="readonly"  /></td>
    <td colspan="4" class="amt" style="text-align:right;border:none;"><b><?php echo display('Amount Paid') ?> :</b></td><td style="border:none;">
                                        <table border="0">
      <tr class="amt">

        <td class="cus" name="cus" style="width: 40px;"></td>
<td> <input  type="text"  readonly id="amount_paid" style="width:-webkit-fill-available;"  name="amount_paid"  required   /></td> 
     </tr>
   </table>
   
   <div class="container">
          
          <div class="cur-box">
  <select class="cur-item-1"   >


          </select>
          <!-- <input type="number" name="" id="input_amount" value="1"> -->
          <input type="number"  class="cur-input-1">

      </div>
    
      <!-- <div class="currency">
          <select name="" id="output_currency"> -->
          <div class="cur-box">
  <select class="cur-item-2">

  
  




          </select>
          <input type="text"    class="cur-input-2" name="agtotal_pcamount" >

              </div>


              <style>
                .container{
                    display:none;
                }
              </style>

              <div class="result"  >
              <div class="rate" id="rate"  ></div>

             </div>

                                        

         </td>
</tr>

  <tr>
      <td colspan="2"  style="vertical-align:top;text-align:right;border:none;"></td><td colspan="1" style="border:none;"></td>
      <td class="amt" colspan="4"  style="vertical-align:top;text-align:right;border:none;"><b><?php echo display('Balance Amount') ?> :</b></td>
        <td class="amt" style="border:none;" colspan="1">
            <table border="0">
      <tr class="amt">
        <td class="cus" name="cus" style="border:none;width: 40px;"></td>  <td style="border:none;">
                                          <input  type="text"   readonly id="balance"  name="balance"  required   />                     
                                            </td>     </tr>
   </table>
              </td>
              </tr>
              <tr>
                <td style="border:none;">
   <div class="container">
        <div class="currency">
            <!-- <select  id="input_currency"> -->


               <select name="cus"  id="input_currency">
              

      

            </select>
            <input type="number" name="" id="input_amount"  value="1">
        </div>
      
        <div class="currency">
            <select   id="output_currency">
       

            </select>
            <input type="text"  id="output_amount"   name="bgtotal_pcamount"/>
        </div>
        <div class="result">
                <div class="rate" id="rate"  name="bgtotal_pcamount" ></div>

        </div>
   
       <style>
        .result{
            display:none;
        }
       </style>
    </div>

        </td>
</tr>

  

                                            <input type="hidden" id="final_gtotal"  name="final_gtotal" />

                                            <input type="hidden" name="baseUrl" class="baseUrl" value="<?php echo base_url();?>"/></td>
                                  
                                    <!-- -->
                                   
                                            <tr style="border-right:none;border-left:none;border-bottom:none;border-top:none">
                                               
                                            <td colspan="21" style="text-align: end;">
                                        <input type="submit" value="<?php echo display('Make Payment') ?>" style="color:white;background-color: #38469f;" class="btn btn-large" id="paypls"/>
                                            </td>
                                            </tr>
                                            </tfoot>
                            </table>
                      
                        <div class="form-group row">
                            <div class="col-sm-6 ">
                                <table style="height:100px;">
                                       <tr>
                                   
                                    <td>
                                   
                                        <input type="submit" id="add_purchase" style="color:white;background-color: #38469f;" class="btn btn-large" name="add-packing-list" value= <?php echo display('Save') ?> />
                                            </td>
                                            

                                            <td class="hidden_button"> 
 
 <a    id="final_submit" style="color:white;background-color: #38469f;" class='final_submit btn'> <?php echo display('submit') ?></a>
              </td>
             
    <td class="hidden_button">         
<select name="download_select" id="download_select" class="form-control" style="color:white;background-color: #38469f;width: auto;" >
          <option value="Download" selected><?php echo display('Download') ?></option>
               <option value="Invoice" ><?php echo display('New Invoice') ?></option>
                  <option value="Packing" ><?php echo display('Packing List') ?></option>
          </select>
          

</td>       
<td style="width:20px;" class="hidden_button"></td>
<td class="hidden_button">

<select name="print_select" id="print_select" class="form-control" style="color:white;background-color: #38469f;width: auto;" >
          <option value="Print" selected><?php echo display('Print') ?></option>
               <option value="Invoice" ><?php echo display('New Invoice') ?></option>
                  <option value="Packing" ><?php echo display('Packing List') ?></option>
          </select>


</td>                   
                                 

                                    
                                    
                                </tr>
                                </div>
</div>
               
                            </div>
                        </div>

  <div class="form-group row">
      
  </div>
                           <div class="form-group row">

                           <label for="billing_address" class="col-sm-4 col-form-label"><?php echo display('Account Details/Additional Information') ?></label>

                                    <div class="col-sm-8">
                                 
 <textarea rows="4" cols="50" id="details" name="ac_details" class=" form-control"  ><?php   if(!empty($ac_details)){echo trim($ac_details);} ?></textarea>
                                    

                                    </div>

                                </div> 
                                <div class="form-group row">

                                <label for="remark" class="col-sm-4 col-form-label"><?php echo display('Remarks/Conditions') ?></label>

                                    <div class="col-sm-8">
                                   
<textarea rows="4" cols="50" id="remarks" name="remark" class=" form-control"    ><?php   if(!empty($remark)){echo trim($remark);} ?></textarea>                                      
                                    </div>

                                </div>
                        <div class="table-responsive">

                            
                        <table class='table' style="display:none;">
                                <tr>
                                    <th colspan='7'>
                                      

                                    </th>
                                </tr>    
                        </table>

                        </div>
<div id='customer-data' style='color:red;'></div>
                                            </form>
                                     
                    </div>
                    <input type="hidden" id="hdn"/>
<input type="hidden" id="gtotal_dup"/>

<div class="modal fade" id="myModal1" role="dialog" >
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content" style="margin-top: 190px;">
        <div class="modal-header" style="color:white;background-color:#38469f;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><?php echo display('Sales - New Invoice') ?></h4>
        </div>
        <div class="modal-body" id="bodyModal1" style="text-align:center;font-weight:bold;">
          
      
     
        </div>
        <div class="modal-footer">
          
        </div>
      </div>
      
    </div>
  </div>
  
           <div id="myModal3" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			 <div class="modal-header" style="color:white;background-color:#38469f;">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title"><?php echo display('Confirmation') ?></h4>
			</div>
			<div class="modal-body">
      <p><?php echo display('Your Invoice is not submitted. Would you like to submit or discard') ?>
				</p>
				<p class="text-warning">
        <small> <?php echo display ('If you dont submit your changes will not be saved') ?></small>
				</p>
			</div>
			<div class="modal-footer">
				<input type="submit" id="ok" class="btn" style="color:white;background-color:#38469f;" onclick="submit_redirect()"  value="Submit"/>
        <button id="btdelete" type="button" class="btn btn-danger"  onclick="discard()"><?php echo display('Discard') ?></button>
			
			</div>
		</div>
	</div>
</div>  
<div class="modal fade" id="payment_modal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content" style="    margin-top: 190px;">
        <div class="modal-header" style="color:white;background-color:#38469f;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><?php echo display('ADD PAYMENT') ?></h4>
        </div>
        <div class="modal-body">
          
   
<form id="add_payment_info"  method="post" >  
            <div class="row">


<div class="form-group row">

        <label for="date" style="text-align:end;" class="col-sm-3 col-form-label"><?php echo display('Payment Date') ?> <i class="text-danger">*</i></label>

        <div class="col-sm-5">

            <input class=" form-control" type="date"  name="payment_date" id="payment_date" required value="<?php echo html_escape($date); ?>" tabindex="4" />

        </div>

    </div>
<input type="hidden" id="cutomer_name" name="cutomer_name"/>
<input type="hidden"  value="<?php echo $all_invoice[0]['payment_id']; ?>" name="payment_id" class="payment_id" id="payment_id"/>
 <div class="form-group row">

        <label for="billing_address" style="text-align:end;" class="col-sm-3 col-form-label"><?php echo display('Reference No') ?><i class="text-danger">*</i></label>

        <div class="col-sm-5">
        <input class=" form-control" type="text"  name="ref_no" id="ref_no" required   />
</div>
 </div> 
    <div class="form-group row">
      <label for="bank" style="text-align:end;" class="col-sm-3 col-form-label"><?php echo display('Select Bank') ?>:<i class="text-danger">*</i></label>
    <a data-toggle="modal" href="#add_bank_info"  style="color:white;background-color:#38469f;" class="btn btn-primary"><i class="fa fa-university"></i></a>
      <div class="col-sm-5">
  <select name="bank" id="bank"  class="form-control bankpayment" >
      
      
<!--<option value="Axis Bank Ltd.">Axis Bank Ltd.</option>-->
<!--<option value="Bandhan Bank Ltd.">Bandhan Bank Ltd.</option>-->
<!--<option value="Bank of Baroda">Bank of Baroda</option>-->
<!--<option value="Bank of India">Bank of India</option>-->
<!--<option value="Bank of Maharashtra">Bank of Maharashtra</option>-->
<!--<option value="Canara Bank">Canara Bank</option>-->
<!--<option value="Central Bank of India">Central Bank of India</option>-->
<!--<option value="City Union Bank Ltd.">City Union Bank Ltd.</option>-->
<!--<option value="CSB Bank Ltd.">CSB Bank Ltd.</option>-->
<!--<option value="DCB Bank Ltd.">DCB Bank Ltd.</option>-->
<!--<option value="Dhanlaxmi Bank Ltd.">Dhanlaxmi Bank Ltd.</option>-->
<!--<option value="Federal Bank Ltd.">Federal Bank Ltd.</option>-->
<!--<option value="HDFC Bank Ltd">HDFC Bank Ltd</option>-->
<!--<option value="ICICI Bank Ltd.">ICICI Bank Ltd.</option>-->
<!--<option value="IDBI Bank Ltd.">IDBI Bank Ltd.</option>-->
<!--<option value="IDFC First Bank Ltd.">IDFC First Bank Ltd.</option>-->
<!--<option value="Indian Bank">Indian Bank</option>-->
<!--<option value="Indian Overseas Bank">Indian Overseas Bank</option>-->
<!--<option value="Induslnd Bank Ltd">Induslnd Bank Ltd</option>-->
<!--<option value="Jammu & Kashmir Bank Ltd.">Jammu & Kashmir Bank Ltd.</option>-->
<!--<option value="Karnataka Bank Ltd.">Karnataka Bank Ltd.</option>-->
<!--<option value="Karur Vysya Bank Ltd.">Karur Vysya Bank Ltd.</option>-->
<!--<option value="Kotak Mahindra Bank Ltd">Kotak Mahindra Bank Ltd</option>-->
<!--<option value="Nainital Bank Ltd.">Nainital Bank Ltd.</option>-->
<!--<option value="Punjab & Sind Bank">Punjab & Sind Bank</option>-->
<!--<option value="Punjab National Bank">Punjab National Bank</option>-->
<!--<option value="RBL Bank Ltd.">RBL Bank Ltd.</option>-->
<!--<option value="South Indian Bank Ltd.">South Indian Bank Ltd.</option>-->
<!--<option value="State Bank of India">State Bank of India</option>-->
<!--<option value="Tamilnad Mercantile Bank Ltd.">Tamilnad Mercantile Bank Ltd.</option>-->
<!--<option value="UCO Bank">UCO Bank</option>-->
<!--<option value="Union Bank of India">Union Bank of India</option>-->
<!--<option value="YES Bank Ltd.">YES Bank Ltd.</option>-->

<option value="JPMorgan Chase">JPMorgan Chase</option>
<option value="New York City">New York City</option>
<option value="Bank of America">Bank of America</option>
<option value="Citigroup">Citigroup</option>
<option value="Wells Fargo">Wells Fargo</option>
<option value="Goldman Sachs">Goldman Sachs</option>
<option value="Morgan Stanley">Morgan Stanley</option>
<option value="U.S. Bancorp">U.S. Bancorp</option>
<option value="PNC Financial Services">PNC Financial Services</option>
<option value="Truist Financial">Truist Financial</option>
<option value="Charles Schwab Corporation">Charles Schwab Corporation</option>
<option value="TD Bank, N.A.">TD Bank, N.A.</option>
<option value="Capital One">Capital One</option>
<option value="The Bank of New York Mellon">The Bank of New York Mellon</option>
<option value="State Street Corporation">State Street Corporation</option>
<option value="American Express">American Express</option>
<option value="Citizens Financial Group">Citizens Financial Group</option>
<option value="HSBC Bank USA">HSBC Bank USA</option>
<option value="SVB Financial Group">SVB Financial Group</option>
<option value="First Republic Bank ">First Republic Bank </option>
<option value="Fifth Third Bank">Fifth Third Bank</option>
<option value="BMO USA">BMO USA</option>
<option value="USAA">USAA</option>
<option value="UBS">UBS</option>
<option value="M&T Bank">M&T Bank</option>
<option value="Ally Financial">Ally Financial</option>
<option value="KeyCorp">KeyCorp</option>
<option value="Huntington Bancshares">Huntington Bancshares</option>
<option value="Barclays">Barclays</option>
<option value="Santander Bank">Santander Bank</option>
<option value="RBC Bank">RBC Bank</option>
<option value="Ameriprise">Ameriprise</option>
<option value="Regions Financial Corporation">Regions Financial Corporation</option>
<option value="Northern Trust">Northern Trust</option>
<option value="BNP Paribas">BNP Paribas</option>
<option value="Discover Financial">Discover Financial</option>
<option value="First Citizens BancShares">First Citizens BancShares</option>
<option value="Synchrony Financial">Synchrony Financial</option>
<option value="Deutsche Bank">Deutsche Bank</option>
<option value="New York Community Bank">New York Community Bank</option>
<option value="Comerica">Comerica</option>
<option value="First Horizon National Corporation">First Horizon National Corporation</option>
<option value="Raymond James Financial">Raymond James Financial</option>
<option value="Webster Bank">Webster Bank</option>
<option value="Western Alliance Bank">Western Alliance Bank</option>
<option value="Popular, Inc.">Popular, Inc.</option>
<option value="CIBC Bank USA">CIBC Bank USA</option>
<option value="East West Bank">East West Bank</option>
<option value="Synovus">Synovus</option>
<option value="Valley National Bank">Valley National Bank</option>
<option value="Credit Suisse ">Credit Suisse </option>
<option value="Mizuho Financial Group">Mizuho Financial Group</option>
<option value="Wintrust Financial">Wintrust Financial</option>
<option value="Cullen/Frost Bankers, Inc.">Cullen/Frost Bankers, Inc.</option>
<option value="John Deere Capital Corporation">John Deere Capital Corporation</option>
<option value="MUFG Union Bank">MUFG Union Bank</option>
<option value="BOK Financial Corporation">BOK Financial Corporation</option>
<option value="Old National Bank">Old National Bank</option>
<option value="South State Bank">South State Bank</option>
<option value="FNB Corporation">FNB Corporation</option>
<option value="Pinnacle Financial Partners">Pinnacle Financial Partners</option>
<option value="PacWest Bancorp">PacWest Bancorp</option>
<option value="TIAA">TIAA</option>
<option value="Associated Banc-Corp">Associated Banc-Corp</option>
<option value="UMB Financial Corporation">UMB Financial Corporation</option>
<option value="Prosperity Bancshares">Prosperity Bancshares</option>
<option value="Stifel">Stifel</option>
<option value="BankUnited">BankUnited</option>
<option value="Hancock Whitney">Hancock Whitney</option>
<option value="MidFirst Bank">MidFirst Bank</option>
<option value="Sumitomo Mitsui Banking Corporation">Sumitomo Mitsui Banking Corporation</option>
<option value="Beal Bank">Beal Bank</option>
<option value="First Interstate BancSystem">First Interstate BancSystem</option>
<option value="Commerce Bancshares">Commerce Bancshares</option>
<option value="Umpqua Holdings Corporation">Umpqua Holdings Corporation</option>
<option value="United Bank (West Virginia)">United Bank (West Virginia)</option>
<option value="Texas Capital Bank">Texas Capital Bank</option>
<option value="First National of Nebraska">First National of Nebraska</option>
<option value="FirstBank Holding Co">FirstBank Holding Co</option>
<option value="Simmons Bank">Simmons Bank</option>
<option value="Fulton Financial Corporation">Fulton Financial Corporation</option>
<option value="Glacier Bancorp">Glacier Bancorp</option>
<option value="Arvest Bank">Arvest Bank</option>
<option value="BCI Financial Group">BCI Financial Group</option>
<option value="Ameris Bancorp">Ameris Bancorp</option>
<option value="First Hawaiian Bank">First Hawaiian Bank</option>
<option value="United Community Bank">United Community Bank</option>
<option value="Bank of Hawaii">Bank of Hawaii</option>
<option value="Home BancShares">Home BancShares</option>
<option value="Eastern Bank">Eastern Bank</option>
<option value="Cathay Bank">Cathay Bank</option>
<option value="Pacific Premier Bancorp">Pacific Premier Bancorp</option>
<option value="Washington Federal">Washington Federal</option>
<option value="Customers Bancorp">Customers Bancorp</option>
<option value="Atlantic Union Bank">Atlantic Union Bank</option>
<option value="Columbia Bank">Columbia Bank</option>
<option value="Heartland Financial USA">Heartland Financial USA</option>
<option value="WSFS Bank">WSFS Bank</option>
<option value="Central Bancompany">Central Bancompany</option>
<option value="Independent Bank">Independent Bank</option>
<option value="Hope Bancorp">Hope Bancorp</option>
<option value="SoFi">SoFi</option>




<?php foreach($bank_list as $b){ ?>
  <option value="<?=$b['bank_name']; ?>"><?=$b['bank_name']; ?></option>
<?php } ?>
</select>
</div>
      </div>
      <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
      <input class=" form-control" type="hidden"  readonly name="customer_name_modal" id="customer_name_modal" required   />    
      <div class="form-group row">

<label for="billing_address" style="text-align:end;" class="col-sm-3 col-form-label"><?php echo display('Amount to be paid')?> : </label>

<div class="col-sm-5">
<table border="0">
      <tr>
        <td class="cus" name="cus"></td>
        <td><input  type="text"  readonly name="amount_to_pay" id="amount_to_pay"   style="width:190%;" class="form-control" required   /></td>

    </tr>
   </table>


</div>
</div> 
      <div class="form-group row" style="display:none;">

<label for="billing_address" style="text-align:end;" class="col-sm-3 col-form-label"><?php echo display('Amount Received')?> : </label>

<div class="col-sm-5">
<table border="0">
      <tr>
        <td class="cus" name="cus"></td>
        <td><input  type="text"  readonly name="amount_received" id="amount_received" class="form-control" style="width:190%;" required   /></td>
     </tr>
   </table>



</div>
</div> 
<div class="form-group row">

<label for="billing_address" style="text-align:end;"    class="col-sm-3 col-form-label"><?php echo display('Balance')?> : </label>

<div class="col-sm-5">

<table border="0">
      <tr>
        <td class="cus" name="cus"></td>
        <td><input  type="text"   readonly name="balance_modal"  style="width:190%;" id="balance_modal" class="form-control" required  /></td>
     </tr>
   </table>
</div>
</div> 
<div class="form-group row">

<label for="billing_address" style="text-align:end;" class="col-sm-3 col-form-label"><?php echo display('Payment Amount') ?>: <i class="text-danger">*</i></label>

<div class="col-sm-5">
<table border="0">
      <tr>
        <td class="cus" name="cus"></td>
        <td><input  type="text"   name="payment" id="payment_from_modal"  style="width:190%;" class="form-control"required   /></td>
     </tr>
   </table>


</div>
</div>

<div class="form-group row">

<label for="billing_address" style="text-align:end;" class="col-sm-3 col-form-label"><?php echo display('Additional Information') ?> : </label>

<div class="col-sm-5">
<input class=" form-control" type="text"  name="details" id="details"/>
</div>
</div> 
<div class="form-group row">

<label for="billing_address" style="text-align:end;" class="col-sm-3 col-form-label"><?php echo display('Attachments') ?> : </label>

<div class="col-sm-5">
<input class=" form-control" type="file"  name="attachement" id="attachement" />
</div>
</div> 
  </div>   </div>
     <div class="modal-footer">
     <div class="col-sm-8"></div>

     <div class="col-sm-4">
                  <a href="#" class="btn" data-dismiss="modal" style="color:white;background-color:#38469f;" ><?php echo display('Close') ?></a>
     <input class="btn btn-primary" type="submit" style="color:white;background-color:#38469f;"  name="submit_pay" id="submit_pay" value=<?php echo display('submit') ?> required   />
</div>
     </div>
   </div>
   </form>
 </div>
</div>
<div class="modal fade" id="add_bank_info">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="color:white;background-color:#38469f;">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                	<h4 class="modal-title"><?php echo display('ADD BANK') ?></h4>

            </div>
            <div class="container"></div>
            <div class="modal-body">  <div id="customeMessage" class="alert hide"></div>


<form id="add_bank"  method="post">  
<div class="panel-body">

<input type ="hidden" name="csrf_test_name" id="" value="<?php echo $this->security->get_csrf_hash();?>">

  <div class="form-group row">

      <label for="bank_name" class="col-sm-4 col-form-label"><?php echo display('bank_name') ?> <i class="text-danger">*</i></label>

      <div class="col-sm-6">

          <input type="text" class="form-control" name="bank_name" id="bank_name" required="" placeholder="<?php echo display('bank_name') ?>" tabindex="1"/>

      </div>

  </div>



  <div class="form-group row">

      <label for="ac_name" class="col-sm-4 col-form-label"><?php echo display('ac_name') ?> <i class="text-danger">*</i></label>

      <div class="col-sm-6">

          <input type="text" class="form-control" name="ac_name" id="ac_name" required="" placeholder="<?php echo display('ac_name') ?>" tabindex="2"/>

      </div>

  </div>

  <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
                      

  <div class="form-group row">

      <label for="ac_no" class="col-sm-4 col-form-label"><?php echo display('ac_no') ?> <i class="text-danger">*</i></label>

      <div class="col-sm-6">

          <input type="text" class="form-control" name="ac_no" id="ac_no" required="" placeholder="<?php echo display('ac_no') ?>" tabindex="3"/>

      </div>

  </div>



  <div class="form-group row">

      <label for="branch" class="col-sm-4 col-form-label"><?php echo display('branch') ?> <i class="text-danger">*</i></label>

      <div class="col-sm-6">

          <input type="text" class="form-control" name="branch" id="branch" required="" placeholder="<?php echo display('branch') ?>" tabindex="4"/>

      </div>

  </div>

  <div class="form-group row">
  <label for="shipping_line" class="col-sm-4 col-form-label"><?php echo display('Country') ?>
                                        <i class="text-danger"></i>
                                    </label>
                                    <div class="col-sm-6">
                                    <select class="selectpicker countrypicker form-control"  data-live-search="true" data-default="United States"  name="country" id="country" style="width:100%"></select>
                                 
                                    </div>

</div>
<div class="form-group row">
            <label for="previous_balance" class="col-sm-4 col-form-label"><?php echo display('Currency') ?></label>
            <div class="col-sm-6">
            <select  class="form-control" id="currency" name="currency1" class="form-control"  style="width: 100%;" required=""  style="max-width: -webkit-fill-available;">
    <option><?php echo display('Select currency') ?></option>
    <option value="AFN">AFN - Afghan Afghani</option>
    <option value="ALL">ALL - Albanian Lek</option>
    <option value="DZD">DZD - Algerian Dinar</option>
    <option value="AOA">AOA - Angolan Kwanza</option>
    <option value="ARS">ARS - Argentine Peso</option>
    <option value="AMD">AMD - Armenian Dram</option>
    <option value="AWG">AWG - Aruban Florin</option>
    <option value="AUD">AUD - Australian Dollar</option>
    <option value="AZN">AZN - Azerbaijani Manat</option>
    <option value="BSD">BSD - Bahamian Dollar</option>
    <option value="BHD">BHD - Bahraini Dinar</option>
    <option value="BDT">BDT - Bangladeshi Taka</option>
    <option value="BBD">BBD - Barbadian Dollar</option>
    <option value="BYR">BYR - Belarusian Ruble</option>
    <option value="BEF">BEF - Belgian Franc</option>
    <option value="BZD">BZD - Belize Dollar</option>
    <option value="BMD">BMD - Bermudan Dollar</option>
    <option value="BTN">BTN - Bhutanese Ngultrum</option>
    <option value="BTC">BTC - Bitcoin</option>
    <option value="BOB">BOB - Bolivian Boliviano</option>
    <option value="BAM">BAM - Bosnia-Herzegovina Convertible Mark</option>
    <option value="BWP">BWP - Botswanan Pula</option>
    <option value="BRL">BRL - Brazilian Real</option>
    <option value="GBP">GBP - British Pound Sterling</option>
    <option value="BND">BND - Brunei Dollar</option>
    <option value="BGN">BGN - Bulgarian Lev</option>
    <option value="BIF">BIF - Burundian Franc</option>
    <option value="KHR">KHR - Cambodian Riel</option>
    <option value="CAD">CAD - Canadian Dollar</option>
    <option value="CVE">CVE - Cape Verdean Escudo</option>
    <option value="KYD">KYD - Cayman Islands Dollar</option>
    <option value="XOF">XOF - CFA Franc BCEAO</option>
    <option value="XAF">XAF - CFA Franc BEAC</option>
    <option value="XPF">XPF - CFP Franc</option>
    <option value="CLP">CLP - Chilean Peso</option>
    <option value="CNY">CNY - Chinese Yuan</option>
    <option value="COP">COP - Colombian Peso</option>
    <option value="KMF">KMF - Comorian Franc</option>
    <option value="CDF">CDF - Congolese Franc</option>
    <option value="CRC">CRC - Costa Rican ColÃ³n</option>
    <option value="HRK">HRK - Croatian Kuna</option>
    <option value="CUC">CUC - Cuban Convertible Peso</option>
    <option value="CZK">CZK - Czech Republic Koruna</option>
    <option value="DKK">DKK - Danish Krone</option>
    <option value="DJF">DJF - Djiboutian Franc</option>
    <option value="DOP">DOP - Dominican Peso</option>
    <option value="XCD">XCD - East Caribbean Dollar</option>
    <option value="EGP">EGP - Egyptian Pound</option>
    <option value="ERN">ERN - Eritrean Nakfa</option>
    <option value="EEK">EEK - Estonian Kroon</option>
    <option value="ETB">ETB - Ethiopian Birr</option>
    <option value="EUR">EUR - Euro</option>
    <option value="FKP">FKP - Falkland Islands Pound</option>
    <option value="FJD">FJD - Fijian Dollar</option>
    <option value="GMD">GMD - Gambian Dalasi</option>
    <option value="GEL">GEL - Georgian Lari</option>
    <option value="DEM">DEM - German Mark</option>
    <option value="GHS">GHS - Ghanaian Cedi</option>
    <option value="GIP">GIP - Gibraltar Pound</option>
    <option value="GRD">GRD - Greek Drachma</option>
    <option value="GTQ">GTQ - Guatemalan Quetzal</option>
    <option value="GNF">GNF - Guinean Franc</option>
    <option value="GYD">GYD - Guyanaese Dollar</option>
    <option value="HTG">HTG - Haitian Gourde</option>
    <option value="HNL">HNL - Honduran Lempira</option>
    <option value="HKD">HKD - Hong Kong Dollar</option>
    <option value="HUF">HUF - Hungarian Forint</option>
    <option value="ISK">ISK - Icelandic KrÃ³na</option>
    <option value="INR">INR - Indian Rupee</option>
    <option value="IDR">IDR - Indonesian Rupiah</option>
    <option value="IRR">IRR - Iranian Rial</option>
    <option value="IQD">IQD - Iraqi Dinar</option>
    <option value="ILS">ILS - Israeli New Sheqel</option>
    <option value="ITL">ITL - Italian Lira</option>
    <option value="JMD">JMD - Jamaican Dollar</option>
    <option value="JPY">JPY - Japanese Yen</option>
    <option value="JOD">JOD - Jordanian Dinar</option>
    <option value="KZT">KZT - Kazakhstani Tenge</option>
    <option value="KES">KES - Kenyan Shilling</option>
    <option value="KWD">KWD - Kuwaiti Dinar</option>
    <option value="KGS">KGS - Kyrgystani Som</option>
    <option value="LAK">LAK - Laotian Kip</option>
    <option value="LVL">LVL - Latvian Lats</option>
    <option value="LBP">LBP - Lebanese Pound</option>
    <option value="LSL">LSL - Lesotho Loti</option>
    <option value="LRD">LRD - Liberian Dollar</option>
    <option value="LYD">LYD - Libyan Dinar</option>
    <option value="LTL">LTL - Lithuanian Litas</option>
    <option value="MOP">MOP - Macanese Pataca</option>
    <option value="MKD">MKD - Macedonian Denar</option>
    <option value="MGA">MGA - Malagasy Ariary</option>
    <option value="MWK">MWK - Malawian Kwacha</option>
    <option value="MYR">MYR - Malaysian Ringgit</option>
    <option value="MVR">MVR - Maldivian Rufiyaa</option>
    <option value="MRO">MRO - Mauritanian Ouguiya</option>
    <option value="MUR">MUR - Mauritian Rupee</option>
    <option value="MXN">MXN - Mexican Peso</option>
    <option value="MDL">MDL - Moldovan Leu</option>
    <option value="MNT">MNT - Mongolian Tugrik</option>
    <option value="MAD">MAD - Moroccan Dirham</option>
    <option value="MZM">MZM - Mozambican Metical</option>
    <option value="MMK">MMK - Myanmar Kyat</option>
    <option value="NAD">NAD - Namibian Dollar</option>
    <option value="NPR">NPR - Nepalese Rupee</option>
    <option value="ANG">ANG - Netherlands Antillean Guilder</option>
    <option value="TWD">TWD - New Taiwan Dollar</option>
    <option value="NZD">NZD - New Zealand Dollar</option>
    <option value="NIO">NIO - Nicaraguan CÃ³rdoba</option>
    <option value="NGN">NGN - Nigerian Naira</option>
    <option value="KPW">KPW - North Korean Won</option>
    <option value="NOK">NOK - Norwegian Krone</option>
    <option value="OMR">OMR - Omani Rial</option>
    <option value="PKR">PKR - Pakistani Rupee</option>
    <option value="PAB">PAB - Panamanian Balboa</option>
    <option value="PGK">PGK - Papua New Guinean Kina</option>
    <option value="PYG">PYG - Paraguayan Guarani</option>
    <option value="PEN">PEN - Peruvian Nuevo Sol</option>
    <option value="PHP">PHP - Philippine Peso</option>
    <option value="PLN">PLN - Polish Zloty</option>
    <option value="QAR">QAR - Qatari Rial</option>
    <option value="RON">RON - Romanian Leu</option>
    <option value="RUB">RUB - Russian Ruble</option>
    <option value="RWF">RWF - Rwandan Franc</option>
    <option value="SVC">SVC - Salvadoran ColÃ³n</option>
    <option value="WST">WST - Samoan Tala</option>
    <option value="SAR">SAR - Saudi Riyal</option>
    <option value="RSD">RSD - Serbian Dinar</option>
    <option value="SCR">SCR - Seychellois Rupee</option>
    <option value="SLL">SLL - Sierra Leonean Leone</option>
    <option value="SGD">SGD - Singapore Dollar</option>
    <option value="SKK">SKK - Slovak Koruna</option>
    <option value="SBD">SBD - Solomon Islands Dollar</option>
    <option value="SOS">SOS - Somali Shilling</option>
    <option value="ZAR">ZAR - South African Rand</option>
    <option value="KRW">KRW - South Korean Won</option>
    <option value="XDR">XDR - Special Drawing Rights</option>
    <option value="LKR">LKR - Sri Lankan Rupee</option>
    <option value="SHP">SHP - St. Helena Pound</option>
    <option value="SDG">SDG - Sudanese Pound</option>
    <option value="SRD">SRD - Surinamese Dollar</option>
    <option value="SZL">SZL - Swazi Lilangeni</option>
    <option value="SEK">SEK - Swedish Krona</option>
    <option value="CHF">CHF - Swiss Franc</option>
    <option value="SYP">SYP - Syrian Pound</option>
    <option value="STD">STD - São Tomé and Príncipe Dobra</option>
    <option value="TJS">TJS - Tajikistani Somoni</option>
    <option value="TZS">TZS - Tanzanian Shilling</option>
    <option value="THB">THB - Thai Baht</option>
    <option value="TOP">TOP - Tongan pa'anga</option>
    <option value="TTD">TTD - Trinidad & Tobago Dollar</option>
    <option value="TND">TND - Tunisian Dinar</option>
    <option value="TRY">TRY - Turkish Lira</option>
    <option value="TMT">TMT - Turkmenistani Manat</option>
    <option value="UGX">UGX - Ugandan Shilling</option>
    <option value="UAH">UAH - Ukrainian Hryvnia</option>
    <option value="AED">AED - United Arab Emirates Dirham</option>
    <option value="UYU">UYU - Uruguayan Peso</option>
    <option selected value="USD">USD - US Dollar</option>
    <option value="UZS">UZS - Uzbekistan Som</option>
    <option value="VUV">VUV - Vanuatu Vatu</option>
    <option value="VEF">VEF - Venezuelan BolÃ­var</option>
    <option value="VND">VND - Vietnamese Dong</option>
    <option value="YER">YER - Yemeni Rial</option>
    <option value="ZMK">ZMK - Zambian Kwacha</option>
</select>




</div>
 </div>

</div>



  </div>



  <div class="modal-footer">

      <div class="row">
        <div class="col-sm-8">
</div>
    
<div class="col-sm-4">
              <a href="#" class="btn" data-dismiss="modal" style="color:white;background-color:#38469f;" ><?php echo display('Close') ?></a>
     <input type="submit" id="addBank"  style="color:white;background-color:#38469f;"  class="btn btn-primary" name="addBank" value="<?php echo display('save') ?>"/>
     <!--  <input type="submit" class="btn btn-success" value="Submit"> -->

  </div>
  </div>  </div>

</form>
  </div>
  </div>
  </div>              
  

                
<script>
        var csrfName = '<?php echo $this->security->get_csrf_token_name();?>';
var csrfHash = '<?php echo $this->security->get_csrf_hash();?>';
$(document).ready(function(){
$(".sidebar-mini").addClass('sidebar-collapse') ;
});

function discard(){
   $.get(
    "<?php echo base_url(); ?>Cinvoice/deletesale/", 
   { val: $("#invoice_hdn1").val(), csrfName:csrfHash,payment_id:$('#payment_id').val() }, // put your parameters here
   function(responseText){
    console.log(responseText);
    window.btn_clicked = true;      //set btn_clicked to true
    var input_hdn="Your Invoice  has been Discared";
  
    console.log(input_hdn);
    $('#myModal3').modal('hide');
    $("#bodyModal1").html(input_hdn);
        $('#myModal1').modal('show');
    window.setTimeout(function(){
       

        window.location = "<?php  echo base_url(); ?>Cinvoice/manage_invoice";
      }, 2500);
   }
); 
}
     function submit_redirect(){
        window.btn_clicked = true;      //set btn_clicked to true
    var input_hdn="Your Invoice No :"+$('#invoice_hdn').val()+" has been updated Successfully";
  
    console.log(input_hdn);
    $('#myModal3').modal('hide');
    $("#bodyModal1").html(input_hdn);
    $('#myModal1').modal('show');
    window.setTimeout(function(){
       

        window.location = "<?php  echo base_url(); ?>Cinvoice/manage_invoice";
      }, 2000);
     }
     $('#email_btn').on('click', function (e) {
// var link=localStorage.getItem("truck");
// console.log(link);
 var popout = window.open("<?php  echo base_url(); ?>Cinvoice/sendmail_with_attachments/"+$('#invoice_hdn1').val());
    // window.setTimeout(function(){
    //     popout.close();
    //  }, 1500);
      e.preventDefault();
});
// $('#insert_trucking').submit(function (event) {
   
       
//     var dataString = {
//         dataString : $("#insert_trucking").serialize()
    
//    };
//    dataString[csrfName] = csrfHash;
  
//     $.ajax({
//         type:"POST",
//         dataType:"json",
//         url:"<?php echo base_url(); ?>Cinvoice/manual_sales_insert",
//         data:$("#insert_trucking").serialize(),

//         success:function (data) {
//         console.log(data);
//         var input_hdn="New Sale Updated Successfully";
//         $("#bodyModal1").html(input_hdn);
//         $('#myModal1').modal('show');
//       $('.hidden_button').show();  
//     window.setTimeout(function(){
//         $('.modal').modal('hide');
       
// $('.modal-backdrop').remove();
//  },2500);

//             var split = data.split("/");
//             $('#invoice_hdn1').val(split[0]);
         
     
//          $('#invoice_hdn').val(split[1]);
//        }

//     });
//     event.preventDefault();
// });


$('#insert_trucking').submit(function(e) {
  $.ajax({
    url:"<?php echo base_url(); ?>Cinvoice/manual_sales_insert",
    type: 'POST',
    data: $('#insert_trucking').serialize(),
  })
  .done((response) => {
       var split = response.split("/");
        var input_hdn="Invoice Updated Successfully";
     $("#bodyModal1").html(input_hdn);
      $('#myModal1').modal('show');
             $('#invoice_hdn1').val(split[0]);
          $('#invoice_hdn').val(split[1]);
      $('.hidden_button').show();
    console.log(response);
  });
  window.setTimeout(function(){
        $('.modal').modal('hide');
$('.modal-backdrop').remove();
 },2500);
  e.preventDefault();
  return false;
});
$('#download').on('click', function (e) {

 var popout = window.open("<?php  echo base_url(); ?>Cinvoice/invoice_inserted_data/"+$('#invoice_hdn1').val());
 


});  


$('.final_submit').on('click', function (e) {

    window.btn_clicked = true;      //set btn_clicked to true
    var input_hdn='Your Invoice No : "'+$('#invoice_hdn').val()+" has been Updated Successfully";
  
    console.log(input_hdn);
    $("#bodyModal1").html(input_hdn);
        $('#myModal1').modal('show');
    window.setTimeout(function(){
       

        window.location = "<?php  echo base_url(); ?>Cinvoice/manage_invoice";
      }, 2000);
       
});

window.onbeforeunload = function(){
    if(!window.btn_clicked){
       // window.btn_clicked = true; 
        $('#myModal3').modal('show');
       return false;
    }
};
 






// Restricts input for each element in the set of matched elements to the given inputFilter.
(function($) {
  $.fn.inputFilter = function(callback, errMsg) {
    return this.on("input keydown keyup mousedown mouseup select contextmenu drop focusout", function(e) {
      if (callback(this.value)) {
        // Accepted value
        if (["keydown","mousedown","focusout"].indexOf(e.type) >= 0){
          $(this).removeClass("input-error");
          this.setCustomValidity("");
        }
        this.oldValue = this.value;
        this.oldSelectionStart = this.selectionStart;
        this.oldSelectionEnd = this.selectionEnd;
      } else if (this.hasOwnProperty("oldValue")) {
        // Rejected value - restore the previous one
        $(this).addClass("input-error");
        this.setCustomValidity(errMsg);
        this.reportValidity();
        this.value = this.oldValue;
        this.setSelectionRange(this.oldSelectionStart, this.oldSelectionEnd);
      } else {
        // Rejected value - nothing to restore
        this.value = "";
      }
    });
  };
}(jQuery));

$("#custocurrency_rate").inputFilter(function(value) {
  return /^-?\d*[.,]?\d*$/.test(value); }, "Must be a floating (real) Number");
$('#customer_name').on('change', function (e) {

    var data = {
        value: $('#customer_name').val()
      //  defaultcurrency:'<?php //echo $currency; ?>'
     };
    data[csrfName] = csrfHash;
    $.ajax({
        type:'POST',
        data: data,
      dataType:"json",
        url:'<?php echo base_url();?>Cinvoice/getcustomer_data',
        success: function(result, statut) {
         console.log(result[0]['currency_type']);
        $(".cus").html(result[0]['currency_type']);
        $("label[for='custocurrency']").html(result[0]['currency_type']);
       console.log('https://open.er-api.com/v6/latest/<?php echo $curn_info_default; ?>');
       $.getJSON('https://open.er-api.com/v6/latest/<?php echo $curn_info_default; ?>', 
function(data) {
 var custo_currency=result[0]['currency_type'];
    var x=data['rates'][custo_currency];
 var Rate =parseFloat(x).toFixed(3);
  console.log(Rate);
  $('.hiden').show();
  $("#custocurrency_rate").val(Rate);
});
    }
    });
<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

});





</script>


                   <!--      <div class="form-group row">

                                    <label for="billing_address" class="col-sm-4 col-form-label">Message on invoice</label>

                                    <div class="col-sm-8">

                                        <textarea rows="4" cols="50" name="billing_address" class=" form-control" placeholder='This will show upon the invoice' id=""> </textarea>

                                    </div>

                                </div>  -->

                   

                </div>

            </div>

             <div class="modal fade" id="printconfirmodal" tabindex="-1" role="dialog" aria-labelledby="printconfirmodal" aria-hidden="true">

      <div class="modal-dialog modal-sm">

        <div class="modal-content">

          <div class="modal-header">

            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

            <h4 class="modal-title" id="myModalLabel"><?php echo display('print') ?></h4>

          </div>

          <div class="modal-body">

            <?php echo form_open('Cinvoice/invoice_inserted_data_manual', array('class' => 'form-vertical', 'id' => '', 'name' => '')) ?>

            <div id="outputs" class="hide alert alert-danger"></div>

            <h3> <?php echo display('successfully_inserted') ?></h3>

            <h4><?php echo display('do_you_want_to_print') ?> ??</h4>

            <input type="text" name="invoice_id" id="inv_id">

          </div>

          <div class="modal-footer">

            <button type="button" onclick="cancelprint()" class="btn btn-default" data-dismiss="modal"><?php echo display('no') ?></button>

            <button type="submit" class="btn btn-primary" id="yes"><?php echo display('yes') ?></button>

            <?php echo form_close() ?>

          </div>

        </div>

      </div>

    </div>



  <!------ add new product-->  
  <div class="modal fade modal-success" id="product_info" role="dialog">

                <div class="modal-dialog" role="document">

                    <div class="modal-content">

                        <div class="modal-header" style="color:white;background-color:#38469f;">

                            

                            <a href="#" class="close" data-dismiss="modal">&times;</a>

                            <h3 class="modal-title"><?php echo display('new_product') ?></h3>

                        </div>

                        

                        <div class="modal-body">

                            <div id="customeMessage" class="alert hide"></div>

                      <?php echo form_open_multipart('Cproduct/insert_product', array('class' => 'form-vertical', 'id' => 'insert_product', 'name' => 'insert_product')) ?>

                    <div class="panel-body">

 <input type ="hidden" name="csrf_test_name" id="" value="<?php echo $this->security->get_csrf_hash();?>">

                      <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group row">
                                    <label for="barcode_or_qrcode" class="col-sm-4 col-form-label"><?php echo display('barcode_or_qrcode') ?> <i class="text-danger"></i></label>
                                    <div class="col-sm-8">
                                        <input class="form-control" name="product_id" type="text" id="product_id" placeholder="<?php echo display('barcode_or_qrcode') ?>"  tabindex="1" >
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group row">
                                    <label for="quantity" class="col-sm-4 col-form-label"><?php echo 'Quantity' ?> <i class="text-danger">*</i></label>
                                    <div class="col-sm-8">
                                        <input class="form-control" name="quantity" type="number" id="quantity" placeholder="Enter Product Quantity only" required tabindex="1" >
                                    </div>
                                </div>
                            </div>
                        </div>



                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group row">
                                    <label for="product_name" class="col-sm-4 col-form-label"><?php echo display('product_name') ?> <i class="text-danger">*</i></label>
                                    <div class="col-sm-8">
                                        <input class="form-control" name="product_name" type="text" id="product_name" placeholder="<?php echo display('product_name') ?>" required tabindex="1" >
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group row">
                                    <label for="serial_no" class="col-sm-4 col-form-label"><?php echo display('serial_no') ?> </label>
                                    <div class="col-sm-8">
                                        <input type="text" tabindex="" class="form-control " id="serial_no" name="serial_no" placeholder="111,abc,XYz"   />
                                    </div>
                                </div>
                            </div>

                        </div>



                       <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group row">
                                    <label for="product_model" class="col-sm-4 col-form-label"><?php echo display('model') ?> <i class="text-danger"></i></label>
                                    <div class="col-sm-8">
                                        <input type="text" tabindex="" class="form-control" id="product_model" name="model" placeholder="<?php echo display('model') ?>" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group row">
                                    <label for="category_id" class="col-sm-4 col-form-label"><?php echo display('category') ?></label>
                                    <div class="col-sm-8">
                                        <select class="form-control" id="category_id" name="category_id" tabindex="3">
                                            <option value=""></option>
                                            <?php if ($category_list) { ?>
                                                {category_list}
                                                <option value="{category_id}">{category_name}</option>
                                                {/category_list}
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>


                        </div>      



                         <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group row">
                                    <label for="sell_price" class="col-sm-4 col-form-label"><?php echo display('sell_price') ?> <i class="text-danger">*</i> </label>
                                    <div class="col-sm-8">
                                        <input class="form-control text-right" id="sell_price" name="price" type="text" required="" placeholder="0.00" tabindex="5" min="0">
                                    </div>
                                </div> 
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group row">
                                    <label for="unit" class="col-sm-4 col-form-label"><?php echo display('unit') ?></label>
                                    <div class="col-sm-8">
                                        <select class="form-control" id="unit" name="unit" tabindex="-1" aria-hidden="true">
                                            <option value="">Select One</option>
                                            <?php if ($unit_list) { ?>
                                                {unit_list}
                                                <option value="{unit_name}">{unit_name}</option>
                                                {/unit_list}
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>



                       <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group row">
                                    <label for="image" class="col-sm-4 col-form-label"><?php echo display('image') ?> </label>
                                    <div class="col-sm-8">
                                        <input type="file" name="image" class="form-control" id="image" tabindex="4">
                                    </div>
                                </div> 
                            </div>
                             <?php  $i=0;
                    foreach ($taxfield as $taxss) {?>
                   
                            <div class="col-sm-6">
                         <div class="form-group row">
                            <label for="tax" class="col-sm-4 col-form-label"><?php echo $taxss['tax_name']; ?> <i class="text-danger"></i></label>
                            <div class="col-sm-7">
                              <input type="text" name="tax<?php echo $i;?>" class="form-control" value="<?php echo number_format($taxss['default_value'], 2, '.', ',');?>">
                            </div>
                            <div class="col-sm-1"> <i class="text-success">%</i></div>
                        </div>
                    </div>
               
                       <?php $i++;}?>
                        </div> 
                        <div class="table-responsive product-supplier">
                            <table class="table table-bordered table-hover"  id="product_table">
                                <thead>
                                    <tr>
                                        <th class="text-center"><?php echo display('supplier') ?> <i class="text-danger">*</i></th>
                                        <th class="text-center"><?php echo display('supplier_price') ?> <i class="text-danger">*</i></th>


                                        <!-- <th class="text-center"><?php// echo display('action') ?> <i class="text-danger"></i></th> -->
                                    </tr>
                                </thead>
                                <tbody id="proudt_item">
                                    <tr class="">

                                        <td width="300">
                                            <select name="supplier_id[]" class="form-control"  required="">
                                                <option value=""> <?php echo display('select Supplier') ?></option>
                                                <?php if ($supplier) { ?>
                                                    {supplier}
                                                    <option value="{supplier_name}">{supplier_name}</option>
                                                    {/supplier}
                                                <?php } ?>
                                            </select>
                                        </td>
                                        <td class="">
                                            <input type="text" tabindex="6" class="form-control text-right" name="supplier_price[]" placeholder="0.00"  required  min="0"/>
                                        </td>

                                        <!-- <td width="100"> <a  id="add_purchase_item" class="btn btn-info btn-sm" name="add-invoice-item" onClick="addpruduct('proudt_item');"  tabindex="9"/><i class="fa fa-plus-square" aria-hidden="true"></i></a> <a class="btn btn-danger btn-sm"  value="<?php //echo display('delete') ?>" onclick="deleteRow(this)" tabindex="10"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                        </td> -->
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                   <div class="row">
                            <div class="col-sm-12">
                                <center><label for="description" class="col-form-label"><?php echo display('product_details') ?></label></center>
                                <textarea class="form-control" name="description" id="description" rows="2" placeholder="<?php echo display('product_details') ?>" tabindex="2"></textarea>
                            </div>
                        </div><br>
                        <div class="form-group row">
                            <div class="col-sm-6">

                                <input type="submit" id="add-product" class="btn btn-primary btn-large" name="add-product" value="<?php echo display('save') ?>" tabindex="10"/>

                            
                             
                            </div>
                        </div>

                    </div>

                    

                        </div>



                        <div class="modal-footer">

                            

                            <a href="#" class="btn btn-danger" data-dismiss="modal"><?php echo display('Close') ?></a>

                            
                            <input type="submit" id="add-deposit" class="btn btn-success" name="add-deposit" value="<?php echo display('save') ?>" tabindex="6"/>
                           <!--  <input type="submit" class="btn btn-success" value="Submit"> -->

                        </div>

                        <?php echo form_close() ?>

                    </div><!-- /.modal-content -->

                </div><!-- /.modal-dialog -->

            </div><!-- /.modal -->

  <!------ add new bank -->  
      <div class="modal fade modal-success" id="bank_info" role="dialog">

                <div class="modal-dialog" role="document">

                    <div class="modal-content">

                        <div class="modal-header">

                            

                            <a href="#" class="close" data-dismiss="modal">&times;</a>

                            <h3 class="modal-title"><?php echo display('add_new_bank') ?></h3>

                        </div>

                        

                        <div class="modal-body">

                            <div id="customeMessage" class="alert hide"></div>

                      <?php echo form_open_multipart('Csettings/add_new_bank',array('class' => 'form-vertical','id' => 'validate' ))?>

                    <div class="panel-body">

 <input type ="hidden" name="csrf_test_name" id="" value="<?php echo $this->security->get_csrf_hash();?>">

                        <div class="form-group row">

                            <label for="bank_name" class="col-sm-4 col-form-label"><?php echo display('bank_name') ?> <i class="text-danger">*</i></label>

                            <div class="col-sm-6">

                                <input type="text" class="form-control" name="bank_name" id="bank_name" required="" placeholder="<?php echo display('bank_name') ?>" tabindex="1"/>

                            </div>

                        </div>



                        <div class="form-group row">

                            <label for="ac_name" class="col-sm-3 col-form-label"><?php echo display('ac_name') ?> <i class="text-danger">*</i></label>

                            <div class="col-sm-6">

                                <input type="text" class="form-control" name="ac_name" id="ac_name" required="" placeholder="<?php echo display('ac_name') ?>" tabindex="2"/>

                            </div>

                        </div>



                        <div class="form-group row">

                            <label for="ac_no" class="col-sm-3 col-form-label"><?php echo display('ac_no') ?> <i class="text-danger">*</i></label>

                            <div class="col-sm-6">

                                <input type="text" class="form-control" name="ac_no" id="ac_no" required="" placeholder="<?php echo display('ac_no') ?>" tabindex="3"/>

                            </div>

                        </div>



                        <div class="form-group row">

                            <label for="branch" class="col-sm-3 col-form-label"><?php echo display('branch') ?> <i class="text-danger">*</i></label>

                            <div class="col-sm-6">

                                <input type="text" class="form-control" name="branch" id="branch" required="" placeholder="<?php echo display('branch') ?>" tabindex="4"/>

                            </div>

                        </div>



                        <div class="form-group row">

                            <label for="signature_pic" class="col-sm-3 col-form-label"><?php echo display('signature_pic') ?></label>

                            <div class="col-sm-6">

                                <input type="file" class="form-control" name="signature_pic" id="signature_pic" placeholder="<?php echo display('signature_pic') ?>" tabindex="5"/>

                            </div>

                        </div>

                   

                    </div>

                    

                        </div>



                        <div class="modal-footer">

                            

                            <a href="#" class="btn btn-danger" data-dismiss="modal"><?php echo display('Close') ?></a>

                            
                            <input type="submit" id="add-deposit" class="btn btn-success" name="add-deposit" value="<?php echo display('save') ?>" tabindex="6"/>
                           <!--  <input type="submit" class="btn btn-success" value="Submit"> -->

                        </div>

                        <?php echo form_close() ?>

                    </div><!-- /.modal-content -->

                </div><!-- /.modal-dialog -->

            </div><!-- /.modal -->
  <!------ add new customer -->  

    <div class="modal fade modal-success" id="cust_info" role="dialog">

                <div class="modal-dialog" role="document">

                    <div class="modal-content">

                        <div class="modal-header">

                            

                            <a href="#" class="close" data-dismiss="modal">&times;</a>

                            <h3 class="modal-title"><?php echo display('add_new_customer') ?></h3>

                        </div>

                        

                        <div class="modal-body">

                            <div id="customeMessage" class="alert hide"></div>

                       <?php echo form_open('Cinvoice/instant_customer', array('class' => 'form-vertical', 'id' => 'newcustomer')) ?>

                    <div class="panel-body">

                        <input type ="hidden" name="csrf_test_name" id="" value="<?php echo $this->security->get_csrf_hash();?>">

                        <div class="form-group row">

                            <label for="customer_name" class="col-sm-3 col-form-label"><?php echo display('customer_name') ?> <i class="text-danger">*</i></label>

                            <div class="col-sm-6">

                                <input class="form-control" name ="customer_name" id="" type="text" placeholder="<?php echo display('customer_name') ?>"  required="" tabindex="1" >

                            </div>

                        </div>



                        <div class="form-group row">

                             <label for="customer_email" class="col-sm-3 col-form-label">
                             <?php echo display('  Customer') ?> <br><?php echo display('Email') ?>
                              <i class="text-danger">*</i></label>

                            <div class="col-sm-6">

                                <input class="form-control" name ="email" id="email" type="email" placeholder="<?php echo display('customer_email') ?>" required tabindex="2"> 

                            </div>

                        </div>



                        <div class="form-group row">

                            <label for="mobile" class="col-sm-3 col-form-label"><?php echo display('customer_mobile') ?><i class="text-danger">*</i></label>

                            <div class="col-sm-6">

                                <input class="form-control" name ="mobile" id="mobile" type="number" placeholder="<?php echo display('customer_mobile') ?>" min="0" tabindex="3" required>

                            </div>

                        </div>



                        <div class="form-group row">

                            <label for="address " class="col-sm-3 col-form-label"><?php echo display('customer_address') ?><i class="text-danger">*</i></label>

                            <div class="col-sm-6">

                                <textarea class="form-control" required name="address" id="address " rows="3" placeholder="<?php echo display('customer_address') ?>" tabindex="4"></textarea>

                            </div>

                        </div>

                      

                    </div>

                    

                        </div>



                        <div class="modal-footer">

                            

                            <a href="#" class="btn btn-danger" data-dismiss="modal"><?php echo display('Close') ?></a>

                            

                            <input type="submit" class="btn btn-success" onClick="refreshPage()" value="Submit">

                        </div>

                        <?php echo form_close() ?>

                    </div><!-- /.modal-content -->

                </div><!-- /.modal-dialog -->

            </div><!-- /.modal -->

         




<!------ add new Payment Type -->  
          <div class="modal fade modal-success" id="payment_type" role="dialog">

                <div class="modal-dialog" role="document">

                    <div class="modal-content">

                        <div class="modal-header">

                            

                            <a href="#" class="close" data-dismiss="modal">&times;</a>

                            <h3 class="modal-title"><?php echo display('Add New Payment Type') ?></h3>

                        </div>

                        

                        <div class="modal-body">

                            <div id="customeMessage" class="alert hide"></div>

                       <?php echo form_open('Cinvoice/instant_customer', array('class' => 'form-vertical', 'id' => 'newcustomer')) ?>

                    <div class="panel-body">

 <input type ="hidden" name="csrf_test_name" id="" value="<?php echo $this->security->get_csrf_hash();?>">

                        <div class="form-group row">

                            <label for="customer_name" class="col-sm-3 col-form-label"><?php echo display('New Payment Type') ?> <i class="text-danger">*</i></label>

                            <div class="col-sm-6">

                                <input class="form-control" name ="new_payment_type" id="" type="text" placeholder="New Payment Type"  required="" tabindex="1">

                            </div>

                        </div>


                    </div>

                    

                        </div>



                        <div class="modal-footer">

                            

                            <a href="#" class="btn btn-danger" data-dismiss="modal"><?php echo display('Close') ?></a>

                            

                            <input type="submit" class="btn btn-success" value=<?php echo display('Submit') ?> >

                        </div>

                        <?php echo form_close() ?>

                    </div><!-- /.modal-content -->

                </div><!-- /.modal-dialog -->

            </div><!-- /.modal -->


        </div>

    </section>

</div>


<div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="formModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title" id="formModalLabel"><?php echo display('Contact Us') ?></h4>
			</div>
			<div class="modal-body">
				<div class="alert alert-success hidden" id="contactSuccess">
					<strong><?php echo display('Success') ?>!</strong><?php echo display(' Your message has been sent to us.') ?>
				</div>

				<div class="alert alert-danger hidden" id="contactError">
					<strong><?php echo display('Error') ?>!</strong> <?php echo display('There was an error sending your message.') ?>
				</div>
             
			
					<div class="row">
						<div class="form-group">
							<div class="col-md-6">
								<label><?php echo display('Your name') ?> *</label>
								<input type="text"  data-msg-required="Please enter your name." maxlength="100" class="form-control" name="name" id="name_email" required>
							</div>
							<div class="col-md-6">
								<label><?php echo display('Your email address') ?> *</label>
								<input type="email"  data-msg-required="Please enter your email address." data-msg-email="Please enter a valid email address." maxlength="100" class="form-control" name="email" id="email_info" required>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="form-group">
							<div class="col-md-12">
								<label><?php echo display('Subject') ?></label>
								<input type="text"  data-msg-required="Please enter the subject." maxlength="100" class="form-control" name="subject" id="subject_email" required>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="form-group">
							<div class="col-md-12">
								<label><?php echo display('Message') ?> *</label>
								<textarea maxlength="5000" data-msg-required="Please enter your message." rows="10" class="form-control" name="message" id="message_email" required></textarea>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<input type="submit" value="Send Message" id="email_send" name="email_send" style="color:white;background-color: #38469f;" class="btn btn-lg mb-xlg" data-loading-text="Loading...">
						</div>
					</div>
                   

			</div>
		</div>
	</div>
</div>
<!-- start Modal for all action -->
<div class="modal fade" id="myModal1" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content" style="    margin-top: 190px;">
        <div class="modal-header" style="color:white;background-color:#38469f;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><?php echo display('New Sale') ?></h4>
        </div>
        <div class="modal-body">
          
          <h4><?php echo display('Sales Invoice Updated Succefully') ?></h4>
     
        </div>
        <div class="modal-footer">
          
        </div>
      </div>
      
    </div>
  </div>

  <!-- End Modal for all action -->
<!-- Invoice Report End -->
<div class="modal fade" id="payment_history_modal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content" style="width: 1000px;min-width: max-content;margin-top: 190px;">
        <div class="modal-header" style="color:white;background-color:#38469f;">
          <button type="button" id="history_close" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><?php echo display('PAYMENT HISTORY') ?></h4>
        </div>
        <div class="modal-body1">
        <div id="salle_list"></div>
     
        </div>
        <div class="modal-footer">
          
        </div>
      </div>
      
    </div>
  </div>


<div id="product_model_info" class="modal fade" style="margin-right: 900px;width:2000px;" role="dialog">
  <div class="modal-dialog" style="float:left;">

    <!-- Modal content-->
   <div class="modal-content" style="width: fit-content;margin-top: 100px;margin-left:300px;">
    <div class="modal-header" style="color:white;background-color:#38469f;">
          <button type="button" id="history_close" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><?php echo display('Product') ?></h4>
        </div>
      <div class="modal-body">
        <div id="salle" style="padding:20px;"></div>
      </div>
      
    </div>

  </div>
</div>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script type="text/javascript">
    //Add Input Field Of Row


    $('#add_purchase').on('click', function() {
    $('#send_email1').show();
    $('#send_email2').show();
    $('#send_email3').show();
    
    });
     $(function() { 
        $('#send_email1').hide();
        $('#send_email2').hide();
        $('#send_email3 ').hide();

       var data = {
    
       };

       data[csrfName] = csrfHash;
   
       $.ajax({
           type:'POST',
           data: data, 
          dataType:"json",
           url:'<?php echo base_url();?>Cinvoice/get_email_data',
           success: function(result, statut) {
            console.log(result);
               if(result.csrfName){
                  csrfName = result.csrfName;
                  csrfHash = result.csrfHash;
               }
               $('#name_email').val(result[0]['greeting']);
               $('#subject_email').val(result[0]['subject']);
               $('#message_email').html(result[0]['message']);
           }
       });
   });


      $('.product_name').on('select', function () {
       console.log('You selected: ' + this.value);
    }).change();
    $('#customer_name').change(function(e){
       
    var data = {
      
        value:$(this).val()
    };
    data[csrfName] = csrfHash;

    $.ajax({
        type:'POST',
        data: data, 
       dataType:"json",
        url:'<?php echo base_url();?>Cinvoice/getcustomer_data',
        success: function(result, statut) {
            if(result.csrfName){
               csrfName = result.csrfName;
               csrfHash = result.csrfHash;
            }
            $('#billing_address').html(result[0]['customer_address']+'\n'+result[0]['customer_email']+'\n'+result[0]['phone']);
            $('#shipping_address').html(result[0]['address2']+'\n'+result[0]['customer_email']+'\n'+result[0]['phone']);
    $('#email_info').val(result[0]['customer_email']);
        }
    });
});

</script>

<script type="text/javascript">

    $('#add_purchase').on('click', function() {


    });



</script>


<script type="text/javascript">
     $('#number_of_days').change(function(){
      
       var data = {
           sales_invoice_date : $('#date').val(),
           days : $(this).val(),   
           pterms : $('#payment_terms').val()
       
       };
       data[csrfName] = csrfHash;
   
       $.ajax({
           type:'POST',
           data: data, 
          dataType:"json",
           url:'<?php echo base_url();?>Cinvoice/getdate',
           success: function(result, statut) {
               if(result.csrfName){
                  csrfName = result.csrfName;
                  csrfHash = result.csrfHash;
               }
              $('#date1').val(result);
          }
       });
   });
 

  
$('#email_send').click(function(){
      
      var data = {
        mailid:$('#email_info').val(),
        name_email:$('#name_email').val(),
        subject_email:$('#subject_email').val(),
        message_email:$('#message_email').val()
      };
      data[csrfName] = csrfHash;
  
      $.ajax({
          type:'POST',
          data: data, 
         dataType:"json",
          url:'<?php echo base_url();?>Cinvoice/sendmail',
          success: function(result, statut) {
              if(result.csrfName){
                 csrfName = result.csrfName;
                 csrfHash = result.csrfHash;
              }
              console.log(result);
            // $('#date1').val(result);
         }
      });
  });


</script>

<script>
 

function refreshPage(){
    window.location.reload();
} 

// function refresh(){
//     window.location.href = "<?php echo base_url('Cinvoice/manage_invoice'); ?>";

// }
</script>
<!--style for payment history modal -->
<style>
.td{
    width: 200px;
    text-align-last: end;
    border-right: hidden;
}
    </style>

<script type="text/javascript">



function packing(id)
{
    $('#packing_id').val(id);
   
    $("#packmodal").modal('hide');
     $("#myModal1").find('.modal-body').text('Packing List linked with your invoice.Please Continue...');
     $("#myModal1").modal('show');
     window.setTimeout(function(){
     
        $('#myModal1').modal('hide');

 },2000);
} 

</script>
<script type="text/javascript">




$( document ).ready(function() {
//     var v_g_t=$('#customer_gtotal').val();
//    var amount_paid =$("#amount_paid").val();
//    var bal= parseInt(v_g_t-amount_paid);
//    console.log("Bal :");
//    $('#balance').val(bal);




                    $('.hiden').css("display","none");
                    var data = {
      value: $('#customer_name').val()
   };
  data[csrfName] = csrfHash;
  $.ajax({
      type:'POST',
      data: data,
   
      //dataType tells jQuery to expect JSON response
      dataType:"json",
      url:'<?php echo base_url();?>Cinvoice/getcustomer_byID',
      success: function(result, statut) {
          if(result.csrfName){
             //assign the new csrfName/Hash
             csrfName = result.csrfName;
             csrfHash = result.csrfHash;
          }
         // var parsedData = JSON.parse(result);
        //  alert(result[0].p_quantity);
        console.log(result[0]['currency_type']);
        $(".cus").html(result[0]['currency_type']);
        $("label[for='custocurrency']").html(result[0]['currency_type']);
       console.log('https://open.er-api.com/v6/latest/<?php echo $curn_info_default; ?>');
       $.getJSON('https://open.er-api.com/v6/latest/<?php echo $curn_info_default; ?>', 
function(data) {
 var custo_currency=result[0]['currency_type'];
    var x=data['rates'][custo_currency];
 var Rate =parseFloat(x).toFixed(3);
  console.log(Rate);
  $('.hiden').show();
  $("#custocurrency_rate").val(Rate);
//   var num=$("#gtotal").val();

//     var value=parseInt(num*Rate);
    
// var custo_final = isNaN(parseInt(value)) ? 0 : parseInt(value)
// $('#customer_gtotal').val(custo_final);  
// var v_g_t=$('#customer_gtotal').val();
//    var amount_paid =$("#amount_paid").val();
//    var bal= parseInt(v_g_t-amount_paid);
//    console.log("Bal :");
//    $('#balance').val(bal);
      }
)}
    });

});





$('#custocurrency_rate').on('change textInput input', function (e) {
calculate();
});

$('.common_qnt').on('change textInput input', function (e) {
calculate();
});
var csrfName = '<?php echo $this->security->get_csrf_token_name();?>';
var csrfHash = '<?php echo $this->security->get_csrf_hash();?>';


$(document).on('click', '.removebundle', function(){


 var tid=$(this).closest('table').attr('id');
localStorage.setItem("delete_table",tid);
console.log(localStorage.getItem("delete_table"));
 var remove_id=$(this).closest('table').attr('id');
 $('#'+remove_id).remove();
   var sum=0;
    $('#'+localStorage.getItem("delete_table")).find('.total_price').each(function() {
var v=$(this).val();
  sum += parseFloat(v);
});
  $('#'+localStorage.getItem("delete_table")).find('.b_total').val(sum).trigger('change');
   var sumnet=0;
 // var overall_sum=0;
   $('#'+localStorage.getItem("delete_table")).find('.net_sq_ft').each(function() {
var v=$(this).val();
 if (!isNaN(v) && v.length !== 0) {
          sumnet += parseFloat(v);
        }
//  sumnet += parseFloat(v);
 // overall_sum +=parseFloat(v);
});
  $('#'+localStorage.getItem("delete_table")).find('.overall_net').val(sumnet.toFixed(3));


    var sumgross=0;
 // var overall_sum=0;
    $('#'+localStorage.getItem("delete_table")).find('.gross_sq_ft').each(function() {
var v=$(this).val();
 if (!isNaN(v) && v.length !== 0) {
          sumgross += parseFloat(v);
        }
//  sumnet += parseFloat(v);
 // overall_sum +=parseFloat(v);
});
  $('#'+localStorage.getItem("delete_table")).find('.overall_gross').val(sumgross.toFixed(3));
var total_net=0;
 $('.table').each(function() {
    $(this).find('.net_sq_ft').each(function() {
        var precio = $(this).val();
        if (!isNaN(precio) && precio.length !== 0) {
          total_net += parseFloat(precio);
        }
      });

     
 //   });

  });
$('#total_net').val(total_net.toFixed(3)).trigger('change');
  var overall_gs=0;
 $('.table').each(function() {
    $(this).find('.gross_sq_ft').each(function() {
        var precio = $(this).val();
        if (!isNaN(precio) && precio.length !== 0) {
          overall_gs += parseFloat(precio);
        }
      });
 });

$('#total_gross').val(overall_gs).trigger('change');
  var sum_w=0;
  $('#'+localStorage.getItem("delete_table")).find('.weight').each(function() {
        var precio = $(this).val();
        if (!isNaN(precio) && precio.length !== 0) {
          sum_w += parseFloat(precio);
        }
      });
  $('#'+localStorage.getItem("delete_table")).find('.overall_weight').val(sum_w).trigger('change');
var total_w=0;
 $('.table').each(function() {
    $(this).find('.weight').each(function() {
        var precio = $(this).val();
        if (!isNaN(precio) && precio.length !== 0) {
          total_w += parseFloat(precio);
        }
      });

  });
$('#total_weight').val(total_w.toFixed(3)).trigger('change');
var overall_sum=0;
     $('.table').find('.total_price').each(function() {
var v=$(this).val();
  overall_sum += parseFloat(v);
 // overall_sum +=parseFloat(v);
});
 $('#Over_all_Total').val(overall_sum.toFixed(3)).trigger('change');



 });

// Restricts input for each element in the set of matched elements to the given inputFilter.
(function($) {
$.fn.inputFilter = function(callback, errMsg) {
return this.on("input keydown keyup mousedown mouseup select contextmenu drop focusout", function(e) {
  if (callback(this.value)) {
    // Accepted value
    if (["keydown","mousedown","focusout"].indexOf(e.type) >= 0){
      $(this).removeClass("input-error");
      this.setCustomValidity("");
    }
    this.oldValue = this.value;
    this.oldSelectionStart = this.selectionStart;
    this.oldSelectionEnd = this.selectionEnd;
  } else if (this.hasOwnProperty("oldValue")) {
    // Rejected value - restore the previous one
    $(this).addClass("input-error");
    this.setCustomValidity(errMsg);
    this.reportValidity();
    this.value = this.oldValue;
    this.setSelectionRange(this.oldSelectionStart, this.oldSelectionEnd);
  } else {
    // Rejected value - nothing to restore
    this.value = "";
  }
});
};
}(jQuery));

$("#custocurrency_rate").inputFilter(function(value) {
return /^-?\d*[.,]?\d*$/.test(value); }, "Must be a floating (real) Number");



  

    </script>
	
    <script type="text/javascript">

 $(document).ready(function(){
   
 $(".normalinvoice").each(function(i,v){
   if($(this).find("tbody").html().trim().length === 0){
       $(this).hide()
   }
})
        $('.normalinvoice').each(function(){
        
var tid=$(this).attr('id');
 const indexLast = tid.lastIndexOf('_');
var idt = tid.slice(indexLast + 1);

  var sum=0;

 $('#normalinvoice_'+idt  +  '> tbody > tr').find('.total_price').each(function() {
var v=$(this).val();
  sum += parseFloat(v);

});

$('#Total_'+idt).val(sum.toFixed(3));

  var sum_net=0;

 $('#normalinvoice_'+idt  +  '> tbody > tr').find('.net_sq_ft').each(function() {
var v=$(this).val();
  sum_net += parseFloat(v);

});

$('#overall_net_'+idt).val(sum_net.toFixed(3));
   var sum_weight=0;

 $('#normalinvoice_'+idt  +  '> tbody > tr').find('.weight').each(function() {
var v=$(this).val();
  sum_weight += parseFloat(v);

});

$('#overall_weight_'+idt).val(sum_weight.toFixed(3));
  var sum_gross=0;

 $('#normalinvoice_'+idt  +  '> tbody > tr').find('.gross_sq_ft ').each(function() {
var v=$(this).val();
  sum_gross += parseFloat(v);

});

$('#overall_gross_'+idt).val(sum_gross.toFixed(3));
    
var total_w=0;
 $('.table').each(function() {
    $(this).find('.weight').each(function() {
        var precio = $(this).val();
        if (!isNaN(precio) && precio.length !== 0) {
          total_w += parseFloat(precio);
        }
      });

  });
$('#total_weight').val(total_w.toFixed(3)).trigger('change');
    });
});
   $('#paypls').on('click', function (e) {
$('#amount_to_pay').val($('#balance').val());
    $('#payment_modal').modal('show');
  e.preventDefault();

}); 
$(document).ready(function () {
    $('#customer_name').on('change', function (e) {
  
  var data = {
      value: $('#customer_name').val()
   };
  data[csrfName] = csrfHash;
  $.ajax({
      type:'POST',
      data: data,
   
      //dataType tells jQuery to expect JSON response
      dataType:"json",
      url:'<?php echo base_url();?>Cinvoice/getcustomer_byID',
      success: function(result, statut) {
          if(result.csrfName){
             //assign the new csrfName/Hash
             csrfName = result.csrfName;
             csrfHash = result.csrfHash;
          }
         // var parsedData = JSON.parse(result);
        //  alert(result[0].p_quantity);
        console.log(result[0]['currency_type']);
        $(".cus").html(result[0]['currency_type']);
        $("label[for='custocurrency']").html(result[0]['currency_type']);
       console.log('https://open.er-api.com/v6/latest/<?php echo $curn_info_default; ?>');
       $.getJSON('https://open.er-api.com/v6/latest/<?php echo $curn_info_default; ?>', 
function(data) {
 var custo_currency=result[0]['currency_type'];
    var x=data['rates'][custo_currency];
 var Rate =parseFloat(x).toFixed(3);
  console.log(Rate);
  $('.hiden').show();
  $("#custocurrency_rate").val(Rate);
});
    
      }
  });


});
var v_g_t=$('#customer_gtotal').val();
   var amount_paid =$("#amount_paid").val();
   var bal= parseInt(v_g_t-amount_paid);
   console.log("Bal :"+v_g_t+"/"+amount_paid);
   $('#balance').val(bal);
$('#openBtn').click(function () {
    $('#payment_modal').modal({
        show: true
    })
});

    $(document).on('show.bs.modal', '.modal', function (event) {
        var zIndex = 1040 + (10 * $('.modal:visible').length);
        $(this).css('z-index', zIndex);
        setTimeout(function() {
            $('.modal-backdrop').not('.modal-stack').css('z-index', zIndex - 1).addClass('modal-stack');
        }, 0);
    });


});
$('#payment_from_modal').on('input',function(e){

var payment=parseInt($('#payment_from_modal').val());
var amount_to_pay=parseInt($('#amount_to_pay').val());
console.log(payment+"/"+amount_to_pay);
console.log(parseInt(amount_to_pay)-parseInt(payment));
var value=parseInt(amount_to_pay)-parseInt(payment);
$('#balance_modal').val(value);
if (isNaN(value)) {
 $('#balance_modal').val("0");
  }
});

$("body").on("focus", ".product_name", function() {

   var tid=$(this).closest('tr').find('.product_name').attr('id');
const indexLast = tid.lastIndexOf('_');
var id = tid.slice(indexLast + 1);
  $('#prodt_'+id).val('');
});




$('#add_payment_info').submit(function (event) {    
   var dataString = {
       dataString : $("#add_payment_info").serialize()
  };
  dataString[csrfName] = csrfHash;
 
   $.ajax({
       type:"POST",
       dataType:"json",
       url:"<?php echo base_url(); ?>Cinvoice/add_payment_info",
       data:$("#add_payment_info").serialize(),

       success:function (data) {
 $('.amt').show();

    $('#payment_modal').modal('hide');
    $("#bodyModal1").html("Payment Successfully Completed");
       $('#myModal1').modal('show');
    
    window.setTimeout(function(){
        $('#myModal1').modal('hide');
},2500);

   var dataString = {
       dataString : $("#histroy").serialize()
   
  };
  dataString[csrfName] = csrfHash;
 
   $.ajax({
       type:"POST",
       dataType:"json",
       url:"<?php echo base_url(); ?>Cinvoice/payment_history",
       data:$("#histroy").serialize(),

       success:function (data) {
        console.log(data);
        var gt=$('#customer_gtotal').val();
        var amtpd=data.amt_paid;
        console.log(data);
        var bal= $('#customer_gtotal').val() - data.amt_paid;
 $('#balance').val(bal);
   $('#amount_paid').val(amtpd);
      var t_rate=$('#custocurrency_rate').val();
   document.getElementById("paid_convert").value=
 	(amtpd /t_rate ).toFixed(2);
    document.getElementById("bal_convert").value=
 	(bal /t_rate ).toFixed(2);
//             var resultFrom='<?php //echo // $curn_info_default ;?>';
// var resultTo=$('.cus').html();
// var searchValue_bal=parseInt(bal);
// var searchValue_paid=parseInt(amtpd);
// const api = "https://api.exchangerate-api.com/v4/latest/USD";
// 	fetch(`${api}`)
// 		.then(currency => {
// 			return currency.json();
// 		}).then(convert_paid);
// 	fetch(`${api}`)
// 		.then(currency => {
// 			return currency.json();
// 		}).then(convert_bal);
//     function convert_paid(currency) {

// 	let fromRate = currency.rates[resultFrom];
// 	let toRate = currency.rates[resultTo];
//   // console.log("PAID : FRom : "+fromRate +", To :"+toRate+', Search :'+searchValue_bal +",Total"+((toRate / fromRate) * searchValue_bal).toFixed(2));
// document.getElementById("paid_convert").value=
// 	((toRate / fromRate) * searchValue_paid).toFixed(2);

// }
// function convert_bal(currency) {
// 	let fromRate = currency.rates[resultFrom];
// 	let toRate = currency.rates[resultTo];
//  // console.log("BAL :FRom : "+fromRate +", To :"+toRate+', Search :'+searchValue_bal +",Total"+((toRate / fromRate) * searchValue_bal).toFixed(2));
// document.getElementById("bal_convert").value=
// 	((toRate / fromRate) * searchValue_bal).toFixed(2);

// }
      }
    });
      $('#add_payment_info')[0].reset();
      }

   });
   event.preventDefault();
});
$('#payment_history').click(function (event) {
   
       
   var dataString = {
       dataString : $("#histroy").serialize()
   
  };
  dataString[csrfName] = csrfHash;
 
   $.ajax({
       type:"POST",
       dataType:"json",
       url:"<?php echo base_url(); ?>Cinvoice/payment_history",
       data:$("#histroy").serialize(),

       success:function (data) {
        console.log(data);
        var gt=$('#customer_gtotal').val();
        var amtpd=data.amt_paid;
        console.log(data);
        var bal= $('#customer_gtotal').val() - data.amt_paid;
var total= "<table class='table table-striped table-bordered'><tr><td rowspan='2' style='vertical-align: middle;text-align-last: center;'><b>Grand Total :  <?php  echo $currency;  ?>"+$('#customer_gtotal').val()+"<b></td><td class='td' style='border-right: hidden;'><b>Total Amount Paid :<b></td><td><?php  echo $currency;  ?>"+data.amt_paid+"</td></tr></tr><td class='td' style='border-right: hidden;'><b>Balance :<b></td><td><?php  echo $currency;  ?>"+bal +"</td></tr></table>"
        var table_header = "<table class='table table-striped table-bordered'><thead style='FONT-WEIGHT:BOLD;'><tr><td>S.NO</td><td>Payment Date</td><td>Reference.NO</td><td>Bank Name</td><td>Amount Paid</td><td>Balance</td><td>Details</td></tr></thead><tbody>";
                   var table_footer = "</tbody></table>";
                var html ="";
var count=1;
               data.payment_get.forEach(function(element) {
              
              html += "<tr><td>"+count +"</td><td>"+element.payment_date+"</td><td>"+element.reference_no+"</td><td>"+element.bank_name+"</td><td><?php  echo $currency;  ?>"+element.amt_paid+"</td><td><?php  echo $currency;  ?>"+element.balance+"</td><td>"+element.details+"</td></tr>";
         count++;
            });



                var all = total+table_header +html+ table_footer;

               

                $('#salle_list').html(all);
                            $('#payment_history_modal').modal('show');
      
       
      
      }

   });
   event.preventDefault();
});

$(document).ready(function(){
$('.hidden_button').hide();
   var dataString = {
       dataString : $("#histroy").serialize()
   
  };
  dataString[csrfName] = csrfHash;
 
   $.ajax({
       type:"POST",
       dataType:"json",
       url:"<?php echo base_url(); ?>Cinvoice/payment_history",
       data:$("#histroy").serialize(),

       success:function (data) {
        var gt=$('#customer_gtotal').val();
        var amtpd=data.amt_paid;
        console.log(data);
        var bal= gt - amtpd;
if(amtpd){
$('#amount_paid').val(amtpd);
}else{
   $('#amount_paid').val("0.00"); 
}
$('#balance').val(bal);

 }

   });
   event.preventDefault();
});
$(document).on('click', '.delete', function(){
var tid=$(this).closest('table').attr('id');
localStorage.setItem("delete_table",tid);
 var netheight = $('#'+localStorage.getItem("delete_table")).find('.net_height').attr('id');
 const indexLastDot = netheight.lastIndexOf('_');
var id = netheight.slice(indexLastDot + 1);


var rowCount = $(this).closest('tbody').find('tr').length;

if(rowCount>1){
$(this).closest('tr').remove();
}
   var sum=0;
    $('#'+localStorage.getItem("delete_table")).find('.total_price').each(function() {
var v=$(this).val();
  sum += parseFloat(v);
});
  $('#'+localStorage.getItem("delete_table")).find('.b_total').val(sum).trigger('change');
   var sumnet=0;
 // var overall_sum=0;
   $('#'+localStorage.getItem("delete_table")).find('.net_sq_ft').each(function() {
var v=$(this).val();
 if (!isNaN(v) && v.length !== 0) {
          sumnet += parseFloat(v);
        }
//  sumnet += parseFloat(v);
 // overall_sum +=parseFloat(v);
});
  $('#'+localStorage.getItem("delete_table")).find('.overall_net').val(sumnet.toFixed(3));


    var sumgross=0;
 // var overall_sum=0;
    $('#'+localStorage.getItem("delete_table")).find('.gross_sq_ft').each(function() {
var v=$(this).val();
 if (!isNaN(v) && v.length !== 0) {
          sumgross += parseFloat(v);
        }
//  sumnet += parseFloat(v);
 // overall_sum +=parseFloat(v);
});
  $('#'+localStorage.getItem("delete_table")).find('.overall_gross').val(sumgross.toFixed(3));
var total_net=0;
 $('.table').each(function() {
    $(this).find('.net_sq_ft').each(function() {
        var precio = $(this).val();
        if (!isNaN(precio) && precio.length !== 0) {
          total_net += parseFloat(precio);
        }
      });

     
 //   });

  });
$('#total_net').val(total_net.toFixed(3)).trigger('change');
  var overall_gs=0;
 $('.table').each(function() {
    $(this).find('.gross_sq_ft').each(function() {
        var precio = $(this).val();
        if (!isNaN(precio) && precio.length !== 0) {
          overall_gs += parseFloat(precio);
        }
      });
 });

$('#total_gross').val(overall_gs).trigger('change');
  var sum_w=0;
  $('#'+localStorage.getItem("delete_table")).find('.weight').each(function() {
        var precio = $(this).val();
        if (!isNaN(precio) && precio.length !== 0) {
          sum_w += parseFloat(precio);
        }
      });
  $('#'+localStorage.getItem("delete_table")).find('.overall_weight').val(sum_w).trigger('change');
var total_w=0;
 $('.table').each(function() {
    $(this).find('.weight').each(function() {
        var precio = $(this).val();
        if (!isNaN(precio) && precio.length !== 0) {
          total_w += parseFloat(precio);
        }
      });

  });
$('#total_weight').val(total_w.toFixed(3)).trigger('change');
var overall_sum=0;
     $('.table').find('.total_price').each(function() {
var v=$(this).val();
  overall_sum += parseFloat(v);
 // overall_sum +=parseFloat(v);
});
 $('#Over_all_Total').val(overall_sum.toFixed(3)).trigger('change');


  
 var optionSelected = $("option:selected", this);
    var valueSelected = this.value;
    var total=$('#Total').val();
var tax= $('#product_tax').val();

var field = tax.split('-');

var percent = field[1];
percent=percent.replace("%","");
 var answer = (percent / 100) * parseInt(total);
$('#final_gtotal').val(answer);
   $('#hdn').val(valueSelected);
   console.log("taxi :"+valueSelected);
  $('#tax_details').val(answer +" ( "+tax+" )");
gt(id);

//$('#total_net').val(overall_net.toFixed(3));



 });


$(document).on('keyup', '.weight', function(){
var weight=0;
     $(this).closest('table').find('.weight').each(function() {
var v=$(this).val();
 if (!isNaN(v) && v.length !== 0) {
          weight += parseFloat(v);
        }
});
 $(this).closest('table').find('.overall_weight').val(weight.toFixed(3));


});
$(document).on('keyup', '.net_height,.net_width', function(){
var tid=$(this).closest('table').attr('id');
const indexLast1 = tid.lastIndexOf('_');
var idt = tid.slice(indexLast1 + 1);
 var netheight = $(this).attr('id');
const indexLastDot = netheight.lastIndexOf('_');
var id = netheight.slice(indexLastDot + 1);
var net_width='net_width_'+id;
var net_height = 'net_height_'+ id;
var netwidth=$('#'+net_width).val();
var netheight=$('#'+net_height).val();
var netresult=parseInt(netwidth) * parseInt(netheight);
netresult=netresult/144;
netresult = isNaN(netresult) ? 0 : netresult;
var nresult=netresult.toFixed(3);
$('#'+'net_sq_ft_'+id).val(netresult.toFixed(3));
var cost_sqft=$('#cost_sq_ft_'+id).val();
var tid=$(this).closest('table').attr('id');
const indexLast = tid.lastIndexOf('_');
var idt = tid.slice(indexLast + 1);
var sales_sqft=cost_sqft *nresult;
var x = $('#slab_no_'+id).val();
var sales_slab_price=cost_sqft *nresult*x;

console.log(parseInt(cost_sqft) +"*"+parseInt(nresult)+"*"+idt);
$('#'+'sales_slab_amt_'+id).val(sales_slab_price.toFixed(3));
$(this).closest('tr').find('.total_price').val(sales_slab_price.toFixed(3));
sales_sqft = isNaN(sales_sqft) ? 0 : sales_sqft;
$('#'+'sales_amt_sq_ft_'+id).val(sales_sqft.toFixed(3));
 var sumnet=0;
 // var overall_sum=0;
     $(this).closest('table').find('.net_sq_ft').each(function() {
var v=$(this).val();
 if (!isNaN(v) && v.length !== 0) {
          sumnet += parseFloat(v);
        }
//  sumnet += parseFloat(v);
 // overall_sum +=parseFloat(v);
});
$('#overall_net_'+idt).val(sumnet.toFixed(3));
var total_net=0;
 $('.table').each(function() {
    $(this).find('.net_sq_ft').each(function() {
        var precio = $(this).val();
        if (!isNaN(precio) && precio.length !== 0) {
          total_net += parseFloat(precio);
        }
      });

     
 //   });

  });
$('#total_net').val(total_net.toFixed(3)).trigger('change');


  var sum=0;
 // var overall_sum=0;
     $(this).closest('table').find('.total_price').each(function() {
var v=$(this).val();
  sum += parseFloat(v);
 // overall_sum +=parseFloat(v);
});

var overall_sum=0;
 $('.table').each(function() {
    $(this).find('.total_price').each(function() {
        var precio = $(this).val();
        if (!isNaN(precio) && precio.length !== 0) {
          overall_sum += parseFloat(precio);
        }
      });

     
 //   });

  });

$('#Over_all_Total').val(overall_sum.toFixed(3)).trigger('change');
$('#Total_'+idt).val(sum);

calculate();
});
$(document).on('input', '.gross_height,.gross_width', function(){

 var netheight = $(this).attr('id');
const indexLastDot = netheight.lastIndexOf('_');
var id = netheight.slice(indexLastDot + 1);
var net_width='gross_width_'+id;
var net_height = 'gross_height_'+ id;
var tid=$(this).closest('table').attr('id');
const indexLast = tid.lastIndexOf('_');
var idt = tid.slice(indexLast + 1);
var netwidth=$('#'+net_width).val();
var netheight=$('#'+net_height).val();
var netresult=parseInt(netwidth) * parseInt(netheight);
netresult=netresult/144;
netresult = isNaN(netresult) ? 0 : netresult;
var nresult=netresult.toFixed(3);

$('#'+'gross_sq_ft_'+id).val(netresult.toFixed(3));

    var sumgross=0;
 // var overall_sum=0;
     $(this).closest('table').find('.gross_sq_ft').each(function() {
var v=$(this).val();
 if (!isNaN(v) && v.length !== 0) {
          sumgross += parseFloat(v);
        }
//  sumnet += parseFloat(v);
 // overall_sum +=parseFloat(v);
});
$('#overall_gross_'+idt).val(sumgross.toFixed(3));
   

var overall_gs=0;
 $('.table').each(function() {
    $(this).find('.gross_sq_ft').each(function() {
        var precio = $(this).val();
        if (!isNaN(precio) && precio.length !== 0) {
          overall_gs += parseFloat(precio);
        }
      });
 });

$('#total_gross').val(overall_gs).trigger('change');
//     $('.normalinvoice .overall_gross').each(function() {
//         var v=$(this).val();
//        console.log(v);
//     overall_gross += parseFloat(v);

  
// });


//   var sum=0;
// //  var overall_sum=0;
//      $(this).closest('table').find('.total_price').each(function() {
// var v=$(this).val();
//   sum += parseFloat(v);
//   //  overall_sum +=parseFloat(v);
// });
// var overall_sum=0;
//  $('.table').each(function() {
//     $(this).find('.total_price').each(function() {
//         var precio = $(this).val();
//         if (!isNaN(precio) && precio.length !== 0) {
//           overall_sum += parseFloat(precio);
//         }
//       });

     
//  //   });

//   });

// $('#Over_all_Total').val(overall_sum);
// $('#Total_'+idt).val(sum);
//$('#total_gross').val(overall_gross.toFixed(3));
gt(id);

});
  $(document).on('keyup','.normalinvoice tbody tr:last',function (e) {
   
var tid=$(this).closest('table').attr('id');
const indexLast = tid.lastIndexOf('_');
var id = tid.slice(indexLast + 1);
//   $('#normalinvoice_'+idt+' tbody tr:last').clone().appendTo('#normalinvoice_'+idt);
   //  var netheight = table.attr('id');
// const indexLastDot = table.lastIndexOf('_');
// var id = table.slice(indexLastDot + 1);

     var $last = $('#addPurchaseItem_'+id + ' tr:last');
   // var num = id+"_"+$last.index() + 2;
    var num = id+($last.index()+1);
    
    $('#addPurchaseItem_'+id  + ' tr:last').clone().find('input,select').attr('id', function(i, current) {
        return current.replace(/\d+$/, num);
        
    }).end().appendTo('#addPurchaseItem_'+id );
  
 $.each($('#normalinvoice_'+id  +  '> tbody > tr'), function (index, el) {
            $(this).find(".slab_no").val(index + 1); // Simply couse the first "prototype" is not counted in the list                
        })



        });

var csrfName = '<?php echo $this->security->get_csrf_token_name();?>';
var csrfHash = '<?php echo $this->security->get_csrf_hash();?>';

$( "#balance" ).on('change', function(){
   var bl=$(this).val();
   console.log("bl : "+bl);
   if(bl<=0){
    $('#paypls').hide();
   }
});
$('#add_bank').submit(function (event) {
   
       
   var dataString = {
       dataString : $("#add_bank").serialize()
   
  };
  dataString[csrfName] = csrfHash;
 
   $.ajax({
       type:"POST",
       dataType:"json",
       url:"<?php echo base_url(); ?>Csettings/add_new_bank",
       data:$("#add_bank").serialize(),

       success: function (data) {
        $.each(data, function (i, item) {
           
            result = '<option value=' + data[i].bank_name + '>' + data[i].bank_name + '</option>';
        });
      
        $('.bankpayment').selectmenu(); 
        $('.bankpayment').append(result).selectmenu('refresh',true);
       $("#bodyModal1").html("Bank Added Successfully");
       $('#myModal3').modal('hide');
       $('#add_bank_info').modal('hide');
       $('#bank').show();
        $('#myModal1').modal('show');
       window.setTimeout(function(){
       $('.bankpayment').show();
        $('#myModal5').modal('hide');
        $('#myModal1').modal('hide');
        $('.modal-backdrop').remove();
    
     }, 2000);
     
      }

   });
   event.preventDefault();
});




      $(document).ready(function () {
      $('#bank').selectize({
          sortField: 'text'
      });
  });
</script>
<style>
  .ui-front,  .ui-selectmenu-text{
        display:none;
    }
   </style>

<script>
const select = document.querySelectorAll(".currency");
const btn = document.getElementById("btn");
const num = document.getElementById("num");
const ans = document.getElementById("ans");
const err = document.getElementById("errorMSG");
const info = document.getElementById("info");
const baseFlagsUrl = "https://wise.com/public-resources/assets/flags/rectangle";
const currencyApiUrl = "https://open.er-api.com/v6/latest";

document.addEventListener('DOMContentLoaded', function(){ 
  fetch(currencyApiUrl)
    .then((data) => data.json())
    .then((data) => {
    err.innerHTML = "";
    display(data.rates);
    $('.currency').select2({
      width: 'resolve',
  
      maximumInputLength: 3
    });
    info.innerHTML = "Result: "+data.result+"<br>Provider: "+data.provider+"<br>Documentation: "+data.documentation+"<br>Terms of use: "+data.terms_of_use+"<br>Time Last Update UTC: "+data.time_last_update_utc;
    $('#pageLoader').fadeOut();
  }).catch(function(error) {
    err.innerHTML = "Error: " + error;
    $('#pageLoader').fadeOut();
  });
function display(data){
  const entries = Object.entries(data);
  for (var i = 0; i < entries.length; i++){
    select[0].innerHTML += `<option value="${entries[i][0]}">${entries[i][0]}</option>`;
    select[1].innerHTML += `<option value="${entries[i][0]}">${entries[i][0]}</option>`;
  }
  
}
});

  $(document).on('change','#download_select', function (e) {
var selected_option=$(this).val();
var text = $('#invoice_hdn1').val().toString().replace('"', '');

if(selected_option=='Invoice'){

 var popout = window.open("<?php  echo base_url(); ?>Cinvoice/invoice_inserted_data/"+text);
}else{
    
  var popout = window.open("<?php  echo base_url(); ?>Cinvoice/packing_list_details_data/"+text);
}

});
  $(document).on('change','#print_select', function (e) {
var selected_option=$(this).val();
var text = $('#invoice_hdn1').val().toString().replace('"', '');
if(selected_option=='Invoice'){
 var popout = window.open("<?php  echo base_url(); ?>Cinvoice/invoice_inserted_data_print/"+text);
}else{
   var popout = window.open("<?php  echo base_url(); ?>Cinvoice/packing_list_details_data_print/"+text);
}

});
$(document).ready(function(){

   // $('#payment_modal').modal("show");
     $('#product_tax').on('change', function (e) {
      debugger;
  var total=$('#Over_all_Total').val();
 var tax= $('#product_tax').val();

 var field = tax.split('-');

 var percent = field[1];
 percent=percent.replace("%","");
  var answer = (percent / 100) * parseInt(total);

  
   var gtotal = parseInt(total + answer);
   console.log("gtotal :" +gtotal);



  var final_g= $('#final_gtotal').val();


  var amt=parseInt(answer)+parseInt(total);
  var num = isNaN(parseInt(amt)) ? 0 : parseInt(amt)
    $('#gtotal').val(num); 
  var custo_amt=$('#custocurrency_rate').val(); 
  console.log("numhere :"+num +"-"+custo_amt);
  var value=num*custo_amt;
  var custo_final = isNaN(parseInt(value)) ? 0 : parseInt(value)
 $('#customer_gtotal').val(custo_final);  
 calculate();
 });
});
// $(document).on('keyup', '.net_height,.net_width', function(){

//  var netheight = $(this).attr('id');
// const indexLastDot = netheight.lastIndexOf('_');
// var id = netheight.slice(indexLastDot + 1);
// var net_width='net_width_'+id;
// var net_height = 'net_height_'+ id;
// var netwidth=$('#'+net_width).val();
// var netheight=$('#'+net_height).val();
// var netresult=parseInt(netwidth) * parseInt(netheight);
// netresult=netresult/144;
// netresult = isNaN(netresult) ? 0 : netresult;
// $('#'+'net_sq_ft_'+id).val(netresult.toFixed(3));
// var nresult=netresult.toFixed(3);
// var cost_sqft=$('#cost_sq_ft_'+id).val();

// var sales_sqft=cost_sqft *nresult;
// var x = $('#slab_no_'+id).val();

// var sales_slab_price=cost_sqft *nresult*x;
// console.log(parseInt(cost_sqft) +"*"+parseInt(nresult)+"*"+id);
// $('#'+'sales_slab_amt_'+id).val(sales_slab_price.toFixed(3));
// sales_sqft = isNaN(sales_sqft) ? 0 : sales_sqft;
// $('#'+'sales_amt_sq_ft_'+id).val(sales_sqft.toFixed(3));
//       var sum_total=0;
//      $('.btotal').each(function() {
// var v=$(this).val();
//   sum_total += parseFloat(v);
// });
// $('#Over_all_Total').val(sum_total);
// });
// $(document).on('keyup', '.gross_height,.gross_width', function(){

//  var netheight = $(this).attr('id');
// const indexLastDot = netheight.lastIndexOf('_');
// var id = netheight.slice(indexLastDot + 1);
// var net_width='gross_width_'+id;
// var net_height = 'gross_height_'+ id;
// var netwidth=$('#'+net_width).val();
// var netheight=$('#'+net_height).val();
// var netresult=parseInt(netwidth) * parseInt(netheight);
// netresult=netresult/144;
// netresult = isNaN(netresult) ? 0 : netresult;
// var nresult=netresult.toFixed(3);

// $('#'+'gross_sq_ft_'+id).val(netresult.toFixed(3));


// });




$('#custocurrency_rate').on('change textInput input', function (e) {
    calculate();
});

$('.common_qnt').on('change textInput input', function (e) {
    calculate();
});
$('.btotal').on('change textInput input', function (e) {
      var sum=0;
//       var tid=$(this).closest('table').attr('id');
// const indexLast = tid.lastIndexOf('_');
// var idt = tid.slice(indexLast + 1);
     $('.btotal').each(function() {
var v=$(this).val();
  sum += parseFloat(v);
});
$('#Over_all_Total').val(sum.toFixed(3));




    var first=$("#Over_all_Total").val();
    var tax= $('#product_tax').val();
var field = tax.split('-');

var percent = field[1];
var answer=0;
  var answer = parseInt((percent / 100) * first);
   console.log("Answer : "+answer);
  var gtotal = parseInt(first + answer);
  console.log("gtotal :" +gtotal);
  
 var final_g= $('#final_gtotal').val();


 var amt=parseInt(answer)+parseInt(first);
 var num = isNaN(parseInt(amt)) ? 0 : parseInt(amt)
 var custo_amt=$('#custocurrency_rate').val(); 
 console.log("numhere :"+num +"-"+custo_amt);
 var value=num*custo_amt;
 var custo_final = isNaN(parseInt(value)) ? 0 : parseInt(value)
$('#customer_gtotal').val(custo_final);  
});
$(document).on('change', '.product_name', function(){
//debugger;
 var netheight = $(this).attr('id');
const indexLastDot = netheight.lastIndexOf('_');
var id = netheight.slice(indexLastDot + 1);
$('#tableid_'+id).val(id);
var net_width='net_width_'+id;
var net_height = 'net_height_'+ id;
var netwidth=$('#'+net_width).val();
var netheight=$('#'+net_height).val();
var netresult=parseInt(netwidth) * parseInt(netheight);
netresult=netresult/144;
netresult = isNaN(netresult) ? 0 : netresult;
var nresult=netresult.toFixed(3);

$('#'+'net_sq_ft_'+id).val(netresult.toFixed(3));
var cost_sqft=$('#cost_sq_ft_'+id).val();


var sales_sqft=cost_sqft *nresult;
// var x = $("#normalinvoice_"+id "> tbody > tr").length;
// console.log("X here : "+x);
var x = $('#slab_no_'+id).val();
 var serial =parseInt( $(this).closest('tr').find('td:nth-child(10)').html());

var sales_slab_price=cost_sqft *nresult*x;
console.log(parseInt(cost_sqft) +"*"+parseInt(nresult)+"*"+id);
$('#'+'sales_slab_amt_'+id).val(sales_slab_price.toFixed(3));
sales_sqft = isNaN(sales_sqft) ? 0 : sales_sqft;
$('#'+'sales_amt_sq_ft_'+id).val(sales_sqft.toFixed(3));
});


$('#product_tax').on('change', function (e) {
    var optionSelected = $("option:selected", this);
    var valueSelected = this.value;
    var total=$('#Over_all_Total').val();
var tax= $('#product_tax').val();

var field = tax.split('-');

var percent = field[1];
percent=percent.replace("%","");
 var answer = (percent / 100) * parseInt(total);

  
  var gtotal = parseInt(total + answer);
  console.log("gtotal :" +gtotal);
  $('#gtotal').val(gtotal); 


$('#final_gtotal').val(answer);
   $('#hdn').val(valueSelected);
   console.log("taxi :"+valueSelected);
  $('#tax_details').val(answer.toFixed(3) +" ( "+tax+" )");
  calculate();
   payment_info();
});
var arr=[];


function gt(id){

var final_g= $('#final_gtotal').val();
if(final_g !=''){
var first=$("#Over_all_Total").val();
    var tax= $('#product_tax').val();

var field = tax.split('-');

var percent = field[1];
var answer=0;
  var answer =(parseInt(percent) / 100) * parseInt(first);
   console.log(answer);
   $('#tax_details').val(answer.toFixed(3) +" ( "+tax+" )");

  var gtotal = parseInt(first + answer);
  console.log(gtotal);
var amt=parseInt(answer)+parseInt(first);
 var num = isNaN(parseInt(amt)) ? 0 : parseInt(amt)
 var custo_amt=$('#custocurrency_rate').val();
 $("#gtotal").val(num);  
 console.log(num +"-"+custo_amt);
 localStorage.setItem("customer_grand_amount_sale",num);

 var value=num*custo_amt;
 var custo_final = isNaN(parseInt(value)) ? 0 : parseInt(value)
$('#customer_gtotal').val(custo_final);
var bal_amt=custo_final-$('#amount_paid').val();
$('#balance').val(bal_amt);
}  
}

      var table_count= $("table.normalinvoice").length;
          let dynamic_id=table_count+1;
    function addbundle(){
         $(this).closest('table').find('.addbundle').css("display","none");
      $(this).closest('table').find('.removebundle').css("display","block");

var newdiv = document.createElement('div');
var tabin="crate_wrap_"+dynamic_id;

newdiv = document.createElement("div");







//  newdiv.innerHTML ='<table class="table normalinvoice table-bordered table-hover" id="normalinvoice_'+ dynamic_id +'"> <thead> <tr> <th rowspan="2" class="text-center" style="width: 180px;" ><?php echo display('Product_name') ?><i class="text-danger">*</i></th> <th rowspan="2" style="width:60px;" class="text-center"><?php echo display('Bundle No') ?><i class="text-danger">*</i></th> <th rowspan="2"  class="text-center"><?php echo display('Description') ?></th> <th rowspan="2" style="width:60px;" class="text-center"><?php echo display('Thick ness')?><i class="text-danger">*</i></th> <th rowspan="2" class="text-center"><?php echo display('Supplier Block No') ?><i class="text-danger">*</i></th>  <th rowspan="2" class="text-center" ><?php echo display('Supplier Slab No') ?><i class="text-danger">*</i> </th> <th colspan="2" style="width:150px;" class="text-center"><?php echo display('Gross Measurement') ?><i class="text-danger">*</i> </th> <th rowspan="2" class="text-center"><?php echo display('Gross Sq.Ft') ?></th>  <th rowspan="2" style="width:40px;" class="text-center"><?php echo display('Slab No') ?><i class="text-danger">*</i></th> <th colspan="2" style="width:150px;" class="text-center"><?php echo display('Net Measure') ?><i class="text-danger">*</i></th> <th rowspan="2" class="text-center"><?php echo display('Net Sq.Ft') ?></th> <th rowspan="2"  class="text-center"><?php echo display('Cost per Sq.Ft') ?></th> <th rowspan="2"  class="text-center"><?php echo display('Cost per Slab') ?></th> <th rowspan="2"  class="text-center"><?php echo display('Sales') ?><br/><?php echo display('Price per Sq.Ft') ?></th> <th rowspan="2"  class="text-center"><?php echo display('Sales Slab Price') ?></th> <th rowspan="2" class="text-center"><?php echo display('Weight') ?></th> <th rowspan="2" class="text-center"><?php echo display('Origin') ?></th>  <th rowspan="2" style="width: 100px" class="text-center"><?php echo display('Total') ?></th> <th rowspan="2" class="text-center"><?php echo display('Action') ?></th> </tr>  <tr> <th class="text-center"><?php echo display('Width') ?></th> <th class="text-center"><?php echo display('Height') ?></th> <th class="text-center"><?php echo display('Width') ?></th> <th class="text-center"><?php echo display('Height') ?></th> </tr>  </thead> <tbody id="addPurchaseItem_'+ dynamic_id +'"> <tr> <input type="hidden" name="tableid[]" id="tableid_'+ dynamic_id +'"/> <td> <input   list="magicHouses"  name="prodt[]" id="prodt_'+ dynamic_id +'"   class="form-control product_name"  placeholder="Search Product" > <datalist id="magicHouses"> <option value="Select the Product" selected>Select the Product</option> <?php  foreach($product as $tx){?>  <option value="<?php echo $tx["product_name"]."-".$tx["product_model"];?>">  <?php echo $tx["product_name"]."-".$tx["product_model"];  ?></option> <?php } ?> </datalist> <input type="hidden" class="common_product autocomplete_hidden_value  product_id_'+ dynamic_id +'" name="product_id[]" id="SchoolHiddenId_'+ dynamic_id +'" /> </td> <td> <input type="text" id="bundle_no_'+ dynamic_id +'" name="bundle_no[]" required="" class="bundle_no form-control" /> </td> <td> <input type="text" id="description_'+ dynamic_id +'" name="description[]" class="form-control" /> </td>  <td > <input type="text" name="thickness[]" id="thickness_'+ dynamic_id +'" required="" class="form-control"/> </td> <td> <input type="text" id="supplier_b_no_'+ dynamic_id +'" name="supplier_block_no[]" required="" class="form-control" /> </td>  <td > <input type="text"  id="supplier_s_no_'+ dynamic_id +'" name="supplier_slab_no[]" required="" class="form-control"/> </td> <td> <input type="text" id="gross_width_'+ dynamic_id +'" name="gross_width[]" required="" class="gross_width  form-control" /> </td> <td> <input type="text" id="gross_height_'+ dynamic_id +'" name="gross_height[]"  required="" class="gross_height form-control" /> </td>  <td > <input type="text"   style="width:60px;" readonly id="gross_sq_ft_'+ dynamic_id +'" name="gross_sq_ft[]" class="gross_sq_ft form-control"/> </td>   <td style="text-align:center;" >  <input type="text"   style="width:20px;" value="1" class="slab_no" id="slab_no_'+ dynamic_id +'" name="slab_no[]"   readonly  required=""/>  </td> <td> <input type="text" id="net_width_'+ dynamic_id +'" name="net_width[]" required="" class="net_width form-control" /> </td> <td> <input type="text" id="net_height_'+ dynamic_id +'" name="net_height[]"    required="" class="net_height form-control" /> </td> <td > <input type="text"   style="width:60px;" readonly id="net_sq_ft_'+ dynamic_id +'" name="net_sq_ft[]" class="net_sq_ft form-control"/> </td> <td>   <span class="input-symbol-euro"><input type="text" id="cost_sq_ft_'+ dynamic_id +'"  name="cost_sq_ft[]" readonly  style="width:60px;" value="0.00"  class="cost_sq_ft form-control" ></span>   <td >  <span class="input-symbol-euro"> <input type="text"  id="cost_sq_slab_'+ dynamic_id +'" name="cost_sq_slab[]" readonly   style="width:60px;" value="0.00"  class="form-control"/></span>     </td> <td>  <span class="input-symbol-euro">  <input type="text" id="sales_amt_sq_ft_'+ dynamic_id +'"  name="sales_amt_sq_ft[]"  style="width:60px;"  value="0.00" class="sales_amt_sq_ft form-control" /></span>     </td>  <td >  <span class="input-symbol-euro">   <input type="text"  id="sales_slab_amt_'+ dynamic_id +'" name="sales_slab_amt[]"  style="width:60px;" value="0.00"  class="sales_slab_amt form-control"/></td> </span>     </td> <td> <input type="text" id="weight_'+ dynamic_id +'" name="weight[]"  class="weight form-control" /> </td>  <td > <input type="text"  id="origin_'+ dynamic_id +'" name="origin[]" class="form-control"/> </td>  <td > <span class="input-symbol-euro"><input  type="text" class="total_price form-control" style="width:80px;" readonly value="0.00"  id="total_amt_'+ dynamic_id +'"     name="total_amt[]"/></span> </td>  <td style="text-align:center;"> <button  class="delete btn btn-danger" type="button" id="delete_'+ dynamic_id +'" value="Delete" ><i class="fa fa-trash"></i></button> </td>  </tr> </tbody> <tfoot> <tr> <td style="text-align:right;" colspan="8"><b>Gross Sq.Ft :</b></td> <td > <input type="text" id="overall_gross_'+ dynamic_id +'" name="overall_gross[]"   class="overall_gross form-control" style="width: 60px"  readonly="readonly"  /> </td> <td style="text-align:right;" colspan="3"><b><?php echo display('Net Sq.Ft')?> :</b></td> <td > <input type="text" id="overall_net_'+ dynamic_id +'" name="overall_net[]"  class="overall_net form-control"  style="width: 60px"  readonly="readonly"  /> </td>     <td style="text-align:right;" colspan="4"><b><?php echo display('Weight') ?> :</b></td> <td ><input type="text" id="overall_weight_'+ dynamic_id +'" name="overall_weight[]"  class="overall_weight form-control"  style="width: 70px"  readonly="readonly"  />  </td>  <td style="text-align:right;" colspan="1"><b><?php echo display('TOTAl') ?> :</b></td> <td > <span class="input-symbol-euro">    <input type="text" id="Total_'+ dynamic_id +'" name="total[]"   class="b_total form-control"  style="width: 80px" value="0.00"  readonly="readonly"  /> </span> </td><td  style="text-align: center;"> <i id="buddle_'+ dynamic_id +'" class="btn-danger removebundle fa fa-minus" style="font-size:24px;     width: 39px;"  aria-hidden="true" onclick="removebundle(); "></i>  </td> </tr><tr style="border-right:none;border-left:none;border-bottom:none;border-top:none"> <td colspan="20" style="text-align: end; font-size:48px;">    </td>  </tr></foot></table> <i id="buddle_1" class="addbundle fa fa-plus" style="float:right;color:white;background-color: #38469F;font-size:24px;   " aria-hidden="true" onclick="addbundle(); "></i>  ';  


 newdiv.innerHTML ='<table class="table normalinvoice table-bordered table-hover" id="normalinvoice_'+ dynamic_id +'"> <thead> <tr> <th rowspan="2" class="text-center" style="width: 160px;" ><?php echo display('product_name'); ?><i class="text-danger">*</i></th> <th rowspan="2" style="width:60px;" class="text-center"><?php echo display('Bundle No');?><i class="text-danger">*</i></th> <th rowspan="2"  class="text-center"><?php echo  display('description'); ?></th> <th rowspan="2" style="width:60px;" class="text-center"><?php echo display('Thick ness');?><i class="text-danger">*</i></th> <th rowspan="2" class="text-center"><?php echo display('Supplier Block No');?><i class="text-danger">*</i></th>  <th rowspan="2" class="text-center" ><?php echo display('Supplier Slab No');?><i class="text-danger">*</i> </th> <th colspan="2" style="width:150px;" class="text-center"><?php echo display('Gross Measurement');?><i class="text-danger">*</i> </th> <th rowspan="2" class="text-center"><?php echo display('Gross Sq.Ft');?></th>  <th rowspan="2" style="width:40px;" class="text-center"><?php echo display('Slab No');?><i class="text-danger">*</i></th> <th colspan="2" style="width:150px;" class="text-center"><?php echo display('Net Measure');?><i class="text-danger">*</i></th> <th rowspan="2" class="text-center"><?php echo display('Net Sq.Ft');?></th> <th rowspan="2"   class="text-center"><?php echo display('Cost per Sq.Ft');?></th> <th rowspan="2"   class="text-center"><?php echo display('Cost per Slab');?></th> <th rowspan="2"   class="text-center"><?php echo display('sales'); ?><br/><?php echo display('Price per Sq.Ft');?></th> <th rowspan="2"   class="text-center"><?php echo display('Sales Slab Price');?></th> <th rowspan="2" class="text-center"><?php echo display('Weight');?></th> <th rowspan="2" class="text-center"><?php echo display('Origin');?></th>  <th rowspan="2" style="width: 110px" class="text-center"><?php  echo  display('total'); ?></th> <th rowspan="2" class="text-center"><?php  echo  display('action'); ?></th> </tr>  <tr> <th class="text-center"><?php echo display('Width');?></th> <th class="text-center"><?php echo display('Height');?></th> <th class="text-center"><?php echo display('Width');?></th> <th class="text-center"><?php echo display('Height');?></th> </tr>  </thead> <tbody id="addPurchaseItem_'+ dynamic_id +'"> <tr> <input type="hidden" name="tableid[]" id="tableid_'+ dynamic_id +'"/><td> <input   list="magicHouses"  name="prodt[]" id="prodt_'+ dynamic_id +'"   class="form-control product_name"  style="width:160px;" placeholder="Search Product" > <datalist id="magicHouses"> <option value="Select the Product" selected>Select the Product</option> <?php  foreach($product as $tx){?>  <option value="<?php echo $tx["product_name"]."-".$tx["product_model"];?>">  <?php echo $tx["product_name"]."-".$tx["product_model"];  ?></option> <?php } ?> </datalist> <input type="hidden" class="common_product autocomplete_hidden_value  product_id_'+ dynamic_id +'" name="product_id[]" id="SchoolHiddenId_'+ dynamic_id +'" /> </td> <td> <input type="text" id="bundle_no_'+ dynamic_id +'" name="bundle_no[]" required="" class="bundle_no form-control" /> </td> <td> <input type="text" id="description_'+ dynamic_id +'" name="description[]" class="form-control" /> </td>  <td > <input type="text" name="thickness[]" id="thickness_'+ dynamic_id +'" required="" class="form-control"/> </td> <td> <input type="text" id="supplier_b_no_'+ dynamic_id +'" name="supplier_block_no[]" required="" class="form-control" /> </td>  <td > <input type="text"  id="supplier_s_no_'+ dynamic_id +'" name="supplier_slab_no[]" required="" class="form-control"/> </td> <td> <input type="text" id="gross_width_'+ dynamic_id +'" name="gross_width[]" required="" class="gross_width  form-control" /> </td> <td> <input type="text" id="gross_height_'+ dynamic_id +'" name="gross_height[]"  required="" class="gross_height form-control" /> </td>  <td > <input type="text"   style="width:60px;" readonly id="gross_sq_ft_'+ dynamic_id +'" name="gross_sq_ft[]" class="gross_sq_ft form-control"/> </td>   <td style="text-align:center;" >  <input type="text"   style="width:20px;" value="1" class="slab_no" id="slab_no_'+ dynamic_id +'" name="slab_no[]"   readonly  required=""/>  </td> <td> <input type="text" id="net_width_'+ dynamic_id +'" name="net_width[]" required="" class="net_width form-control" /> </td> <td> <input type="text" id="net_height_'+ dynamic_id +'" name="net_height[]"    required="" class="net_height form-control" /> </td> <td > <input type="text"   style="width:60px;" readonly id="net_sq_ft_'+ dynamic_id +'" name="net_sq_ft[]" class="net_sq_ft form-control"/> </td> <td>   <span class="input-symbol-euro"><input type="text" id="cost_sq_ft_'+ dynamic_id +'"  name="cost_sq_ft[]" readonly  style="width:60px;" value="0.00"  class="cost_sq_ft form-control" ></span>   <td >  <span class="input-symbol-euro"> <input type="text"  id="cost_sq_slab_'+ dynamic_id +'" name="cost_sq_slab[]" readonly   style="width:60px;" value="0.00"  class="form-control"/></span>     </td> <td>  <span class="input-symbol-euro">  <input type="text" id="sales_amt_sq_ft_'+ dynamic_id +'"  name="sales_amt_sq_ft[]"  style="width:60px;"  value="0.00" class="sales_amt_sq_ft form-control" /></span>     </td>  <td >  <span class="input-symbol-euro">   <input type="text"  id="sales_slab_amt_'+ dynamic_id +'" name="sales_slab_amt[]"  style="width:60px;" value="0.00"  class="sales_slab_amt form-control"/></td> </span>     </td> <td> <input type="text" id="weight_'+ dynamic_id +'" name="weight[]"  class="weight form-control" /> </td>  <td > <input type="text"  id="origin_'+ dynamic_id +'" name="origin[]" class="form-control"/> </td>  <td > <span class="input-symbol-euro"><input  type="text" class="total_price form-control" style="width:80px;" readonly value="0.00"  id="total_amt_'+ dynamic_id +'"     name="total_amt[]"/></span> </td>  <td style="text-align:center;"> <button  class="delete btn btn-danger" id="delete_'+ dynamic_id +'" type="button" value="Delete" ><i class="fa fa-trash"></i></button> </td>  </tr> </tbody> <tfoot> <tr> <td style="text-align:right;" colspan="8"><b>Gross Sq.Ft :</b></td> <td > <input type="text" id="overall_gross_'+ dynamic_id +'" name="overall_gross[]"   class="overall_gross form-control" style="width: 60px"  readonly="readonly"  /> </td> <td style="text-align:right;" colspan="3"><b>Net Sq.Ft :</b></td> <td > <input type="text" id="overall_net_'+ dynamic_id +'" name="overall_net[]"  class="overall_net form-control"  style="width: 60px"  readonly="readonly"  /> </td>  <td style="text-align:right;" colspan="4"><b>Weight :</b></td> <td ><input type="text" id="overall_weight_'+ dynamic_id +'" name="overall_weight[]"  class="overall_weight form-control"  style="width: 70px"  readonly="readonly"  />  </td> <td style="text-align:right;" colspan="1"><b>Total :</b></td> <td > <span class="input-symbol-euro">    <input type="text" id="Total_'+ dynamic_id +'" name="total[]"   class="b_total form-control"  style="width: 80px" value="0.00"  readonly="readonly"  /> </span> </td>  <td  style="text-align:center;"><i id="buddle_'+ dynamic_id +'" onclick="removebundle(); " class="btn-danger removebundle fa fa-minus" aria-hidden="true"></i></td>   </tr> </foot></table> <i id="buddle_1"  style="margin-right: 18px;float:right;color:white;background-color:#38469f;"   onclick="addbundle(); " class="addbundle fa fa-plus" aria-hidden="true"></i>';  


document.getElementById('content').appendChild(newdiv);
// document.getElementById(tabin).focus();
// document.getElementById("add_invoice_item").setAttribute("tabindex", tab5);
//  document.getElementById("add_purchase").setAttribute("tabindex", tab6);
// document.getElementById("add_purchase_another").setAttribute("tabindex", tab7);

dynamic_id++;



}

function payment_info(){
   
  var data = {
       gtotal:$('#gtotal').val(),
       customer_name:$('#customer_name').val()
  
    };
    data[csrfName] = csrfHash;

    $.ajax({
        type:'POST',
        data: data, 
     dataType:"json",
        url:'<?php echo base_url();?>Cinvoice/get_payment_info',
        success: function(result, statut) {
           
          $("#amount_paid").val(result[0]['amt_paid']);
          $("#balance").val(result[0]['balance']);
            console.log(result);
        }
    });
}

$(document).on('click', '.addbundle', function(){
         $(this).css("display","none");
      $(this).closest('table').find('.removebundle').css("display","block");
 });
 
 function calculate(){
 
  var total=$('#Over_all_Total').val();
 var tax= $('#product_tax').val();

 var field = tax.split('-');

 var percent = field[1];
 percent=percent.replace("%","");
  var answer = (percent / 100) * parseInt(total);

  
   var gtotal = parseInt(total + answer);
   console.log("gtotal :" +gtotal);



  var final_g= $('#final_gtotal').val();


  var amt=parseInt(answer)+parseInt(total);
  var num = isNaN(parseInt(amt)) ? 0 : parseInt(amt)
    $('#gtotal').val(num); 
  var custo_amt=$('#custocurrency_rate').val(); 
  console.log("numhere :"+num +"-"+custo_amt);
  var value=num*custo_amt;
  var custo_final = isNaN(parseInt(value)) ? 0 : parseInt(value)
 $('#customer_gtotal').val(custo_final); 
var bal_amt=custo_final-$('#amount_paid').val();
$('#balance').val(bal_amt);

}


$('#Total').on('change textInput input', function (e) {
    calculate();
});

$('#custocurrency_rate').on('change textInput input', function (e) {
    calculate();
});
// function calculate(){
  
//   var first=$("#gtotal").val();
// var custo_amt=$('.custocurrency_rate').val();
// var value=parseInt(first*custo_amt);

// var custo_final = isNaN(parseInt(value)) ? 0 : parseInt(value)
// $('#customer_gtotal').val(custo_final);  
// $('#balance').val(custo_final);
// }
//document.querySelector('input[list="magicHouses"]').addEventListener('input', onInput);

$(document).on('change select input','.product_name', function (e) {
   
    var id= $(this).attr('id');
  //  var id_num = id.match(/\d/g);
var parts = id.split('_');
var answer_id = parts[parts.length - 1];

    var pdt=$('#prodt_'+answer_id).val();
       //   var tid=$(this).closest('table').attr('id');


    localStorage.setItem('tab_id', '#prodt_'+answer_id);  
    console.log('#prodt_'+answer_id);
  //  var bun_num=$('#bundle_no_'+id_num).val();
    console.log(pdt);
    const myArray = pdt.split("-");
    var product_nam=myArray[0];
    var product_model=myArray[1];
   var data = {
    
        product_nam:product_nam,
        product_model:product_model,
      //  bun_num:bun_num
     };
     data[csrfName] = csrfHash;

     $.ajax({
         type:'POST',
         data: data, 
      dataType:"json",
         url:'<?php echo base_url();?>Cinvoice/product_info',
         success: function(result, statut) {
             console.log(' result length :'+result.length);
          if(result.length >0){
            var total="<table style='width:100%;table-layout: fixed' > <tr> <td style='width: 30px;'></td>  <td><input type='text' style='width: max-content;'  class='form-control' id='myInput1' onkeyup='search()' placeholder='Search for Supplier Block no..'></td> <td></td> <td> <input type='text' style='width: max-content;'  class='form-control' id='myInput2' onkeyup='search()' placeholder='Search for Supplier Slab no..'></td> <td></td> <td>  <input type='text' style='width: max-content;' class='form-control' id='myInput3' onkeyup='search()' placeholder='Search for Bundle no..'></td> <td></td> <td> <input type='text' style='width: max-content;' class='form-control' id='myInput4' onkeyup='search()' placeholder='Search for Origin..'></td><td></td>  </tr></table><br/>";
        var table_header = "<table style='width:auto;table-layout: fixed;word-wrap:break-word;' class='table table-bordered table-hover'  id='product_table1'> <thead> <tr><th rowspan='2' class='text-center'>Select All</th>   <th rowspan='2' style='width: max-content;' class='text-center'>Bundle No</th> <th rowspan='2' style='width: max-content;' class='text-center'>Description</th> <th rowspan='2' class='text-center'>Thick ness<i class='text-danger'>*</i></th> <th rowspan='2' class='text-center'>Supplier Block No<i class='text-danger'>*</i></th>  <th rowspan='2' class='text-center' >Supplier Slab No<i class='text-danger'>*</i> </th> <th colspan='2' style='width: max-content;' class='text-center'>Gross Measurement<i class='text-danger'>*</i> </th> <th rowspan='2' class='text-center'>Gross Sq. Ft</th> <th rowspan='2' style='width: min-content;' class='text-center'>Bundle No<i class='text-danger'>*</i></th> <th rowspan='2' style='width: min-content;' class='text-center'>Slab No<i class='text-danger'>*</i></th> <th colspan='2' style='width: max-content;' class='text-center'>Net Measure<i class='text-danger'>*</i></th> <th rowspan='2' class='text-center'>Net Sq. Ft</th> <th rowspan='2' style='width: 80px;' class='text-center'>Cost per Sq. Ft</th> <th rowspan='2' style='width: 80px;' class='text-center'>Cost per Slab</th> <th rowspan='2' style='width: 80px;' class='text-center'>Sales<br/>Price per Sq. Ft</th> <th rowspan='2'  style='width: 80px;' class='text-center'>Sales Slab Price</th> <th rowspan='2' class='text-center'>Weight</th> <th rowspan='2' class='text-center'>Origin</th>  <th rowspan='2' style='width: 100px' class='text-center'>Total</th> </tr>  <tr> <th class='text-center'>Width</th> <th class='text-center'>Height</th> <th class='text-center'>Width</th> <th class='text-center'>Height</th> </tr>  </thead><tbody>";
                var html ="";
var count=1;
               result.forEach(function(element) {
              html += "<tr><td><input type='checkbox' name='case[]' class='checkbox'/></td><td>"+element.bundle_no+"</td><td>"+element.description_table +"</td><td>"+element.thickness+"</td><td>"+element.supplier_block_no+"</td><td>"+element.supplier_slab_no+"</td><td>"+element.g_width+"</td><td>"+element.g_height+"</td><td>"+element.gross_sqft+"</td><td>"+element.bundle_no+"</td><td>"+count+"</td><td>"+element.n_height+"</td><td>"+element.n_width+"</td><td>"+element.net_sqft+"</td><td>"+element.cost_sqft+"</td><td>"+element.cost_slab+"</td><td>"+element.sales_price_sqft+"</td><td>"+element.sales_slab_price+"</td><td>"+element.weight+"</td><td>"+element.origin+"</td><td>"+element.total_amt+"</td></tr>";
         count++;
            });



              //  var all = total+table_header +html+ table_footer;

               var all = total+table_header+html ;

                $('#salle').html(all);
                            $('#product_model_info').modal('show');
        

           }else{
              $('#product_model_info').modal('hide');
           }
        //    $(".product_id_"+ id_num).val(result[0]['product_id']);
        //      console.log(result);
         }
     });
 });

$(document).on('click', '.checkbox', function () {
 $('#product_model_info').modal('hide');
     var values = new Array();

       $.each($("input[name='case[]']:checked").closest("td").siblings("td"),
              function () {
                   values.push($(this).text());
              });
          
     var table_id_product=localStorage.getItem("tab_id");
   var netheight = $(table_id_product).attr('id');
const indexLastDot = netheight.lastIndexOf('_');
var id = netheight.slice(indexLastDot + 1);

     $(table_id_product).closest("tr").find('#bundle_no_'+id).val(values[0]);
       $(table_id_product).closest("tr").find('#description_'+id).val(values[1]);
         $(table_id_product).closest("tr").find('#thickness_'+id).val(values[2]);
           $(table_id_product).closest("tr").find('#supplier_b_no_'+id).val(values[3]);
             $(table_id_product).closest("tr").find('#supplier_s_no_'+id).val(values[4]);
               $(table_id_product).closest("tr").find('#gross_width_'+id).val(values[5]);
                 $(table_id_product).closest("tr").find('#gross_height_'+id).val(values[6]);
                   $(table_id_product).closest("tr").find('#gross_sq_ft_'+id).val(values[7]);
                     $(table_id_product).closest("tr").find('#net_width_'+id).val(values[10]);
                       $(table_id_product).closest("tr").find('#net_height_'+id).val(values[11]);
                         $(table_id_product).closest("tr").find('#net_sq_ft_'+id).val(values[12]);
                           $(table_id_product).closest("tr").find('#cost_sq_ft_'+id).val(values[13]);
                             $(table_id_product).closest("tr").find('#cost_sq_slab_'+id).val(values[14]);
                               $(table_id_product).closest("tr").find('#sales_amt_sq_ft_'+id).val(values[15]);
                                 $(table_id_product).closest("tr").find('#sales_slab_amt_'+id).val(values[16]);
                                   $(table_id_product).closest("tr").find('#weight_'+id).val(values[17]);
                                     $(table_id_product).closest("tr").find('#origin_'+id).val(values[18]);
                                       $(table_id_product).closest("tr").find('#total_amt_'+id).val(values[19]);
                          var tid=$(table_id_product).closest('table').attr('id');


                         
const indexLast = tid.lastIndexOf('_');
var idt = tid.slice(indexLast + 1);
  var sum_net_val=0;
   $(table_id_product).closest('table').find('.net_sq_ft').each(function() {
        var precio = $(this).val();
        if (!isNaN(precio) && precio.length !== 0) {
          sum_net_val += parseFloat(precio);
        }
      });
$('#overall_net_'+idt).val(sum_net_val).trigger('change');
  var sum_w=0;
   $(table_id_product).closest('table').find('.weight').each(function() {
        var precio = $(this).val();
        if (!isNaN(precio) && precio.length !== 0) {
          sum_w += parseFloat(precio);
        }
      });
$('#overall_weight_'+idt).val(sum_w).trigger('change');
  var sum_gross_val=0;
   $(table_id_product).closest('table').find('.gross_sq_ft').each(function() {
        var precio = $(this).val();
        if (!isNaN(precio) && precio.length !== 0) {
          sum_gross_val += parseFloat(precio);
        }
      });
$('#overall_gross_'+idt).val(sum_gross_val).trigger('change');
  var sum_total_val=0;
   $(table_id_product).closest('table').find('.total_price').each(function() {
        var precio = $(this).val();
        if (!isNaN(precio) && precio.length !== 0) {
          sum_total_val += parseFloat(precio);
        }
      });
$('#Total_'+idt).val(sum_total_val).trigger('change');

var total_net=0;
 $('.table').each(function() {
    $(this).find('.net_sq_ft').each(function() {
        var precio = $(this).val();
        if (!isNaN(precio) && precio.length !== 0) {
          total_net += parseFloat(precio);
        }
      });

  });
$('#total_net').val(total_net.toFixed(3)).trigger('change');
var total_w=0;
 $('.table').each(function() {
    $(this).find('.weight').each(function() {
        var precio = $(this).val();
        if (!isNaN(precio) && precio.length !== 0) {
          total_w += parseFloat(precio);
        }
      });

  });
$('#total_weight').val(total_w.toFixed(3)).trigger('change');
  var overall_gs=0;
 $('.table').each(function() {
    $(this).find('.gross_sq_ft').each(function() {
        var precio = $(this).val();
        if (!isNaN(precio) && precio.length !== 0) {
          overall_gs += parseFloat(precio);
        }
      });
 });

$('#total_gross').val(overall_gs).trigger('change');

var overall_sum=0;
 $('.table').each(function() {
    $(this).find('.total_price').each(function() {
        var precio = $(this).val();
        if (!isNaN(precio) && precio.length !== 0) {
          overall_sum += parseFloat(precio);
        }
      });


  });

$('#Over_all_Total').val(overall_sum.toFixed(3)).trigger('change');
 
   calculate();
});
$(document).on('keyup','.sales_amt_sq_ft', function (e) {

   var netheight = $(this).attr('id');
const indexLastDot = netheight.lastIndexOf('_');
var id_num = netheight.slice(indexLastDot + 1);
   var sales_amt_sq_ft=$('#sales_amt_sq_ft_'+id_num).val();
   var net_sq_ft=$('#net_sq_ft_'+id_num).val();
 var netresult =parseInt(sales_amt_sq_ft) * parseInt(net_sq_ft);
netresult = isNaN(netresult) ? 0 : netresult;
var nresult=netresult.toFixed(3);
$('#'+'sales_slab_amt_'+id_num).val(netresult.toFixed(3));
$(this).closest('tr').find('.total_price').val(netresult.toFixed(3));
var overall_sum=0;
     $('.table').find('.total_price').each(function() {
var v=$(this).val();
  overall_sum += parseFloat(v);
});
 $('#Over_all_Total').val(overall_sum.toFixed(3)).trigger('change');
       var sum=0;
     $(this).closest('table').find('.total_price').each(function() {
var v=$(this).val();
  sum += parseFloat(v);
});
 $(this).closest('table').find('.b_total').val(sum.toFixed(3)).trigger('change');
  });
    $(document).on('keyup','.sales_slab_amt', function (e) {
         debugger;
  var netheight = $(this).attr('id');
const indexLastDot = netheight.lastIndexOf('_');
var id_num = netheight.slice(indexLastDot + 1);
  
   var sales_slab_amt=$('#sales_slab_amt_'+id_num).val();
   var net_sq_ft=$('#net_sq_ft_'+id_num).val();
 var netresult =parseInt(sales_slab_amt) / parseInt(net_sq_ft);
netresult = isNaN(netresult) ? 0 : netresult;
var nresult=netresult.toFixed(3);
$('#'+'sales_amt_sq_ft_'+id_num).val(netresult.toFixed(3));
$('#total_amt_'+id_num).val(sales_slab_amt);
var overall_sum=0;
     $('.table').find('.total_price').each(function() {
var v=$(this).val();
  overall_sum += parseFloat(v);
});
 $('#Over_all_Total').val(overall_sum.toFixed(3)).trigger('change');
       var sum=0;
     $(this).closest('table').find('.total_price').each(function() {
var v=$(this).val();
  sum += parseFloat(v);
});
 $(this).closest('table').find('.b_total').val(sum.toFixed(3)).trigger('change');
  });
$(document).on('change select','.product_name', function (e) {
var netheight = $(this).attr('id');
const indexLastDot = netheight.lastIndexOf('_');
var id = netheight.slice(indexLastDot + 1);
var net_width='net_width_'+id;
var net_height = 'net_height_'+ id;
var netwidth=$('#'+net_width).val();
var netheight=$('#'+net_height).val();
var netresult=parseInt(netwidth) * parseInt(netheight);
netresult=netresult/144;
netresult = isNaN(netresult) ? 0 : netresult;
var nresult=netresult.toFixed(3);
$('#'+'net_sq_ft_'+id).val(netresult.toFixed(3));
var cost_sqft=$('#cost_sq_ft_'+id).val();
var tid=$(this).closest('table').attr('id');
const indexLast = tid.lastIndexOf('_');
var idt = tid.slice(indexLast + 1);
var sales_sqft=cost_sqft *nresult;
var x = $('#slab_no_'+id).val();
var sales_slab_price=cost_sqft *nresult*x;

console.log(parseInt(cost_sqft) +"*"+parseInt(nresult)+"*"+idt);
$('#'+'sales_slab_amt_'+id).val(sales_slab_price.toFixed(3));
$(this).closest('tr').find('.total_price').val(sales_slab_price.toFixed(3));
sales_sqft = isNaN(sales_sqft) ? 0 : sales_sqft;
$('#'+'sales_amt_sq_ft_'+id).val(sales_sqft.toFixed(3));
 var sumnet=0;
 // var overall_sum=0;
     $(this).closest('table').find('.net_sq_ft').each(function() {
var v=$(this).val();
 if (!isNaN(v) && v.length !== 0) {
          sumnet += parseFloat(v);
        }
//  sumnet += parseFloat(v);
 // overall_sum +=parseFloat(v);
});
$('#overall_net_'+idt).val(sumnet.toFixed(3));
    var sumgross=0;
 // var overall_sum=0;
     $(this).closest('table').find('.gross_sq_ft').each(function() {
var v=$(this).val();
 if (!isNaN(v) && v.length !== 0) {
          sumgross += parseFloat(v);
        }
//  sumnet += parseFloat(v);
 // overall_sum +=parseFloat(v);
});
$('#overall_gross_'+idt).val(sumgross.toFixed(3));
var total_net=0;
 $('.table').each(function() {
    $(this).find('.net_sq_ft').each(function() {
        var precio = $(this).val();
        if (!isNaN(precio) && precio.length !== 0) {
          total_net += parseFloat(precio);
        }
      });

     
 //   });

  });
$('#total_net').val(total_net.toFixed(3)).trigger('change');
  var overall_gs=0;
 $('.table').each(function() {
    $(this).find('.gross_sq_ft').each(function() {
        var precio = $(this).val();
        if (!isNaN(precio) && precio.length !== 0) {
          overall_gs += parseFloat(precio);
        }
      });
 });

$('#total_gross').val(overall_gs).trigger('change');


var overall_sum=0;
 $('.table').each(function() {
    $(this).find('.total_price').each(function() {
        var precio = $(this).val();
        if (!isNaN(precio) && precio.length !== 0) {
          overall_sum += parseFloat(precio);
        }
      });

     
 //   });

  });

// var overall_net=0;
//  $('.table').each(function() {
//     $(this).find('.overall_net').each(function() {
//         var precio = $(this).val();
//         if (!isNaN(precio) && precio.length !== 0) {
//           overall_net += parseFloat(precio);
//         }
//       });

     
//  //   });

//   });
//   $('#total_net').val(overall_net.toFixed(3)).trigger('change');
$('#Over_all_Total').val(overall_sum.toFixed(3)).trigger('change');
  var sum=0;
 // var overall_sum=0;
     $(this).closest('table').find('.total_price').each(function() {
var v=$(this).val();
  sum += parseFloat(v);
 // overall_sum +=parseFloat(v);
});
$('#Total_'+idt).val(sum);
// $('#overall_net_'+idt).val(sum_net.toFixed(3));


gt(id);
   var id= $(this).attr('id');
  var id_num = id.substring(id.indexOf('_') + 1);
   var pdt=$('#'+id).val();
   console.log(pdt);
   const myArray = pdt.split("-");
   var product_nam=myArray[0];
   var product_model=myArray[1];
  var data = {
       product_nam:product_nam,
       product_model:product_model
    };
    data[csrfName] = csrfHash;
    $.ajax({
        type:'POST',
        data: data,
     dataType:"json",
        url:'<?php echo base_url();?>Cinvoice/availability',
        success: function(result, statut) {
            console.log(result);
            if(result.csrfName){
               csrfName = result.csrfName;
               csrfHash = result.csrfHash;
            }
          $("#cost_sq_ft_"+ id_num).val(result[0]['price']);
           $("#cost_sq_slab_"+ id_num).val(result[0]['price']);
          $("#SchoolHiddenId_"+ id_num).val(result[0]['product_id']);
            console.log(result);
        }
    });
});

  $('#terms').change(function(){
       $('#payment_due_date').val('');
  var sd = $(this).val().replace(/[^0-9]/gi, ''); 
var number = parseInt(sd, 10);
       var data = {
           sales_invoice_date : $('#date').val(),
           days :number,   
           pterms : $('#payment_terms').val()
       
       };
       data[csrfName] = csrfHash;
   
       $.ajax({
           type:'POST',
           data: data, 
          dataType:"json",
           url:'<?php echo base_url();?>Cinvoice/getdate',
           success: function(result, statut) {
            
              $('#payment_due_date').val(result);
          }
       });
   });
//Currency 

// const curItem1 = document.querySelector(".cur-item-1");
// const curItem2 = document.querySelector(".cur-item-2");

// const curInput1 = document.querySelector(".cur-input-1");
// const curInput2 = document.querySelector(".cur-input-2");

// const rateBox = document.querySelector(".rate");
// const changeBtn = document.querySelector(".fa-retweet");

// function calc() {
//   const curItem1Value = curItem1.value;
//   const curItem2Value = curItem2.value;
//   fetch(`https://api.exchangerate-api.com/v4/latest/${curItem1Value}`)
//     .then((res) => res.json())
//     .then((data) => {
//       const rate = data.rates[curItem2Value];

//       rateBox.textContent = `1 ${curItem1Value} = ${rate.toFixed(
//         4
//       )} ${curItem2Value}`;

//       curInput2.value = (curInput1.value * rate).toFixed(2);
//     });
// }

// function listeners() {
//   curItem1.addEventListener("change", calc);
//   curItem2.addEventListener("change", calc); 

//   curInput1.addEventListener("input", calc);
//   curInput2.addEventListener("input", calc);

//   changeBtn.addEventListener("click", () => {
//     [curItem1.value, curItem2.value] = [curItem2.value, curItem1.value];
//     calc();
//     changeBtn.classList.toggle("rotate-btn");
//   });
// }

// window.onmousemove = () => {
//   listeners();
//   calc();
//   compute();

// };

// currency

// const input_currency = document.querySelector('#input_currency');
// const output_currency = document.querySelector('#output_currency');
// const input_amount = document.querySelector('#input_amount');
// const output_amount = document.querySelector('#output_amount');
// const exchange = document.querySelector('#exchange');
// const rate = document.querySelector('#rate');
// // const rate = document.querySelector('#rate2');

// input_currency.addEventListener('change', compute);
// output_currency.addEventListener('change', compute);
// input_amount.addEventListener('input', compute);
// output_amount.addEventListener('input', compute);

// exchange.addEventListener('click', ()=>{
//     const temp = input_currency.value;
//     input_currency.value = output_currency.value;
//     output_currency.value= temp;
//     compute();
// });


// function compute(){
//     const input_currency1 = input_currency.value;
//     const output_currency1 = output_currency.value;

//     fetch(`https://api.exchangerate-api.com/v4/latest/${input_currency1}`)
//     .then(res => res.json())
//     .then(res => {
//         const new_rate = res.rates[output_currency1];
//         rate.innerText = `1 ${input_currency1} = ${new_rate} ${output_currency1}`
//         output_amount.value = (input_amount.value * new_rate).toFixed(2);
//     })

// }
 function search() {
    var input_bundle,
        input_block,
         input_slab,
       
        input_orgin,
        
          
        filter_bundle,filter_block,filter_slab,filter_orgin,
        table,
        tr,
        td,
        i,
        name,
        country;
    input_bundle = document.getElementById("myInput1");
    input_block = document.getElementById("myInput2");
     input_slab = document.getElementById("myInput3");
      input_orgin = document.getElementById("myInput4");
    
        

    filter_bundle = input_bundle.value.toUpperCase();  
    filter_block = input_block.value.toUpperCase();   
     filter_slab = input_slab.value.toUpperCase();   
      filter_orgin = input_orgin.value.toUpperCase();  

    table = document.getElementById("product_table1");
    tr = table.getElementsByTagName("tr");
    for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[3];
        td1 = tr[i].getElementsByTagName("td")[4];
         td2 = tr[i].getElementsByTagName("td")[8];
          td3 = tr[i].getElementsByTagName("td")[18];
          
        if (td && td1 && td2 && td3) {
            bundle = (td.textContent || td.innerText).toUpperCase();
            block = (td1.textContent || td1.innerText).toUpperCase();
              slab = (td2.textContent || td2.innerText).toUpperCase();
            orgin = (td3.textContent || td3.innerText).toUpperCase();

       

            if (
                bundle.indexOf(filter_bundle) > -1 &&
                block.indexOf(filter_block) > -1 &&
                slab.indexOf(filter_slab) > -1 &&
                orgin.indexOf(filter_orgin) > -1

            ) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }
        }
    }
}
    </script>


