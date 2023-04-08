<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/PHPMailer/src/Exception.php';
require 'PHPMailer/PHPMailer/src/PHPMailer.php';

session_start(); 
$dat = $_SESSION['dat']; 
$begin = $_SESSION['begin']; 
$eind = $_SESSION['eind']; 
$madres = $_SESSION['madres']; 
$lok = $_SESSION['lok']; 
$id = $_SESSION['id']; 
$lokmail = $_SESSION['lokmail']; 
$message="";
$domain = 'test.com';
$message = '<p>Reservering vergaderruimte:</p>';

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
   
$inhoud = $lok;
//Create Email Headers
$dat2 = date("d-m-Y",strtotime($dat));
$dat1 = date("Ymd",strtotime($dat));          
$startTime = $dat1 . "T" . $begin . "00"; $newstart = str_replace('.','',$startTime);
$endTime = $dat1 . "T" . $eind . ".00"; $newend = str_replace('.','',$endTime);        
$subject = "annuleren";              
$location = $lok;

//Create Email Body (HTML)
$message .= '<p>Locatie '.$lok.'</p>';
$message .= '<p>Datum '.$dat2.'</p>';
$message .= '<p>Begintijd '.$begin.'</p>';
$message .= '<p>Eindtijd '.$eind.'</p>';

$event = array();
$event = array(
	'id' => $newstart,
	'title' => "Annuleren",
    'email' => $madres,
	'description' => $inhoud,
	'datestart' => $newstart,
	'dateend' => $newend,
	'address' => $location
);

$ical = 'BEGIN:VCALENDAR
VERSION:2.0
PRODID://Drupal iCal API//EN
BEGIN:VEVENT
METHOD:CANCEL
DTEND:' . $event['dateend'] . '
UID:' . $id . '
DTSTAMP:' . gmdate('Ymd').'T'. gmdate('His') . 'Z' . '
LOCATION:' . addslashes($event['address']) . '
DESCRIPTION:' . addslashes($event['description']) . '
SUMMARY:' . addslashes($event['title']) . '
DTSTART:' . $event['datestart'] . '
STATUS:CANCELLED
END:VEVENT
END:VCALENDAR';



$mail = new PHPMailer(true); //Argument true in constructor enables exceptions

//From email address and name
$mail->From = "info@werkpro.nl";
$mail->FromName = $naam;

//To address and name
//$mail->addAddress($maillok, "WerkPro");
$mail->addAddress($lokmail, "WerkPro");

//Address to which recipient will reply
$mail->addReplyTo($madres, "Reply");

//CC and BCC


//Send HTML or Plain Text email
$mail->isHTML(true);

$mail->Subject = "Annulering reservering vergaderzaal";
$mail->Body = $message;

$mail->AltBody = 'Reservering '.$id.', '.$dat2.',  Begintijd '.$begin.',Eindtijd '.$eind.',Contactpersoon: '.$naam.',Email:  '.$email.',Telefoon:  '.$telf.',Kostenplaats:  '.$kpl.',Project:  '.$proj.',Opmerking:  '.$opm.',Aantal personen:  '.$pers;
//Your manually created ical code

	$res = "reserveer.ics";

$mail->addStringAttachment($ical,$res,'base64','text/calendar');

try {
    $mail->send();
	echo "Annulering verstuurd";
   //echo "<script type=\"text/javascript\" charset=\"utf-8\">window.opener.location.reload();window.self.close()</script>";
	
} catch (Exception $e) {
    echo "Mailer Error: " . $mail->ErrorInfo;
}	



?>
