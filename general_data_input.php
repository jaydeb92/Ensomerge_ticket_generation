<?php include 'header.php' ;
include 'config.php';
include 'mailconfig.php'; ?>
<?php 
$query_mail="SELECT * FROM users WHERE username='$username' ";
$result=mysqli_query($conn,$query_mail);
$row=mysqli_fetch_array($result);
$email_from=$row['email'];

 ?>



 <?php 
 $sql = "SELECT MAX(ticket_no) as ticket FROM details";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$ticket=$row['ticket'];
$ticket1=++$ticket;
  ?>
<?php

if (isset($_POST['submit']))
{
$ticketno = $conn -> real_escape_string($_POST['ticketno']);
$clientname =$conn -> real_escape_string( $_POST['clientname']);
$requeststatus = $conn -> real_escape_string($_POST['requeststatus']);
$reference = $conn -> real_escape_string($_POST['reference']);

$typeofbusiness = $conn -> real_escape_string($_POST['typeofbusiness']);

$discipline = $conn -> real_escape_string($_POST['discipline']);
$recruitmentstatus = $conn -> real_escape_string($_POST['recruitmentstatus']);


$requestupdates = $conn -> real_escape_string($_POST['requestupdates']);
$expectedtime = $conn -> real_escape_string($_POST['expectedtime']);

$initialresponse = $conn -> real_escape_string($_POST['initialresponse']);
$auoffshore = $conn -> real_escape_string($_POST['auoffshore']);
$emslaimpact = $conn -> real_escape_string($_POST['emslaimpact']);
$date = date("Y-m-d h:i:s");
$request_type = $conn -> real_escape_string($_POST['request_type']);
$emdocumentation = $conn -> real_escape_string($_POST['emdocumentation']);
//echo $emdocumentation;

$query_mail_receiver="SELECT * FROM users WHERE username='$auoffshore' ";
$result_receiver=mysqli_query($conn,$query_mail_receiver);
$row_receiver=mysqli_fetch_array($result_receiver);
$email_to=$row_receiver['email'];

$mail->setFrom($email_from,"jaydeb");
/*$mail->addReplyTo('jaydeb.dey1992@gmail.com',"jaydeb");*/

$address = $email_to;
$mail->AddAddress($address, "jaydeb");

// Email subject
$mail->Subject = 'New Ticket generation mail';

// Set email format to HTML
$mail->isHTML(true);

// Email body content
/*$mailContent = '
    <h4>Hi </h4>
    <p>You have one new Ticket. </p>
    <p>To get details Please open this link <a href="http://wfm.ensomerge.com/ticket">Please Select this Link</a>.</p>';*/

    /*$mailContent="HI".$auoffshore."You have one new Ticket";*/
    $link="http://wfm.ensomerge.com/ticket";

    // compose message
$mailContent = "Hi ".$auoffshore.",<p>You have one new ticket"."</p><h4>Ticket No:".$ticket1."</h4>";
$mailContent .= " <p>To get details please open below link</p>".$link ;






$mail->Body = $mailContent;

// Send email
if(!$mail->send()){
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
}else{
    echo 'Message has been sent';
} 



 $query = ("INSERT INTO details(ticket_no,client_name,request_status,reference,type_of_business,discipline,request_update,expexted_time,initial_response_date,au_officer,em_sla_impact,request_on,recruitment_status,emdocumentation,request_type) VALUES ('$ticketno','$clientname','$requeststatus','$reference','$typeofbusiness','$discipline','$requestupdates','$expectedtime','$initialresponse','$auoffshore','$emslaimpact','$date','$recruitmentstatus','$emdocumentation','$request_type')");
  if (mysqli_multi_query($conn, $query)) {
        echo '<script type="text/javascript">';
        echo 'alert("Worksheet Details are added sucessfully");';
        echo 'window.location.href = "addnewticket.php";';
        echo '</script>';
    } else {
        echo '<script type="text/javascript">';
        echo 'alert("Worksheet Details are added Failed");';
        //echo 'window.location.href = "update1.php?id=$id";';
        echo 'window.location.href = "addnewticket.php";';
        echo '</script>';
    }
}
?>