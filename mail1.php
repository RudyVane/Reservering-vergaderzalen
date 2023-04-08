<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/PHPMailer/src/Exception.php';
require 'PHPMailer/PHPMailer/src/PHPMailer.php';

session_start();
$arr = array();
$datum = $_SESSION['datum'];
$arr = explode(",",$datum);
$tel = count($arr);
$radio = $_SESSION['radio'];
class MyDB extends SQLite3
   {
      function __construct()
      {
         $this->open('Vergaderzaal.db');
      }
   }
   $db = new MyDB();
   if(!$db){
      echo $db->lastErrorMsg();
   } else {
      
   }  
	

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
    background-image: url(Gebouw.png);
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
	font-size:1vw;
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
	font-size:10px;
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

<?php

?>
<div id="bg-image"></div>
<div class = "container" style="position: absolute;top:3%;left: 1%; text-align:left;">

<img src="logotrans.png" style="width:10%;height:auto;"; class = "center">
<br>
</div>
<div class = "container" style="position: absolute;top:3%;left: 20%; text-align:left;">	
<h9>Reserveren vergaderzaal Protonstraat 6</h9>
<br><br>
<p1>Overzicht beschikbare uren 
</p1>
<p style="color:#88CFBE">(Grijs is gereserveerd)</p>
<?php 
for($z = 0; $z <= ($tel - 1);$z++){
$newdate = $arr[$z] . " 00:00:00";
$date = strtotime($newdate);  
$dat = date('d-m-Y', $date); echo $dat ?>

<?php


$uren = array("8.00","8.15","8.30","8.45","9.00","9.15","9.30","9.45","10.00","10.15","10.30","10.45","11.00","11.15","11.30","11.45","12.00","12.15","12.30","12.45","13.00","13.15","13.30","13.45","14.00","14.15","14.30","14.45","15.00","15.15","15.30","15.45","16.00","16.15","16.30","16.45","17.00","17.15","17.30","17.45","18.00");
$bezet = array();
$tijden = array();

echo "<table>";
            
$sql = "SELECT * FROM `reserveer` WHERE `Datum`= '$dat'";
$ret = $db->query($sql);
   if(!$ret) {
   echo $db->lastErrorMsg();}
	    
        while($row = $ret->fetchArray(SQLITE3_ASSOC) ){		
		
			foreach ($row as $col => $val) {
                
				array_push($tijden, $val);
			}            
        }
		
echo "<tr>";

			
for($i=2; $i <= 9; $i++){
	$color = "#ffffff"; 
	$coltxt = "#333";
	if($tijden[$i] != null){
		$coltxt = "#bdbfbd";
		array_push($bezet, $tijden[$i]);
	}
		$t = $uren[$i-2];
		    echo '<td style="color:'.$coltxt.'; background-color:'. $color.'" class="inside-while">' . $t . '</td>';
						
		}    
            echo "</tr>";
		
echo "<tr>";
			
for($i=10; $i <= 17; $i++){
	$coltxt = "#333";	
	if($tijden[$i] != null){
		$coltxt = "#bdbfbd";
		array_push($bezet, $tijden[$i]);
	}
		$t = $uren[$i-2];
		    echo '<td style="color:'.$coltxt.'; background-color:'.$color.'" class="inside-while">' . $t . '</td>';     
		}    
            echo "</tr>";	
echo "<tr>";
			
for($i=18; $i <= 25; $i++){
	$coltxt = "#333";
	if($tijden[$i] != null){
		$coltxt = "#bdbfbd";
		array_push($bezet, $tijden[$i]);
	}
		$t = $uren[$i-2];
		    echo '<td style="color:'.$coltxt.'; background-color:'.$color.'" class="inside-while">' . $t . '</td>';       
		}    
            echo "</tr>";	
		
	
echo "<tr>";
			
for($i=26; $i <= 33; $i++){
	$coltxt = "#333";
	if($tijden[$i] != null){
		$coltxt = "#bdbfbd";
		array_push($bezet, $tijden[$i]);
	}
		$t = $uren[$i-2];
		echo '<td style="color:'.$coltxt.'; background-color:'.$color.'" class="inside-while">' . $t . '</td>';     
		}    
            echo "</tr>";		
echo "<tr>";
			
for($i=34; $i <= 41; $i++){
	$coltxt = "#333";
	if($tijden[$i] != null){
		$coltxt = "#bdbfbd";
		array_push($bezet, $tijden[$i]);
	}
		$t = $uren[$i-2];
		    echo '<td style="color:'.$coltxt.'; background-color:'.$color.'" class="inside-while">' . $t . '</td>';      
		}    
            echo "</tr>";	

echo "</table>";

?>

<form action = "" method ="POST">
<table>
<tr>
<td><p>Begintijd<?php echo ($z + 1)?><br>
<SELECT NAME="begin<?php echo ($z + 1)?>" id = "tijd"> 
<OPTION VALUE="08.00">08.00</OPTION>
<OPTION VALUE="08.15">08.15</OPTION>
<OPTION VALUE="08.30">08.30</OPTION>
<OPTION VALUE="08.45">08.45</OPTION>
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
<td><p>Eindtijd<?php echo ($z + 1)?><br>
<SELECT NAME="eind<?php echo ($z + 1)?>" id = "tijd"> 
<OPTION VALUE="08.00">08.00</OPTION>
<OPTION VALUE="08.15">08.15</OPTION>
<OPTION VALUE="08.30">08.30</OPTION>
<OPTION VALUE="08.45">08.45</OPTION>
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
</SELECT></td>
</tr></table>
<br>
<?php
}
?>
<p2 style="color:#FF0000;">
<input type="text" name="kpl" size="40%" placeholder = "kostenplaats" required />*<br>
<input type="text" name="proj" size="40%" placeholder = "project" required />*<br>
<input type="text" name="naam" size="40%" placeholder = "uw naam" required />*<br>
<input type="text" name="mail" size="40%" placeholder = "uw emailadres" required />*<br>
<input type="text" name="tel" size="40%" placeholder = "uw mobiele telefoonnummer" required />*<br>
<input type="text" name="opm" size="40%" placeholder = "eventuele opmerkingen" /><br>
<input type="text" name="pers" size="40" placeholder = "aantal personen" /><br>
<input type="text" name="cat" size="40%" placeholder = "wat heeft u nodig? bv. koffie, thee, broodjes" />
<input type="submit" name="Verzenden" value="Verzenden" /><br><br>
</form>

				
<?php
if(isset($_POST['Verzenden'])){
$domain = 'test.com';
$naam = htmlspecialchars($_POST["naam"]);
$email = htmlspecialchars($_POST["mail"]);
$kpl = htmlspecialchars($_POST["kpl"]);
$telf = htmlspecialchars($_POST["tel"]);
$proj = htmlspecialchars($_POST["proj"]);
$opm = htmlspecialchars($_POST["opm"]);
$pers = htmlspecialchars($_POST["pers"]);
$cat = htmlspecialchars($_POST["cat"]);	
$tel = count($arr);						
for($z = 0; $z <= ($tel - 1);$z++){
$datarr = $arr[$z];
$dat = date("d-m-Y",strtotime($datarr));

$begin = htmlspecialchars($_POST["begin" . ($z + 1)]);
$eind = htmlspecialchars($_POST["eind" . ($z + 1)]);
//Create Email Headers

$dat1 = date("Ymd",strtotime($datarr));          
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
$message .= '<p>Telefoon:  '.$telf.'</p>';
$message .= '<p>Kostenplaats:  '.$kpl.'</p>';
$message .= '<p>Project:  '.$proj.'</p>';
$message .= '<p>Opmerking:  '.$opm.'</p>';
$message .= '<p>Aantal personen:  '.$pers.'</p>';
$message .= '<p>Catering:  '.$cat.'</p>';


$event = array(
	'id' => "123".$z,
	'title' => $proj,
        'email' => $email,
	'description' => $kpl,
	'datestart' => $newstart,
	'dateend' => $newend,
	'address' => "Protonstraat 6"
);

${ical.$z} = 'BEGIN:VCALENDAR
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

RRULE:COUNT=1

END:VEVENT
END:VCALENDAR';

}

$mail = new PHPMailer(true); //Argument true in constructor enables exceptions

//From email address and name
$mail->From = "mail@spinlink.nl";
$mail->FromName = $naam;

//To address and name
//$mail->addAddress("TrainingsruimteProton@werkpro.nl", "Niels");
$mail->addAddress("rudyvane1965@gmail.com", "test");

//Address to which recipient will reply
$mail->addReplyTo($email, "Reply");

//CC and BCC


//Send HTML or Plain Text email
$mail->isHTML(true);

$mail->Subject = $proj;
$mail->Body = $message;
$mail->AltBody = 'Datum '.$datarr[0].',Begintijd '.$begin.',Eindtijd '.$eind.',Contactpersoon: '.$naam.',Email:  '.$email.',Telefoon:  '.$telf.',Kostenplaats:  '.$kpl.',Project:  '.$proj.',Opmerking:  '.$opm.',Aantal personen:  '.$pers.',Catering:  '.$cat;
//Your manually created ical code
for($z = 0; $z <= ($tel - 1);$z++){
	$res = "reserveer" . $z . ".ics";
$mail->addStringAttachment(${ical.$z},$res,'base64','text/calendar');
}
try {
    $mail->send();
    echo "Message has been sent successfully";
	


	
} catch (Exception $e) {
    echo "Mailer Error: " . $mail->ErrorInfo;
}


}
?>

	