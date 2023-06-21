<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta.2/css/bootstrap.css"></script>
 <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
      <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

  <style>
    body{
      background-color:#38469f;
     color:#38469f;
     
    }
  </style>

<?php
if(isset($mail))
{
// $subject=$mail[0]['subject'];
// $greeting=$mail[0]['greeting'];
// $message=$mail[0]['message'];
$subject='Sales Invoice';
$greeting='Dear sir';
$message='Please find the attachement';
}
else
{
    $subject='Sales Invoice';
    $greeting='Dear sir';
    $message='Please find the attachement';
}
require 'includes/PHPMailer.php';
require 'includes/SMTP.php';
require 'includes/Exception.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
$mail = new PHPMailer(true);
try {
    $mail->SMTPDebug = 2;
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com;';
    $mail->SMTPAuth   = true;
 $mail->Username =   'john.adam9812@gmail.com';
    $mail->Password = 'snuurukgzuceuesr';
    $mail->SMTPOptions = array(
        'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
        )
    );
    $mail->Port       = 587;
    $mail->setFrom($company_info[0]['email'], $company_info[0]['company_name']);
    if(!empty($customer_info[0]['customer_email'])) {
      $mail->addAddress($customer_info[0]['customer_email']);
    }else{
      $mail->addAddress($customer_info[0]['primaryemail']);
    }
    $mail->isHTML(true);
    if(isset($mail))
{
 $mail->Subject =$subject;
    $mail->Body    =$greeting.'<br></br>'.$message.'<br><br>regards<br><br>
    '.$company_info[0]['company_name'].'<br>
    '.$company_info[0]['address'].'<br>
    '.$company_info[0]['email'].'<br>';
 }
 else
 {
   $mail->Subject = 'Sales Invoice';
    $mail->Body    = 'Dear sir,<br><br>
    Please find the attached<br>regards<br>
    '.$company_info[0]['company_name'].'<br>
    '.$company_info[0]['address'].'<br>
    '.$company_info[0]['email'].'<br>
    ';
 }
    $mail->AltBody = 'Body in plain text for non-HTML mail clients';
    $mail->addAttachment($file_name);
    // $mail->send();
   if($mail->send())
   {
    // echo "<script>alert('Email send successfully');</script>";
    echo "<script>
            swal({
            title: 'Email send successfully',
            text: 'Suceess message sent!!',
            icon: 'success',
            button: 'Ok',
        });

        setTimeout(function () {
   window.location.href =  '../../Admin_dashboard';
    }, 3000);
        
    </script>";
    }
     unlink($file_name);
}
catch (Exception $e) {
    //  echo "<script>
    //    swal(
    //         'Email Send Error',
    //         'Email',
    //         'danger'
    //         )
    // </script>";
    // echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
     echo "<script>
            swal({
            title: 'Email send Failed !!!',
            text: 'Email send Failed !!!',
            icon: 'error',
            button: 'Ok',
        });
        setTimeout(function () {
      window.location.href = '.$base_url(/Admin_dashboard).';
    }, 3000);
    </script>";
}
  ?>
<script type="text/javascript">
//   alert('Invoice sent Succefully');
   // history.back();
</script>
<?php
  exit();
?>

<style type="text/css">
    .swal-icon--success__line{
        background-color: #38469f !important;
    }

    .swal-icon--success__ring{
        border: 4px solid #38469f !important;
    }

    .swal-icon--success{
        background-color: #38469f !important;
    }
    .swal-button{
background-color: #38469f !important;
    }
</style>