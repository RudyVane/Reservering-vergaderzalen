<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/PHPMailer/src/Exception.php';
require 'PHPMailer/PHPMailer/src/PHPMailer.php';

session_start();
$kof = "";
$koe = "";
$koffie = "";
$koek = ""; 
$lunch1="";
$kofx = "";
$lunx = "";
$kox = "nee";
$koex = "nee";
$lux = "nee";
$info = array();
$dates = array();
$start = array();
$ends = array();
$lunch = array();
$dates = $_SESSION['dates'];
$start = $_SESSION['start'];
$ends = $_SESSION['ends'];
$info =	$_SESSION['info'];
$maand = $_SESSION['maand'];
$lunch = $_SESSION['lunch'];
$lu = $_SESSION['lu'];
$rep = $_SESSION['rep']; 
$lok = $_SESSION['lok']; 
$kofx = $_SESSION['kofx']; 
$lunx = $_SESSION['lunx']; 
$koffie = $info[0];if($koffie=="koffie"){$kof="Koffie/thee";$kox = "ja";}
$koek = $info[1];if($koek=="koek"){$koe="|Koek/cake|";$koex = "ja";}
$naam = $info[2];
$email = $info[3];
$kpl = $info[4];
$telf = $info[5];
$proj = $info[6];
$opm = $info[7];
$pers = $info[8];
$tel = $info[9]; 
$opst1 = $info[10];
$lokmail = "r.vane@werkpro.nl";

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
if($lu == "lunch") {
$lux = "ja";
$lu61 = $lunch[6];
$lu71 = $lunch[7];
$lu81 = $lunch[8];
$lu91 = $lunch[9];
$lu101 = $lunch[10];
$lu111 = $lunch[11];
$lu121 = $lunch[12];
$luntd = $lunch[2];

if ($lunch[2] != "") {$lu1 = "/Lunch:";}
if ($lunch[3] != "") {$lu3 = "/lunch1:";}
if ($lunch[4] != "") {$lu4 = "/lunch2:";}
if ($lunch[5] != "") {$lu5 = "/lunch3:";}
if ($lunch[6] != "") {$lu6 = "/ham:";}
if ($lunch[7] != "") {$lu7 = "/kaas:";}
if ($lunch[8] != "") {$lu8 ="/gezond:";}
if ($lunch[9] != "") {$lu9 = "/kroket:";}
if ($lunch[10] != "") {$lu10 = "/gehaktbal:";}
if ($lunch[11] != "") {$lu11 = "/melk";}
if ($lunch[12] != "") {$lu12 = "/chocomel:";}
if ($lunch[6] == "") {$lu61 = "";}
if ($lunch[7] == "") {$lu71 = "";}
if ($lunch[8] == "") {$lu81 = "";}
if ($lunch[9] == "") {$lu91 = "";}
if ($lunch[10] == "") {$lu101 = "";}
if ($lunch[11] == "") {$lu111 = "";}
if ($lunch[12] == "") {$lu121 = "";}
if ($opst1 == "") {$opst = "";} else {$opst = "Opstelling:_";}
}
if($koffie == "koffie") {
	$koffie1 = "Koffie1:";
	$koffie2 = "/Koffie2:";
	$koftd1 = $lunch[0];
	$koftd2 = $lunch[1];
}


$info1 = $opst . $opst1 . "/". $koffie1 . $lunch[0] . $koffie2 . $lunch[1] . $koe . $lu1 . $lunch[2] . $lu3 . $lunch[3] . $lu4 . $lunch[4] . $lu5 . $lunch[5] . $lu6 . $lu61 . $lu7 . $lu71 . $lu8 . $lu81 . $lu9 . $lu91 . $lu10 . $lu101 . $lu11 . $lu111 . $lu12 . $lu121 . "/". $opm;
$info2 = $koffie1 . $lunch[0] . $koffie2 . $lunch[1] . $koe . $lu1 . $lunch[2] . $lu3 . $lunch[3] . $lu4 . $lunch[4] . $lu5 . $lunch[5] . $lu6 . $lu61 . $lu7 . $lu71 . $lu8 . $lu81 . $lu9 . $lu91 . $lu10 . $lu101 . $lu11 . $lu111 . $lu12 . $lu121 . "/". $opm;
$lunch1 = $info2;
$info3 = $opst . $opst1 . "/". $lu3 . $lunch[3] . $lu4 . $lunch[4] . $lu5 . $lunch[5] . $lu6 . $lu61 . $lu7 . $lu71 . $lu8 . $lu81 . $lu9 . $lu91 . $lu10 . $lu101 . $lu11 . $lu111 . $lu12 . $lu121 . "/". $opm;

