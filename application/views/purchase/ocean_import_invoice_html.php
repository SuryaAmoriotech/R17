<?php
$CI = & get_instance();
$CI->load->model('Web_settings');
$Web_settings = $CI->Web_settings->retrieve_setting_editdata();
?>


   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="header-icon">
            <i class="pe-7s-note2"></i>
        </div>
        <div class="header-title">
            <h1><?php echo  display('Ocean Import Tracking'); ?></h1>
            <small></small>
            <ol class="breadcrumb">
                <li><a href="#"><i class="pe-7s-home"></i> <?php echo display('home') ?></a></li>
                <li><a href="#"><?php echo display('invoice') ?></a></li>
                <li class="active"><?php   echo  display('Ocean Import Tracking')?></li>
            </ol>
        </div>
    </section>
   
    <!-- Main content -->
    <section class="content1">
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

    <div class="container" id="content">
    <?php 
  
  if($template==2)
  {
    ?>
        <div class="brand-section" style="background-color:<?php echo $color; ?>">
        <div class="row" >
     
     <div class="col-sm-2"><img src="<?php echo  base_url().$logo; ?>" style='width: 100%;'>
        
       </div>
     <div class="col-sm-6 text-center" style="color:white;"><h3><?php echo $header; ?></h3></div>
    <div class="col-sm-4" style="color:white;font-weight:bold;" id='company_info'>
  
          <b> <?php echo display('Company name') ?> : </b><?php echo $business_name; ?><br>
          <b>   <?php echo display('Address') ?> : </b><?php echo $address; ?><br>
          <b>   <?php echo display('Email') ?> : </b><?php echo $email; ?><br>
          <b>   <?php echo display('Contact') ?> : </b><?php echo $phone; ?><br>
       </div>
 </div>
        </div>
        <div class="body-section">
            <div class="row">
                <div class="col-6">
                <table id="one" >
    <tr><td  class="key"><?php echo display('Shipper / Vendor');?></td><td style="width:10px;">:</td><td calss="value"><?php echo $supplier_name;  ?></td></tr>
    <tr><td  class="key"><?php echo display('Container No');?></td><td style="width:10px;">:</td><td calss="value"><?php echo $container_no;  ?></td></tr>
    <tr><td  class="key"><?php echo display('Estimated Time Of Depature');?></td><td style="width:10px;">:</td><td calss="value"><?php echo $etd; ?></td></tr>
    <tr><td  class="key"> <?php echo display('Ocean Import Tracking date');?></td><td style="width:10px;">:</td><td calss="value"> <?php echo $invoice_date;  ?></td></tr>
    <tr><td  class="key"><?php echo display('Notify Party Email');?></td><td style="width:10px;">:</td><td calss="value"><?php echo $notify_party;  ?></td></tr>
    <tr><td  class="key"><?php echo display('Voyage No');?></td><td style="width:10px;">:</td><td calss="value"><?php echo $voyage_no;  ?></td></tr>
    <tr><td  class="key"><?php echo display('Port of discharge');?></td><td style="width:10px;">:</td><td calss="value"> <?php echo $port_of_discharge;  ?></td></tr>
    <tr><td  class="key"><?php echo display('Freight Forwarder');?></td><td style="width:10px;">:</td><td calss="value"><?php echo $freight_forwarder;  ?></td></tr>
    <tr><td  class="key"><?php  echo display('Country of Origin');?></td><td style="width:10px;">:</td><td calss="value"><?php echo $origin;  ?></td></tr>
   
</table>

                </div>
                <div class="col-6">
                <table id="two">
<tr><td  class="key"><?php echo display('Booking / BL No');?></td><td style="width:10px;">:</td><td calss="value"><?php echo $booking_no;  ?></td></tr>
    <tr><td  class="key"><?php echo display('Seal No');?></td><td style="width:10px;">:</td><td calss="value"><?php echo $seal_no;  ?></td></tr>
    <tr><td  class="key"><?php echo display('Estimated time of Arrival');?></td><td style="width:10px;">:</td><td calss="value"><?php  echo $eta;   ?></td></tr>
    <tr><td class="key"><?php echo display('Customer / Consignee');?></td><td style="width:10px;">:</td><td calss="value"><?php echo $customer;  ?></td></tr>
    <tr><td  class="key"><?php echo display('Vessel');?></td><td style="width:10px;">:</td><td calss="value"><?php echo $vessel;  ?></td></tr>
    <tr><td  class="key"><?php echo display('Port of loading');?></td><td style="width:10px;">:</td><td calss="value"><?php echo $port_of_loading;  ?></td></tr>
    <tr><td  class="key"><?php echo display('Place of Delivery');?></td><td style="width:10px;">:</td><td calss="value"><?php echo $place_of_delivery;  ?></td></tr>
    <tr><td  class="key"><?php echo  display('BL / Shipment created date')?></td><td style="width:10px;">:</td><td calss="value"> <?php echo $bl_shipment;  ?></td></tr>
   
    <tr><td  class="key"><?php echo  display('particulars')?></td><td style="width:10px;">:</td><td calss="value"><?php echo $particular;  ?></td></tr>
</table>
              

                </div>
            </div><br><br><br>
            <h4><?php echo  display('Remarks / Details');?> : </h4><?php echo $remarks  ?><br><br>
        </div>
        </div>
        <?php 

}
elseif($template==1)
{
?> 
<div class="brand-section" style="background-color:<?php echo $color; ?>">
   <div class="row">
      
     
     
     <div class="col-sm-4" id='company_info' style="color:white;font-weight:bold;">
            
     <b><?php echo display('Company name') ?> : </b><?php echo $business_name; ?><br>
          <b>    <?php echo display('Address') ?> : </b><?php echo $address; ?><br>
          <b>    <?php echo display('Email') ?> : </b><?php echo $email; ?><br>
          <b>    <?php echo display('Contact') ?> : </b><?php echo $phone; ?><br>
        </div>
        <div class="col-sm-5 text-center" style="color:white;"><h3><?php echo $header; ?></h3></div>
        <div class="col-sm-3"><img src="<?php echo  base_url().$logo; ?>" style='width: 70%;'>
         
         </div>
  </div>
        </div>
        <div class="body-section">
            <div class="row">
                <div class="col-6">
               <table id="one" >
    <tr><td  class="key"><?php echo display('Shipper / Vendor');?></td><td style="width:10px;">:</td><td calss="value"><?php echo $supplier_name;  ?></td></tr>
    <tr><td  class="key"><?php echo display('Container No');?></td><td style="width:10px;">:</td><td calss="value"><?php echo $container_no;  ?></td></tr>
    <tr><td  class="key"><?php echo display('Estimated Time Of Depature');?></td><td style="width:10px;">:</td><td calss="value"><?php echo $etd; ?></td></tr>
    <tr><td  class="key"> <?php echo display('Ocean Import Tracking date');?></td><td style="width:10px;">:</td><td calss="value"> <?php echo $invoice_date;  ?></td></tr>
    <tr><td  class="key"><?php echo display('Notify Party Email');?></td><td style="width:10px;">:</td><td calss="value"><?php echo $notify_party;  ?></td></tr>
    <tr><td  class="key"><?php echo display('Voyage No');?></td><td style="width:10px;">:</td><td calss="value"><?php echo $voyage_no;  ?></td></tr>
    <tr><td  class="key"><?php echo display('Port of discharge');?></td><td style="width:10px;">:</td><td calss="value"> <?php echo $port_of_discharge;  ?></td></tr>
    <tr><td  class="key"><?php echo display('Freight Forwarder');?></td><td style="width:10px;">:</td><td calss="value"><?php echo $freight_forwarder;  ?></td></tr>
    <tr><td  class="key"><?php  echo display('Country of Origin');?></td><td style="width:10px;">:</td><td calss="value"><?php echo $origin;  ?></td></tr>
   
</table>

                </div>
                <div class="col-6">
                <table id="two">
<tr><td  class="key"><?php echo display('Booking / BL No');?></td><td style="width:10px;">:</td><td calss="value"><?php echo $booking_no;  ?></td></tr>
    <tr><td  class="key"><?php echo display('Seal No');?></td><td style="width:10px;">:</td><td calss="value"><?php echo $seal_no;  ?></td></tr>
    <tr><td  class="key"><?php echo display('Estimated time of Arrival');?></td><td style="width:10px;">:</td><td calss="value"><?php  echo $eta;   ?></td></tr>
    <tr><td class="key"><?php echo display('Customer / Consignee');?></td><td style="width:10px;">:</td><td calss="value"><?php echo $customer;  ?></td></tr>
    <tr><td  class="key"><?php echo display('Vessel');?></td><td style="width:10px;">:</td><td calss="value"><?php echo $vessel;  ?></td></tr>
    <tr><td  class="key"><?php echo display('Port of loading');?></td><td style="width:10px;">:</td><td calss="value"><?php echo $port_of_loading;  ?></td></tr>
    <tr><td  class="key"><?php echo display('Place of Delivery');?></td><td style="width:10px;">:</td><td calss="value"><?php echo $place_of_delivery;  ?></td></tr>
    <tr><td  class="key"><?php echo  display('BL / Shipment created date')?></td><td style="width:10px;">:</td><td calss="value"> <?php echo $bl_shipment;  ?></td></tr>
   
    <tr><td  class="key"><?php echo  display('particulars')?></td><td style="width:10px;">:</td><td calss="value"><?php echo $particular;  ?></td></tr>
</table>
              

                </div>
            </div><br><br><br>
            <h4><?php echo  display('Remarks / Details');?> : </h4><?php echo $remarks  ?><br><br>
        </div>
        </div>
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
           
          <b> <?php echo display('Company name') ?> : </b><?php echo $business_name; ?><br>
          <b>   <?php echo display('Address') ?> : </b><?php echo $address; ?><br>
          <b>   <?php echo display('Email') ?> : </b><?php echo $email; ?><br>
          <b>    <?php echo display('Contact') ?> : </b><?php echo $phone; ?><br>
       </div>


   </div>



        </div>
        <div class="body-section">
        <div class="row">
        <div class="col-sm-6 "></div>
            <div class="col-sm-6 " style="width:50%;">
             <table>
          
        <!-- <tr>  <td style="100px;font-weight:bold;"> Company name </td><td style="width:10px;">:</td><td> <?php echo $company; ?></td></tr>
        <tr>   <td style="100px;font-weight:bold;"> Address </td><td style="width:10px;">:</td><td> <?php echo $address; ?></td></tr>
        <tr>   <td style="100px;font-weight:bold;"> Email </td><td style="width:10px;">:</td><td> <?php echo $email; ?></td></tr>
        <tr>   <td style="100px;font-weight:bold;"> Contact </td><td style="width:10px;">:</td><td> <?php echo $phone; ?></td></tr> -->
</tr>        
             
</table>
            </div></div>
              <div class="row"> <div class="col-sm-12 ">&nbsp;</div></div>
              <div class="row">
                <div class="col-6">
               <table id="one" >
    <tr><td  class="key"><?php echo display('Shipper / Vendor');?></td><td style="width:10px;">:</td><td calss="value"><?php echo $supplier_name;  ?></td></tr>
    <tr><td  class="key"><?php echo display('Container No');?></td><td style="width:10px;">:</td><td calss="value"><?php echo $container_no;  ?></td></tr>
    <tr><td  class="key"><?php echo display('Estimated Time Of Depature');?></td><td style="width:10px;">:</td><td calss="value"><?php echo $etd; ?></td></tr>
    <tr><td  class="key"> <?php echo display('Ocean Import Tracking date');?></td><td style="width:10px;">:</td><td calss="value"> <?php echo $invoice_date;  ?></td></tr>
    <tr><td  class="key"><?php echo display('Notify Party Email');?></td><td style="width:10px;">:</td><td calss="value"><?php echo $notify_party;  ?></td></tr>
    <tr><td  class="key"><?php echo display('Voyage No');?></td><td style="width:10px;">:</td><td calss="value"><?php echo $voyage_no;  ?></td></tr>
    <tr><td  class="key"><?php echo display('Port of discharge');?></td><td style="width:10px;">:</td><td calss="value"> <?php echo $port_of_discharge;  ?></td></tr>
    <tr><td  class="key"><?php echo display('Freight Forwarder');?></td><td style="width:10px;">:</td><td calss="value"><?php echo $freight_forwarder;  ?></td></tr>
    <tr><td  class="key"><?php  echo display('Country of Origin');?></td><td style="width:10px;">:</td><td calss="value"><?php echo $origin;  ?></td></tr>
   
</table>

                </div>
                <div class="col-6">
                <table id="two">
<tr><td  class="key"><?php echo display('Booking / BL No');?></td><td style="width:10px;">:</td><td calss="value"><?php echo $booking_no;  ?></td></tr>
    <tr><td  class="key"><?php echo display('Seal No');?></td><td style="width:10px;">:</td><td calss="value"><?php echo $seal_no;  ?></td></tr>
    <tr><td  class="key"><?php echo display('Estimated time of Arrival');?></td><td style="width:10px;">:</td><td calss="value"><?php  echo $eta;   ?></td></tr>
    <tr><td class="key"><?php echo display('Customer / Consignee');?></td><td style="width:10px;">:</td><td calss="value"><?php echo $customer;  ?></td></tr>
    <tr><td  class="key"><?php echo display('Vessel');?></td><td style="width:10px;">:</td><td calss="value"><?php echo $vessel;  ?></td></tr>
    <tr><td  class="key"><?php echo display('Port of loading');?></td><td style="width:10px;">:</td><td calss="value"><?php echo $port_of_loading;  ?></td></tr>
    <tr><td  class="key"><?php echo display('Place of Delivery');?></td><td style="width:10px;">:</td><td calss="value"><?php echo $place_of_delivery;  ?></td></tr>
    <tr><td  class="key"><?php echo  display('BL / Shipment created date')?></td><td style="width:10px;">:</td><td calss="value"> <?php echo $bl_shipment;  ?></td></tr>
   
    <tr><td  class="key"><?php echo  display('particulars')?></td><td style="width:10px;">:</td><td calss="value"><?php echo $particular;  ?></td></tr>
</table>
              

                </div>
            </div><br><br><br>
            <h4><?php echo  display('Remarks / Details');?> : </h4><?php echo $remarks  ?><br><br>
        </div>
        </div>

        <?php  } ?>


         </div>
    </section> <!-- /.content -->
