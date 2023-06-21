

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> --> 
<script src="<?php echo base_url() ?>my-assets/js/admin_js/product_country.js" type="text/javascript"></script>
<style>
.panel-body{
  background: #ffffff;
}

.box {
  position: relative;
  background: #ffffff;
  width: 100%;
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
.box-header {
  color: #444;
  display: block;
  padding: 10px;
  position: relative;
  border-bottom: 1px solid #f4f4f4;
  margin-bottom: 10px;
}
.ui-selectmenu-text{
    display:none;
}
.box-tools {
  position: absolute;
  right: 10px;
  top: 5px;
}

.dropzone-wrapper {
  border: 2px dashed #91b0b3;
  color: #92b0b3;
  position: relative;
  height: 150px;
}

.dropzone-desc {
  position: absolute;
  margin: 0 auto;
  left: 0;
  right: 0;
  text-align: center;
  width: 40%;
  top: 50px;
  font-size: 16px;
}
.ui-front{
    display:none;
}


 .removebundle, .addbundle{
    padding: 10px 12px 10px 12px;
        border-radius:5px;
    }
.dropzone,
.dropzone:focus {
  position: absolute;
  outline: none !important;
  width: 100%;
  height: 150px;
  cursor: pointer;
  opacity: 0;
}

.dropzone-wrapper:hover,
.dropzone-wrapper.dragover {
  background: #ecf0f5;
}

.preview-zone {
  text-align: center;
}

.preview-zone .box {
  box-shadow: none;
  border-radius: 0;
  margin-bottom: 0;
}

</style>



<!-- Product Purchase js -->
<script src="<?php echo base_url()?>my-assets/js/admin_js/json/product_purchase.js.php" ></script>
<!-- Supplier Js -->
<script src="<?php echo base_url(); ?>my-assets/js/admin_js/json/supplier.js.php" ></script>

<script src="<?php echo base_url()?>my-assets/js/admin_js/purchase.js" type="text/javascript"></script>
<script src="https://cdn.ckeditor.com/4.17.1/standard/ckeditor.js"></script>
<script src="<?php echo base_url() ?>my-assets/js/countrypicker.js" type="text/javascript"></script>

<script src="<?php echo base_url() ?>my-assets/js/admin_js/invoice.js" type="text/javascript"></script>


<!-- Add New Purchase Start -->
<div class="content-wrapper" >
    <section class="content-header">
      
    </section>
    <?php    $payment_id=rand(); ?>
    <input type="hidden" id="po_payment_id" value="<?php echo $payment_id; ?>"/>
     <form id="histroy" style="display:none;" method="post" >
<input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
<input type="hidden"   name="payment_id" class="payment_id" id="payment_id"/>
<input type="submit" id="payment_history" name="payment_history" class="btn" style="float:right;color:white;background-color: #38469f;" value="Payment History" style="float:right;margin-bottom:30px;"/>
                                            </form>
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
      <?php 
            $this->session->unset_userdata('error_message');
            }
        ?>

         <div class="row">
		
            <div class="col-sm-12">
			<div class="panel panel-bd lobidrag">
			 <div class="panel-heading" style="height:60px;">
        <label for="ISF" class="col-sm-2 col-form-label"><?php echo display('Select Option');?>
            <i class="text-danger">*</i>
        </label>
          <div class="col-sm-2">
        <select name="po" class="form-control"  id="po" tabindex="3" >
                                             <option value="" selected disabled><?php  echo display('Select Option');?></option> 
                                              <option value="Not Available"> <?php echo display('add_purchase'); ?></option>
                                              <option value=" "><?php echo display('Service Provider');?> </option>
                             </select>
                               </div>
                                   <div class="col-sm-2">
                               <select name="expense_drop" class="form-control"  id="expense_drop" tabindex="3" >
                                             <option value="" selected disabled><?php  echo display('Select Option');?></option> 
											  <option value="not_found"><?php  echo 'Not Available';?></option>
                                           <?php  foreach($po as $p){   ?>
                                            <option value="<?php  echo $p['chalan_no'] ; ?>"><?php  echo $p['chalan_no'] ; ?></option>
                                            <?php   }  ?>
                             </select>
        </div>
       <div class="col-sm-4">   </div> 
          <div class="col-sm-2">
		   <a style="background-color:#38469f;color:white;" href="<?php echo base_url('Cpurchase/manage_purchase') ?>" class="btn  m-b-5 m-r-2"><i class="ti-align-justify"> </i> <?php echo display('manage_expense'); ?> </a>
   </div> 
                   
			
			  </div>  </div>  </div></div>
			
        <div class="row" id="main">
		
            <div class="col-sm-12">
               <div class="panel panel-bd lobidrag">
                    <div class="panel-heading">
          

                    <div class="panel-body">
                       
<div class="with_po">  
     <form id="insert_purchase"  method="post">
      
                                           </form>
                                           <script>
                                           $(document).ready(function(){
                                            $('.button_hide').hide();
                                           });
       $(document).on('keyup','.normalinvoice tbody tr:last',function (e) {

var tid=$(this).closest('table').attr('id');
const indexLast = tid.lastIndexOf('_');
var id = tid.slice(indexLast + 1);
   var $last = $('#addPurchaseItem_'+id + ' tr:last');
   var num = id+($last.index()+1);
    
    $('#addPurchaseItem_'+id  + ' tr:last').clone().find('input,select').attr('id', function(i, current) {
        return current.replace(/\d+$/, num);
        
    }).end().appendTo('#addPurchaseItem_'+id );
  
 $.each($('#normalinvoice_'+id  +  '> tbody > tr'), function (index, el) {
            $(this).find(".slab_no").val(index + 1); // Simply couse the first "prototype" is not counted in the list                
        })



        });



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

   $('#'+localStorage.getItem("delete_table")).find('.net_sq_ft').each(function() {
var v=$(this).val();
 if (!isNaN(v) && v.length !== 0) {
          sumnet += parseFloat(v);
        }

});
  $('#'+localStorage.getItem("delete_table")).find('.overall_net').val(sumnet.toFixed(3));


    var sumgross=0;

    $('#'+localStorage.getItem("delete_table")).find('.gross_sq_ft').each(function() {
var v=$(this).val();
 if (!isNaN(v) && v.length !== 0) {
          sumgross += parseFloat(v);
        }
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
 if (!isNaN(v) && v.length !== 0) {
  overall_sum += parseFloat(v);
 }
});
 $('#Over_all_Total').val(overall_sum).trigger('change');
localStorage.removeItem("delete_table");



 });
                                            $(document).on('click', '.delete1', function(){


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
   var sump=0;
    $('#'+localStorage.getItem("delete_table")).find('.total_price').each(function() {
var v=$(this).val();
 if (!isNaN(v) && v.length !== 0) {
  sump += parseFloat(v);
 }
});
  $('#'+localStorage.getItem("delete_table")).find('.b_total').val(sump).trigger('change');
   var sumnet=0;

   $('#'+localStorage.getItem("delete_table")).find('.net_sq_ft').each(function() {
var v=$(this).val();
 if (!isNaN(v) && v.length !== 0) {
          sumnet += parseFloat(v);
        }

});
  $('#'+localStorage.getItem("delete_table")).find('.overall_net').val(sumnet.toFixed(3));


    var sumgross=0;

    $('#'+localStorage.getItem("delete_table")).find('.gross_sq_ft').each(function() {
var v=$(this).val();
 if (!isNaN(v) && v.length !== 0) {
          sumgross += parseFloat(v);
        }

});
  $('#'+localStorage.getItem("delete_table")).find('.overall_gross').val(sumgross.toFixed(3));
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


var total_net=0;
 $('.table').each(function() {
    $(this).find('.net_sq_ft').each(function() {
        var precio = $(this).val();
        if (!isNaN(precio) && precio.length !== 0) {
          total_net += parseFloat(precio);
        }
      });

     


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

var t_price=0;
 $('.table').each(function() {
     $(this).find('.total_price').each(function() {
var vv=$(this).val();
console.log(vv);
 if (!isNaN(vv) && vv.length !== 0) {
  t_price += parseInt(vv);
 }
  console.log("t_price :"+t_price);

});
});
 $('#Over_all_Total').val(t_price).trigger('change');







gt1(id);


 });
       $(document).on('change','#product_tax', function (e) {

    
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
  var custo_amt=$('.custocurrency_rate').val(); 
  console.log("numhere :"+num +"-"+custo_amt);
  var value=num*custo_amt;
  var custo_final = isNaN(parseInt(value)) ? 0 : parseInt(value)
 $('#vendor_gtotal').val(custo_final);  
 calculate1();
 });
     function calculate1(){
 
 
var final_g= $('#final_gtotal').val();

var first=$("#Over_all_Total").val();
    var tax= $('#product_tax').val();

var field = tax.split('-');

var percent = field[1];
var answer=0;
  var answer =(parseInt(percent) / 100) * parseInt(first);
   console.log(answer);
   $('#tax_details').val(answer.toFixed(3) +" ( "+tax+" )");

  var gtotal = parseInt(first + answer);
  console.log(gtotal);
var amt=parseInt(answer)+parseInt(first);
 var num = isNaN(parseInt(amt)) ? 0 : parseInt(amt)
 var custo_amt=$('.custocurrency_rate').val();
 $("#gtotal").val(num);  
 console.log(num +"-"+custo_amt);
 localStorage.setItem("customer_grand_amount_sale",num);

 var value=num*custo_amt;
 var custo_final = isNaN(parseInt(value)) ? 0 : parseInt(value)
$('#vendor_gtotal').val(custo_final);
var bal_amt=custo_final-$('#amount_paid').val();
$('#balance').val(bal_amt);

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

     $(this).closest('table').find('.net_sq_ft').each(function() {
var v=$(this).val();
 if (!isNaN(v) && v.length !== 0) {
          sumnet += parseFloat(v);
        }

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

     $(this).closest('table').find('.total_price').each(function() {
var v=$(this).val();
  sum += parseFloat(v);

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

gt1(id);

});
function gt1(id){

var final_g= $('#final_gtotal').val();

var first=$("#Over_all_Total").val();
    var tax= $('#product_tax').val();

var field = tax.split('-');

var percent = field[1];
var answer=0;
  var answer =(parseInt(percent) / 100) * parseInt(first);
   console.log(answer);
   $('#tax_details').val(answer.toFixed(3) +" ( "+tax+" )");

  var gtotal = parseInt(first + answer);
  console.log(gtotal);
var amt=parseInt(answer)+parseInt(first);
 var num = isNaN(parseInt(amt)) ? 0 : parseInt(amt)
 var custo_amt=$('.custocurrency_rate').val();
 $("#gtotal").val(num);  
 console.log(num +"-"+custo_amt);
 localStorage.setItem("customer_grand_amount_sale",num);

 var value=num*custo_amt;
 var custo_final = isNaN(parseInt(value)) ? 0 : parseInt(value)
$('#vendor_gtotal').val(custo_final);
var bal_amt=custo_final-$('#amount_paid').val();
$('#balance').val(bal_amt);

}
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
      var t_rate=$('.custocurrency_rate').val();
   document.getElementById("paid_convert").value=
 	(amtpd /t_rate ).toFixed(2);
    document.getElementById("bal_convert").value=
 	(bal /t_rate ).toFixed(2);

      }
    });
      $('#add_payment_info')[0].reset();
      }

   });
   event.preventDefault();
});
                                               function paypls(){
    
$('#amount_to_pay').val($('#vendor_gtotal').val()-$('#amount_paid').val());
    $('#payment_modal').modal('show');

}
     $('#final_submit1').on('click', function (e) {

    window.btn_clicked = true;      //set btn_clicked to true
  var input_hdn="<?php echo  display('Your Invoice No')." :";?>"+$('#invoice_hdn').val()+"<?php echo  " ".display('has been saved Successfully');?>";
  
    console.log(input_hdn);
   
    $("#bodyModal1").html(input_hdn);
    $('#myModal1').modal('show');
    window.setTimeout(function(){
        $('.modal').modal('hide');
       
$('.modal-backdrop').remove();
 },2500);
    window.setTimeout(function(){
       

        window.location = "<?php  echo base_url(); ?>Cpurchase/manage_purchase";
      }, 2500);
       
});
                                            </script>
</div>
                  
<div class="without_po">
  
<form id="insert_purchase1"  method="post">
                        <div class="row">
                            <div class="col-sm-6">
                              <br/>
                               <div class="form-group row">
                                    <label for="supplier_sss" class="col-sm-4 col-form-label"><?php echo display('Vendor');?>
                                        <i class="text-danger">*</i>
                                    </label>
                                    <div class="col-sm-7">
                                        <select name="supplier_id" id="supplier_id" class="form-control "  style="width:100%;" required=""  tabindex="1">
                                            <option value=" "><?php echo display('select_one') ?></option>
                                            {all_supplier}
                                            <option value="{supplier_id}">{supplier_name}</option>
                                            {/all_supplier}
                                        </select>
                                    </div>
                                  <?php //if($this->permission1->method('add_supplier','create')->access()){ ?>
                                    <div class="col-sm-1">
                                          <a  class="client-add-btn btn btn-info" aria-hidden="true" data-toggle="modal"  style="color:white;background-color:#38469f;"   data-target="#add_vendor"><i class="fa fa-user"></i></a>
                                    </div>
                               <?php// }?> 
                                </div>
                                <div class="form-group row">
<label for="" class="col-sm-4 col-form-label" ><?php echo display('Vendor Type');?></label>
<div class="col-sm-8">
<input type="vendor_type" tabindex="3" class="form-control" name="vendor_type"  style="WIDTH: 100%;" placeholder="" id="vendor_type_details" />
 </div>
</div>                       </div>
                            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
                            <input type="hidden"    class="payment_id" name="payment_id"/>
                            <div class="col-sm-6">
                              <br/>
                                <div class="form-group row">
                                    <label for="" class="col-sm-4 col-form-label"> <?php echo display('Vendor Address');?>
                                        <i class="text-danger"></i>
                                    </label>
                                    <div class="col-sm-8">
                                    <textarea class="form-control" tabindex="4" id="vendor_add" rows="4" cols="50"  name="vendor_add" placeholder="" rows="1" required></textarea>
                                </div>
                                </div>
                            </div>
<div class="col-sm-6" id="">
<div class="form-group row">
<label for="date" class="col-sm-4 col-form-label"><?php echo display('invoice_no');  ?><i class="text-danger">*</i></label>
    <div class="col-sm-8">
    <input  class=" form-control" type="" size="50" name="invoice_no" id="" required value="" tabindex="4" />
                </div>
</div>
</div>
<div class="col-sm-6" id="">
<div class="form-group row">
<label for="text" class="col-sm-4 col-form-label"><?php echo display('Expenses / Bill date');?>
                                        <i class="text-danger">*</i>
                                    </label>
<div class="col-sm-5">
<input type="date"  style="width:165%;" required tabindex="2" class="form-control datepicker" name="bill_date"  placeholder="Expenses/Billdate"  value="" id="date"  />
</div>
</div>
</div>
</div>
<div class="row">
<div class="col-sm-6">
<div class="form-group row">
    <label for="port_of_discharge" class="col-sm-4 col-form-label"> <?php echo display('Port Of Discharge');?></label>
    <div class="col-sm-8">
    <input class="form-control" type="" size="50" name="Port_of_discharge" id="date1"   tabindex="4" />
    </div>
</div>
<div class="form-group row">
    <label for="date" class="col-sm-4 col-form-label"><?php echo display('Payment Due Date');?> <i class="text-danger">*</i></label>
    <div class="col-sm-8">
        <input class=" form-control" type="date" size="50" name="payment_due_date" id="payment_due_date" required value="" tabindex="4" />
    </div>
    </div>
    <input type="hidden" id="hidden_weight" name="hidden_weight"/>
<div class="form-group row">
    <label for="billing_address" class="col-sm-4     col-form-label"><?php echo display('Payment Terms');?>
    <i class="text-danger">*</i></label>
    <div class="col-sm-7">
        <select   name="payment_terms" id="payment_terms" style="width:100%;" class=" form-control" required placeholder='Payment Terms' id="payment_terms">
         <option value=""><?php echo display('Select Payment Terms');?></option>
        <option value="CAD">CAD</option>
        <option value="COD">COD</option>
        <option value="ADVANCE"><?php echo display('ADVANCE');?></option>
        <option value="7DAYS">7<?php echo display('DAYS');?></option>
        <option value="15DAYS">15<?php echo display('DAYS');?></option>
        <option value="30DAYS">30<?php echo display('DAYS');?></option>
        <option value="45DAYS">45<?php echo display('DAYS');?></option>
        <option value="60DAYS">60<?php echo display('DAYS');?></option>
        <option value="75DAYS">75<?php echo display('DAYS');?></option>
        <option value="90DAYS">90<?php echo display('DAYS');?></option>
        <option value="180DAYS">180<?php echo display('DAYS');?></option>
        <?php foreach($payment_terms as $inv){ ?>
          <option value="<?php echo $inv['payment_terms'] ; ?>"><?php echo $inv['payment_terms'] ; ?></option>
                               <?php    }?>
        </select>
    </div>
    <div class="col-sm-1">
        <a href="#" class="client-add-btn btn " aria-hidden="true" style="color:white;background-color:#38469f;"  data-toggle="modal" data-target="#payment_type_new" ><i class="fa fa-plus"></i></a>
    </div>
    </div>
<?php ?>
<div class="form-group row">
    <label for="payment_type" class="col-sm-4 col-form-label"><?php
        echo display('payment_type');
        ?> <i class="text-danger">*</i></label>
    <div class="col-sm-7">
        <select name="paytype_drop" id="paytype_drop" class="form-control" required=""  tabindex="3" style="width:100;">
        <option value=""><?php echo display('Select Payment Type');?></option>
        <option value="CHEQUE"><?php echo display('cheque'); ?></option>
    <option value="CASH"><?php echo display('cash'); ?></option>
    <option value="CREDIT/DEBIT CARD"><?php echo display('CREDIT/DEBIT CARD');?></option>
    <option value="BANK TRANSFER"><?php echo display('BANK TRANSFER');?></option>
<?php foreach($payment_type as $ptype){?>
    <option value="<?php echo $ptype['payment_type'];?>"><?php echo $ptype['payment_type'] ;?></option>
<?php }?>
        </select>
    </div>
      <div  class=" col-sm-1">
                                         <a href="#" class="client-add-btn btn btn-info" aria-hidden="true"  style="color:white;background-color:#38469f;"    data-toggle="modal" data-target="#payment_type" ><i class="fa fa-plus"></i></a>
    </div>
                                </div>
      <div class="form-group row">
          <label for="invoice_no" class="col-sm-4 col-form-label"> <?php echo display('ISF FIELD');?>
              <i class="text-danger">*</i></label>
         <div class="col-sm-8">
       <select name="isf_field" class="form-control"  id="isf_dropdown1" tabindex="3" style="width400%;">
                                          <option value=""selected><?php echo display('Select ISF NO');?></option>
                                          <option value="1"><?php echo display('NO') ?></option>
                                          <option value="2"><?php echo display('YES') ?></option>
                                       </select>
                </div>
</div>
<div class="form-group row" >
    <label for="ISF" class="isf_no1 col-sm-4 col-form-label" ><?php echo display('ISF NO');?>
        <i class="text-danger">*</i>
    </label>
    <div class="col-sm-8">
    <input name="isf_no"  class="isf_no1 form-control bankpayment"   style="width:100%;" value=""  >
    </div>
