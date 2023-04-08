<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/PHPMailer/src/Exception.php';
require 'PHPMailer/PHPMailer/src/PHPMailer.php';

session_start();
$aantal = $_POST["x"];
$_SESSION['x'] = $aantal;

?>

<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
<title>Reserveer vergaderzaal</title>
<link rel="stylesheet" type="text/css" href="stylessl.css">

<style>
#bg-image {
    height: 100%;
    width: 100%;
    position: absolute;
    background-color: #88CFBE;
    background-position: center center;
    background-repeat: no-repeat;
    background-size: 100% 100%;
	
    opacity: 0.6;
}
#tijd{
 width:120px; 
 font-size:18px; 
}
input[type="submit"]{
    border-radius: 10px;
    border: none;
	background-color: #88CFBE;
    box-shadow: none;
    font-family: inherit;
    font-size: 24px;
}
.button {
  background-color: #88CFBE;
  border: none;
  color: #333;
  width: 500px;
  padding: 1px 1px;
  text-align: center;
  text-decoration: none;
  display: block;
  font-size: 12px;
}
textarea {
	width:500px;
}
input {
	font-size:18px;
	border: 1px solid #88CFBE;
}
td {
	font-size:2vw;
}		
a {
	color: #88CFBE;
}
p {
	font-size:3vw;
	color:#000000;
}
p2 {
	font-size:2vw;
	color:#000000;
}
@media screen and (max-width: 600px) {
	
#tijd{
 width:120px; 
 font-size:12px; 
}
p {
	font-size:4vw;
	color:#000000;
}
p1 {
	font-size:4vw;
	color:#88CFBE;
}
p2 {
	font-size:4vw;
	color:#000000;
}
h9 {
	font-size:6vw;
}
a {
	font-size:2vw;
}
td {
	font-size:4vw;
}
input {
	font-size:16px;
}
	.btn-group .button {
  background-color: white;
  border: 1px solid #88CFBE;
  color: #333;
  
  text-align: left;
  text-decoration: none;
  font-size: 3vw;
  cursor: pointer;
  width: 25%;
  
  display: block;
	}
.btn-mail .button{
  background-color: #88CFBE;
  border: none;
  color: #333;
  width: 200px;
  padding: 1px 1px;
  text-align: center;
  text-decoration: none;
  display: block;
  font-size: 12px;
}
textarea {
	width:200px;
}
.outside-while{
        border:1px solid #a6a6a6;font-size:1vw;font-weight:500;
		color:#a6a6a6;
		text-align: center;
    }
.inside-while{
        border:1px solid #a6a6a6;
		color:#a6a6a6;
		font-size:2.5vw;
		font-weight:500;
		text-align: center;
    }	
}
</style> 

</head>
<body >
<div id="bg-image"></div>
<div class = "container" style="position: absolute;top:2%;left: 10%; text-align:left; ">
<br>

