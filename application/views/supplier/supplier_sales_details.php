

<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>my-assets/css/css.css" />
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
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


<!-- Supplier Sales Report Start -->
<div class="content-wrapper">
	<section class="content-header">
	    <div class="header-icon">
	        <i class="pe-7s-note2"></i>
	    </div>
	    <div class="header-title">
		<h1><?php echo display('vendor_sales_details') ?></h1>
	        <small></small>
	        <ol class="breadcrumb">
	            <li><a href="#"><i class="pe-7s-home"></i> <?php echo display('home') ?></a></li>
	            <li><a href="#"><?php echo display('vendor') ?></a></li>
	            <li class="active" style="color:orange"><?php echo display('vendor_sales_details') ?></li>
	        </ol>
	    </div>
	</section>

	<!-- Search Supplier -->
	<section class="content">















		<div class="panel panel-bd lobidrag">

<div class="panel-heading" style="height: 60px;">
<div class="col-sm-12">
<div class="col-sm-10">


<a href="<?php echo base_url('Csupplier') ?>" class="btn btnclr dropdown-toggle" ><i class="ti-plus"> </i> <?php echo display('Add Vendor') ?> </a>


<a href="<?php echo base_url('Csupplier/supplier_ledger_report') ?>" class="btn btnclr dropdown-toggle"><i class="ti-align-justify"> </i>  <?php echo ('Vendor Ledger') ?> </a>

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
&nbsp; &nbsp; 

	   <!-- <a  class="btn btnclr dropdown-toggle"  style="font-size:15px;float:right;"  href="#" onclick="printDiv('printableArea')"><?php echo display('print') ?></a> -->
	   <button type="button" style="float:right;"  class="btn btnclr dropdown-toggle"  onclick="printDiv('printableArea')"><?php echo display('print') ?></button>

</div>

</div>
</div>

</div>
</div>









































		<!-- Sales Details -->
		<div class="row">
		    <div class="col-sm-12">
		        <div class="panel panel-bd lobidrag">
		            <div class="panel-heading" >
		                <div class="panel-title">




						<div class="panel-body"> 
<?php echo form_open('Csupplier/supplier_sales_details_datewise' , array('class' => 'form-inline', 'method' => 'get'))  ?>
	<?php $today = date('Y-m-d'); ?>
   <div class="col-sm-3">

		</div> 


		<div class="col-sm-4">
	<div class="form-group row">


		   
	<div class="form-group" >
                            <label class="" for="from_date"><?php echo display('start_date') ?></label>
                            <input type="date" name="from_date" class="form-control datepicker" id="from_date" value="<?php echo  (!empty($fromdate)?$fromdate:date('Y-m-d'))?>" placeholder="<?php echo display('start_date') ?>" >
                        </div> 



		
						<div class="form-group" >
                            <label class="" for="to_date"><?php echo display('end_date') ?></label>
                            <input type="date" name="to_date" class="form-control datepicker" id="to_date" placeholder="<?php echo display('end_date') ?>" value="<?php echo  (!empty($todate)?$todate:date('Y-m-d'))?>">
                        </div>  




						<button type="submit" id="btn-filter" class="btn btnclr dropdown-toggle"><?php echo display('find') ?></button>				
                        <?php echo form_close() ?>


	</div>
