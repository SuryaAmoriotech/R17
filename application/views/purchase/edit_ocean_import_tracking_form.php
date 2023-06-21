<!-- Product Purchase js -->
<script src="<?php echo base_url()?>my-assets/js/admin_js/json/product_purchase.js.php" ></script>
<!-- Supplier Js -->
<script src="<?php echo base_url(); ?>my-assets/js/admin_js/json/supplier.js.php" ></script>

<script src="<?php echo base_url()?>my-assets/js/admin_js/purchase.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>my-assets/js/countrypicker.js" type="text/javascript"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <style>
.select2{
    display:none;
}
  #block_container
{height:40px;
    text-align:center;
}
#bloc1, #bloc2
{text-align:center;
    font-weight:bold;
    display:inline;
}
        </style>
<!-- Add New Purchase Start -->
<div class="content-wrapper">
    <section class="content-header">
        <div class="header-icon">
            <i class="pe-7s-note2"></i>
        </div>
        <div class="header-title">
            <h1><?php   echo  display('Create Ocean Import Tracking')?></h1>
         
            <ol class="breadcrumb">
                <li><a href="#"><i class="pe-7s-home"></i> <?php echo display('home') ?></a></li>
                <li><a href="#"><?php  echo  display('purchase'); ?></a></li>
                <li class="active" style="color:orange;"><?php   echo  display('Ocean Import Tracking')?></li>
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
                    <div class="panel-heading">
                         <div class="panel-title">
