<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/PHPMailer/src/Exception.php';
require 'PHPMailer/PHPMailer/src/PHPMailer.php';

session_start();
$info = array();
$dates = array();
$lunch = array();
$lunch = $_SESSION['lunch'];
$dates = $_SESSION['dates'];
$info =	$_SESSION['info'];
$koffie = $info[0];if($koffie="on"){$kof="Koffie/thee";}
$koek = $info[1];if($koek="on"){$koe="Koekjes/cake";}
$naam = $info[2];
$email = $info[3];
$kpl = $info[4];
$telf = $info[5];
$proj = $info[6];
$opm = $info[7];
$pers = $info[8];
$tel = $info[9];
$lunch1 = ", Broodjes: ham:" . $lunch[0] . "/ kaas:" . $lunch[1] . "/ gezond:" . $lunch[2] . "/ kroket:" . $lunch[3] . "/ gehaktbal:" . $lunch[4] . "/ melk:" . $lunch[5];
$cat = $kof . " / " . $koe . $lunch1;
$message="";
$domain = 'test.com';
$message = '<p>Reservering vergaderruimte:</p>';

$inhoud = $kpl . ", " . $proj . ", aantal personen: " . $pers . ", catering: " . $cat . ", opmerking: " . $opm . ", contactpersoon: " . $naam . ", " . $email . ", " . $telf;
for($y = 1; $y <= $week; $y+3){
	
$dat = $dates[$y-1];
$begin = $dates[$y];
$eind = $dates[$y+1];
//Create Email Headers
$dat2 = date("d-m-Y",strtotime($dat));
$dat1 = date("Ymd",strtotime($dat));          
$startTime = $dat1 . "T" . $begin . "00"; $newstart = str_replace('.','',$startTime);
$endTime = $dat1 . "T" . $eind . ".00"; $newend = str_replace('.','',$endTime);        
$subject = $proj . " / " . $kpl;              
$location = "Protonstraat 6";

//Create Email Body (HTML)

$message .= '<p>Datum '.$dat2.'</p>';
$message .= '<p>Begintijd '.$begin.'</p>';
$message .= '<p>Eindtijd '.$eind.'</p>';
$message .= '<a href = https://www.spinlink.nl/Vergaderzaal/reject.php?datum='.$dat2.'&mail='.$email.'&begin='.$begin.'&eind='.$eind.'>Keur deze reservering af</a><br>';

$message .= '<br><br>';
$event = array();
$event = array(
	'id' => $newstart,
	'title' => $inhoud,
    'email' => $email,
	'description' => $kpl,
	'datestart' => $newstart,
	'dateend' => $newend,
	'address' => $location
);
$id = 'd8fefcc9-a576-4432-8b20-40e90889affd'.$newstart.$y;
${ical.$y} = 'BEGIN:VCALENDAR
VERSION:2.0
PRODID://Drupal iCal API//EN
BEGIN:VEVENT
DTEND:' . $event['dateend'] . '
UID:' . $id . '
DTSTAMP:' . gmdate('Ymd').'T'. gmdate('His') . 'Z' . '
LOCATION:' . addslashes($event['address']) . '
DESCRIPTION:' . addslashes($event['description']) . '
SUMMARY:' . addslashes($event['title']) . '
DTSTART:' . $event['datestart'] . '
END:VEVENT
END:VCALENDAR';

}
$message .= '<p>Contactpersoon: '.$naam.'</p>';
$message .= '<p>Email:  '.$email.'</p>';
$message .= '<p>Telefoon:  '.$telf.'</p>';
$message .= '<p>Kostenplaats:  '.$kpl.'</p>';
$message .= '<p>Project:  '.$proj.'</p>';
$message .= '<p>Opmerking:  '.$opm.'</p>';
$message .= '<p>Aantal personen:  '.$pers.'</p>';
$message .= '<p>Catering:  '.$cat.'</p>';
$mail = new PHPMailer(true); //Argument true in constructor enables exceptions

//From email address and name
$mail->From = "mail@spinlink.nl";
$mail->FromName = $naam;

//To address and name
//$mail->addAddress("TrainingsruimteProton@werkpro.nl", "Niels");
$mail->addAddress("N.deJager@werkpro.nl", "Niels");

//Address to which recipient will reply
$mail->addReplyTo($email, "Reply");

//CC and BCC


//Send HTML or Plain Text email
$mail->isHTML(true);

$mail->Subject = $proj;
$mail->Body = $message;

$mail->AltBody = 'Reservering, '.$dat2.',  Begintijd '.$begin.',Eindtijd '.$eind.',Contactpersoon: '.$naam.',Email:  '.$email.',Telefoon:  '.$telf.',Kostenplaats:  '.$kpl.',Project:  '.$proj.',Opmerking:  '.$opm.',Aantal personen:  '.$pers.',Catering:  '.$cat;
//Your manually created ical code
for($a = 1; $a <= $week; $a++){
	${res.$a} = "reserveer.ics";

$mail->addStringAttachment(${ical.$a},${res.$a},'base64','text/calendar');
}
try {
    //$mail->send();
    
	
} catch (Exception $e) {
    echo "Mailer Error: " . $mail->ErrorInfo;
}	

	echo $inhoud;
//echo "<script type=\"text/javascript\" charset=\"utf-8\">window.opener.location.reload();window.self.close()</script>";

?>
