<?php error_reporting(1);  ?>


<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script> -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css"/>
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
<script type="text/javascript" src="http://www.bacubacu.com/colresizable/js/colResizable-1.5.min.js"></script> 
<script type="text/javascript" src="<?php echo base_url()?>assets/js/drag_drop_index_table.js"></script>

<div class="content-wrapper">

       <section class="content-header">

        <div class="header-icon">

            <i class="pe-7s-note2"></i>

        </div>

        <div class="header-title">

            <h1><?php echo display('manage_customer')  ?></h1>

            <small><?php // echo display('manage_customer') ?></small>

            <ol class="breadcrumb">

                <li><a href="#"><i class="pe-7s-home"></i> <?php echo display('home') ?></a></li>

                <li><a href="#"><?php echo display('customer') ?></a></li>

                <li class="active" style="color:orange;"><?php echo display('manage_customer') ?></li>

            </ol>

        </div>

    </section>



    <section class="content">



        <!-- Alert Message -->

        <?php

        $message = $this->session->userdata('message');

        if (isset($message)) {

            ?>

            <div class="alert alert-info alert-dismissable" style="background-color:#38469f;color:white;font-weight:bold;">

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



         




        <!-- Manage Product report -->


     

         

<div class="row">
                <div class="panel panel-bd lobidrag">

                    <div class="panel-heading" style="height: 60px;">
            <div class="col-sm-12">
   <div class="col-sm-10">

    <?php    foreach(  $this->session->userdata('perm_data') as $test){
    $split=explode('-',$test);
    if(trim($split[0])=='customer' && $_SESSION['u_type'] ==3 && trim($split[1])=='1000'){
      
      
       ?>

<a href="<?php echo base_url('Ccustomer') ?>" class="btnclr btn  m-b-5 m-r-2"><i class="ti-plus"> </i> <?php echo display('add_customer') ?> </a>
                    
                    <?php break;}} 
                    if($_SESSION['u_type'] ==2){ ?>

<a href="<?php echo base_url('Ccustomer') ?>" class="btnclr btn  m-b-5 m-r-2"><i class="ti-plus"> </i> <?php echo display('add_customer') ?> </a>

                        <?php  } ?>


                     <button type="button" class="btnclr btn  m-b-5 m-r-2" data-toggle="modal" data-target="#Customer_modal"><?php echo display('customer_csv_upload')?></button>




                    <a href="<?php echo base_url('Ccustomer/credit_customer') ?>" class="btnclr btn  m-b-5 m-r-2"><i class="ti-align-justify"> </i>  <?php echo display('credit_customer') ?> </a>



                    <a href="<?php echo base_url('Ccustomer/paid_customer') ?>" class="btnclr btn  m-b-5 m-r-2"><i class="ti-align-justify"> </i>  <?php echo display('paid_customer') ?> </a>
                    <a onclick="reload();"  >  <i class="fa fa-refresh" style="font-size:25px;float:right;" aria-hidden="true"></i> </a>

  
                  </div>

                           <div class="col-sm-2">


                    <i class="fa fa-cog"  aria-hidden="true" id="myBtn" style="font-size:25px;" onClick="columnSwitchMODAL()"></i> <!-- onclick opens MODAL -->
                   
                    <div class="dropdown bootcol" id="drop" style="float:right;padding-right:20px;padding-bottom:10px;">
    <button class="btnclr btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
       <span class="glyphicon glyphicon-th-list"></span> <?php  echo  display('download')?>
     
    </button>







    <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
   
  
                
      <li><a href="#" onclick="generate()"> <img src="<?php echo base_url()?>assets/images/pdf.png" width="24px"> <?php  echo  display('PDF')?></a></li>
      
      <li class="divider"></li>         
                  
      <li><a href="#" onclick="$('#ProfarmaInvList').tableExport({type:'excel',escape:'false'});"> <img src="<?php echo base_url()?>assets/images/xls.png" width="24px"> <?php  echo  display('XLS')?></a></li>
                 
    </ul>

    &nbsp;
    <button type="button" style="float:right;"  class="btn btnclr dropdown-toggle"  onclick="printDiv('printableArea')"><?php echo display('print') ?></button>

  </div>

  </div>
    </div>

  </div>
        </div>
       
  </div>


        






        

        <!-- Manage Invoice report -->

        <div class="row">

            <div class="col-sm-12">

                <div class="panel panel-bd lobidrag">

                    <div class="panel-heading">
<div class="row">
<div id="for_filter_by" class="for_filter_by" style="display: inline;"><label for="filter_by"><?php echo display('Filter By')?>&nbsp;&nbsp;
                   </label><select id="filterby" style="border-radius:5px;height:25px;">
                  <option value="1"> <?php echo display('ID') ?></option>
<option value="2"><?php echo display('Company Name');?></option>
<option value="3"><?php  echo  display('Billing Address');?></option>
<option value="4"><?php  echo  display('Shipping Address');?></option>
<option value="5"><?php  echo  display('Business Phone');?></option>
<option value="6"><?php  echo  display('Primary Email');?></option>
<option value="7"><?php  echo  display('Mobile');?></option>
<option value="8"><?php echo display('Credit Limit');?></option>
<option value="9"><?php echo display('Customer Type');?></option>
<option value="10"><?php  echo  display('Secondary Email');?></option>
<option value="11"><?php  echo  display('Contact Person');?></option>
<option value="12"><?php  echo  display('Fax');?></option>
<option value="13"><?php  echo  display('Preferred currency');?></option>
<option value="14"><?php  echo  display('city');?></option>
<option value="15"><?php  echo  display('state');?></option>
<option value="16"><?php  echo  display('zip');?></option>
<option value="17"><?php  echo  display('country');?></option>
<option value="18"><?php echo display('Payment Terms');?></option>
<option value="19"><?php echo display('Sales Tax') ?></option>
<option value="20"><?php echo  display('Tax Rates')?></option>



                  </select> <input id="filterinput" style="border-radius:5px;height:25px;" type="text" ></div>
        </div>

                    </div>

                    <div class="panel-body">
                    <div class="sortableTable__container">

                    <div id="printableArea">


  <div class="sortableTable__discard">
  </div>
                    <div id="customers">
  <table class="table table-bordered" cellspacing="0" width="100%" id="ProfarmaInvList">
  <thead class="sortableTable">
      <tr style="background-color: #337ab7;border-color: #2e6da4;" class="sortableTable__header">
      <th class="1 value" data-control-column="1" data-col="1"   style="width: 80px; height: 40.0114px;" ><?php echo display('ID') ?></th>
        <th class="2 value" data-control-column="2" data-col="2" style="height: 45.0114px; width: 234.011px" ><?php echo display('Company Name');?></th>
        <th class="3  value" data-control-column="3" data-col=" 3 " style="height: 42.0114px;"   > <?php  echo  display('Billing Address');?> </th>
        <th class="4 value"  data-control-column="4" data-col="4" style="width: 248.011px;"        ><?php  echo  display('Shipping Address');?></th>
        <th class="5 value" data-control-column="5"   data-col="5" style="width: 198.011px;"       ><?php  echo  display('Business Phone');?></th>
        <th class="6 value" data-control-column="6"data-col="6" style="width: 190.011px; height: 44.0114px;"><?php  echo  display('Primary Email');?></th>
           <th class="7 value" data-control-column="7"   data-col="7" style="width: 198.011px;"       ><?php  echo  display('Mobile');?></th>
            <th class="8 value" data-control-column="8" data-col="8"   style="width: 198.011px;"       ><?php echo display('Credit Limit');?></th>
            <th class="9 value"  data-control-column="9" data-col="9" style="width: 248.011px;"        ><?php echo display('Customer Type');?></th>
        <th class="10 value" data-control-column="10"   data-col="10" style="width: 198.011px;"       ><?php  echo  display('Secondary Email');?></th>
        <th class="11 value" data-control-column="11"data-col="11" style="width: 190.011px; height: 44.0114px;"><?php  echo  display('Contact Person');?></th>
           <th class="12 value" data-control-column="12"   data-col="12" style="width: 198.011px;"       ><?php  echo  display('Fax');?></th>
            <th class="13 value" data-control-column="13" data-col="13"   style="width: 198.011px;"       ><?php  echo  display('Preferred currency');?></th>


            <th class="14 value" data-control-column="14"   data-col="14" style="width: 198.011px;"       ><?php  echo  display('city');?></th>
            <th class="15 value" data-control-column="15" data-col="15"   style="width: 198.011px;"       ><?php  echo  display('state');?></th>
            <th class="16 value"  data-control-column="16" data-col="16" style="width: 248.011px;"        ><?php  echo  display('zip');?></th>
        <th class="17 value" data-control-column="17"   data-col="17" style="width: 198.011px;"       ><?php  echo  display('country');?></th>
        
           <th class="18 value" data-control-column="18"   data-col="18" style="width: 198.011px;"       ><?php echo display('Payment Terms');?></th>
            <th class="19 value" data-control-column="19" data-col="19"   style="width: 198.011px;"       ><?php echo display('Sales Tax') ?></th>
            <th class="20 value" data-control-column="20" data-col="20"   style="width: 198.011px;"       ><?php echo  display('Tax Rates')?></th>
     <div class="myButtonClass Action"> 
         <th class="21 value text-center" data-col="21" data-control-column="21" data-formatter="commands" data-sortable="false"     ><?php echo  display('action')?></th>
        </div>
      </tr>
    </thead>
    <tbody class="sortableTable__body" id="tab">

     <?php
    $count=1;

      if(count($customer_data['rows'])>0){
     foreach($customer_data['rows'] as $k=>$arr){
          ?>
          <tr style="text-align:center" ><td data-col="1" class="1"><?php  echo $count;  ?></td>
 <td data-col="2" class="2"><?php   echo $arr['customer_name'];  ?></td>
   <td data-col="3" class="3"><?php   echo $arr['customer_address'];  ?></td>
   <td data-col="4" class="4"><?php   echo $arr['address2'];  ?></td>
<td data-col="5" class="5"><?php   echo $arr['customer_mobile'];  ?></td>
   <td data-col="6" class="6"><?php   echo $arr['customer_email'];  ?></td>
<td data-col="7" class="7"><?php   echo $arr['phone'];  ?></td>
  <td data-col="8" class="8"><?php   echo $currency." ".$arr['credit_limit'];  ?></td>

  <td data-col="9" class="9"><?php   echo $arr['customer_type'];  ?></td>
<td data-col="10" class="10"><?php   echo $arr['email_address'];  ?></td>
   <td data-col="11" class="11"><?php   echo $arr['contact'];  ?></td>
<td data-col="12" class="12"><?php   echo $arr['fax'];  ?></td>
  <td data-col="13" class="13"><?php   echo $arr['currency_type'];  ?></td>
  <td data-col="14" class="14"><?php   echo $arr['city'];  ?></td>
<td data-col="15" class="15"><?php   echo $arr['state'];  ?></td>
   <td data-col="16" class="16"><?php   echo $arr['zip'];  ?></td>
<td data-col="17" class="17"><?php   echo $arr['country'];  ?></td>
<td data-col="18" class="18"><?php   echo $arr['payment_terms'];  ?></td>
  <td data-col="19" class="19"><?php   echo $arr['sales_tax'];  ?></td>
  <td data-col="20" class="20"><?php   echo $arr['tax_percent'];  ?></td>
  







<?php    foreach(  $this->session->userdata('perm_data') as $test){
    $split=explode('-',$test);

    if(trim($split[0])=='customer' && $_SESSION['u_type'] ==3 && trim($split[1])=='0010'){
      
      
       ?>

<td data-col="21" class="21"><a class="btnclr btn  btn-sm" style="background-color: #3CA5DE; color: #fff;" href="<?php echo base_url()?>Ccustomer/customer_update_form/<?php echo  $arr['customer_id'];  ?>"><i class="fa fa-pencil" aria-hidden="true"></i></a></td>
                    
                    <?php break;}} 



                    if($_SESSION['u_type'] ==2){ ?>

<td data-col="21" class="21"><a class="btnclr btn btn-sm" style="background-color: #3CA5DE; color: #fff;" href="<?php echo base_url()?>Ccustomer/customer_update_form/<?php echo  $arr['customer_id'];  ?>"><i class="fa fa-pencil" aria-hidden="true"></i></a>
<a class="btnclr btn  btn-sm" style="background-color: #3CA5DE; color: #fff;" href="<?php echo base_url()?>Ccustomer/customer_delete/<?php echo  $arr['customer_id'];  ?>"><i class="fa fa-trash-o" aria-hidden="true"></i></a></td>

                        <?php  } ?> 

       


    

                        

                     
  </div>

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










<div id="myModal_colSwitch"  class="modal_colSwitch">
                    <div class="modal-content_colSwitch" style="width:45%;height:35%;">
                    <span class="close_colSwitch">&times;</span>
                       
                          <div class="col-sm-1" ></div>


                          <div class="col-sm-2" ><br>
                          <div class="form-group row"  > 
                         
                          <br><input type="checkbox"  data-control-column="1" checked = "checked" class="1" value="1"/> <?php echo display('ID') ?><br>
                          <br><input type="checkbox"  data-control-column="2" checked = "checked" class="2" value="2"/><?php echo display('Company Name');?><br>
                          <br><input type="checkbox"  data-control-column="3" checked = "checked" class="3 " value="3  "/><?php  echo  display('Billing Address');?> <br>
                          <br><input type="checkbox"  data-control-column="4" checked = "checked" class="4" value="4"/><?php  echo  display('Shipping Address');?><br>
                          <br><input type="checkbox"  data-control-column="5" checked = "checked" class="5" value="5"/><?php  echo  display('Business Phone');?><br>
             </div>
        </div>



        <div class="col-sm-2" ><br>
        <div class="form-group row"  >
        <br><input type="checkbox"  data-control-column="6" checked = "checked" class="6" value="6"/><?php  echo  display('Primary Email');?><br>
<br><input type="checkbox"  data-control-column="7" checked = "checked" class="7" value="7"/><?php  echo  display('Mobile');?><br>
<br><input type="checkbox"  data-control-column="8" checked = "checked" class="8" value="8"/><?php echo display('Credit Limit');?><br>
<br><input type="checkbox"  data-control-column="9"  class="9" value="9"/><?php echo display('Customer Type');?><br>
<br><input type="checkbox"  data-control-column="10"  class="10" value="10"/><?php  echo  display('Secondary Email');?><br>
                          </div>
                       </div>
                    
        


        <div class="col-sm-2"  ><br>
                          <div class="form-group row"  >
                          <br><input type="checkbox"  data-control-column="11"  class="11" value="11"/><?php  echo  display('Contact Person');?><br>
                          <br><input type="checkbox"  data-control-column="12"  class="12" value="12"/><?php  echo  display('Fax');?> <br>
                          <br><input type="checkbox"  data-control-column="13"  class="13" value="13"/><?php  echo  display('Preferred currency');?><br>
                          <br><input type="checkbox"  data-control-column="14"  class="14" value="14"/><?php  echo  display('city');?><br>
                          <br><input type="checkbox"  data-control-column="15"  class="15" value="15"/><?php  echo  display('state');?><br>
                          </div>
                      </div>
     


                      <div class="col-sm-2"  ><br>
                          <div class="form-group row"  >
                          <br><input type="checkbox"  data-control-column="16"  class="16" value="16"/><?php  echo  display('zip');?><br>
                          <br><input type="checkbox"  data-control-column="17"  class="17" value="17"/><?php  echo  display('country');?><br>
                          <br><input type="checkbox"  data-control-column="18"  class="18" value="18"/><?php echo display('Payment Terms');?> <br>
                          <br><input type="checkbox"  data-control-column="19"  class="19" value="19"/><?php echo display('Sales Tax') ?> <br>
                          <br><input type="checkbox"  data-control-column="20"  class="20" value="20"/><?php echo  display('Tax Rates')?><br>
                          </div>
                        </div>
     

                           <div class="col-sm-1"  ><br>
                          <div class="form-group row"  >
                          <br><input type="checkbox"  data-control-column="21" checked = "checked" class="21" value="21"/><?php echo  display('action')?><br>

                        </div>
                          </div>
     




                    </div>
                </div>
    </section>
</div>






<div id="Customer_modal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" style="color:white;background-color:#38469f;">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"><?php echo display('customer_csv_upload'); ?></h4>
      </div>
      <div class="modal-body">

                <div class="panel">
                    <div class="panel-heading" style="height: 50px;">
                        
                            <div><a href="<?php echo base_url('asset/data/csv/customer_csv_sample.csv') ?>" class="btn btn-primary pull-right" style="color:white;background-color:#38469f;"><i class="fa fa-download"></i><?php echo display('download_sample_file')?> </a> </div>
                       
                    </div>
                    
                    <div class="panel-body">
                       
                      <?php echo form_open_multipart('Ccustomer/uploadCsv_Customer',array('class' => 'form-vertical', 'id' => 'validate','name' => 'insert_customer'))?>
                            <div class="col-sm-12">
                                <div class="form-group row">
                                    <label for="upload_csv_file" class="col-sm-4 col-form-label"><?php echo display('upload_csv_file') ?> <i class="text-danger">*</i></label>
                                    <div class="col-sm-8">
                                        <input class="form-control" name="upload_csv_file" type="file" id="upload_csv_file" placeholder="<?php echo display('upload_csv_file') ?>" required>
                                    </div>
                                </div>
                            </div>
                        







                            
                       <div class="col-sm-12">
                        <div class="form-group row">
                            <div class="col-sm-12 text-right">
                                <input type="submit" id="add-product" class="btn " style="color:white;background-color:#38469f;" name="add-product" value="<?php echo display('submit') ?>" />
                                  <button type="button" class="btn " style="color:white;background-color:#38469f;"  data-dismiss="modal">Close</button>
                               
                            </div>
                        </div>
                        </div>
                          <?php echo form_close()?>
                    </div>
                    </div>
                  
               
     
      </div>
    </div>
    </div>
    </div>





<input type="hidden" value="Customer/Customer" id="url"/>
<script src="<?php echo base_url()?>assets/js/jquery.bootgrid.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.5/jspdf.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.0.0-alpha.1/jspdf.plugin.autotable.js"></script>
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
    url:'<?php echo base_url();?>Ccustomer/setting',
   
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
      
       data[csrfName] = csrfHash;
    $.ajax({
    
    type: "POST",  
    url:'<?php echo base_url();?>Ccustomer/get_setting',
   
    data: data,
    dataType: "json", 
    success: function(data) {
     var menu=data.menu;
     var submenu=data.submenu;
     if(menu=='Customer' && submenu=='Customer'){
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




                function reload(){
    location.reload();
}
 var csrfName = '<?php echo $this->security->get_csrf_token_name();?>';
var csrfHash = '<?php echo $this->security->get_csrf_hash();?>';
$editor = $('#submit'),
  $editor.on('click', function(e) {
    if (this.checkValidity && !this.checkValidity()) return;
    e.preventDefault();
    var yourArray = [];
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
    </script> 

    
    </script>