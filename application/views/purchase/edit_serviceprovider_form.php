<!-- Product Purchase js -->
<script src="<?php echo base_url()?>my-assets/js/admin_js/json/product_purchase.js.php" ></script>
<!-- Supplier Js -->
<script src="<?php echo base_url(); ?>my-assets/js/admin_js/json/supplier.js.php" ></script>

<script src="<?php echo base_url()?>my-assets/js/admin_js/purchase.js" type="text/javascript"></script>
<script src="<?php echo base_url()?>my-assets/js/admin_js/trucking.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>my-assets/js/countrypicker.js" type="text/javascript"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

<!-- Add New Purchase Start -->
<div class="content-wrapper"> 
    <section class="content-header">
        <div class="header-icon">
            <i class="pe-7s-note2"></i>
        </div>
        <div class="header-title">
            <h1>Service Provider</h1>

           


        
            <ol class="breadcrumb">
                <li><a href="#"><i class="pe-7s-home"></i> <?php echo display('home') ?></a></li>
                <li><a href="#">Service Provider</a></li>
                <li class="active" style="color:orange">Edit Service Provider</li>
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
                      


            <form id="serviceprovider" method="post">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group row"> <label for="service_provider_name" class="col-sm-4 col-form-label">Service Provider Name <i class="text-danger">*</i> </label>
                            <div class="col-sm-8"> <input type="text" tabindex="3" class="form-control" name="service_provider_name" value="<?php  echo $service_provider_name; ?>" id="service_provider_name"> </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group row"> <label for="sp_address" class="col-sm-4 col-form-label">Service Provider complete address <i class="text-danger">*</i> </label>
                            <div class="col-sm-8"> <input type="text" tabindex="3" class="form-control" name="sp_address" value="<?php  echo $sp_address; ?>" id="sp_address" required /> </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group row"> <label for="payment_terms" class="col-sm-4 col-form-label">Payment Terms</label>
                            <div class="col-sm-8"> <input type="text" required tabindex="2" class="form-control " name="pay_terms" value="<?php  echo $payment_terms; ?>" id="payment_terms" required /> </div>
                        </div>
                    </div> <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
                    <div class="col-sm-6">
                        <div class="form-group row"> <label for="bill_number" class="col-sm-4 col-form-label">Bill Number <i class="text-danger">*</i> </label>
                            <div class="col-sm-8"> <input type="text" required tabindex="2" class="form-control " name="bill_num" value="<?php  echo $bill_number; ?>" id="bill_number" readonly required /> </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group row"> <label for="bill_date" class="col-sm-4 col-form-label">Bill Date <i class="text-danger">*</i> </label>
                            <div class="col-sm-8"> <input type="date" tabindex="2" class="form-control" value="<?php  echo $due_date; ?>" name="bill_date" id="bill_date" required /> </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group row"> <label for="due_date" class="col-sm-4 col-form-label">Due Date </label>
                            <div class="col-sm-8"> <input type="date" tabindex="2" class="form-control" name="due_date" value="<?php  echo $due_date; ?>" id="due_date" required /> </div>
                        </div>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table table-bordered table-hover serviceprovider" id="service_1">
                        <thead>
                            <tr>
                                <th class="text-center" width="15%">Account Category Name<i class="text-danger">*</i></th>
                                <th class="text-center">Account Category <i class="text-danger">*</i></th>
                                <th class="text-center">Account Sub category<i class="text-danger">*</i></th>
                                <th class="text-center" width="20%">Description<i class="text-danger">*</i></th>
                                <th class="text-center">Amount<i class="text-danger">*</i></th>
                                <th class="text-center"><?php echo display('action') ?></th>
                            </tr>
                        </thead>


                        <tbody id="servic_pro"> <?php $cnt=1;
                            foreach($details_info as $di){ ?> <tr>
                                <td class="span3 supplier"> <input type="text" required tabindex="2" class="form-control " name="account_category_name[]" value="<?php  echo $di['account_name'];  ?>" id="account_category_name_<?php echo $cnt; ?>" /> </td>
                                <td class="wt"> <input type="text" name="account_category[]" id="account_category_<?php echo $cnt; ?>" required="" min="0" class="form-control text-right store_cal_1" value="<?php  echo $di['account_category'];  ?>" placeholder="" value="" tabindex="6" /> </td>
                                <td class="text-right"> <input type="text" name="account_sub_category[]" id="account_sub_category_<?php echo $cnt; ?>" required="" min="0" class="form-control text-right" value="<?php  echo $di['acc_sub_category'];  ?>" tabindex="6" /> </td>
                                <td class="text-right"> <input type="text" name="description_service[]" id="description_<?php echo $cnt; ?>" required="" min="0" class="form-control text-right store_cal_1" placeholder="" value="<?php  echo $di ['description'];  ?>" tabindex="6" /> </td>
                                <td> <span class="input-symbol-euro"><input  style="width: 55%;" class="total_price form-control" type="text" name="total_price[]" id="total_price_<?php echo $cnt; ?>" value="<?php  echo $di['total_price'];  ?>" /> </td>
                                <td style="text-align:center;"> <button class='delete btn btn-danger' type='button' value='Delete'><i class="fa fa-trash"></i></button> </td> 
                               
                              
                        </tr>
                            <?php $cnt++; } ?>
                        </tbody>

                        <tfoot>


                            <tr>
                         <td style="text-align:right;" colspan="4"><b><?php echo display('total') ?>:</b></td>
                                <td style="text-align:left;">     <span class="input-symbol-euro">   <input type="text"  style="width: 55%;"  id="Total" class="form-control text-right" min="0" name="total" value="<?php echo $total; ?>" /> </td>
                            </tr>


                        </tfoot>

                    </table>
                </div>



                <div class="form-group row"> <label for="remarks" class="col-sm-2 col-form-label">Memo / Details</label>
                    <div class="col-sm-8"> <textarea rows="4" cols="50" name="memo_details" class=" form-control" placeholder="Memo/Details" id="" ><?php echo $details_info[0]['memo_details']; ?></textarea> </div>
                </div>
                <td> <input type="submit" id="add_trucking" class="btn btn-large" style="color:white;background-color:#38469f;" name="add-trucking" value="Save" /> </td>
            </form>
        </div>
