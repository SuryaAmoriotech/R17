<?php error_reporting(1);  ?>


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
<div class="content-wrapper">
    <section class="content-header">
        <div class="header-icon">
            <i class="pe-7s-note2"></i>
        </div>
        <div class="header-title">
            <h1><?php echo display('Manage Ocean Export Invoice') ?></h1>
            <small></small>
            <ol class="breadcrumb">
            <li><a href="<?php   echo base_url(); ?>"><i class="pe-7s-home"></i> <?php echo display('home') ?></a></li>
                <li><a href="#"><?php echo display('Ocean Export') ?></a></li>
                <li class="active" style="color:orange;"><?php echo display('Manage Ocean Export Invoice') ?></li>
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

    <div class="alert alert-danger alert-dismissable" style="background-color:#38469f;color:white;font-weight:bold;">

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
    if(trim($split[0])=='sales' && $_SESSION['u_type'] ==3 && trim($split[1])=='1000'){
      
      
       ?>

<a href="<?php echo base_url('Cinvoice/ocean_export_tracking') ?>" class="btnclr btn btn-info m-b-5 m-r-2"><?php echo display('Create ocean export'); ?></a>
                    
                    <?php break;}} 
                    if($_SESSION['u_type'] ==2){ ?>

<a href="<?php echo base_url('Cinvoice/ocean_export_tracking') ?>" class="btnclr btn btn-info m-b-5 m-r-2"><?php echo display('Create ocean export') ?></a>

                        <?php  } ?>
















                        </div>
                        <div class="col-sm-4">
                     
                        <?php echo form_open_multipart('Cinvoice/manage_ocean_export_tracking',array('class' => 'form-vertical', 'id' => 'insert_sale','name' => 'insert_sale'))?>


<?php



$today = date('Y-m-d');

?>

<div class="form-group">

    <label class="" for="from_date"><?php echo display('Search By Date Range'); ?>:</label>

    <input type="text" name="daterange" style="padding: 5px;width: 180px;border-radius: 8px;"/>
    <input type="submit" id="btn-filter" class="btnclr btn btn-success" value=<?php echo display('Search') ?> >
   
</div> 
<?php echo form_close() ?>
                    </div>


                    <div class="col-sm-2">
                     
                     <?php echo form_open_multipart('Cinvoice/manage_ocean_export_tracking',array('class' => 'form-vertical', 'id' => 'insert_sale','name' => 'insert_sale'))?>


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
       <span class="glyphicon glyphicon-th-list"></span> <?php echo display('Download') ?>
     
    </button>
    <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
   
  
                
      <li><a href="#" onclick="generate()"> <img src="<?php echo base_url()?>assets/images/pdf.png" width="24px"> PDF</a></li>
      
      <li class="divider"></li> 		
                  
                  <li><a href="#" onclick="$('#ProfarmaInvList').tableExport({type:'excel',escape:'false'});"> <img src="<?php echo base_url()?>assets/images/xls.png" width="24px"> XLS</a></li>
                 
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
<div id="for_filter_by" class="for_filter_by" style="display: inline;"><label for="filter_by"><?php echo display('Filter By') ?>&nbsp;&nbsp;
                   </label><select id="filterby" style="border-radius:5px;height:25px;">
                  <option value="1"><?php echo display('ID') ?></option>
