

<div class="content-wrapper">
    <section class="content-header" >
        <div class="header-icon">
            <i class="pe-7s-note2"></i>
        </div>
        <div class="header-title" >
            <h1><?php echo display('purchase_ledger') ?></h1>
            <small><?php echo display('purchase_ledger') ?></small>
            <ol class="breadcrumb">
                <li><a href="#"><i class="pe-7s-home"></i> <?php echo display('home') ?></a></li>
                <li><a href="#"><?php echo display('purchase') ?></a></li>
                <li class="active"><?php echo display('purchase_ledger') ?></li>
            </ol>
        </div>
    </section>
  <!-- Invoice information -->
  <?php
        $myArray = explode('(',$total_tax); 
       $tax_amt=$myArray[0];
       $tax_des=$myArray[1];
      
      
      ?>
     <div class="container" id="content">
        <?php
    
     if($template==2)
            {
            ?>
        <div class="brand-section" style="background-color:<?php echo $color; ?>">
        <div class="row" >
     
     <div class="col-sm-2"><img src="<?php echo  base_url().$logo; ?>" style='width: 100%;'>
        
       </div>
     <div class="col-sm-5 text-center" style="color:white;"><h3><?php echo $header; ?></h3></div>
    <div class="col-sm-5" style="color:white;font-weight:bold;" id='company_info'>
           
          <b> Company name : </b><?php echo $company_info[0]['business_name']; ?><br>
          <b>   Address : </b><?php echo $company_info[0]['address']; ?><br>
          <b>   Email : </b><?php echo $company_info[0]['email']; ?><br>
          <b>   Contact : </b><?php echo $company_info[0]['phone']; ?><br>
       </div>
 </div>
        </div>
       
        <div class="body-section">
            <div class="row">
                <div class="col-6">
                <table id="one" style="border:none;">
    <tr><td  class="key"><?php echo display('Vendor');?></td><td >:</td><td calss="value"><?php echo $supplier_nam;  ?></td></tr>
<tr><td  class="key"><?php echo display('Vendor Type');?></td><td >:</td><td calss="value"><?php echo $vendor_type;  ?></td></tr>
<tr><td  class="key"><?php echo display('invoice_no');  ?></td><td >:</td><td calss="value"><?php echo $chalan_no;  ?></td></tr>
<tr><td  class="key"><?php echo display('Payment Due Date');?></td><td >:</td><td calss="value"><?php echo $payment_due_date;  ?></td></tr>
<tr><td  class="key"><?php echo display('Payment Terms');?></td><td >:</td><td calss="value"><?php echo $payment_terms;  ?></td></tr>
<tr><td  class="key"><?php
        echo display('payment_type');
        ?></td><td >:</td><td calss="value"><?php echo $payment_type;  ?></td></tr>
<tr><td  class="key"><?php echo display('Estimated Time Of Depature');?></td><td >:</td><td calss="value"><?php echo $etd;  ?></td></tr>
<tr><td  class="key"><?php echo display('Estimated Time Of Arrival');?></td><td >:</td><td calss="value"><?php echo $eta;  ?></td></tr>
<?php  if(!empty($isf_filling)) { ?>
<tr><td  class="key"><?php echo display('ISF NO');?></td><td >:</td><td calss="value"><?php echo $isf_filling;  ?></td></tr>
<?php   }  ?>

</table>

        </div>
        <div class="col-6">
        <table id="two">
        <tr><td  class="key"><?php echo display('Vendor Address');?></td><td >:</td><td calss="value"><?php echo $address."-".$city ."<br/>".$state."-".$zip."-".$country ."<br/>".$primaryemail."-".$mobile ; ?></td></tr>
<tr><td  class="key"><?php echo display('Expenses / Bill date');?></td><td >:</td><td calss="value"><?php echo $final_date;  ?></td></tr>
<tr><td  class="key"><?php echo display('Container Number');?></td><td>:</td><td calss="value"><?php echo $container_no;  ?></td></tr>
<tr><td  class="key"><?php echo display('B/L No');?></td><td >:</td><td calss="value"><?php echo $bl_number;  ?></td></tr>

<tr><td  class="key"><?php echo display('Port Of Discharge');?></td><td>:</td><td calss="value"><?php echo $Port_of_discharge;  ?></td></tr>
<!-- <tr><td  class="key">Attachments</td><td style="width:10px;">:</td><td calss="value"><?php  ?></td></tr> -->

    
</table> </div> 
            </div>
        </div>
        <div class="body-section" >
          <div class="table-responsive">
     
  

<?php 


for($m=1;$m<count($purchase_all_data);$m++){ 
    ?>
    <table class="table table-bordered normalinvoice table-hover" style="border:none;" id="normalinvoice_<?php  echo $m; ?>" >
            <thead style="background-color:<?php echo $color; ?>">
                    <tr>
                    <!-- <th rowspan="1" style="border-style : hidden!important; class="text-center text-white">S.No</th> -->
                        <th rowspan="1" class="absorbing-column text-center text-white" style="width:6px;">Product<br/> Name</th>
                        <th rowspan="1" class="text-center text-white"style="width:4px;">Des<br/>crip<br/>tion</th>
                        <th rowspan="1" class="text-center text-white"style="width:4px;">Thick<br/>ness</th>
                        <th rowspan="1" class="text-center text-white"style="width:4px;">Supp<br/>lier<br/> Block<br/> No</th>
                        <th rowspan="1" class="text-center text-white"style="width:4px;">Supp<br/>lier<br/>Slab<br/> No</th> 
                       <th colspan="2"  class="text-center text-white"style="width:6px;">Gross<br/> Mea<br/>sure<br/>ment<br/>Wth&#9474;Hght</th>
                        <th rowspan="1" class="text-center text-white"style="width:5px;">Gross<br/>Sq.<br/>ft</th>
                        <th rowspan="1" class="text-center text-white"style="width:5px;">Bun<br/>dle <br/>No</th>
                         <th rowspan="1" class="text-center text-white"style="width:3px;">Slab No</th>
                         <th colspan="2" class="text-center text-white"style="width:4px;">Net<br/> Mea<br/>sure<br/>Wth&#9474;Hght</th>
                           <th rowspan="1" class="text-center text-white"style="width:4px;">Net <br/>Sq.<br/> Ft</th>
                            <th rowspan="1"  class="text-center text-white"style="width:4px;">Cost<br/>per Sq. Ft</th>
                            <th rowspan="1" class="text-center"style="width:5px;">Cost <br/>per <br/>Slab</th>
                        <th rowspan="1"  class="text-center text-white"style="width:2px;">Ori<br/>gin </th>
                          <th rowspan="1" style="width:100px;"  class="text-center text-white">Total</th>
                    </tr> 
<tr>

   </tr>
                </thead>
               <tbody id="addPurchaseItem_<?php echo $m;  ?>">
                                    <?php  $n=0; ?>
                                    <?php foreach($purchase_all_data as $inv){
                                        
                                      

$a = substr($inv['tableid'], 0, 1);
if($a==$m){
                                    
                                        ?>

                    <tr>
                    <!-- <td style="font-size: 10px;"><?php //echo $count; ?></td> -->
                         <td style="font-size: 9px;"><?php echo $inv['product_name']; ?></td>
                       <td style="font-size: 9px;"><?php echo $inv['description']; ?></td>
                       <td style="font-size: 9px;"><?php echo $inv['thickness']; ?></td>
                       <td style="font-size: 9px;"><?php echo $inv['supplier_block_no']; ?></td>
                       <td style="font-size: 9px;"><?php echo $inv['supplier_slab_no']; ?></td>
                     
               
                       <td style="font-size: 9px;"><?php echo $inv['gross_width']; ?></td> 
                     <td style="font-size: 9px;"><?php echo $inv['gross_height']; ?></td> 
                          <td style="font-size: 9px;" class="gross_sq_ft"><?php  echo $inv['gross_sq_ft_1'];  ?></td> 
                  
                         <td style="font-size: 9px;"><?php echo $inv['bundle_no']; ?></td>
                  
                         <td style="font-size: 9px;"><?php echo $n+1;?></td>
                       <td style="font-size: 9px;"><?php echo $inv['net_width']?></td>
                           <td style="font-size: 9px;"><?php echo  $inv['net_height']; ?></td>
                            <td style="font-size: 9px;" class="net_sq_ft"><?php  echo $inv['net_sq_ft'];  ?></td>
                       <td style="font-size: 9px;"><?php  echo $currency ?><?php echo $inv['cost_sq_ft']; ?></td>
                       <td style="font-size: 9px;"><?php  echo $currency ; ?><?php echo  $inv['cost_sq_slab']; ?></td>
                       <td style="font-size: 9px;"><?php echo $inv['origin']; ?></td>
                       <td style="font-size: 9px;" >            <table><tr><td style=" border: none !important;font-size: 9px;">
                       <?php  echo $currency ; ?> </td><td style=" text-align: left;border: none !important;"><input  type="text" class="total_price" style="border:none;width:80px;font-size: 9px;text-align: left;"   value="<?php  echo $inv['total'];  ?>"  id="total_<?php  echo $m.$n; ?>"     name="total_amt[]"/></td>
</tr></table></td> 
                    </tr>
                    <?php $n++;}}  ?><br>
                          <tfoot style="border:none;">
                                    <tr>
                             <td style="text-align:right;font-size: 9px;" colspan="7"><b><?php  echo display('Gross Sq.Ft');?> :</b></td>
                                        <td >
             <input type="text" id="overall_gross_<?php echo $m; ?>" name="overall_gross[]"  class="overall_gross"  style="border:none;width: 40px;font-size: 9px;"   readonly="readonly"  /> 
            </td>     
             <td style="text-align:right;font-size: 9px;" colspan="4"><b><?php  echo display('Net Sq.Ft');?> :</b></td>
                                        <td >
             <input type="text" id="overall_net_<?php echo $m; ?>" name="overall_net[]"  class="overall_net"  style="border:none;width: 20px;font-size: 9px;"   readonly="readonly"  /> 
             <!-- <input type="text"   style="width:60px;" readonly id="net_sq_ft_<?php  echo $m.$n; ?>" name="overall_net[]" value="<?php  echo $inv['net_sqft'];  ?>" class="overall_net"/></td> -->
            </td>

                                        <td style="text-align:right;font-size: 9px;" colspan="3"><b><?php  echo display('total'); ?> :</b></td>
                                        <td style="text-align: left;">
               <span class="input-symbol-euro">     <input type="text" id="Total_<?php echo $m; ?>" name="total[]"   class="b_total"   style="border:none;padding-top: 6px;width: 60px;font-size: 9px;text-align: left;"    readonly="readonly"  />
            </td>                   
                                    </tr>

                                            </tfoot>
                            
                            <?php   } ?>
        
                            <table border="0" class="overall table table-hover" style="border:none;">
<tr style="border:none;">

 <td colspan="2" style="text-align:left;border:none;"><b><?php  echo display('Overall TOTAL');?> :</b></td><td style="border:none;"> <?php  echo $currency; ?><?php echo $overall_total; ?> </td>
 <td style="text-align:right;border:none;" colspan="12"><b><?php echo  "Tax( ".$tax_des;  ?></b></td>
                         
                   <td  style="border:none;"><?php  echo $currency; ?><?php echo $tax_amt;  ?></td>
</tr>
<tr style="border:none;">
<td colspan="2"  style="vertical-align:top;text-align:left;border:none;"><b><?php  echo display('Overall Gross Sq.Ft');?> :</b></td><td style="border:none;" colspan="3"><?php echo  $purchase_all_data[0]['total_gross'];  ?></td>
<td style="text-align:right;border:none;" colspan="10"><b><?php  echo display('GRAND TOTAL');?> :</b></td>
                            <td style="border:none;">
     <?php  echo $currency; ?><?php echo $purchase_all_data[0]['grand_total_amount']; ?></span>
</td>
</tr>
                          
                            <tr style="border:none;">
                                
                            <td colspan="2"  style="vertical-align:top;text-align:left;border:none;"><b><?php  echo display('Overall Net Sq.Ft');?> :</b></td><td style="border:none;" colspan="3"><?php echo  $purchase_all_data[0]['total_net'];  ?></td>
                            
                            <td style="text-align:right;border:none;"  colspan="10"><b><?php  echo display('GRAND TOTAL');?> :</br><b>(<?php  echo display('Preferred Currency');?>)</b></td>
                            <td style="border:none;">
  <table border="0">
<tr>

<td style=style="border:none;">    <?php echo $currency_type." ".$purchase_all_data[0]['gtotal_preferred_currency'] ;?></td>
  </tr>
  
</table>                               

                                    <input type="hidden" id="final_gtotal"  name="final_gtotal" />

                                    <input type="hidden" name="baseUrl" class="baseUrl" value="<?php echo base_url();?>"/></td>
                            </tr> 
<?php  //  if($all_invoice[0]['amt_paid'] !==''){   ?>
                                <tr id="amt">
                               
                                        <td style="border:none;text-align:right;"  colspan="15"><b><?php  echo display('Amount Paid');?>:</b></td>
                                      
                                        <td style="border:none;">
                                   <?php echo $currency_type." ".$purchase_all_data[0]['paid_amount'] ;?>
                                   </td>

                                        
                                      
                                        </tr> 
                                        <tr id="bal">
                                        <td style="border:none;text-align:right;"  colspan="15"><b><?php echo display('balance_ammount');  ?>:</b></td>
                                        <td style="border:none;">
                                       
                                      <?php echo $currency_type." ".$purchase_all_data[0]['balance'];?>
                                     
                                        </td>
                                        </tr> 
</table></table>
                           

                  
            <br>
<h4><?php echo  display('Remarks / Details');?> :</h4><?php echo $purchase_all_data[0]['remarks']; ?><br>
<h4><?php echo  display('Message on Invoice');?> :</h4><?php echo $purchase_all_data[0]['message_invoice']; ?>
<br><br>
        </div> </div>


        <?php 

}
elseif($template==1)
{
?>     
   <div class="brand-section" style="background-color:<?php echo $color; ?>">
   <div class="row">
      

   

          <div class="col-sm-4" style="color:white;font-weight:bold;" id='company_info'>
          <b> Company name : </b><?php echo $company_info[0]['business_name']; ?><br>
          <b>   Address : </b><?php echo $company_info[0]['address']; ?><br>
          <b>   Email : </b><?php echo $company_info[0]['email']; ?><br>
          <b>   Contact : </b><?php echo $company_info[0]['phone']; ?><br>
          </div>
 
 
 
 
            <div class="col-sm-5 text-center" style="color:white;"><h3><?php echo $header; ?></h3></div>
 
            <div class="col-sm-3"><img src="<?php echo  base_url().$logo; ?>" style='width: 70%;'></div>







      
  </div>
        </div>
        <div class="body-section">
            <div class="row">
                <div class="col-6">
                <table id="one" style="border:none;">
    <tr><td  class="key"><?php echo display('Vendor');?></td><td >:</td><td calss="value"><?php echo $supplier_nam;  ?></td></tr>
<tr><td  class="key"><?php echo display('Vendor Type');?></td><td >:</td><td calss="value"><?php echo $vendor_type;  ?></td></tr>
<tr><td  class="key"><?php echo display('invoice_no');  ?></td><td >:</td><td calss="value"><?php echo $chalan_no;  ?></td></tr>
<tr><td  class="key"><?php echo display('Payment Due Date');?></td><td >:</td><td calss="value"><?php echo $payment_due_date;  ?></td></tr>
<tr><td  class="key"><?php echo display('Payment Terms');?></td><td >:</td><td calss="value"><?php echo $payment_terms;  ?></td></tr>
<tr><td  class="key"><?php
        echo display('payment_type');
        ?></td><td >:</td><td calss="value"><?php echo $payment_type;  ?></td></tr>
<tr><td  class="key"><?php echo display('Estimated Time Of Depature');?></td><td >:</td><td calss="value"><?php echo $etd;  ?></td></tr>
<tr><td  class="key"><?php echo display('Estimated Time Of Arrival');?></td><td >:</td><td calss="value"><?php echo $eta;  ?></td></tr>
<?php  if(!empty($isf_filling)) { ?>
<tr><td  class="key"><?php echo display('ISF NO');?></td><td >:</td><td calss="value"><?php echo $isf_filling;  ?></td></tr>
<?php   }  ?>

</table>

        </div>
        <div class="col-6">
        <table id="two">
        <tr><td  class="key"><?php echo display('Vendor Address');?></td><td >:</td><td calss="value"><?php echo $address."-".$city ."<br/>".$state."-".$zip."-".$country ."<br/>".$primaryemail."-".$mobile ; ?></td></tr>
<tr><td  class="key"><?php echo display('Expenses / Bill date');?></td><td >:</td><td calss="value"><?php echo $final_date;  ?></td></tr>
<tr><td  class="key"><?php echo display('Container Number');?></td><td>:</td><td calss="value"><?php echo $container_no;  ?></td></tr>
<tr><td  class="key"><?php echo display('B/L No');?></td><td >:</td><td calss="value"><?php echo $bl_number;  ?></td></tr>

<tr><td  class="key"><?php echo display('Port Of Discharge');?></td><td>:</td><td calss="value"><?php echo $Port_of_discharge;  ?></td></tr>
<!-- <tr><td  class="key">Attachments</td><td style="width:10px;">:</td><td calss="value"><?php  ?></td></tr> -->

    
</table> </div> 
            </div>
        </div>
        <div class="body-section" >
          <div class="table-responsive">
     
  

<?php 


for($m=1;$m<count($purchase_all_data);$m++){ 
    ?>
    <table class="table table-bordered normalinvoice table-hover" style="border:none;" id="normalinvoice_<?php  echo $m; ?>" >
            <thead style="background-color:<?php echo $color; ?>">
                    <tr>
                    <!-- <th rowspan="1" style="border-style : hidden!important; class="text-center text-white">S.No</th> -->
                        <th rowspan="1" class="absorbing-column text-center text-white" style="width:6px;">Product<br/> Name</th>
                        <th rowspan="1" class="text-center text-white"style="width:4px;">Des<br/>crip<br/>tion</th>
                        <th rowspan="1" class="text-center text-white"style="width:4px;">Thick<br/>ness</th>
                        <th rowspan="1" class="text-center text-white"style="width:4px;">Supp<br/>lier<br/> Block<br/> No</th>
                        <th rowspan="1" class="text-center text-white"style="width:4px;">Supp<br/>lier<br/>Slab<br/> No</th> 
                       <th colspan="2"  class="text-center text-white"style="width:6px;">Gross<br/> Mea<br/>sure<br/>ment<br/>Wth&#9474;Hght</th>
                        <th rowspan="1" class="text-center text-white"style="width:5px;">Gross<br/>Sq.<br/>ft</th>
                        <th rowspan="1" class="text-center text-white"style="width:5px;">Bun<br/>dle <br/>No</th>
                         <th rowspan="1" class="text-center text-white"style="width:3px;">Slab No</th>
                         <th colspan="2" class="text-center text-white"style="width:4px;">Net<br/> Mea<br/>sure<br/>Wth&#9474;Hght</th>
                           <th rowspan="1" class="text-center text-white"style="width:4px;">Net <br/>Sq.<br/> Ft</th>
                            <th rowspan="1"  class="text-center text-white"style="width:4px;">Cost<br/>per Sq. Ft</th>
                            <th rowspan="1" class="text-center"style="width:5px;">Cost <br/>per <br/>Slab</th>
                        <th rowspan="1"  class="text-center text-white"style="width:2px;">Ori<br/>gin </th>
                          <th rowspan="1" style="width:100px;"  class="text-center text-white">Total</th>
                    </tr> 
<tr>

   </tr>
                </thead>
               <tbody id="addPurchaseItem_<?php echo $m;  ?>">
                                    <?php  $n=0; ?>
                                    <?php foreach($purchase_all_data as $inv){
                                        
                                      

$a = substr($inv['tableid'], 0, 1);
if($a==$m){
                                    
                                        ?>

                    <tr>
                    <!-- <td style="font-size: 10px;"><?php //echo $count; ?></td> -->
                         <td style="font-size: 9px;"><?php echo $inv['product_name']; ?></td>
                       <td style="font-size: 9px;"><?php echo $inv['description']; ?></td>
                       <td style="font-size: 9px;"><?php echo $inv['thickness']; ?></td>
                       <td style="font-size: 9px;"><?php echo $inv['supplier_block_no']; ?></td>
                       <td style="font-size: 9px;"><?php echo $inv['supplier_slab_no']; ?></td>
                     
               
                       <td style="font-size: 9px;"><?php echo $inv['gross_width']; ?></td> 
                     <td style="font-size: 9px;"><?php echo $inv['gross_height']; ?></td> 
                          <td style="font-size: 9px;" class="gross_sq_ft"><?php  echo $inv['gross_sq_ft_1'];  ?></td> 
                  
                         <td style="font-size: 9px;"><?php echo $inv['bundle_no']; ?></td>
                  
                         <td style="font-size: 9px;"><?php echo $n+1;?></td>
                       <td style="font-size: 9px;"><?php echo $inv['net_width']?></td>
                           <td style="font-size: 9px;"><?php echo  $inv['net_height']; ?></td>
                            <td style="font-size: 9px;" class="net_sq_ft"><?php  echo $inv['net_sq_ft'];  ?></td>
                       <td style="font-size: 9px;"><?php  echo $currency ?><?php echo $inv['cost_sq_ft']; ?></td>
                       <td style="font-size: 9px;"><?php  echo $currency ; ?><?php echo  $inv['cost_sq_slab']; ?></td>
                       <td style="font-size: 9px;"><?php echo $inv['origin']; ?></td>
                       <td style="font-size: 9px;" >            <table><tr><td style=" border: none !important;font-size: 9px;">
                       <?php  echo $currency ; ?> </td><td style=" text-align: left;border: none !important;"><input  type="text" class="total_price" style="border:none;width:80px;font-size: 9px;text-align: left;"   value="<?php  echo $inv['total'];  ?>"  id="total_<?php  echo $m.$n; ?>"     name="total_amt[]"/></td>
</tr></table></td> 
                    </tr>
                    <?php $n++;}}  ?><br>
                           <tfoot style="border:none;">
                                    <tr>
                             <td style="text-align:right;font-size: 9px;" colspan="7"><b><?php  echo display('Gross Sq.Ft');?> :</b></td>
                                        <td >
             <input type="text" id="overall_gross_<?php echo $m; ?>" name="overall_gross[]"  class="overall_gross"  style="border:none;width: 40px;font-size: 9px;"   readonly="readonly"  /> 
            </td>     
             <td style="text-align:right;font-size: 9px;" colspan="4"><b><?php  echo display('Net Sq.Ft');?> :</b></td>
                                        <td >
             <input type="text" id="overall_net_<?php echo $m; ?>" name="overall_net[]"  class="overall_net"  style="border:none;width: 20px;font-size: 9px;"   readonly="readonly"  /> 
             <!-- <input type="text"   style="width:60px;" readonly id="net_sq_ft_<?php  echo $m.$n; ?>" name="overall_net[]" value="<?php  echo $inv['net_sqft'];  ?>" class="overall_net"/></td> -->
            </td>

                                        <td style="text-align:right;font-size: 9px;" colspan="3"><b><?php  echo display('total'); ?> :</b></td>
                                        <td style="text-align: left;">
               <span class="input-symbol-euro">     <input type="text" id="Total_<?php echo $m; ?>" name="total[]"   class="b_total"   style="border:none;padding-top: 6px;width: 60px;font-size: 9px;text-align: left;"    readonly="readonly"  />
            </td>                   
                                    </tr>

                                            </tfoot>
                            
                            <?php   } ?>
        
                            <table border="0" class="overall table table-hover" style="border:none;">
<tr style="border:none;">

 <td colspan="2" style="text-align:left;border:none;"><b><?php  echo display('Overall TOTAL');?> :</b></td><td style="border:none;"> <?php  echo $currency; ?><?php echo $overall_total; ?> </td>
 <td style="text-align:right;border:none;" colspan="12"><b><?php echo  "Tax( ".$tax_des;  ?></b></td>
                         
                   <td  style="border:none;"><?php  echo $currency; ?><?php echo $tax_amt;  ?></td>
</tr>
<tr style="border:none;">
<td colspan="2"  style="vertical-align:top;text-align:left;border:none;"><b><?php  echo display('Overall Gross Sq.Ft');?> :</b></td><td style="border:none;" colspan="3"><?php echo  $purchase_all_data[0]['total_gross'];  ?></td>
<td style="text-align:right;border:none;" colspan="10"><b><?php  echo display('GRAND TOTAL');?> :</b></td>
                            <td style="border:none;">
     <?php  echo $currency; ?><?php echo $purchase_all_data[0]['grand_total_amount']; ?></span>
</td>
</tr>
                          
                            <tr style="border:none;">
                                
                            <td colspan="2"  style="vertical-align:top;text-align:left;border:none;"><b><?php  echo display('Overall Net Sq.Ft');?> :</b></td><td style="border:none;" colspan="3"><?php echo  $purchase_all_data[0]['total_net'];  ?></td>
                            
                            <td style="text-align:right;border:none;"  colspan="10"><b><?php  echo display('GRAND TOTAL');?> :</br><b>(<?php  echo display('Preferred Currency');?>)</b></td>
                            <td style="border:none;">
  <table border="0">
<tr>

<td style=style="border:none;">    <?php echo $currency_type." ".$purchase_all_data[0]['gtotal_preferred_currency'] ;?></td>
  </tr>
  
</table>                               

                                    <input type="hidden" id="final_gtotal"  name="final_gtotal" />

                                    <input type="hidden" name="baseUrl" class="baseUrl" value="<?php echo base_url();?>"/></td>
                            </tr> 
<?php  //  if($all_invoice[0]['amt_paid'] !==''){   ?>
                                <tr id="amt">
                               
                                        <td style="border:none;text-align:right;"  colspan="15"><b><?php  echo display('Amount Paid');?>:</b></td>
                                      
                                        <td style="border:none;">
                                   <?php echo $currency_type." ".$purchase_all_data[0]['paid_amount'] ;?>
                                   </td>

                                        
                                      
                                        </tr> 
                                        <tr id="bal">
                                        <td style="border:none;text-align:right;"  colspan="15"><b><?php echo display('balance_ammount');  ?>:</b></td>
                                        <td style="border:none;">
                                       
                                      <?php echo $currency_type." ".$purchase_all_data[0]['balance'];?>
                                     
                                        </td>
                                        </tr> 
</table></table>
                           

                  
            <br>
<h4><?php echo  display('Remarks / Details');?> :</h4><?php echo $purchase_all_data[0]['remarks']; ?><br>
<h4><?php echo  display('Message on Invoice');?> :</h4><?php echo $purchase_all_data[0]['message_invoice']; ?>
<br><br>
        </div> </div>

        <?php 

}
elseif($template==3)
{
?>
<div class="brand-section" style="background-color:<?php echo $color; ?>">
<div class="row">

       
      

       <div class="col-sm-2 text-center" style="color:white;"><h3><?php echo $header; ?></h3></div>
        <div class="col-sm-4"><img src="<?php echo  base_url().$logo; ?>" style='width: 30%;float:right;'> </div>

        
    
     <div class="col-sm-6" style="color:white;font-weight:bold ;text-align: end;" id='company_info'>
           
     <b> Company name : </b><?php echo $company_info[0]['business_name']; ?><br>
          <b>   Address : </b><?php echo $company_info[0]['address']; ?><br>
          <b>   Email : </b><?php echo $company_info[0]['email']; ?><br>
          <b>   Contact : </b><?php echo $company_info[0]['phone']; ?><br>


       </div>



   </div>

        </div>




        <div class="body-section">
            <div class="row">
                <div class="col-6">
                <table id="one" style="border:none;">
   <tr><td  class="key"><?php echo display('Vendor');?></td><td >:</td><td calss="value"><?php echo $supplier_nam;  ?></td></tr>
<tr><td  class="key"><?php echo display('Vendor Type');?></td><td >:</td><td calss="value"><?php echo $vendor_type;  ?></td></tr>
<tr><td  class="key"><?php echo display('invoice_no');  ?></td><td >:</td><td calss="value"><?php echo $chalan_no;  ?></td></tr>
<tr><td  class="key"><?php echo display('Payment Due Date');?></td><td >:</td><td calss="value"><?php echo $payment_due_date;  ?></td></tr>
<tr><td  class="key"><?php echo display('Payment Terms');?></td><td >:</td><td calss="value"><?php echo $payment_terms;  ?></td></tr>
<tr><td  class="key"><?php
        echo display('payment_type');
        ?></td><td >:</td><td calss="value"><?php echo $payment_type;  ?></td></tr>
<tr><td  class="key"><?php echo display('Estimated Time Of Depature');?></td><td >:</td><td calss="value"><?php echo $etd;  ?></td></tr>
<tr><td  class="key"><?php echo display('Estimated Time Of Arrival');?></td><td >:</td><td calss="value"><?php echo $eta;  ?></td></tr>
<?php  if(!empty($isf_filling)) { ?>
<tr><td  class="key"><?php echo display('ISF NO');?></td><td >:</td><td calss="value"><?php echo $isf_filling;  ?></td></tr>
<?php   }  ?>

</table>

        </div>
        <div class="col-6">
        <table id="two">
        <tr><td  class="key"><?php echo display('Vendor Address');?></td><td >:</td><td calss="value"><?php echo $address."-".$city ."<br/>".$state."-".$zip."-".$country ."<br/>".$primaryemail."-".$mobile ; ?></td></tr>
<tr><td  class="key"><?php echo display('Expenses / Bill date');?></td><td >:</td><td calss="value"><?php echo $final_date;  ?></td></tr>
<tr><td  class="key"><?php echo display('Container Number');?></td><td>:</td><td calss="value"><?php echo $container_no;  ?></td></tr>
<tr><td  class="key"><?php echo display('B/L No');?></td><td >:</td><td calss="value"><?php echo $bl_number;  ?></td></tr>

<tr><td  class="key"><?php echo display('Port Of Discharge');?></td><td>:</td><td calss="value"><?php echo $Port_of_discharge;  ?></td></tr>
<!-- <tr><td  class="key">Attachments</td><td style="width:10px;">:</td><td calss="value"><?php  ?></td></tr> -->

    
</table> </div> 
            </div>
        </div>
        <div class="body-section" >
          <div class="table-responsive">
     
  

<?php 


for($m=1;$m<count($purchase_all_data);$m++){ 
    ?>
    <table class="table table-bordered normalinvoice table-hover" style="border:none;" id="normalinvoice_<?php  echo $m; ?>" >
            <thead style="background-color:<?php echo $color; ?>">
                    <tr>
                    <!-- <th rowspan="1" style="border-style : hidden!important; class="text-center text-white">S.No</th> -->
                        <th rowspan="1" class="absorbing-column text-center text-white" style="width:6px;">Product<br/> Name</th>
                        <th rowspan="1" class="text-center text-white"style="width:4px;">Des<br/>crip<br/>tion</th>
                        <th rowspan="1" class="text-center text-white"style="width:4px;">Thick<br/>ness</th>
                        <th rowspan="1" class="text-center text-white"style="width:4px;">Supp<br/>lier<br/> Block<br/> No</th>
                        <th rowspan="1" class="text-center text-white"style="width:4px;">Supp<br/>lier<br/>Slab<br/> No</th> 
                       <th colspan="2"  class="text-center text-white"style="width:6px;">Gross<br/> Mea<br/>sure<br/>ment<br/>Wth&#9474;Hght</th>
                        <th rowspan="1" class="text-center text-white"style="width:5px;">Gross<br/>Sq.<br/>ft</th>
                        <th rowspan="1" class="text-center text-white"style="width:5px;">Bun<br/>dle <br/>No</th>
                         <th rowspan="1" class="text-center text-white"style="width:3px;">Slab No</th>
                         <th colspan="2" class="text-center text-white"style="width:4px;">Net<br/> Mea<br/>sure<br/>Wth&#9474;Hght</th>
                           <th rowspan="1" class="text-center text-white"style="width:4px;">Net <br/>Sq.<br/> Ft</th>
                            <th rowspan="1"  class="text-center text-white"style="width:4px;">Cost<br/>per Sq. Ft</th>
                            <th rowspan="1" class="text-center"style="width:5px;">Cost <br/>per <br/>Slab</th>
                        <th rowspan="1"  class="text-center text-white"style="width:2px;">Ori<br/>gin </th>
                          <th rowspan="1" style="width:100px;"  class="text-center text-white">Total</th>
                    </tr> 
<tr>

   </tr>
                </thead>
               <tbody id="addPurchaseItem_<?php echo $m;  ?>">
                                    <?php  $n=0; ?>
                                    <?php foreach($purchase_all_data as $inv){
                                        
                                      

$a = substr($inv['tableid'], 0, 1);
if($a==$m){
                                    
                                        ?>

                    <tr>
                    <!-- <td style="font-size: 10px;"><?php //echo $count; ?></td> -->
                         <td style="font-size: 9px;"><?php echo $inv['product_name']; ?></td>
                       <td style="font-size: 9px;"><?php echo $inv['description']; ?></td>
                       <td style="font-size: 9px;"><?php echo $inv['thickness']; ?></td>
                       <td style="font-size: 9px;"><?php echo $inv['supplier_block_no']; ?></td>
                       <td style="font-size: 9px;"><?php echo $inv['supplier_slab_no']; ?></td>
                     
               
                       <td style="font-size: 9px;"><?php echo $inv['gross_width']; ?></td> 
                     <td style="font-size: 9px;"><?php echo $inv['gross_height']; ?></td> 
                          <td style="font-size: 9px;" class="gross_sq_ft"><?php  echo $inv['gross_sq_ft_1'];  ?></td> 
                  
                         <td style="font-size: 9px;"><?php echo $inv['bundle_no']; ?></td>
                  
                         <td style="font-size: 9px;"><?php echo $n+1;?></td>
                       <td style="font-size: 9px;"><?php echo $inv['net_width']?></td>
                           <td style="font-size: 9px;"><?php echo  $inv['net_height']; ?></td>
                            <td style="font-size: 9px;" class="net_sq_ft"><?php  echo $inv['net_sq_ft'];  ?></td>
                       <td style="font-size: 9px;"><?php  echo $currency ?><?php echo $inv['cost_sq_ft']; ?></td>
                       <td style="font-size: 9px;"><?php  echo $currency ; ?><?php echo  $inv['cost_sq_slab']; ?></td>
                       <td style="font-size: 9px;"><?php echo $inv['origin']; ?></td>
                       <td style="font-size: 9px;" >            <table><tr><td style=" border: none !important;font-size: 9px;">
                       <?php  echo $currency ; ?> </td><td style=" text-align: left;border: none !important;"><input  type="text" class="total_price" style="border:none;width:80px;font-size: 9px;text-align: left;"   value="<?php  echo $inv['total'];  ?>"  id="total_<?php  echo $m.$n; ?>"     name="total_amt[]"/></td>
</tr></table></td> 
                    </tr>
                    <?php $n++;}}  ?><br>
                            <tfoot style="border:none;">
                                    <tr>
                             <td style="text-align:right;font-size: 9px;" colspan="7"><b><?php  echo display('Gross Sq.Ft');?> :</b></td>
                                        <td >
             <input type="text" id="overall_gross_<?php echo $m; ?>" name="overall_gross[]"  class="overall_gross"  style="border:none;width: 40px;font-size: 9px;"   readonly="readonly"  /> 
            </td>     
             <td style="text-align:right;font-size: 9px;" colspan="4"><b><?php  echo display('Net Sq.Ft');?> :</b></td>
                                        <td >
             <input type="text" id="overall_net_<?php echo $m; ?>" name="overall_net[]"  class="overall_net"  style="border:none;width: 20px;font-size: 9px;"   readonly="readonly"  /> 
             <!-- <input type="text"   style="width:60px;" readonly id="net_sq_ft_<?php  echo $m.$n; ?>" name="overall_net[]" value="<?php  echo $inv['net_sqft'];  ?>" class="overall_net"/></td> -->
            </td>

                                        <td style="text-align:right;font-size: 9px;" colspan="3"><b><?php  echo display('total'); ?> :</b></td>
                                        <td style="text-align: left;">
               <span class="input-symbol-euro">     <input type="text" id="Total_<?php echo $m; ?>" name="total[]"   class="b_total"   style="border:none;padding-top: 6px;width: 60px;font-size: 9px;text-align: left;"    readonly="readonly"  />
            </td>                   
                                    </tr>

                                            </tfoot>
                            
                            <?php   } ?>
        
                            <table border="0" class="overall table table-hover" style="border:none;">
<tr style="border:none;">

 <td colspan="2" style="text-align:left;border:none;"><b><?php  echo display('Overall TOTAL');?> :</b></td><td style="border:none;"> <?php  echo $currency; ?><?php echo $overall_total; ?> </td>
 <td style="text-align:right;border:none;" colspan="12"><b><?php echo  "Tax( ".$tax_des;  ?></b></td>
                         
                   <td  style="border:none;"><?php  echo $currency; ?><?php echo $tax_amt;  ?></td>
</tr>
<tr style="border:none;">
<td colspan="2"  style="vertical-align:top;text-align:left;border:none;"><b><?php  echo display('Overall Gross Sq.Ft');?> :</b></td><td style="border:none;" colspan="3"><?php echo  $purchase_all_data[0]['total_gross'];  ?></td>
<td style="text-align:right;border:none;" colspan="10"><b><?php  echo display('GRAND TOTAL');?> :</b></td>
                            <td style="border:none;">
     <?php  echo $currency; ?><?php echo $purchase_all_data[0]['grand_total_amount']; ?></span>
</td>
</tr>
                          
                            <tr style="border:none;">
                                
                            <td colspan="2"  style="vertical-align:top;text-align:left;border:none;"><b><?php  echo display('Overall Net Sq.Ft');?> :</b></td><td style="border:none;" colspan="3"><?php echo  $purchase_all_data[0]['total_net'];  ?></td>
                            
                            <td style="text-align:right;border:none;"  colspan="10"><b><?php  echo display('GRAND TOTAL');?> :</br><b>(<?php  echo display('Preferred Currency');?>)</b></td>
                            <td style="border:none;">
  <table border="0">
<tr>

<td style=style="border:none;">    <?php echo $currency_type." ".$purchase_all_data[0]['gtotal_preferred_currency'] ;?></td>
  </tr>
  
</table>                               

                                    <input type="hidden" id="final_gtotal"  name="final_gtotal" />

                                    <input type="hidden" name="baseUrl" class="baseUrl" value="<?php echo base_url();?>"/></td>
                            </tr> 
<?php  //  if($all_invoice[0]['amt_paid'] !==''){   ?>
                                <tr id="amt">
                               
                                        <td style="border:none;text-align:right;"  colspan="15"><b><?php  echo display('Amount Paid');?>:</b></td>
                                      
                                        <td style="border:none;">
                                   <?php echo $currency_type." ".$purchase_all_data[0]['paid_amount'] ;?>
                                   </td>

                                        
                                      
                                        </tr> 
                                        <tr id="bal">
                                        <td style="border:none;text-align:right;"  colspan="15"><b><?php echo display('balance_ammount');  ?>:</b></td>
                                        <td style="border:none;">
                                       
                                      <?php echo $currency_type." ".$purchase_all_data[0]['balance'];?>
                                     
                                        </td>
                                        </tr> 
</table></table>
                           

                  
            <br>
<h4><?php echo  display('Remarks / Details');?> :</h4><?php echo $purchase_all_data[0]['remarks']; ?><br>
<h4><?php echo  display('Message on Invoice');?> :</h4><?php echo $purchase_all_data[0]['message_invoice']; ?>
<br><br>
        </div> </div>

        <?php   } ?>

    </div>