$inhoud = $lok . "/" . $kpl . "/" . $proj . $info1 . "/opmerking:" . $opm . "/contactpersoon:" . $naam . "/" . $email . "/" . $telf . "/" . $opst1;



if($rep == "dag") { 
$x = count($dates);
for($y = 0; $y <= $x-1; $y++){	
$message="";
$domain = 'test.com';
$message = '<p>Reservering vergaderruimte:</p>';
$dat = $dates[$y];
$begin = $start[$y];
$eind = $ends[$y];
$begin1=str_replace(".",":",$begin);
$eind1=str_replace(".",":",$eind);
//Create Email Headers
$dat2 = date("d-m-Y",strtotime($dat));
$dat1 = date("Ymd",strtotime($dat));          
$startTime = $dat1 . "T" . $begin . "00"; $newstart = str_replace('.','',$startTime);
$endTime = $dat1 . "T" . $eind . ".00"; $newend = str_replace('.','',$endTime);        
$subject = $proj . " / " . $kpl;              
$location = $lok;
$desc = $inhoud;
$id = 'd8fefcc9-a576-4432-8b20-40e90889affd'.$newstart.$y;
$stat = "Aanvraag";
$sql1=<<<EOF
INSERT INTO $lok (`Datum`,`Begin`,`Eind`,`Project`, `Koffie1`, `Koffie2`, `Lunch`, `Personen`,`Info`,`Status`,`ResId`,`Koffie`,`Koek`,`Eten`,`Opstelling`)
VALUES ('$dat', '$begin1', '$eind1', '$proj','$koftd1','$koftd2','$luntd','$pers', '$info3','$stat', '$id', '$kox', '$koex', '$lux', '$opst1');
EOF;
$ret1 = $db->exec($sql1);
  if(!$ret1) {
      echo $db->lastErrorMsg();
   } else { 
      
   }

$sql2=<<<EOF
INSERT INTO Totaal (`Lokatie`,`Datum`,`Begin`,`Eind`,`Project`, `Koffie1`, `Koffie2`, `Lunch`, `Personen`,`Info`,`Status`,`ResId`,`Koffie`,`Koek`,`Eten`,`Opstelling`)
VALUES ('$lok','$dat', '$begin1', '$eind1', '$proj','$koftd1','$koftd2','$luntd','$pers', '$info3','$stat', '$id', '$kox', '$koex', '$lux', '$opst1');
EOF;
$ret2 = $db->exec($sql2);
  if(!$ret2) {
      echo $db->lastErrorMsg();
   } else {
      
   }
//Create Email Body (HTML)
$message .= '<p>Locatie '.$lok.'</p>';
$message .= '<p>Datum '.$dat2.'</p>';
$message .= '<p>Begintijd '.$begin.'</p>';
$message .= '<p>Eindtijd '.$eind.'</p>';
$message .= '<a href = https://www.spinlink.nl/zaalverhuur/reject.php?datum='.$dat2.'&mail='.$email.'&begin='.$begin.'&eind='.$eind.'&lok='.$lok.'&uniek='.$id.'&desc='.$desc.'>Keur deze reservering af</a><br>';
$message .= '<a href = https://www.spinlink.nl/zaalverhuur/agree.php?datum='.$dat2.'&mail='.$email.'&begin='.$begin.'&eind='.$eind.'&lok='.$lok.'&uniek='.$id.'&desc='.$desc.'>Keur deze reservering goed</a><br>';
$message .= '<br><br>';
$event = array();
$event = array(
	'id' => $id,
	'title' => $proj,
    'email' => $email,
	'description' => $inhoud,
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
DTSTAMP:' . gmdate('Ymd').'T'. gmdate('His') . 'Z' . '
LOCATION:' . addslashes($event['address']) . '
DESCRIPTION:' . addslashes($event['description']) . '
SUMMARY:' . addslashes($event['title']) . '
DTSTART:' . $event['datestart'] . '
SEQUENCE:' . 0 .'
LAST-MODIFIED:' . gmdate('Ymd').'T'. gmdate('His') . 'Z' . '
END:VEVENT
END:VCALENDAR';

$message .= '<p>Code: '.$id.'</p>';
$message .= '<p>Contactpersoon: '.$naam.'</p>';
$message .= '<p>Email:  '.$email.'</p>';
$message .= '<p>Telefoon:  '.$telf.'</p>';
$message .= '<p>Kostenplaats:  '.$kpl.'</p>';
$message .= '<p>Project:  '.$proj.'</p>';
$message .= '<p>Opmerking:  '.$opm.'</p>';
$message .= '<p>Aantal personen:  '.$pers.'</p>';
$message .= '<p>Catering:  '.$lunch1.'</p>';
$message .= '<p>Opstelling:  '.$opst.'</p>';

$mail = new PHPMailer(true); //Argument true in constructor enables exceptions

//From email address and name
$mail->From = "mail@werkpro.nl";
$mail->FromName = $naam;

//To address and name
//$mail->addAddress($maillok, "WerkPro");
$mail->addAddress($lokmail, "WerkPro");

//Address to which recipient will reply
$mail->addReplyTo($email, "Reply");

//CC and BCC


//Send HTML or Plain Text email
$mail->isHTML(true);

$mail->Subject = $proj;
$mail->Body = $message;

$mail->AltBody = 'Reservering '.$id.', '.$dat2.',  Begintijd '.$begin.',Eindtijd '.$eind.',Contactpersoon: '.$naam.',Email:  '.$email.',Telefoon:  '.$telf.',Kostenplaats:  '.$kpl.',Project:  '.$proj.',Opmerking:  '.$opm.',Aantal personen:  '.$pers.',Opstelling:  '.$opst;
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
}




if($rep == "week") {
$dat = $dates[0];
$begin = $start[0];
$eind = $ends[0];	
$dat2 = date("d-m-Y",strtotime($dat));
$dat1 = date("Ymd",strtotime($dat));          
$startTime = $dat1 . "T" . $begin . "00"; $newstart = str_replace('.','',$startTime);
$endTime = $dat1 . "T" . $eind . ".00"; $newend = str_replace('.','',$endTime);        
$subject = $proj . " / " . $kpl;              
$location = $lok;
$id = 'd8fefcc9-a576-4432-8b20-40e90889affd'.$newstart;
$begin1=str_replace(".",":",$begin);
$eind1=str_replace(".",":",$eind);
for($i=0;$i<$tel;$i++){
		
	$time = strtotime($dat);
	$final = date("Y-m-d", strtotime("+".$i." week", $time));
	
$sql1=<<<EOF
INSERT INTO $lok (`Datum`,`Begin`,`Eind`,`Project`, `Koffie1`, `Koffie2`, `Lunch`, `Personen`,`Info`,`Status`,`ResId`,`Koffie`,`Koek`,`Eten`,`Opstelling`)
VALUES ('$final', '$begin1', '$eind1', '$proj','$koftd1','$koftd2','$luntd','$pers', '$info3','$stat', '$id', '$kox', '$koex', '$lux', '$opst');
EOF;
$ret1 = $db->exec($sql1);
  if(!$ret1) {
      echo $db->lastErrorMsg();
   } else {
      
   }

$sql1=<<<EOF
INSERT INTO Totaal (`Lokatie`,`Datum`,`Begin`,`Eind`,`Project`, `Koffie1`, `Koffie2`, `Lunch`, `Personen`,`Info`,`Status`,`ResId`,`Koffie`,`Koek`,`Eten`,`Opstelling`)
VALUES ('$lok','$final', '$begin1', '$eind1', '$proj','$koftd1','$koftd2','$luntd','$pers', '$info3','$stat', '$id', '$kox', '$koex', '$lux', '$opst');
EOF;
$ret1 = $db->exec($sql1);
  if(!$ret1) {
      echo $db->lastErrorMsg();
   } else {
      
   }
}  
//Create Email Body (HTML)
$message = '<p>Reservering vergaderzaal, wekelijks, '.$tel.' weken, vanaf:</p>';
$message .= '<p>Datum '.$dat2.'</p>';
$message .= '<p>Begintijd '.$begin.'</p>';
$message .= '<p>Eindtijd '.$eind.'</p>';
$message .= '<a href = https://www.spinlink.nl/zaalverhuur/reject.php?datum='.$dat2.'&mail='.$email.'&begin='.$begin.'&eind='.$eind.'&lok='.$lok.'&uniek='.$id.'&inhoud='.$inhoud.'>Keur deze reservering af</a><br>';
$message .= '<a href = https://www.spinlink.nl/zaalverhuur/agree.php?datum='.$dat2.'&mail='.$email.'&begin='.$begin.'&eind='.$eind.'&lok='.$lok.'&uniek='.$id.'&inhoud='.$inhoud.'>Keur deze reservering goed</a><br>';
$message .= '<br><br>';
$message .= '<p>Code: '.$id.'</p>';
$message .= '<p>Contactpersoon: '.$naam.'</p>';
$message .= '<p>Email:  '.$email.'</p>';
$message .= '<p>Telefoon:  '.$telf.'</p>';
$message .= '<p>Kostenplaats:  '.$kpl.'</p>';
$message .= '<p>Project:  '.$proj.'</p>';
$message .= '<p>Opmerking:  '.$opm.'</p>';
$message .= '<p>Aantal personen:  '.$pers.'</p>';
$message .= '<p>Catering:  '.$lunch1.'</p>';
$message .= '<p>Opstelling:  '.$opst.'</p>';
$event = array(
	'id' => $id,
	'title' => $inhoud,
    'email' => $email,
	'description' => $kpl,
	'datestart' => $newstart,
	'dateend' => $newend,
	'address' => $location
);

$ical = 'BEGIN:VCALENDAR
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
RRULE:FREQ=WEEKLY;INTERVAL=1;COUNT=' . $tel . '

END:VEVENT
END:VCALENDAR';



$mail = new PHPMailer(true); //Argument true in constructor enables exceptions

//From email address and name
$mail->From = "mail@werkpro.nl";
$mail->FromName = $naam;

//To address and name
//$mail->addAddress($maillok, "WerkPro");
$mail->addAddress($lokmail, "WerkPro");
//Address to which recipient will reply
$mail->addReplyTo($email, "Reply");

//CC and BCC


//Send HTML or Plain Text email
$mail->isHTML(true);

$mail->Subject = $proj;
$mail->Body = $message;

$mail->AltBody = $id.'Wekelijks, '.$tel.' weken, Vanaf '.$dat2.',  Begintijd '.$begin.',Eindtijd '.$eind.',Contactpersoon: '.$naam.',Email:  '.$email.',Telefoon:  '.$telf.',Kostenplaats:  '.$kpl.',Project:  '.$proj.',Opmerking:  '.$opm.',Aantal personen:  '.$pers.',Opstelling:  '.$opst;
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



if($rep == "maand") {
$num = $maand[0];echo $num;
$dag = $maand[1];echo $dag;
$dd = $maand[2];echo $dd;
$dat = $dates[0];
$begin = $start[0];
$eind = $ends[0];
$dat2 = date("d-m-Y",strtotime($dat));
$dat1 = date("Ymd",strtotime($dat)); 
$begin1=str_replace(".",":",$begin);
$eind1=str_replace(".",":",$eind);
if($num == "1e"){$num1="first";}
if($num == "2e"){$num1="second";}
if($num == "3e"){$num1="third";}
if($num == "4e"){$num1="fourth";}
if($dd == "MO"){$dd1="monday";}
if($dd == "TU"){$dd1="tuesday";}
if($dd == "WE"){$dd1="wednesday";}
if($dd == "TH"){$dd1="thirsday";}
if($dd == "FR"){$dd1="friday";}
if($dd == "SA"){$dd1="saturday";}
if($dd == "SU"){$dd1="sunday";}
          
$startTime = $dat1 . "T" . $begin . "00"; $newstart = str_replace('.','',$startTime);
$endTime = $dat1 . "T" . $eind . ".00"; $newend = str_replace('.','',$endTime);        
$subject = $proj . " / " . $kpl;              
$location = $lok;
$id = 'd8fefcc9-a576-4432-8b20-40e90889affd'.$newstart;

for($i=0;$i<$tel;$i++){
	$time1 = strtotime($dat);
	$final1 = date("Y-m-d", strtotime("+".$i." month", $time1));
$d = DateTime::createFromFormat("Y-m-d",$final1);
$mnd1 = $d->format("Y-m");
$datmnd = date("Y-m-d", strtotime($num1." ".$dd1." ". $mnd1));	
	
$sql1=<<<EOF
INSERT INTO $lok (`Datum`,`Begin`,`Eind`,`Project`, `Koffie1`, `Koffie2`, `Lunch`, `Personen`,`Info`,`Status`,`ResId`,`Koffie`,`Koek`,`Eten`,`Opstelling`)
VALUES ('$datmnd', '$begin1', '$eind1', '$proj','$koftd1','$koftd2','$luntd','$pers', '$info3','$stat', '$id', '$kox', '$koex', '$lux', '$opst');
EOF;
$ret1 = $db->exec($sql1);
  if(!$ret1) {
      echo $db->lastErrorMsg();
   } else {
      
   }

$sql1=<<<EOF
INSERT INTO Totaal (`Lokatie`,`Datum`,`Begin`,`Eind`,`Project`, `Koffie1`, `Koffie2`, `Lunch`, `Personen`,`Info`,`Status`,`ResId`,`Koffie`,`Koek`,`Eten`,`Opstelling`)
VALUES ('$lok','$datmnd', '$begin1', '$eind1', '$proj','$koftd1','$koftd2','$luntd','$pers', '$info3','$stat', '$id', '$kox', '$koex', '$lux', '$opst');
EOF;
$ret1 = $db->exec($sql1);
  if(!$ret1) {
      echo $db->lastErrorMsg();
   } else {
      
   }
} 
//Create Email Body (HTML)
$message = '<p>Reservering vergaderzaal, maandelijks, ' .$tel. ' maanden, elke ' .$num. ' ' .$dag. ' vanaf:</p>';
$message .= '<p>Datum '.$dat2.'</p>';
$message .= '<p>Begintijd '.$begin.'</p>';
$message .= '<p>Eindtijd '.$eind.'</p>';
$message .= '<a href = https://www.spinlink.nl/zaalverhuur/reject.php?datum='.$dat2.'&mail='.$email.'&begin='.$begin.'&eind='.$eind.'&lok='.$lok.'&uniek='.$id.'&inhoud='.$inhoud.'>Keur deze reservering af</a><br>';
$message .= '<a href = https://www.spinlink.nl/zaalverhuur/agree.php?datum='.$dat2.'&mail='.$email.'&begin='.$begin.'&eind='.$eind.'&lok='.$lok.'&uniek='.$id.'&inhoud='.$inhoud.'>Keur deze reservering goed</a><br>';
$message .= '<br><br>';
$message .= '<p>Code: '.$id.'</p>';
$message .= '<p>Contactpersoon: '.$naam.'</p>';
$message .= '<p>Email:  '.$email.'</p>';
$message .= '<p>Telefoon:  '.$telf.'</p>';
$message .= '<p>Kostenplaats:  '.$kpl.'</p>'; 
$message .= '<p>Project:  '.$proj.'</p>';
$message .= '<p>Opmerking:  '.$opm.'</p>';
$message .= '<p>Aantal personen:  '.$pers.'</p>';
$message .= '<p>Catering:  '.$lunch1.'</p>';
$message .= '<p>Opstelling:  '.$opst.'</p>';
$event = array(
	'id' => $id,
	'title' => $inhoud,
    'email' => $email,
	'description' => $kpl,
	'datestart' => $newstart,
	'dateend' => $newend,
	'address' => $location
);
$ical = 'BEGIN:VCALENDAR
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
RRULE:FREQ=MONTHLY;BYSETPOS=' . $num . ';BYDAY=' . $dd . ';INTERVAL=1;COUNT=' . $tel . '
END:VEVENT
END:VCALENDAR';



$mail = new PHPMailer(true); //Argument true in constructor enables exceptions

//From email address and name
$mail->From = "mail@werkpro.nl";
$mail->FromName = $naam;

//To address and name
//$mail->addAddress($maillok, "WerkPro");
$mail->addAddress($lokmail, "WerkPro");
//Address to which recipient will reply
$mail->addReplyTo($email, "Reply");

//CC and BCC


//Send HTML or Plain Text email
$mail->isHTML(true);

$mail->Subject = $proj;
$mail->Body = $message;
$mail->AltBody = $id.'maandelijks, '.$tel.' maanden, Vanaf '.$dat2.',  Begintijd '.$begin.',Eindtijd '.$eind.',Contactpersoon: '.$naam.',Email:  '.$email.',Telefoon:  '.$telf.',Kostenplaats:  '.$kpl.',Project:  '.$proj.',Opmerking:  '.$opm.',Aantal personen:  '.$pers.',Opstelling:  '.$opst;
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
















