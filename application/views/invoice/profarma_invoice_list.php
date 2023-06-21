

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
<script type="text/javascript" src="http://www.bacubacu.com/colresizable/js/colResizable-1.5.min.js"></script>


<div class="content-wrapper">

    <section class="content-header">

        <div class="header-icon">

            <i class="pe-7s-note2"></i>

        </div>

        <div class="header-title">

            <h1><?php echo display('manage_quotation')?></h1>

            <small></small>

            <ol class="breadcrumb">

            <li><a href="<?php   echo base_url(); ?>"><i class="pe-7s-home"></i> <?php echo display('home') ?></a></li>

                <li><a href="#"><?php echo display('invoice') ?></a></li>

                <li class="active" style="color:orange;"><?php echo display('Manage Quotation')?></li>

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



<div class="panel panel-default">
                    <div class="panel-body"> 
                        <div class="row">
                        <div class="col-sm-3">


                   







                        <?php    foreach(  $this->session->userdata('perm_data') as $test){
    $split=explode('-',$test);
    if(trim($split[0])=='sales' && $_SESSION['u_type'] ==3 && trim($split[1])=='1000'){
      
      
       ?>

<a href="<?php echo base_url('Cinvoice/profarma_invoice') ?>" class="btnclr btn btn-info m-b-5 m-r-2"><?php echo display('create') ?> <?php echo display('quotation') ?></a>
                    
                    <?php break;}} 
                    if($_SESSION['u_type'] ==2){ ?>

<a href="<?php echo base_url('Cinvoice/profarma_invoice') ?>" class="btnclr btn btn-info m-b-5 m-r-2"><?php echo display('create') ?> <?php echo display('quotation') ?></a>

                        <?php  } ?>























        
                    <a href="<?php echo base_url('Cinvoice/add_profarma_product_csv') ?>" class="btnclr btn btn-primary m-b-5 m-r-2 text-white"><i class="ti-plus"> </i> &nbsp;  <?php echo display('Add Invoice (CSV)') ?> </a>
      
                        </div>
                        <div class="col-sm-5">
                     
                        <?php echo form_open_multipart('Cinvoice/manage_profarma_invoice',array('class' => 'form-vertical', 'id' => 'insert_sale','name' => 'insert_sale'))?>


<?php



$today = date('Y-m-d');

?>

<div class="form-group"    style="text-align: center;">

    <label class="" for="from_date"><?php echo display('Search By Date Range ') ?>:</label>

    <input type="text" name="daterange" style="padding: 5px;width: 180px;border-radius: 8px;" />
    <input type="submit" id="btn-filter" class="btnclr btn btn-success" value=<?php echo display('Search') ?> >
   
</div> 
<?php echo form_close() ?>
                    </div>

                    <div class="col-sm-2">
                     
                     <?php echo form_open_multipart('Cinvoice/manage_profarma_invoice',array('class' => 'form-vertical', 'id' => 'insert_sale','name' => 'insert_sale'))?>


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
       <span class="glyphicon glyphicon-th-list"></span><?php echo display('Download') ?>
     
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

        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-bd lobidrag">
                    <div class="panel-heading">
                        <div class="panel-title">
                                   <div class="row">
<div id="for_filter_by" class="for_filter_by" style="display: inline;"><label for="filter_by"><?php echo display('Filter By') ?>&nbsp;&nbsp;
                   </label><select id="filterby" style="border-radius:5px;height:25px;">
             <option value="1"><?php echo display('ID') ?></option>
