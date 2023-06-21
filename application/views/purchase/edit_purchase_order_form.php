<!-- <script src="<?php //echo base_url(); ?>my-assets/js/admin_js/json/supplier.js.php" ></script> -->



<script src="<?php echo base_url()?>my-assets/js/admin_js/purchase.js" type="text/javascript"></script>


<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<script src="<?php echo base_url() ?>my-assets/js/countrypicker.js" type="text/javascript"></script>


<!-- Add New Purchase Start -->

<div class="content-wrapper">

    <section class="content-header">

        <div class="header-icon">

            <i class="pe-7s-note2"></i>

        </div>

        <div class="header-title">

            <h1><?php echo display('Edit Purchase Order');?></h1>

            <small><?php //echo display('add_new_purchase') ?></small>

            <ol class="breadcrumb">

                <li><a href="#"><i class="pe-7s-home"></i> <?php echo display('home') ?></a></li>

                <li><a href="#"><?php echo display('purchase') ?></a></li>

                <li class="active" style="color:orange;"><?php  echo  display('Purchase Order');?></li>

            </ol>

        </div>

    </section>

    <?php
  $myArray = explode('(', $tax_details); 
 $tax_amt=$myArray[0];
 //$tax_des=$myArray[1];
$tax_des= str_replace(")","",$myArray[1]);
?>

    <section class="content">

        <!-- Alert Message -->

        <?php

            $message = $this->session->userdata('message');

            if (isset($message)) {

        ?>

        <div class="alert alert-info alert-dismissable">

            <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>

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



        <!-- Purchase report -->

        <div class="row">

            <div class="col-sm-12">

                <div class="panel panel-bd lobidrag">

                    <div class="panel-heading" style="height:60px;">

                        <div class="panel-title">
<div class="Row">
                                 <div class="Column" style="float: left;">
                          <h4><?php //echo "Edit Purchase" ?></h4>
                          
                               </div> 
                                <div class="Column" style="float: right;"> <form id="histroy" method="post" >
<input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
<input type="hidden"  value="<?php echo $payment_id; ?>" name="payment_id" class="payment_id"/>
<input type="submit" id="payment_history" name="payment_history" class="btn" style="float:right;color:white;background-color: #38469f;" value="<?php echo  display('Payment History')?>" style="float:right;margin-bottom:30px;"/>
                                            </form> </div> 
                             <div class="Column" style="float: right;">
                            <?php if($this->permission1->method('manage_invoice','read')->access()){ ?>

                    <a style="background-color:#38469f;color:white;" href="<?php echo base_url('Cinvoice/manage_invoice') ?>" class="btn  m-b-5 m-r-2"><i class="ti-align-justify"> </i> <?php echo display('manage_invoice') ?> </a>

                    <?php }?>
           
                     </div>    </div>
                          

                        </div>

                    </div>



                    <div class="panel-body">

                    <form id="insert_purchase"  method="post">      
                        


                    <div class="row">
                            <div class="col-sm-6">
                               <div class="form-group row">
                                    <label for="supplier_sss" class="col-sm-4 col-form-label"><?php echo  display('Vendor');?>
                                        <i class="text-danger">*</i>
                                    </label>
                                    <div class="col-sm-7">
                                    <select name="supplier_id" id="supplier_id"  style="width: 115%;" class="form-control " required=""> 
                                            {supplier_list}

                                            <option value="{supplier_id}">{supplier_name}</option>

                                            {/supplier_list} 

                                            {supplier_selected}

                                            <option value="{supplier_id}" selected="">{supplier_name}</option>
                                            {/supplier_selected}
                                        </select>
                                    </div>
                                </div> 
                            </div>



                            <div class="col-sm-6">
                               <div class="form-group row">
                                    <label for="supplier_sss" class="col-sm-4 col-form-label"><?php echo display('Ship To');?>
                                        <i class="text-danger">*</i>
                                    </label>
                                    <div class="col-sm-6">
                                         <input rows="4" cols="50" name="ship_to" class=" form-control" value="<?php echo "{ship_to}" ?>" id="" style="width: 135%;"> </input>

                                  
                                        </div>  
                                </div> 
                            </div>

                        </div>

                        <div class="row">

                             <div class="col-sm-6">
                                <div class="form-group row">
                                    <label for="" class="col-sm-4 col-form-label"> <?php echo display('Vendor Address');?>
                                        <i class="text-danger"></i>
                                    </label>
                                    <div class="col-sm-8">
                                    <textarea class="form-control" tabindex="4" id="vendor_add" name="vendor_add" placeholder="vendor address"  value="<?php echo $vendor_add; ?>" rows="3" col="5" required></textarea>

                                </div>
                                </div>
                            </div>

                      

                            <div class="col-sm-6">
                                <div class="form-group row">
                                    <label for="invoice_no" class="col-sm-4 col-form-label"><?php echo display('P.O Number');?>
                                        <i class="text-danger"></i>
                                    </label>
                                    <div class="col-sm-6">
                                       <input type="text"  tabindex="3" class="form-control" name="chalan_no" value="<?php echo "{chalan_no}" ?>" placeholder="P.O Number" id="invoice_no" style="width:135%;"  readonly></input> 

 
                             <input type="hidden" tabindex="3" class="form-control" name="purchase_id" value="<?=$this->uri->segment(3); ?>"> </input> 
                                    </div>
                                </div>
                            </div>

                           
                        </div>


                        <div class="row">


                             <div class="col-sm-6">
                               <div class="form-group row">
                                    <label for="date" class="col-sm-4 col-form-label"><?php  echo display('Purchase order date');?>
                                    <i class="text-danger">*</i></label>
                                    <div class="col-sm-8">
                                        <?php $date = date('Y-m-d'); ?>
                                        <input type="date" required tabindex="2" class="form-control datepicker" name="purchase_date" value="<?php echo $date; ?>" id="date"  required/>
                                    </div>
                                </div> 
                            </div>



                            <div class="col-sm-6">
                               <div class="form-group row">
                                    <label for="adress" class="col-sm-4 col-form-label"><?php echo  display('Payment Terms');?> <i class="text-danger">*</i>
                                    </label>
                                    <div class="col-sm-8">
                                    <select class="form-control" tabindex="4" id="adress"  name="payment_terms" id="payment_terms" class=" form-control" placeholder='Payment Terms' id="payment_terms" rows="1">{payment_terms}   >

<option value="{payment_terms}">{payment_terms}</option>
<option value="100%">100%</option>
<option value="30-70">30-70%</option>
<option value="70-30">70-30%</option>
<option value="75-25">75-25%</option>
<option value="25-75">25-75%</option>
</select>
                                    </div>
                                </div> 
                                                           <div class="form-group row">
                                    <label for="adress" class="col-sm-4 col-form-label"><?php  echo display('payment_type'); ?> <i class="text-danger">*</i>
                                    </label>
                                    <div class="col-sm-8">
                                    <select name="paytype_drop" id="paytype_drop" class="form-control" required=""  tabindex="3" >
   <option value="{paytype}">{paytype}</option>
        <option value="CHEQUE"><?php echo display('cheque'); ?></option>
    <option value="CASH"><?php echo display('cash'); ?></option>
    <option value="CREDIT/DEBIT CARD"><?php echo display('CREDIT/DEBIT CARD');?></option>
    <option value="BANK TRANSFER"><?php echo display('BANK TRANSFER');?></option>

<?php foreach($payment_type as $ptype){?>
    <option value="<?php echo $ptype['payment_type'];?>"><?php echo $ptype['payment_type'] ;?></option>
<?php }?>
        </select>   
                                    </div>
                                </div> 
                            </div>

                        </div>




                        <div class="row">
                               <div class="col-sm-6">
                               <div class="form-group row">
                                    <label for="adress" class="col-sm-4 col-form-label"><?php echo display('Created By');?>
                                    <i class="text-danger">*</i>  </label>
                                    <div class="col-sm-8">
                                        <textarea class="form-control" tabindex="4" id="adress" name="created_by" value="" placeholder="Created By" rows="1">{created_by}</textarea>
                                    </div>
                                </div>
                            </div>


                            <div class="col-sm-6">
                                <div class="form-group row">
                                    <label for="date" class="col-sm-4 col-form-label">Est. Shipment date
                                        <i class="text-danger">*</i>
                                    </label>
                                    <div class="col-sm-8">
                                       
                                        <input type="date" required tabindex="2" class="form-control datepicker" name="est_ship_date" value="<?php echo $est_ship_date; ?>" id="date5"  required/>
                                    </div>
                                </div>
                            </div>


                        </div>

                        <div class="row">
                               <div class="col-sm-6">
                               <div class="form-group row">
                                    <label for="adress" class="col-sm-4 col-form-label"><?php echo  display('Shipment Terms');?>
                                    </label>
                                    <div class="col-sm-8">
                                    <select class="form-control" tabindex="4" id="adress" name="shipment_terms" placeholder="Shipment Terms" rows="1" required>
                                   <option value="<?php echo $shipment_terms; ?>"><?php echo $shipment_terms; ?></option>
                                
                                    <option value="FOB">FOB</option>
                                   <option value="CIF">CIF</option>
                                   </select>
                                </div>
                                </div>
                            </div>

<input type="hidden"  value="<?php echo $payment_id; ?>"  name="payment_id"/>
                            <div class="col-sm-6">
                                <div class="form-group row">
                                        <label for="adress" class="col-sm-4 col-form-label"><?php  echo display('Attachments');?>
                                    </label>
                                    <div class="col-sm-8">
                                       <input type="file" name="attachments" class="form-control">
                                    </div>
                                </div>
                            </div>


                        </div>

<input type="hidden" id="final_gtotal"  name="final_gtotal" />
                       
                        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">

                      <br>
          <div class="table-responsive">
     
   <div id="content">     
                     <?php 


for($m=1;$m<count($purchase_detail);$m++){ 
    ?>
<table class="table table-bordered normalinvoice table-hover" id="normalinvoice_<?php  echo $m; ?>" >
                              <thead>
                                     <tr>
                                         <th rowspan="2" class="text-center" style="width:180px;" ><?php echo display('product_name'); ?><i class="text-danger">*</i>  &nbsp;&nbsp; </th>
                                            <th rowspan="2" class="text-center" style="width:60px;"><?php echo display('Bundle No');?><i class="text-danger">*</i></th>
                                            <th rowspan="2"  class="text-center"><?php echo  display('description'); ?></th>
                                            <th rowspan="2" class="text-center" style="width:60px;"><?php echo display('Thick ness');?><i class="text-danger">*</i></th>
                                            <th rowspan="2" class="text-center"><?php echo display('Supplier Block No');?><i class="text-danger">*</i></th>

                                            <th rowspan="2" class="text-center" ><?php echo display('Supplier Slab No');?><i class="text-danger">*</i> </th>
                                            <th colspan="2"   style="width:150px;" class="text-center"><?php echo display('Gross Measurement');?><i class="text-danger">*</i> </th>
                                            <th rowspan="2" class="text-center"><?php echo display('Gross Sq.Ft');?></th>
                                           
                                            <th rowspan="2" style="width:40px;" class="text-center"><?php echo display('Slab No');?><i class="text-danger">*</i></th>
                                            <th colspan="2"  style="width:150px;" class="text-center"><?php echo display('Net Measure');?><i class="text-danger">*</i></th>
                                            <th rowspan="2" class="text-center"><?php echo display('Net Sq.Ft');?></th>
                                            <th rowspan="2"  style="width:100px;" class="text-center"><?php echo display('Cost per Sq.Ft');?></th>
                                            <th rowspan="2"  style="width:100px;" class="text-center"><?php echo display('Cost per Slab');?></th>
                                            <th rowspan="2"  style="width:100px;" class="text-center"><?php echo display('sales'); ?><br/><?php echo display('Price per Sq.Ft');?></th>
                                            <th rowspan="2"  style="width:100px;" class="text-center"><?php echo display('Sales Slab Price');?></th>
                                            <th rowspan="2" style="width:60px;" class="text-center"><?php echo display('Weight');?></th>
                                            <th rowspan="2" style="width:60px;" class="text-center"><?php echo display('Origin');?></th>
                                           
                                            <th rowspan="2" style="width: 130px" class="text-center"><?php  echo  display('total'); ?></th>
                                            <th rowspan="2" class="text-center"><?php  echo  display('action'); ?></th>
                                        </tr>

                                        <tr>
   <th class="text-center"><?php echo display('Width');?></th>
                                            <th class="text-center"><?php echo display('Height');?></th>  
                                          <th class="text-center"  ><?php echo display('Width');?></th>
                                            <th class="text-center" ><?php echo display('Height');?></th>   
                                        </tr>

                                </thead>
                                <style>
                                
                                .ui-front{
                                    display:none;
                                }
         .removebundle, .addbundle{
         padding: 10px 12px 10px 12px;
        border-radius:5px;
    }
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
                                    <?php foreach($purchase_detail as $inv){
                                        
                                      

$a = substr($inv['tableid'], 0, 1);
if($a==$m){
                                    
                                        ?>

                                    <tr>
                                        <td>
                                              <input type="hidden" name="tableid[]" id="tableid_1" value="<?php  echo $inv['tableid'];   ?>"/>
                                
                  <input list="magicHouses" name="prodt[]" id="prodt_<?php  echo $m.$n; ?>" class="form-control product_name" value="<?php  echo $inv['product_name'].'-'.$inv['product_model'];  ?>" style="width:140px;" />
	<datalist id="magicHouses">

 <?php                                
                                            foreach($products as $tx){?>
                                       
                                                <option value="<?php echo $tx['product_name'].'-'.$tx['product_model'];?>">  <?php echo $tx['product_name'].'-'.$tx['product_model'];  ?></option>
                                           <?php } ?>

</datalist> 
                                        <input type='hidden' class='common_product autocomplete_hidden_value  product_id_1' value="<?php  echo $inv['product_id'];  ?>" name='product_id[]' id='SchoolHiddenId_<?php  echo $m.$n; ?>' />
                                        </td>
                                             <td>
                                                <input type="text" id="bundle_no_<?php  echo $m.$n; ?>" name="bundle_no[]" required="" value="<?php  echo $inv['bundle_no'];  ?>" class="form-control" />
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
                                                <input type="text"  id="slab_no_<?php  echo $m.$n; ?>" name="slab_no[]"  value="<?php  echo $n+1;  ?>"  readonly  required="" value="<?php  echo $c;  ?>" class="form-control"/>
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

       <span class="input-symbol-euro"><input type="text" id="cost_sq_ft_<?php  echo $m.$n; ?>"  name="cost_sq_ft[]" readonly  style="width:60px;" value="<?php  echo $inv['cost_per_sqft'];  ?>"  class="cost_sq_ft form-control" ></span>

                                        
                                            <td >
                     
      <span class="input-symbol-euro"> <input type="text"  id="cost_sq_slab_<?php  echo $m.$n; ?>" name="cost_sq_slab[]" readonly   style="width:60px;" value="<?php  echo $inv['cost_per_slab'];  ?>"  class="form-control"/></span>
 


                                               
                                            </td>
                                            <td>
                                        
         <span class="input-symbol-euro">  <input type="text" id="sales_amt_sq_ft_<?php  echo $m.$n; ?>"  name="sales_amt_sq_ft[]"  style="width:60px;"  value="<?php  echo $inv['sales_price_sqft'];  ?>" class="sales_amt_sq_ft form-control" /></span>



                                               
                                            </td>
                                        
                                            <td >
                                    
      <span class="input-symbol-euro">   <input type="text"  id="sales_slab_amt_<?php  echo $m.$n; ?>" name="sales_slab_amt[]"  style="width:60px;" value="<?php  echo $inv['sales_slab_price'];  ?>"  class="sales_slab_amt form-control"/></td> </span>
      </td>
                                            <td>
                                                <input type="text" id="weight_<?php  echo $m.$n; ?>" style="width:50px;" name="weight[]"  value="<?php  echo $inv['weight'];  ?>" class="weight form-control" />
                                            </td>
                                        
                                            <td >
                                                <input type="text"  id="origin_<?php  echo $m.$n; ?>" style="width:50px;" name="origin[]" value="<?php  echo $inv['origin'];  ?>" class="form-control"/>
                                            </td>

                                            <td >
                                                  <span class="input-symbol-euro"><input  type="text" class="total_price form-control" style="width:60px;"   value="<?php  echo $inv['total_amount'];  ?>"  id="total_<?php  echo $m.$n; ?>"     name="total_amt[]"/></span>
                                            </td>
                                               
                                          
                                              <td style="text-align:center;">
                                                <button  class='delete btn btn-danger'  type='button' value='Delete' ><i class='fa fa-trash'></i></button>
                                            </td>
                                            
                                            </tr>
                                            
                                            <?php $n++;   } }  ?>
                                            </tbody>
                                <tfoot>
                                    <tr>
                                    <td style="text-align:right;" colspan="8"><b><?php  echo display('Gross Sq.Ft');?>:</b></td>
                                        <td >
             <input type="text" id="overall_gross_<?php echo $m; ?>" name="overall_gross[]"    class="overall_gross form-control" style="width: 60px"   readonly="readonly"  /> 
            </td>
             <td style="text-align:right;" colspan="3"><b><?php  echo display('Net Sq.Ft');?> :</b></td>
                                        <td >
             <input type="text" id="overall_net_<?php echo $m; ?>" name="overall_net[]"  class="overall_net form-control"  style="width: 60px"   readonly="readonly"  /> 
            </td>
<td style="text-align:right;" colspan="4"><b><?php  echo display('Weight');?> :</b></td>
                                        <td >
             <input type="text" id="overall_weight_<?php echo $m; ?>" name="overall_weight[]"  class="overall_weight form-control"    readonly="readonly"  /> 
            </td> 
                                        <td style="text-align:right;" colspan="1"><b><?php  echo display('total'); ?>:</b></td>
                                        <td >
               <span class="input-symbol-euro">     <input type="text" id="Total_<?php echo $m; ?>" name="total[]"   class="b_total form-control"   style="padding-top: 6px;width: 60px"    readonly="readonly"  />
            </td>
                                                                               <td colspan="1" style="text-align: end;">
 <i id="buddle_<?php echo $m; ?>" class="btn-danger removebundle fa fa-minus"  ><?php  echo  display('Bundle');?></i>    
 

                                            </td>    
                                           
                                    </tr>
  
                                            </tfoot>
                            </table>
                            <?php   } ?>
                            <i id="buddle_1" class="addbundle fa fa-plus" style=" padding: 10px 12px 10px 12px;margin-right: 18px;float:right;color:white;background-color:#38469f;"   onclick="addbundle(); "aria-hidden="true"></i>
                         </div> </div>
                                              <table class="taxtab table table-bordered table-hover">
                        <tr>
                        <td class="hiden" style="width:25%;border:none;text-align:end;font-weight:bold;">
                           <?php  echo display("Live Rate");?> : 
                         </td>
                
                               <td class="hiden" style="width:12%;text-align-last: center;padding:5px;background-color: #38469f;border:none;font-weight:bold;color:white;">1 <?php  echo $curn_info_default;  ?>
                                 = <input style="width: 80px;text-align:center;color:black;padding:5px;" type="text" id="custocurrency_rate"/>&nbsp;<label for="custocurrency" style="color:white;background-color: #38469f;"></label></td>
                    <td style="border:none;text-align:right;font-weight:bold;">   <?php  echo display("tax");?> : 
                                 </td>
                                <td style="width:12%">
<select name="tx"  id="product_tax" class="form-control" >
<option value="<?php  echo $tax_des; ?>" selected="selected"><?php  echo $tax_des; ?></option>
<?php foreach($tax as $tx){?>
  
    <option value="<?php echo $tx['tax_id'].'-'.$tx['tax'].'%';?>">  <?php echo $tx['tax_id'].'-'.$tx['tax'].'%';  ?></option>
<?php } ?>
</select>
</td>
<td  style="width:25%;"></td>
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
        <td  colspan="2" style="vertical-align:top;text-align:right;border:none;"><b><?php  echo display('Overall TOTAL');?> :</b></td>
        <td colspan="1" style="border:none;padding-bottom: 40px;"><span class="input-symbol-euro"><input type="text" id="Over_all_Total" name="Over_all_Total"  style="width:180px;" class="form-control" value="<?php echo $purchase_detail[0]['total'];  ?>"  readonly="readonly"  /> </span></td>
         <td colspan="4" style="text-align:right;border:none;"><b><?php  echo display('TAX DETAILS');?> :</b></td><td colspan="1" style="border:none;">  <span class="input-symbol-euro">     <input type="text" class="form-control" style="width:180px;"  id="tax_details" value="<?php echo $purchase_detail[0]['tax_details'];  ?>" name="tax_details"  readonly="readonly" /></span></td>
</tr>
   <tr>
        <td  colspan="2" style="vertical-align:top;text-align:right;border:none;"><b>Overall Gross Sq.Ft :</b></td>
        <td colspan="1" style="border:none;"><input type="text" id="total_gross" name="total_gross" value="<?php echo  $purchase_detail[0]['total_gross'];  ?>"  style="width:180px;" class="form-control"   readonly="readonly"  /> </td>
         <td colspan="4" style="text-align:right;border:none;"><b><?php  echo display('GRAND TOTAL');?> :</b></td><td colspan="1" style="border:none;">  <span class="input-symbol-euro">    <span class="input-symbol-euro">   <input type="text" id="gtotal"   class="form-control" style="width:180px;" name="gtotal" value="<?php  echo $purchase_info[0]['grand_total_amount'];   ?>"  readonly="readonly" /></td>
</tr>
    <tr>
        <td  colspan="2" style="vertical-align:top;text-align:right;border:none;"><b>Overall Net Sq.Ft :</b></td>
        <td colspan="1" style="border:none;"><input type="text" id="total_net" name="total_net" value="<?php echo  $purchase_detail[0]['total_net'];  ?>" class="form-control"  style="width:180px;"  readonly="readonly"  /> </td>
         <td colspan="4" style="text-align:right;border:none;"><b><?php  echo display('GRAND TOTAL');?>:</b><br/><b><?php  echo display('Preferred Currency');?></b></td><td colspan="1" style="border:none;"> <table><tr> <td class="cus" name="cus" style="width: 40px;"></td> <td><input  type="text"  style="width:180px;" readonly id="vendor_gtotal"    name="vendor_gtotal"  required   /></td></tr></table></td>
</tr>

    <tr>
        <td colspan="2"  style="vertical-align:top;text-align:right;border:none;"><b><?php  echo display('Overall Weight');?> :</b></td><td colspan="1" style="border:none;"><input type="text" id="total_weight" value="<?php echo  $purchase_detail[0]['total_weight'];  ?>" name="total_weight"  style="width:180px;"  class="form-control"   readonly="readonly"  /></td>
         <td colspan="4" class="amt" style="text-align:right;border:none;"><b><?php  echo display('Amount Paid');?> :</b></td><td style="border:none;"> 
                                        <table border="0">
      <tr class="amt">

        <td class="cus" name="cus" style="width: 40px;"></td>
<td> <input  type="text"  readonly id="amount_paid" style="width:-webkit-fill-available;"  name="amount_paid"  value="<?php echo  $purchase_detail[0]['paid_amount'];  ?>"  required   /></td> 
     </tr>
   </table>
  </td>
                                            </tr> 
                                           <tr>
      <td colspan="2"  style="vertical-align:top;text-align:right;border:none;"></td><td colspan="1" style="border:none;"></td>
        <td class="amt" colspan="4"  style="vertical-align:top;text-align:right;border:none;"><b><?php echo display('balance_ammount');  ?> :</b></td>
        <td class="amt" style="border:none;" colspan="1">
            <table border="0">
      <tr class="amt">
        <td class="cus" name="cus" style="border:none;width: 40px;"></td>  <td style="border:none;">
                                          <input  type="text"   readonly id="balance"  value="<?php echo $purchase_detail[0]['due_amount'];  ?>" name="balance"  required   />                     
                                            </td>     </tr>
   </table>
                                            </td>
                                            </tr> 
											
											
											
											
											
											       <td colspan="21" style="text-align: end;">
                                            
                                        <input type="submit" value="<?php echo  display('Make Payment')?>" style="color:white;background-color: #38469f;" class="btn btn-large" id="paypls"/>
                                            </td>
</tr>

</table>
                      
                        


                        <div class="row">
                        <div class="col-sm-12">
                               <div class="form-group row">
                                    <label for="remark" class="col-sm-2 col-form-label"><?php echo  display('Remarks / Details');?>
                                    </label>
                                    <div class="col-sm-10">
                                 
                                  <textarea class="form-control" rows="4" cols="50" id="remark" name="remark" placeholder="Remarks" rows="1"><?php echo $remarks; ?></textarea>
         
                                </div>
                                </div> 
                            </div>
                            </div>
                      
                      
                            <div class="row">
                        <div class="col-sm-12">
                               <div class="form-group row">
                                    <label for="adress" class="col-sm-2 col-form-label"><?php echo  display('Message on Invoice');?>
                                    </label>
                                    <div class="col-sm-10">
                                           <textarea class="form-control" rows="4" cols="50" id="adress" name="message_invoice" placeholder="Message on Invoice" rows="1"><?php   echo $message_invoice;  ?></textarea>
                                           
                                     
                                    </div>
                                </div> 
                            </div>

  </div>
</div>

                         <div class="form-group row">
                            <div class="col-sm-6"  style="height: 80px;">
                                <input type="submit" id="add_purchase"  style="color:white;background-color:#38469f;" class="btn btn-primary btn-large" name="add-purchase-order" value="<?php  echo  display('save'); ?>" />
             
                                <a   style="color:white;background-color:#38469f;" id="final_submit" class='final_submit btn btn-primary'><?php echo display('submit'); ?></a>
<a id="download"        style="color:white;background-color:#38469f;" class='btn btn-primary'>Download</a>
<a id="print"        style="color:white;background-color:#38469f;" class='btn btn-primary'>Print</a>
                               

                            </div>
                            </div>
                        </div>

                     
        </form> <input type="hidden" id="invoice_hdn"/> <input type="hidden" id="invoice_hdn1"/>
                    </div>

                </div>

            </div>

        </div>

    </section>

</div>
  <div class="modal fade" id="payment_history_modal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content" style="width: 1000px;min-width: max-content;margin-top: 190px;">
        <div class="modal-header" style="color:white;background-color:#38469f;">
          <button type="button" id="history_close" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><?php echo  display('PAYMENT HISTORY')?></h4>
        </div>
        <div class="modal-body1">
        <div id="salle_list"></div>
     
        </div>
        <div class="modal-footer">
          
        </div>
      </div>
      
    </div>
  </div>

  <div class="modal fade" id="myModal1" role="dialog" >
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content" style="    margin-top: 190px;">
        <div class="modal-header"style="color:white;background-color:#38469f;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><?php  echo display('purchase')."-".display('Purchase Order'); ?></h4>
        </div>
        <div class="modal-body" id="bodyModal1" style="font-weight:bold;text-align:center;">
          
        
     
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
			<h4 class="modal-title"><?php echo  display('Confirmation');?></h4>
			</div>
			<div class="modal-body">
				<p><?php echo  display('Your Invoice is not submitted. Would you like to submit or discard');?>
				</p>
				<p class="text-warning">
					<small><?php echo  display('If you dont save, your changes will not be saved.');?></small>
				</p>
			</div>
			<div class="modal-footer">
            <input type="submit" id="ok" class="btn btn-primary pull-left final_submit" onclick="submit_redirect()"  value="<?php  echo  display('submit');?>"/>
                <button id="btdelete" type="button" class="btn btn-danger pull-left" onclick="discard()"><?php  echo  display('Discard');?></button>
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
          <h4 class="modal-title"><?php  echo  display('add_payment');?></h4>
        </div>
        <div class="modal-body">
          
   
<form id="add_payment_info"  method="post" >  
            <div class="row">


<div class="form-group row">

        <label for="date" style="text-align:end;" class="col-sm-3 col-form-label"><?php echo  display('payment_date');?> <i class="text-danger">*</i></label>

        <div class="col-sm-5">

            <input class=" form-control" type="date"  name="payment_date" id="payment_date" required value="<?php echo html_escape($date); ?>" tabindex="4" />

        </div>

    </div>
<input type="hidden" id="cutomer_name" name="cutomer_name"/>
<input type="hidden"  value="<?php echo $payment_id; ?>"  name="payment_id"/>
 <div class="form-group row">

        <label for="billing_address" style="text-align:end;" class="col-sm-3 col-form-label"><?php echo  display('Reference No');?><i class="text-danger">*</i></label>

        <div class="col-sm-5">
        <input class=" form-control" type="text"  name="ref_no" id="ref_no" required   />
</div>
 </div> 
    <div class="form-group row">
      <label for="bank" style="text-align:end;" class="col-sm-3 col-form-label"><?php echo  display('Select Bank');?><i class="text-danger">*</i></label>
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
<option value="First Republic Bank">First Republic Bank</option>
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
<option value="Credit Suisse">Credit Suisse</option>
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

<label for="billing_address" style="text-align:end;" class="col-sm-3 col-form-label"><?php  echo  display('Amount to be paid');?> : </label>

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

<label for="billing_address" style="text-align:end;" class="col-sm-3 col-form-label"><?php  echo  display('Amount Received');?> : </label>

<div class="col-sm-5">
<table border="0">
      <tr>
        <td class="cus" name="cus"></td>
        <td><input  type="text"  readonly name="amount_received" value="0.00"  style="width:190%;" id="amount_received" class="form-control"required   /></td>

    
</tr>
</table>



</div>
</div> 
<div class="form-group row">

<label for="billing_address" style="text-align:end;" class="col-sm-3 col-form-label"><?php  echo display('balance_ammount'); ?>: </label>

<div class="col-sm-5">

<table border="0">
  <tr>
    <td class="cus" name="cus"></td>
    <!-- <td><input  type="text"  style="border:none;" readonly name="balance_modal" id="balance_modal" class="form-control" required  /></td> -->

    <td><input  type="text"   readonly name="balance_modal"    style="width:190%;" id="balance_modal" class="form-control" required  /></td>

</tr>
</table>
</div>
</div> 





<div class="form-group row">

<label for="billing_address" style="text-align:end;" class="col-sm-3 col-form-label"><?php  echo  display('payment_amount');?>: <i class="text-danger">*</i></label>

<div class="col-sm-5">
<table border="0">
  <tr>
    <td class="cus" name="cus"></td>
    <td><input  type="text"   name="payment" id="payment_from_modal"     style="width:190%;" class="form-control"required   /></td>
     </tr>
   </table>


</div>
</div>

<div class="form-group row">

<label for="billing_address" style="text-align:end;" class="col-sm-3 col-form-label"><?php  echo  display('Additional Information');?> : </label>

<div class="col-sm-5">
<input class=" form-control" type="text"  name="details" id="details"/>
</div>
</div> 
<div class="form-group row">

<label for="billing_address" style="text-align:end;" class="col-sm-3 col-form-label"><?php  echo display('Attachments');  ?> : </label>

<div class="col-sm-5">
<input class=" form-control" type="file"  name="attachement" id="attachement" />
</div>
</div> 
  </div>   </div>
     <div class="modal-footer">
     <div class="col-sm-8"></div>
   
     <div class="col-sm-4">
                 <a href="#" class="btn" data-dismiss="modal" style="color:white;background-color:#38469f;" ><?php  echo display('Close');  ?></a>
     <input class="btn btn-primary" type="submit"   style="color:white;background-color:#38469f;"  name="submit_pay" id="submit_pay" value="<?php  echo display('submit');  ?>"  required   />
</div>
     </div>
   </div>
   </form>
 </div>
</div>
<div class="modal fade" id="add_bank_info">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="color:white;background-color:#38469f;" >
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                	<h4 class="modal-title"><?php echo display('add_new_bank');  ?></h4>

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
  <label for="shipping_line" class="col-sm-4 col-form-label"><?php echo display('country');  ?>
                                        <i class="text-danger"></i>
                                    </label>
                                    <div class="col-sm-6">
                                    <select class="selectpicker countrypicker form-control"  data-live-search="true" data-default="Select the Country"  name="country" id="country" style="width:100%"></select>

                                    </div>

</div>
<div class="form-group row">
            <label for="previous_balance" class="col-sm-4 col-form-label"><?php echo "Currency" ?></label>
            <div class="col-sm-6">
            <select  class="form-control" id="currency" name="currency1"  style="width: 100%;" required=""  style="max-width: -webkit-fill-available;">

    <option>Select currency</option>
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
    <option value="USD">USD - US Dollar</option>
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
             <a href="#" class="btn" data-dismiss="modal" style="color:white;background-color:#38469f;" ><?php  echo  display('Close');?></a>
     <input type="submit" id="addBank"  style="color:white;background-color:#38469f;"  class="btn btn-primary" name="addBank" value="<?php echo display('save') ?>"/>
     <!--  <input type="submit" class="btn btn-success" value="Submit"> -->

  </div>
  </div>  </div>

</form>
  </div>
  </div>
  </div>                

          
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
            var csrfName = '<?php echo $this->security->get_csrf_token_name();?>';
var csrfHash = '<?php echo $this->security->get_csrf_hash();?>';
 $(document.body).addClass('sidebar-collapse');



$( document ).ready(function() {
    $('.hiden').hide();
//   var data1 = {
//       value: $('#supplier_id').val()
//    };
//   data[csrfName] = csrfHash;
//   $.ajax({
//       type:'POST',
//       data: data1,
//       //dataType tells jQuery to expect JSON response
//       dataType:"json",
//       url:'<?php //echo //base_url();?>Cinvoice/getvendor_products',
//       success: function(states, statut) {
//         console.log(states);
//         // $(".product_name").html("");
//              if (Object.keys(states).length > 0) {
//                // $(".product_name").append($('<option></option>').val(0).html('Select a Product'));
//              }
//              else {
//                     $(".product_name").append($('<option></option>').val(0).html(''));
//              }
//            $.each(states, function (i, state) {
//             $(".product_name").append($('<option></option>').val(state.product_name+'-'+state.products_model).html(state.product_name+'-'+state.products_model));
//            });;
//       }
//   });

  
        $(document).ready(function() {
            //alert($('#supplier_id').val());
          
            var data = {
      value: $('#supplier_id').val()
   };
  data[csrfName] = csrfHash;
  $.ajax({
      type:'POST',
      data: data,
   
      //dataType tells jQuery to expect JSON response
      dataType:"json",
      url:'<?php echo base_url();?>Cinvoice/getvendor',
      success: function(result, statut) {
          if(result.csrfName){
             //assign the new csrfName/Hash
             csrfName = result.csrfName;
             csrfHash = result.csrfHash;
          }
         // var parsedData = JSON.parse(result);
        //  alert(result[0].p_quantity);
        console.log(result);
       //   console.log(result[0]['address']."\n".result[0]['city']."\n".result[0]['state']."-".result[0]['zip']."-".result[0]['country']."\n".result[0]['primaryemail']."-".result[0]['mobile']);
     
       // console.log(result[0]['currency_type']);
      $("#vendor_add").val(result[0]['address']+"\r\n"+result[0]['city']+"\r\n"+result[0]['state']+"-"+result[0]['zip']+"-"+result[0]['country']+"\n"+result[0]['primaryemail']+"-"+result[0]['mobile']);
     $('#vendor_type_details').val(result[0]['vendor_type']);
      $(".cus").html(result[0]['currency_type']);
        $("label[for='custocurrency']").html(result[0]['currency_type']);
       console.log('https://open.er-api.com/v6/latest/<?php echo $curn_info_default; ?>');
       $.getJSON('https://open.er-api.com/v6/latest/<?php echo $curn_info_default; ?>', 
function(data) {
 var custo_currency=result[0]['currency_type'];
    var x=data['rates'][custo_currency];
 var Rate =parseFloat(x).toFixed(3);
 Rate = isNaN(Rate) ? 0 : Rate;

  $('.hiden').show();

  $("#custocurrency_rate").val(Rate);
  var g=$('#gtotal').val();
  $('#vendor_gtotal').val(parseInt(Rate*g));
});
      }
  });

});

  $('#custocurrency_rate').on('change', function (e) {
    var total=$('#Total').val();
    var custocurrency_rate=$("#custocurrency_rate").val();
    var final=parseInt(total * custocurrency_rate);


  });


//$('.amt').hide();
  $('#download').hide();
       $('#print').hide();   
       $('#final_submit').hide();              
});
$('#supplier_id').on('change', function (e) {
  
  var data = {
      value: $('#supplier_id').val()
   };
  data[csrfName] = csrfHash;
  $.ajax({
      type:'POST',
      data: data,
   
      //dataType tells jQuery to expect JSON response
      dataType:"json",
      url:'<?php echo base_url();?>Cinvoice/getvendor',
      success: function(result, statut) {
          if(result.csrfName){
             //assign the new csrfName/Hash
             csrfName = result.csrfName;
             csrfHash = result.csrfHash;
          }
         // var parsedData = JSON.parse(result);
        //  alert(result[0].p_quantity);
        console.log(result[0]['currency_type']);
     // $("#vendor_gtotal").val(result[0]['currency_type']);
      $(".cus").val(result[0]['currency_type']);
        $("label[for='custocurrency']").html(result[0]['currency_type']);
       console.log('https://open.er-api.com/v6/latest/<?php echo $curn_info_default; ?>');
       $.getJSON('https://open.er-api.com/v6/latest/<?php echo $curn_info_default; ?>', 
function(data) {
 var custo_currency=result[0]['currency_type'];
    var x=data['rates'][custo_currency];
 var Rate =parseFloat(x).toFixed(3);
 Rate = isNaN(Rate) ? 0 : Rate;
  console.log(Rate);
  $('.hiden').show();
  $("#custocurrency_rate").val(Rate);
});
      }
  });


});
$('#insert_purchase').submit(function (event) {
    var dataString = {
        dataString : $("#insert_purchase").serialize()
    
   };
   dataString[csrfName] = csrfHash;
  
    $.ajax({
        type:"POST",
        dataType:"json",
        url:"<?php echo base_url(); ?>Cpurchase/insert_purchase_order",
        data:$("#insert_purchase").serialize(),

        success:function (data) {
     
   
            var split = data.split("/");
            $('#invoice_hdn1').val(split[0]);
         
     
            $('#invoice_hdn').val(split[1]);
            $("#myModal1").find('.modal-body').text('Purchase Order Created Successfully');
           

 $('#download').show();
       $('#print').show();   
       $('#final_submit').show();  
    $('#myModal1').modal('show');
    window.setTimeout(function(){
        $('.modal').modal('hide');
       
$('.modal-backdrop').remove();
$("#bodyModal1").html("");
 },2500);


       }

    });
    event.preventDefault();
});
$('#download').on('click', function (e) {

 var popout = window.open("<?php  echo base_url(); ?>Cpurchase/purchase_order_details_data/"+$('#invoice_hdn1').val());

});  
$('#print').on('click', function (e) {

 var popout = window.open("<?php  echo base_url(); ?>Cpurchase/purchase_order_details_data_print/"+$('#invoice_hdn1').val());

}); 
function discard(){
   $.get(
    "<?php echo base_url(); ?>Cpurchase/deletepurchaseorder/", 
   { val: $("#invoice_hdn1").val(), csrfName:csrfHash,payment_id:$('#payment_id').val() }, // put your parameters here
   function(responseText){
    console.log(responseText);
    window.btn_clicked = true;      //set btn_clicked to true
    var input_hdn="<?php echo  display('Your Invoice No')." :";?>"+$('#invoice_hdn').val()+"<?php echo  " ".display('has been Discarded');?>";
  
    console.log(input_hdn);
    $('#myModal3').modal('hide');
    $("#bodyModal1").html(input_hdn);
        $('#myModal1').modal('show');
    window.setTimeout(function(){
       

        window.location = "<?php  echo base_url(); ?>Cpurchase/manage_purchase_order";
      }, 2000);
   }
); 
}
     function submit_redirect(){
        window.btn_clicked = true;      //set btn_clicked to true
         var input_hdn="<?php echo  display('Your Invoice No')." :";?>"+$('#invoice_hdn').val()+"<?php echo  " ".display('has been Updated Successfully');?>";
  
    console.log(input_hdn);
    $('#myModal3').modal('hide');
    $("#bodyModal1").html(input_hdn);
        $('#myModal1').modal('show');
    window.setTimeout(function(){
       

        window.location = "<?php  echo base_url(); ?>Cpurchase/manage_purchase_order";
      }, 2000);
     }
$('.final_submit').on('click', function (e) {

    window.btn_clicked = true;      //set btn_clicked to true
     var input_hdn="<?php echo  display('Your Invoice No')." :";?>"+$('#invoice_hdn').val()+"<?php echo  " ".display('has been Updated Successfully');?>";
  
    console.log(input_hdn);
    $("#myModal1").find('.modal-body').text(input_hdn);
   // $("#bodyModal1").html(input_hdn);
    $('#myModal1').modal('show');
    window.setTimeout(function(){
        $('.modal').modal('hide');
       
$('.modal-backdrop').remove();
 },2500);
    window.setTimeout(function(){
       

        window.location = "<?php  echo base_url(); ?>Cpurchase/manage_purchase_order";
      }, 2500);
       
});

window.onbeforeunload = function(){
    if(!window.btn_clicked){
       // window.btn_clicked = true; 
        $('#myModal3').modal('show');
       return false;
    }
}

function supplier(id){
    console.log(id);
  var data = {
      value: $('#supplier_id').val()
   };
  data[csrfName] = csrfHash;
  $.ajax({
      type:'POST',
      data: data,
   
      //dataType tells jQuery to expect JSON response
      dataType:"json",
      url:'<?php echo base_url();?>Cinvoice/getvendor_products',
      success: function(states, statut) {
        console.log(states);
        var select = $("#product_name_"+id);
       // $("#product_name_"+id).html("");
//        for (i = 0; 1 < Object.keys(states).length; i++) {
//     select.append($('<option>', {
//         value: i,
//         text: states[i]
//     }));
// }
  if (Object.keys(states).length > 0) {
                $(".product_name").append($('<option></option>').val(0).html('Select a Product'));
             }
          $.each(states, function (i, state) {
            $(".product_name").append($('<option></option>').val(state.product_name+'-'+state.products_model).html(state.product_name+'-'+state.products_model));
           });;
      }
  });
  }
 $('#supplier_id').on('click change', function (e) {
  var data = {
      value: $('#supplier_id').val()
   };
  data[csrfName] = csrfHash;
  $.ajax({
      type:'POST',
      data: data,
      //dataType tells jQuery to expect JSON response
      dataType:"json",
      url:'<?php echo base_url();?>Cinvoice/getvendor_products',
      success: function(data) {
      
   
        // empty your dropdown 
        console.log(data);
        $('.product_name').empty();
          $(".product_name").append($('<option></option>').val(0).html('Select a Product'));
         $.each(data, function($index, $value) {
            $('.product_name').append($("<option></option>").val($value.product_name+'-'+$value.product_model).html($value.product_name+'-'+$value.product_model));
        });

           
             
        
      }
  });
});

// $('#supplier_id').change(function(e)
$( document ).ready(function() 
{
    var data = {
      
        value:$('#supplier_id').val()
    };
    data[csrfName] = csrfHash;

    $.ajax({
        type:'POST',
        data: data, 
       dataType:"json",
        url:'<?php echo base_url();?>Cpurchase/getsupplier_data',
        success: function(result, statut) {

console.log(result);

            if(result.csrfName){
               csrfName = result.csrfName;
               csrfHash = result.csrfHash;
            }
            // $('#vendor_add').val(result[0]['address']+'\n'+result[0]['primaryemail']+'\n'+result[0]['businessphone']);
            $('#vendor_add').val(result[0]['address']+'-'+result[0]['city']+'\n'+result[0]['state']+"-"+result[0]['zip']+"-"+result[0]['country']+'\n'+result[0]['primaryemail']+"-"+result[0]['businessphone']       );

        }
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
     $('#bank_id').change(function(){
       localStorage.setItem("selected_bank_name",$('#bank_id').val());

     });

       $('#paypls').on('click', function (e) {
  $('#amount_to_pay').val($('#balance').val());
       $('#payment_modal').modal('show');
     e.preventDefault();
   
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
        var gt=$('#vendor_gtotal').val();
        var amtpd=data.amt_paid;
        console.log(gt+"^"+amtpd);
        var bal= gt-amtpd;
var total= "<table class='table table-striped table-bordered'><tr><td rowspan='2' style='vertical-align: middle;text-align-last: center;'><b><?php  echo display("GRAND TOTAL");?> :  <?php  echo $currency;  ?>"+$('#vendor_gtotal').val()+"<b></td><td class='td' style='border-right: hidden;'><b><?php echo display("total")." ".display("Amount Paid") ?>:<b></td><td><?php  echo $currency;  ?>"+data.amt_paid+"</td></tr></tr><td class='td' style='border-right: hidden;'><b><?php echo display("balance");  ?> :<b></td><td><?php  echo $currency;  ?>"+bal +"</td></tr></table>"
        var table_header = "<table class='table table-striped table-bordered'><thead style='FONT-WEIGHT:BOLD;'><tr><td>S.NO</td><td><?php  echo display("payment_date");?></td><td><?php  echo display("Reference No");?></td><td><?php  echo display("bank_name");?></td><td><?php  echo display("Amount Paid");?></td><td><?php  echo display("balance");?></td><td><?php  echo display("details");?></td></tr></thead><tbody>";
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
    $("#bodyModal1").html("<?php echo display('Payment Successfully Completed');?>");
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
        var gt=$('#vendor_gtotal').val();
        var amtpd=data.amt_paid;
        console.log(data);
        var bal= $('#vendor_gtotal').val() - data.amt_paid;
 $('#balance').val(bal);
   $('#amount_paid').val(amtpd);

      }
    });
      $('#add_payment_info')[0].reset();
      }

   });
   event.preventDefault();
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
        $('#bank').selectmenu();
        $('#bank').append(result).selectmenu('refresh',true);
       $("#bodyModal1").html("<?php echo display('Bank Added Successfully');?>");
       $('#myModal1').modal('show');
       $('#add_bank_info').modal('hide');
    //    $('.bank').(show);
       $('#bank').show();
        // .bank(show);
       window.setTimeout(function(){
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

   $(document).ready(function () {
   
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
   $("body").on("focus", ".product_name", function() {

   var tid=$(this).closest('tr').find('.product_name').attr('id');
const indexLast = tid.lastIndexOf('_');
var id = tid.slice(indexLast + 1);
  $('#prodt_'+id).val('');
});
       
$(document).ready(function(){   
   // $('#payment_modal').modal("show");
     $('#product_tax').on('change', function (e) {
   
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
 $('#vendor_gtotal').val(custo_final);  
var bal_amt=custo_final-$('#amount_paid').val();
$('#balance').val(bal_amt);
 });
});







$('#custocurrency_rate').on('change textInput input', function (e) {
    calculate();
});

$('.common_qnt').on('change textInput input', function (e) {
    calculate();
});

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

 $(this).closest('table').find('#Total_'+idt).val(sum.toFixed(3));

  var sum_net=0;

 $('#normalinvoice_'+idt  +  '> tbody > tr').find('.net_sq_ft').each(function() {
var v=$(this).val();
  sum_net += parseFloat(v);

});

 $(this).closest('table').find('#overall_net_'+idt).val(sum_net.toFixed(3));
  var sum_gross=0;

 $('#normalinvoice_'+idt  +  '> tbody > tr').find('.gross_sq_ft ').each(function() {
var v=$(this).val();
  sum_gross += parseFloat(v);

});
 $(this).closest('table').find('#overall_gross_'+idt).val(sum_gross.toFixed(3));
   var sum_weight=0;

 $('#normalinvoice_'+idt  +  '> tbody > tr').find('.weight').each(function() {
var v=$(this).val();
  sum_weight += parseFloat(v);

});

 $(this).closest('table').find('#overall_weight_'+idt).val(sum_weight.toFixed(3));
    

    });
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
 
   answer = isNaN(answer) ? 0 : answer;
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
$('#vendor_gtotal').val(custo_final);
var bal_amt=custo_final-$('#amount_paid').val();
$('#balance').val(bal_amt);
}  
}
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

$('#Over_all_Total').val(overall_sum).trigger('change');
$('#Total_'+idt).val(sum);
var first=$("#Over_all_Total").val();
    var tax= $('#product_tax').val();

var field = tax.split('-');

var percent = field[1];
var answer=0;
  var answer =(parseInt(percent) / 100) * parseInt(first);
 
   answer = isNaN(answer) ? 0 : answer;
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
$('#vendor_gtotal').val(custo_final);
var bal_amt=custo_final-$('#amount_paid').val();
$('#balance').val(bal_amt);


});
    
        var table_count= $("table.normalinvoice").length;
          let dynamic_id=table_count+1;
    function addbundle(){
         $(this).closest('table').find('.addbundle').css("display","none");
      $(this).closest('table').find('.removebundle').css("display","block");

var newdiv = document.createElement('div');
var tabin="crate_wrap_"+dynamic_id;

newdiv = document.createElement("div");


newdiv.innerHTML ='<table class="table table-bordered normalinvoice table-hover" id="normalinvoice_'+ dynamic_id +'"> <thead> <tr> <th rowspan="2" class="text-center" style="width:180px;" ><?php echo display('product_name'); ?><i class="text-danger">*</i>  &nbsp;&nbsp; </th> <th rowspan="2" style="width:60px;" class="text-center"><?php echo display('Bundle No');?><i class="text-danger">*</i></th> <th rowspan="2"  class="text-center"><?php echo  display('description'); ?></th> <th rowspan="2" style="width:60px;" class="text-center"><?php echo display('Thick ness');?><i class="text-danger">*</i></th> <th rowspan="2" class="text-center"><?php echo display('Supplier Block No');?><i class="text-danger">*</i></th>  <th rowspan="2" class="text-center" ><?php echo display('Supplier Slab No');?><i class="text-danger">*</i> </th> <th colspan="2" style="width:150px;" class="text-center"><?php echo display('Gross Measurement');?><i class="text-danger">*</i> </th> <th rowspan="2" class="text-center"><?php echo display('Gross Sq.Ft');?></th>  <th rowspan="2" style="width:40px;" class="text-center"><?php echo display('Slab No');?><i class="text-danger">*</i></th> <th colspan="2" style="width:150px;" class="text-center"><?php echo display('Net Measure');?><i class="text-danger">*</i></th> <th rowspan="2" style="width:100px;" class="text-center"><?php echo display('Net Sq.Ft');?></th> <th rowspan="2"  style="width:100px;" class="text-center"><?php echo display('Cost per Sq.Ft');?></th> <th rowspan="2"  style="width:100px;" class="text-center"><?php echo display('Cost per Slab');?></th> <th rowspan="2"  style="width:100px;" class="text-center"><?php echo display('sales'); ?><br/><?php echo display('Price per Sq.Ft');?></th> <th rowspan="2"  style="width:100px;" class="text-center"><?php echo display('Sales Slab Price');?></th> <th rowspan="2" class="text-center"><?php echo display('Weight');?></th> <th rowspan="2" class="text-center"><?php echo display('Origin');?></th>  <th rowspan="2" style="width: 130px" class="text-center"><?php  echo  display('total'); ?></th> <th rowspan="2" class="text-center"><?php  echo  display('action'); ?></th> </tr>  <tr> <th class="text-center"><?php echo display('Width');?></th> <th class="text-center"><?php echo display('Height');?></th> <th class="text-center"><?php echo display('Width');?></th> <th class="text-center"><?php echo display('Height');?></th> </tr>  </thead> <tbody id="addPurchaseItem_'+ dynamic_id +'"> <tr> <input type="hidden" name="tableid[]" id="tableid_'+ dynamic_id +'"/> <td> <input list="magicHouses" name="prodt[]" id="prodt_'+ dynamic_id +'"  class="form-control product_name" placeholder="Search Product" style="width:140px;">  <datalist id="magicHouses"> <option value="Select the Product" selected>Select the Product</option> <?php  foreach($products as $tx){?>  <option value="<?php echo $tx["product_name"]."-".$tx["product_model"];?>">  <?php echo $tx["product_name"]."-".$tx["product_model"];  ?></option> <?php } ?> </datalist> <input type="hidden" class="common_product autocomplete_hidden_value  product_id_'+ dynamic_id +'" name="product_id[]" id="SchoolHiddenId_'+ dynamic_id +'" /> </td> <td> <input type="text" id="bundle_no__'+ dynamic_id +'" name="bundle_no[]" required="" class="bundle_no form-control" /> </td> <td> <input type="text" id="description_'+ dynamic_id +'" name="description[]" class="form-control" /> </td>  <td > <input type="text" name="thickness[]" id="thickness_'+ dynamic_id +'" required="" class="form-control"/> </td> <td> <input type="text" id="supplier_b_no_'+ dynamic_id +'" name="supplier_block_no[]" required="" class="form-control" /> </td>  <td > <input type="text"  id="supplier_s_no_'+ dynamic_id +'" name="supplier_slab_no[]" required="" class="form-control"/> </td> <td> <input type="text" id="gross_width_'+ dynamic_id +'" name="gross_width[]" required="" class="gross_width  form-control" /> </td> <td> <input type="text" id="gross_height_'+ dynamic_id +'" name="gross_height[]"  required="" class="gross_height form-control" /> </td>  <td > <input type="text"   style="width:60px;" readonly id="gross_sq_ft_'+ dynamic_id +'" name="gross_sq_ft[]" class="gross_sq_ft form-control"/> </td>   <td style="text-align:center;" >  <input type="text"   style="width:20px;" value="1" class="slab_no" id="slab_no_'+ dynamic_id +'" name="slab_no[]"   readonly  required=""/>  </td> <td> <input type="text" id="net_width_'+ dynamic_id +'" name="net_width[]" required="" class="net_width form-control" /> </td> <td> <input type="text" id="net_height_'+ dynamic_id +'" name="net_height[]"    required="" class="net_height form-control" /> </td> <td > <input type="text"   style="width:60px;" readonly id="net_sq_ft_'+ dynamic_id +'" name="net_sq_ft[]" class="net_sq_ft form-control"/> </td> <td>   <span class="input-symbol-euro"><input type="text" id="cost_sq_ft_'+ dynamic_id +'"  name="cost_sq_ft[]" readonly  style="width:60px;" value="0.00"  class="cost_sq_ft form-control" ></span>   <td >  <span class="input-symbol-euro"> <input type="text"  id="cost_sq_slab_'+ dynamic_id +'" name="cost_sq_slab[]" readonly   style="width:60px;" value="0.00"  class="form-control"/></span>     </td> <td>  <span class="input-symbol-euro">  <input type="text" id="sales_amt_sq_ft_'+ dynamic_id +'"  name="sales_amt_sq_ft[]"  style="width:60px;"  value="0.00" class="sales_amt_sq_ft form-control" /></span>     </td>  <td >  <span class="input-symbol-euro">   <input type="text"  id="sales_slab_amt_'+ dynamic_id +'" name="sales_slab_amt[]"  style="width:60px;" value="0.00"  class="sales_slab_amt form-control"/></td> </span>     </td> <td> <input type="text" id="weight_'+ dynamic_id +'" name="weight[]"  style="width:50px;" class="weight form-control" /> </td>  <td > <input type="text"  id="origin_'+ dynamic_id +'" name="origin[]" class="form-control"/> </td>  <td > <span class="input-symbol-euro"><input  type="text" class="total_price form-control" style="width:60px;" readonly value="0.00"  id="total_amt_'+ dynamic_id +'"     name="total_amt[]"/></span> </td>   <td style="text-align:center;"> <button  class="delete btn btn-danger" type="button" value="Delete" ><i class="fa fa-trash"></i></button> </td>  </tr> </tbody> <tfoot> <tr> <td style="text-align:right;" colspan="8"><b>Gross Sq.Ft :</b></td> <td > <input type="text" id="overall_gross_'+ dynamic_id +'" name="overall_gross[]"   class="form-control" style="width: 60px"  readonly="readonly"  /> </td> <td style="text-align:right;" colspan="3"><b>Net Sq.Ft :</b></td> <td > <input type="text" id="overall_net_'+ dynamic_id +'" name="overall_net[]"  class="form-control"  style="width: 60px"  readonly="readonly"  /> </td> <td style="text-align:right;" colspan="4"><b>Weight :</b></td> <td ><input type="text" id="overall_weight_'+ dynamic_id +'" name="overall_weight[]"  class="overall_weight form-control"  style="width: 60px"  readonly="readonly"  />  </td> <td style="text-align:right;" colspan="1"><b>Total:</b></td> <td > <span class="input-symbol-euro">    <input type="text" id="Total_'+ dynamic_id +'" name="total[]"   class="b_total form-control"  style="width: 60px" value="0.00"  readonly="readonly"  /> </span> </td> <td  style="text-align:center;"><i id="buddle_'+ dynamic_id +'" onclick="removebundle(); " class="btn-danger removebundle fa fa-minus" aria-hidden="true"></i></td> </tr></foot></table>  <i id="buddle_1"  style="margin-right: 18px;float:right;color:white;background-color:#38469f;"   onclick="addbundle(); " class="addbundle fa fa-plus" aria-hidden="true"></i>';  




document.getElementById('content').appendChild(newdiv);
// document.getElementById(tabin).focus();
// document.getElementById("add_invoice_item").setAttribute("tabindex", tab5);
//  document.getElementById("add_purchase").setAttribute("tabindex", tab6);
// document.getElementById("add_purchase_another").setAttribute("tabindex", tab7);

dynamic_id++;



}
$(document).on('click', '.addbundle', function(){
         $(this).css("display","none");
      $(this).closest('table').find('.removebundle').css("display","block");
 });
 
 $(document).ready(function(){
   $('.removebundle').hide();
$('#amt').hide();
$('#bal').hide();
    });
 function calculate(){
 
  var first=$("#Over_all_Total").val();
  var tax= $('#product_tax').val();
var field = tax.split('-');

var percent = field[1];
var answer=0;
var answer = parseInt((percent / 100) * first);
var gtotal = parseInt(first + answer);
console.log(gtotal);
var final_g= $('#final_gtotal').val();


var amt=parseInt(final_g)+parseInt(first);
var num = isNaN(parseInt(amt)) ? 0 : parseInt(amt);
$("#gtotal").val(num);  
localStorage.setItem("customer_grand_amount_sale",num);

var custo_amt=$('#custocurrency_rate').val();

console.log(num +"-"+custo_amt);
var value=parseInt(num*custo_amt);
var custo_final = isNaN(parseInt(value)) ? 0 : parseInt(value)
$('#vendor_gtotal').val(custo_final);  
$('#balance').val(custo_final);

}