</div>
</div>
<div class="col-sm-6">
      <div class="form-group row">
    <label for="container_number" class="col-sm-4 col-form-label"><?php echo display('Container Number');?> <i class="text-danger">*</i></label>
    <div class="col-sm-8">
        <input type="text" name="container_no" class="form-control"  placeholder="Container Number">
    </div>
</div>
</div>
<div class="col-sm-6">
<div class="form-group row">
    <label for="date" class="col-sm-4 col-form-label"><?php echo display('B/L No');?><i class="text-danger">*</i></label>
    <div class="col-sm-8">
        <input type="text" name="bl_number" class="form-control"   placeholder="Bl Number">
    </div>
</div>
<div class="form-group row">
<label for="invoice_no" class="col-sm-4 col-form-label"><?php echo display('Estimated Time Of Arrival');?>
                                      
                                    </label>
                                       <div class="col-sm-8">
                                        <input type="date"  tabindex="2" class="form-control datepicker" name="eta" value="<?php echo $date1; ?>" id="date1"  />
                                    </div>
</div>
  <div class="form-group row">
    <label for="supplier_sss" class="col-sm-4 col-form-label"><?php echo display('Estimated Time Of Depature');?>
                                      
                                    </label>
                                        <div class="col-sm-8">
                                        <input type="date"  tabindex="2" class="form-control datepicker" name="etd" value="<?php echo $date; ?>" id="date"  />
                                    </div>
</div>

</div>
</div>
<br>
 <div class="table-responsive">
                       
<div id="content">

<table class="table normalinvoice table-bordered table-hover" id="normalinvoice_1" >
                                <thead>
                                     <tr>

                                            <th rowspan="2" class="text-center" style="width:180px;" ><?php echo display('product_name'); ?><i class="text-danger">*</i>  &nbsp;&nbsp; <a href="#" class="btn" style="color:white;background-color:#38469f;"  aria-hidden="true" data-toggle="modal" data-target="#product_info"><i class="ti-plus m-r-2"></i></a></th>
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
                                            <th rowspan="2"  style="width:90px;" class="text-center"><?php echo display('Cost per Sq.Ft');?></th>
                                            <th rowspan="2"  style="width:90px;" class="text-center"><?php echo display('Cost per Slab');?></th>
                                            <th rowspan="2"  style="width:90px;" class="text-center"><?php echo display('sales'); ?><br/><?php echo display('Price per Sq.Ft');?></th>
                                            <th rowspan="2"  style="width:90px;" class="text-center"><?php echo display('Sales Slab Price');?></th>
                                            <th rowspan="2" class="text-center"><?php echo display('Weight');?></th>
                                            <th rowspan="2" class="text-center"><?php echo display('Origin');?></th>
                                           
                                            <th rowspan="2" style="width: 110px" class="text-center"><?php  echo  display('total'); ?></th>
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
input{
    border:none;
}
textarea:focus, input:focus{
   
    outline: none;
}
 .text-right {
    text-align: left; 
}
.table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th {

padding:5px;
}
table {


  width: 100px;
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
#download_select:focus option:first-of-type , #print_select:focus option:first-of-type{
    display: none;
}
</style>
                                <tbody id="addPurchaseItem_1">
                                    <tr>
                                        <td>
                                            <input type="hidden" name="tableid[]" id="tableid_1"/>
                                         
                               

                           <input list="magicHouses" name="prodt[]" id="prodt_1"  class="form-control product_name"  style="width:160px;" placeholder="Search Product" />
	<datalist id="magicHouses">                    
                                      
                                            <?php 
                                       
                                            foreach($product_list as $tx){?>
                                       
                                                <option value="<?php echo $tx['product_name'].'-'.$tx['product_model'];?>">  <?php echo $tx['product_name'].'-'.$tx['product_model'];  ?></option>
                                           <?php } ?>
                                      

</datalist>


                                        <input type='hidden' class='common_product autocomplete_hidden_value  product_id_1' name='product_id[]' id='SchoolHiddenId_1' />
                                        </td>
                                         <td>
                                                <input type="text" id="bundle_no_1" name="bundle_no[]" required="" class="bundle_no form-control" />
                                            </td>
                                        <td>
                                                <input type="text" id="description_1" name="description[]" class="form-control" />
                                            </td>
                                        
                                            <td >
                                                <input type="text" name="thickness[]" id="thickness_1" required="" class="form-control"/>
                                            </td>
                                            <td>
                                                <input type="text" id="supplier_b_no_1" name="supplier_block_no[]" required="" class="form-control" />
                                            </td>
                                        
                                            <td >
                                                <input type="text"  id="supplier_s_no_1" name="supplier_slab_no[]" required="" class="form-control"/>
                                            </td>
                                           <td>
                                                <input type="text" id="gross_width_1" name="gross_width[]" required="" class="gross_width  form-control" />
                                            </td>
                                            <td>
                                                <input type="text" id="gross_height_1" name="gross_height[]"  required="" class="gross_height form-control" />
                                            </td>
                                        
                                            <td >
                                                <input type="text"   style="width:60px;" readonly id="gross_sq_ft_1" name="gross_sq_ft[]" class="gross_sq_ft form-control"/>
                                            </td>
                                           
                                        
                                            <td style="text-align:center;" >
                                                 <input type="text"   style="width:20px;" value="1" class="slab_no" id="slab_no_1" name="slab_no[]"  readonly  required=""/> 
                                            </td>
                                            <td>
                                                <input type="text" id="net_width_1" name="net_width[]"  required="" class="net_width form-control" />
                                            </td>
                                            <td>
                                                <input type="text" id="net_height_1" name="net_height[]"   required="" class="net_height form-control" />
                                            </td>
                                            <td >
                                                <input type="text"   style="width:60px;" readonly id="net_sq_ft_1" name="net_sq_ft[]" class="net_sq_ft form-control"/>
                                            </td>
                                            <td>

           
  <span class="input-symbol-euro"><input type="text" id="cost_sq_ft_1"  name="cost_sq_ft[]" readonly  style="width:60px;" value="0.00"  class="cost_sq_ft form-control" ></span>

                                        
                                            <td >
                     
      <span class="input-symbol-euro"> <input type="text"  id="cost_sq_slab_1" name="cost_sq_slab[]" readonly   style="width:60px;" value="0.00"  class="form-control"/></span>
 


                                               
                                            </td>
                                            <td>
                                        
         <span class="input-symbol-euro">  <input type="text" id="sales_amt_sq_ft_1"  name="sales_amt_sq_ft[]"  style="width:70px;"  value="0.00" class="sales_amt_sq_ft form-control" /></span>



                                               
                                            </td>
                                        
                                            <td >
                                    
      <span class="input-symbol-euro">   <input type="text"  id="sales_slab_amt_1" name="sales_slab_amt[]"  style="width:70px;" value="0.00"  class="sales_slab_amt form-control"/></td> </span>
  


                                             
                                            </td>
                                            <td>
                                                <input type="text" id="weight_1" name="weight[]"  class="weight form-control" />
                                            </td>
                                        
                                            <td >
                                                <input type="text"  id="origin_1" name="origin[]" class="origin form-control"/>
                                            </td>

                                            <td >
                                               <span class="input-symbol-euro"><input  type="text" class="total_price form-control" style="width:80px;" readonly  value="0.00"  id="total_amt_1"     name="total_amt[]"/></span>
                                            </td>
                                          
                                            <td style="text-align:center;">
                                                <button  class='btn btn-danger delete' id="delete_1" type='button' value='Delete' ><i class="fa fa-trash"></i></button>
                                            </td>
                                            
                                            </tr>
                                            </tbody>
                                <tfoot>



                                    <tr>
                                   <td style="text-align:right;" colspan="8"><b><?php  echo display('Gross Sq.Ft');?> :</b></td>
                                        <td >
             <input type="text" id="overall_gross_1" name="overall_gross[]"   class="overall_gross form-control" style="width: 60px"  readonly="readonly"  /> 
            </td>
             <td style="text-align:right;" colspan="3"><b><?php  echo display('Net Sq.Ft');?> :</b></td>
                                        <td >
             <input type="text" id="overall_net_1" name="overall_net[]"  class="overall_net form-control"  style="width: 60px"  readonly="readonly"  /> 
            </td>
              <td style="text-align:right;" colspan="4"><b><?php  echo display('Weight');?> :</b></td>
                                        <td >
             <input type="text" id="overall_weight_1" name="overall_weight[]"  class="overall_weight form-control"  style="width: 60px"  readonly="readonly"  /> 
            </td>

                                        <td style="text-align:right;" colspan="1"><b><?php  echo display('total'); ?> :</b></td>
                                        <td >
           <span class="input-symbol-euro">    <input type="text" id="Total_1" name="total[]"   class="b_total form-control"  style="width: 80px" value="0.00"  readonly="readonly"  /> </span>
            </td>
                        
                                           
                                    </tr>
                                

                                            </tfoot>

                            </table>
                          <i id="buddle_1" class="addbundle fa fa-plus" style=" padding: 10px 12px 10px 12px;margin-right: 18px;float:right;color:white;background-color:#38469f;"   onclick="addbundle(); "aria-hidden="true"></i>
                               
                         </div>
                             <table class="taxtab table table-bordered table-hover">
                        <tr>
                        <td class="hiden" style="width:28%;border:none;text-align:end;font-weight:bold;">
                            <?php  echo display("Live Rate");?> : 
                         </td>
                

<td class="hiden" style="width:12%;text-align-last: center;padding:5px;background-color: #38469f;border:none;font-weight:bold;color:white;">1 <?php  echo $curn_info_default;  ?>
                                 = <input style="width: 80px;text-align:center;color:black;padding:5px;" type="text" class="custocurrency_rate"/>&nbsp;<label for="custocurrency" style="color:white;background-color: #38469f;"></label></td>
                    <td style="border:none;text-align:right;font-weight:bold;"><?php  echo display('Tax');?> : 
                                 </td>
                                <td style="width:15%">
<select name="tx"  id="product_tax" class="form-control" >
<option value="Select the Tax" selected="selected"><?php  echo display('Select the Tax');?></option>
<?php foreach($tax as $tx){?>
  
    <option value="<?php echo $tx['tax_id'].'-'.$tx['tax'].'%';?>">  <?php echo $tx['tax_id'].'-'.$tx['tax'].'%';  ?></option>
<?php } ?>
</select>
</td>
<td  style="width:20%;"></td>
</tr>
</table>







   <input type="hidden" id="paid_convert" name="paid_convert"/>   <input type="hidden" id="bal_convert" name="bal_convert"/>

<table border="0" style="table-layout: auto;" class="overall table table-bordered table-hover">
    <tr>
        <td   style="vertical-align:top;text-align:right;border:none;"></td>
        <td  style="text-align:right;border:none;"></td>
         <td  style="text-align:right;border:none;"></td>
         <td  style="text-align:right;border:none;"> </td>
</tr>
  <tr>
        <td  colspan="2" style="vertical-align:top;text-align:right;border:none;"><b><?php  echo display('Overall TOTAL');?> :</b></td>
        <td colspan="1" style="border:none;padding-bottom: 40px;"><span class="input-symbol-euro"><input type="text" id="Over_all_Total" name="Over_all_Total"  style="width:230px;" class="form-control" value="0.00"  readonly="readonly"  /> </span></td>
         <td colspan="4" style="width:150px;text-align:right;border:none;"><b><?php  echo display('TAX DETAILS');?> :</b></td><td colspan="1" style="border:none;">  <span class="input-symbol-euro">     <input type="text" class="form-control" style="width:150px;"  id="tax_details" value="0.00" name="tax_details"  readonly="readonly" /></span></td>
</tr>
   <tr>
        <td  colspan="2" style="vertical-align:top;text-align:right;border:none;"><b><?php  echo display('Overall Gross Sq.Ft');?> :</b></td>
        <td colspan="1" style="border:none;"><input type="text" id="total_gross" name="total_gross"   class="form-control"   readonly="readonly"  /> </td>
         <td colspan="4" style="text-align:right;border:none;"><b><?php  echo display('GRAND TOTAL');?> :</b></td><td colspan="1" style="border:none;">  <span class="input-symbol-euro">    <span class="input-symbol-euro">   <input type="text" id="gtotal"   class="form-control" style="width:150px;" name="gtotal" value="0.00"  readonly="readonly" /></td>
</tr>
    <tr>
        <td  colspan="2" style="vertical-align:top;text-align:right;border:none;"><b><?php  echo display('Overall Net Sq.Ft');?> :</b></td>
        <td colspan="1" style="border:none;"><input type="text" id="total_net" name="total_net"  class="form-control"    readonly="readonly"  /> </td>
         <td colspan="4" style="text-align:right;border:none;"><b><?php  echo display('GRAND TOTAL');?> :</b><br/><b><?php  echo display('Preferred Currency');?></b></td><td colspan="1" style="border:none;"> <table><tr> <td class="cus" name="cus" style="width: 40px;"></td><td>&nbsp</td> <td><input  type="text"  readonly id="vendor_gtotal"     name="vendor_gtotal"  required   /></td></tr></table></td>
</tr>

    <tr>
        <td colspan="2"  style="vertical-align:top;text-align:right;border:none;"><b><?php  echo display('Overall Weight');?> :</b></td><td colspan="1" style="border:none;"><input type="text" id="total_weight" name="total_weight"   class="form-control"   readonly="readonly"  /></td>
       
   <td colspan="4" class="amt" style="text-align:right;border:none;"><b><?php  echo display('Amount Paid');?> :</b></td><td style="border:none;"> 
                                        <table border="0">
      <tr class="amt">

        <td class="cus" name="cus" style="width: 40px;"></td><td>&nbsp</td>
<td> <input  type="text"  readonly id="amount_paid" style="width:-webkit-fill-available;"  name="amount_paid"  required   /></td> 
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
        <td class="cus" name="cus" style="border:none;width: 40px;"></td>  <td>&nbsp</td><td style="border:none;">
                                          <input  type="text"   readonly id="balance"  name="balance"  required   />                     
                                            </td>     </tr>
   </table>
              </td>
              </tr>

 
 
                                          </td>
          </tr>

  

                                            <input type="hidden" id="final_gtotal"  name="final_gtotal" />

                                            <input type="hidden" name="baseUrl" class="baseUrl" value="<?php echo base_url();?>"/></td>
                                  
                                    <!-- -->
                                   
                                            <tr style="border-right:none;border-left:none;border-bottom:none;border-top:none">
                                               
                                            <td colspan="21" style="text-align: end;">
                                        <input type="submit" value="<?php echo display('Make Payment') ?>" style="color:white;background-color: #38469f;" class="btn btn-large" id="paypls"/>
                                            </td>
                                            </tr>
                                          </tfoot>
                          </table>
                      </div>





                      
                        <div class="row">
                        <div class="col-sm-12">
                               <div class="form-group row">
                                    <label for="adress" class="col-sm-2 col-form-label"><?php echo  display('Remarks / Details');?>
                                    </label>
                                    <div class="col-sm-10">
                                    <textarea class="form-control" rows="4" cols="50" id="remark" name="remark" placeholder="Remarks" rows="1"></textarea>
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
                                        <textarea class="form-control" rows="4" cols="50" id="adress" name="message_invoice" placeholder="Message on Invoice" rows="1"></textarea>
                                    </div>
                                </div> 
                            </div>
                     

             <div class="col-sm-12">
                        <div class="form-group row" style="   margin-top: 1%;">
                           <table>
                             
                                           <tr>
                                   
                                    <td>
                                   
                                        <input type="submit" id="add_purchase" style="color:white;background-color: #38469f;" class="btn btn-large" name="add-packing-list" value="<?php  echo  display('save'); ?>" />
                                            </td>
                                            

                                            <td class="button_hide"> 
 
                               <a    id="final_submit" style="color:white;background-color: #38469f;" class='final_submit btn'><?php echo display('submit'); ?></a>
                                            </td>
                                           
                                  <td class="button_hide">         
 <select name="download_select" id="download_select" class="form-control" style="color:white;background-color: #38469f;width: auto;" >
                                        <option value="Download" selected><?php echo display('download'); ?></option>
                                             <option value="Invoice" ><?php echo  display('New Invoice');?></option>
                                                <option value="Packing" ><?php echo  display('Packing List');?></option>
                                        </select>
                                        

   </td>       
<td></td>
                   <td class="button_hide">

 <select name="print_select" id="print_select" class="form-control" style="color:white;background-color: #38469f;width: auto;" >
                                        <option value="Print" selected><?php echo display('print');  ?></option>
                                            <option value="Invoice" ><?php echo  display('New Invoice');?></option>
                                                <option value="Packing" ><?php echo  display('Packing List');?></option>
                                        </select>


                   </td>                   
                                 

                                    
                                    
                                </tr>
                                            </table>
                        </div>
						  </div> </div>


