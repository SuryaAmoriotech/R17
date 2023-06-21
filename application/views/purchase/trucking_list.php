<?php error_reporting(1);  ?>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css"/>
  <script type="text/javascript" src="<?php echo base_url()?>assets/js/drag_drop_index_table.js"></script>
 <script src="
https://cdn.jsdelivr.net/npm/jquery-base64-js@1.0.1/jquery.base64.min.js
"></script>
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
	        <h1><?php echo display('Road Transport');?></h1>
	        <small><?php //echo display('manage_your_purchase') ?></small>
	        <ol class="breadcrumb">
            <li><a href="<?php   echo base_url(); ?>"><i class="pe-7s-home"></i> <?php echo display('home') ?></a></li>
	            <li><a href="#"><?php echo display('purchase') ?></a></li>
	            <li class="active" style="color:orange;"><?php echo display('Manage Road Transport');?></li>
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
                




			
				<div class="panel panel-default">
                    <div class="panel-body"> 
                        <div class="row">
                        <div class="col-sm-4">
                           
                        
                


   



    <?php    foreach(  $this->session->userdata('perm_data') as $test){
    $split=explode('-',$test);
    if(trim($split[0])=='expenses' && $_SESSION['u_type'] ==3 && trim($split[1])=='1000'){
      
      
       ?>

<a href="<?php echo base_url('Ccpurchase/trucking') ?>" class="btnclr btn btn-info m-b-5 m-r-2"><?php echo display('Create Road Transport');?></a>
                    
                    <?php break;}} 
                    if($_SESSION['u_type'] ==2){ ?>

<a href="<?php echo base_url('Ccpurchase/trucking') ?>" class="btnclr btn btn-info m-b-5 m-r-2"><?php echo display('Create Road Transport');?></a>

                        <?php  } ?>


















                        </div>
                        <div class="col-sm-5">
                     
                        <?php echo form_open_multipart('Cpurchase/manage_trucking',array('class' => 'form-vertical', 'id' => 'insert_sale','name' => 'insert_sale'))?>


<?php



$today = date('Y-m-d');

?>

<div class="form-group">

    <label class="" for="from_date"><?php echo display('Search By Date Range') ?> :</label>

    <input type="text" name="daterange" style="padding: 5px;width: 180px;border-radius: 8px;"/>
    <input type="submit" id="btn-filter" class="btnclr btn btn-success" value="<?php echo display('search') ?>"/>
</div> 
<?php echo form_close() ?>
                    </div>

                    <div class="col-sm-1">
                     
                     <?php echo form_open_multipart('Cpurchase/manage_trucking',array('class' => 'form-vertical', 'id' => 'insert_sale','name' => 'insert_sale'))?>


<?php



$today = date('Y-m-d');

?>

<button type="submit"  style="border: none;
    color: black;
    border-radius: 30px;" >
 <i class="fa fa-refresh" style="font-size:20px;float:right;" aria-hidden="true"></i> 
