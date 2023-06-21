<script type="text/javascript" src="<?php echo base_url()?>assets/js/jquery.base64.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/drag_drop_index_table.js"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>
 <script type="text/javascript" src="<?php echo base_url()?>my-assets/js/tableManager.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>my-assets/css/css.css" />
<!-- All Report Start  -->
<style>
    td{
        text-align:center;
    }
    </style>
<div class="content-wrapper">
    <section class="content-header">
        <div class="header-icon">
            <i class="pe-7s-note2"></i>
        </div>
        <div class="header-title">
            <h1><?php echo display('todays_report') ?></h1>
            <small><?php //echo display('todays_sales_and_purchase_report') ?></small>
            <ol class="breadcrumb">
                <li><a href="#"><i class="pe-7s-home"></i> <?php echo display('home') ?></a></li>
                <li><a href="#"><?php echo display('report') ?></a></li>
                <li class="active"><?php echo display('todays_report') ?></li>
            </ol>
        </div>
    </section>

    <section class="content">

        <div class="row">
            <div class="col-sm-12">
           
        <?php if($this->permission1->method('todays_sales_report','read')->access()){ ?>
                    <a href="<?php echo base_url('Admin_dashboard/todays_sales_report') ?>" class="btn btn-info m-b-5 m-r-2"><i class="ti-align-justify"> </i> <?php echo display('sales_report') ?> </a>
                <?php }?>
        <?php if($this->permission1->method('todays_purchase_report','read')->access()){ ?>
                    <a href="<?php echo base_url('Admin_dashboard/todays_purchase_report') ?>" class="btn btn-success m-b-5 m-r-2"><i class="ti-align-justify"> </i>  <?php echo display('purchase_report') ?> </a>
                  <?php }?>
                  <?php if($this->permission1->method('product_sales_reports_date_wise','read')->access()){ ?>
                    <a href="<?php echo base_url('Admin_dashboard/product_sales_reports_date_wise') ?>" class="btn btn-primary m-b-5 m-r-2"><i class="ti-align-justify"> </i>  <?php echo display('sales_report_product_wise') ?> </a>
                    <?php }?>
    <?php if($this->permission1->method('todays_sales_report','read')->access() && $this->permission1->method('todays_purchase_report','read')->access()){ ?>
                    <a href="<?php echo base_url('Admin_dashboard/total_profit_report') ?>" class="btn btn-warning m-b-5 m-r-2"><i class="ti-align-justify"> </i>  <?php echo display('profit_report') ?> </a>
                    <?php }?>

               
            </div>
        </div>

        <!-- Todays sales report -->
        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-bd lobidrag">
                    <div class="panel-heading">
                        <div class="panel-title">
                            <h4><?php echo "Sales : " ?> </h4>
                            <p class="text-right">
                            <!-- <i class="fa fa-cog"  aria-hidden="true" id="myBtn" style="font-size:25px;" onClick="columnSwitchMODAL()"></i> -->
                                <a  class="btn btnclr" href="#" onclick="printDiv('printableArea')"><?php echo display('print') ?></a>
                                
                            </p>
                        </div>
 
                    </div>
                    <div class="panel-body">


                        <div id="printableArea">
                                <table class="print-table" width="100%">
                                                
                                                <tr>
                                                    <td align="left" class="print-table-tr">
                                                    <img src="<?php echo base_url().$software_info[0]['invoice_logo'];?>" alt="logo" width="100px" height="80px">
                                                    </td>
                                                    <td align="center" class="print-cominfo">
                                                        <span class="company-txt">
                                                            <?php echo $company[0]['company_name'];?>
                                                           
                                                        </span><br>
                                                        <?php echo $company[0]['address'];?>
                                                        <br>
                                                        <?php echo $company[0]['email'];?>
                                                        <br>
                                                         <?php echo $company[0]['mobile'];?>
                                                        
                                                    </td>
                                                   
                                                     <td align="right" class="print-table-tr">
                                                        <date>
                                                        <?php echo display('date')?>: <?php
                                                        echo date('d-M-Y');
                                                        ?> 
                                                    </date>
                                                    </td>
                                                </tr>            
                                   
                                </table>
                            <div class="table-responsive">
                             <table class="table table-striped " id="ProfarmaInvList">
                                    <thead>
                                        <tr style="background-color: #337ab7;border-color: #2e6da4;"  >
                                            <th data-col="1" data-control-column="1" class="1 value" style="height: 35.0114px;">Sale Date</th>
                                            <th data-col="2" data-control-column="2" class="2 value" style="height: 35.0114px;">Invoice No</th>
                                            <th data-col="3" data-control-column="3" class="3 value" style="height: 35.0114px;">Customer Name</th>
                                            <th data-col="4" data-control-column="4" class="4 value" style="height: 35.0114px;">Total Amount</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if ($sales_report) {
                                            ?>
                                            {sales_report}
                                            <tr>
                                                <td data-col="1" class="1">{sales_date}</td>
                                                <td data-col="2" class="2">
                                                    <?php  'Cinvoice/invoice_inserted_data/{invoice_id}'; ?>
                                                        {invoice_id}
                                                    
                                                </td>
                                                <td data-col="3" class="3">{customer_name}</td>
                                                <td data-col="4" class="4"><?php

                                                 echo (($position == 0) ? "$currency {total_amount}" : "{total_amount} $currency") ?></td>
                                            </tr>
                                            {/sales_report}
                                             <tr>
                                              <td data-col="1" class="1">&nbsp;</td>
                                                <td data-col="2" class="2">&nbsp;</td>
                                                  <td data-col="3" class="3" style="text-align:right;"><b><?php echo display('total_sales') ?>:</b></td>
                                           
                                            <td data-col="4" class="4"><b><?php
                                                     
                                             echo (($position == 0) ? $currency.' ' .$sales_amount: $sales_amount.' '. $currency) ?></b></td>
                                        </tr>
                                        <?php } else {
                                            ?>
                                            <tr>
                                                <td class="text-center" colspan="4"><?php echo display('not_found'); ?></td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                 
                                </table>
                                <!-- <div id="myModal_colSwitch" class="modal_colSwitch" >
                    <div class="modal-content_colSwitch" style="width:10%;height:20%;">
                          <span class="close_colSwitch">&times;</span>
 <input type="checkbox"  data-control-column="1" checked = "checked" class="1"  value="1"/>Sales Date <br>
<input type="checkbox"  data-control-column="2" checked = "checked" class="2"  value="2"/>Invoice No<br>
<input type="checkbox"  data-control-column="3" checked = "checked" class="3"   value="3"/>Supplier Name<br>
<input type="checkbox"  data-control-column="4" checked = "checked" class="4"   value="4"/>Total Amount<br>    
            </div>
                </div>         -->
                          
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Todays purchase report -->
        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-bd lobidrag">
                    <div class="panel-heading">
                        <div class="panel-title">
                            <h4><?php echo "Expense : " ?></h4>
                            <p class="text-right">
                                <a  class="btn btnclr" href="#" onclick="printDiv('purchase_div')"><?php echo display('print') ?></a>
                            </p>
                        </div>
          
                    </div>
                    <div class="panel-body">


                        <div id="purchase_div">
                                      <table class="print-table" width="100%">
                                                
                                                <tr>
                                                    <td align="left" class="print-table-tr">
                                                        <img src="<?php echo base_url().$software_info[0]['invoice_logo'];?>" alt="logo" width="100px" height="80px">
                                               
                                                    </td>
                                                    <td align="center" class="print-cominfo">
                                                        <span class="company-txt">
                                                            <?php echo $company[0]['company_name'];?>
                                                           
                                                        </span><br>
                                                        <?php echo $company[0]['address'];?>
                                                        <br>
                                                        <?php echo $company[0]['email'];?>
                                                        <br>
                                                         <?php echo $company[0]['mobile'];?>
                                                        
                                                    </td>
                                                   
                                                     <td align="right" class="print-table-tr">
                                                        <date>
                                                        <?php echo display('date')?>: <?php
                                                        echo date('d-M-Y');
                                                        ?> 
                                                    </date>
                                                    </td>
                                                </tr>            
                                   
                                </table>
                            <div class="table-responsive">
       
                                <table class="table table-striped " id="ProfarmaInvList">
                                    <thead >
                                        <tr style="background-color: #337ab7;border-color: #2e6da4;" >
                                            <th data-col="5" data-control-column="5" class="5 value" style="height: 35.0114px;">Purchase Date</th>
                                            <th data-col="6" data-control-column="6" class="6 value" style="height: 35.0114px;">Invoice No</th>
                                            <th data-col="7" data-control-column="7" class="7 value" style="height: 35.0114px;">Supplier Name</th>
                                            <th data-col="8" data-control-column="8" class="8 value" style="height: 35.0114px;">Total Amount</th>
                                        </tr>
                                    </thead>
                                    <tbody >
                                        <?php
                                        if ($purchase_report) {
                                            ?>
                                            {purchase_report}
                                            <tr>
                                                <td data-col="5" class="5">{prchse_date}</td>
                                                <td data-col="6" class="6">
                                                    <?php 'Cpurchase/purchase_details_data/{purchase_id}'; ?>
                                                        {chalan_no}
                                                   
                                                </td>
                                                <td data-col="7" class="7">{supplier_name}</td>
                                                <td data-col="8" class="8"><?php echo (($position == 0) ? "$currency {grand_total_amount}" : "{grand_total_amount} $currency") ?></td>
                                            </tr>
                                            {/purchase_report}
                                             <tr>
                                             <td data-col="5" class="5">&nbsp;</td>
                                                <td data-col="6" class="6">&nbsp;</td>
                                                  <td data-col="7" class="7" style="text-align:right;"><b><?php echo "Total Expense" ?>:</b></td>
                                           
                                       
                                            <td data-col="8" class="8"  class="text-left"><b><?php echo (($position == 0) ? "$currency {purchase_amount}" : "{purchase_amount} $currency") ?></b></td>
                                        </tr>
                                            <?php } else {
                                            ?>
                                            <tr>
                                                <td class="text-center" colspan="4"><?php echo display('not_found'); ?></td>
                                            </tr>
                                        <?php }
                                        ?>
                                    </tbody>
                                   
                                </table>
                               
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<!-- All Report End -->


<script>
 $(document).on('keyup', '#filterinput', function(){
  debugger;
    var value = $(this).val().toLowerCase();
    var filter=$("#filterby").val();
    $("#printableArea tr:not(:eq(0))").filter(function() {
        $(this).toggle($(this).find("td."+filter).text().toLowerCase().indexOf(value) > -1)
    });
});
$(document).on('keyup', '#filterinput', function(){
  debugger;
    var value = $(this).val().toLowerCase();
    var filter=$("#filter").val();
    $("#purchase_div tr:not(:eq(0))").filter(function() {
        $(this).toggle($(this).find("td."+filter).text().toLowerCase().indexOf(value) > -1)
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
    </script>