</form>
</div>
  <div id="service_provider_data">
 <div class="panel-body">
                <form id="serviceprovider"  method="post">
                    <div class="row">
                         <div class="col-sm-6">
                            <div class="form-group row">
                                <label for="service_provider_name" class="col-sm-4 col-form-label"><?php  echo  display('Service Provider Name');?>
                                    <i class="text-danger">*</i>
                                </label>
                                <div class="col-sm-8">
                                 <input type="text" tabindex="3" class="form-control" name="service_provider_name"  required=""    id="service_provider_name"   >
                                </div>
                            </div>
                        </div>
                         <div class="col-sm-6">
                            <div class="form-group row">
                                <label for="sp_address" class="col-sm-4 col-form-label"><?php  echo  display('Service Provider complete address');?>
                                    <i class="text-danger">*</i>
                                </label>
                                <div class="col-sm-8">
                                    <input type="text" tabindex="3" class="form-control" name="sp_address"  id="sp_address" required="" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group row">
                                <label for="payment_terms" class="col-sm-4 col-form-label"><?php  echo  display('Payment Terms');?><i class="text-danger">*</i></label>
                                <div class="col-sm-7">
                                   <select   name="pay_terms" id="payment_terms" style="width:100%;" class=" form-control" required placeholder='Payment Terms' id="payment_terms">
         <option value=""><?php echo display('Select Payment Terms');?></option>
        <option value="CAD">CAD</option>
        <option value="COD">COD</option>
        <option value="ADVANCE"><?php echo display('ADVANCE');?></option>
        <option value="7DAYS">7<?php echo display('DAYS');?></option>
        <option value="15DAYS">15<?php echo display('DAYS');?></option>
        <option value="30DAYS">30<?php echo display('DAYS');?></option>
        <option value="45DAYS">45<?php echo display('DAYS');?></option>
        <option value="60DAYS">60<?php echo display('DAYS');?></option>
        <option value="75DAYS">75<?php echo display('DAYS');?></option>
        <option value="90DAYS">90<?php echo display('DAYS');?></option>
        <option value="180DAYS">180<?php echo display('DAYS');?></option>
        <?php foreach($payment_terms as $inv){ ?>
          <option value="<?php echo $inv['payment_terms'] ; ?>"><?php echo $inv['payment_terms'] ; ?></option>
                               <?php    }?>
        </select>
         </div>
    <div class="col-sm-1">
        <a href="#" class="client-add-btn btn " aria-hidden="true" style="color:white;background-color:#38469f;"  data-toggle="modal" data-target="#payment_type_new" ><i class="fa fa-plus"></i></a>
    </div>

                            </div>
                            </div>
                        
                        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
                        <div class="col-sm-6">
                           <div class="form-group row">
                                <label for="bill_number" class="col-sm-4 col-form-label"><?php  echo  display('Bill Number');?> <i class="text-danger">*</i>
                                </label>
                                <div class="col-sm-8">
                                <input type="text" required tabindex="2" class="form-control " name="bill_num"  id="bill_number" required="" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group row">
                            <label for="bill_date" class="col-sm-4 col-form-label"><?php  echo  display('Bill Date');?>
                                    <i class="text-danger">*</i>
                                </label>
                        <div class="col-sm-8">
                               <input type="date" tabindex="2" class="form-control" name="bill_date" id="bill_date" required/>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                           <div class="form-group row">
                           <label for="due_date" class="col-sm-4 col-form-label"><?php  echo  display('Due Date');?>
                              <i class="text-danger">*</i>    
                          </label>
                                                                    <div class="col-sm-8">
                                                                    <input type="date" tabindex="2" class="form-control" name="due_date"  id="due_date"  required/>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover serviceprovider" id="service_1">
                            <thead>
                                 <tr>
                                        <th class="text-center" width="15%"><?php  echo  display('Account Category Name');?><i class="text-danger">*</i></th>
                                        <th class="text-center"><?php  echo  display('Account Category'); ?><i class="text-danger">*</i></th>
                                        <th class="text-center"><?php  echo  display('Account Sub category');?><i class="text-danger">*</i></th>
                                        <th class="text-center" width="20%"><?php echo display('description'); ?><i class="text-danger">*</i></th>
                                        <th class="text-center"><?php echo display('amount'); ?><i class="text-danger">*</i></th>
                                        <th class="text-center"><?php echo display('action') ?></th>
                                    </tr>
                            </thead>
                            <tbody id="servic_pro">
                                <tr>
                                    <td class="span3 supplier">
                                     <input type="text" required tabindex="2" class="acc_name form-control " name="account_category_name[]"  id="account_category_name_1"/>
                                    </td>
                                    <td class="wt">
                                        <input type="text" name="account_category[]" id="account_category_1" required="" min="0" class="form-control text-right store_cal_1"   placeholder="" value=""  tabindex="6"/>
                                    </td>
                                    <td class="text-right">
                                        <input type="text" name="account_sub_category[]" id="account_sub_category_1" required="" min="0" class="form-control text-right" value=""  tabindex="6"/>
                                    </td>
                                    <td class="text-right">
                                    <input type="text" name="description_service[]" id="description_1" required="" min="0" class="form-control text-right store_cal_1"   placeholder="" value=""  tabindex="6"/>
                                   </td>
                                   <td>
                                  <span class="input-symbol-euro"> <input class="total_price form-control" type="text"   name="total_price[]" id="total_price_1"  placeholder="0.00"  /></span>
                                   </td>
                                            <td style="text-align:center;">
                                            <button  class='delete_provider btn btn-danger' type='button' value='Delete'><i class="fa fa-trash"></i></button>
                                            </td>
                                            </tr>
</tbody>
<tfoot>
 <tr style="height:50px;">
   <td style="text-align:right;" colspan="4" ><b><?php echo display('total') ?>:</b></td>
   <td style="text-align:left;">
<span class="input-symbol-euro"><input type="text" id="Total" class="form-control text-right" placeholder="0.00"  min="0"    name="total" value="<?php echo $total; ?>" /> </span>
 </td>
</tr>
</tfoot>
</table>
</div>
                    <div class="form-group row">
                        <label for="remarks" class="col-sm-2 col-form-label"><?php echo display('Memo / Details');?></label>
                        <div class="col-sm-8">
                            <textarea rows="4" cols="50" name="memo_details" class=" form-control" placeholder="Memo/Details" id=""></textarea>
                        </div>
                    </div>
        

                   
                    <td>
        <input type="submit" id="add-supplier-from-expense" name="add-supplier-from-expense"  style="color:white;background-color:#38469f;"  class="btn" value="<?php echo display('save') ?>">
    <a   style="color:white;background-color:#38469f;" id="final_submit_provider" class='final_submit__provider btn btn-primary'><?php echo display('submit'); ?></a>
<a id="download_provider"        style="color:white;background-color:#38469f;" class='btn btn-primary'><?php  echo  display('download'); ?></a>
<a id="print_provider"        style="color:white;background-color:#38469f;" class='btn btn-primary'><?php  echo  display('print'); ?></a>                   
      </td>


                                   </form>
</div>
</div>  





<input type="hidden" id="invoice_hdn"/> <input type="hidden" id="invoice_hdn1"/><input type="hidden" id="servic_id_hidden"/>
                    </div>
                </div>
</div>
            </div>
        </div> 
    </section>
       
            <div class="modal fade" id="myModal1" >
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content" style="    margin-top: 190px;">
        <div class="modal-header" style="color:white;background-color:#38469f;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><?php  echo display('purchase'); ?></h4>
        </div>
        <div class="modal-body" id="bodyModal1" style="font-weight:bold;text-align:center;">
          
          <h4></h4>
     
        </div>
        <div class="modal-footer">
          
        </div>
      </div>
      
    </div>
  </div>

  <!-- Pack  Modal -->
    
  

   <div id="packmodal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content" style="width: 163%;">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Choose your Package </h4>
      </div>
      <div class="modal-body">
        <table class="table table-bordered">
            <tr>
                <th>Choose your Package   </th>
                <th>Sno</th>
                <th>Novice No</th>
                <th>Expense Packing ID</th>
                <th>Gross Weight</th>
                <th>Container NO</th>
                   <th>Thickness</th>
                 <th>Invoice Date</th>               
            </tr>
            <?php 
            $i=0;
            foreach($packinglist as $pack)
                { ?>

            <tr>
                <td><input type="radio" name="packing" id="packing" onclick="packing('<?php echo $pack['invoice_no']; ?>')" ></td>
                <td><?php echo $j=$i+1; ?></td>
                <td><?php echo $pack['invoice_no']; ?></td>
                <td><?php echo $pack['expense_packing_id']; ?></td>
                <td><?php echo $pack['gross_weight']; ?></td>
                
                <td><?php echo $pack['container_no']; ?></td>
                <td><?php echo $pack['thickness']; ?></td>
                <td><?php echo $pack['invoice_date']; ?></td>

            </tr>
        <?php $i++; } ?>
        </table>
      </div>
      
    </div>

  </div>
</div>

<!-- Modal -->
<!-- Purchase Report End -->
<div class="modal fade model success " id="add_vendor" role="dialog">
<div class="modal-dialog modal-lg" role="document">
  <div class="modal-content">
      <div class="modal-header"  style="color:white;background-color:#38469f;">
          <a href="#" class="close" data-dismiss="modal" >&times;</a>
          <h3 class="modal-title"  ><?php echo  display('Add New Vendor');?></h3>
      </div>
      <div class="modal-body">
      <form id="insert_supplier"  method="post">
          <div id="customeMessage" class="alert hide"></div>
  <div class="panel-body">
      <div class="col-sm-6">
      <div class="form-group row">
      <label for="" class="col-sm-4  col-form-label"><?php echo  display('Vendor Type');?><i class="text-danger">*</i></label>
      <div class="col-sm-8">
                <select   name="vendor_type"  class=" form-control" placeholder=''  required="" id="vendor_type" >
                 <option value=""> <?php echo  display('Selected vendor type');?></option>
                 <option value="productsupplier"><?php echo  display('Product Supplier');?></option>
                 <option value="servicevendor"> <?php echo  display('Service Vendor');?></option>
                 <option value="others"> <?php echo  display('others');  ?></option>
                </select>
                </div>
                </div>
                <div class="form-group row">
                            <label for="supplier_name" class="col-sm-4 col-form-label"> <?php echo  display('Company Name');?><i class="text-danger">*</i></label>
                            <div class="col-sm-8">
                                <input class="form-control" name ="supplier_name" id="supplier_name" type="text" placeholder="Company Name"  required="" tabindex="1">
                            </div>
                        </div>
      <div class="form-group row">
          <label for="mobile" class="col-sm-4 col-form-label"> <?php  echo display('mobile'); ?><i class="text-danger"></i></label>
          <div class="col-sm-8">
              <input class="form-control" name="mobile" id="mobile" type="number" placeholder=" Mobile"  min="0" tabindex="2">
          </div>
      </div>
          <div class="form-group row">
          <label for="phone" class="col-sm-4 col-form-label"><?php echo  display('Business Phone');?><i class="text-danger">*</i></label>
          <div class="col-sm-8">
              <input class="form-control" name="phone" id="phone" type="number" placeholder="Business Phone"   required="" min="0" tabindex="2">
          </div>
      </div>
       <div class="form-group row">
          <label for="email" class="col-sm-4 col-form-label"><?php echo  display('primary Email');?> <i class="text-danger">*</i></label>
          <div class="col-sm-8">
              <input class="form-control" name="email" id="email" type="email" placeholder="primary Email"    required="" tabindex="2">
          </div>
      </div>
       <div class="form-group row">
          <label for="emailaddress" class="col-sm-4 col-form-label"><?php echo  display('Secondary Email');?> <i class="text-danger"></i></label>
          <div class="col-sm-8">
              <input class="form-control" name="emailaddress" id="emailaddress" type="email" placeholder="Secondary Email"  >
          </div>
      </div>
        <div class="form-group row">
          <label for="contact" class="col-sm-4 col-form-label"><?php echo  display('Contact Person');?><i class="text-danger"></i></label>
          <div class="col-sm-8">
              <input class="form-control" name="contact" id="contact" type="text" placeholder="Contact Person"  >
          </div>
      </div>
      <div class="form-group row">
          <label for="fax" class="col-sm-4 col-form-label"><?php echo display('fax'); ?> <i class="text-danger"></i></label>
          <div class="col-sm-8">
              <input class="form-control" name="fax" id="fax" type="text" placeholder="<?php echo display('fax') ?>"  >
          </div>
      </div>
    
                                        <div class="form-group row">
            <label for="previous_balance" class="col-sm-4 col-form-label"><?php echo display('currency'); ?></label>

            <div class="col-sm-8">
            <!-- <select id="currency" name="currency1" style="width: 100%;"     > -->
            <select  class="form-control" id="currency" name="currency1"  style="width: 100%;" required=""  style="max-width: -webkit-fill-available;">

 <option value="USD">USD - US Dollar - $</option>
    <option value="AFN">AFN - Afghan Afghani - ؋</option>
    <option value="ALL">ALL - Albanian Lek - Lek</option>
    <option value="DZD">DZD - Algerian Dinar - دج</option>
    <option value="AOA">AOA - Angolan Kwanza - Kz</option>
    <option value="ARS">ARS - Argentine Peso - $</option>
    <option value="AMD">AMD - Armenian Dram - ֏</option>
    <option value="AWG">AWG - Aruban Florin - ƒ</option>
    <option value="AUD">AUD - Australian Dollar - $</option>
    <option value="AZN">AZN - Azerbaijani Manat - m</option>
    <option value="BSD">BSD - Bahamian Dollar - B$</option>
    <option value="BHD">BHD - Bahraini Dinar - .د.ب</option>
    <option value="BDT">BDT - Bangladeshi Taka - ৳</option>
    <option value="BBD">BBD - Barbadian Dollar - Bds$</option>
    <option value="BYR">BYR - Belarusian Ruble - Br</option>
    <option value="BEF">BEF - Belgian Franc - fr</option>
    <option value="BZD">BZD - Belize Dollar - $</option>
    <option value="BMD">BMD - Bermudan Dollar - $</option>
    <option value="BTN">BTN - Bhutanese Ngultrum - Nu.</option>
    <option value="BTC">BTC - Bitcoin - ฿</option>
    <option value="BOB">BOB - Bolivian Boliviano - Bs.</option>
    <option value="BAM">BAM - Bosnia-Herzegovina Convertible Mark - KM</option>
    <option value="BWP">BWP - Botswanan Pula - P</option>
    <option value="BRL">BRL - Brazilian Real - R$</option>
    <option value="GBP">GBP - British Pound Sterling - £</option>
    <option value="BND">BND - Brunei Dollar - B$</option>
    <option value="BGN">BGN - Bulgarian Lev - Лв.</option>
    <option value="BIF">BIF - Burundian Franc - FBu</option>
    <option value="KHR">KHR - Cambodian Riel - KHR</option>
    <option value="CAD">CAD - Canadian Dollar - $</option>
    <option value="CVE">CVE - Cape Verdean Escudo - $</option>
    <option value="KYD">KYD - Cayman Islands Dollar - $</option>
    <option value="XOF">XOF - CFA Franc BCEAO - CFA</option>
    <option value="XAF">XAF - CFA Franc BEAC - FCFA</option>
    <option value="XPF">XPF - CFP Franc - ₣</option>
    <option value="CLP">CLP - Chilean Peso - $</option>
    <option value="CNY">CNY - Chinese Yuan - ¥</option>
    <option value="COP">COP - Colombian Peso - $</option>
    <option value="KMF">KMF - Comorian Franc - CF</option>
    <option value="CDF">CDF - Congolese Franc - FC</option>
    <option value="CRC">CRC - Costa Rican ColÃ³n - ₡</option>
    <option value="HRK">HRK - Croatian Kuna - kn</option>
    <option value="CUC">CUC - Cuban Convertible Peso - $, CUC</option>
    <option value="CZK">CZK - Czech Republic Koruna - Kč</option>
    <option value="DKK">DKK - Danish Krone - Kr.</option>
    <option value="DJF">DJF - Djiboutian Franc - Fdj</option>
    <option value="DOP">DOP - Dominican Peso - $</option>
    <option value="XCD">XCD - East Caribbean Dollar - $</option>
    <option value="EGP">EGP - Egyptian Pound - ج.م</option>
    <option value="ERN">ERN - Eritrean Nakfa - Nfk</option>
    <option value="EEK">EEK - Estonian Kroon - kr</option>
    <option value="ETB">ETB - Ethiopian Birr - Nkf</option>
    <option value="EUR">EUR - Euro - €</option>
    <option value="FKP">FKP - Falkland Islands Pound - £</option>
    <option value="FJD">FJD - Fijian Dollar - FJ$</option>
    <option value="GMD">GMD - Gambian Dalasi - D</option>
    <option value="GEL">GEL - Georgian Lari - ლ</option>
    <option value="DEM">DEM - German Mark - DM</option>
    <option value="GHS">GHS - Ghanaian Cedi - GH₵</option>
    <option value="GIP">GIP - Gibraltar Pound - £</option>
    <option value="GRD">GRD - Greek Drachma - ₯, Δρχ, Δρ</option>
    <option value="GTQ">GTQ - Guatemalan Quetzal - Q</option>
    <option value="GNF">GNF - Guinean Franc - FG</option>
    <option value="GYD">GYD - Guyanaese Dollar - $</option>
    <option value="HTG">HTG - Haitian Gourde - G</option>
    <option value="HNL">HNL - Honduran Lempira - L</option>
    <option value="HKD">HKD - Hong Kong Dollar - $</option>
    <option value="HUF">HUF - Hungarian Forint - Ft</option>
    <option value="ISK">ISK - Icelandic KrÃ³na - kr</option>
    <option value="INR">INR - Indian Rupee - ₹</option>
    <option value="IDR">IDR - Indonesian Rupiah - Rp</option>
    <option value="IRR">IRR - Iranian Rial - ﷼</option>
    <option value="IQD">IQD - Iraqi Dinar - د.ع</option>
    <option value="ILS">ILS - Israeli New Sheqel - ₪</option>
    <option value="ITL">ITL - Italian Lira - L,£</option>
    <option value="JMD">JMD - Jamaican Dollar - J$</option>
    <option value="JPY">JPY - Japanese Yen - ¥</option>
    <option value="JOD">JOD - Jordanian Dinar - ا.د</option>
    <option value="KZT">KZT - Kazakhstani Tenge - лв</option>
    <option value="KES">KES - Kenyan Shilling - KSh</option>
    <option value="KWD">KWD - Kuwaiti Dinar - ك.د</option>
    <option value="KGS">KGS - Kyrgystani Som - лв</option>
    <option value="LAK">LAK - Laotian Kip - ₭</option>
    <option value="LVL">LVL - Latvian Lats - Ls</option>
    <option value="LBP">LBP - Lebanese Pound - £</option>
    <option value="LSL">LSL - Lesotho Loti - L</option>
    <option value="LRD">LRD - Liberian Dollar - $</option>
    <option value="LYD">LYD - Libyan Dinar - د.ل</option>
    <option value="LTL">LTL - Lithuanian Litas - Lt</option>
    <option value="MOP">MOP - Macanese Pataca - $</option>
    <option value="MKD">MKD - Macedonian Denar - ден</option>
    <option value="MGA">MGA - Malagasy Ariary - Ar</option>
    <option value="MWK">MWK - Malawian Kwacha - MK</option>
    <option value="MYR">MYR - Malaysian Ringgit - RM</option>
    <option value="MVR">MVR - Maldivian Rufiyaa - Rf</option>
    <option value="MRO">MRO - Mauritanian Ouguiya - MRU</option>
    <option value="MUR">MUR - Mauritian Rupee - ₨</option>
    <option value="MXN">MXN - Mexican Peso - $</option>
    <option value="MDL">MDL - Moldovan Leu - L</option>
    <option value="MNT">MNT - Mongolian Tugrik - ₮</option>
    <option value="MAD">MAD - Moroccan Dirham - MAD</option>
    <option value="MZM">MZM - Mozambican Metical - MT</option>
    <option value="MMK">MMK - Myanmar Kyat - K</option>
    <option value="NAD">NAD - Namibian Dollar - $</option>
    <option value="NPR">NPR - Nepalese Rupee - ₨</option>
    <option value="ANG">ANG - Netherlands Antillean Guilder - ƒ</option>
    <option value="TWD">TWD - New Taiwan Dollar - $</option>
    <option value="NZD">NZD - New Zealand Dollar - $</option>
    <option value="NIO">NIO - Nicaraguan CÃ³rdoba - C$</option>
    <option value="NGN">NGN - Nigerian Naira - ₦</option>
    <option value="KPW">KPW - North Korean Won - ₩</option>
    <option value="NOK">NOK - Norwegian Krone - kr</option>
    <option value="OMR">OMR - Omani Rial - .ع.ر</option>
    <option value="PKR">PKR - Pakistani Rupee - ₨</option>
    <option value="PAB">PAB - Panamanian Balboa - B/.</option>
    <option value="PGK">PGK - Papua New Guinean Kina - K</option>
    <option value="PYG">PYG - Paraguayan Guarani - ₲</option>
    <option value="PEN">PEN - Peruvian Nuevo Sol - S/.</option>
    <option value="PHP">PHP - Philippine Peso - ₱</option>
    <option value="PLN">PLN - Polish Zloty - zł</option>
    <option value="QAR">QAR - Qatari Rial - ق.ر</option>
    <option value="RON">RON - Romanian Leu - lei</option>
    <option value="RUB">RUB - Russian Ruble - ₽</option>
    <option value="RWF">RWF - Rwandan Franc - FRw</option>
    <option value="SVC">SVC - Salvadoran ColÃ³n - ₡</option>
    <option value="WST">WST - Samoan Tala - SAT</option>
    <option value="SAR">SAR - Saudi Riyal - ﷼</option>
    <option value="RSD">RSD - Serbian Dinar - din</option>
    <option value="SCR">SCR - Seychellois Rupee - SRe</option>
    <option value="SLL">SLL - Sierra Leonean Leone - Le</option>
    <option value="SGD">SGD - Singapore Dollar - $</option>
    <option value="SKK">SKK - Slovak Koruna - Sk</option>
    <option value="SBD">SBD - Solomon Islands Dollar - Si$</option>
    <option value="SOS">SOS - Somali Shilling - Sh.so.</option>
    <option value="ZAR">ZAR - South African Rand - R</option>
    <option value="KRW">KRW - South Korean Won - ₩</option>
    <option value="XDR">XDR - Special Drawing Rights - SDR</option>
    <option value="LKR">LKR - Sri Lankan Rupee - Rs</option>
    <option value="SHP">SHP - St. Helena Pound - £</option>
    <option value="SDG">SDG - Sudanese Pound - .س.ج</option>
    <option value="SRD">SRD - Surinamese Dollar - $</option>
    <option value="SZL">SZL - Swazi Lilangeni - E</option>
    <option value="SEK">SEK - Swedish Krona - kr</option>
    <option value="CHF">CHF - Swiss Franc - CHf</option>
    <option value="SYP">SYP - Syrian Pound - LS</option>
    <option value="STD">STD - São Tomé and Príncipe Dobra - Db</option>
    <option value="TJS">TJS - Tajikistani Somoni - SM</option>
    <option value="TZS">TZS - Tanzanian Shilling - TSh</option>
    <option value="THB">THB - Thai Baht - ฿</option>
    <option value="TOP">TOP - Tongan pa'anga - $</option>
    <option value="TTD">TTD - Trinidad & Tobago Dollar - $</option>
    <option value="TND">TND - Tunisian Dinar - ت.د</option>
    <option value="TRY">TRY - Turkish Lira - ₺</option>
    <option value="TMT">TMT - Turkmenistani Manat - T</option>
    <option value="UGX">UGX - Ugandan Shilling - USh</option>
    <option value="UAH">UAH - Ukrainian Hryvnia - ₴</option>
    <option value="AED">AED - United Arab Emirates Dirham - إ.د</option>
    <option value="UYU">UYU - Uruguayan Peso - $</option>
   
    <option value="UZS">UZS - Uzbekistan Som - лв</option>
    <option value="VUV">VUV - Vanuatu Vatu - VT</option>
    <option value="VEF">VEF - Venezuelan BolÃvar - Bs</option>
    <option value="VND">VND - Vietnamese Dong - ₫</option>
    <option value="YER">YER - Yemeni Rial - ﷼</option>
    <option value="ZMK">ZMK - Zambian Kwacha - ZK</option>