</button>
<?php echo form_close() ?>
                 </div>

                    <div class="col-sm-2">
                    <i class="fa fa-cog"  aria-hidden="true" id="myBtn" style="font-size:25px;" onClick="columnSwitchMODAL()"></i> <!-- onclick opens MODAL -->
                    <div class="dropdown bootcol" id="drop" style="float:right;padding-right:20px;padding-bottom:10px;">
    <button class="btnclr btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
       <span class="glyphicon glyphicon-th-list"></span><?php echo display('download') ?>
     
    </button>
    <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
   
  
                
      <li><a href="#" onclick="generate()"> <img src="<?php echo base_url()?>assets/images/pdf.png" width="24px"> <?php echo display('pdf') ?></a></li>
      
      <li class="divider"></li> 		
                  
                  <li><a href="#" onclick="$('#ProfarmaInvList').tableExport({type:'excel',escape:'false'});"> <img src="<?php echo base_url()?>assets/images/xls.png" width="24px"><?php echo display('XLS') ?></a></li>
                 
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
<option value="2"><?php echo display('Trucking ID') ?></option>
<option value="3"><?php echo display('Container/Goods Pickupdate') ?></option>
<option value="4"><?php echo display('Delivery date') ?></option>
<option value="5"><?php  echo display('Trucking Company');?></option>
<option value="6"><?php  echo  display('Bill to');?></option>
<option value="7"><?php  echo  display('Invoice Date');?></option>
<option value="8"><?php echo display('Container Number') ?></option>
<option value="9"><?php echo display('Shipment / BL Number');?></option>
<option value="10"><?php  echo display('TAX DETAILS');?></option>
<option value="11"><?php  echo display('GRAND TOTAL');?></option>
<option value="12"><?php  echo display('GRAND TOTAL').display('Preferred Currency');?></option>
<option value="13"><?php  echo display('Amount Paid');?></option>
<option value="14"><?php echo display('balance_ammount');  ?></option>

                  </select> <input id="filterinput" style="border-radius:5px;height:25px;" type="text" ></div>
        </div>
                        </div>
                      
                    </div>





                    <div class="panel-body" style="padding-top: 0px;">
                    <div class="sortableTable__container">
  <div class="sortableTable__discard">
  </div>
                    <div id="customers">
  <table class="table table-bordered" cellspacing="0" width="100%" id="ProfarmaInvList">
  <thead class="sortableTable">
      <tr style="background-color: #337ab7;border-color: #2e6da4;" class="sortableTable__header">
      <th data-col="1" data-control-column="1"class="1 value" name="ID" style="width: 100px; height: 37.0114px;"><?php echo display('ID')?></th>
        <th data-col="2"data-control-column="2"class="2 value"name="TruckingID"  style="height: 47.0114px; width: 204.011px;"><?php echo display('Trucking ID') ?></th>
        <th data-col="3"data-control-column="3"class="3 value" name="ContainerPickUpDate" style="width: 245.011px; height: 47.0114px;"><?php echo display('Container/Goods Pickupdate') ?></th>
        <th data-col="4"data-control-column="4" class="4 value" name="DeliveryDate"style="width: 138.011px; height: 42.0114px;"><?php echo display('Delivery date') ?></th>
        <th data-col="5"data-control-column="5" class="5 value"name="ShipmentCompany" style="width: 209.011px; height: 44.0114px;"><?php  echo display('Trucking Company');?></th>
         <th data-col="6" data-control-column="6"class="6 value" name="BillTo"style="width: 126.011px; height: 45.0114px;"><?php  echo  display('Bill to');?></th>
         <th data-col="7" data-control-column="7"class="7 value" name="InvoiceDate"style="width: 135.011px; height: 44.0114px;"><?php  echo  display('Invoice Date');?></th>
         <!-- <th data-col="Total Amount"data-control-column="8"class="Total Amount value"  style="width: 135.011px; height: 42.0114px;">Total Amount</th> -->


         <th data-col="8"data-control-column="8"class="8 value"name="ContainerNumber"  style="height: 47.0114px; width: 204.011px;"><?php echo display('Container Number') ?></th>
        <th data-col="9"data-control-column="9"class="9 value"name="Shipment/BLNumber"  style="width: 245.011px; height: 47.0114px;"><?php echo display('Shipment / BL Number');?></th>
        <!-- <th data-col="Description"data-control-column="11" class="Description value" style="width: 138.011px; height: 42.0114px;">Quantity</th>
        <th data-col="Quantity"data-control-column="11" class="Quantity value" style="width: 138.011px; height: 42.0114px;">Description</th>
        <th data-col="Rate"data-control-column="12" class="Rate value" style="width: 209.011px; height: 44.0114px;">Rate</th>
         <th data-col="Pro No / Reference" data-control-column="13"class="Pro No / Reference value" style="width: 126.011px; height: 45.0114px;">Pro No / Reference</th> -->
         <th data-col="10" data-control-column="10"class="10 value"name="TaxDetails" style="width: 135.011px; height: 44.0114px;"><?php  echo display('TAX DETAILS');?></th>
         <th data-col="11"data-control-column="11"class="11 value" name="GrandTotal" style="width: 135.011px; height: 42.0114px;"><?php  echo display('GRAND TOTAL');?></th>
        <th data-col="12"data-control-column="12"class="12 value" name="GrandTotal(Preferred Currency)" style="width: 245.011px; height: 47.0114px;"><?php  echo display('GRAND TOTAL').display('Preferred Currency');?></th>
        <th data-col="13"data-control-column="13" class="13 value"name="AmountPaid" style="width: 138.011px; height: 42.0114px;"><?php  echo display('Amount Paid');?></th>
        <th data-col="14"data-control-column="14" class="14 value" name="BalanceAmount"style="width: 209.011px; height: 44.0114px;"><?php echo display('balance_ammount');  ?></th>
         <!-- <th data-col="Remarks" data-control-column="16"class="Remarks value" style="width: 126.011px; height: 45.0114px;">Remarks</th> -->
         
         <th data-control-column="15"class="15"  data-column-id="action" data-formatter="commands"name="Action" data-sortable="false" style="width: 134.011px;"><?php echo display('action');  ?></th>



        
      </tr>
    </thead>
    <tbody class="sortableTable__body">

     <?php
    $count=1;

    if(count($truck['rows'])>0){
        foreach($truck['rows'] as $k=>$arr){
    
          ?>
<tr style="text-align:center"><td data-col="1" class="1"><?php  echo $count;  ?></td>
 <td data-col="2" class="2"><?php   echo $arr['trucking_id'];  ?></td>
   <td data-col="3" class="3"><?php   echo $arr['container_pickup_date'];  ?></td>
   <td data-col="4" class="4"><?php   echo $arr['delivery_date'];  ?></td>
<td data-col="5" class="5"><?php   echo $arr['shipment_company'];  ?></td>
  <td data-col="6" class="6"><?php   echo $arr['customer_name'];  ?></td>
  <td data-col="7" class="7"><?php   echo $arr['invoice_date'];  ?></td>
  <!-- <td data-col="Total Amount"><?php  // echo $currency." ".$arr['grand_total_amount'];  ?></td> -->

  <td data-col="8" class="8"><?php   echo $arr['container_no'];  ?></td>
   <td data-col="9" class="9"><?php   echo $arr['shipment_number'];  ?></td>
   <!-- <td data-col="Quantity"><?php   echo $arr['qty'];  ?></td>
   <td data-col="Description"><?php   echo $arr['description'];  ?></td>
<td data-col="Rate"><?php   echo $arr['rate'];  ?></td>
  <td data-col="Pro No / Reference"><?php   echo $arr['pro_no_reference'];  ?></td> -->
  <td data-col="10" class="10"><?php   echo $currency." ".$arr['tax'];  ?></td>
  <td data-col="11" class="11"><?php  echo $currency." ".$arr['grand_total_amount'];  ?></td>
  <td data-col="12" class="12"><?php   echo $currency." ". $arr['customer_gtotal'];  ?></td>
  <td data-col="13" class="13"><?php   echo $currency." ".$arr['amt_paid'];  ?></td>
  <td data-col="14" class="14"><?php   echo $currency." ".$arr['balance'];  ?></td>
  <!-- <td data-col="Remarks"><?php   $arr['remarks'];  ?></td> -->
  <!-- <td><a class="btn btn-success btn-sm" style="background-color: #3ca5de;" href="<?php echo base_url()?>Cinvoice/trucking_update_form/<?php echo  $arr['purchase_order_id'];  ?>"><i class="fa fa-pencil" aria-hidden="true"></i></a></td></tr> -->

  <div class="form-group" >
  <td data-col="15" class="15">
  <a class="btnclr btn  btn-sm" style="background-color: #3ca5de; color: #fff;" href="<?php echo base_url()?>Ccpurchase/trucking_details_data/<?php echo  $arr['trucking_id'];  ?>"><i class="fa fa-download" aria-hidden="true"></i></a>



 





<?php    foreach(  $this->session->userdata('perm_data') as $test){
    $split=explode('-',$test);
    if(trim($split[0])=='expenses' && $_SESSION['u_type'] ==3 && trim($split[1])=='0010'){
      
      
       ?>

<a class="btnclr btn  btn-sm" style="background-color: #3ca5de; color: #fff;" href="<?php echo base_url()?>Ccpurchase/trucking_update_form/<?php echo  $arr['trucking_id'];  ?>"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                    
                    <?php break;}} 
                    if($_SESSION['u_type'] ==2){ ?>

<a class="btnclr btn  btn-sm" style="background-color: #3ca5de; color: #fff;" href="<?php echo base_url()?>Ccpurchase/trucking_update_form/<?php echo  $arr['trucking_id'];  ?>"><i class="fa fa-pencil" aria-hidden="true"></i></a>
<a class="btnclr btn  btn-sm" style="background-color: #3ca5de; color: #fff;" href="<?php echo base_url()?>Ccpurchase/trucking_delete_form/<?php echo  $arr['trucking_id'];  ?>"><i class="fa fa-trash-o" aria-hidden="true"></i></a>

                        <?php  } ?>






</td>
  </div>

     <?php   
$count++;
     
              
                
} }  else{
    ?>
     <tr><td colspan="8" style="text-align:center;font-weight:bold;"><?php  echo "No Records Found"  ;?></td></tr>
    <?php
          }

