<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/PHPMailer/src/Exception.php';
require 'PHPMailer/PHPMailer/src/PHPMailer.php';

session_start();

$naam = $_SESSION['naam'];
$email = $_SESSION['email'] ;
$kpl = $_SESSION['kpl'];
$telf = $_SESSION['telf'];
$proj = $_SESSION['proj'];
$opm = $_SESSION['opm'];
$pers = $_SESSION['pers'];
$cat = $_SESSION['cat'];
$tel = $_SESSION['x'];
$begin = $_SESSION['begin'];
$eind = $_SESSION['eind'];
$dat = $_SESSION['dat'];
$message = '<p>Reservering vergaderruimte</p>';





//Create Email Headers

$dat1 = date("Ymd",strtotime($dat));      
$startTime = $dat1 . "T" . $begin . "00Z"; $newstart = str_replace('.','',$startTime);
$endTime = $dat1 . "T" . $eind . ".00Z"; $newend = str_replace('.','',$endTime);        
$subject = $proj . " / " . $kpl;              
$location = "Protonstraat 6";
//Create Email Body (HTML)

$message .= '<p>Datum '.$dat.'</p>';
$message .= '<p>Begintijd '.$begin.'</p>';
$message .= '<p>Eindtijd '.$eind.'</p>';
$message .= '<p>Contactpersoon: '.$naam.'</p>';
$message .= '<p>Email:  '.$email.'</p>';
$message .= '<p>Telefoon:  '.$telf.'</p>';
$message .= '<p>Kostenplaats:  '.$kpl.'</p>';
$message .= '<p>Project:  '.$proj.'</p>';
$message .= '<p>Opmerking:  '.$opm.'</p>';
$message .= '<p>Aantal personen:  '.$pers.'</p>';
$message .= '<p>Catering:  '.$cat.'</p>';

$event = array(
	'id' => "123".$a,
	'title' => $proj,
        'email' => $email,
	'description' => $kpl,
	'datestart' => $newstart,
	'dateend' => $newend,
	'address' => $location,
);
$id = "http://www.icalmaker.com/event/d8fefcc9-a576-4432-8b20-40e90889affd";

$ical = 'BEGIN:VCALENDAR
VERSION:2.0
PRODID://Drupal iCal API//EN
BEGIN:VEVENT
DTEND:' . $event['dateend'] . '
UID:' . $id . '
DTSTAMP:' . gmdate('Ymd').'T'. gmdate('His') . 'Z' . '
LOCATION:' . $event['address'] . '
DESCRIPTION:' . addslashes($event['description']) . '
SUMMARY:' . addslashes($event['title']) . '
DTSTART:' . $event['datestart'] .  '
RRULE:COUNT=' . $tel . '

END:VEVENT
END:VCALENDAR';




$mail = new PHPMailer(true); //Argument true in constructor enables exceptions

//From email address and name
$mail->From = "mail@spinlink.nl";
$mail->FromName = "Rudy";

//To address and name
//$mail->addAddress("TrainingsruimteProton@werkpro.nl", "Niels");
$mail->addAddress("spinlinktest@outlook.com", "test");

//Address to which recipient will reply
$mail->addReplyTo("Spinlinktest@outlook.com", "Reply");

//CC and BCC


//Send HTML or Plain Text email
$mail->isHTML(true);

$mail->Subject = $proj;
$mail->Body = $message;

$mail->AltBody = 'Wekelijks, '.$week.' weken, Vanaf '.$dat.',  Begintijd '.$begin.',Eindtijd '.$eind.',Contactpersoon: '.$naam.',Email:  '.$email.',Telefoon:  '.$telf.',Kostenplaats:  '.$kpl.',Project:  '.$proj.',Opmerking:  '.$opm.',Aantal personen:  '.$pers.',Catering:  '.$cat;
//Your manually created ical code

	$res = "reserveer.ics";
$res = "reserveer.ics";
$mail->addStringAttachment($ical,$res,'base64','text/calendar');


    $mail->send();
    echo "Message has been sent successfully";
	



?>