<option value="2"><?php echo display('Booking Number') ?></option>
<option value="3"><?php echo display('Container Number') ?></option>
<option value="4"><?php echo display('Seal Number') ?></option>
<option value="5"><?php echo display('Ocean Export ID') ?></option>
<option value="6"><?php echo display('Shipper') ?></option>
<option value="7"><?php echo display('Purchase Date') ?></option>
<option value="8"><?php echo display('Place of Delivery') ?></option>
<option value="9"><?php echo display('Notify Party') ?></option>
<option value="10"><?php echo display('Vessel') ?></option>
<option value="11"><?php echo display('Voyage No') ?></option>
<option value="12"><?php echo display('Freight Forwarder') ?></option>
<option value="13"><?php echo display('HBL No') ?></option>
<option value="14"><?php echo display('OBL No') ?></option>
<option value="15"><?php echo display('AMS No') ?></option>
<option value="16"><?php echo display('ISF No') ?></option>
<option value="17"><?php echo display('MBL No') ?></option>
<option value="18"><?php echo display('Port of discharge') ?></option>
<option value="19"><?php echo display('Customs Broker Name') ?></option>
<option value="20"><?php echo display('Estimated time of departure') ?></option>
<option value="21"><?php echo display('Customer / Consignee') ?></option>
<option value="22"><?php echo display('Port of loading') ?></option>
<option value="23"><?php echo display('Estimated Time of Arrival') ?></option>
<option value="24"><?php echo display('Remarks / Particulars') ?></option>
<option value="25"><?php echo display('Invoice Date') ?></option>

                  </select> <input id="filterinput" style="border-radius:5px;height:25px;" type="text" ></div>
        </div>
                        </div>
                      
                    </div>


                    <div class="sortableTable__container">
  <div class="sortableTable__discard">
  </div>


                    <div class="panel-body" style="padding-top: 0px;">
                    <div id="customers">
  <table class="table table-bordered" cellspacing="0" width="100%" id="ProfarmaInvList">
  <thead class="sortableTable">
      <tr style="background-color: #337ab7;border-color: #2e6da4;" class="sortableTable__header">
      <th class="1 value"  data-col="1" data-resizable-column-id="1"  style="width: 100px; height: 39.0114px;"   ><?php echo display('ID') ?></th>
        <th class="2 value"  data-col="2" data-resizable-column-id="2"    style="height: 45.0114px; width: 167.011px;"    ><?php echo display('Booking Number') ?></th>
        <th class="3 value" data-col="3" data-resizable-column-id="3"  style="height: 44.0114px; width: 193.011px;"     ><?php echo display('Container Number') ?></th>
        <th class="4 value"   data-col="4"  data-resizable-column-id="4"    style="width: 127.011px; height: 46.0114px;"   ><?php echo display('Seal Number') ?></th>
        <th class="5 value" data-col="5"  data-resizable-column-id="5"    style="width: 185.011px; height: 47.0114px;"   > <?php echo display('Ocean Export ID') ?></th>
         <th class="6 value"   data-col="6"data-resizable-column-id="6"  style="height: 42.0114px; width: 151.011px;"  ><?php echo display('Shipper') ?> </th>
		      <th class="7 value" data-col="7" data-resizable-column-id="7"   style="width: 129.011px;"    ><?php echo display('Purchase Date') ?></th>
	          <th class="8 value"  data-col="8"  data-resizable-column-id="8" style="height: 42.0114px; width: 171.011px;"       ><?php echo display('Place of Delivery') ?></th>


	          <th class="9 value"  data-col="9" data-resizable-column-id="9"  style="height: 42.0114px; width: 171.011px;"       ><?php echo display('Notify Party') ?></th>
	          <th class="10 value"  data-col="10" data-resizable-column-id="10"  style="height: 42.0114px; width: 171.011px;"       ><?php echo display('Vessel') ?></th>
	          <th class="11 value" data-col="11"data-resizable-column-id="11"    style="height: 42.0114px; width: 171.011px;"       ><?php echo display('Voyage No') ?></th>
	          <th class="12 value" data-col="12" data-resizable-column-id="12"   style="height: 42.0114px; width: 171.011px;"       ><?php echo display('Freight Forwarder') ?></th>
	          <th class="13 value"  data-col="13" data-resizable-column-id="13"  style="height: 42.0114px; width: 171.011px;"       ><?php echo display('HBL No') ?></th>
	          <th class="14 value" data-col="14" data-resizable-column-id="14"   style="height: 42.0114px; width: 171.011px;"       ><?php echo display('OBL No') ?></th>
	          <th class="15 value" data-col="15" data-resizable-column-id="15"   style="height: 42.0114px; width: 171.011px;"       ><?php echo display('AMS No') ?></th>
	          <th class="16 value" data-col="16" data-resizable-column-id="16"   style="height: 42.0114px; width: 171.011px;"       ><?php echo display('ISF No') ?></th>
	          <th class="17 value" data-col="17" data-resizable-column-id="17"   style="height: 42.0114px; width: 171.011px;"       ><?php echo display('MBL No') ?></th>


            <th class="18 value"  data-col="18" data-resizable-column-id="18"  style="height: 42.0114px; width: 171.011px;"       ><?php echo display('Port of discharge') ?></th>
	          <th class="19 value" data-col="19" data-resizable-column-id="19"   style="height: 42.0114px; width: 171.011px;"       ><?php echo display('Customs Broker Name') ?></th>
	          <th class="20 value" data-col="20" data-resizable-column-id="20"   style="height: 42.0114px; width: 171.011px;"       ><?php echo display('Estimated time of departure') ?></th>
	          <th class="21 value" data-col="21" data-resizable-column-id="21"   style="height: 42.0114px; width: 171.011px;"       ><?php echo display('Customer / Consignee') ?></th>
	          <th class="22 value" data-col="22" data-resizable-column-id="22"   style="height: 42.0114px; width: 171.011px;"       ><?php echo display('Port of loading') ?></th>


            <th class="23 value"  data-col="23" data-resizable-column-id="23"  style="height: 42.0114px; width: 171.011px;"       ><?php echo display('Estimated Time of Arrival') ?></th>
	          <th class="24 value" data-col="24" data-resizable-column-id="24"   style="height: 42.0114px; width: 171.011px;"       ><?php echo display('Remarks / Particulars') ?></th>
	          <th class="25 value" data-col="25" data-resizable-column-id="25"   style="height: 42.0114px; width: 171.011px;"       ><?php echo display('Invoice Date') ?></th>
            

     
      <div class="myButtonClass"> 
         <th class="text-center 26" data-column-id="26" data-formatter="commands" data-sortable="false" style="width: 700.011px; height: 45.0114px;"     ><?php echo display('Action') ?></th>
        </div>
      </tr>
    </thead>
    <tbody class="sortableTable__body">

     <?php
    $count=1;

    if(count($sale['rows'])>0){
        foreach($sale['rows'] as $k=>$arr){
          ?>
          <tr style="text-align:center"><td class="1" data-col="1"><?php  echo $count;  ?></td>
 <td class="2" data-col="2"><?php   echo $arr['booking_no'];  ?></td>
   <td class="3" data-col="3"><?php   echo $arr['container_no'];  ?></td>
   <td class="4" data-col="4"><?php   echo $arr['seal_no'];  ?></td>
<td class="5" data-col="5"><?php   echo $arr['ocean_export_tracking_id'];  ?></td>
  <td class="6" data-col="6"><?php   echo $arr['supplier_name'];  ?></td>
  <td class="7"data-col="7"><?php   echo $arr['invoice_date'];  ?></td>

  <td data-col="8" class="8"><?php   echo $arr['place_of_delivery'];  ?></td>


  <td class="9" data-col="9"><?php   echo $arr['notify_party'];  ?></td>
  <td class="10" data-col="10"><?php   echo $arr['vessel'];  ?></td>
  <td class="11" data-col="11"><?php   echo $arr['voyage_no'];  ?></td>
  <td class="12" data-col="12"><?php   echo $arr['freight_forwarder'];  ?></td>

  <td class="13 " data-col="13"><?php   echo $arr['hbl_no'];  ?></td>
  <td class="14 " data-col="14"><?php   echo $arr['obl_no'];  ?></td>
  <td class="15 " data-col="15"><?php   echo $arr['ams_no'];  ?></td>
  <td class="16 " data-col="16"><?php   echo $arr['isf_no'];  ?></td>
  <td class="17 " data-col="17"><?php   echo $arr['mbl_no'];  ?></td>

  <td class="18" data-col="18"><?php   echo $arr['port_of_discharge'];  ?></td>
  <td class="19" data-col="19"><?php   echo $arr['customs_broker_name'];  ?></td>
  <td class="20" data-col="20"><?php   echo $arr['etd'];  ?></td>
  <td class="21" data-col="21"><?php   echo $arr['consignee'];  ?></td>

  <td class="22  " data-col="22"><?php   echo $arr['port_of_loading'];  ?></td>
  <td class="23 " data-col="23"><?php   echo $arr['eta'];  ?></td>
  <td class="24 " data-col="24"><?php   echo $arr['particular'];  ?></td>
  <td class="25" data-col="25"><?php   echo $arr['invoice_date'];  ?></td>






   
   <div class="form-group">
  <td class="26" data-col="26">
  <a class="btnclr btn  btn-sm" style="background-color: #3ca5de; color: #fff;" href="<?php echo base_url()?>Cinvoice/ocean_export_tracking_details_data/<?php echo  $arr['ocean_export_tracking_id'];  ?>"><i class="fa fa-download" aria-hidden="true"></i></a>

<a class="btnclr btn  btn-sm" style="background-color: #3ca5de; color: #fff;"  data-toggle="modal" data-target="#emailmodal" onclick="oceanexportmail(<?php echo  $arr['ocean_export_tracking_id'];  ?>,'ocean_export_tracking','ocean_export_tracking_id')"><i class="fa fa-envelope" aria-hidden="true" ></i></a>








                    <?php    foreach(  $this->session->userdata('perm_data') as $test){
    $split=explode('-',$test);
    if(trim($split[0])=='sales' && $_SESSION['u_type'] ==3 && trim($split[1])=='0010'){
      
      
       ?>

<a class="btnclr btn  btn-sm" style="background-color: #3ca5de; color: #fff;" href="<?php echo base_url()?>Cinvoice/ocean_export_tracking_update_form/<?php echo  $arr['ocean_export_tracking_id'];  ?>"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                    
                    <?php break;}} 
                    if($_SESSION['u_type'] ==2){ ?>

<a class="btnclr btn  btn-sm" style="background-color: #3ca5de; color: #fff;" href="<?php echo base_url()?>Cinvoice/ocean_export_tracking_update_form/<?php echo  $arr['ocean_export_tracking_id'];  ?>"><i class="fa fa-pencil" aria-hidden="true"></i></a>

                        <?php  } ?>



 <a class="btnclr btn  btn-sm" style="background-color: #3ca5de; color: #fff;" href="<?php echo base_url()?>Cinvoice/ocean_export_tracking_delete_form/<?php echo  $arr['ocean_export_tracking_id'];  ?>"><i class="fa fa-trash-o" aria-hidden="true"></i></a>








</td>
  </div>

</tr>
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

<th colspan="5" class="text-right"><?php echo display('total') ?>:</th>



<th></th>  

<th></th> 

            </tfoot>-->
  </table>
      </div>
        </div>       
                    </div>
                </div>
            </div>
            <input type="hidden" value="Sale/OceanExportTrucking" id="url"/>
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
                    <div class="modal-content_colSwitch" style="width:25%;height:60%;">
                          <span class="close_colSwitch">&times;</span>
                          <div class="col-sm-6"><br><br>
                          <div class="form-group row">
                          <input type="checkbox"  data-control-column="1" checked = "checked" class="1" value="1" /><?php echo display('ID') ?><br>

<input type="checkbox"  data-control-column="2" checked = "checked" class="2" value="2"/><?php echo display('Booking Number') ?><br>

<input type="checkbox"  data-control-column="3" checked = "checked" class="3" value="3"/><?php echo display('Container Number') ?><br>

<input type="checkbox"  data-control-column="4" checked = "checked" class="4" value="4"/><?php echo display('Seal Number') ?><br>

<input type="checkbox"  data-control-column="5" checked = "checked" class="5" value="5"/><?php echo display('Ocean Export ID') ?><br>

<input type="checkbox"  data-control-column="6" checked = "checked" class="6" value="6"/><?php echo display('Shipper') ?><br>

<input type="checkbox"  data-control-column="7" checked = "checked" class="7" value="7"/><?php echo display('Purchase Date') ?><br>

<input type="checkbox"  data-control-column="8" checked = "checked" class="8" value="8"/><?php echo display('Place of Delivery') ?><br>

<input type="checkbox"  data-control-column="9" checked = "checked" class="9" value="9"/><?php echo display('Notify Party') ?><br>
<input type="checkbox"  data-control-column="10" checked = "checked" class="10" value="10"/><?php echo display('Vessel') ?><br>
<input type="checkbox"  data-control-column="11" checked = "checked" class="11" value="11"/><?php echo display('Voyage No') ?><br>
<input type="checkbox"  data-control-column="12" checked = "checked" class="12 " value="12 " /> <?php echo display('Freight forwarder ') ?><br>
<input type="checkbox"  data-control-column="13" checked = "checked" class="13" value="13"/><?php echo display('HBL NO') ?><br>
<input type="checkbox"  data-control-column="14" checked = "checked" class="14" value="14"/><?php echo display('OBL NO') ?><br>



        </div>
        </div>
        <div class="col-sm-6">
                          <div class="form-group row">
                          

                          <input type="checkbox"  data-control-column="15" checked = "checked" class="15" value="15"/><?php echo display('AMS NO') ?><br>
<input type="checkbox"  data-control-column="16" checked = "checked" class="16" value="16"/><?php echo display('ISF NO') ?><br>
<input type="checkbox"  data-control-column="17" checked = "checked" class="17" value="17"/><?php echo display('MBL NO') ?><br>

<input type="checkbox"  data-control-column="18"  class="18" value="18"/><?php echo display('Port of discharge') ?><br>
<input type="checkbox"  data-control-column="19"  class="19" value="19"/><?php echo display('Customs Broker Name') ?><br>
<input type="checkbox"  data-control-column="20"  class="20" value="20"/><?php echo display('Estimated time of departure') ?><br>
<input type="checkbox"  data-control-column="21"  class="21" value="21"/><?php echo display('Customer / Consignee') ?><br>
<input type="checkbox"  data-control-column="22"  class="22 " value="22 "/><?php echo display('Port of loading ') ?><br>

<input type="checkbox"  data-control-column="23" class="23" value="23"/><?php echo display('Estimated Time of Arrival') ?><br>
<input type="checkbox"  data-control-column="24"  class="24" value="24"/><?php echo display('Remarks / Particulars') ?><br>



<input type="checkbox"  data-control-column="25"  class="25" value="25"/><?php echo display('Invoice Date') ?><br>



<input type="checkbox"  data-control-column="26" checked = "checked" class="26"value="26" /><?php echo display('Action') ?><br>
        </div>
        </div>
                         


<!--<input type="submit" value="submit" id="submit"/>-->
                     
                    </div>
                </div>





                            

                        </div>

                       



                        <input type ="hidden" name="csrf_test_name" id="csrf_test_name" value="<?php echo $this->security->get_csrf_hash();?>">

                </div>

             <!--   <input type="hidden" id="total_invoice" value="<?php //echo $total_invoice;?>" name="">

                 <input type="hidden" id="currency" value="{currency}" name="">-->

            </div>
        </div>
       

    </section>

</div>
<script type="text/javascript" src="<?php echo base_url()?>my-assets/js/profarma.js"></script>
<script>
 $(document).on('keyup', '#filterinput', function(){
  
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
     if(menu=='Sale' && submenu=='OceanExportTrucking'){
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
        if( $('.'+s[i]))
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

