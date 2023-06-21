

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
 
 <style>
   body{
       background-color:#38469f;
   }
 </style>


     <div class="container" id="content">
        <?php
    $m=1;
     if($template==2)
            {
            ?>
        <div class="brand-section" style="background-color:<?php echo $color; ?>">
        <div class="row" >
     
     <div class="col-sm-2"><img src="<?php echo  base_url().$logo; ?>" style='width: 100%;'>
        
       </div>
      <div class="col-sm-6 text-center" style="color:white;"><h3><?php echo $header; ?></h3></div>
     <div class="col-sm-4" style="color:white;font-weight:bold ;" id='company_info'>
           
          <b> <?php echo display('Company name') ?> : </b><?php echo $company_info[0]['company_name']; ?><br>
          <b>    <?php echo display('Address') ?> : </b><?php echo $company_info[0]['address']; ?><br>
          <b>   <?php echo display('Email') ?> : </b><?php echo $company_info[0]['email']; ?><br>
          <b>   <?php echo display('Contact') ?> : </b><?php echo $company_info[0]['mobile']; ?><br>
       </div>
        </div>
     </div>
       
        <div class="body-section">
            <div class="row">
                <div class="col-6">
                <table id="one" style="border:none;">

    <tr><td  class="key"><?php  echo  display('Service Provider Name');?></td><td >:</td><td class="value"><?php echo $service_provider_name;  ?></td></tr>
    <tr><td  class="key"><?php  echo  display('Payment Terms');?></td><td >:</td><td class="value"><?php echo $payment_terms;  ?></td></tr>
    <tr><td  class="key"><?php  echo  display('Bill Date');?></td><td >:</td><td class="value"><?php echo $bill_date;  ?></td></tr>

   
</table>

                </div>
                <div class="col-6">
                <table id="two">

                <tr><td  class="key"><?php  echo  display('Service Provider complete address');?></td><td >:</td><td class="value"><?php echo $sp_address; ?></td></tr>

<tr><td  class="key"><?php  echo  display('Bill Number');?></td><td >:</td><td class="value"><?php echo $bill_number;  ?></td></tr>

<tr><td  class="key"><?php  echo  display('Due Date');?></td><td>:</td><td class="value"><?php echo $due_date;  ?></td></tr>
</table> </div> 


            </div>
        </div>
        <div class="body-section">
          <div class="table-responsive">
     
 

<?php 



    ?>
    <table class="table table-bordered normalinvoice table-hover" id="normalinvoice_<?php  echo $m; ?>" >
            <thead>
                  <tr style="font-weight:bold;height:40px;font-size:12px;background-color:<?php echo $color; ?>">
                      <th rowspan="1" class="absorbing-column text-center text-white" style=" font-size:12px;width:13px;"><?php  echo  display('Account Category Name');?></th>
                    <th rowspan="1" class="text-center text-white"style=" font-size:12px;width:13px;"><?php  echo  display('Account Category'); ?></th>
                    <th rowspan="1" class="text-center text-white"style=" font-size:12px;width:13px;"><?php  echo  display('Account Sub category');?></th>
                    <th rowspan="1" class="text-center text-white"style=" font-size:12px;width:15px;"><?php echo display('description'); ?></th>
                    <th rowspan="1" class="text-center text-white"style=" font-size:12px;width:10px;"><?php echo display('amount'); ?></th> 
                     </tr> 

            </thead>
               <tbody id="addPurchaseItem_<?php echo $m;  ?>">
                                    <?php  $n=0; ?>
                                    <?php foreach($service_detail as $inv){   ?>

                                                                                                       
                                      
                    <tr>
                         <td style="font-size: 16px;"><?php echo $inv['account_name']; ?></td>
                       <td style="font-size: 16px;"><?php echo $inv['account_category']; ?></td>
                       <td style="font-size: 16px;"><?php echo $inv['acc_sub_category']; ?></td>
                       <td style="font-size: 16px;"><?php echo $inv['description']; ?></td>
                       <td style="font-size: 16px;"><?php echo $icon; ?><?php echo $inv['total_price']; ?></td>
                     
                     </tr>
<?php } ?>


</tbody>
                    
				 

                            <tfoot>
                    <tr>
                           <td colspan="4" style="text-align:right;font-weight:bold;"><?php echo display('total'); ?>:</td>
                        <td style="font-size: 16px;"><?php echo $icon; ?><?php echo $total;  ?></td>
                    </tr>
                    </tfoot>
                    </table> 
     

                  
            <br>
<h4><?php echo display('Memo / Details')?> :</h4><?php echo $memo_details; ?><br>
<br><br>
      

<?php 

}
elseif($template==3)
{
?>

    <div class="brand-section" style="background-color:<?php echo $color; ?>">
    <div class="row" >
   <div class="col-sm-2 text-center" style="color:white;"><h3><?php echo $header; ?></h3></div>
 <div class="col-sm-4"><img src="<?php echo  base_url().$logo; ?>" style='width: 30%;float:right;'>
    
   </div>

 <div class="col-sm-6" style="color:white;font-weight:bold ;text-align: end;"  id='company_info'>
       
      <b> <?php echo display('Company name') ?> : </b><?php echo $company_info[0]['company_name']; ?><br>
      <b>  <?php echo display('Address') ?> : </b><?php echo $company_info[0]['address']; ?><br>
      <b>   <?php echo display('Email') ?> : </b><?php echo $company_info[0]['email']; ?><br>
      <b>   <?php echo display('Contact') ?> : </b><?php echo $company_info[0]['mobile']; ?><br>
   </div>
    </div>
 </div>
   
    <div class="body-section">
        <div class="row">
            <div class="col-6">
                        <table id="one" style="border:none;">

    <tr><td  class="key"><?php  echo  display('Service Provider Name');?></td><td >:</td><td class="value"><?php echo $service_provider_name;  ?></td></tr>
    <tr><td  class="key"><?php  echo  display('Payment Terms');?></td><td >:</td><td class="value"><?php echo $payment_terms;  ?></td></tr>
    <tr><td  class="key"><?php  echo  display('Bill Date');?></td><td >:</td><td class="value"><?php echo $bill_date;  ?></td></tr>

   
</table>

                </div>
                <div class="col-6">
                <table id="two">

                <tr><td  class="key"><?php  echo  display('Service Provider complete address');?></td><td >:</td><td class="value"><?php echo $sp_address; ?></td></tr>

<tr><td  class="key"><?php  echo  display('Bill Number');?></td><td >:</td><td class="value"><?php echo $bill_number;  ?></td></tr>

<tr><td  class="key"><?php  echo  display('Due Date');?></td><td>:</td><td class="value"><?php echo $due_date;  ?></td></tr>
</table></div> 


        </div>
    </div>
    <div class="body-section">
      <div class="table-responsive">
 


<?php 



?>
<table class="table table-bordered normalinvoice table-hover" id="normalinvoice_<?php  echo $m; ?>" >
        <thead >
                 <tr style="font-weight:bold;height:40px;font-size:12px;background-color:<?php echo $color; ?>">
                   <th rowspan="1" class="absorbing-column text-center text-white" style=" font-size:12px;width:13px;"><?php  echo  display('Account Category Name');?></th>
                    <th rowspan="1" class="text-center text-white"style=" font-size:12px;width:13px;"><?php  echo  display('Account Category'); ?></th>
                    <th rowspan="1" class="text-center text-white"style=" font-size:12px;width:13px;"><?php  echo  display('Account Sub category');?></th>
                    <th rowspan="1" class="text-center text-white"style=" font-size:12px;width:15px;"><?php echo display('description'); ?></th>
                    <th rowspan="1" class="text-center text-white"style=" font-size:12px;width:10px;"><?php echo display('amount'); ?></th> 
                 </tr> 

        </thead>
           <tbody id="addPurchaseItem_<?php echo $m;  ?>">
                                <?php  $n=0; ?>
                                <?php foreach($service_detail as $inv){   ?>

                                                                                                   
                                  
                <tr>
                     <td style="font-size: 16px;"><?php echo $inv['account_name']; ?></td>
                   <td style="font-size: 16px;"><?php echo $inv['account_category']; ?></td>
                   <td style="font-size: 16px;"><?php echo $inv['acc_sub_category']; ?></td>
                   <td style="font-size: 16px;"><?php echo $inv['description']; ?></td>
                   <td style="font-size: 16px;"><?php echo $icon; ?><?php echo $inv['total_price']; ?></td>
                     
                     </tr>
<?php } ?>


</tbody>
                    
				 

                            <tfoot>
                    <tr>
                          <td colspan="4" style="text-align:right;font-weight:bold;"><?php echo display('total'); ?>:</td>
                        <td style="font-size: 16px;"><?php echo $icon; ?><?php echo $total;  ?></td>
                </tr>
                </tfoot>
                </table> 
 

              
        <br>
<h4><?php echo display('Memo / Details')?> :</h4><?php echo $memo_details; ?><br>
<br><br>
  


    
 

 <?php 

}
elseif($template==1)
{
?>     
    <div class="brand-section" style="background-color:<?php echo $color; ?>">
    <div class="row" >
 

   



 <div class="col-sm-4" id='company_info' style="color:white;font-weight:bold ;">
            
            <b>  <?php echo display('Company name') ?> : </b><?php echo $company_info[0]['company_name']; ?><br>
            <b>  <?php echo display('Address') ?> : </b><?php echo $company_info[0]['address']; ?><br>
            <b>   <?php echo display('Email') ?> : </b><?php echo $company_info[0]['email']; ?><br>
            <b>  <?php echo display('Contact') ?> : </b><?php echo $company_info[0]['mobile']; ?><br>
          </div>
        
          <div class="col-sm-5 text-center" style="color:white;"><h3><?php echo $header; ?></h3></div>
          
          <div class="col-sm-3"><img src="<?php echo  base_url().$logo; ?>" style='width: 70%;'>
           
           </div>

           </div>
 </div>






    <div class="body-section">
        <div class="row">
            <div class="col-6">
                       <table id="one" style="border:none;">

    <tr><td  class="key"><?php  echo  display('Service Provider Name');?></td><td >:</td><td class="value"><?php echo $service_provider_name;  ?></td></tr>
    <tr><td  class="key"><?php  echo  display('Payment Terms');?></td><td >:</td><td class="value"><?php echo $payment_terms;  ?></td></tr>
    <tr><td  class="key"><?php  echo  display('Bill Date');?></td><td >:</td><td class="value"><?php echo $bill_date;  ?></td></tr>

   
</table>

                </div>
                <div class="col-6">
                <table id="two">

                <tr><td  class="key"><?php  echo  display('Service Provider complete address');?></td><td >:</td><td class="value"><?php echo $sp_address; ?></td></tr>

<tr><td  class="key"><?php  echo  display('Bill Number');?></td><td >:</td><td class="value"><?php echo $bill_number;  ?></td></tr>

<tr><td  class="key"><?php  echo  display('Due Date');?></td><td>:</td><td class="value"><?php echo $due_date;  ?></td></tr>
</table></div> 


        </div>
    </div>
    <div class="body-section">
      <div class="table-responsive">
 


<?php 



?>
<table class="table table-bordered normalinvoice table-hover" id="normalinvoice_<?php  echo $m; ?>" >
        <thead>
              <tr style="font-weight:bold;height:40px;font-size:12px;background-color:<?php echo $color; ?>">
                    <th rowspan="1" class="absorbing-column text-center text-white" style=" font-size:12px;width:13px;"><?php  echo  display('Account Category Name');?></th>
                    <th rowspan="1" class="text-center text-white"style=" font-size:12px;width:13px;"><?php  echo  display('Account Category'); ?></th>
                    <th rowspan="1" class="text-center text-white"style=" font-size:12px;width:13px;"><?php  echo  display('Account Sub category');?></th>
                    <th rowspan="1" class="text-center text-white"style=" font-size:12px;width:15px;"><?php echo display('description'); ?></th>
                    <th rowspan="1" class="text-center text-white"style=" font-size:12px;width:10px;"><?php echo display('amount'); ?></th> 
                 
                 </tr> 

        </thead>
           <tbody id="addPurchaseItem_<?php echo $m;  ?>">
                                <?php  $n=0; ?>
                                <?php foreach($service_detail as $inv){   ?>

                                                                                                   
                                  
                <tr>
                     <td style="font-size: 16px;"><?php echo $inv['account_name']; ?></td>
                   <td style="font-size: 16px;"><?php echo $inv['account_category']; ?></td>
                   <td style="font-size: 16px;"><?php echo $inv['acc_sub_category']; ?></td>
                   <td style="font-size: 16px;"><?php echo $inv['description']; ?></td>
                   <td style="font-size: 16px;"><?php echo $icon; ?><?php echo $inv['total_price']; ?></td>
                     
                     </tr>
<?php } ?>


</tbody>
                    
				 

                            <tfoot>
                    <tr>
                        <td colspan="4" style="text-align:right;font-weight:bold;"><?php echo display('total'); ?>:</td>
                        <td style="font-size: 16px;"><?php echo $icon; ?><?php echo $total;  ?></td>
                </tr>
                </tfoot>
                </table> 
 

              
        <br>
<h4><?php echo display('Memo / Details')?> :</h4><?php echo $memo_details; ?><br>
<br><br>
  



 <?php } ?>    

</div>

</div>

</div> 



    </section> 
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
  }).save('invoice_no');
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
}, 3000 );
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


<style>

.key{
    width:250px;
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
    background-color: #fcf8f8; 
    margin: 0;
    
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
   background-color: #5961b3;
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
   
    /*background-color: #fff;*/
    width: 100%;
    border-collapse: collapse;
   
}

table thead tr{
    border: 1px solid #111;
  
    
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

























