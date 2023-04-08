<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/PHPMailer/src/Exception.php';
require 'PHPMailer/PHPMailer/src/PHPMailer.php';

session_start(); 

$dat = $_SESSION['dat']; 
$begin = $_SESSION['begin']; 
$eind = $_SESSION['eind']; 
$begin1=str_replace(".",":",$begin);
$eind1=str_replace(".",":",$eind);
$madres = $_SESSION['madres']; 
$lok = $_SESSION['lok']; 
$id = $_SESSION['id']; 
$resid = $_SESSION['resid'];
$inhoud = $_SESSION['inhoud'];
$lokmail = $_SESSION['lokmail']; 
$proj = $_SESSION['proj']; 
$info = $_SESSION['opm']; 
$stat = $_SESSION['stat']; 
$pers = $_SESSION['pers'];
$opm = $_SESSION['opm'];
$kof1 = $_SESSION['kof1'];
$kof2 = $_SESSION['kof2'];
$lunch = $_SESSION['lun'];
$koffie = $_SESSION['koffie'];
$koek = $_SESSION['koek'];
$eten = $_SESSION['eten'];
 
$message="";
$domain = 'test.com';
$message = '<p> Wijziging reservering vergaderruimte:'. $lok . '</p>';

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

//Create Email Headers
$dat2 = date("d-m-Y",strtotime($dat));
$dat3 = date("Y-m-d",strtotime($dat));
$dat1 = date("Ymd",strtotime($dat));          
$startTime = $dat1 . "T" . $begin . "00"; $newstart = str_replace('.','',$startTime);
$endTime = $dat1 . "T" . $eind . ".00"; $newend = str_replace('.','',$endTime);        
$subject = "wijziging";              
$location = $lok;
$stat = "Wijziging";
$sql2=<<<EOF
UPDATE $lok SET Datum = '$dat3', Begin= '$begin1', Eind = '$eind1', Project = '$proj', Koffie1 = '$kof1', Koffie2 = '$kof2' , Lunch = '$lunch', Personen = '$pers', Info = '$info', Status = '$stat' , Koffie = '$koffie', Koek = '$koek', Eten = '$eten' WHERE id = '$id';
EOF;
$ret2 = $db->exec($sql2);
   if(!$ret2) {
      echo $db->lastErrorMsg();
   } else {
      
   }
$sql3=<<<EOF
UPDATE Totaal SET Datum = '$dat3', Begin= '$begin1', Eind = '$eind1', Project = '$proj', Koffie1 = '$kof1', Koffie2 = '$kof2' , Lunch = '$lunch', Personen = '$pers', Info = '$info', Status = '$stat' , Koffie = '$koffie', Koek = '$koek', Eten = '$eten' WHERE id = '$id';
EOF;
$ret3 = $db->exec($sql3);
   if(!$ret3) {
      echo $db->lastErrorMsg();
   } else {
      
   }

//Create Email Body (HTML)
$message .= '<p>Locatie '.$lok.'</p>';
$message .= '<p>Datum '.$dat2.'</p>';
$message .= '<p>Begintijd '.$begin.'</p>';
$message .= '<p>Eindtijd '.$eind.'</p>';
$message .= '<a href = https://www.spinlink.nl/zaalverhuur/reject.php?datum='.$dat3.'&mail='.$madres.'&begin='.$begin.'&eind='.$eind.'&lok='.$lok.'&uniek='.$resid.'&inhoud='.$inhoud.'>Keur deze wijziging af</a><br>';
$message .= '<a href = https://www.spinlink.nl/zaalverhuur/agree.php?datum='.$dat3.'&mail='.$madres.'&begin='.$begin.'&eind='.$eind.'&lok='.$lok.'&uniek='.$resid.'&inhoud='.$inhoud.'>Keur deze wijziging goed</a><br>';
$event = array();
$event = array(
	'id' => $resid,
	'title' => "Wijziging reservering vergaderzaal :". $lok,
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
UID:' . $resid . '
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

$mail->Subject = "Wijziging reservering vergaderzaal";
$mail->Body = $message;

$mail->AltBody = 'Reservering '.$id.', '.$dat2.',  Begintijd '.$begin.',Eindtijd '.$eind.',Contactpersoon: '.$naam.',Email:  '.$email.',Telefoon:  '.$telf.',Kostenplaats:  '.$kpl.',Project:  '.$proj.',Opmerking:  '.$opm.',Aantal personen:  '.$pers;
//Your manually created ical code

	$res = "reserveer.ics";

$mail->addStringAttachment($ical,$res,'base64','text/calendar');

try {
    $mail->send();
	echo "Wijziging verstuurd";
   //echo "<script type=\"text/javascript\" charset=\"utf-8\">window.opener.location.reload();window.self.close()</script>";
	
} catch (Exception $e) {
    echo "Mailer Error: " . $mail->ErrorInfo;
}	



?>