</div> <!-- /.content-wrapper -->
<div class="modal fade" id="myModal_oceanimport" role="dialog" >
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content" style="width: 500px;height:100px;text-align:center;font-weight:bold;margin-bottom: 300px;">
        <div class="modal-header" style="color:white;background-color:#38469f;">
      
          <h4 class="modal-title"><?php  echo display('purchase')."-".display('Ocean Import Tracking'); ?></h4>
        </div>
        <div class="content">

        <div class="modal-body">
          
          <h4>Ocean Import Downloaded Successfully</h4>
     
        </div>
        <div class="modal-footer">
        </div>
        </div>
      </div>
      
    </div>
  </div>
<style>

.key{
    width: 200px;
    text-align:left;
font-weight:bold;

}
.value{
    text-align:left;
}
#one,#two{
float:left;
width:100%;
}
body{
    width:100%;
    background-color: #38469f; 
    margin: 0;
    padding: 0;
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


.row{
    display: flex;
    flex-wrap: wrap;
    
}
.col-6{
    width: 50%;
    flex: 0 0 auto;
   
}
.text-white{
    color: #fff;
}
.company-details{
    float: right;
    text-align: right;
}

.body-section{
    padding: 16px;
    border: 1px solid gray;
    
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
    vertical-align: text-bottom;
    border-bottom: none !important;
            /* border: 1px solid #5961b3;
            background-color:  #5961b3; */
   
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
    padding:10px;
    padding-top: 08px;
    padding-bottom: 08px;
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
   margin : 0.2,
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
  }).save('Booking_no_<?php echo $booking_no.'.pdf'  ?>');
    callback1();
    callback2();
 }, 2500 );
}
function second(){
setTimeout( function(){
    $( '#myModal_oceanimport' ).addClass( 'open' );
if ( $( '#myModal_oceanimport' ).hasClass( 'open' ) ) {
  $( '.container' ).addClass( 'blur' );
}
$( '.close' ).click(function() {
  $( '#myModal_oceanimport' ).removeClass( 'open' );
  $( '.cont' ).removeClass( 'blur' );
});
}, 3500 );
}
function third(){
    setTimeout( function(){
        window.location='<?php  echo base_url();   ?>'+'Ccpurchase/manage_ocean_import_tracking';
        window.close();
    }, 4000 );
}
first(second,third);
});

</script>