<form action = "" method ="POST">
<p>Aantal maanden: <?php echo $aantal ?></p>
<p>Kies datum eerste reservering</p>
<input type = "date" onkeydown="return false" name = "datum"/><br>
<table>
<tr>
<td><p>Begintijd<br>
<SELECT NAME="begin" id = "tijd"> 
<OPTION VALUE="09.00">09.00</OPTION>
<OPTION VALUE="09.15">09.15</OPTION>
<OPTION VALUE="09.30">09.30</OPTION>
<OPTION VALUE="09.45">09.45</OPTION>
<OPTION VALUE="10.00">10.00</OPTION>
<OPTION VALUE="10.15">10.15</OPTION>
<OPTION VALUE="10.30">10.30</OPTION>
<OPTION VALUE="10.45">10.45</OPTION>
<OPTION VALUE="11.00">11.00</OPTION>
<OPTION VALUE="11.15">11.15</OPTION>
<OPTION VALUE="11.30">11.30</OPTION>
<OPTION VALUE="11.45">11.45</OPTION>
<OPTION VALUE="12.00">12.00</OPTION>
<OPTION VALUE="12.15">12.15</OPTION>
<OPTION VALUE="12.30">12.30</OPTION>
<OPTION VALUE="12.45">12.45</OPTION>
<OPTION VALUE="13.00">13.00</OPTION>
<OPTION VALUE="13.15">13.15</OPTION>
<OPTION VALUE="13.30">13.30</OPTION>
<OPTION VALUE="13.45">13.45</OPTION>
<OPTION VALUE="14.00">14.00</OPTION>
<OPTION VALUE="14.15">14.15</OPTION>
<OPTION VALUE="14.30">14.30</OPTION>
<OPTION VALUE="14.45">14.45</OPTION>
<OPTION VALUE="15.00">15.00</OPTION>
<OPTION VALUE="15.15">15.15</OPTION>
<OPTION VALUE="15.30">15.30</OPTION>
<OPTION VALUE="15.45">15.45</OPTION>
<OPTION VALUE="16.00">16.00</OPTION>
<OPTION VALUE="16.15">16.15</OPTION>
<OPTION VALUE="16.30">16.30</OPTION>
<OPTION VALUE="16.45">16.45</OPTION>
<OPTION VALUE="17.00">17.00</OPTION>
<OPTION VALUE="17.15">17.15</OPTION>
<OPTION VALUE="17.30">17.30</OPTION>
<OPTION VALUE="17.45">17.45</OPTION>
<OPTION VALUE="18.00">18.00</OPTION>
</SELECT></td><br>
<td></td> <td></td> <td></td> <td></td>         
<td><p>Eindtijd<br>
<SELECT NAME="eind" id = "tijd"> 
<OPTION VALUE="09.30">09.30</OPTION>
<OPTION VALUE="09.45">09.45</OPTION>
<OPTION VALUE="10.00">10.00</OPTION>
<OPTION VALUE="10.15">10.15</OPTION>
<OPTION VALUE="10.30">10.30</OPTION>
<OPTION VALUE="10.45">10.45</OPTION>
<OPTION VALUE="11.00">11.00</OPTION>
<OPTION VALUE="11.15">11.15</OPTION>
<OPTION VALUE="11.30">11.30</OPTION>
<OPTION VALUE="11.45">11.45</OPTION>
<OPTION VALUE="12.00">12.00</OPTION>
<OPTION VALUE="12.15">12.15</OPTION>
<OPTION VALUE="12.30">12.30</OPTION>
<OPTION VALUE="12.45">12.45</OPTION>
<OPTION VALUE="13.00">13.00</OPTION>
<OPTION VALUE="13.15">13.15</OPTION>
<OPTION VALUE="13.30">13.30</OPTION>
<OPTION VALUE="13.45">13.45</OPTION>
<OPTION VALUE="14.00">14.00</OPTION>
<OPTION VALUE="14.15">14.15</OPTION>
<OPTION VALUE="14.30">14.30</OPTION>
<OPTION VALUE="14.45">14.45</OPTION>
<OPTION VALUE="15.00">15.00</OPTION>
<OPTION VALUE="15.15">15.15</OPTION>
<OPTION VALUE="15.30">15.30</OPTION>
<OPTION VALUE="15.45">15.45</OPTION>
<OPTION VALUE="16.00">16.00</OPTION>
<OPTION VALUE="16.15">16.15</OPTION>
<OPTION VALUE="16.30">16.30</OPTION>
<OPTION VALUE="16.45">16.45</OPTION>
<OPTION VALUE="17.00">17.00</OPTION>
<OPTION VALUE="17.15">17.15</OPTION>
<OPTION VALUE="17.30">17.30</OPTION>
<OPTION VALUE="17.45">17.45</OPTION>
<OPTION VALUE="18.00">18.00</OPTION>
</SELECT></td>
</tr></table>



<table>
<tr>
<td><p>Elke<br>
<SELECT NAME="num" id = "tijd"> 
<OPTION VALUE="1e">1e</OPTION>
<OPTION VALUE="2e">2e</OPTION>
<OPTION VALUE="3e">3e</OPTION>
<OPTION VALUE="4e">4e</OPTION>
</SELECT></td><br>
<td></td> <td></td> <td></td> <td></td>         
<td><p>Weekdag<br>
<SELECT NAME="dag" id = "tijd"> 
<OPTION VALUE="maandag">maandag</OPTION>
<OPTION VALUE="dinsdag">dinsdag</OPTION>
<OPTION VALUE="woensdag">woensdag</OPTION>
<OPTION VALUE="donderdag">donderdag</OPTION>
<OPTION VALUE="vrijdag">vrijdag</OPTION>
</SELECT></td>
</tr></table>
<p style="color:#FF0000;">
<input type="text" name="week" value="<?php echo $aantal;?>" hidden /><br>
<input type="text" name="kpl" size="40%" placeholder = "kostenplaats" required />*<br>
<input type="text" name="proj" size="40%" placeholder = "project" required />*<br>
<input type="text" name="naam" size="40%" placeholder = "uw naam" required />*<br>
<input type="text" name="mail" size="40%" placeholder = "uw emailadres" required />*<br>
<input type="text" name="telf" size="40%" placeholder = "uw mobiele telefoonnummer" required />*<br>
<input type="text" name="opm" size="40%" placeholder = "eventuele opmerkingen" /><br>
<input type="text" name="pers" size="40" placeholder = "aantal personen" /><br>
<input type="text" name="cat" size="40%" placeholder = "wat heeft u nodig? bv. koffie, thee, broodjes" /><br><br>
<input type="submit" name="Verzenden" value="Verzenden" /><br><br>
</form>
</p>
				
<?php