<option value="2"><?php echo display('Invoice No') ?></option>
<option value="3"><?php echo display('Sale By') ?></option>
<option value="4"><?php echo display('Pre Carriage') ?></option>
<option value="5"><?php echo display('Country goods') ?></option>
<option value="6"><?php echo display('Country Destination') ?></option>
<option value="7"><?php echo display('Loading') ?></option>
<option value="8"><?php echo display('Discharge') ?></option>
<option value="9"><?php echo display('Terms payment') ?></option>
<option value="10"><?php echo display('Description goods') ?></option>
<option value="11"><?php echo display('Overall Gross') ?></option>
<option value="12"><?php echo display('Overall Net') ?></option>
<option value="13"><?php echo display('Amount Paid') ?></option>
<option value="14"><?php echo display('Due Amount') ?></option>
<option value="15"><?php echo display('Total Amount') ?></option>
<option value="16"><?php echo display('Date') ?></option>
<option value="17"><?php echo display('Buyer/Customer') ?></option>
<option value="18"><?php echo display('Place of Receipt') ?></option>
<option value="19"><?php echo display('Tax Details') ?></option>
<option value="20"><?php echo display('Grand Total') ?></option>
<option value="21"><?php echo display('Grand Total') ?><?php echo display('Preferred Currency') ?></option>
<option value="22"><?php echo display('Remarks / Details') ?></option>


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
     


         <th class="1 value" data-col="1" data-control-column="1"    style="width: 80px; height: 40.0114px;" ><?php echo display('ID') ?></th>
        <th class="2 value" data-col="2" data-control-column="2"  style="height: 45.0114px; width: 234.011px" ><?php echo display('Invoice No') ?></th>
        <th class="3 value" data-col="3" data-control-column="3"  style="height: 42.0114px; display:none;"   ><?php echo display('Sale By') ?></th>
        <th class="4 value"  data-col="4" data-control-column="4"  style="width: 248.011px;"><?php echo display('Pre Carriage') ?></th>
        <th class="5 value" data-col="5 " data-control-column="5"    style="width: 198.011px;"       ><?php echo display('Country goods') ?></th>
          <th class="6 value" data-col="6" data-control-column="6"    style="width: 198.011px;"       ><?php echo display('Country Destination') ?></th>
            <th class="7 value" data-col="7" data-control-column="7"    style="width: 198.011px;"><?php echo display('Loading') ?></th>
              <th class="8 value" data-col="8" data-control-column="8"    style="width: 198.011px;"       ><?php echo display('Discharge') ?></th>
                <th class="9 value" data-col="9" data-control-column="9"    style="width: 198.011px;"       ><?php echo display('Terms payment') ?></th>
                  <th class="10 value" data-col="10" data-control-column="10"    style="width: 198.011px;"       ><?php echo display('Description goods') ?></th>
                  <th class="11 value" data-col="11" data-control-column="11" style="width: 190.011px; height: 44.0114px;"><?php echo display('Overall Gross') ?></th>
                  <th class="12 value"  data-col="12" data-control-column="12" style="width: 190.011px; height: 44.0114px;"><?php echo display('Overall Net') ?></th>
                  <th class="13 value" data-col="13" data-control-column="13" style="width: 190.011px; height: 44.0114px;"><?php echo display('Amount Paid') ?></th>
                  <th class="14 value" data-col="14" data-control-column="14" style="width: 190.011px; height: 44.0114px;"><?php echo display('Due Amount') ?></th>
        <th class="15 value" data-col="15" data-control-column="15" style="width: 190.011px; height: 44.0114px;"><?php echo display('Total Amount') ?></th>
        <th class="16 value" data-col="16" data-control-column="16"    style="width: 198.011px;"       ><?php echo display('Date') ?></th>
                <th class="17 value" data-col="17" data-control-column="17"    style="width: 198.011px;"       ><?php echo display('Buyer / Customer') ?></th>
                  <th class="18 value" data-col="18 " data-control-column="18"    style="width: 198.011px;"><?php echo display('Place of Receipt') ?></th>
            