</div>










						<div id="bloc2" style="float:right;">
                        <a href="<?php echo base_url('Csupplier/manage_supplier') ?>"  class="btn btnclr dropdown-toggle"  style="color:white;background-color:#38469f;    float: right; "><i class="ti-align-justify"> </i>  <?php echo ('Manage Vendor') ?> </a>
 </div>   






		                </div>
		            </div>
		            <div class="panel-body">
		            	
		            	<div id="printableArea">

		            		<?php if ($supplier_name) { ?>

		            		<div class="text-center">
								<h3> {supplier_name} </h3>
								<h4><?php echo display('address') ?> : {supplier_address} </h4>
								<h4> <?php echo display('print_date') ?>: <?php echo date("d/m/Y h:i:s"); ?> </h4>
							</div>

							<?php } ?>

			                <div class="table-responsive">
			                    <table class="table table-bordered table-striped table-hover"  id="ProfarmaInvList">
									<thead>
										<tr>
											<th  class="Date" data-resizable-column-id="1" ><?php echo display('date') ?></th>
											<th  class="Date" data-resizable-column-id="2"  ><?php echo display('product_name') ?></th>
											<th   class="Date" data-resizable-column-id="3"  ><?php echo display('supplier_name') ?></th>
											<th  class="Date" data-resizable-column-id="4" ><?php echo display('invoice_no') ?></th>
											<th class="Date" data-resizable-column-id="5"  ><?php echo display('quantity') ?></th>
											<th  class="Date" data-resizable-column-id="6"  ><?php echo display('rate') ?></th>
											<th class="Date" data-resizable-column-id="7"  ><?php echo display('amount')?></th>
										</tr>
									</thead>
									<tbody>
									<?php
									if ($sales_info) {
									?>
									{sales_info}
										<tr>
											
											<td>{date}</td>
											<td>
												<a href="<?php echo base_url().'Cproduct/product_view/{product_id}'; ?>">
													{product_name} - {product_model}
												</a>
											</td>
											<td align="right">{supplier_name}</td>
											<td align="center"><a href="<?php echo base_url().'Cinvoice/invoice_inserted_data/{invoice_id}'; ?>">{invoice}</a></td>
											<td align="right">{quantity}</td>
											<td class="text-right !Important"><?php echo (($position==0)?"$currency {supplier_rate}":"{supplier_rate} $currency") ?></td>
											<td class="text-right !Important"><?php echo (($position==0)?"$currency {total}":"{total} $currency") ?></td>
										</tr>
									{/sales_info}
									<?php
									}
									?>
									</tbody>
									<tfoot>
										<tr>
											<td colspan="6" align="right">
												<b><?php echo display('grand_total') ?></b> :
											</td>
											<td class="text-right"><b>
											<?php echo (($position==0)?"$currency {sub_total}":"{sub_total} $currency") ?></b></td>
										</tr>
									</tfoot>
			                    </table>
			                   
			                </div>
			            </div>
			             <div class="text-right"><?php echo $links ?></div>
		            </div>
		        </div>
		    </div>
		</div>
	</section>
</div>
<!-- Supplier Sales Details End -->






<div id="myModal_colSwitch"  class="modal_colSwitch">
                    <div class="modal-content_colSwitch" style="width:29%;height:25%;">
                    <span class="close_colSwitch">&times;</span>
                       
                          <div class="col-sm-2" ></div>


                          <div class="col-sm-2" ><br>
                          <div class="form-group row"  > 
                         
                          <br><input type="checkbox"  data-control-column="1" checked = "checked" class="opt Date"  value="date"/>&nbsp; <?php echo display('Date') ?><br>
                         
						  <br><input type="checkbox"  data-control-column="5" checked = "checked" class="opt quantity"   value="quantity"/>&nbsp;<?php echo display('quantity') ?><br>
<br><input type="checkbox"  data-control-column="6" checked = "checked" class="opt rate"   value="rate"/>&nbsp;<?php echo display('rate') ?><br>



             </div>
        </div>


        <div class="col-sm-3" ><br>
        <div class="form-group row"  >
		<br><input type="checkbox"  data-control-column="4" checked = "checked" class="opt invoice_no"   value="invoice_no"/>&nbsp;<?php echo display('invoice_no') ?><br>
		<br><input type="checkbox"  data-control-column="2" checked = "checked" class="opt product_name"  value="product_name"/>&nbsp;<?php echo display('product_name') ?><br>
                          <br><input type="checkbox"  data-control-column="3" checked = "checked" class="opt supplier_name"   value="supplier_name"/>&nbsp;<?php echo display('supplier_name') ?><br>
                         
                          </div>
                       </div>
                    
        



     
               
     

                           <div class="col-sm-2"  ><br>
                          <div class="form-group row"  >
						  <br><input type="checkbox"  data-control-column="7" checked = "checked" class="opt Balance"  value="Balance"/>&nbsp;<?php echo display('Balance') ?><br>

                        </div>
                          </div>
     




                    </div>
                </div>
    </section>
</div>


















<script src="<?php echo base_url()?>assets/js/jquery.bootgrid.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.5/jspdf.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.0.0-alpha.1/jspdf.plugin.autotable.js"></script>

<script type="text/javascript" src="<?php echo base_url()?>my-assets/js/profarma.js"></script>



            
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
