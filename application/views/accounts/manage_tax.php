<?php error_reporting(1);  ?>

<script src="<?php echo base_url() ?>my-assets/js/admin_js/account.js" type="text/javascript"></script>
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

<!-- Cheaque Manager Start -->
<div class="content-wrapper">
	<section class="content-header">
	    <div class="header-icon">
	        <i class="pe-7s-note2"></i>
	    </div>
	    <div class="header-title">
	        <h1><?php echo display('manage_tax') ?></h1>
	        <small></small>
	        <ol class="breadcrumb">
	            <li><a href="#"><i class="pe-7s-home"></i> <?php echo display('home') ?></a></li>
	            <li><a href="#"><?php echo display('accounts') ?></a></li>
	            <li class="active"><?php echo display('manage_tax') ?></li>
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


     

	
	





<div class="panel panel-default">
                    <div class="panel-body"> 
                        <div class="row">
                        <div class="col-sm-4">
                







             




    <?php    foreach(  $this->session->userdata('perm_data') as $test){
    $split=explode('-',$test);
    if(trim($split[0])=='tax' && $_SESSION['u_type'] ==3 && trim($split[1])=='1000'){
      
      
       ?>

<a href="<?php  echo base_url(); ?>/Caccounts/add_taxes " class="btnclr btn m-b-5 m-r-2" style="color:white;background-color: #337ab7;border-color: #2e6da4;"><?php echo display('Create Tax') ?></a>
                    
                    <?php break;}} 
                    if($_SESSION['u_type'] ==2){ ?>

<a href="<?php  echo base_url(); ?>/Caccounts/add_taxes " class="btnclr btn m-b-5 m-r-2" style="color:white;background-color: #337ab7;border-color: #2e6da4;"><?php echo display('Create Tax') ?></a>

                        <?php  } ?>















                        </div>


                        <div class="col-sm-2"  >
           <input type="button" class="btn btnclr" name="btnPrint" id="btnPrint"   value="Print" onclick="printDiv('printArea');"/>

           </div>




                        <div class="col-sm-4">
                     
                        <?php echo form_open_multipart('Cinvoice/manage_invoice',array('class' => 'form-vertical', 'id' => 'insert_sale','name' => 'insert_sale'))?>

                        <?php echo form_close() ?>

                       </div>

                   

                    <div class="col-sm-2">
                    <i class="fa fa-cog"  aria-hidden="true" id="myBtn" style="font-size:25px;" onClick="columnSwitchMODAL()"></i> <!-- onclick opens MODAL -->
                   
                    <div class="dropdown bootcol" id="drop" style="float:right;padding-right:20px;padding-bottom:10px;">
                    <button class="btn btnclr dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
       <span class="glyphicon glyphicon-th-list"></span> <?php echo display('Download') ?>
    </button>
    <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">          
      <li><a href="#" id="cmd"> <img src="<?php echo base_url()?>assets/images/pdf.png" width="24px"> PDF</a></li>
      <li class="divider"></li>                   
      <li><a href="#" onclick="$('#ProfarmaInvList').tableExport({type:'excel',escape:'false'});"> <img src="<?php echo base_url()?>assets/images/xls.png" width="24px"> XLS</a></li>           
    </ul>
  </div>

                </div>  
                </div>

           

            </div>
            </div>






     
            <div class="row">
		    <div class="col-sm-0"  style="text-align:right;">


            <div class="panel-title" >
               <div id="for_filter_by" class="for_filter_by" style="display: inline;text-align:right;"><label for="filter_by"><?php echo display('Filter By') ?>&nbsp;&nbsp;
                
                   </label><select id="filterby" style="border-radius:5px;height:25px;">
                    <option value="1"><?php echo display('S.No') ?></option>
                  <option value="2"><?php echo display('Tax') ?></option>
<option value="3"><?php echo display('Tax ID') ?></option>
<option value="4"><?php echo display('Description') ?></option>
<option value="5"><?php echo display('Tax Agency') ?></option>
<option value="6"><?php echo display('Sale Rate') ?></option>
<option value="7"><?php echo display('Account') ?></option>
<option value="8"><?php echo display('Show Tax On Return') ?></option>

                  </select> <input id="filterinput" style="border-radius:5px;height:25px;" type="text">
				 
				</div>
                </div>



       
            </div>
                </div>
  


