</select>
</div>
  </div>


  </div>
  <div class="col-sm-6">
<div class="form-group row">
      <label for="" class="col-sm-4 col-form-label"><?php echo  display('Tax Collected');?><i class="text-danger">*</i></label>
          <div class="col-sm-8">
             <select  style="width: 100%;"  class="form-control"   required name="service_provider">
             
              <option value="1"><?php  echo display('yes'); ?></option>
              <option value="0" selected><?php  echo display('no'); ?></option>
             </select>
          </div>
        </div>
  <div class="form-group row">
          <label for="state" class="col-sm-4 col-form-label"><?php  echo display('state'); ?> <i class="text-danger">*</i></label>
          <div class="col-sm-8">
              <input class="form-control" name="state" id="state" type="text"  placeholder="State"  required>
          </div>
      </div>
       <div class="form-group row">
          <label for="zip" class="col-sm-4 col-form-label"><?php echo display('zip'); ?> <i class="text-danger">*</i></label>
          <div class="col-sm-8">
              <input class="form-control" name="zip" id="zip" type="text" required placeholder="<?php echo display('zip') ?>"  >
          </div>
      </div>
      <div class="form-group row">
                                    <label for="country" class="col-sm-4 col-form-label"><?php echo display('country'); ?><i class="text-danger">*</i></label>
                                    <div class="col-sm-8">
                                    <select class="selectpicker countrypicker form-control"  data-live-search="true" data-default="United States"  name="country" id="country"    style="width: 100%;" ></select>
                                    </div>
                        </div>
      <div class="form-group row">
          <label for="address " class="col-sm-4 col-form-label"><?php echo display('address') ?></label>
          <div class="col-sm-8">
              <textarea class="form-control" name="address" id="address " rows="2" placeholder="Address" ></textarea>
          </div>
      </div>
      <div class="form-group row">
          <label for="details" class="col-sm-4 col-form-label"><?php echo display('supplier_details') ?></label>
          <div class="col-sm-8">
              <textarea class="form-control" name="details" id="details" rows="2" placeholder="<?php echo display('supplier_details') ?>" tabindex="4"></textarea>
          </div>
      </div>
      <div class="form-group row">
          <label for="previous_balance" class="col-sm-4 col-form-label"><?php  echo  display('Credit Limit');?></label>
          <div class="col-sm-8">
              <input class="form-control" name="previous_balance" id="previous_balance" type="text" min="0" placeholder="Credit Limit" tabindex="5">
          </div>
      </div>
	    <div class="form-group row">
          <label for="city" class="col-sm-4 col-form-label"><?php echo display('city'); ?> <i class="text-danger"></i></label>
          <div class="col-sm-8">
              <input class="form-control" name="city" id="city" type="text" placeholder="<?php echo display('city') ?>"  >
          </div>
      </div>
  <div class="form-group row">
                    <label for="billing_address" class="col-sm-4  col-form-label"><?php echo  display('Payment Terms');?> <i class="text-danger">*</i></label>
                    <div class="col-sm-8">
                    <select name="payment_terms"  id="terms"  class="form-control "  placeholder="" style="width:100%;"  required="" tabindex="1" >
          <option value=""><?php echo  display('Select the payment terms');?></option>
    <option value="cod">COD</option>
    <option value="30"> 30-<?php echo  display('Days');?></option>
    <option value="60"> 60-<?php echo  display('Days');?></option>
    <option value="90"> 90-<?php echo  display('Days');?></option>
    <option value="45"> 45-<?php echo  display('Days');?></option>
                                         <?php
                                            foreach($paymentterms_add as $cn){?>
                                                <option value="<?php echo $cn['paymentterms_add'];?>">  <?php echo $cn['paymentterms_add'];  ?></option>
                                           <?php } ?>
                                        </select>
                                        </div>
                                        </div>
  </div>

<input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">

  <div class="form-group row">
                                    <label for="adress" class="col-sm-4 col-form-label"><?php echo  display('Attachments');?>
                                    </label>
                                    <div class="col-sm-8">
                                       <input type="file" name="attachments"  style="width:96%;"   class="form-control">
                                    </div>
                                </div>
                                </div>
<div class="modal-footer">
                          <a href="#" class="btn" style="color:white;background-color:#38469f;"  data-dismiss="modal"><?php echo  display('Close');?></a>
                          <input type="submit" id="add-supplier-from-expense" name="add-supplier-from-expense"  style="color:white;background-color:#38469f;"  class="btn" value="<?php echo  display('submit');?>">
                      </div>
                         </form>
                      </div>
                  </div>
              </div>
          </div>



        
    <!------ add new product-->
<form id="insert_product"  method="post">
     <div class="modal fade" id="product_info" role="dialog">
<div class="modal-dialog">
<div class="modal-content" style="width: 150%; height: 140%;">
 <div class="modal-header" style="color:white;background-color:#38469f;">
     <a href="#" class="close" data-dismiss="modal">&times;</a>
     <h3 class="modal-title"><?php echo display('add_new_product');  ?></h3>
 </div>
 <div class="modal-body">
     <div id="customeMessage" class="alert hide"></div>
       <form action="ada">
       <div class="panel-body">

        <input type ="hidden" name="csrf_test_name" id="" value="<?php echo $this->security->get_csrf_hash();?>">

    <div class="col-sm-6">
                     <div class="form-group row">
                         <label for="product_name" class="col-sm-4 col-form-label"><?php echo display('product_name') ?> <i class="text-danger">*</i></label>
                         <div class="col-sm-8">
                             <input class="form-control" name="product_name" type="text" id="product_name" placeholder="<?php echo display('product_name') ?>" required tabindex="1" >
                         </div>
                     </div>
                 </div>



                     <div class="col-sm-6">
                         <div class="form-group row">
                             <label for="barcode_or_qrcode" class="col-sm-4 col-form-label"><?php echo display('barcode_or_qrcode') ?> <i class="text-danger"></i></label>
                             <div class="col-sm-8">
                              <?php  $product_id = rand();  ?>
                                <input type="text" tabindex="3" class="form-control"  style="width: 100%;" name="barcode"
                      placeholder="Barcode/QR-code" id="barcode"  />
    <input type="hidden" tabindex="3" class="form-control"  style="width: 100%;" name="product_id" value="<?php echo  $product_id; ?>"
                      placeholder="Barcode/QR-code" id="product_id"  />
                             </div>
                         
                      </div>
                 </div>


                 
                
        <div class="col-sm-6">
                         <div class="form-group row">
                             <label for="quantity" class="col-sm-4 col-form-label"><?php echo  display('Quantity');?> <i class="text-danger">*</i></label>
                             <div class="col-sm-8">
                                 <input class="form-control" name="quantity" type="number" id="quantity" placeholder="Enter Product Quantity only" required tabindex="1" >
                             </div>
                         </div>
             
                     </div>


                     <div class="col-sm-6">
                         <div class="form-group row">
                             <label for="product_model" class="col-sm-4 col-form-label"><?php echo display('model') ?> <i class="text-danger">*</i></label>
                             <div class="col-sm-8">
                                 <input type="text" tabindex="" class="form-control" id="product_model" name="model" required placeholder="<?php echo display('model') ?>" />
                             </div>
                         </div>
                     </div>
                     <div class="col-sm-6">
                         <div class="form-group row">
                             <label for="category_id" class="col-sm-4 col-form-label"><?php echo display('category') ?></label>
                             <div class="col-sm-7">
                                 <select class="form-control" id="category_id" style="width: 250px;"  name="category_id" tabindex="3">
                                     <option value=""><?php echo  display('Select the Category'); ?></option>
                                     <?php if ($category_list) { ?>
                                         {category_list}
                                         <option value="{category_name}">{category_name}</option>
                                         {/category_list}
                                     <?php } ?>
                                 </select>
                             </div>
                     </div>
                             </div>
                     <div class="col-sm-6">
                         <div class="form-group row">
                             <label for="sell_price" class="col-sm-4 col-form-label"><?php echo display('sell_price') ?> <i class="text-danger">*</i> </label>
                             <div class="col-sm-8">
                                 <input class="form-control" id="sell_price" name="price" type="text" required="" placeholder="0.00" tabindex="5" min="0">
                             </div>
                         </div>
                     </div>
                     <div class="col-sm-6">
                         <div class="form-group row">
                             <label for="" class="col-sm-4 col-form-label"><?php echo display('Supplier') ?> <i class="text-danger">*</i> </label>
                             <div class="col-sm-7">
                             <select name="supplier_id" id="supplier_id" class="form-control " style="width:118%;" required="" tabindex="1">
                                     <option value=""><?php echo  display('Select supplier');  ?></option>
                                     {all_supplier}
                                     <option value="{supplier_id}">{supplier_name}</option>
                                     {/all_supplier}
                                 </select>
                                     </div>
                                   </div>
                         </div>
                     <div class="col-sm-6">
                         <div class="form-group row">
                             <label for="unit" class="col-sm-4 col-form-label"><?php echo display('unit') ?></label>
                             <div class="col-sm-7">
                                 <select class="form-control" id="unit" name="unit"  style="width:250px;" tabindex="-1" aria-hidden="true">
                                     <option value=""><?php echo  display('Select the Unit');?></option>
                                     <?php if ($unit_list) { ?>
                                         {unit_list}
                                         <option value="{unit_name}">{unit_name}</option>
                                         {/unit_list}
                                     <?php } ?>
                                 </select>
                             </div>
                         </div>
                 </div>
                


                 <div class="row">
           <div class="col-sm-12">
                     <div class="col-sm-6">
                     <div class="form-group row">
                             <label for="account_category_name" class="col-sm-4 col-form-label"><?php echo  display('Account Category Name');?></label>
                             <div class="col-sm-8">
                             <input class="form-control" name ="account_category_name" id="account_category_name" type="text" placeholder=" Account Category Name"   tabindex="1" >
                             </div>
                         </div>
                     </div>


<div class="col-sm-6">
                     <div class="form-group row">
                             <label for="account_sub_category"  class="col-sm-4 col-form-label"><?php echo  display('Account Sub Category');?></label>
                             <div class="col-sm-8">
                             <input class="form-control" name ="account_sub_category" id="account_sub_category" type="text" placeholder=" Account Sub Category"  tabindex="1" >
                             </div>
                         </div>
                     </div>
</div>
                 </div>


                 <div class="row">
                    <div class="col-sm-12">
                     <div class="col-sm-6">
                         <div class="form-group row">
<label for="account_category" class="col-sm-4 col-form-label"><?php echo  display('Account Category');?></label>
<div class="col-sm-8">
<select id="ddl"  name="account_category" class="form-control" onchange="configureDropDownLists(this,document.getElementById('ddl2'))">
<option value=""><?php echo  display('Select the Account Category');?></option>
<option value="1000 ASSETS">1000 <?php echo  display('ASSETS');?></option>
<option value="1200 RECEIVABLES">1200 <?php echo  display('RECEIVABLES');?></option>
<option value="1300 INVENTORIES">1300 <?php echo  display('INVENTORIES');?></option>
<option value="1400 PREPAID EXPENSES & OTHER CURRENT ASSETS">1400 <?php echo  display('PREPAID EXPENSES & OTHER CURRENT ASSETS');?></option>
<option value="1500 PROPERTY PLANT & EQUIPMENT">1500 <?php echo  display('PROPERTY PLANT & EQUIPMENT');?></option>
<option value="1600 ACCUMULATED DEPRECIATION & AMORTIZATION">1600 <?php echo  display('ACCUMULATED DEPRECIATION & AMORTIZATION');?></option>
<option value="1700 NON – CURRENT RECEIVABLES">1700 <?php echo  display('NON – CURRENT RECEIVABLES');?></option>
<option value="1800 INTERCOMPANY RECEIVABLES & OTHER NON-CURRENT ASSETS">1800 <?php echo  display('INTERCOMPANY RECEIVABLES & OTHER NON-CURRENT ASSETS');?></option>
<option value="2000 LIABILITIES & 2100 PAYABLES">2000 <?php echo  display('LIABILITIES & PAYABLES');?></option>
<option value="2200 ACCRUED COMPENSATION & RELATED ITEMS">2200 <?php echo  display('ACCRUED COMPENSATION & RELATED ITEMS');?></option>
<option value="2300 OTHER ACCRUED EXPENSES">2300 <?php echo  display('OTHER ACCRUED EXPENSES');?></option>
<option value="2500 ACCRUED TAXES">2500 <?php echo  display('ACCRUED TAXES');?></option>
<option value="2600 DEFERRED TAXES">2600 <?php echo  display('DEFERRED TAXES');?></option>
<option value="2700 LONG-TERM DEBT">2700 <?php echo  display('LONG-TERM DEBT');?></option>
<option value="2800 INTERCOMPANY PAYABLES & OTHER NON CURRENT LIABILITIES & OWNERS EQUITIES">2800 <?php echo  display('INTERCOMPANY PAYABLES & OTHER NON CURRENT LIABILITIES & OWNERS EQUITIES');?></option>
<option value="4000 REVENUE">4000 <?php echo  display('REVENUE');?></option>
<option value="5000 COST OF GOODS SOLD">5000 <?php echo  display('COST OF GOODS SOLD');?></option>
<option value="6000 – 7000 OPERATING EXPENSES">6000 – 7000 <?php echo  display('OPERATING EXPENSES');?></option>
</select>
</div>
                     </div>
                     </div>



                 

                      <div class="col-sm-6">
                     <div class="form-group row">
<label for="product_sub_category" class="col-sm-4 col-form-label"><?php echo  display('Product Sub Category');?><i class="text-danger">*</i></label>
<div class="col-sm-8">
<select   name="product_sub_category" id="product_sub_category" class=" form-control" required placeholder="product_sub_category" style="width:100%;">
<option value=""><?php echo  display('Select the Product Sub Category');?></option>
<option value="Granite"><?php echo  display('Granite');?></option>
<option value="Marble"><?php echo  display('Marble');?></option>
<option value="Quartz"><?php echo  display('Quartz');?></option>
<option value="Quartzite"><?php echo  display('Quartzite');?></option>
<option value="Lime Stone"><?php echo  display('Lime Stone');?></option>
<option value="Dolomite"><?php echo  display('Dolomite');?></option>
<option value="Sand Stone"><?php echo  display('Sand Stone');?></option>
<option value="Soap Stone"><?php echo  display('Soap Stone');?></option>
</select>
</div>
                     </div>
                 </div>


                    </div>
                 </div>

<div class="col-sm-6">
                     <div class="form-group row">
                             <label for="sub_category"  class="col-sm-4 col-form-label"><?php echo  display('Account Sub Category');?></label>
                             <div class="col-sm-8">
                             <select class="form-control" name="sub_category" id="ddl2">
                         <option value="Select Sub Category"><?php echo  display('Select Sub Category');?></option>
            </select>
                     </div>
              </div>
                     </div>
                     <div class="col-sm-6">
                         <div class="form-group row">
                             <label for="image" class="col-sm-4 col-form-label"><?php echo  display('Product Image');?> </label>
                             <div class="col-sm-8">
                                 <input type="file" name="product_image" class="form-control" id="product_image"  tabindex="4">
                             </div>
                         </div>
                         </div>
                         <div class="row">
                         <div class="col-sm-12">
                         <div class="col-sm-6">
                         <div class="form-group row">
                             <label for="cost_per_sqft" class="col-sm-4 col-form-label"><?php echo  display('Cost per Sq.Ft');?> </label>
                             <div class="col-sm-8">
                                 <input type="text" name="costpersqft" class="form-control" id="cost_per_sqft" tabindex="4" placeholder="cost persqft" />
                             </div>
                         </div>
                         <div class="form-group row">
                             <label for="cost_per_slab" class="col-sm-4 col-form-label"><?php echo  display('Cost per Slab');?> </label>
                             <div class="col-sm-8">
                                 <input type="text" name="costperslab" class="form-control" id="cost_per_slab" tabindex="4" placeholder="Cost per Slab" />
                             </div>
                         </div>
                         </div>
                         <div class="col-sm-6">
                      <div class="form-group row">
                          <label for="sales_price" class="col-sm-4 col-form-label"><?php echo display("sales");?>
                            <?php echo  display(' Price per Sq.Ft');?> </label>
                          <div class="col-sm-8">
                              <input type="text" name="salespricepersqft" class="form-control" id="sales_price_per_sqft" tabindex="4"  placeholder=" Sales Price perSq.Ft" />
                          </div>
                      </div>
                      <div class="form-group row">
                          <label for="sales_slab_price" class="col-sm-4 col-form-label"><?php echo  display('Sales Slab Price');?> </label>
                          <div class="col-sm-8">
                              <input type="text" name="salesslabprice" class="form-control" id="sales_slab_price" tabindex="4" placeholder=" Sales Slab Price"  />
                          </div>
                      </div>
                      </div>
                         </div>
 </div>
 <div class="row">
                    <div class="col-sm-12">
                     <div class="col-sm-6">
                       <div class="form-group row">
                       <label for="tax_id" class="col-sm-4 col-form-label"><?php   echo  display('Taxes');?> </label>
