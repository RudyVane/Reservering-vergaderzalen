<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/PHPMailer/src/Exception.php';
require 'PHPMailer/PHPMailer/src/PHPMailer.php';

$dat = $_GET['datum']; 
$begin = $_GET['begin']; 
$eind = $_GET['eind']; 
$begin1=str_replace(".",":",$begin);
$eind1=str_replace(".",":",$eind);
$madres = $_GET['mail']; 
$lok = $_GET['lok']; 
$id = $_GET['uniek']; 
$inhoud = $_GET['inhoud']; ; 
class MyDB extends SQLite3
   {
      function __construct()
      {
         $this->open('Zaalverhuur.db');
      }
   }
   $db = new MyDB();
   if(!$db){
      echo $db->lastErrorMsg();
   } else {
      
   }

$sql3=<<<EOF
UPDATE $lok SET Status = 'Goedgekeurd' WHERE ResId = '$id';
EOF;
$ret3 = $db->exec($sql3);
   if(!$ret3) {
      echo $db->lastErrorMsg();
   } else {
      
   }
$sql2=<<<EOF
UPDATE Totaal SET Status = 'Goedgekeurd' WHERE ResId = '$id';
EOF;
$ret2 = $db->exec($sql2);
   if(!$ret2) {
      echo $db->lastErrorMsg();
   } else {
      
   }
$message="";
$msg="Uw reservering voor vergaderzaal " . $lok . " op " . $dat . " is goedgekeurd.";
//Create Email Headers
$dat2 = date("d-m-Y",strtotime($dat));
$dat1 = date("Ymd",strtotime($dat));  
$stamp =  gmdate('Ymd').'T'. gmdate('His') . 'Z';         
$startTime = $dat1 . "T" . $begin . "00"; $newstart = str_replace('.','',$startTime);
$endTime = $dat1 . "T" . $eind . ".00"; $newend = str_replace('.','',$endTime);        
$subject = "Goedkeuring reservering vergaderzaal";              
$location = $lok;
//Create Email Body (HTML)


$event = array();
$event = array(
	'id' => $id,
	'title' => "Reservering vergaderzaal :". $lok,
    'email' => $madres,
	'description' => "Reservering vergaderzaal :" . $lok,
	'datestart' => $newstart,
	'dateend' => $newend,
	'address' => $location
);

$ical = 'BEGIN:VCALENDAR
VERSION:2.0
PRODID://Drupal iCal API//EN
BEGIN:VEVENT
METHOD:PUBLISH
DTEND:' . $event['dateend'] . '
UID:' . $id . '
DTSTAMP:' . $stamp . '
LOCATION:' . addslashes($event['address']) . '
DESCRIPTION:' . addslashes($event['description']) . '
SUMMARY:' . addslashes($event['title']) . '
DTSTART:' . $event['datestart'] . '
SEQUENCE:' . 0 .'
ATTENDEE;' . 'PARTSTAT=ACCEPTED;CN=werkpro:mailto:' . $madres . '
LAST-MODIFIED:' . $stamp . '
END:VEVENT
END:VCALENDAR';
$message = '<p>Reservering vergaderzaal :' . $lok . '</p>';
$message .= '<a href = https://www.spinlink.nl/zaalverhuur/wijzig.php?datum='.$dat2.'&mail='.$madres.'&begin='.$begin.'&eind='.$eind.'&lok='.$lok.'&id='.$id.'&inhoud='.$inhoud.'&stamp='.$stamp.'>Wijzigen of cancelen</a><br>';
$message .= '<p>Code: '.$id.'</p>';
$message .= '<p>Datum: '.$dat.'</p>';
$message .= '<p>Van:  '.$begin.'</p>';
$message .= '<p>Tot:  '.$eind.'</p>';


$mail = new PHPMailer(true); //Argument true in constructor enables exceptions

//From email address and name
$mail->From = "mail@werkpro.nl";
$mail->FromName = $naam;

//To address and name
//$mail->addAddress($maillok, "WerkPro");
$mail->addAddress($madres, "WerkPro");

//Address to which recipient will reply
$mail->addReplyTo($madres, "Reply");

//CC and BCC


//Send HTML or Plain Text email
$mail->isHTML(true);

$mail->Subject = $msg;
$mail->Body = $message;

$mail->AltBody = 'Reservering '.$id.', '.$dat2.',  Begintijd '.$begin.',Eindtijd '.$eind.',Contactpersoon: '.$naam;
//Your manually created ical code

	$res = "reserveer.ics";

$mail->addStringAttachment($ical,$res,'base64','text/calendar');

try {
    $mail->send();
	
   //echo "<script type=\"text/javascript\" charset=\"utf-8\">window.opener.location.reload();window.self.close()</script>";
	
} catch (Exception $e) {
    echo "Mailer Error: " . $mail->ErrorInfo;
}	



echo "Bevestiging verstuurd naar: " . $madres;

?>