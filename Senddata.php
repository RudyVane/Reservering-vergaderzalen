<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/PHPMailer/src/Exception.php';
require 'PHPMailer/PHPMailer/src/PHPMailer.php';

$datum = $_GET["datum"];
$naam = $_GET["naam"]; 
$begin = $_GET["begin"]; 
$eind = $_GET["eind"];
$email = $_GET["email"]; 
$kpl = $_GET["kpl"]; 
$tel = $_GET["tel"]; 
$proj = $_GET["proj"]; 
$opm = $_GET["opm"]; 
$pers = $_GET["pers"]; 
$cat = $_GET["cat"]; 

$dat = date("d-m-Y",strtotime($datum));
$domain = 'test.com';

//Create Email Headers

$dat1 = date("Ymd",strtotime($datum));          
$startTime = $dat1 . "T" . $begin . "00"; $newstart = str_replace('.','',$startTime);
$endTime = $dat1 . "T" . $eind . ".00"; $newend = str_replace('.','',$endTime);        
$subject = $proj . " / " . $kpl;              
$location = "Protonstraat 6";
//Create Email Body (HTML)
$message = '<a href = "https://www.spinlink.nl/Vergaderzaal/agree.php?datum='.$dat.'&begin='.$begin.'&eind='.$eind.'">Bevestig afspraak in database</a>';
$message .= '<p>Datum '.$dat.'</p>';
$message .= '<p>Begintijd '.$begin.'</p>';
$message .= '<p>Eindtijd '.$eind.'</p>';
$message .= '<p>Contactpersoon: '.$naam.'</p>';
$message .= '<p>Email:  '.$email.'</p>';
$message .= '<p>Telefoon:  '.$tel.'</p>';
$message .= '<p>Kostenplaats:  '.$kpl.'</p>';
$message .= '<p>Project:  '.$proj.'</p>';
$message .= '<p>Opmerking:  '.$opm.'</p>';
$message .= '<p>Aantal personen:  '.$pers.'</p>';
$message .= '<p>Catering:  '.$cat.'</p>';



$event = array(
	'id' => "123",
	'title' => $proj,
        'email' => $email,
	'description' => $kpl,
	'datestart' => $newstart,
	'dateend' => $newend,
	'address' => "Protonstraat 6"
);

$ical = 'BEGIN:VCALENDAR
METHOD:REQUEST
VERSION:2.0
PRODID:-//hacksw/handcal//NONSGML v1.0//EN
CALSCALE:GREGORIAN
BEGIN:VEVENT
DTEND:' . $event['dateend'] . '
UID:' . md5(uniqid(mt_rand(), true)) . '@outlook.com' . '
DTSTAMP:' . gmdate('Ymd').'T'. gmdate('His') . '
LOCATION:' . addslashes($event['address']) . '
DESCRIPTION:' . addslashes($event['description']) . '
URL;VALUE=URI:https://spinlink.nl/Vergaderzaal/' . $event['id'] . '
SUMMARY:' . addslashes($event['title']) . '
DTSTART:' . $event['datestart'] . '
END:VEVENT
END:VCALENDAR';



$mail = new PHPMailer(true); //Argument true in constructor enables exceptions

//From email address and name
$mail->From = "mail@spinlink.nl";
$mail->FromName = $naam;

//To address and name
$mail->addAddress("TrainingsruimteProton@werkpro.nl", "Niels");
//$mail->addAddress("spinlinktest@outlook.com", "test");

//Address to which recipient will reply
//$mail->addReplyTo($email, "Reply");

//CC and BCC


//Send HTML or Plain Text email
$mail->isHTML(true);

$mail->Subject = $proj;
$mail->Body = $message;
$mail->AltBody = 'Datum '.$dat.',Begintijd '.$begin.',Eindtijd '.$eind.',Contactpersoon: '.$naam.',Email:  '.$email.',Telefoon:  '.$tel.',Kostenplaats:  '.$kpl.',Project:  '.$proj.',Opmerking:  '.$opm.',Aantal personen:  '.$pers.',Catering:  '.$cat;
//Your manually created ical code
$mail->addStringAttachment($ical,'reserveer.ics','base64','text/calendar');
try {
    $mail->send();
    echo "Aanvraag is succesvol verzonden";
} catch (Exception $e) {
    echo "Mailer Error: " . $mail->ErrorInfo;
}



?>