<div class="col-sm-8">
<input type="text" name="tax" class="form-control" id="tax_id" tabindex="4" placeholder=" Tax" />
     </div>
 </div>
</div>


<div class="col-sm-6">
<div class="form-group row">
                             <label for="country" class="col-sm-4 col-form-label"><?php echo display('country'); ?></label>
                             <div class="col-sm-8">


              <select class="selectpicker countpicker form-control"  data-live-search="true" data-default="US-United States"
  name="country" id="country" ></select>  

                         </div>
                         </div>
                      </div>






                     <div class="col-sm-6">
                     <div class="form-group row">
                         <label for="serial_no" class="col-sm-4 col-form-label"><?php  echo  display('Serial No');?></label>
                         <div class="col-sm-8">
                             <input type="text" tabindex="" class="form-control " id="serial_no" name="serial_no" placeholder="111,abc,XYz"   />
                         </div>
                     </div>
                 </div>




<div class="row">
     <div class="col-sm-12">
         <center><label for="description" class="col-form-label"><?php echo display('product_details') ?></label></center>
         <textarea class="form-control" name="description" id="description" rows="2" placeholder="<?php echo display('product_details') ?>" tabindex="2"></textarea>
     </div>
 </div><br>
 <div class="form-group row">
 <div class="col-sm-6"></div>
     <div class="col-sm-6" style="text-align: -webkit-right;">
     <a href="#" class="btn" style="color:white;background-color:#38469f;" data-dismiss="modal"><?php echo display('close');  ?></a>
         <input type="submit" id="add-product" style="color:white;background-color:#38469f;" class="btn btn-primary btn-large" name="insert_product" value="<?php echo display('save') ?>" tabindex="10"/>
           </div>
        </div>
    </div>
 </div>

</div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
   </div><!-- /.modal -->
   </form>
   



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
            <input type="submit" id="final_submit" class="btn btn-primary pull-left final_submit" onclick="submit_redirect()"  value="Submit"/>
                <button id="btdelete" type="button" class="btn btn-danger pull-left" onclick="discard()"><?php  echo  display('Discard');?></button>
			</div>
		</div>
	</div>
</div>
</div><!-- /.modal -->

<div class="modal fade" id="payment_modal" >
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content" style="    margin-top: 190px;">
        <div class="modal-header" style="color:white;background-color:#38469f;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><?php echo  display('add_payment'); ?></h4>
        </div>
        <div class="modal-body">
          
   
<form id="add_payment_info"  method="post" >  
            <div class="row">


<div class="form-group row">

        <label for="date" style="text-align:end;" class="col-sm-3 col-form-label"><?php  echo  display('payment_date'); ?> <i class="text-danger">*</i></label>

        <div class="col-sm-5">
 <?php
                                        $date = date('Y-m-d');
                                        ?>
            <input class=" form-control" type="date"  name="payment_date" id="payment_date" required value="<?php echo html_escape($date); ?>" tabindex="4" />

        </div>

    </div>
<input type="hidden" id="cutomer_name" name="cutomer_name"/>
<input type="hidden"   class="payment_id"  name="payment_id"/>
 <div class="form-group row">

        <label for="billing_address" style="text-align:end;" class="col-sm-3 col-form-label"><?php  echo  display('Reference No'); ?><i class="text-danger">*</i></label>

        <div class="col-sm-5">
        <input class=" form-control" type="text"  name="ref_no" id="ref_no" required   />
</div>
 </div> 
    <div class="form-group row">
      <label for="bank" style="text-align:end;" class="col-sm-3 col-form-label"><?php  echo  display('Select Bank'); ?>:<i class="text-danger">*</i></label>
<a data-toggle="modal" href="#add_bank_info"  style="color:white;background-color:#38469f;" class="btn btn-primary"><i class="fa fa-university"></i></a>
      <div class="col-sm-5">
  <select name="bank" id="bank"  class="form-control bankpayment" >
<option value="Axis Bank Ltd.">Axis Bank Ltd.</option>
<option value="Bandhan Bank Ltd.">Bandhan Bank Ltd.</option>
<option value="Bank of Baroda">Bank of Baroda</option>
<option value="Bank of India">Bank of India</option>
<option value="Bank of Maharashtra">Bank of Maharashtra</option>
<option value="Canara Bank">Canara Bank</option>
<option value="Central Bank of India">Central Bank of India</option>
<option value="City Union Bank Ltd.">City Union Bank Ltd.</option>
<option value="CSB Bank Ltd.">CSB Bank Ltd.</option>
<option value="DCB Bank Ltd.">DCB Bank Ltd.</option>
<option value="Dhanlaxmi Bank Ltd.">Dhanlaxmi Bank Ltd.</option>
<option value="Federal Bank Ltd.">Federal Bank Ltd.</option>
<option value="HDFC Bank Ltd">HDFC Bank Ltd</option>
<option value="ICICI Bank Ltd.">ICICI Bank Ltd.</option>
<option value="IDBI Bank Ltd.">IDBI Bank Ltd.</option>
<option value="IDFC First Bank Ltd.">IDFC First Bank Ltd.</option>
<option value="Indian Bank">Indian Bank</option>
<option value="Indian Overseas Bank">Indian Overseas Bank</option>
<option value="Induslnd Bank Ltd">Induslnd Bank Ltd</option>
<option value="Jammu & Kashmir Bank Ltd.">Jammu & Kashmir Bank Ltd.</option>
<option value="Karnataka Bank Ltd.">Karnataka Bank Ltd.</option>
<option value="Karur Vysya Bank Ltd.">Karur Vysya Bank Ltd.</option>
<option value="Kotak Mahindra Bank Ltd">Kotak Mahindra Bank Ltd</option>
<option value="Nainital Bank Ltd.">Nainital Bank Ltd.</option>
<option value="Punjab & Sind Bank">Punjab & Sind Bank</option>
<option value="Punjab National Bank">Punjab National Bank</option>
<option value="RBL Bank Ltd.">RBL Bank Ltd.</option>
<option value="South Indian Bank Ltd.">South Indian Bank Ltd.</option>
<option value="State Bank of India">State Bank of India</option>
<option value="Tamilnad Mercantile Bank Ltd.">Tamilnad Mercantile Bank Ltd.</option>
<option value="UCO Bank">UCO Bank</option>
<option value="Union Bank of India">Union Bank of India</option>
<option value="YES Bank Ltd.">YES Bank Ltd.</option>
<?php foreach($bank_list as $b){ ?>
  <option value="<?=$b['bank_name']; ?>"><?=$b['bank_name']; ?></option>
<?php } ?>
</select>
</div>
      </div>
      <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
      <input class=" form-control" type="hidden"  readonly name="customer_name_modal" id="customer_name_modal" required   />    
      <div class="form-group row">

<label for="billing_address" style="text-align:end;" class="col-sm-3 col-form-label"><?php  echo display('Amount to be paid'); ?> : </label>

<div class="col-sm-5">
<table border="0">
      <tr>
        <td class="cus" name="cus"></td>
        <td><input  type="text"  readonly name="amount_to_pay" id="amount_to_pay"   style="width:340%;" class="form-control" required   /></td>

    </tr>
   </table>


</div>
</div> 
      <div class="form-group row" style="display:none;">

<label for="billing_address" style="text-align:end;" class="col-sm-3 col-form-label"><?php  echo display('Amount Received'); ?>:</label>

<div class="col-sm-5">
<table border="0">
      <tr>
        <td class="cus" name="cus"></td>
        <td><input  type="text"  readonly name="amount_received" style="width:340%;"  id="amount_received" class="form-control"required   /></td>
     </tr>
   </table>



</div>
</div> 
<div class="form-group row">

<label for="billing_address" style="text-align:end;"    class="col-sm-3 col-form-label"><?php  echo display('balance_ammount'); ?>: </label>

<div class="col-sm-5">

<table border="0">
      <tr>
        <td class="cus" name="cus"></td>
        <td><input  type="text"   readonly name="balance_modal"  style="width:340%;" id="balance_modal" class="form-control" required  /></td>
     </tr>
   </table>
</div>
</div> 
<div class="form-group row">

<label for="billing_address" style="text-align:end;" class="col-sm-3 col-form-label"><?php echo display('payment_amount');  ?>:<i class="text-danger">*</i></label>

<div class="col-sm-5">
<table border="0">
      <tr>
        <td class="cus" name="cus"></td>
        <td><input  type="text"   name="payment" id="payment_from_modal"  style="width:340%;" class="form-control"required   /></td>
     </tr>
   </table>


</div>
</div>

<div class="form-group row">

<label for="billing_address" style="text-align:end;" class="col-sm-3 col-form-label"><?php  echo display('Additional Information');  ?> : </label>

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
     <input class="btn btn-primary" type="submit" style="color:white;background-color:#38469f;"  name="submit_pay" id="submit_pay"   value="<?php  echo display('submit');  ?>"  required   />
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
                                    <select class="selectpicker countrypicker form-control"  data-live-search="true" data-default="United States"  name="country" id="country" style="width:100%"></select>
                                 
                                    </div>

</div>
<div class="form-group row">
            <label for="previous_balance" class="col-sm-4 col-form-label"><?php echo display('currency'); ?></label>
            <div class="col-sm-6">
            <select  class="form-control" id="currency" name="currency1"  style="width: 100%;" required=""  style="max-width: -webkit-fill-available;">

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
    <option value="USD" selected="selected">USD - US Dollar</option>
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
          <a href="#" class="btn" style="color:white;background-color:#38469f;" data-dismiss="modal"><?php echo display('Close'); ?></a>
     <input type="submit" id="addBank"  style="color:white;background-color:#38469f;"  class="btn btn-primary" name="addBank" value="<?php echo display('save') ?>"/>

  </div>
  </div>  </div>

</form>
  </div>
  </div>
  </div>                



<!------ add new Payment Type -->  
<div class="modal fade" id="payment_type" role="dialog">

<div class="modal-dialog" role="document">

    <div class="modal-content">

        <div class="modal-header" style="color:white;background-color:#38469f;" >

            

            <a href="#" class="close" data-dismiss="modal">&times;</a>

            <h4 class="modal-title"><?php echo display('Add New Payment Type');?></h4>

        </div>

        

        <div class="modal-body">

            <div id="customeMessage" class="alert hide"></div>

            <form id="add_pay_type" method="post">

<div class="panel-body">

<input type ="hidden" name="csrf_test_name" id="" value="<?php echo $this->security->get_csrf_hash();?>">

<div class="form-group row">

<label for="customer_name"  class="col-sm-4 col-form-label"><?php echo display('New Payment Type');?> <i class="text-danger">*</i></label>

<div class="col-sm-6">

<input class="form-control" name ="new_payment_type" id="new_payment_type" type="text" placeholder="New Payment Type"  required="" tabindex="1">

</div>

</div>


</div>



</div>



<div class="modal-footer">



<a href="#" class="btn" style="color:white;background-color:#38469f;"   data-dismiss="modal"><?php echo display('Close');?></a>



<input type="submit"  style="color:white;background-color:#38469f;"  class="btn" value="<?php echo display('submit');?>">

</div>

            </form>

    </div><!-- /.modal-content -->

</div><!-- /.modal-dialog -->

</div><!-- /.modal -->


</div>

</section>

</div>



 <!------ add new Payment Type -->  
 <div class="modal fade" id="payment_type_new" role="dialog">

<div class="modal-dialog" role="document">

    <div class="modal-content">

        <div class="modal-header" style="color:white;background-color:#38469f;">

            

            <a href="#" class="close" data-dismiss="modal">&times;</a>

            <h4 class="modal-title"><?php echo display('Add New Payment Terms');?></h4>

        </div>

        

        <div class="modal-body">

            <div id="customeMessage" class="alert hide"></div>

  <form id="add_pay_terms" method="post">

    <div class="panel-body">

<input type ="hidden" name="csrf_test_name" id="" value="<?php echo $this->security->get_csrf_hash();?>">

        <div class="form-group row">

            <label for="customer_name" class="col-sm-4 col-form-label"><?php echo display('New Payment Terms');?> <i class="text-danger">*</i></label>

            <div class="col-sm-6">

                <input class="form-control" name ="new_payment_terms" id="new_payment_terms" type="text" placeholder="New Payment Terms"  required="" tabindex="1">

            </div>

        </div>


    </div>

    

        </div>



        <div class="modal-footer">

            

            <a href="#" class="btn" style="color:white;background-color:#38469f;" data-dismiss="modal"><?php echo display('Close');?></a>

            

            <input type="submit" class="btn" style="color:white;background-color: #38469f;" value="<?php echo display('submit');?>">

        </div>

                                </form>

    </div><!-- /.modal-content -->

</div><!-- /.modal-dialog -->

</div><!-- /.modal -->


<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script type="text/javascript">
         var csrfName = '<?php echo $this->security->get_csrf_token_name();?>';
var csrfHash = '<?php echo $this->security->get_csrf_hash();?>';
    $(document).ready(function(){

});
$('#insert_product').submit(function (event) {
     event.preventDefault();
    var dataString = {
        dataString : $("#insert_product").serialize()
   };
   dataString[csrfName] = csrfHash;
    $.ajax({
        type:"POST",
        dataType:"json",
        url:"<?php echo base_url(); ?>Cproduct/insert_product",
        data:$("#insert_product").serialize(),
        success:function (data1) {
        console.log(data1);

        $("#magicHouses").empty();
        for (var i in data1) {
           $("<option/>").html(data1[i].product_name +'-'+ data1[i].product_model).appendTo("#magicHouses");
        }
 
       $("#magicHouses").focus();


      $("#bodyModal1").html("<?php echo display('Product Added Successfully');?>");
       
      $('#myModal1').modal('show');
       $('#insert_product')[0].reset();

      window.setTimeout(function(){
        $('#product_info').modal('hide');
        $('.modal-backdrop').remove();
       $('#myModal1').modal('hide');
    }, 2000);
}
});
});

 
   
              
  






$('#add_pay_type').submit(function(e){
    e.preventDefault();
      var data = {
        
        
        new_payment_type : $('#new_payment_type').val()
      
      };
      data[csrfName] = csrfHash;
  
      $.ajax({
          type:'POST',
          data: data, 
         dataType:"json",
          url:'<?php echo base_url();?>Cinvoice/add_payment_type',
          success: function(data1, statut) {
          var $select = $('select#paytype_drop');
     
            $select.empty();
    
              for(var i = 0; i < data1.length; i++) {
        var option = $('<option/>').attr('value', data1[i].payment_type).text(data1[i].payment_type);
        $select.append(option); // append new options
              }
      $('#new_payment_type').val('');

       $('#paytype_drop').show();
      $("#bodyModal1").html("<?php echo display('Payment Type Added Successfully');?>");
      $('#payment_type').modal('hide');
      
      $('#add_pay_type')[0].reset();
       $('#myModal1').modal('show');
      window.setTimeout(function(){
        $('#payment_type').modal('hide');
     
       $('#myModal1').modal('hide');
         
       

    }, 2000);
    
     }
      });
  });


$('#add_pay_terms').submit(function(e){
    e.preventDefault();
      var data = {
        new_payment_terms : $('#new_payment_terms').val()
      };
      data[csrfName] = csrfHash;
      $.ajax({
          type:'POST',
          data: data,
         dataType:"json",
          url:'<?php echo base_url();?>Cpurchase/add_payment_terms',
          success: function(data1, statut) {
      
    var $select = $('select#payment_terms');
            $select.empty();
    
              for(var i = 0; i < data1.length; i++) {
        var option = $('<option/>').attr('value', data1[i].payment_terms).text(data1[i].payment_terms);
        $select.append(option); // append new options
    }


    $('#new_payment_terms').val('');
      $("#bodyModal1").html("<?php echo display('Payment Terms Added Successfully');?>");
      $('#payment_type').modal('hide');
      $('#payment_terms').show();
       $('#myModal1').modal('show');
       $('#add_pay_terms')[0].reset();
      window.setTimeout(function(){
        $('#payment_type_new').modal('hide');
       $('#myModal1').modal('hide');
    }, 2000);
     }
      });
  });






$(document).on('keyup','.serviceprovider tbody tr:last',function (e) {
var tid=$(this).closest('table').attr('id');
const indexLast = tid.lastIndexOf('_');
var id = tid.slice(indexLast + 1);
  var $last = $('#servic_pro  tr:last');
    var num = id+($last.index()+1);
    $('#servic_pro tr:last').clone().find('input').attr('id', function(i, current) {
        return current.replace(/\d+$/, num);
    }).end().appendTo('#servic_pro');

        });
$(document).on('input','.total_price',function (e) {
var sum = 0;
		//iterate through each textboxes and add the values
		$(".total_price").each(function() {

			//add only if the value is number
			if(!isNaN(this.value) && this.value.length!=0) {
				sum += parseFloat(this.value);
			}

		});
		//.toFixed() method will roundoff the final sum to 2 decimal places
		$("#Total").val(sum.toFixed(2));
});