<div class="panel panel-bd lobidrag">

		            <div class="panel-body">
		                <div class="table-responsive">


						<div  id="printArea">
                         <div id="content" id="printArea">
	


												


								



        <div  id="dataTableExample3">
		                    <table  id="ProfarmaInvList" class="table table-bordered table-striped table-hover">
			           			<thead>
									<tr>
									 

		 <th class="1 value"  data-col="1"    style="width: 100px; height: 40.0114px;" ><?php echo display('S.No') ?></th>
         <th class="2 value"  data-col="2"    style="height: 45.0114px; width: 274.011px" ><?php echo display('Tax') ?></th>
         <th class="3 value"  data-col="3"     ><?php echo display('Tax ID') ?></th>
         <th class="4 value"  data-col="4"    style="width: 278.011px;"        ><?php echo display('Description') ?></th>
         <th class="5 value"  data-col="5"    style="width: 298.011px;"       ><?php echo display('Tax Agency') ?></th>
		 <th class="6 value" data-col="6"    style="width: 248.011px;"       ><?php echo display('Sale Rate') ?> </th>
         <th class="7 value" data-col="7"    style="width: 198.011px;"       ><?php echo display('Account') ?></th>
         <th class="8 value" data-col="8"    style="width: 598.011px;"       ><?php echo display('Show Tax On Return Line') ?></th>

         <div class="myButtonClass Action">
		<th class="9 value" data-col="9" data-resizable-column-id="6"    style="width: 198.011px;"       ><?php echo display('Action') ?></th>
        </div>


									</tr>
								</thead>
								<tbody>
								<?php
									if ($tax_list) {
										$i=1;
								foreach ($tax_list as $tax) {
								?>
									<tr>
										


   <tr style="text-align:center" ><td data-col="1" class="1"><?php  echo $i;  ?></td>
   <td data-col="2" class="2"><?php   echo $tax->tax;  ?>%</td>
   <td data-col="3" class="3"> <?php   echo  $tax->tax_id  ?></td>
   <td data-col="4" class="4"><?php   echo $tax->description  ?></td>
   <td data-col="5" class="5"><?php   echo $tax->tax_agency ?></td>
   <td data-col="6" class="6"><?php   echo $tax->sale_rate  ?></td>
   <td data-col="7" class="7"><?php   echo $tax->account  ?></td>
   <td data-col="8" class="8"><?php  echo $tax->show_taxonreturn  ?></td>

						                <td  data-col="9" class="9" >
                                        <div class="form-group">
			<center>

						



                     


    <?php    foreach(  $this->session->userdata('perm_data') as $test){
    $split=explode('-',$test);
    if(trim($split[0])=='tax' && $_SESSION['u_type'] ==3 && trim($split[1])=='0010'){
      
      
       ?>

<a href="<?php echo base_url().'Caccounts/tax_edit/'.$tax->tax_id; ?>" class="btnclr btn  btn-sm" style="background-color: #3CA5DE; color: #fff;" data-toggle="tooltip" data-placement="right" title="" data-original-title="<?php echo display('update') ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                    
                    <?php break;}} 
                    if($_SESSION['u_type'] ==2){ ?>

<a href="<?php echo base_url().'Caccounts/tax_edit/'.$tax->tax_id; ?>" class="btnclr btn  btn-sm" style="background-color: #3CA5DE; color: #fff;" data-toggle="tooltip" data-placement="right" title="" data-original-title="<?php echo display('update') ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>

                        <?php  } ?>













					                        
		 

         <?php    foreach(  $this->session->userdata('perm_data') as $test){
    $split=explode('-',$test);
    if(trim($split[0])=='tax' && $_SESSION['u_type'] ==3 && trim($split[1])=='0001'){
      
      
       ?>

<a href="<?php echo base_url().'Caccounts/tax_delete/'.$tax->tax_id; ?>" class="btnclr btn  btn-sm" style="background-color: #3CA5DE; color: #fff;"  data-toggle="tooltip" data-placement="right" title="" data-original-title="<?php echo display('delete') ?>"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                    
                    <?php break;}} 
                    if($_SESSION['u_type'] ==2){ ?>

<a href="<?php echo base_url().'Caccounts/tax_delete/'.$tax->tax_id; ?>" class="btnclr btn  btn-sm" style="background-color: #3CA5DE; color: #fff;"  data-toggle="tooltip" data-placement="right" title="" data-original-title="<?php echo display('delete') ?>"><i class="fa fa-trash-o" aria-hidden="true"></i></a>

                        <?php  } ?>









</center>

</div>



						                </td>
									</tr>
								<?php
								$i++;
									}
								}
								?>
								</tbody>
		                    </table>
							</div>

							</div>
		        </div>
		                </div>
		            </div>
		        </div>
		    </div>
		</div>
	</section>
