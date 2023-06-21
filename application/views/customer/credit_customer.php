<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css"/>

<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>my-assets/css/css.css" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css"/>
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
<script type="text/javascript" src="http://www.bacubacu.com/colresizable/js/colResizable-1.5.min.js"></script> 





<div class="content-wrapper">
    <section class="content-header">
        <div class="header-icon">
            <i class="pe-7s-note2"></i>
        </div>
        <div class="header-title">
            <h1><?php echo display('credit_customer') ?></h1>
            <small><?php //echo display('manage_your_credit_customer') ?></small>
            <ol class="breadcrumb">
                <li><a href="#"><i class="pe-7s-home"></i> <?php echo display('home') ?></a></li>
                <li><a href="#"><?php echo display('customer') ?></a></li>
                <li class="active" style="color:orange"><?php echo display('credit_customer') ?></li>
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
                <div class="panel panel-bd lobidrag">

                    <div class="panel-heading" style="height: 60px;">
            <div class="col-sm-12">
   <div class="col-sm-10">

   <a    href="<?php echo base_url('Ccustomer')?>" class="btnclr btn  m-b-5 m-r-2"  ><i class="ti-plus"> </i> <?php echo display('add_customer')?> </a>
  
   <a   href="<?php echo base_url('Ccustomer/manage_customer')?>" class="btnclr btn  m-b-5 m-r-2"  ><i class="ti-align-justify"> </i>  <?php echo display('manage_customer')?> </a>

   <a   href="<?php echo base_url('Ccustomer/paid_customer')?>" class="btnclr btn  m-b-5 m-r-2"  ><i class="ti-align-justify"> </i>  <?php echo display('paid_customer')?> </a>

   <a onclick="reload();"  >  <i class="fa fa-refresh" style="font-size:25px;float:right;" aria-hidden="true"></i> </a>

      </div>
                           <div class="col-sm-2">
                           <i class="fa fa-cog"  aria-hidden="true" id="myBtn" style="font-size:25px;" onClick="columnSwitchMODAL()"></i>
                   
                    <div class="dropdown bootcol" id="drop" style="float:right;padding-right:20px;padding-bottom:10px;">
    <button class="btnclr btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
       <span class="glyphicon glyphicon-th-list"></span> <?php  echo  display('download')?>
     
    </button>
    <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
   
  
                
    <li><a href="#" onclick="generate()"> <img src="<?php echo base_url()?>assets/images/pdf.png" width="24px">  <?php  echo  display('PDF')?></a></li>
      
      <li class="divider"></li>         
                  
      <li><a href="#" onclick="$('#ProfarmaInvList').tableExport({type:'excel',escape:'false'});"> <img src="<?php echo base_url()?>assets/images/xls.png" width="24px">  <?php  echo  display('XLS')?></a></li>
                 
    </ul>

    &nbsp;
    <button type="button" style="float:right;"  class="btn btnclr dropdown-toggle"  onclick="printDiv('printableArea')"><?php echo display('print') ?></button>

  </div>
  </div>
    </div>
      </div>
         </div>
          </div>


















        <!-- Manage Product report -->
      
        <div class="row">

            <div class="col-sm-12">

                <div class="panel panel-bd lobidrag">

                    <div class="panel-heading">

                    </div>

                    <div class="panel-body">


                    <div class="row"> 
<div id="for_filter_by" class="for_filter_by" style="display: inline;"><label for="filter_by"> <?php echo display('Filter By') ?> &nbsp;&nbsp;
                  
                   </label><select id="filterby" style="border-radius:5px;height:25px;">
                  <option value="1"> <?php echo display('ID') ?></option>