$(document).on('click', '.delete_provider', function(){
    var tid=$(this).closest('table').attr('id');
localStorage.setItem("delete_table",tid);
console.log(localStorage.getItem("delete_table"));
 var netheight = $('#'+localStorage.getItem("delete_table")).find('.acc_name').attr('id');
 const indexLastDot = netheight.lastIndexOf('_');
var id = netheight.slice(indexLastDot + 1);
var rowCount = $(this).closest('tbody').find('tr').length;

if(rowCount>1){
$(this).closest('tr').remove();
}
   var sump=0;
    $('#'+localStorage.getItem("delete_table")).find('.total_price').each(function() {
var v=$(this).val();
 if (!isNaN(v) && v.length !== 0) {
  sump += parseFloat(v);
 }
});
  $('#'+localStorage.getItem("delete_table")).find('#Total').val(sump).trigger('change');
    
    
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
   var sump=0;
    $('#'+localStorage.getItem("delete_table")).find('.total_price').each(function() {
var v=$(this).val();
 if (!isNaN(v) && v.length !== 0) {
  sump += parseFloat(v);
 }
});
  $('#'+localStorage.getItem("delete_table")).find('.b_total').val(sump).trigger('change');
   var sumnet=0;

   $('#'+localStorage.getItem("delete_table")).find('.net_sq_ft').each(function() {
var v=$(this).val();
 if (!isNaN(v) && v.length !== 0) {
          sumnet += parseFloat(v);
        }

});
  $('#'+localStorage.getItem("delete_table")).find('.overall_net').val(sumnet.toFixed(3));


    var sumgross=0;

    $('#'+localStorage.getItem("delete_table")).find('.gross_sq_ft').each(function() {
var v=$(this).val();
 if (!isNaN(v) && v.length !== 0) {
          sumgross += parseFloat(v);
        }

});
  $('#'+localStorage.getItem("delete_table")).find('.overall_gross').val(sumgross.toFixed(3));
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


var total_net=0;
 $('.table').each(function() {
    $(this).find('.net_sq_ft').each(function() {
        var precio = $(this).val();
        if (!isNaN(precio) && precio.length !== 0) {
          total_net += parseFloat(precio);
        }
      });

     


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

var t_price=0;
 $('.table').each(function() {
     $(this).find('.total_price').each(function() {
var vv=$(this).val();
console.log(vv);
 if (!isNaN(vv) && vv.length !== 0) {
  t_price += parseInt(vv);
 }
  console.log("t_price :"+t_price);

});
});
 $('#Over_all_Total').val(t_price).trigger('change');







gt(id);


 });
$('#serviceprovider').submit(function (event) {
    var dataString = {
        dataString : $("#serviceprovider").serialize()
   };
   dataString[csrfName] = csrfHash;
        // alert('HI')
    $.ajax({
        type:"POST",
        dataType:"json",
        url:"<?php echo base_url(); ?>Cpurchase/insert_service_provider",
        data:$("#serviceprovider").serialize(),
        success:function (data) {

          $('#download_provider').show();
           $('#final_submit_provider').show();
            $('#print_provider').show();
        console.log(data);
        
            $('#servic_id_hidden').val(data);
        
            $("#bodyModal1").html('<?php echo display('Service Provider created Successfully');?>');
$('.button_hide').show();
    $('#myModal1').modal('show');
    window.setTimeout(function(){
        $('.modal').modal('hide');
$('.modal-backdrop').remove();
$("#bodyModal1").html("");
window.location = "<?php echo base_url(); ?>Cpurchase/manage_purchase";
 },2500);
       }
    });
    event.preventDefault();
});




$("body").on("focus", ".product_name", function() {

   var tid=$(this).closest('tr').find('.product_name').attr('id');
const indexLast = tid.lastIndexOf('_');
var id = tid.slice(indexLast + 1);
  $('#prodt_'+id).val('');
});











$('#insert_purchase').submit(function (event) {
    var dataString = {
        dataString : $("#insert_purchase").serialize()
    
   };
   dataString[csrfName] = csrfHash;
  
    $.ajax({
        type:"POST",
        dataType:"json",
        url:"<?php echo base_url(); ?>Cpurchase/insert_purchase",
        data:$("#insert_purchase").serialize(),

        success:function (data) {
        console.log(data);
   
            var split = data.split("/");
            $('#invoice_hdn1').val(split[0]);
         console.log(split[0]+"---"+split[1]);
     
            $('#invoice_hdn').val(split[1]);
            $("#bodyModal1").html('<?php echo display('New Expense Created Successfully');?>');
        
            $('.button_hide').show();
$('.download').show();
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
$('#insert_purchase1').submit(function (event) {
    var dataString = {
        dataString : $("#insert_purchase1").serialize()
    
   };
   dataString[csrfName] = csrfHash;
  
    $.ajax({
        type:"POST",
        dataType:"json",
        url:"<?php echo base_url(); ?>Cpurchase/insert_purchase",
        data:$("#insert_purchase1").serialize(),

        success:function (data) {
        console.log(data);
   
            var split = data.split("/");
            $('#invoice_hdn1').val(split[0]);
         console.log(split[0]+"---"+split[1]);
     
            $('#invoice_hdn').val(split[1]);
            $("#bodyModal1").html('<?php echo display('New Expense Created Successfully')?>');
        
$('.button_hide').show();
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

$('#isf_dropdown').on('change', function() {
  if ( this.value == '2')
    $("#isf_no").show();
  else
    $("#isf_no").hide();
}).trigger("change");
$('#isf_dropdown1').on('change', function() {

  if ( this.value == '2')
    $(".isf_no1").show();
  else
    $(".isf_no1").hide();
}).trigger("change");


//Total
        $(document).ready(function(){
		$('#expense_drop').hide();
		$('#service_provider_data').hide();
            $('#download_provider').hide();
           $('#final_submit_provider').hide();
            $('#print_provider').hide();
             $('.without_po').hide();
            $('.with_po').hide();


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
 if(amtpd){
   $('#amount_paid').val(amtpd);
 }else{
      $('#amount_paid').val("0.00");
 }
      var t_rate=$('.custocurrency_rate').val();
   document.getElementById("paid_convert").value=
 	(amtpd /t_rate ).toFixed(2);
    document.getElementById("bal_convert").value=
 	(bal /t_rate ).toFixed(2);

      }
    });
      $('#add_payment_info')[0].reset();
      }

   });
   event.preventDefault();
});


function payment_info(){
   
  var data = {
       gtotal:$('#vendor_gtotal').val(),
       customer_name:$('#customer_name').val()
  
    };
    data[csrfName] = csrfHash;

    $.ajax({
        type:'POST',
        data: data, 
     dataType:"json",
        url:'<?php echo base_url();?>Cinvoice/get_payment_info',
        success: function(result, statut) {
           
          $("#amount_paid").val(result[0]['amt_paid']);
          $("#balance").val(result[0]['balance']);
            console.log(result);
        }
    });
}
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
     $(document).ready(function(){

   $('.amt').hide();

       });
$('#paypls').on('click', function (e) {
   e.preventDefault();
$('#amount_to_pay').val($('#vendor_gtotal').val()-$('#amount_paid').val());
    $('#payment_modal').modal('show');
  e.preventDefault();

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
       $('#bank').show();
      $('#add_bank')[0].reset();
       window.setTimeout(function(){
        $('#myModal1').modal('hide');
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
submit_pay
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
function product_detail(id){

var pdt=$('#product_name_'+id).val();
   const myArray = pdt.split("-");
   var product_nam=myArray[0];
   var product_model=myArray[1];
   console.log(product_nam+"^"+product_model);
  var data = {
    
       product_nam:product_nam,
       product_model:product_model
    };
    data[csrfName] = csrfHash;

    $.ajax({
        type:'POST',
        data: data, 
     dataType:"json",
        url:'<?php echo base_url();?>Cinvoice/product_id',
        success: function(result, statut) {
      console.log(result);
          $("#prod_id_"+id).val(result[0]['product_id']);
          $("#product_rate_"+id).val(result[0]['price']);
        
        }
    });

  
}

    $('#insert_supplier').submit(function (event) {
    var dataString = {
        dataString : $("#insert_supplier").serialize()
   };
   dataString[csrfName] = csrfHash;
    $.ajax({
        type:"POST",
        dataType:"json",
        url:"<?php echo base_url(); ?>Csupplier/insert_supplier",
        data:$("#insert_supplier").serialize(),
        success:function (states) {
            var $select = $('select#supplier_id');
            $select.empty();
    
              for(var i = 0; i < states.length; i++) {
        var option = $('<option/>').attr('value', states[i].supplier_id).text(states[i].supplier_name);
        $select.append(option); // append new options
    }
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
        $('#vendor_add').val(result[0]['address']+'\n'+result[0]['city']+'\n'+result[0]['state']+"-"+result[0]['zip']+"-"+result[0]['country']+'\n'+result[0]['primaryemail']+"-"+result[0]['businessphone']       );
            $('#vendor_type_details').val(result[0]['vendor_type'])
          
           $(".cus").html(result[0]['currency_type']);
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
  $(".custocurrency_rate").val(Rate);
});
        }
    });

       $('#add_vendor').modal('hide');  
     
      $("#bodyModal1").html("<?php echo display('New Vendor Added Successfully');?>");
      
       $('#myModal1').modal('show');
  $('#insert_supplier')[0].reset();
      
     
       window.setTimeout(function(){
        $('#myModal1').modal('hide');
        $('.modal-backdrop').remove();

 },2500);
    
        }
    });
    event.preventDefault();
});
    $('.button_hide').hide();

                        $('.hiden').css("display","none");

  


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
  
             csrfName = result.csrfName;
             csrfHash = result.csrfHash;
          }
      
        console.log(result[0]['currency_type']);
   
      $(".cus").html(result[0]['currency_type']);
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
  $(".custocurrency_rate").val(Rate);
});
      }
  });


});

$('#productname').on('change', function() {
    var val=$('#productname').val();
  $('#productid').val(val);
});
  

  
           
 $("#supplier_id").change(function() {
        var csrfName = '<?php echo $this->security->get_csrf_token_name();?>';
var csrfHash = '<?php echo $this->security->get_csrf_hash();?>';
       var data = {
         
      
       };
       data[csrfName] = csrfHash;
   
       $.ajax({
           type:'POST',
           data: data, 
          dataType:"json",
         
           url:'<?php echo base_url();?>Cpurchase/product_search_by_supplier',
           success: function(result, statut) {
            console.log(result);
               if(result.csrfName){
                  csrfName = result.csrfName;
                  csrfHash = result.csrfHash;
               }
               console.log(result[0]['label']);
   
           }
       });
   });
$(function(){
    $(".add_category").hide();
$("#add_category").click(function() {
    
        $(".add_category").show(300);
   
});
$(".checkbox_toggle2").hide();

$("#purchase_tax").click(function() {
    if($(this).is(":checked")) {
        $(".checkbox_toggle2").show(300);
    } else {
        $(".checkbox_toggle2").hide(200);
    }
});


});



$('#supplier_id').change(function(e){
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
        $('#vendor_add').val(result[0]['address']+'\n'+result[0]['city']+'\n'+result[0]['state']+"-"+result[0]['zip']+"-"+result[0]['country']+'\n'+result[0]['primaryemail']+"-"+result[0]['businessphone']       );
            $('#vendor_type_details').val(result[0]['vendor_type'])
            // vendor_type_details
     
        }
    });
});



$('#download_provider').on('click', function (e) {

 var popout = window.open("<?php  echo base_url(); ?>Cpurchase/servicepro_details_data/"+$('#servic_id_hidden').val());
 
      e.preventDefault();

}); 
   $('#print_provider').on('click', function (e) {

 var popout = window.open("<?php  echo base_url(); ?>Cpurchase/servicepro_details_data_print/"+$('#servic_id_hidden').val());
 
      e.preventDefault();

});  


$('.download').on('click', function (e) {

 var popout = window.open("<?php  echo base_url(); ?>Cpurchase/purchase_details_data/"+$('#invoice_hdn1').val());
 
      e.preventDefault();

});  

function discard(){

   $.get(
    "<?php echo base_url(); ?>Cpurchase/deletepurchase/", 
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
       

        window.location = "<?php  echo base_url(); ?>Cpurchase/manage_purchase";
      }, 2000);
   }
); 
}
     function submit_redirect(){
        window.btn_clicked = true;      //set btn_clicked to true
        var input_hdn="<?php echo  display('Your Invoice No')." :";?>"+$('#invoice_hdn').val()+"<?php echo  " ".display('has been saved Successfully');?>";
  
    console.log(input_hdn);
    $('#myModal3').modal('hide');
    $("#bodyModal1").html(input_hdn);
        $('#myModal1').modal('show');
    window.setTimeout(function(){
       

        window.location = "<?php  echo base_url(); ?>Cpurchase/manage_purchase";
      }, 2000);
     }
     $('#final_submit1').on('click', function (e) {

    window.btn_clicked = true;      //set btn_clicked to true
  var input_hdn="<?php echo  display('Your Invoice No')." :";?>"+$('#invoice_hdn').val()+"<?php echo  " ".display('has been saved Successfully');?>";
  
    console.log(input_hdn);
   
    $("#bodyModal1").html(input_hdn);
    $('#myModal1').modal('show');
    window.setTimeout(function(){
        $('.modal').modal('hide');
       
$('.modal-backdrop').remove();
 },2500);
    window.setTimeout(function(){
       

        window.location = "<?php  echo base_url(); ?>Cpurchase/manage_purchase";
      }, 2500);
       
});
$('#final_submit').on('click', function (e) {

    window.btn_clicked = true;      //set btn_clicked to true
  var input_hdn="<?php echo  display('Your Invoice No')." :";?>"+$('#invoice_hdn').val()+"<?php echo  " ".display('has been saved Successfully');?>";
  
    console.log(input_hdn);
   
    $("#bodyModal1").html(input_hdn);
    $('#myModal1').modal('show');
    window.setTimeout(function(){
        $('.modal').modal('hide');
       
$('.modal-backdrop').remove();
 },2500);
    window.setTimeout(function(){
       

        window.location = "<?php  echo base_url(); ?>Cpurchase/manage_purchase";
      }, 2500);
       
});
$('#final_submit_provider').on('click', function (e) {

    window.btn_clicked = true;      //set btn_clicked to true
  var input_hdn="<?php echo  display('Supplier ID')." :";?>"+$('#servic_id_hidden').val()+"<?php echo  " ".display('has been saved Successfully');?>";
  
    console.log(input_hdn);
   
    $("#bodyModal1").html(input_hdn);
    $('#myModal1').modal('show');
    window.setTimeout(function(){
        $('.modal').modal('hide');
       
$('.modal-backdrop').remove();
 },2500);
    window.setTimeout(function(){
       

        window.location = "<?php  echo base_url(); ?>Cpurchase/manage_purchase";
      }, 2500);
       
});
window.onbeforeunload = function(){
    if(!window.btn_clicked ){

       return false;
    }
}
 

$('#download_purchase').on('click', function (e) {

 var popout = window.open("<?php  echo base_url(); ?>Cpurchase/purchase_details_data/"+$('#invoice_hdn1').val());

});  
$('#print_purchase').on('click', function (e) {

 var popout = window.open("<?php  echo base_url(); ?>Cpurchase/packing_list_details_data/"+$('#invoice_hdn1').val());

}); 

  $(document).on('change','#download_select', function (e) {
var selected_option=$(this).val();
if(selected_option=='Invoice'){
 var popout = window.open("<?php  echo base_url(); ?>Cpurchase/purchase_details_data/"+$('#invoice_hdn1').val());
}else{
    
  var popout = window.open("<?php  echo base_url(); ?>Cpurchase/packing_list_details_data/"+$('#invoice_hdn1').val());
}

});
  $(document).on('change','#print_select', function (e) {
var selected_option=$(this).val();
if(selected_option=='Invoice'){
 var popout = window.open("<?php  echo base_url(); ?>Cpurchase/purchase_details_data_print/"+$('#invoice_hdn1').val());
}else{
   var popout = window.open("<?php  echo base_url(); ?>Cpurchase/packing_list_details_data_print/"+$('#invoice_hdn1').val());
}

});
  $(document).ready(function() {
   
   $('#main').hide();
   });
$('#po').on('change', function (e) {

    $('#purchaseTable1 tbody').empty();

    if($('#po').val() !=="Not Available"){
        $
        $('#service_provider_data').show();
        $('.without_po').hide();
         $('.with_po').hide();
          $('#expense_drop').hide();
          $('#main').show();
    var data = {
       po:$('#po').val()
    };
    }else{
       $('.without_po').hide();
         $('.with_po').hide();
       $('#service_provider_data').hide();
        $('#expense_drop').show();
         $('#main').hide();
           
    }
});
$('#expense_drop').on('change', function (e) {

    $('#purchaseTable1 tbody').empty();

    if($('#expense_drop').val() =="not_found"){
        $('#service_provider_data').hide();
        $('.with_po').hide();
        $('.without_po').show();
            $('#main').show();
        $('#po_payment_id').val("<?php   echo $payment_id;   ?>");
    var data = {
       expense_drop:$('#expense_drop').val()
    };
    }else{
         $('.button_hide').hide();
            $('#main').show();
               $('#service_provider_data').hide();
        $('.with_po').show();
        $('.without_po').hide();
    var data = {
       po:$('#expense_drop').val()
     
  
    };
    data[csrfName] = csrfHash;
$.ajax({ 
     url:'<?php echo base_url();?>Cpurchase/get_po_details',
   method:'POST',
       data: data, 
    dataType : "html" 
}).done(function(data) { 
    var obj = $(data);
    $("#insert_purchase").html(obj.find("#insert_purchase").html());
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
 //  debugger;
 $('#normalinvoice_'+idt  +  '> tbody > tr').find('.total_price').each(function() {
var v=$(this).val();
  if (!isNaN(v) && v.length !== 0) {
  sum += parseFloat(v);
  }
});

 $(this).closest('table').find('#Total_'+idt).val(sum.toFixed(3));

  var sum_net=0;

 $('#normalinvoice_'+idt  +  '> tbody > tr').find('.net_sq_ft').each(function() {
var v=$(this).val();
  if (!isNaN(v) && v.length !== 0) {
  sum_net += parseFloat(v);
  }

});

 $(this).closest('table').find('#overall_net_'+idt).val(sum_net.toFixed(3));
  var sum_gross=0;

 $('#normalinvoice_'+idt  +  '> tbody > tr').find('.gross_sq_ft').each(function() {
var v=$(this).val();
  if (!isNaN(v) && v.length !== 0) {
  sum_gross += parseFloat(v);
  }

});
 $(this).closest('table').find('#overall_gross_'+idt).val(sum_gross.toFixed(3));
   var sum_weight=0;

 $('#normalinvoice_'+idt  +  '> tbody > tr').find('.weight').each(function() {
var v=$(this).val();
  if (!isNaN(v) && v.length !== 0) {
  sum_weight += parseFloat(v);
  }

});

 $(this).closest('table').find('#overall_weight_'+idt).val(sum_weight.toFixed(3));
    

    });
    // debugger;
          var data = {
    value: $('#supplier_id').val()
   };
   data[csrfName] = csrfHash;
   $.ajax({
    type:'POST',
    data: data,
   dataType:"json",
    url:'<?php echo base_url();?>Cinvoice/getvendor',
    success: function(result, statut) {
        if(result.csrfName){
           //assign the new csrfName/Hash
           csrfName = result.csrfName;
           csrfHash = result.csrfHash;
        }
      
      console.log(result);
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
   
   $(".custocurrency_rate").val(Rate);
   var g=$('#gtotal').val();
   $('#vendor_gtotal').val(parseInt(Rate*g));
   });
    }
   });
             var data = {
    value: $('#expense_drop').val()
   };
   data[csrfName] = csrfHash;
      $.ajax({
    type:'POST',
    data: data,
   dataType:"json",
    url:'<?php echo base_url();?>Cpurchase/get_payment_id',
    success: function(result, statut) {
      
      
      console.log(result);
    $(".payment_id1").val(result[0]['payment_id']);
     $(".payment_id").val(result[0]['payment_id']);
$('#po_payment_id').val(result[0]['payment_id']);
    }
   });
}).fail(function(jqXHR, textStatus, errorThrown) { 

});



//     $.ajax({
//         method:'POST',
//         data: data, 
//  dataType: "html",
//         url:'<?php echo base_url();?>Cpurchase/get_po_details',
//         success: function(result, statut) {
//             console.log(result);
//                            $(".with_po").html(result);    
// }
                     

//         });
      }
    });

$(document).ready(function(){
  $('.payment_id').val($('#po_payment_id').val());
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
  var custo_amt=$('.custocurrency_rate').val(); 
  console.log("numhere :"+num +"-"+custo_amt);
  var value=num*custo_amt;
  var custo_final = isNaN(parseInt(value)) ? 0 : parseInt(value)
 $('#vendor_gtotal').val(custo_final);  
 calculate();
 });
});






$('.custocurrency_rate').on('change textInput input', function (e) {
    calculate();
});

