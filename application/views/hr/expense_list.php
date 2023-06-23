
<?php error_reporting(1);  ?>

<!-- Manage Invoice Start -->
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
<script type="text/javascript" src="http://www.bacubacu.com/colresizable/js/colResizable-1.5.min.js"></script>
<style>
  .table{
      display: block;
    overflow-x: auto;
   
  }
  </style>

<div class="content-wrapper">

    <section class="content-header">

        <div class="header-icon">

            <i class="pe-7s-note2"></i>

        </div>

        <div class="header-title">

            <h1>Manage Expenses</h1>

            <small><?php echo ""; ?></small>

            <ol class="breadcrumb">

                <li><a href="<?php   echo base_url(); ?>"><i class="pe-7s-home"></i> <?php echo display('home') ?></a></li>

                <li><a href="#">Expenses</a></li>

                <li class="active" style="color:orange;">Manage Expenses</li>

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
						<a href="<?php echo base_url('Chrm/add_expense_item') ?>" class="btnclr btn m-b-5 m-r-2" style="color:white;background-color: #337ab7;border-color: #2e6da4;"> Create Expense</a>

                    <!-- <a href="<?php echo base_url('Cinvoice/add_product_csv') ?>" class="btnclr btn btn-primary m-b-5 m-r-2 text-white"><i class="ti-plus"> </i> &nbsp;  <?php //echo display('Add Invoice (CSV)') ?> </a> -->
       
                        </div>
                        <div class="col-sm-5">
                     
                        <?php echo form_open_multipart('Cinvoice/manage_invoice',array('class' => 'form-vertical', 'id' => 'insert_sale','name' => 'insert_sale'))?>


<!-- <?php



//$today = date('Y-m-d');

?> -->

<!-- <div class="form-group">

    <label class="" for="from_date"><?php //echo display('Search By Date Range'); ?>:</label>

    <input type="text" name="daterange" style="padding: 5px;width: 180px;border-radius: 8px;"/>
    <input type="submit" id="btn-filter" class="btnclr btn btn-success" value=<?php //echo display ('Search'); ?> >
    
</div>  -->
<?php echo form_close() ?>
                    </div>

                    <div class="col-sm-1">
                     
                     <?php echo form_open_multipart('Cinvoice/manage_invoice',array('class' => 'form-vertical', 'id' => 'insert_sale','name' => 'insert_sale'))?>


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
<?php echo form_close() ?>
                 </div>

                    <div class="col-sm-2">
                    <i class="fa fa-cog"  aria-hidden="true" id="myBtn" style="font-size:25px;" onClick="columnSwitchMODAL()"></i> <!-- onclick opens MODAL -->
                   
                    <div class="dropdown bootcol" id="drop" style="float:right;padding-right:20px;padding-bottom:10px;">
    <button class="btn btnclr dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
       <span class="glyphicon glyphicon-th-list"></span>  <?php echo display('download') ?>
     
    </button>
    <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
   
  
                
      <li><a href="#" onclick="generate()"> <img src="<?php echo base_url()?>assets/images/pdf.png" width="24px"><?php echo display('PDF') ?> </a></li>
      
      <li class="divider"></li>         
                  
      <li><a href="#" onclick="$('#ProfarmaInvList').tableExport({type:'excel',escape:'false'});"> <img src="<?php echo base_url()?>assets/images/xls.png" width="24px">  <?php echo display('XLS') ?></a></li>
                 
    </ul>
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
<div id="for_filter_by" class="for_filter_by" style="display: inline;"><label for="filter_by"> <?php echo display('Filter By') ?> &nbsp;&nbsp;
                  
                   </label><select id="filterby" style="border-radius:5px;height:25px;">
                  <option value="1"> <?php echo display('ID') ?></option>
<option value="2">Expense Name</option>
<option value="3">Expense Date</option>
<option value="4">Expense Amount</option>
<option value="5">Total Amount</option>
<option value="6">Expense Payment Date</option>
<option value="7">Description</option>

                  </select> <input id="filterinput" style="border-radius:5px;height:25px;" type="text"></div>
        </div>
                    </div>

                    <div class="panel-body" style="padding-top: 0px;">