<th class="19 value" data-col="19" data-control-column="19" style="width: 190.011px; height: 44.0114px;"><?php echo display('Tax Details') ?></th>
<th class="20 value" data-col="20" data-control-column="20" style="width: 190.011px; height: 44.0114px;"><?php echo display('Grand Total') ?></th>
<th class="21 value" data-col="21" data-control-column="21" style="width: 190.011px; height: 44.0114px;"><?php echo display('Grand Total(Preferred Currency)') ?></th>
<th class="22 value" data-col="22" data-control-column="22" style="width: 190.011px; height: 44.0114px;"><?php echo display('Remarks / Details') ?></th>
        <th class="text-center 23" data-column-id="23" data-formatter="commands" data-sortable="false" style="    width: 650.011px; height: 49.0114px;" ><?php echo display('Action') ?></th>
      </tr>
    </thead>
    <tbody class="sortableTable__body">
     <?php
    $count=1;
    if(count($sale['rows'])>0){
      foreach($sale['rows'] as $k=>$arr){
          ?>
          <tr style="text-align:center" ><td data-col="1" class="1"> <?php  echo $count;  ?></td>
 <td data-col="2" class="2"><?php   echo $arr['chalan_no'];  ?></td>
   <td data-col="3" class="3" style=" display:none;"><?php   echo $arr['first_name'].' '.$arr['last_name'];  ?></td>
   <td data-col="4" class="4"><?php   echo $arr['pre_carriage'];  ?></td>
<td data-col="5 " class="5"><?php   echo $arr['country_goods'];  ?></td>
   <td data-col="6" class="6"><?php   echo $arr['country_destination'];  ?></td>
<td data-col="7" class="7"><?php   echo $arr['loading'];  ?></td>
   <td data-col="8" class="8" ><?php   echo $arr['discharge'];  ?></td>
<td data-col="9" class="9"><?php   echo $arr['terms_payment'];  ?></td>
   <td data-col="10" class="10"><?php   echo $arr['description_goods'];  ?></td>
   <td data-col="11" class="11" ><?php   echo $arr['total_gross'];  ?></td>
<td data-col="12" class="12"><?php   echo $arr['total_net'];  ?></td>
<td data-col="13" class="13"><?php   echo $currency." ".$arr['amt_paid'];  ?></td>
<td data-col="14"  class="14"><?php   echo $currency." ".$arr['bal_amt'];  ?></td>
  <td data-col="15" class="15"><?php   echo $currency." ".$arr['total'];  ?></td>
  <td data-col="16" class="16"><?php   echo $arr['purchase_date'];  ?></td>
   <td data-col="17" class="17"><?php   echo $arr['customer_id'] ?></td>
   <td data-col="18" class="18"><?php   echo $arr['receipt'];  ?></td>
   <td data-col="19" class="19"><?php   echo $currency." ".$arr['tax_details'];  ?></td>
<td data-col="20" class="20"><?php   echo $currency." ".$arr['gtotal'];  ?></td>
<td data-col="21" class="21"><?php   echo $currency." ".$arr['customer_gtotal'];  ?></td>
<td data-col="22" class="22"><?php   echo $arr['remarks'];  ?></td>
  <div class="form-group">
  <td data-col="23" class="23">
  <a class="btnclr btn  btn-sm" style="background-color: #3CA5DE; color: #fff;" href="<?php echo base_url()?>Cinvoice/performa_pdf/<?php echo  $arr['purchase_id'];  ?>"><i class="fa fa-download" aria-hidden="true"></i></a>

  
  <a class="btnclr btn  btn-sm" style="background-color: #3CA5DE; color: #fff;"  data-toggle="modal" data-target="#emailmodal" onclick="profarmamail(<?php echo  $arr['purchase_id'];  ?>,'profarma_invoice','purchase_id')"><i class="fa fa-envelope" aria-hidden="true" ></i></a>

  
  <?php    foreach(  $this->session->userdata('perm_data') as $test){
    $split=explode('-',$test);
    if(trim($split[0])=='sales' && $_SESSION['u_type'] ==3 && trim($split[1])=='0010'){
      
      
       ?>

                    
                    <?php break;}} 
                    if($_SESSION['u_type'] ==2){ ?>

<a class="btnclr btn  btn-sm" style="background-color: #3ca5de; color: #fff;" href="<?php echo base_url()?>Cinvoice/profarma_invoice_update_form/<?php echo  $arr['purchase_id'];  ?>"><i class="fa fa-pencil" aria-hidden="true"></i></a>
<a class="btnclr btn  btn-sm" style="background-color: #3ca5de; color: #fff;" href="<?php echo base_url()?>Cinvoice/profarma_invoice_delete_form/<?php echo  $arr['purchase_id'];  ?>"><i class="fa fa-trash-o" aria-hidden="true"></i></a>

                        <?php  } ?>











       






  </td>
  </div>

  </tr>

</tr>
     <?php   
$count++;
     
              
                
} }  else{
    ?>
     <tr><td colspan="15" style="text-align:center;font-weight:bold;"><?php  echo "No Records Found"  ;?></td></tr>
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
        </div>
  </table>
      </div>

<script src="<?php echo base_url()?>assets/js/jquery.bootgrid.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.5/jspdf.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.0.0-alpha.1/jspdf.plugin.autotable.js"></script>


    <!-- The Modal Column Switch -->
           <div id="myModal_colSwitch" class="modal_colSwitch">
                    <div class="modal-content_colSwitch" style="width:25%;height:40%;">
                          <span class="close_colSwitch">&times;</span>
                          <div class="col-sm-6"><br><br>
                          <div class="form-group row">
                          <input type="checkbox"  data-control-column="1"checked = "checked" class="1" value="1"/> <?php echo display('ID') ?><br>
<input type="checkbox"  data-control-column="2" checked = "checked" class="2" value="2"/><?php echo display('Invoice No') ?><br>
<input type="checkbox"  data-control-column="4" checked = "checked"class="4" value="4"/><?php echo display('Pre Carriage') ?><br>
<input type="checkbox"  data-control-column="5" checked = "checked" class="5" value="5"/><?php echo display('Country goods') ?><br>
<input type="checkbox"  data-control-column="6" checked = "checked" class="6" value="6"/><?php echo display('Country Destination') ?><br>
    <input type="checkbox"  data-control-column="7" checked = "checked" class="7" value="7"/><?php echo display('Loading') ?><br>
<input type="checkbox"  data-control-column="8" checked = "checked" class="8" value="8"/><?php echo display('Discharge') ?><br>
<input type="checkbox"  data-control-column="9" checked = "checked" class="9" value="9"/><?php echo display('Terms payment') ?><br>
<input type="checkbox"  data-control-column="10" checked = "checked"class="10" value="10"/><?php echo display('Description goods') ?><br>
 <input type="checkbox"  data-control-column="11" checked = "checked" class="11" value="11"/><?php echo display('Overall Gross') ?><br>
<input type="checkbox"  data-control-column="12" checked = "checked" class="12" value="12"/><?php echo display('Overall Net') ?><br>
<input type="checkbox"  data-control-column="3" style=" display:none;" checked = "checked" class="3" value="3"/><br>


                          </div>
                          </div>
                          <div class="col-sm-6">
                          <div class="form-group row">
<input type="checkbox"  data-control-column="13" checked = "checked" class="13" value="13"/><?php echo display('Amount Paid') ?><br>
<input type="checkbox"  data-control-column="14" checked = "checked"class="14" value="14"/><?php echo display('Due Amount') ?><br>
 <input type="checkbox"  data-control-column="15" checked = "checked"class="15" value="15"/><?php echo display('Total Amount') ?><br>
<input type="checkbox"  data-control-column="16" class="16" value="16"/><?php echo display('Date') ?><br>
<input type="checkbox"  data-control-column="17" class="17" value="17"/><?php echo display('Buyer / Customer') ?><br>
<input type="checkbox"  data-control-column="18" class="18" value="18"/><?php echo display('Place of Receipt') ?><br>
    <input type="checkbox"  data-control-column="19"  class="19 " value="19"/><?php echo display('Tax Details') ?><br>
<input type="checkbox"  data-control-column="20"  class="20 " value="20"/><?php echo display('Grand Total') ?><br>
<input type="checkbox"  data-control-column="21"  class="21 " value="21"/><?php echo display('Grand Total') ?><?php echo display('preferred') ?><br>
<input type="checkbox"  data-control-column="22"  class="22 " value="22"/><?php echo display('Remarks / Details') ?><br>
<input type="checkbox"  data-control-column="23" class="23" checked = "checked" value="23"/><?php echo display('Action') ?><br>
                          </div>
                          </div>
                          
 
     <!--      <input type="submit" value="submit" id="submit"/>--> 
                    </div>
                </div>





                            

                        </div>

                       



                  

                </div>

                <input type="hidden" id="total_invoice" value="<?php echo $total_invoice;?>" name="">

                 <input type="hidden" id="currency" value="<?php echo $currency;  ?>" name="">

            </div>

        </div>
        </div>
    </section>


<script type="text/javascript" src="<?php echo base_url()?>my-assets/js/profarma.js"></script>
<input type="hidden" value="Sale/ProfarmaInvoice" id="url"/>
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
     if(menu=='Sale' && submenu=='ProfarmaInvoice'){
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

var draggable = document.getElementById('draggable');
var handle = document.getElementById('handle');
var target = false;
draggable.onmousedown = function(e) {
    target = e.target;
};
draggable.ondragstart = function(e) {
    if (handle.contains(target)) {
        e.dataTransfer.setData('text/plain', 'handle');
    } else {
        e.preventDefault();
    }
};
    </script>

<style>
  #draggable {
    width: 100px;
    height: 100px;
    border: 1px solid black;
}
#handle {
    width: 0;
    height: 0;
    border-right: 20px solid transparent;
    border-top: 20px solid black;
    cursor: move;
}
</style>
