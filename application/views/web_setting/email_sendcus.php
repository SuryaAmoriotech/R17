<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<?php
// $conn = mysqli_connect('localhost', 'root', '', 'stonemart');
$mail = $this->phpmailer_lib->load();
    if(isset($_POST['submit_btn'])){

        $to = $_POST['to_email'];
        $cc = $_POST['cc_email'];
        $subject = $_POST['subject'];
        $message = $_POST['message'];
        $created = $this->session->userdata('user_id');
        $random_id = rand(10,100);

            // print_r($random_id); die();

        // echo '<pre>';
        // print_r($_POST); die;
        // echo '</pre>';

        try {
            //Server settings
            // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      
            $mail->isSMTP();                                           
            $mail->Host       = 'smtp.gmail.com';                     
            $mail->SMTPAuth   = true; 
            foreach ($mail_set as $key => $value) {
                $stm_user = $value->smtp_user;
                $stm_pass = $value->smtp_pass;
                // print_r($value);
            }                                 
            $mail->Username   = $stm_user;              
            $mail->Password   = $stm_pass;                            
            $mail->SMTPSecure = 'tls';            
            $mail->Port       = 587;                                   
            $mail->setFrom($to, 'Mailer');
            $mail->addAddress($to, 'Mailer');     //Add a recipient
            $mail->addCC($cc);

            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'Here is the subject';
            $mail->Body    = "<b>Message:</b>  $message "."<br>";
            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            $mail->send();


            // echo 'Message has been sent';
            echo "<script>
                swal({
                title: 'Email',
                text: 'Email Send Success',
                icon: 'success',
                button: 'Ok',
            });
            </script>";

            // echo file_put_contents("assets/Email/sendemail.txt", $to.'|'.$cc.'|'.$subject.'|'.$subject);
            file_put_contents("assets/Email/sendemail.txt", ("\n".$random_id.'|'.$to.'|'.$cc.'|'.$subject.'|'.$message.'|'),FILE_APPEND);

            $data = array(
                'to_email' => $to,
                'cc_email' => $cc,
                'subject' => $subject,
                'message' => $message,
                'created_by' => $this->session->userdata('user_id')
            );

            $this->db->insert('email_data', $data);
            // echo $this->db->last_query(); die();

            // $sql = "INSERT INTO `email_data`(`to_email`, `cc_email`, `subject`, `message`, `created_by`) VALUES ('".$to."', '".$cc."', '".$subject."', '".$message."', '".$created."')";

            // // echo $sql; die();

            // $result = mysqli_query($conn, $sql);    

        } catch (Exception $e) {
             echo "<script>
                swal({
                title: 'Email',
                text: 'Message could not be sent. Mailer Error: {$mail->ErrorInfo}',
                icon: 'error',
                button: 'Ok',
            });
            </script>";
            // echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
       
    }

?> 

<script type="text/javascript">
   history.back();
</script>