<option value="2"> <?php echo display('customer_name')?></option>
<option value="3"> <?php echo display('address')?>1</option>
<option value="4"><?php echo display('address')?>2</option>
<option value="5"><?php echo display('mobile')?></option>
<option value="6"><?php echo display('email')?></option>
<option value="7"><?php echo display('phone')?></option>
<option value="8"><?php echo display('due_amount')?></option>

                  </select> <input id="filterinput" style="border-radius:5px;height:25px;" type="text">
                
                </div>
        </div>
      




        <div id="printableArea">

                    <div id="customers">
  <table class="table table-bordered" cellspacing="0" width="100%" id="ProfarmaInvList">
  <thead>
      <tr>
      <th  class="1 value" data-control-column="1" data-col="1"      class="ID" data-resizable-column-id="1"    style="width: 80px; height: 40.0114px;" ><?php  echo  display('ID')?></th>
        <th  class="2 value" data-control-column="2" data-col="2"    class="Customer Name" data-resizable-column-id="2"  style="height: 45.0114px; width: 234.011px" ><?php  echo  display('customer_name')?></th>
        <th class="3 value" data-control-column="3" data-col="3"     class="Address 1" data-resizable-column-id="3"      style="height: 42.0114px;"   ><?php  echo  display('address')?> 1</th>
        <th class="4 value" data-control-column="4" data-col="4"     class="Address 2"  data-resizable-column-id="4"  style="width: 248.011px;"        ><?php  echo  display('address')?> 2</th>
        <th class="5 value" data-control-column="5" data-col="5"     class="Mobile" data-resizable-column-id="5"      style="width: 198.011px;"       ><?php  echo  display('mobile')?></th>
        <th class="6 value" data-control-column="6" data-col="6"     class="Email" data-resizable-column-id="6"       style="width: 190.011px; height: 44.0114px;"><?php  echo  display('email')?></th>
        <th class="7 value" data-control-column="7" data-col="7"     class="Phone" data-resizable-column-id="7"       style="width: 198.011px;"       ><?php  echo  display('phone')?></th>
        <th class="8 value" data-control-column="8" data-col="8"     class="Balance" data-resizable-column-id="8"     style="width: 198.011px;"       ><?php  echo  display('due_amount')?></th>
      </tr>
    </thead>
    <tbody>

     <?php
    $count=1;

    if(count($due_info)>0){
      foreach($due_info as $k=>$arr){
          ?>
          <tr style="text-align:center" ><td data-col="1" class="1" class="ID"><?php  echo $count;  ?></td>
 <td data-col="2" class="2" class="Customer Name"><?php   echo $arr['customer_name'];  ?></td>
   <td data-col="3" class="3" class="Address 1"><?php   echo $arr['customer_address'];  ?></td>
   <td data-col="4" class="4"  class="Address 2"><?php   echo $arr['address2'];  ?></td>
<td data-col="5" class="5"  class="Mobile"><?php   echo $arr['customer_mobile'];  ?></td>
   <td data-col="6" class="6"  class="Email"><?php   echo $arr['customer_email'];  ?></td>
<td data-col="7" class="7"  class="Phone"><?php   echo $arr['phone'];  ?></td>
  <td data-col="8" class="8"  class="credit_limit"><?php   echo $currency." ".$arr['due'];  ?></td>
  <!-- <td><a class="btn  btn-sm" style="background-color: #3CA5DE; color: #fff;" href="<?php echo base_url()?>Ccustomer/customer_update_form/<?php echo  $arr['customer_id'];  ?>"><i class="fa fa-pencil" aria-hidden="true"></i></a></td> -->
 
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
 
  </table>
      </div>

         </div>

            </div>

            </div>








<!-- 
 <div id="myModal_colSwitch"  class="modal_colSwitch">
                    <div class="modal-content_colSwitch">
                          <span class="close_colSwitch">&times;</span>
                          <input type="checkbox"  data-control-column="1" checked = "checked" class="opt ID" value="ID"/> <?php  echo  display('ID')?><br>
    <input type="checkbox"  data-control-column="2" checked = "checked" class="opt Customer Name" value="Customer Name"/><?php  echo  display('customer_name')?><br>
        <input type="checkbox"  data-control-column="3" checked = "checked" class="opt Address 1" value="Address 1"/><?php  echo  display('address')?> 1<br>
    <input type="checkbox"  data-control-column="4" checked = "checked" class="opt Address 2" value="Address 2"/><?php  echo  display('address')?> 2<br>
    <input type="checkbox"  data-control-column="5" checked = "checked" class="opt Mobile" value="Mobile"/><?php  echo  display('mobile')?><br>
    <input type="checkbox"  data-control-column="6" checked = "checked" class="opt Email" value="Email"/><?php  echo  display('email')?><br>
    <input type="checkbox"  data-control-column="7" checked = "checked" class="opt Phone" value="Phone"/><?php  echo  display('phone')?><br>
    <input type="checkbox"  data-control-column="8" checked = "checked" class="opt due amount" value="Due Amount"/><?php  echo  display('due_amount')?><br>

                    </div>
                </div>
        </div>
    </section>
</div> -->











<div id="myModal_colSwitch"  class="modal_colSwitch">
                    <div class="modal-content_colSwitch" style="width:30%;height:30%;">
                    <span class="close_colSwitch">&times;</span>
                       
                          <div class="col-sm-2" ></div>


                          <div class="col-sm-3" ><br>
                          <div class="form-group row"  > 
                         
                         <br> <input type="checkbox"  data-control-column="1" checked = "checked" class="opt ID" value="ID"/>&nbsp; <?php  echo  display('ID')?><br>
                      
                         <br><input type="checkbox"  data-control-column="5" checked = "checked" class="opt Mobile" value="Mobile"/>&nbsp;<?php  echo  display('mobile')?><br>
        <br>  <input type="checkbox"  data-control-column="6" checked = "checked" class="opt Email" value="Email"/>&nbsp;<?php  echo  display('email')?><br>
        <br>  <input type="checkbox"  data-control-column="7" checked = "checked" class="opt Phone" value="Phone"/>&nbsp;<?php  echo  display('phone')?><br>
             </div>
        </div>



        <div class="col-sm-3" ><br>
        <div class="form-group row"  >
        <br>   <input type="checkbox"  data-control-column="2" checked = "checked" class="opt Customer Name" value="Customer Name"/>&nbsp;<?php  echo  display('customer_name')?><br>
                         <br>   <input type="checkbox"  data-control-column="3" checked = "checked" class="opt Address 1" value="Address 1"/>&nbsp;<?php  echo  display('address')?> 1<br>
                         <br>  <input type="checkbox"  data-control-column="4" checked = "checked" class="opt Address 2" value="Address 2"/>&nbsp;<?php  echo  display('address')?> 2<br>
        <br> <input type="checkbox"  data-control-column="8" checked = "checked" class="opt due amount" value="Due Amount"/>&nbsp;<?php  echo  display('due_amount')?><br>


                          </div>
                       </div>
                    
        


      
                           <div class="col-sm-1"  ><br>
                          <div class="form-group row"  >

                        </div>
                          </div>
     




                    </div>
                </div>
    </section>
</div>















<script>
 $(document).on('keyup', '#filterinput', function(){
  
    var value = $(this).val().toLowerCase();
    var filter=$("#filterby").val();
    $("#ProfarmaInvList tr:not(:eq(0))").filter(function() {
        $(this).toggle($(this).find("td."+filter).text().toLowerCase().indexOf(value) > -1)
    });
});


</script>

<input type="hidden" value="Customer/Customer" id="url"/>
<script src="<?php echo base_url()?>assets/js/jquery.bootgrid.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.5/jspdf.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.0.0-alpha.1/jspdf.plugin.autotable.js"></script>
  <script type="text/javascript" src="<?php echo base_url()?>my-assets/js/profarma.js"></script>
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