<div class="sortableTable__container">
  <div class="sortableTable__discard">
  </div>
                    <div id="customers">
  <table class="table table-bordered" cellspacing="0" width="100%" id="ProfarmaInvList">
  <thead class="sortableTable">
      <tr style="background-color: #337AB7;border-color: #2E6DA4;" class="sortableTable__header">
      <th class="1 value" data-col="1"      style="width: 80px; height: 40.0114px;" >S.No</th>
        <th class="2 value"  data-col="2"    style="height: 45.0114px; width: 234.011px"> Expense Name</th>
        <th class="3 value"  data-col="3"   style="width: 248.011px;">Expense Date</th>
        <th class="4 value" data-col="4"    style="width: 198.011px;">Expense Amount/th>
		<th class="5 value" data-col="5"    style="width: 198.011px;">Total Amount</th>
        <th class="5 value" data-col="5"    style="width: 198.011px;">Expense Payment Date</th>
		<th class="6 value" data-col="6"    style="width: 198.011px;">Description</th>
        
      <div class="myButtonClass Action">
         <th class="25 text-center" data-col="25" data-column-id="25" data-formatter="commands" data-sortable="false"   style="  width: 480.011px;  height: 39.0114px;"  ><?php echo display('Action')?></th>
        </div>
      </tr>
    </thead>
    <tbody class="sortableTable__body" id="tab">
	<?php $s = 1; foreach ($expen_list as $key => $list) { ?>
	<tr style="text-align:center" ><td data-col="1" class="1"><?php echo $s; ?></td>
		<td data-col="2" class="2"><?php echo $list['expense_name']; ?></td>
		<td data-col="3" class="3"><?php echo $list['expense_date']; ?></td>
		<td data-col="4" class="4"><?php echo $list['expense_amount']; ?></td>
		<td data-col="5" class="5"><?php echo $list['total_amount']; ?></td>
		<td data-col="6" class="6"><?php echo $list['expense_payment_date']; ?></td>
        <td data-col="7" class="7"><?php echo $list['description']; ?></td>
		<td data-col="8" class="8">
		<a href="<?php echo base_url().'Chrm/edit_expense/'.$list['id']; ?>" class="btnclr btn m-b-5 m-r-2" data-toggle="tooltip" data-placement="left" title="" data-original-title="<?php echo display('update') ?>"><i class="fa fa-pencil" aria-hidden="true"></i></a>

        <a class="btnclr btn m-b-5 m-r-2" style="background-color: #3CA5DE; color: #fff;" href="<?php echo base_url().'Chrm/expense_download/'.$list['id']; ?>" data-toggle="tooltip" data-placement="left" title="" data-original-title="Download"><i class="fa fa-download" aria-hidden="true"></i></a>

	    <a href="<?php echo base_url().'Chrm/delete_expense/'.$list['id']; ?>" class="btnclr btn m-b-5 m-r-2" onclick="return confirm('Are you sure you want to delete this bank?');" data-toggle="tooltip" data-placement="left" title="" data-original-title="<?php echo display('delete') ?>"><i class="fa fa-trash" aria-hidden="true"></i></a>
		</td>

	</tr>

    <?php $s++; } ?>

</tr>
  
    </tbody>
    <!--
    <tfoot>





<th></th>  

<th></th> 

            </tfoot>-->
  </table>
      </div> </div>
</section>
<input type="hidden" value="Sale/New Sale" id="url"/>
<script src="<?php echo base_url()?>assets/js/jquery.bootgrid.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.5/jspdf.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.0.0-alpha.1/jspdf.plugin.autotable.js"></script>



    <!-- The Modal Column Switch -->
           <div id="myModal_colSwitch" class="modal_colSwitch" >
                    <div class="modal-content_colSwitch" style="width:15%;height:30%;">
                          <span class="close_colSwitch">&times;</span>
                          <div class="col-sm-6"><br><br>
                          <div class="form-group row">
                          <input type="checkbox"  data-control-column="1" checked = "checked" class="1"  value="1"/> <?php echo display('ID')?><br>
<input type="checkbox"  data-control-column="2" checked = "checked" class="2"  value="2"/> Expense Name<br>
<input type="checkbox"  data-control-column="3" checked = "checked" class="3"   value="3"/> Expense Date<br>
<input type="checkbox"  data-control-column="4" checked = "checked" class="4"   value="4"/> Expense Amount<br>
<input type="checkbox"  data-control-column="5" checked = "checked" class="5"  value="5"/> Total Amount<br>
<input type="checkbox"  data-control-column="6" checked = "checked" class="6"   value="6"/> Expense Payment Date<br>
<input type="checkbox"  data-control-column="7" checked = "checked" class="7"   value="7"/> Description<br>


                          </div> </div>
            </div>
                </div>

               </div>
  

                </div>


                       



                    </div>

                </div>

            </div>

        </div>

    </section>
    <input type ="hidden" name="csrf_test_name" id="csrf_test_name" value="<?php echo $this->security->get_csrf_hash();?>">

</div>

<!-- Manage Invoice End -->

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
      
       data[csrfName] = csrfHash;
    $.ajax({
    
    type: "POST",  
    url:'<?php echo base_url();?>Cinvoice/get_setting',
   
    data: data,
    dataType: "json", 
    success: function(data) {
     var menu=data.menu;
     var submenu=data.submenu;
     if(menu=='Sale' && submenu=='New Sale'){
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
    console.log("Heyy : "+column);
    $(column).hide();
});

$("input:checkbox").click(function(){
    var column = "table ." + $(this).attr("value");
      console.log("Heyy : "+column);
    $(column).toggle();
});


// $("input:checkbox:not(:checked)").each(function() {
//     var column = "table ." + $(this).attr("name");
//     $(column).hide();
// });

// $("input:checkbox").click(function(){
//     var column = "table ." + $(this).attr("name");
//     $(column).toggle();
// });

///************** */

    </script>