if(isset($_POST['Verzenden'])){
$domain = 'test.com';

$naam = htmlspecialchars($_POST["naam"]);
$email = htmlspecialchars($_POST["mail"]);
$kpl = htmlspecialchars($_POST["kpl"]);
$telf = htmlspecialchars($_POST["telf"]);
$proj = htmlspecialchars($_POST["proj"]);
$opm = htmlspecialchars($_POST["opm"]);
$pers = htmlspecialchars($_POST["pers"]);
$cat = htmlspecialchars($_POST["cat"]);	
$dat = htmlspecialchars($_POST["datum"]);
$dag = htmlspecialchars($_POST["dag"]);
if ($dag == "maandag"){$dd = "MO";}
if ($dag == "dinsdag"){$dd = "TU";}
if ($dag == "woensdag"){$dd = "WE";}
if ($dag == "donderdag"){$dd = "TH";}
if ($dag == "vrijdag"){$dd = "FR";}
$num = htmlspecialchars($_POST["num"]);
$begin = htmlspecialchars($_POST["begin"]);
$eind = htmlspecialchars($_POST["eind"]);
$week = htmlspecialchars($_POST["week"]);
//Create Email Headers
$dat2 = date("d-m-Y",strtotime($dat));
$dat1 = date("Ymd",strtotime($dat));          
$startTime = $dat1 . "T" . $begin . "00"; $newstart = str_replace('.','',$startTime);
$endTime = $dat1 . "T" . $eind . ".00"; $newend = str_replace('.','',$endTime);        
$subject = $proj . " / " . $kpl;              
$location = "Protonstraat 6";
$inhoud = $kpl . ", " . $proj . ", aantal personen: " . $pers . ", catering: " . $cat . ", opmerking: " . $opm . ", contactpersoon: " . $naam . ", " . $email . ", " . $telf;
$aantal = $_SESSION['x'];
//Create Email Body (HTML)
$message = '<p>Reservering vergaderruimte, maandelijks, ' .$week. ' maanden, elke ' .$num. ' ' .$dag. ' vanaf:</p>';
$message .= '<p>Datum '.$dat2.'</p>';
$message .= '<p>Begintijd '.$begin.'</p>';
$message .= '<p>Eindtijd '.$eind.'</p>';
$message .= '<a href = https://www.spinlink.nl/Vergaderzaal/reject.php?datum='.$dat2.'&mail='.$email.'&begin='.$begin.'&eind='.$eind.'>Keur deze reservering af</a><br>';


$message .= '<p>Contactpersoon: '.$naam.'</p>';
$message .= '<p>Email:  '.$email.'</p>';
$message .= '<p>Telefoon:  '.$telf.'</p>';
$message .= '<p>Kostenplaats:  '.$kpl.'</p>';
$message .= '<p>Project:  '.$proj.'</p>';
$message .= '<p>Opmerking:  '.$opm.'</p>';
$message .= '<p>Aantal personen:  '.$pers.'</p>';
$message .= '<p>Catering:  '.$cat.'</p>';


$event = array(
	'id' => $newstart.$z,
	'title' => $inhoud,
        'email' => $email,
	'description' => $kpl,
	'datestart' => $newstart,
	'dateend' => $newend,
	'address' => $location
);

$id = 'd8fefcc9-a576-4432-8b20-40e90889affd'.$newstart;
$ical = 'BEGIN:VCALENDAR
VERSION:2.0
PRODID://Drupal iCal API//EN
BEGIN:VEVENT
DTEND:' . $event['dateend'] . '
UID:' . $id . '
DTEND:' . $event['dateend'] . '
DTSTAMP:' . gmdate('Ymd').'T'. gmdate('His') . '
LOCATION:' . addslashes($event['address']) . '
DESCRIPTION:' . addslashes($event['description']) . '
SUMMARY:' . addslashes($event['title']) . '
DTSTART:' . $event['datestart'] . '
RRULE:FREQ=MONTHLY;BYSETPOS=' . $num . ';BYDAY=' . $dd . ';INTERVAL=1;COUNT=' . $week . '
END:VEVENT
END:VCALENDAR';



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
$mail->AltBody = 'maandelijks, '.$week.' maanden, Vanaf '.$dat2.',  Begintijd '.$begin.',Eindtijd '.$eind.',Contactpersoon: '.$naam.',Email:  '.$email.',Telefoon:  '.$telf.',Kostenplaats:  '.$kpl.',Project:  '.$proj.',Opmerking:  '.$opm.',Aantal personen:  '.$pers.',Catering:  '.$cat;
//Your manually created ical code
	$res = "reserveer.ics";
$mail->addStringAttachment($ical,$res,'base64','text/calendar');
try {
    $mail->send();
    echo "<script type=\"text/javascript\" charset=\"utf-8\">window.opener.location.reload();window.self.close()</script>";
	
} catch (Exception $e) {
    echo "Mailer Error: " . $mail->ErrorInfo;
}


}
?>

	