</div>

<div class="modal fade" id="myModal_ex" role="dialog" >
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content" style="width: 500px;height:100px;text-align:center;margin-bottom: 300px;">
        <div class="modal-header" style="color:white;background-color:#38469f;">
      
          <h4 class="modal-title">New Expenses</h4>
        </div>
        <div class="content">

        <div class="modal-body">
          
          <h4>New Expenses Downloaded Successfully</h4>
     
        </div>
        <div class="modal-footer">
        </div>
        </div>
      </div>
      
    </div>
  </div>

<style>
#content {
  padding:10px;
  padding-top:10px;
}
.key{
    border:none;
    text-align:left;
font-weight:bold;

}
.value{
    border:none;
    text-align:left;
}
#one,#two{
float:left;
width:100%;
}
body{
    background-color: #38469f; 
    margin: 0px;
    
}
h1,h2,h3,h4,h5,h6{
    margin: 0;
    padding: 0;
}
p{
    margin: 0;
    padding: 0;
}
.heading_name{
    font-weight: bold;
}
.container{
    width: 100%;
    margin-right: auto;
    margin-left: auto;
    margin-top: 50px;
}
.brand-section{
   /* background-color: #5961b3; */
   padding: 10px 40px;
}
.logo{
    width: 50%;
}
th{
    font-size:8px;
    width:10%;
}
.row{
    display: flex;
    flex-wrap: wrap;
    
}
.col-6{
    width: 50%;
    flex: 0 0 auto;
    padding-left: 10px;
   
}
.text-white{
    color: #fff;
}
.company-details{
    float: right;
    text-align: right;
}

