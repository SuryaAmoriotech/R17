<?php  error_reporting(1);?>
<script src="<?php echo base_url()?>my-assets/js/admin_js/oceanImport.js" type="text/javascript"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css"/>
  <script type="text/javascript" src="<?php echo base_url()?>assets/js/drag_drop_index_table.js"></script>
  <script type="text/javascript" src="<?php echo base_url()?>assets/js/jquery.base64.js"></script>
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






  <div class="content-wrapper">
    <section class="content-header">
        <div class="header-icon">
            <i class="pe-7s-note2"></i>
        </div>
        <div class="header-title">
            <h1><?php echo display('manage_purchase') ?></h1>
            <small><?php //echo display('manage_your_purchase') ?></small>
            <ol class="breadcrumb">
              <li><a href="<?php   echo base_url(); ?>"><i class="pe-7s-home"></i> <?php echo display('home') ?></a></li>
                <li><a href="#"><?php echo display('purchase') ?></a></li>
                <li class="active" style="color:orange;"><?php echo display('manage_purchase') ?></li>
            </ol>
        </div>
    </section>

    <section class="content">
  
         <!-- Alert Message -->

         <?php

$message = $this->session->userdata('show');

if (isset($message)) {

    ?>

    <div class="alert alert-info alert-dismissable" style="background-color:#38469f;color:white;font-weight:bold;">

        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>

        <?php echo $message; ?>                    

    </div>

    <?php

    // $this->session->unset_userdata('message');

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
                

      <!-- Alert Message -->
        <?php
             $message = $this->session->userdata('alert');
            if (isset($message)) {
        ?>
          
  <script type="text/javascript">
      $(window).on('load', function() {
          $('#myModal').modal('show');
      });
  </script>
       
         <?php } 
  
         ?>
        
                
  
  
        
          <div class="panel panel-default">

      
      

                    <div class="panel-body">
                       
     

                    
          
       
<!-- //88888888888888888888888888888888888888888888888888888 -->


        




                          <div class="row">
                               <div class="col-sm-3">



                              
                
                     



                      <?php   foreach(  $this->session->userdata('perm_data') as $test){
   $split=explode('-',$test);
    if(trim($split[0])=='expenses' && $_SESSION['u_type'] ==3 && trim($split[1])=='1000'){
      
      
       ?>

<a href="<?php echo base_url('Cpurchase') ?>" class="btnclr btn btn-info m-b-5 m-r-2"><?php  echo  display('Create Expense');?></a>
                    
                    <?php break;}} 
                    if($_SESSION['u_type'] ==2){ ?>

<a href="<?php  echo base_url('Cpurchase') ?>" class="btnclr btn btn-info m-b-5 m-r-2"><?php  echo  display('Create Expense');?></a>

                        <?php  } ?>











                      <a href="<?php echo base_url('Cpurchase/add_csv_product') ?>" class="btnclr btn btn-primary m-b-5 m-r-2 text-white"><i class="ti-plus"> </i> &nbsp;  <?php  echo  display('Add Invoice (CSV)'); ?> </a>
          
                          </div>
                 
                          <div class="col-sm-4">
                       
                          <!-- <?php //echo form_open_multipart('Cpurchase/manage_purchase',array('class' => 'form-vertical', 'id' => 'insert_sale','name' => 'insert_sale'))?>
  
  
  <?php
  
  
  
  $today = date('Y-m-d');
  
  ?>
  
  <div class="form-group">
  
      <label class="" for="from_date"><?php  //echo  display('Search By Date Range');?> :</label>
  
      <input type="text" name="daterange" style="padding: 5px;width: 180px;border-radius: 8px;"/>
      <input type="submit" id="btn-filter" class="btnclr btn btn-success" value="<?php // echo  display('search')?>"/>
  </div> 
  <?php //echo form_close() ?> -->
                      </div>

                      <div class="col-sm-3">
                       
                       <!-- <?php //echo form_open_multipart('Cpurchase/manage_purchase',array('class' => 'form-vertical', 'id' => 'insert_sale','name' => 'insert_sale'))?>


<?php



$today = date('Y-m-d');

?>

<div class="form-group">
<button type="submit"  style="border: none;
    color: black;
    border-radius: 30px;" >
 <i class="fa fa-refresh" style="font-size:20px;float:right;" aria-hidden="true"></i> 
</button>


</div>  
<?php// echo form_close() ?> -->
                   </div>


                      <div class="col-sm-2">
                      <i class="fa fa-cog"  aria-hidden="true" id="myBtn" style="font-size:25px;" onClick="columnSwitchMODAL()"></i> <!-- onclick opens MODAL -->
                      <div class="dropdown bootcol" id="drop" style="float:right;padding-right:20px;padding-bottom:10px;">
      <button class="btnclr btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
         <span class="glyphicon glyphicon-th-list"></span> <?php echo display('download'); ?>
       
      </button>
      <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
     
    
                  
        <li><a href="#" onclick="generate()"> <img src="<?php echo base_url()?>assets/images/pdf.png" width="24px"> <?php echo display('pdf'); ?></a></li>
        
        <li class="divider"></li> 		
                    
                    <li><a href="#" onclick="$('#ProfarmaInvList').tableExport({type:'excel',escape:'false'});"> <img src="<?php echo base_url()?>assets/images/xls.png" width="24px"><?php echo display('XLS'); ?></a></li>
                   
      </ul>
    </div>
  
    </div>  
         </div>
              
           </div>
         </div>
     
  
                   <!-- Manage Purchase report -->
      <div class="row">
          <div class="col-sm-12">
              <div class="panel panel-bd lobidrag">
                  <div class="panel-heading">
                      <div class="panel-title">
                           <div class="row">
<div id="for_filter_by" class="for_filter_by" style="display: inline;"><label for="filter_by"><?php echo  display('Filter By');?>&nbsp;&nbsp;
                   </label><select id="filterby" style="border-radius:5px;height:25px;">
                  <option value="1"><?php echo display('ID')?></option>
<option value="2"><?php echo display('Invoice No')?></option>
<option value="3"><?php echo display('purchase_id')?></option>
<option value="4"><?php echo display('Container Number')?></option>
<option value="5"><?php echo display('purchase_date')?></option>
<option value="6"><?php echo display('Estimated Time of Arrival')?></option>
<option value="7"><?php echo display('Estimated Time of Departure')?></option>
<option value="8"><?php echo display('Bl Number')?></option>
<option value="9"><?php echo display('Payment Terms')?></option>
<option value="10"><?php echo display('Port of Discharge')?></option>
<option value="11"><?php echo display('Overall Gross')?></option>
<option value="12"><?php echo display('Overall Net')?></option>
<option value="13"><?php echo display('Amount Paid')?></option>
<option value="14"><?php echo display('total_amount')?></option>
<option value="15"><?php echo display('Service Provider ID')?></option>
<option value="16"><?php echo display('Service Provider Name')?></option>
<option value="17"><?php echo display('Bill Number')?></option>
<option value="18"><?php echo display('Bill Date')?></option>
<option value="19"><?php echo display('Provider Total')?></option>
<option value="20"><?php echo display('Service Provider Address')?></option>
<option value="21"><?php echo display('Due Date')?></option>









                  </select> <input id="filterinput" style="border-radius:5px;height:25px;" type="text"></div>
        </div>
                      </div>
                    
                  </div>
                  <div class="panel-body" style="padding-top: 0px;">
                  <div class="sortableTable__container">
  <div class="sortableTable__discard">
  </div>
                      <div class="table-responsive">
                          <table class="table table-striped table-bordered" cellspacing="0" width="100%" id="ProfarmaInvList"> 
                 <thead class="sortableTable">
      <tr style="background-color: #337AB7;border-color: #2E6DA4;" class="sortableTable__header">
        <th data-col="1" class="1 value" name="ID" data-control-column="1"><?php echo display('ID')?></th>
          <th data-col="2" class="2 value" name="InvoiceNo " data-control-column="2"><?php echo display('Invoice No')?></th>
          <th data-col="3" class="3 value" name="Purchase" data-control-column="3" style="height: 39.0114px; width: 150.011px;"><?php echo display('purchase_id')?></th>
              <th data-col="4" class="4 value" name="ContainerNo" data-control-column="4"><?php echo display('Container Number')?></th>
              <th data-col="5" class="5 value" name="PurchaseDate" data-control-column="5" style="width: 200.011px; height: 43.0114px;"><?php echo display('purchase_date')?></th>
               <th data-col="6" data-control-column="6 " name="EstimatedTimeofArrival" class="6 value" style="width: 253.011px;" ><?php echo display('Estimated Time of Arrival')?></th>
              <th data-col="7"data-control-column="7 "name="EstimatedTimeofDeparture" class="7 value" style="width: 253.011px;" ><?php echo display('Estimated Time of Departure')?></th>
                <th data-col="8" class="8 value" data-control-column="8"name="BlNumber" ><?php echo display('Bl Number')?></th>
                  <th data-col="9" class="9 value"data-control-column="9" style="width: 100.011px;" name="PaymentTerms"><?php echo display('Payment Terms')?></th>
                    <th   data-col="10"class="10 value" data-control-column="10" name="PortofDischarge"><?php echo display('Port of Discharge')?></th>
               
                      <th data-col="11" class="11 value"data-control-column="11"  style="width:100px;" name="OverallGross"><?php echo display('Overall Gross')?></th>
                        <th data-col="12" class="12 value" data-control-column="12" style="width:100px;" name="OverallNet"><?php echo display('Overall Net')?></th>
                          <th data-col="13" class="13 value"data-control-column="13" style="width: 250.011px;"name="AmountPaid" ><?php echo display('Amount Paid')?></th>
                          
          <th data-col="14" class="14 value" style="width: 199.011px; height: 37.0114px;"data-control-column="14"name="TotalAmount"><?php echo display('total_amount')?></th>
          <th data-col="15" class="15 value" data-control-column="15" style="width:100px;" name="Service Provider ID"><?php echo display('Service Provider ID')?></th>
                          <th data-col="16" class="16 value"data-control-column="16" style="width: 250.011px;"name="Service Provider Name" ><?php echo display('Service Provider Name')?></th>
                          
          <th data-col="17" class="17 value" style="width: 199.011px; height: 37.0114px;"data-control-column="17"name="Service Provider Address"><?php echo display('Service Provider Address')?></th>
          <th data-col="18" class="18 value" data-control-column="18" style="width:100px;" name="Service Payment Term"> <?php echo display('Payment Terms')?></th>
                          <th data-col="19" class="19 value"data-control-column="19" style="width: 250.011px;"name="Bill Number" ><?php echo display('Bill Number')?></th>
                          
          <th data-col="20" class="20 value" style="width: 199.011px; height: 37.0114px;"data-control-column="20"name="TotalAmount"><?php echo display('Bill Date')?></th>
          <th data-col="21" class="21 value" data-control-column="21" style="width:100px;" name="OverallNet">Due Date</th>
                          <th data-col="22" class="22 value"data-control-column="22" style="width: 250.011px;"name="AmountPaid" ><?php echo display('Provider Total')?></th>
        <div class="myButtonClass">
           <th class="text-center 23 value" data-col="23" style="width:380px;" data-formatter="commands" data-sortable="false" name="Action"><?php echo display('action')?></th>
          </div>
        </tr>
      </thead>
                 <tbody class="sortableTable__body">
                  <?php
                //  print_r($allinfo);
      $count=1;
   if(count($allinfo)>0){
          foreach($allinfo[0] as $arr){
          //  print_r($arr);
            ?>
            <tr style="text-align:center"><td data-col="1" class="1"><?php  echo $count;  ?></td>
        <td data-col="2" class="2"><?php if(!empty($arr['chalan_no'])) { echo $arr['chalan_no'];}else{echo "N/A";}  ?></td>
   <td data-col="3" class="3"><?php   if(!empty($arr['purchase_id'])) { echo $arr['purchase_id'];}else{echo "N/A";}    ?></td>
   <td data-col="4" class="4"><?php   if(!empty($arr['container_no'])) { echo $arr['container_no'];}else{echo "N/A";}  ?></td>
     <td data-col="5"  class="5"><?php  if(!empty($arr['purchase_date'])) { echo $arr['purchase_date'];}else{echo "N/A";}      ?></td>
        <td data-col="6" class="6"><?php    if(!empty($arr['eta'])) { echo $arr['eta'];}else{echo "N/A";}   ?></td>
   <td data-col="7" class="7"><?php    if(!empty($arr['eta'])) { echo $arr['eta'];}else{echo "N/A";}   ?></td>
   <td data-col="8" class="8"> <?php  if(!empty($arr['bl_number'])) { echo $arr['bl_number'];}else{echo "N/A";}     ?></td>
     <td data-col="9" class="9"><?php    if(!empty($arr['payment_terms'])) { echo $arr['payment_terms'];}else{echo "N/A";}  ?></td>
           <td data-col="10 " class="10"><?php  if(!empty($arr['Port_of_discharge'])) { echo $arr['Port_of_discharge'];}else{echo "N/A";}   ?></td> 
      <td data-col="11" class="11"><?php     if(!empty($arr['total_gross'])) { echo $arr['total_gross'];}else{echo "N/A";}   ?></td>
      <td data-col="12" class="12"><?php   if(!empty($arr['total_net'])) { echo $arr['total_net'];}else{echo "N/A";}      ?></td>
      <td data-col="13" class="13"><?php   if(!empty($arr['paid_amount'])) { echo $currency." ".$arr['paid_amount'];}else{echo "N/A";}      ?></td>
      <!-- <td data-col="Due Amount"><?php    if(!empty($arr['balance'])) { echo $currency." ".$arr['balance'];}else{echo "N/A";}       ?></td> -->
      <td data-col="14" class="14"><?php  if(!empty($arr['grand_total_amount'])) { echo $currency." ".$arr['grand_total_amount'];}else{echo "N/A";}        ?></td>

      <td data-col="15" class="15"><?php   if(!empty($arr['serviceprovider_id'])) { echo $arr['serviceprovider_id'];}else{echo "N/A";}   ?></td>
        <td data-col="16" class="16"><?php  if(!empty($arr['account_name'])) { echo $arr['account_name'];}else{echo "N/A";}  ?></td>
          <td data-col="17" class="17"><?php  if(!empty($arr['sp_address'])) { echo $arr['sp_address'];}else{echo "N/A";}  ?></td> 
           <td data-col="18" class="18"><?php  if(!empty($arr['payment_terms'])) { echo $arr['payment_terms'];}else{echo "N/A";}     ?></td> 
           <td data-col="19" class="19"><?php  if(!empty($arr['bill_number'])) { echo $arr['bill_number'];}else{echo "N/A";}   ?></td>
          <td data-col="20" class="20"><?php   if(!empty($arr['bill_date'])) { echo $arr['bill_date'];}else{echo "N/A";}    ?></td>
           <td data-col="21" class="21"><?php   if(!empty($arr['due_date'])) { echo $arr['due_date'];}else{echo "N/A";}   ?></td>
               <td data-col="22" class="22"><?php   if(!empty($arr['total_price'])) { echo $arr['total_price'];}else{echo "N/A";}   ?></td>
      <td data-col="23" class="23">
      <?php   if(!empty($arr['purchase_id'])) { ?> <a href="<?php echo base_url()?>Payment_Gateway/Welcome/index/<?php echo  $arr['purchase_id'];  ?>" class="btnclr btn btn-sm" data-toggle="tooltip" data-placement="left" title="Payment"><i class="fa fa-credit-card"></i></a> <?php  } ?>
  
     <!-- <a href="<?php //echo base_url()?>Cpurchase/purchase_details_data/<?php echo  $arr['purchase_id'];  ?>"  class="btnclr btn btn-success btn-sm" data-toggle="tooltip" data-placement="left" title="" data-original-title="Expenses Details"><i class="fa fa-download" aria-hidden="true"></i></a> -->
   
   
     
 




<?php   foreach(  $this->session->userdata('perm_data') as $test){
   $split=explode('-',$test);
    if(trim($split[0])=='expenses' && $_SESSION['u_type'] ==3 && trim($split[1])=='0010'){
      
      
       ?>

<a class="btnclr btn btn-success btn-sm"   href="<?php if(!empty($arr['purchase_id'])) 
      { 
        echo base_url()?>Cpurchase/purchase_update_form/<?php echo  $arr['purchase_id']; }else{
           echo base_url()?>Cpurchase/serviceprovider_update_form/<?php echo  $arr['serviceprovider_id'];

      } ?>"><i class="fa fa-pencil" aria-hidden="true"></i></a>



                    
                    <?php break;}} 
                    if($_SESSION['u_type'] ==2){ ?>

<a class="btnclr btn btn-success btn-sm"   href="<?php if(!empty($arr['purchase_id'])) 
      { 
        echo base_url()?>Cpurchase/purchase_update_form/<?php echo  $arr['purchase_id']; }else{
           echo base_url()?>Cpurchase/serviceprovider_update_form/<?php echo  $arr['serviceprovider_id'];

      } ?>"><i class="fa fa-pencil" aria-hidden="true"></i></a>




                        <?php  } ?>






      <a class="btnclr btn  btn-sm"   href="<?php if(!empty($arr['purchase_id'])) 
      { 
        echo base_url()?>Cpurchase/purchase_delete_form/<?php echo  $arr['purchase_id']; }else{
           echo base_url()?>Cpurchase/servicepro_delete_data/<?php echo  $arr['serviceprovider_id'];

      } ?>"><i class="fa fa-trash-o" aria-hidden="true"></i></a>  










       <a class="btnclr btn btn-success btn-sm"   href="<?php if(!empty($arr['purchase_id'])) 
      { 
        echo base_url()?>Cpurchase/purchase_details_data/<?php echo  $arr['purchase_id']; }else{
           echo base_url()?>Cpurchase/servicepro_details_data/<?php echo  $arr['serviceprovider_id'];

      } ?>"><i class="fa fa-download" aria-hidden="true"></i></a>  
    
    






















    
    </td></tr>
       <?php
  $count++;
  } }  else{
      ?>
       <tr><td colspan="15" style="text-align:center;font-weight:bold;"><?php  echo "No Records Found"  ;?></td></tr>
      <?php
            }
  ?>
                  </tbody>
                  <tfoot>

                     </tfoot>
		                    </table>
		                </div>
          </div>
		            </div>
		        </div>
		    </div>
		      <input type="hidden" id="total_purchase_no" value="<?php echo $total_purhcase;?>" name="">
		      <input type="hidden" id="currency" value="{currency}" name="">
		</div>


<!-- Manage Purchase End -->
<script src="<?php echo base_url()?>assets/js/jquery.bootgrid.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.5/jspdf.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.0.0-alpha.1/jspdf.plugin.autotable.js"></script>




    <!-- The Modal Column Switch -->
            <div id="myModal_colSwitch" class="modal_colSwitch">
                    <div class="modal-content_colSwitch" style="width:25%;height:350px;">
                          <span class="close_colSwitch">&times;</span>
                          <div class="col-sm-6"><br><br>
                          <div class="form-group row">
      <input type="checkbox"  data-control-column="1" checked = "checked"  class=" 1" value="1"/> <?php echo display('ID')?><br>
<input type="checkbox"  data-control-column="2" checked = "checked" class=" 2"  value="2"/><?php echo display('Invoice No')?><br>
    <input type="checkbox"  data-control-column="3" checked = "checked"  class=" 3" value="3"/><?php echo display('purchase_id')?><br>
<input type="checkbox"  data-control-column="4" checked = "checked" class="4" value="4"/><?php echo display('Container Number')?><br>
<input type="checkbox"  data-control-column="5" checked = "checked" class="5" value="5"/><?php echo display('purchase_date')?><br>
<input type="checkbox"  data-control-column="6" checked = "checked" class="6" value="6"/><?php echo display('Estimated Time of Arrival')?><br>
<input type="checkbox"  data-control-column="7" checked = "checked" class="7" value="7"/><?php echo display('Estimated Time of Departure')?><br>
<input type="checkbox"  data-control-column="8"  class="8" value="8"/><?php echo display('Bl Number')?><br>
<input type="checkbox"  data-control-column="9"  class="9" value="9"/><?php echo display('Payment Terms')?><br>
<input type="checkbox"  data-control-column="10"   class="10" value="10"/><?php echo display('Port of Discharge')?><br>
        
  <input type="checkbox"  data-control-column="11" checked = "checked" class="11" value="11"/><?php echo display('Overall Gross')?><br>
          </div>
          </div>
          <div class="col-sm-6">
                          <div class="form-group row">

 <input type="checkbox"  data-control-column="12" checked = "checked" class="12" value="12"/><?php echo display('Overall Net')?><br>
  <input type="checkbox"  data-control-column="13" checked = "checked" class="13" value="13"/><?php echo display('Amount Paid')?><br>
<input type="checkbox"  data-control-column="14"  class="14" value="14"/><?php echo display('total_amount')?><<br>

<input type="checkbox"  data-control-column="15"  class="15" value="15"/><?php echo display('Service Provider ID')?><br>
<input type="checkbox"  data-control-column="16"   class="16" value="16"/><?php echo display('Service Provider Name')?><br>
        
  <input type="checkbox"  data-control-column="17" checked = "checked" class="17" value="17"/><?php echo display('Service Provider Address')?><br>
 <input type="checkbox"  data-control-column="18" checked = "checked" class="18" value="18"/><?php echo display('Payment Terms')?><br>
  <input type="checkbox"  data-control-column="19" checked = "checked" class="19" value="19"/><?php echo display('Bill Number')?><br>
<input type="checkbox"  data-control-column="20"  class="20" value="20"/><?php echo display('Bill Date')?><br>
<input type="checkbox"  data-control-column="21" checked = "checked" class="21" value="21"/><?php echo display('Due Date')?><br>
<input type="checkbox"  data-control-column="22"  class="22" value="22"/><?php echo display('Provider Total')?><br>
  <input type="checkbox"  data-control-column="23" checked = "checked" class="23" value="23"/><?php echo display('action')?><br>
          </div>
          </div>
    
     <!--      <input type="submit" value="submit" id="submit"/>-->    
                    </div>
                </div>





                            

                       
 
                       



                  

                

                <input type="hidden" id="total_invoice" value="<?php echo $total_invoice;?>" name="">

                 <input type="hidden" id="currency" value="{currency}" name="">

            </div>

        </div>


  </section>
  
</div>



                
  <style>
 

 

   #select2-po-container{
    display:none;
   }