<div id="block_container">
                                <div id="bloc1" style="float:left;">
                        
                               </div> 
                             <div id="bloc2" style="float:right;">
                           

                    <a style="background-color:#38469f;color:white;" href="<?php echo base_url('Ccpurchase/manage_ocean_import_tracking') ?>" class="btn  m-b-5 m-r-2"><i class="ti-align-justify"> </i> <?php echo "Manage Ocean Import" ?> </a>

                    
                     </div>    </div>

  </div>

                    </div>


                    <div class="panel-body">
                        
                    <form id="insert_ocean"  method="post">  
                      


                        <div class="row">
                             <div class="col-sm-6">
                               <div class="form-group row">
                                    <label for="supplier_sss" class="col-sm-4 col-form-label">Shipper / Vendor
                                        <i class="text-danger">*</i>
                                    </label>
                                    <div class="col-sm-7">
                                    <select name="supplier_id" id="supplier_id" class="form-control " style="width:115%;" required=""> 
                                        <option selected value="{supplier_id}" selected="">{supplier_name}</option>
                                            {supplier_list}
                                            <option value="{supplier_id}">{supplier_name}</option>
                                            {/supplier_list} 
                                          
                                           
                                          
                                        </select>
                                    </div>
                                    <?php if($this->permission1->method('add_supplier','create')->access()){ ?>
                                   
                                <?php }?>
                                </div> 
                            </div>



                             <div class="col-sm-6">
                                <div class="form-group row">
                                    <label for="invoice_no" class="col-sm-4 col-form-label"> Booking / BL No
                                        <i class="text-danger"></i>
                                    </label>
                                    <div class="col-sm-8">
                                        <input type="text" tabindex="3" readonly class="form-control" name="booking_no" placeholder="Booking No." value="{booking_no}" id="invoice_no" />

                                        <input type="hidden" name="ocean_import_tracking_id" value="{ocean_import_tracking_id}">

                                    </div>
                                </div>
                            </div>
                        </div>



                        <div class="row">
                            <div class="col-sm-6">
                               <div class="form-group row">
                                    <label for="supplier_sss" class="col-sm-4 col-form-label">Container No
                                        <i class="text-danger">*</i>
                                    </label>
                                    <div class="col-sm-8">
                                    <input rows="4" cols="50" name="container_no" class=" form-control" value="<?php echo "{container_no}"  ?>" placeholder='Container No' id="" > </input>
                                    </div>
                                
                                </div> 
                            </div>


                             <div class="col-sm-6">
                                <div class="form-group row">
                                    <label for="invoice_no" class="col-sm-4 col-form-label">Seal No
                                        <i class="text-danger"></i>
                                    </label>
                                    <div class="col-sm-8">
                                    <input type="text" tabindex="3" class="form-control" name="seal_no" placeholder="Seal No" value="{seal_no}" id="invoice_no" />
                                    </div>
                                </div>
                            </div>
                        </div>



                         <div class="row">
                            <div class="col-sm-6">
                               <div class="form-group row">
                                    <label for="supplier_sss" class="col-sm-4 col-form-label">ETD (Estimated time of depature)
                                        <i class="text-danger">*</i>
                                    </label>
                                        <div class="col-sm-8">
                                        <?php $date = date('Y-m-d'); ?>
                                        <input type="date" required tabindex="2" class="form-control datepicker" name="etd" value="<?php echo  $etd; ?>" id="date"  />
                                    </div>
                                
                                </div> 
                            </div>


                             <div class="col-sm-6">
                                <div class="form-group row">
                                    <label for="invoice_no" class="col-sm-4 col-form-label">ETA (Estimated time of Arrival)
                                        <i class="text-danger"></i>
                                    </label>
                                       <div class="col-sm-8">
                                        <?php $date1 = date('Y-m-d'); ?>
                                        <input type="date" required tabindex="2" class="form-control datepicker" name="eta" value="<?php echo $eta; ?>" id="date1"  />
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group row">
                                    <label for="date" class="col-sm-4 col-form-label"> Ocean Import Tracking date
                                        <i class="text-danger">*</i>
                                    </label>
                                    <div class="col-sm-8">
                                        <?php $date3 = date('Y-m-d'); ?>
                                        <input type="date" required tabindex="2" class="form-control datepicker" name="invoice_date" value="<?php echo $invoice_date; ?>" id="date3"  />
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6">
                               <div class="form-group row">
                                    <label for="adress" class="col-sm-4 col-form-label">Customer / Consignee
                                    </label>
                                    <div class="col-sm-8">
                              
                                       
                                 <select  id="adress" name="consignee" class="form-control " required="" tabindex="1"> 
                            
                                      <option value="<?php echo  $consignee; ?>"><?php echo  $customer; ?></option>  
                                         <option value=""></option>
                             <?php  foreach($c_name  as $customer){  ?>
                                            <option value="<?php  echo $customer['customer_id']   ?>"><?php  echo $customer['customer_name']   ?></option>
                                      <?php   }  ?>
                           </select>  

                         





                                    </div>
                                </div> 
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group row">
                                    <label for="etd" class="col-sm-4 col-form-label">Notify Party Email
                                        <i class="text-danger"></i>
                                    </label>
                                    <div class="col-sm-8">
                                    <input type="text" tabindex="3" class="form-control" name="notify_party" value="{notify_party}" placeholder="Notify Party" id="etd" />
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6">
                               <div class="form-group row">
                                    <label for="eta" class="col-sm-4 col-form-label">Vessel
                                    </label>
                                    <div class="col-sm-8">
                                    <textarea class="form-control" tabindex="4" id="eta" name="vessel" placeholder="Vessel" rows="1">{vessel}</textarea>
                                    </div>
                                </div> 
                            </div>
                        </div>




                         <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group row">
                                    <label for="shipping_line" class="col-sm-4 col-form-label">Voyage No.
                                        <i class="text-danger"></i>
                                    </label>
                                    <div class="col-sm-8">
                                    <input type="text" tabindex="3" class="form-control" name="voyage_no" value="{voyage_no}" placeholder="Voyage No." id="shipping_line" />
                                    </div>
                                </div>
                            </div>

                             <div class="col-sm-6">
                                <div class="form-group row">
                                    <label for="bl_number" class="col-sm-4 col-form-label">Port of loading
                                        <i class="text-danger"></i>
                                    </label>
                                    <div class="col-sm-8">
                                    <input type="text" tabindex="3" class="form-control" name="port_of_loading" value="{port_of_loading}" placeholder="Port of loading" id="bl_number" />
                                    </div>
                                </div>
                            </div>
                          
                        </div>


                          <div class="row">

                            <div class="col-sm-6">
                                <div class="form-group row">
                                    <label for="bl_number" class="col-sm-4 col-form-label">Port of discharge
                                        <i class="text-danger"></i>
                                    </label>
                                    <div class="col-sm-8">
                                    <input type="text" tabindex="3" class="form-control" name="port_of_discharge" value="{port_of_discharge}" placeholder="Port of discharge" id="" />
                                    </div>
                                </div>
                            </div>


                            <div class="col-sm-6">
                               <div class="form-group row">
                                    <label for="container_no" class="col-sm-4 col-form-label">Place of Delivery
                                          <i class="text-danger">*</i>
                                    </label>
                                    <div class="col-sm-8">
                                        
                                    <textarea class="form-control" tabindex="4" id="container_no" name="place_of_delivery" placeholder="Place of Delivery" rows="1">{place_of_delivery}</textarea>
                                  
                                    </div>
                                </div> 
                            </div>
                        
                           
                        </div>


                        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">


                         <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group row">
                                    <label for="etd" class="col-sm-4 col-form-label">Freight Forwarder
                                        <i class="text-danger"></i>
                                    </label>
                                    <div class="col-sm-8">
                                    <textarea class="form-control" tabindex="4" id="eta" name="freight_forwarder" placeholder="Freight Forwarder" rows="1">{freight_forwarder}</textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6">
                               <div class="form-group row">
                                    <label for="eta" class="col-sm-4 col-form-label">Particulars
                                    </label>
                                    <div class="col-sm-8">
                                    <textarea class="form-control" tabindex="4" id="eta" name="particulars" placeholder="Particulars" rows="1">{particular}</textarea>
                                    </div>
                                </div> 
                            </div>
                        </div>

                        <input type="hidden" id="invoice_hdn1"/>

                        <div class="row">

                             <div class="col-sm-6">
                               <div class="form-group row">
                                    <label for="eta" class="col-sm-4 col-form-label">BL / Shipment created date
                                    </label>
                                    <div class="col-sm-8">
                                           <?php $date2 = date('Y-m-d'); ?>
                                        <input type="date" required tabindex="2" class="form-control datepicker" name="bl_shipment" value="<?php echo $date2; ?>" id="date2"  />
                                    </div>
                                </div> 
                            </div>

                             <div class="col-sm-6">
                               <div class="form-group row">
                                    <label for="adress" class="col-sm-4 col-form-label">Attachements
                                    </label>
                                    <div class="col-sm-8">
                                       <input type="file" name="attachments" class="form-control">
                                    </div>
                                </div> 
                            </div>
                        </div>


                        <input type="hidden" id="invoice_hdn"/>

                        <div class="row">

                             <div class="col-sm-6">
                               <div class="form-group row">
                                    <label for="eta" class="col-sm-4 col-form-label">Country of Origin
                                          <i class="text-danger">*</i>
                                    </label>
                                    <div class="col-sm-8">
                                    <select class="selectpicker countrypicker form-control"  data-live-search="true" data-default="<?php echo $country_origin;  ?>"  name="country" id="country"></select>
                                    </div>
                                </div> 
                            </div>
                        </div>


                        <div class="row">