.body-section{
    padding: 0px;
    
}
.heading{
    font-size: 20px;
    margin-bottom: 08px;
}
.sub-heading{
    color: #262626;
    margin-bottom: 05px;
}
table{
   
    background-color: #fff;
    width: 100%;
    border-collapse: collapse;
   
}

table thead tr{
    border: 1px solid #111;
    /* background-color: #5961b3; */
    
}
.table-bordered td{
    text-align:center;
}
table td {
    vertical-align: middle !important;
  
    word-wrap: break-word;
}
th{
    text-align:center;
    color:white;
}

table th, table td {
    /* padding-top: 08px;
    padding-bottom: 08px; */
}
.table-bordered{
    box-shadow: 0px 0px 5px 0.5px gray !important;
}
.table-bordered td, .table-bordered th {
    border: 1px solid #dee2e6 !important;
}
.text-right{
    text-align: right;
}
.w-20{
    width: 20%;
}
.float-right{
    float: right;
}
@media only screen and (max-width: 600px) {
    
}
.modal {
  position: fixed;
  top: 0;
  left: 0;
  display: flex;
  width: 100%;
  height: 100vh;
  justify-content: center;
  align-items: center;
  opacity: 0;
  visibility: hidden;
}

.modal .content {
  position: relative;
  padding: 10px;
 
  border-radius: 8px;
  background-color: #fff;
  box-shadow: rgba(112, 128, 175, 0.2) 0px 16px 24px 0px;
  transform: scale(0);
  transition: transform 300ms cubic-bezier(0.57, 0.21, 0.69, 1.25);
}