</div>
<!-- Cheaque Manager End -->




<script src="<?php echo base_url()?>assets/js/jquery.bootgrid.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.5/jspdf.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.0.0-alpha.1/jspdf.plugin.autotable.js"></script>

  <div id="myModal_colSwitch" class="modal_colSwitch" >
                    <div class="modal-content_colSwitch" style="width:25%;height:35%;">
                          <span class="close_colSwitch">&times;</span>
                          <div class="col-sm-6"><br><br>
                          <div class="form-group row">
                          <input type="checkbox"  data-control-column="1" checked = "checked" class="1"  value="1"/><?php echo display('S.No') ?><br>
<input type="checkbox"  data-control-column="2" checked = "checked" class="2"  value="2"/><?php echo display('Tax') ?><br>
<input type="checkbox"  data-control-column="3" checked = "checked" class="3"   value="3"/><?php echo display('Tax ID') ?><br>
<input type="checkbox"  data-control-column="4" checked = "checked" class="4"   value="4"/><?php echo display('Description') ?> <br>
<input type="checkbox"  data-control-column="5" checked = "checked" class="5"   value="5"/><?php echo display('Tax Agency') ?> <br>
<input type="checkbox"  data-control-column="5" checked = "checked" class="6"   value="6"/><?php echo display('Sale Rate') ?> <br>
<input type="checkbox"  data-control-column="5" checked = "checked" class="7"   value="7"/><?php echo display('Account') ?> <br>
<input type="checkbox"  data-control-column="5" checked = "checked" class="8"   value="8"/><?php echo display('Show Tax on Return Line') ?><br>
<input type="checkbox"  data-control-column="6" checked = "checked" class="9"   value="9"/><?php echo display('Action') ?><br>



                          </div> </div> </div> </div>


</div>









<script type="text/javascript" src="<?php echo base_url()?>my-assets/js/profarma.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.min.js"></script>
<script>
    $(document).on('keyup', '#filterinput', function(){
  
    var value = $(this).val().toLowerCase();
    var filter=$("#filterby").val();
    $("#ProfarmaInvList tr:not(:eq(0))").filter(function() {
        $(this).toggle($(this).find("td."+filter).text().toLowerCase().indexOf(value) > -1)
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


$('#cmd').click(function() {

  var pdf = new jsPDF('p','pt','a4');
  $('#for_numrows,#pagesControllers').hide();
    const invoice = document.getElementById("content");
             console.log(invoice);
             console.log(window);
             var pageWidth = 8.5;
             var margin=0.5;
             var opt = {
   lineHeight : 1.2,
   margin : 0.2,
   maxLineWidth : pageWidth - margin *1,
                 filename: 'tax_details'+'.pdf',
                 allowTaint: true,
                 html2canvas: { scale: 3 },
                 jsPDF: { unit: 'in', format: 'a4', orientation: 'portrait' }
             };
              html2pdf().from(invoice).set(opt).toPdf().get('pdf').then(function (pdf) {
  var totalPages = pdf.internal.getNumberOfPages();
 for (var i = 1; i <= totalPages; i++) {
    pdf.setPage(i);
    pdf.setFontSize(10);
    pdf.setTextColor(150);
  }
  }).save('tax_details.pdf');
    setTimeout( function(){
      $('#for_numrows,#pagesControllers').show();
    }, 4500 );
});

    </script>