<div class="col-sm-12">
   <div class="form-group row">
        <label for="eta" class="col-sm-2 col-form-label">Remarks / Details
        </label>
        <div class="col-sm-10">
            <!-- <textarea class="form-control" rows="4" cols="50" name="remark" placeholder="Remarks / Details" ></textarea> -->
        
            <input class="form-control" rows="4" cols="50" id="remark" name="remark"   value="<?php echo $remarks; ?>"  placeholder="" rows="1"></input>

        </div>
  </div> 
</div>
</div>






                        



        <br>
        <div class="row">

<div class="col-sm-12">

      <style>
        #cke_remarks{
            display:none;
        }
        </style>
      
           
       
    </div> 

</div>

                        <div class="form-group row">
                            <div class="col-sm-6">
                               <input type="submit" id="add_purchase"   style="color:white;background-color:#38469f;"  class="btn btn-primary btn-large" name="add-ocean-import" value="<?php echo display('save') ?>" />
                                

                             
                               <a  style="color:white;background-color:#38469f;" id="final_submit" class='final_submit btn btn-primary'>Submit</a>

<a id="download" style="color:white;background-color:#38469f;" class='btn btn-primary'>Download</a>   
<a id="print" style="color:white;background-color:#38469f;" class='btn btn-primary'>Print</a>   
                            </div>
                        </div>



                    <?php echo form_close()?>
                    </div>
                </div>

            </div>
        </div>
		</div>
    </section>
	</div>
<!-- Purchase Report End -->
<input type="hidden" id="invoice_hdn"/>
<div class="modal fade" id="myModal1" role="dialog" >
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content" style="    margin-top: 190px;">
        <div class="modal-header" style="color:white;background-color:#38469f;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Expenses - Ocean Import</h4>
        </div>
        <div class="modal-body" style="font-weight:bold;text-align:center;">
          
          <h4>Ocean  Import Updated Successfully</h4>
     
        </div>
        <div class="modal-footer">
          
        </div>
      </div>
      
    </div>
  </div>

  <div class="modal fade" id="exampleModalLong" role="dialog" >
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content" style="    margin-top: 190px;">
        <div class="modal-header" style="color:white;background-color:#38469f;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Expenses - Ocean Import</h4>
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
				<h4 class="modal-title">Confirmation</h4>
			</div>
			<div class="modal-body">
				<p>Your Packing List is not submitted. Would you like to submit or discard
				</p>
				<p class="text-warning">
					<small>If you don't save, your changes will not be saved.</small>
				</p>
			</div>
			<div class="modal-footer">
            <input type="submit" id="ok" class="btn btn-primary pull-left final_submit" onclick="submit_redirect()"  value="Submit"/>
                <button id="btdelete" type="button" class="btn btn-danger pull-left" onclick="discard()">Discard</button>
			</div>
		</div>
	</div>
