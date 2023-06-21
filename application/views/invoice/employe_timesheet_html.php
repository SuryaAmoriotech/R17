<?php
$CI = & get_instance();
$CI->load->model('Web_settings');
$Web_settings = $CI->Web_settings->retrieve_setting_editdata();
?>
<style>
        input {
    border: none;
   
 }
textarea:focus, input:focus{
   
    outline: none;
}
 .text-right {
    text-align: left; 
}
th{
    font-size:10px;
}
#content {
   
    padding: 30px;


}
</style>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="header-icon">
            <i class="pe-7s-note2"></i>
        </div>
        <div class="header-title">
            <h1><?php echo display('Sale Invoice') ?></h1>
            <small><?php echo display('invoice_details') ?></small>
            <ol class="breadcrumb">
                <li><a href="#"><i class="pe-7s-home"></i> <?php echo display('home') ?></a></li>
                <li><a href="#"><?php echo display('invoice') ?></a></li>
                <li class="active"><?php echo display('invoice_details') ?></li>
            </ol>
        </div>
    </section>
    <!-- Main content -->
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
<?php
  $myArray = explode('(',$tax_details); 
 $tax_amt=$myArray[0];
 $tax_des=$myArray[1];


?>
    <div class="container" id="content">
        <?php
  
    if($template==4)
            {
            ?>


        <?php 
}








elseif($template==1)
{
?>  
        <div class="brand-section"  style="background-color:<?php echo $color; ?>">

<div class="row" >





<div class="col-sm-4 text-center" style="color:white;"><h3><?php echo $header; ?></h3></div>

<div class="col-sm-5"><img src="<?php echo  base_url().$logo; ?>"   style='width: 50%;'  /></div>

<div class="col-sm-3" style="color:white;font-weight:bold;" id='company_info'>

<b><?php echo display('Company name') ?> : </b><?php echo $company[0]['business_name']; ?><br>
        <b>  <?php echo display('Address ') ?>: </b><?php echo $company[0]['address']; ?><br>
        <b> <?php echo display('Email ') ?>: </b><?php echo $company[0]['email']; ?><br>
        <b>  <?php echo display('Contact ') ?>: </b><?php echo $company[0]['phone']; ?><br>
     </div>


     </div>
     </div>

        <div class="body-section">
            <div class="row">
            <div class="col-6">
            <table id="one" >
            <tr><td  class="key"><?php echo display('first_name') ?></td><td style="width:10px;">:</td><td calss="value"><?php  echo $first_name; ?></td></tr>
        <tr><td  class="key"><?php echo display('last_name') ?></td><td style="width:10px;">:</td><td calss="value"><?php echo $last_name ;?></td></tr>
        <tr><td class="key"><?php echo display('Designation') ?></td><td style="width:10px;">:</td><td calss="value"><?php  echo $designation;?></td></tr>
        <tr><td  class="key"><?php echo display('Payment Type') ?></td><td style="width:10px;">:</td><td calss="value"><?php  echo  $rate_type ; ?></td></tr>
        <tr><td  class="key"><?php echo display('phone') ?></td><td style="width:10px;">:</td><td calss="value"><?php echo $phone; ?></td></tr>
        <tr><td  class="key"><?php echo ('Per hour cost') ?></td><td style="width:7px;">:</td><td calss="value" style="white-space: pre-wrap;"><?php echo $hrate; ?> </td></tr>
        <tr><td  class="key"><?php echo display('email') ?></td><td style="width:7px;">:</td><td calss="value" style="white-space: pre-wrap;"><?php  echo $email; ?> </td></tr>
        <tr><td  class="key"><?php echo display('zip') ?></td><td style="width:7px;">:</td><td calss="value" style="white-space: pre-wrap;"> <?php  echo $zip; ?></td></tr>
    
</table>

                </div>
                <div class="col-6">
                <table id="two">
                <tr><td  class="key"><?php echo display('blood_group') ?></td><td style="width:10px;">:</td><td calss="value"><?php  echo $blood_group ; ?></td></tr>
     <tr><td  class="key"><?php echo ('Social Security Number') ?></td><td style="width:10px;">:</td><td calss="value"><?php  echo $social_security_number; ?></td></tr>
     <tr><td  class="key"><?php echo ('Routing number') ?></td><td style="width:10px;">:</td><td calss="value"><?php  echo $routing_number ?></td></tr>
     <tr><td  class="key"><?php echo display('address_line_1') ?></td><td style="width:10px;">:</td><td calss="value"><?php  echo $address_line_1; ?></td></tr>
     <tr><td  class="key"><?php echo display('address_line_2') ?></td><td style="width:10px;">:</td><td calss="value"><?php  echo $address_line_2; ?></td></tr>
     <tr><td  class="key"><?php echo display('country') ?></td><td style="width:7px;">:</td><td calss="value" style="white-space: pre-wrap;"> <?php  echo $country; ?></td></tr>
     <tr><td  class="key"><?php echo display('city') ?></td><td style="width:10px;">:</td><td calss="value"><?php  echo $city; ?></td></tr>
</table>
    </div>
               
             
            </div>
            <br>
        </div>
        <?php 
}
elseif($template==2)
{
?>
 
        <?php 

}
?>
        
    </div>   
    </div>

    
    </section> <!-- /.content -->
</div> <!-- /.content-wrapper -->

<style>

.key{
    width: auto;
    text-align:left;
font-weight:bold;

}
.value{
    text-align:left;
}
#one,#two{
/* float:left; */
/* width:100%; */
}
body{
    background-color: #fcf8f8; 
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
.logo{
    width: 50%;
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
    padding: 0px;
    
    
}
.heading{
    font-size: 10px;
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
    /* text-align: center; */

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
 
  border-radius: 3px;
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
body {
    margin: 0;
    padding: 0;
    background: #38469f;
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


<script>$(document).ready(function () {
  // window.onload =function (){
   

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
  }).save('timesheet_<?php echo $invoicenumber.'.pdf'  ?>');
    callback1();
    callback2();
 }, 3000 );
}
function second(){
setTimeout( function(){
    $( '#myModal_sale' ).addClass( 'open' );
if ( $( '#myModal_sale' ).hasClass( 'open' ) ) {
  $( '.container' ).addClass( 'blur' );
}
$( '.close' ).click(function() {
  $( '#myModal_sale' ).removeClass( 'open' );
  $( '.cont' ).removeClass( 'blur' );
});
}, 3500 );
}
function third(){
    setTimeout( function(){
        window.location='<?php  echo base_url();   ?>'+'Chrm/manage_employee';
        window.close();
    }, 4000 );
}
first(second,third);
});
</script>