$('#Total').on('change textInput input', function (e) {
    calculate();
});

$('#custocurrency_rate').on('change textInput input', function (e) {
    calculate();
});
// function calculate(){
  
//   var first=$("#gtotal").val();
// var custo_amt=$('#custocurrency_rate').val();
// var value=parseInt(first*custo_amt);

// var custo_final = isNaN(parseInt(value)) ? 0 : parseInt(value)
// $('#vendor_gtotal').val(custo_final);  
// $('#balance').val(custo_final);
// }
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

gt(id);

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
    var sum_net=0;
      $(this).closest('table').find('.net_sq_ft').each(function() {
        var v=$(this).val();
       
    sum_net += parseFloat(v);
    
    sum_net = isNaN(sum_net) ? 0 : sum_net;
   
});
  var sum=0;
  var overall_sum=0;
     $(this).closest('table').find('.total_price').each(function() {
var v=$(this).val();
  sum += parseFloat(v);
  overall_sum +=parseFloat(v);
});

$('#Over_all_Total').val(overall_sum);
$('#Total_'+idt).val(sum);
$('#overall_net_'+idt).val(sum_net.toFixed(3));
//$('#total_net').val(overall_net.toFixed(3));


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
$(document).on('click', '.delete', function(){


 var tid=$(this).closest('table').attr('id');
localStorage.setItem("delete_table",tid);
console.log(localStorage.getItem("delete_table"));
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


localStorage.removeItem("delete_table");
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
 $('#vendor_gtotal').val(custo_final);  
var bal_amt=custo_final-$('#amount_paid').val();
$('#balance').val(bal_amt);

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
   </script>

<style>
        input {
    border: none;
    
 }
textarea:focus, input:focus{
   
    outline: none;
}
 .text-right {
    text-align: left; 
}
.form-control[disabled], .form-control[readonly], fieldset[disabled] .form-control {
        background-color:;
        border: ;
        }

        .ui-selectmenu-text{
            display:none;
        }
</style>


         