</div> 

<script src="https://cdn.ckeditor.com/4.17.1/standard/ckeditor.js"></script>


            <script type="text/javascript">
             CKEDITOR.replace('remarks');
         </script>




    <script type="text/javascript">
            var csrfName = '<?php echo $this->security->get_csrf_token_name();?>';
var csrfHash = '<?php echo $this->security->get_csrf_hash();?>';
        $(document).ready(function(){

            $('#final_submit').hide();
$('#download').hide();
$('#print').hide();
        
        });
        $('#insert_ocean').submit(function (event) {
    var dataString = {
        dataString : $("#insert_ocean").serialize()
    
   };
   dataString[csrfName] = csrfHash;
  
    $.ajax({
        type:"POST",
        dataType:"json",
        url:"<?php echo base_url(); ?>Cpurchase/insert_ocean_import",
        data:$("#insert_ocean").serialize(),

        success:function (data) {
        console.log(data);
        var split = data.split("/");
           
           
     
           $('#invoice_hdn').val(split[0]);
           $('#invoice_hdn1').val(split[1]);
       }

    });
    event.preventDefault();
});
$('#download').on('click', function (e) {
var link= $('#invoice_hdn').val();
console.log(link);
 var popout = window.open("<?php  echo base_url(); ?>Cpurchase/ocean_import_tracking_details_data/"+link);
 


});  
$('#print').on('click', function (e) {
var link= $('#invoice_hdn').val();
console.log(link);
 var popout = window.open("<?php  echo base_url(); ?>Cpurchase/ocean_import_tracking_details_data_print/"+link);
 


}); 
$('#add_purchase').on('click', function (e) {
    
    $('#myModal1').modal('show');
    window.setTimeout(function(){
        $('.modal').modal('hide');
       
$('.modal-backdrop').remove();
 },2500);

$('#final_submit').show();
$('#download').show();
$('#print').show();
});
function discard(){
   $.get(
    "<?php echo base_url(); ?>Cpurchase/delete_ocean_import/", 
   { val: $("#invoice_hdn1").val(), csrfName:csrfHash }, // put your parameters here
   function(responseText){
    console.log(responseText);
    window.btn_clicked = true;      //set btn_clicked to true
    var input_hdn="Your Booking No :"+$('#invoice_hdn1').val()+" has been Discarded";
  
    console.log(input_hdn);
    $('#myModal3').modal('hide');
    $("#bodyModal1").html(input_hdn);
        $('#exampleModalLong').modal('show');
    window.setTimeout(function(){
       

        window.location = "<?php  echo base_url(); ?>Ccpurchase/manage_ocean_import_tracking";
      }, 2000);
   }
); 
}
     function submit_redirect(){
        window.btn_clicked = true;      //set btn_clicked to true
        var input_hdn="Your Booking List No :"+$('#invoice_hdn1').val()+" has been saved Successfully";
  
    console.log(input_hdn);
    $('#myModal3').modal('hide');
    $("#bodyModal1").html(input_hdn);
        $('#exampleModalLong').modal('show');
    window.setTimeout(function(){
       

        window.location = "<?php  echo base_url(); ?>Ccpurchase/manage_ocean_import_tracking";
      }, 2000);
     }


$('#final_submit').on('click', function (e) {

    window.btn_clicked = true;      //set btn_clicked to true
    var input_hdn="Your Booking No :"+$('#invoice_hdn1').val()+" has been saved Successfully";
  
    console.log(input_hdn);
    $("#bodyModal1").html(input_hdn);
        $('#exampleModalLong').modal('show');
  window.setTimeout(function(){
       

        window.location = "<?php  echo base_url(); ?>Ccpurchase/manage_ocean_import_tracking";
      }, 2000);
       
});

window.onbeforeunload = function(){
    if(!window.btn_clicked){
       // window.btn_clicked = true; 
        $('#myModal3').modal('show');
       return false;
    }
}
    </script>

 






