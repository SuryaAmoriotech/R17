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
<style>
    .select2{
        display:none;
    }
</style>
<!-- Supplier Ledger Start -->
<div class="content-wrapper">
    <section class="content-header">
        <div class="header-icon">
            <i class="pe-7s-note2"></i>
        </div>
        <div class="header-title">
            <h1><?php echo ('Vendor Ledger') ?></h1>
            <small></small>
            <ol class="breadcrumb">
                <li><a href="#"><i class="pe-7s-home"></i> <?php echo display('home') ?></a></li>
                <li><a href="#"><?php echo display('vendor') ?></a></li>
                <li class="active" style="color:orange"><?php echo ('Vendor Ledger') ?></li>
            </ol>
        </div>
    </section>

    <!-- Supplier information -->
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





                <div class="panel panel-bd lobidrag">

                    <div class="panel-heading" style="height: 60px;">
            <div class="col-sm-12">
   <div class="col-sm-10">


     <a href="<?php echo base_url('Csupplier') ?>" class="btn btnclr dropdown-toggle" ><i class="ti-plus"> </i> <?php echo display('Add Vendor') ?> </a>


                    <a href="<?php echo base_url('Csupplier/supplier_sales_details_all') ?>" class="btn btnclr dropdown-toggle"><i class="ti-align-justify"> </i>  <?php echo display('vendor_sales_details') ?> </a>

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
       




























        <!-- Supplier ledger -->
        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-bd lobidrag">
                    <div class="panel-heading" >
                        <div class="panel-title">



                        <div class="panel-body"> 
                        <?php echo form_open('Csupplier/supplier_ledger', array('class' => '', 'id' => 'validate')) ?>
                        <?php $today = date('Y-m-d'); ?>
                       <div class="col-sm-4">
                        <div class="form-group row">
                            <label for="customer_name" class="col-sm-2 col-form-label"><?php echo display('Vendor') ?> <i class="text-danger">*</i></label>
                            <div class="col-sm-7">
                                <select name="supplier_id"  class="form-control" required="" >
                                    <option value=""><?php echo display('vendor') ?></option>
                                    <?php if ($supplier) { ?>
                                        {supplier}
                                        <option value="{supplier_id}">{supplier_name} 
                                        </option>
                                        {/supplier}
                                    <?php } ?>
                                </select>
                            </div>
                            </div>
                            </div> 


                            <div class="col-sm-4">
                        <div class="form-group row">
                               
                        <label for="from_date " class="col-sm-1 col-form-label"> <?php echo display('from') ?></label>
                                <div class="col-sm-3">
                                     <input type="date" name="from_date"     style="width:120%;"  value="<?php echo $today; ?>" class="datepicker form-control" id="from_date"/>
                                </div>
                                <label for="to_date" class="col-sm-1 col-form-label"> <?php echo display('to') ?></label>
                                <div class="col-sm-3">
                                   <input type="date" name="to_date"  style="width:120%;"  value="<?php echo $today; ?>" class="datepicker form-control" id="to_date"/>
                                </div>
                                &nbsp; &nbsp; &nbsp;
                                <button type="submit" class="btn btnclr dropdown-toggle"><i class="fa fa-search-plus" aria-hidden="true"></i> <?php echo display('search') ?></button>

                        </div>





                       
                        <?php echo form_close() ?>
                    </div>







                        <div id="bloc2" style="float:right;">
                        <a href="<?php echo base_url('Csupplier/manage_supplier') ?>"  class="btn btnclr dropdown-toggle"   style="color:white;background-color:#38469f;    float: right; "><i class="ti-align-justify"> </i>  <?php echo ('Manage Vendor') ?> </a>
 </div>   




                        </div>
                    </div>
                    <div class="panel-body">
                        <div id="printableArea">

                            <?php if ($supplier_name) { ?>
                                <div class="text-center">
                                    <h3> {supplier_name} </h3>
                                    <h4><?php echo display('address') ?> : {address} </h4>
                                    <h4> <?php echo display('print_date') ?>: <?php echo date("d/m/Y h:i:s"); ?> </h4>
                                </div>
                            <?php } ?>

                            <div class="table-responsive">

                            <table class="table table-bordered" cellspacing="0" width="100%" id="ProfarmaInvList">
  <thead>
      <tr>
      <th class="Date" data-resizable-column-id="1"    style="width: 100px; height: 40.0114px;" ><?php echo display('Date') ?></th>
        <th class="Description" data-resizable-column-id="2"  style="height: 45.0114px; width: 250.011px" ><?php echo display('Description') ?></th>
        <th class="Voucher_no" data-resizable-column-id="3"  style="height: 42.0114px; width: 234.011px"   ><?php echo display('Voucher_no') ?></th>
        <th class="Debit"  data-resizable-column-id="4"  style="width: 200.011px;"><?php echo display('Debit') ?></th>
        <th class="Credit" data-resizable-column-id="5"    style="width: 198.011px;"       ><?php echo display('Credit') ?></th>
        <th class="Balance" data-resizable-column-id="6" style="width: 190.011px; height: 44.0114px;"><?php echo display('Balance') ?></th>
       
      </tr>
    </thead>
                                    <tbody>
                                        <?php
                                        if ($ledgers) {
                                            $sl = 0;
                                            $debit = $credit = $balance = 0;
                                            foreach ($ledgers as $ledger) {
                                                $sl++;
                                                ?>
                                                <tr>
                            <td class="text-center"><?php echo $ledger['VDate']; ?></td>
                            <td><?php echo $ledger['Narration']; ?></td>
                            <td><?php echo $ledger['VNo']; ?></td>
                            <td align="right"><?php 
                                  echo (($position == 0) ? "$currency " : " $currency");
                                    echo number_format($ledger['Debit'], 2, '.', ',');
                                    $debit += $ledger['Debit']; ?></td>
                            <td align="right"> <?php
                                    echo (($position == 0) ? "$currency " : " $currency");
                                    echo number_format($ledger['Credit'], 2, '.', ',');
                                    $credit += $ledger['Credit'];?> </td>
                            <td align='right'>
                                <?php
                                $balance = $debit - $credit;
                                echo (($position == 0) ? "$currency " : " $currency");
                                echo number_format($balance, 2, '.', ',');
                                ?>
                            </td>
                                                </tr>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                    <td colspan="3" align="right"><b><?php echo display('grand_total') ?>:</b></td>
                    <td align="right"><b><?php
                            echo (($position == 0) ? "$currency " : "$currency");
                            echo number_format((@$debit), 2, '.', ',');
                            ?></b>
                    </td>
                    <td align="right"><b><?php
                            echo (($position == 0) ? "$currency " : "$currency");
                            echo number_format((@$credit), 2, '.', ',');
                            ?></b>
                    </td>
                    <td align="right"><b><?php
                            echo (($position == 0) ? "$currency " : "$currency");
                            echo number_format((@$balance), 2, '.', ',');
                            ?></b></td>
                                        </tr>
                                    </tfoot>
                                </table>
                               
                            </div>
                        </div>
                         <!-- <div class="text-right"><?php echo $links ?></div> -->
                    </div>
                </div>
            </div>
        </div>
        
    </section>



















<div id="myModal_colSwitch"  class="modal_colSwitch">
                    <div class="modal-content_colSwitch" style="width:23%;height:25%;">
                    <span class="close_colSwitch">&times;</span>
                       
                          <div class="col-sm-2" ></div>


                          <div class="col-sm-3" ><br>
                          <div class="form-group row"  > 
                         
                           
                          <br><input type="checkbox"  data-control-column="1" checked = "checked" class="opt Date"  value="date"/> <?php echo display('Date') ?><br>
                        
                          <br><input type="checkbox"  data-control-column="4" checked = "checked" class="opt Debit"   value="Debit"/><?php echo display('Debit') ?><br>
                          <br><input type="checkbox"  data-control-column="5" checked = "checked" class="opt Credit"   value="Credit"/><?php echo display('Credit') ?><br>
             </div>
        </div>


        <div class="col-sm-4" ><br>
        <div class="form-group row"  >
        <br><input type="checkbox"  data-control-column="2" checked = "checked" class="opt Description"  value="Description"/><?php echo display('Description') ?><br>
                          <br><input type="checkbox"  data-control-column="3" checked = "checked" class="opt Voucher_no"   value="Voucher_no"/><?php echo display('Voucher_no') ?><br>
                          <br><input type="checkbox"  data-control-column="6" checked = "checked" class="opt Balance"  value="Balance"/><?php echo display('Balance') ?><br>

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

    