.main-footer {
 display:none;
}
textarea:focus, input:focus{
   
    outline: none;
}
 .text-right {
    text-align: left; 
}

.content {
    min-height: 20px;
    /* margin-right: auto; */
    /* margin-left: auto; */
    /* padding: 0 30px 10px; */
}

.simpleTab .tab-content{float:right;font-family:'cairo',serif;text-align: right;}
.simpleTab .tab-wrapper li{float:left;font-family:'cairo',serif;}
.simpleTab.verti .tab-wrapper{float:right}
.simpleTab.verti .tab-content{float:right}
.com-tab-title{overflow:hidden;border-bottom:2px solid #fb4834}
.com-tab-title h3{color:#fff;font-family:lato,Sans-Serif;font-size:13px;font-weight:bold;text-transform:uppercase;line-height:32px;position:relative;overflow:hidden}
.com-tab-title h3 span{line-height:32px;background:#fb4834;position:relative;padding:8px 10px;border-top-right-radius:1px;border-top-left-radius:1px;border-bottom-left-radius:0;border-bottom-right-radius:1px}
.com-tab-title h3 span:before{font-family:FontAwesome;font-style:normal;font-weight:normal;font-size:15px;color:#fff}
.com-tab.simpleTab .tab-content{background-color:transparent;margin-top:20px;float:none!important}
.com-tab.simpleTab{border:1px solid #eee;padding:15px;margin-top:22px!important;background-color:#fff;margin:0}
.com-tab .simpleTab .tab-wrapper li{display:inline-block;margin:0;padding:0}
.com-tab .simpleTab .tab-wrapper li a{font-family:Oswald,open sans,sans-serif,arial;font-weight:400;font-size:13px;background-color:dimgrey;color:#FFF;padding:10px 25px!important;display:block}
.com-tab.simpleTab .tab-wrapper li:before{content:'';display:none}
.com-tab.simpleTab .tab-wrapper li a.activeTab{background-color:#666;color:#fff}
.com-tab.simpleTab .tab-wrapper li{display:inline-block}
.com-tab.simpleTab .tab-wrapper li a{font-family:'Archivo Narrow',Sans-Serif;font-size:13px;font-weight:600;background-color:#eee;color:dimgrey;padding:0 10px;display:block;line-height:30px;text-transform:uppercase}
.simpleTab .tab-wrapper li{display:inline-block;margin:0;padding:0}
.simpleTab .tab-wrapper li a{background-color:dimgrey;color:#FFF;padding:10px 25px;display:block}
.simpleTab .tab-wrapper li:before{display:none}
.simpleTab{margin:10px 0}
.simpleTab .tab-content{padding:15px;background-color:#f2f2f2;width:100%;}
.simpleTab .tab-wrapper li a.activeTab{background: -webkit-linear-gradient(90deg, hsla(210, 90%, 80%, 1) 0%, hsla(212, 93%, 49%, 1) 100%);color:#fff}
.simpleTab{transition:all 0 ease;-webkit-transition:all 0 ease;-moz-transition:all 0 ease;-o-transition:all 0 ease}
.simpleTab.verti .tab-wrapper{width:30%;margin:0!important;padding:0!important}
.simpleTab .tab-wrapper{padding:0!important;margin:0!important}
.simpleTab.verti .tab-content{width:60%;}
.simpleTab.verti .tab-wrapper li{width:100%;display:block;text-align:center}
.simpleTab.verti .tab-wrapper li a{padding:10px 0}
.simpleTab.verti{overflow:hidden}
</style>
<script type="text/javascript" src="<?php echo base_url()?>my-assets/js/profarma.js"></script>
<input type="hidden" value="Purchase/PurchaseOrder" id="url"/>
<input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
<script>
 $(document).on('keyup', '#filterinput', function(){
  debugger;
    var value = $(this).val().toLowerCase();
    var filter=$("#filterby").val();
    $("#ProfarmaInvList tr:not(:eq(0))").filter(function() {
        $(this).toggle($(this).find("td."+filter).text().toLowerCase().indexOf(value) > -1)
    });
});
</script>
<script>

    var csrfName = '<?php echo $this->security->get_csrf_token_name();?>';
var csrfHash = '<?php echo $this->security->get_csrf_hash();?>';
$editor = $('#submit'),
  $editor.on('click', function(e) {
    if (this.checkValidity && !this.checkValidity()) return;
    e.preventDefault();
    var yourArray = [];
    //loop through all checkboxes which is checked
    $('.modal-content_colSwitch input[type=checkbox]:not(:checked)').each(function() {
      yourArray.push($(this).val());//push value in array
    });
   
    values = {
    
      extralist_text: yourArray
    
    };
    console.log(values)
    var json=values;
    var data = {
        page:$('#url').val(),
          content: yourArray
       
       };
       data[csrfName] = csrfHash;
$.ajax({
	
    type: "POST",  
    url:'<?php echo base_url();?>Cinvoice/setting',
   
    data: data,
    dataType: "json", 
    success: function(data) {
        if(data) {
           console.log(data);
        }
    }  
});
  });

  $( document ).ready(function() {
   var page=$('#url').val();
   page=page.split('/');
    var data = {
        'menu':page[0],
        'submenu':page[1]
         
       
       };
      console.log(page[0]+"-"+page[1]);
       data[csrfName] = csrfHash;
    $.ajax({
	
    type: "POST",  
    url:'<?php echo base_url();?>Cinvoice/get_setting',
   
    data: data,
    dataType: "json", 
    success: function(data) {
     var menu=data.menu;
     var submenu=data.submenu;
     if(menu=='Purchase' && submenu=='PurchaseOrder'){
     var s=data.setting;
s=JSON.parse(s);
console.log(s);
for (var i = 0; i < s.length; i++) {
    console.log(s[i]);
    $('td.'+s[i]).hide(); // hide the column header th
    $('th.'+s[i]).hide();
$('tr').each(function(){
     $(this).find('td:eq('+$('td.'+s[i]).index()+')').hide();
});
    }
    for (var i = 0; i < s.length; i++) {
       // if( $('.'+s[i]))
  $('.'+s[i]).prop('checked', false); //check the box from the array, note: you need to add a class to your checkbox group to only select the checkboxes, right now it selects all input elements that have the values in the array 
    }  
}
    }
});


});



$("input:checkbox:not(:checked)").each(function() {
    var column = "table ." + $(this).attr("value");
    $(column).hide();
});

$("input:checkbox").click(function(){
    var column = "table ." + $(this).attr("value");
    $(column).toggle();
});



    </script>