?>
  
    </tbody>
    <!--
    <tfoot>

<th colspan="5" class="text-right"><?php //echo display('total') ?>:</th>



<th></th>  

<th></th> 

            </tfoot>-->
        </div>
  </table>
      </div>
                       
                    </div>
                </div>
            </div>
              <input type="hidden" id="total_purchase_no" value="<?php echo $total_purhcase;?>" name="">
              <input type="hidden" id="currency" value="{currency}" name="">
        </div>
		</div>
    </section>

<!-- Manage Purchase End -->
<script src="<?php echo base_url()?>assets/js/jquery.bootgrid.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.5/jspdf.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.0.0-alpha.1/jspdf.plugin.autotable.js"></script>





    <!-- The Modal Column Switch -->
            <div id="myModal_colSwitch" class="modal_colSwitch">
                    <div class="modal-content_colSwitch" style="width:25%;height:40%;">
                          <span class="close_colSwitch">&times;</span>
                          <div class="col-sm-6"><br><br>
                            <div class="form-group row">
                            <input type="checkbox"  data-control-column="1" checked = "checked" class=" 1" value="1"/> <?php echo display('ID')?><br>

<input type="checkbox"  data-control-column="2" checked = "checked" class="2" value="2"/><?php echo display('Trucking ID') ?><br>
<input type="checkbox"  data-control-column="3" checked = "checked" class="3" value="3"/><?php echo display('Container/Goods Pickupdate') ?><br>
<input type="checkbox"  data-control-column="4" checked = "checked" class="4" value="4"/><?php echo display('Delivery date') ?><br>
<input type="checkbox"  data-control-column="5" checked = "checked" class="5" value="5"/><?php  echo display('Trucking Company');?><br>
<input type="checkbox"  data-control-column="6" checked = "checked" class="6" value="6"/><?php  echo  display('Bill to');?><br>
<input type="checkbox"  data-control-column="7" checked = "checked" class="7" value="7"/><?php  echo  display('Invoice Date');?><br>
<!-- <input type="checkbox"  data-control-column="8" checked = "checked" class="opt Total Amount" value="Total Amount"/>Total Amount<br> -->