.modal .close {
  position: absolute;
  top: 5px;
  right: 5px;
  width: 30px;
  height: 30px;
  cursor: pointer;
  border-radius: 8px;
  background-color: #7080af;
  clip-path: polygon(0 10%, 10% 0, 50% 40%, 89% 0, 100% 10%, 60% 50%, 100% 90%, 90% 100%, 50% 60%, 10% 100%, 0 89%, 40% 50%);
}

.modal.open {
    background-color:#38469f;
  opacity: 1;
  visibility: visible;
}
.modal.open .content {
  transform: scale(1);
}
.content-wrapper.blur {
  filter: blur(5px);
}
.content {
    min-height: 0px;
}
</style>

    

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js"></script>


 <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.0.272/jspdf.debug.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.min.js"></script>
<script>
   $(document).ready(function(){
   
              
 $(".normalinvoice").each(function(i,v){
   if($(this).find("tbody").html().trim().length === 0){
       $(this).hide()
   }
})    
      $('.normalinvoice').each(function(){
       // debugger;  
var tid=$(this).attr('id');
 const indexLast = tid.lastIndexOf('_');
var idt = tid.slice(indexLast + 1);


  if ($(".normalinvoice td:not(:empty)").length == 0){
    alert("hurru");
    $(".normalinvoice").hide();
  }


  var sum=0;

 $('#normalinvoice_'+idt  +  '> tbody > tr').find('.total_price').each(function() {
var v=$(this).val();
  sum += parseFloat(v);

});
 $(this).closest('table').find('#Total_'+idt).val("<?php echo $currency;  ?>"+sum.toFixed(3));
  var sum_gross=0;

 $('#normalinvoice_'+idt  +  '> tbody > tr').find('.gross_sq_ft').each(function() {
var v=$(this).html();
  sum_gross += parseFloat(v);

});
 $(this).closest('table').find('#overall_gross_'+idt).val(sum_gross.toFixed(3));

  var sum_net=0;

 $('#normalinvoice_'+idt  +  '> tbody > tr').find('.net_sq_ft').each(function() {
var v=$(this).html();
  sum_net += parseFloat(v);

});

 $(this).closest('table').find('#overall_net_'+idt).val(sum_net.toFixed(3));


    });
});
 $(document).ready(function () {
function first(callback1,callback2){
setTimeout( function(){
    var pdf = new jsPDF('p','pt','a4');
    const invoice = document.getElementById("content");
             console.log(invoice);
             console.log(window);
             var pageWidth = 8.5;
             var margin=0.5;
             var opt = {
  lineHeight : 1.2,
  margin : 0,
  maxLineWidth : pageWidth - margin *1,
                 filename: 'invoice'+'.pdf',
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
  }).save('invoice_no_<?php echo $chalan_no.'.pdf'  ?>');
    callback1();
    callback2();
 }, 2500 );
}
function second(){
setTimeout( function(){
    $( '#myModal_ex' ).addClass( 'open' );
if ( $( '#myModal_ex' ).hasClass( 'open' ) ) {
  $( '.container' ).addClass( 'blur' );
}
$( '.close' ).click(function() {
  $( '#myModal_ex' ).removeClass( 'open' );
  $( '.cont' ).removeClass( 'blur' );
});
}, 2500 );
}
function third(){
    setTimeout( function(){
        window.location='<?php  echo base_url();   ?>'+'Cpurchase/manage_purchase';
        window.close();
    }, 3500 );
}
first(second,third);
});
</script>