</div>
</section>
<div class="modal fade" id="myModal1">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content" style="    margin-top: 190px;">
            <div class="modal-header" style="color:white;background-color:#38469f;"> <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Expenses</h4>
            </div>
            <div class="modal-body" id="bodyModal1" style="font-weight:bold;text-align:center;">
                <h4></h4>
            </div>
            <div class="modal-footer"> </div>
        </div>
    </div>
</div>

<script>
    var csrfName = '<?php echo $this->security->get_csrf_token_name();?>';
    var csrfHash = '<?php echo $this->security->get_csrf_hash();?>';
        $('#serviceprovider').submit(function (event) {
            event.preventDefault();
        var dataString = {
            dataString : $("#serviceprovider").serialize()
         
           
       };
       dataString[csrfName] = csrfHash;
      
        $.ajax({
            type:"POST",
            dataType:"json",
            url:"<?php echo base_url(); ?>Cpurchase/insert_service_provider",
            data:$("#serviceprovider").serialize(),
    
            success:function (data) {
            console.log(data);
       
                var split = data.split("/");
                $('#invoice_hdn1').val(split[0]);
             console.log(split[0]+"---"+split[1]);
         
                $('#invoice_hdn').val(split[1]);
                $("#bodyModal1").html('Updated Service Provider Successfully');
            
    $('.button_hide').show();
        $('#myModal1').modal('show');
        window.setTimeout(function(){
            $('.modal').modal('hide');
           
    $('.modal-backdrop').remove();
    $("#bodyModal1").html("");
    
    window.location.href =" <?php echo base_url()  ?>/Cpurchase/manage_purchase" 
    
    
    
     },2500);
    
    
           }
    
        });
    
      
    });
    
    
    
    $(document).on('keyup','.serviceprovider tbody tr:last',function (e) {
    
       var tid=$(this).closest('table').attr('id');
       const indexLast = tid.lastIndexOf('_');
       var id = tid.slice(indexLast + 1);
         var $last = $('#servic_pro  tr:last');
          // var num = id+"_"+$last.index() + 2;
           var num = id+($last.index()+1);
           
           $('#servic_pro tr:last').clone().find('input').attr('id', function(i, current) {
               return current.replace(/\d+$/, num);
               
           }).end().appendTo('#servic_pro');
           });
    
    $(document).on('keyup','.serviceprovider tbody tr:last',function (e) {
    
    var sum_total=0;
         $('.total_price').each(function() {
    var v=$(this).val();
      sum_total += parseFloat(v);
    });
    $('#Total').val(sum_total);
    });
    
    $(document).on('click', '.delete', function(){
    
        $(this).closest('tr').remove();
        var overall_sum=0;
         $('.table').find('.total_price').each(function() {
    var v=$(this).val();
      overall_sum += parseFloat(v);
   
    });
    $('#Total').val(overall_sum).trigger('change');
    });
    
</script>
<style>
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
</style>