$('.common_qnt').on('change textInput input', function (e) {
    calculate();
});
$('.btotal').on('change textInput input', function (e) {
      var sum=0;

     $('.btotal').each(function() {
var v=$(this).val();
  sum += parseFloat(v);
});
$('#Over_all_Total').val(sum);




    var first=$("#Over_all_Total").val();
    var tax= $('#product_tax').val();
var field = tax.split('-');

var percent = field[1];
var answer=0;
  var answer = parseInt((percent / 100) * first);
   console.log("Answer : "+answer);
  var gtotal = parseInt(first + answer);
  console.log("gtotal :" +gtotal);
  
 var final_g= $('#final_gtotal').val();


 var amt=parseInt(answer)+parseInt(first);
 var num = isNaN(parseInt(amt)) ? 0 : parseInt(amt)
 var custo_amt=$('.custocurrency_rate').val(); 
 console.log("numhere :"+num +"-"+custo_amt);
 var value=num*custo_amt;
 var custo_final = isNaN(parseInt(value)) ? 0 : parseInt(value)
$('#vendor_gtotal').val(custo_final);  
});


var csrfName = '<?php echo $this->security->get_csrf_token_name();?>';
var csrfHash = '<?php echo $this->security->get_csrf_hash();?>';
$(document).on('change input select', '.product_name', function(){
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

var x = $('#slab_no_'+id).val();
 var serial =parseInt( $(this).closest('tr').find('td:nth-child(10)').html());

var sales_slab_price=cost_sqft *nresult*x;
console.log(parseInt(cost_sqft) +"*"+parseInt(nresult)+"*"+id);
$('#'+'sales_slab_amt_'+id).val(sales_slab_price.toFixed(3));
sales_sqft = isNaN(sales_sqft) ? 0 : sales_sqft;
$('#'+'sales_amt_sq_ft_'+id).val(sales_sqft.toFixed(3));
});

// Restricts input for each element in the set of matched elements to the given inputFilter.
(function($) {
  $.fn.inputFilter = function(callback, errMsg) {
    return this.on("input keydown keyup mousedown mouseup select contextmenu drop focusout", function(e) {
      if (callback(this.value)) {
        // Accepted value
        if (["keydown","mousedown","focusout"].indexOf(e.type) >= 0){
          $(this).removeClass("input-error");
          this.setCustomValidity("");
        }
        this.oldValue = this.value;
        this.oldSelectionStart = this.selectionStart;
        this.oldSelectionEnd = this.selectionEnd;
      } else if (this.hasOwnProperty("oldValue")) {
        // Rejected value - restore the previous one
        $(this).addClass("input-error");
        this.setCustomValidity(errMsg);
        this.reportValidity();
        this.value = this.oldValue;
        this.setSelectionRange(this.oldSelectionStart, this.oldSelectionEnd);
      } else {
        // Rejected value - nothing to restore
        this.value = "";
      }
    });
  };
}(jQuery));

$(".custocurrency_rate").inputFilter(function(value) {
  return /^-?\d*[.,]?\d*$/.test(value); }, "Must be a floating (real) Number");
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
  calculate();
   payment_info();
});
var arr=[];


function gt(id){

var final_g= $('#final_gtotal').val();

var first=$("#Over_all_Total").val();
    var tax= $('#product_tax').val();
 
var field = tax.split('-');

var percent = field[1];
var answer=0;
  var answer =(parseInt(percent) / 100) * parseInt(first);
  answer = isNaN(parseInt(answer)) ? 0 : parseInt(answer);
   console.log(answer);
   $('#tax_details').val(answer.toFixed(3) +" ( "+tax+" )");

  var gtotal = parseInt(first + answer);
  console.log(gtotal);
var amt=parseInt(answer)+parseInt(first);
 var num = isNaN(parseInt(amt)) ? 0 : parseInt(amt)
 var custo_amt=$('.custocurrency_rate').val();
 $("#gtotal").val(num);  
 console.log(num +"-"+custo_amt);
 localStorage.setItem("customer_grand_amount_sale",num);

 var value=num*custo_amt;
 var custo_final = isNaN(parseInt(value)) ? 0 : parseInt(value)
$('#vendor_gtotal').val(custo_final);
var bal_amt=custo_final-$('#amount_paid').val();
$('#balance').val(bal_amt);
 
}

   let dynamic_id=2;
    function addbundle(){
         $(this).closest('table').find('.addbundle').css("display","none");
      $(this).closest('table').find('.removebundle').css("display","inline-block;");

var newdiv = document.createElement('div');
var tabin="crate_wrap_"+dynamic_id;

newdiv = document.createElement("div");


 newdiv.innerHTML ='<table class="table normalinvoice table-bordered table-hover" id="normalinvoice_'+ dynamic_id +'"> <thead> <tr> <th rowspan="2" class="text-center" style="width: 180px;" ><?php echo display('product_name'); ?><i class="text-danger">*</i></th> <th rowspan="2" style="width:60px;" class="text-center"><?php echo display('Bundle No');?><i class="text-danger">*</i></th> <th rowspan="2"  class="text-center"><?php echo  display('description'); ?></th> <th rowspan="2" style="width:60px;" class="text-center"><?php echo display('Thick ness');?><i class="text-danger">*</i></th> <th rowspan="2" class="text-center"><?php echo display('Supplier Block No');?><i class="text-danger">*</i></th>  <th rowspan="2" class="text-center" ><?php echo display('Supplier Slab No');?><i class="text-danger">*</i> </th> <th colspan="2" style="width:150px;" class="text-center"><?php echo display('Gross Measurement');?><i class="text-danger">*</i> </th> <th rowspan="2" class="text-center"><?php echo display('Gross Sq.Ft');?></th>  <th rowspan="2" style="width:40px;" class="text-center"><?php echo display('Slab No');?><i class="text-danger">*</i></th> <th colspan="2" style="width:150px;" class="text-center"><?php echo display('Net Measure');?><i class="text-danger">*</i></th> <th rowspan="2" class="text-center"><?php echo display('Net Sq.Ft');?></th> <th rowspan="2"  style="width:90px;" class="text-center"><?php echo display('Cost per Sq.Ft');?></th> <th rowspan="2"  style="width:100px;" class="text-center"><?php echo display('Cost per Slab');?></th> <th rowspan="2"  style="width:90px;" class="text-center"><?php echo display('sales'); ?><br/><?php echo display('Price per Sq.Ft');?></th> <th rowspan="2"  style="width:90px;" class="text-center"><?php echo display('Sales Slab Price');?></th> <th rowspan="2" class="text-center"><?php echo display('Weight');?></th> <th rowspan="2" class="text-center"><?php echo display('Origin');?></th>  <th rowspan="2" style="width: 110px" class="text-center"><?php  echo  display('total'); ?></th> <th rowspan="2" class="text-center"><?php  echo  display('action'); ?></th> </tr>  <tr> <th class="text-center"><?php echo display('Width');?></th> <th class="text-center"><?php echo display('Height');?></th> <th class="text-center"><?php echo display('Width');?></th> <th class="text-center"><?php echo display('Height');?></th> </tr>  </thead> <tbody id="addPurchaseItem_'+ dynamic_id +'"> <tr> <input type="hidden" name="tableid[]" id="tableid_'+ dynamic_id +'"/><td> <input   list="magicHouses"  name="prodt[]" id="prodt_'+ dynamic_id +'"  style="width:160px;"  class="form-control product_name"  placeholder="Search Product" > <datalist id="magicHouses"> <option value="Select the Product" selected>Select the Product</option> <?php  foreach($product as $tx){?>  <option value="<?php echo $tx["product_name"]."-".$tx["product_model"];?>">  <?php echo $tx["product_name"]."-".$tx["product_model"];  ?></option> <?php } ?> </datalist> <input type="hidden" class="common_product autocomplete_hidden_value  product_id_'+ dynamic_id +'" name="product_id[]" id="SchoolHiddenId_'+ dynamic_id +'" /> </td> <td> <input type="text" id="bundle_no_'+ dynamic_id +'" name="bundle_no[]" required="" class="bundle_no form-control" /> </td> <td> <input type="text" id="description_'+ dynamic_id +'" name="description[]" class="form-control" /> </td>  <td > <input type="text" name="thickness[]" id="thickness_'+ dynamic_id +'" required="" class="form-control"/> </td> <td> <input type="text" id="supplier_b_no_'+ dynamic_id +'" name="supplier_block_no[]" required="" class="form-control" /> </td>  <td > <input type="text"  id="supplier_s_no_'+ dynamic_id +'" name="supplier_slab_no[]" required="" class="form-control"/> </td> <td> <input type="text" id="gross_width_'+ dynamic_id +'" name="gross_width[]" required="" class="gross_width  form-control" /> </td> <td> <input type="text" id="gross_height_'+ dynamic_id +'" name="gross_height[]"  required="" class="gross_height form-control" /> </td>  <td > <input type="text"   style="width:60px;" readonly id="gross_sq_ft_'+ dynamic_id +'" name="gross_sq_ft[]" class="gross_sq_ft form-control"/> </td>   <td style="text-align:center;" >  <input type="text"   style="width:20px;" value="1" class="slab_no" id="slab_no_'+ dynamic_id +'" name="slab_no[]"   readonly  required=""/>  </td> <td> <input type="text" id="net_width_'+ dynamic_id +'" name="net_width[]" required="" class="net_width form-control" /> </td> <td> <input type="text" id="net_height_'+ dynamic_id +'" name="net_height[]"    required="" class="net_height form-control" /> </td> <td > <input type="text"   style="width:60px;" readonly id="net_sq_ft_'+ dynamic_id +'" name="net_sq_ft[]" class="net_sq_ft form-control"/> </td> <td>   <span class="input-symbol-euro"><input type="text" id="cost_sq_ft_'+ dynamic_id +'"  name="cost_sq_ft[]" readonly  style="width:60px;" value="0.00"  class="cost_sq_ft form-control" ></span>   <td >  <span class="input-symbol-euro"> <input type="text"  id="cost_sq_slab_'+ dynamic_id +'" name="cost_sq_slab[]" readonly   style="width:60px;" value="0.00"  class="form-control"/></span>     </td> <td>  <span class="input-symbol-euro">  <input type="text" id="sales_amt_sq_ft_'+ dynamic_id +'"  name="sales_amt_sq_ft[]"  style="width:70px;"  value="0.00" class="sales_amt_sq_ft form-control" /></span>     </td>  <td >  <span class="input-symbol-euro">   <input type="text"  id="sales_slab_amt_'+ dynamic_id +'" name="sales_slab_amt[]"  style="width:70px;" value="0.00"  class="sales_slab_amt form-control"/></td> </span>     </td> <td> <input type="text" id="weight_'+ dynamic_id +'" name="weight[]"  class="weight form-control" /> </td>  <td > <input type="text"  id="origin_'+ dynamic_id +'" name="origin[]" class="form-control"/> </td>  <td > <span class="input-symbol-euro"><input  type="text" class="total_price form-control" style="width:80px;" readonly value="0.00"  id="total_amt_'+ dynamic_id +'"     name="total_amt[]"/></span> </td>  <td style="text-align:center;"> <button  class="delete btn btn-danger" id="delete_'+ dynamic_id +'" type="button" value="Delete" ><i class="fa fa-trash"></i></button> </td>  </tr> </tbody> <tfoot> <tr> <td style="text-align:right;" colspan="8"><b>Gross Sq.Ft :</b></td> <td > <input type="text" id="overall_gross_'+ dynamic_id +'" name="overall_gross[]"   class="overall_gross form-control" style="width: 60px"  readonly="readonly"  /> </td> <td style="text-align:right;" colspan="3"><b>Net Sq.Ft :</b></td> <td > <input type="text" id="overall_net_'+ dynamic_id +'" name="overall_net[]"  class="overall_net form-control"  style="width: 60px"  readonly="readonly"  /> </td>  <td style="text-align:right;" colspan="4"><b>Weight :</b></td> <td ><input type="text" id="overall_weight_'+ dynamic_id +'" name="overall_weight[]"  class="overall_weight form-control"  style="width: 70px"  readonly="readonly"  />  </td> <td style="text-align:right;" colspan="1"><b>Total :</b></td> <td > <span class="input-symbol-euro">    <input type="text" id="Total_'+ dynamic_id +'" name="total[]"   class="b_total form-control"  style="width: 80px" value="0.00"  readonly="readonly"  /> </span> </td>  <td  style="text-align:center;"><i id="buddle_'+ dynamic_id +'" onclick="removebundle(); " class="btn-danger removebundle fa fa-minus" aria-hidden="true"></i></td>   </tr> </foot></table> <i id="buddle_1"  style="margin-right: 18px;float:right;color:white;background-color:#38469f;"   onclick="addbundle(); " class="addbundle fa fa-plus" aria-hidden="true"></i>';  

document.getElementById('content').appendChild(newdiv);

dynamic_id++;



}
    function addbundle1(){
         $(this).closest('table.purchaseTable').find('.addbundle').css("display","none");
      $(this).closest('table.purchaseTable').find('.removebundle').css("display","inline-block;");

var newdiv = document.createElement('div');
var tabin="crate_wrap_"+dynamic_id;

newdiv = document.createElement("div");


 newdiv.innerHTML ='<table class="table purchaseTable table-bordered table-hover" id="purchaseTable'+ dynamic_id +'"> <thead> <tr> <th rowspan="2" class="text-center" style="width: 180px;" ><?php echo display('product_name'); ?><i class="text-danger">*</i></th> <th rowspan="2" style="width:60px;" class="text-center"><?php echo display('Bundle No');?><i class="text-danger">*</i></th> <th rowspan="2"  class="text-center"><?php echo  display('description'); ?></th> <th rowspan="2" style="width:60px;" class="text-center"><?php echo display('Thick ness');?><i class="text-danger">*</i></th> <th rowspan="2" class="text-center"><?php echo display('Supplier Block No');?><i class="text-danger">*</i></th>  <th rowspan="2" class="text-center" ><?php echo display('Supplier Slab No');?><i class="text-danger">*</i> </th> <th colspan="2" style="width:150px;" class="text-center"><?php echo display('Gross Measurement');?><i class="text-danger">*</i> </th> <th rowspan="2" class="text-center"><?php echo display('Gross Sq.Ft');?></th>  <th rowspan="2" style="width:40px;" class="text-center"><?php echo display('Slab No');?><i class="text-danger">*</i></th> <th colspan="2" style="width:150px;" class="text-center"><?php echo display('Net Measure');?><i class="text-danger">*</i></th> <th rowspan="2" class="text-center"><?php echo display('Net Sq.Ft');?></th> <th rowspan="2"  style="width:90px;" class="text-center"><?php echo display('Cost per Sq.Ft');?></th> <th rowspan="2"  style="width:100px;" class="text-center"><?php echo display('Cost per Slab');?></th> <th rowspan="2"  style="width:90px;" class="text-center"><?php echo display('sales'); ?><br/><?php echo display('Price per Sq.Ft');?></th> <th rowspan="2"  style="width:90px;" class="text-center"><?php echo display('Sales Slab Price');?></th> <th rowspan="2" class="text-center"><?php echo display('Weight');?></th> <th rowspan="2" class="text-center"><?php echo display('Origin');?></th>  <th rowspan="2" style="width: 110px" class="text-center"><?php  echo  display('total'); ?></th> <th rowspan="2" class="text-center"><?php  echo  display('action'); ?></th> </tr>  <tr> <th class="text-center"><?php echo display('Width');?></th> <th class="text-center"><?php echo display('Height');?></th> <th class="text-center"><?php echo display('Width');?></th> <th class="text-center"><?php echo display('Height');?></th> </tr>  </thead> <tbody id="addPurchaseItem_'+ dynamic_id +'"> <tr> <input type="hidden" name="tableid[]" id="tableid_'+ dynamic_id +'"/><td> <input   list="magicHouses"  name="prodt[]" id="prodt_'+ dynamic_id +'"   class="form-control product_name" style="width:160px;" placeholder="Search Product" > <datalist id="magicHouses"> <option value="Select the Product" selected>Select the Product</option> <?php  foreach($product as $tx){?>  <option value="<?php echo $tx["product_name"]."-".$tx["product_model"];?>">  <?php echo $tx["product_name"]."-".$tx["product_model"];  ?></option> <?php } ?> </datalist> <input type="hidden" class="common_product autocomplete_hidden_value  product_id_'+ dynamic_id +'" name="product_id[]" id="SchoolHiddenId_'+ dynamic_id +'" /> </td> <td> <input type="text" id="bundle_no_'+ dynamic_id +'" name="bundle_no[]" required="" class="bundle_no form-control" /> </td> <td> <input type="text" id="description_'+ dynamic_id +'" name="description[]" class="form-control" /> </td>  <td > <input type="text" name="thickness[]" id="thickness_'+ dynamic_id +'" required="" class="form-control"/> </td> <td> <input type="text" id="supplier_b_no_'+ dynamic_id +'" name="supplier_block_no[]" required="" class="form-control" /> </td>  <td > <input type="text"  id="supplier_s_no_'+ dynamic_id +'" name="supplier_slab_no[]" required="" class="form-control"/> </td> <td> <input type="text" id="gross_width_'+ dynamic_id +'" name="gross_width[]" required="" class="gross_width  form-control" /> </td> <td> <input type="text" id="gross_height_'+ dynamic_id +'" name="gross_height[]"  required="" class="gross_height form-control" /> </td>  <td > <input type="text"   style="width:60px;" readonly id="gross_sq_ft_'+ dynamic_id +'" name="gross_sq_ft[]" class="gross_sq_ft form-control"/> </td>   <td style="text-align:center;" >  <input type="text"   style="width:20px;" value="1" class="slab_no" id="slab_no_'+ dynamic_id +'" name="slab_no[]"   readonly  required=""/>  </td> <td> <input type="text" id="net_width_'+ dynamic_id +'" name="net_width[]" required="" class="net_width form-control" /> </td> <td> <input type="text" id="net_height_'+ dynamic_id +'" name="net_height[]"    required="" class="net_height form-control" /> </td> <td > <input type="text"   style="width:60px;" readonly id="net_sq_ft_'+ dynamic_id +'" name="net_sq_ft[]" class="net_sq_ft form-control"/> </td> <td>   <span class="input-symbol-euro"><input type="text" id="cost_sq_ft_'+ dynamic_id +'"  name="cost_sq_ft[]" readonly  style="width:70px;" value="0.00"  class="cost_sq_ft form-control" ></span>   <td >  <span class="input-symbol-euro"> <input type="text"  id="cost_sq_slab_'+ dynamic_id +'" name="cost_sq_slab[]" readonly   style="width:70px;" value="0.00"  class="form-control"/></span>     </td> <td>  <span class="input-symbol-euro">  <input type="text" id="sales_amt_sq_ft_'+ dynamic_id +'"  name="sales_amt_sq_ft[]"  style="width:70px;"  value="0.00" class="sales_amt_sq_ft form-control" /></span>     </td>  <td >  <span class="input-symbol-euro">   <input type="text"  id="sales_slab_amt_'+ dynamic_id +'" name="sales_slab_amt[]"  style="width:70px;" value="0.00"  class="sales_slab_amt form-control"/></td> </span>     </td> <td> <input type="text" id="weight_'+ dynamic_id +'" name="weight[]"  class="weight form-control" /> </td>  <td > <input type="text"  id="origin_'+ dynamic_id +'" name="origin[]" class="form-control"/> </td>  <td > <span class="input-symbol-euro"><input  type="text" class="total_price form-control" style="width:80px;" readonly value="0.00"  id="total_amt_'+ dynamic_id +'"     name="total_amt[]"/></span> </td>  <td style="text-align:center;"> <button  class="delete btn btn-danger" id="delete_'+ dynamic_id +'" type="button" value="Delete" ><i class="fa fa-trash"></i></button> </td>  </tr> </tbody> <tfoot> <tr> <td style="text-align:right;" colspan="8"><b>Gross weight :</b></td> <td > <input type="text" id="overall_gross_'+ dynamic_id +'" name="overall_gross[]"   class="overall_gross form-control" style="width: 60px"  readonly="readonly"  /> </td> <td style="text-align:right;" colspan="3"><b>Net weight :</b></td> <td > <input type="text" id="overall_net_'+ dynamic_id +'" name="overall_net[]"  class="overall_net form-control"  style="width: 60px"  readonly="readonly"  /> </td>  <td style="text-align:right;" colspan="4"><b>Weight :</b></td> <td ><input type="text" id="overall_weight_'+ dynamic_id +'" name="overall_weight[]"  class="overall_weight form-control"  style="width: 70px"  readonly="readonly"  />  </td> <td style="text-align:right;" colspan="1"><b>TOTAL :</b></td> <td > <span class="input-symbol-euro">    <input type="text" id="Total_'+ dynamic_id +'" name="total[]"   class="b_total form-control"  style="width: 80px" value="0.00"  readonly="readonly"  /> </span> </td>  <td  style="text-align:center;"><i id="buddle_'+ dynamic_id +'" onclick="removebundle(); " class="btn-danger removebundle fa fa-minus" aria-hidden="true"></i></td>   </tr> </foot></table> <i id="buddle_1"  style="margin-right: 18px;float:right;color:white;background-color:#38469f;"   onclick="addbundle1(); " class="addbundle fa fa-plus" aria-hidden="true"></i>';  

document.getElementById('content').appendChild(newdiv);

dynamic_id++;



}
$(document).on('click', '.addbundle', function(){
         $(this).css("display","none");
      $(this).closest('table').find('.removebundle').css("display","inline-block;");
 });
  $(document).on('keyup','.normalinvoice tbody tr:last',function (e) {
   
var tid=$(this).closest('table').attr('id');
const indexLast = tid.lastIndexOf('_');
var id = tid.slice(indexLast + 1);
   var $last = $('#addPurchaseItem_'+id + ' tr:last');
   var num = id+($last.index()+1);
    
    $('#addPurchaseItem_'+id  + ' tr:last').clone().find('input,select').attr('id', function(i, current) {
        return current.replace(/\d+$/, num);
        
    }).end().appendTo('#addPurchaseItem_'+id );
  
 $.each($('#normalinvoice_'+id  +  '> tbody > tr'), function (index, el) {
            $(this).find(".slab_no").val(index + 1); // Simply couse the first "prototype" is not counted in the list                
        })



        });



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

   $('#'+localStorage.getItem("delete_table")).find('.net_sq_ft').each(function() {
var v=$(this).val();
 if (!isNaN(v) && v.length !== 0) {
          sumnet += parseFloat(v);
        }

});
  $('#'+localStorage.getItem("delete_table")).find('.overall_net').val(sumnet.toFixed(3));


    var sumgross=0;

    $('#'+localStorage.getItem("delete_table")).find('.gross_sq_ft').each(function() {
var v=$(this).val();
 if (!isNaN(v) && v.length !== 0) {
          sumgross += parseFloat(v);
        }
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
 if (!isNaN(v) && v.length !== 0) {
  overall_sum += parseFloat(v);
 }
});
 $('#Over_all_Total').val(overall_sum).trigger('change');