<input type="checkbox"  data-control-column="8"  class=" 8 " value="8 "/><?php echo display('Container Number') ?> <br>
<input type="checkbox"  data-control-column="9"  class=" 9" value="9"/><?php echo display('Shipment / BL Number');?><br>
        </div>
        </div>
        <div class="col-sm-6">
                            <div class="form-group row">  
                             

<input type="checkbox"  data-control-column="10"  class=" 10" value="10"/><?php  echo display('TAX DETAILS');?><br>
<input type="checkbox"  data-control-column="11" class=" 11" value="11"/><?php  echo display('GRAND TOTAL');?><br>
<input type="checkbox"  data-control-column="12"  class=" 12" value="12"/><?php  echo display('GRAND TOTAL').display('Preferred Currency');?><br>
<input type="checkbox"  data-control-column="13"  class=" 13" value="13"/><?php  echo display('Amount Paid');?><br>
<input type="checkbox"  data-control-column="14" class="14" value="14"/><?php echo display('balance_ammount');  ?><br>
<!-- <input type="checkbox"  data-control-column="26"  class="opt Remarks" value="Remarks"/>Remarks<br> -->
<input type="checkbox"  data-control-column="15" checked = "checked" class=" 15" value="15"/><?php echo display('amount');  ?><br>
     <!--      <input type="submit" value="submit" id="submit"/>-->         
                            </div>
        </div>
  
                    </div>
                </div>
                        </div>
                </div>

             <!--   <input type="hidden" id="total_invoice" value="<?php //echo $total_invoice;?>" name="">

                 <input type="hidden" id="currency" value="{currency}" name="">-->

            </div>

        </div>

    </section>

</div>
<script type="text/javascript" src="<?php echo base_url()?>my-assets/js/profarma.js"></script>
<input type="hidden" value="Purchase/Trucking" id="url"/>
<input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
<script>
 $(document).on('keyup', '#filterinput', function(){
  //debugger;
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
     if(menu=='Purchase' && submenu=='Trucking'){
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

