localStorage.removeItem("delete_table");



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

     $(this).closest('table').find('.net_sq_ft').each(function() {
       
var v=$(this).val();
 if (!isNaN(v) && v.length !== 0) {
          sumnet += parseFloat(v);
        }

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

     $(this).closest('table').find('.total_price').each(function() {
var v=$(this).val();
  sum += parseFloat(v);

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

gt(id);

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

     $(this).closest('table').find('.gross_sq_ft').each(function() {
var v=$(this).val();
 if (!isNaN(v) && v.length !== 0) {
          sumgross += parseFloat(v);
        }

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
$(document).on('change input select','.product_name', function (e) {
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
     $(this).closest('table').find('.net_sq_ft').each(function() {
var v=$(this).val();
 if (!isNaN(v) && v.length !== 0) {
          sumnet += parseFloat(v);
        }
});
$('#overall_net_'+idt).val(sumnet.toFixed(3));
    var sumgross=0;

     $(this).closest('table').find('.gross_sq_ft').each(function() {
var v=$(this).val();
 if (!isNaN(v) && v.length !== 0) {
          sumgross += parseFloat(v);
        }
});
$('#overall_gross_'+idt).val(sumgross.toFixed(3));
var total_net=0;
 $('.table').each(function() {
    $(this).find('.net_sq_ft').each(function() {
        var precio = $(this).val();
        if (!isNaN(precio) && precio.length !== 0) {
          total_net += parseFloat(precio);
        }
      });


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


var overall_sum=0;
 $('.table').each(function() {
    $(this).find('.total_price').each(function() {
        var precio = $(this).val();
        if (!isNaN(precio) && precio.length !== 0) {
          overall_sum += parseFloat(precio);
        }
      });


  });


$('#Over_all_Total').val(overall_sum).trigger('change');
  var sum=0;
     $(this).closest('table').find('.total_price').each(function() {
var v=$(this).val();
  sum += parseFloat(v);

});
$('#Total_'+idt).val(sum);



gt(id);
   var id= $(this).attr('id');
 //  debugger;
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
       //  debugger;
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


















































  
$(document).ready(function(){
   $('.removebundle').hide();
$('#amt').hide();
$('#bal').hide();
    });
    function calculate(){

var final_g= $('#final_gtotal').val();

var first=$("#Over_all_Total").val();
    var tax= $('#product_tax').val();

var field = tax.split('-');

var percent = field[1];
var answer=0;
  var answer =(parseInt(percent) / 100) * parseInt(first);
   console.log(answer);
   $('#tax_details').val(answer.toFixed(3) +" ( "+tax+" )");

  var gtotal = parseInt(first + answer);
  console.log(gtotal);
var amt=parseInt(answer)+parseInt(first);
 var num = isNaN(parseInt(amt)) ? 0 : parseInt(amt)
 var custo_amt=$('.custocurrency_rate').val();
 $("#gtotal").val(num);  
 console.log(num +"-"+custo_amt);
 localStorage.setItem("customer_grand_amount_sale",num);

 var value=num*custo_amt;
 var custo_final = isNaN(parseInt(value)) ? 0 : parseInt(value)
$('#vendor_gtotal').val(custo_final);
var bal_amt=custo_final-$('#amount_paid').val();
$('#balance').val(bal_amt);

}

$('#Total').on('change textInput input', function (e) {
    calculate();
});

$('.custocurrency_rate').on('change textInput input', function (e) {
    calculate();
});

const curItem1 = document.querySelector(".cur-item-1");
const curItem2 = document.querySelector(".cur-item-2");

const curInput1 = document.querySelector(".cur-input-1");
const curInput2 = document.querySelector(".cur-input-2");

const rateBox = document.querySelector(".rate");
const changeBtn = document.querySelector(".fa-retweet");

function calc() {
  const curItem1Value = curItem1.value;
  const curItem2Value = curItem2.value;
  fetch(`https://api.exchangerate-api.com/v4/latest/${curItem1Value}`)
    .then((res) => res.json())
    .then((data) => {
      const rate = data.rates[curItem2Value];

      rateBox.textContent = `1 ${curItem1Value} = ${rate.toFixed(
        4
      )} ${curItem2Value}`;

      curInput2.value = (curInput1.value * rate).toFixed(2);
    });
}
  $(document).ready(function(){



var tid=$('.table').closest('table').attr('id');
const indexLast = tid.lastIndexOf('_');
var id = tid.slice(indexLast + 1);


for (j = 0; j < 6; j++) {
       var $last = $('#addPurchaseItem_1 tr:last');
   // var num = id+"_"+$last.index() + 2;
    var num = id+($last.index()+1);
    
    


     $('#addPurchaseItem_1 tr:last').clone().find('input,select,button').attr('id', function(i, current) {
        return current.replace(/\d+$/, num);
        
    }).end().appendTo('#addPurchaseItem_1');
     $.each($('#normalinvoice_1 > tbody > tr'), function (index, el) {
            $(this).find(".slab_no").val(index + 1); // Simply couse the first "prototype" is not counted in the list                
        })
      
}



});
// function listeners() {
//   curItem1.addEventListener("change", calc);
//   curItem2.addEventListener("change", calc); 

//   curInput1.addEventListener("input", calc);
//   curInput2.addEventListener("input", calc);

//   changeBtn.addEventListener("click", () => {
//     [curItem1.value, curItem2.value] = [curItem2.value, curItem1.value];
//     calc();
//     changeBtn.classList.toggle("rotate-btn");
//   });
// }

// // window.onmousemove = () => {

//   window.onmousemove = () => {  
//   listeners();
//   calc();
//   compute();

// };

// // currency

// const input_currency = document.querySelector('#input_currency');
// const output_currency = document.querySelector('#output_currency');
// const input_amount = document.querySelector('#input_amount');
// const output_amount = document.querySelector('#output_amount');
// const exchange = document.querySelector('#exchange');
// const rate = document.querySelector('#rate');
// // const rate = document.querySelector('#rate2');

// input_currency.addEventListener('change', compute);
// output_currency.addEventListener('change', compute);
// input_amount.addEventListener('input', compute);
// output_amount.addEventListener('input', compute);

// exchange.addEventListener('click', ()=>{
//     const temp = input_currency.value;
//     input_currency.value = output_currency.value;
//     output_currency.value= temp;
//     compute();
// });


// function compute(){
//     const input_currency1 = input_currency.value;
//     const output_currency1 = output_currency.value;

//     fetch(`https://api.exchangerate-api.com/v4/latest/${input_currency1}`)
//     .then(res => res.json())
//     .then(res => {
//         const new_rate = res.rates[output_currency1];
//         rate.innerText = `1 ${input_currency1} = ${new_rate} ${output_currency1}`
//         output_amount.value = (input_amount.value * new_rate).toFixed(2);
//     })

// }

















    function configureDropDownLists(ddl1,ddl2) {
var assets = ['1010 CASH Operating Account', '1020 CASH Debitors', '1030 CASH Petty Cash'];
var receivables = ['1210 A/REC Trade', '1220 A/REC Trade Notes Receivable', '1230 A/REC Installment Receivables','1240 A/REC Retainage Withheld','1290 A/REC Allowance for Uncollectible Accounts'];
var inventories = ['1310 INV – Reserved', '1320 INV – Work-in-Progress', '1330 INV – Finished Goods','1340 INV – Reserved','1350 INV – Unbilled Cost & Fees','1390 INV – Reserve for Obsolescence'];
var prepaid_expense = ['1410 PREPAID – Insurance', '1420 PREPAID – Real Estate Taxes', '1430 PREPAID – Repairs & Maintenance','1440 PREPAID – Rent','1450 PREPAID – Deposits'];
var property_plant = ['1510 PPE – Buildings', '1520 PPE – Machinery & Equipment', '1530 PPE – Vehicles','1540 PPE – Computer Equipment','1550 PPE – Furniture & Fixtures','1560 PPE – Leasehold Improvements'];
var acc_dep = ['1610 ACCUM DEPR Buildings', '1620 ACCUM DEPR Machinery & Equipment', '1630 ACCUM DEPR Vehicles','1640 ACCUM DEPR Computer Equipment','1650 ACCUM DEPR Furniture & Fixtures','1660 ACCUM DEPR Leasehold Improvements'];
var noncurrenctreceivables = ['1710 NCA – Notes Receivable', '1720 NCA – Installment Receivables', '1730 NCA – Retainage Withheld'];
var intercompany_receivables = ['1910 Organization Costs', '1920 Patents & Licenses', '1930 Intangible Assets – Capitalized Software Costs'];
var liabilities = ['2110 A/P Trade', '2120 A/P Accrued Accounts Payable', '2130 A/P Retainage Withheld','2150 Current Maturities of Long-Term Debt','2160 Bank Notes Payable','2170 Construction Loans Payable'];
var accrued_compensation = ['2210 Accrued – Payroll', '2220 Accrued – Commissions', '2230 Accrued – FICA','2240 Accrued – Unemployment Taxes','2250 Accrued – Workmen’s Comp'];
var other_accrued_expenses = ['2310 Accrued – Rent', '2320 Accrued – Interest', '2330 Accrued – Property Taxes', '2340 Accrued – Warranty Expense'];
var accrued_taxes= ['2510 Accrued – Federal Income Taxes', '2520 Accrued – State Income Taxes', '2530 Accrued – Franchise Taxes','2540 Deferred – FIT Current','2550 Deferred – State Income Taxes'];
var deferred_taxes= ['2610 D/T – FIT – NON CURRENT', '2620 D/T – SIT – NON CURRENT'];
var long_term_debt=['2710 LTD – Notes Payable','2720 LTD – Mortgages Payable','2730 LTD – Installment Notes Payable'];
var intercompany_payables=['3100 Common Stock','3200 Preferred Stock','3300 Paid in Capital','3400 Partners Capital','3500 Member Contributions','3900 Retained Earnings'];
var revenue=['4010 REVENUE – PRODUCT 1','4020 REVENUE – PRODUCT 2','4030 REVENUE – PRODUCT 3','4040 REVENUE – PRODUCT 4','4600 Interest Income','4700 Other Income','4800 Finance Charge Income','4900 Sales Returns and Allowances','4950 Sales Discounts'];
var cost_goods= ['5010 COGS – PRODUCT 1', '5020 COGS – PRODUCT 2','5030 COGS – PRODUCT 3','5040 COGS – PRODUCT 4','5700 Freight','5800 Inventory Adjustments','5900 Purchase Returns and Allowances','5950 Reserved'];
var operating_expenses=['6010 Advertising Expense','6050 Amortization Expense','6100 Auto Expense','6150 Bad Debt Expense','6150 Bad Debt Expense','6200 Bank Charges','6250 Cash Over and Short','6300 Commission Expense','6350 Depreciation Expense','6400 Employee Benefit Program','6550 Freight Expense','6600 Gifts Expense','6650 Insurance – General','6700 Interest Expense','6750 Professional Fees','6800 License Expense','6850 Maintenance Expense','6900 Meals and Entertainment','6950 Office Expense','7000 Payroll Taxes','7050 Printing','7150 Postage','7200 Rent','7250 Repairs Expense','7300 Salaries Expense','7350 Supplies Expense','7400 Taxes – FIT Expense','7500 Utilities Expense','7900 Gain/Loss on Sale of Assets'];
switch (ddl1.value) {
case '1000 ASSETS':
ddl2.options.length = 0;
for (i = 0; i < assets.length; i++) {
createOption(ddl2, assets[i], assets[i]);
}
break;
case '1200 RECEIVABLES':
ddl2.options.length = 0;
for (i = 0; i < receivables.length; i++) {
createOption(ddl2, receivables[i], receivables[i]);
}
break;
case '1300 INVENTORIES':
ddl2.options.length = 0;
for (i = 0; i < inventories.length; i++) {
createOption(ddl2, inventories[i], inventories[i]);
}
break;
case '1400 PREPAID EXPENSES & OTHER CURRENT ASSETS':
ddl2.options.length = 0;
for (i = 0; i < prepaid_expense.length; i++) {
createOption(ddl2, prepaid_expense[i], prepaid_expense[i]);
}
break;
case '1500 PROPERTY PLANT & EQUIPMENT':
ddl2.options.length = 0;
for (i = 0; i < property_plant.length; i++) {
createOption(ddl2, property_plant[i], property_plant[i]);
}
break;
case '1600 ACCUMULATED DEPRECIATION & AMORTIZATION':
ddl2.options.length = 0;
for (i = 0; i < acc_dep.length; i++) {
createOption(ddl2, acc_dep[i], acc_dep[i]);
}
break;
case '1700 NON – CURRENT RECEIVABLES':
ddl2.options.length = 0;
for (i = 0; i < noncurrenctreceivables.length; i++) {
createOption(ddl2, noncurrenctreceivables[i], noncurrenctreceivables[i]);
}
break;
case '1800 INTERCOMPANY RECEIVABLES & 1900 OTHER NON-CURRENT ASSETS':
ddl2.options.length = 0;
for (i = 0; i < intercompany_receivables.length; i++) {
createOption(ddl2, intercompany_receivables[i], intercompany_receivables[i]);
}
break;
case '2000 LIABILITIES & 2100 PAYABLES':
ddl2.options.length = 0;
for (i = 0; i < liabilities.length; i++) {
createOption(ddl2, liabilities[i], liabilities[i]);
}
break;
case '2200 ACCRUED COMPENSATION & RELATED ITEMS':
ddl2.options.length = 0;
for (i = 0; i < accrued_compensation.length; i++) {
createOption(ddl2, accrued_compensation[i], accrued_compensation[i]);
}
break;
case '2300 OTHER ACCRUED EXPENSES':
ddl2.options.length = 0;
for (i = 0; i < other_accrued_expenses.length; i++) {
createOption(ddl2, other_accrued_expenses[i], other_accrued_expenses[i]);
}
break;
case '2500 ACCRUED TAXES':
ddl2.options.length = 0;
for (i = 0; i < accrued_taxes.length; i++) {
createOption(ddl2, accrued_taxes[i], accrued_taxes[i]);
}
break;
case '2600 DEFERRED TAXES':
ddl2.options.length = 0;
for (i = 0; i < deferred_taxes.length; i++) {
createOption(ddl2, deferred_taxes[i], deferred_taxes[i]);
}
break;
case '2700 LONG-TERM DEBT':
ddl2.options.length = 0;
for (i = 0; i < long_term_debt.length; i++) {
createOption(ddl2, long_term_debt[i], long_term_debt[i]);
}
break;
case '2800 INTERCOMPANY PAYABLES & 2900 OTHER NON CURRENT LIABILITIES & 3000 OWNERS EQUITIES':
ddl2.options.length = 0;
for (i = 0; i < intercompany_payables.length; i++) {
createOption(ddl2, intercompany_payables[i], intercompany_payables[i]);
}
break;
case '4000 REVENUE':
ddl2.options.length = 0;
for (i = 0; i < revenue.length; i++) {
createOption(ddl2, revenue[i], revenue[i]);
}
break;
case '5000 COST OF GOODS SOLD':
ddl2.options.length = 0;
for (i = 0; i < cost_goods.length; i++) {
createOption(ddl2, cost_goods[i], cost_goods[i]);
}
break;
case '6000 – 7000 OPERATING EXPENSES':
ddl2.options.length = 0;
for (i = 0; i < operating_expenses.length; i++) {
createOption(ddl2, operating_expenses[i], operating_expenses[i]);
}
break;
default:
ddl2.options.length = 0;
break;
}
}
function createOption(ddl, text, value) {
var opt = document.createElement('option');
opt.value = value;
opt.text = text;
ddl.options.add(opt);
}

</script>
  <style>
.main-footer {
 display:none;
}
textarea:focus, input:focus{
   
    outline: none;
}
 .text-right {
    text-align: left; 
}
</style>
