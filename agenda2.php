<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/PHPMailer/src/Exception.php';
require 'PHPMailer/PHPMailer/src/PHPMailer.php';

session_start();
$tel = $_POST["tel"];
$rep = $_POST["rep"];
$lok = $_POST['lok']; 
$id = $_SESSION['id'];
$_SESSION['tel'] = $tel;
$week = $_SESSION['tel'];
$_SESSION['rep'] = $rep;
$_SESSION['lok'] = $lok;
$_SESSION['id'] = $id;

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
    height: 200%;
    width: 100%;
    position: absolute;
    background-color:#489337;
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
	background-color: #489337;
    box-shadow: none;
    font-family: inherit;
    font-size: 24px;
}
.button {
  background-color: #489337;
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
	font-size:2vw;
	color:#000000;
	background-color:#88CFBE;
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
	font-size:2vw;
	color:#000000;
}
h9 {
	font-size:6vw;
}
a {
	font-size:3vw;
}
td {
	font-size:4vw;
}
input {
	font-size:16px;
}
	.btn-group .button {
  background-color: white;
  border: 1px solid #489337;
  color: #333;
  
  text-align: left;
  text-decoration: none;
  font-size: 3vw;
  cursor: pointer;
  width: 25%;
  
  display: block;
	}
.btn-mail .button{
  background-color: #489337;
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
<body>
<div id="bg-image"></div>
<div class = "container" style="position: absolute;top:2%;left: 10%; text-align:left; ">

<form method="POST" action="">
<?php
if($rep == "dag"){
for($z = 1; $z <= $tel; $z++){
	$d="datum".$z;
	?>
<p>Kies datum<?php echo $z?></p>

<input type = "date" onkeydown="return false" name = "<?php echo $d?>" required /><br>
<table>
<tr>
<td><p>Begintijd<br>
<SELECT NAME="begin<?php echo $z?>" id = "tijd"> 
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

</SELECT></td><br>
<td></td> <td></td> <td></td> <td></td>         
<td><p>Eindtijd<br>
<SELECT NAME="eind<?php echo $z?>" id = "tijd"> 
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

</SELECT></td>
</tr></table>
<br>
<?php
$_SESSION['rep1'] = $rep;
}}
if($rep == "week"){?>
	<p>Aantal weken: <?php echo $tel ?></p>
<p>Kies datum eerste week</p>
<input type = "date" onkeydown="return false" name = "datum" required /><br>
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

</SELECT></td>
</tr></table>
<?php
$_SESSION['rep1'] = $rep;
}
if($rep == "maand"){?>
<p>Aantal maanden: <?php echo $tel ?></p>
<p>Kies datum eerste reservering</p>
<input type = "date" onkeydown="return false" name = "datum" required /><br>
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

<?php
$_SESSION['rep1'] = $rep;
$_SESSION['lok'] = $lok;
$id = $_SESSION['id'];

}
?>
<p style="color:#FF0000;">
<input type="text" name="week" value="<?php echo $tel;?>" hidden /><br>
<input type="text" name="lok" value="<?php echo $lok;?>" hidden /><br>
<input type="text" name ="kpl" size="40%" placeholder = "kostenplaats" required />*<br>
<input type="text" name="proj" size="40%" placeholder = "project" required />*<br>
<input type="text" name="naam" size="40%" placeholder = "uw naam" required />*<br>
<input type="text" name="mail" size="40%" placeholder = "uw emailadres" required />*<br>
<input type="text" name="telf" size="40%" placeholder = "uw mobiele telefoonnummer" /><br>
<input type="text" name="pers" size="40%" placeholder = "aantal personen" required />*<br>
<input type="text" name="opst" size="40%" placeholder = "gewenste opstelling" /><br>
<input type="text" name ="opm" size="40%" placeholder = "eventuele opmerkingen" /><br><br></p>
<?php

   $sql="SELECT * FROM Lokaties WHERE `id` = '$id'"; 
   $ret = $db->query($sql); 
   while($row = $ret->fetchArray(SQLITE3_ASSOC) ){ 
      $koffie = $row['Koffie/thee'];
	  $lunch = $row['Lunch'];
	  $beam = $row['Beamer'];
	  $digi = $row['Digibord'];
	  $flap = $row['Flapover'];
   }
 if($koffie == "ja" AND $lunch == "ja"){  
   
?>
<p2>Geef hieronder aan of u gebruik wil maken van de catering,<br>
dan zorgen wij dat het op tijd klaar staat.<br>
Indien u met minder dan 5 personen bent hoeft u dit niet aan te vinken, u kunt dan koffie/thee in de hal pakken.<br>
<input type="checkbox" name="cat1" value = "koffie">  <label for="cat1">Koffie/thee</label><br>
<input type="checkbox" name="cat2" value = "koek">  <label for="cat2">Koekjes/cake</label><br>
<input type="checkbox" name="cat3" value = "lunch">   <label for="cat3">Lunch</label><br>
<br>
<?php
 }
 if($koffie == "ja" AND $lunch == "nee"){ 
 ?>
 <p2>Geef hieronder aan of u koffie/thee wilt gebruiken,<br>
dan zorgen wij dat het op tijd klaar staat.<br>
Indien u met minder dan 5 personen bent hoeft u dit niet aan te vinken, u kunt dan koffie/thee in de hal pakken.<br>
<input type="checkbox" name="cat1" value = "koffie">  <label for="cat1">Koffie/thee</label><br>
<input type="checkbox" name="cat2" value = "koek">  <label for="cat2">Koekjes/cake</label><br>

<br>
 <?php
 }
if($beam == "ja") {
	?>
	<input type="checkbox" name="beam" value = "beamer">  <label for=beam">Beamer</label><br>
<?php
}
if($digi == "ja") {
	?>
	<input type="checkbox" name="digi" value = "digibord">  <label for=beam">Digibord</label><br>
<?php
}	
if($flap == "ja") {
	?>
	<input type="checkbox" name="flap" value = "flapover">  <label for=beam">Flapover</label><br>
<?php
} 
 
 
 
 ?>
<input type="submit" name="Verzenden" value="Verzenden" /><br><br>
</p2>
</form>

<?php

if(isset($_POST['Verzenden'])){
$lok = htmlspecialchars($_POST["lok"]);
$rep = $_SESSION['rep1'];
$dates = array();
$start = array();
$ends = array();
$koffie1 = "0";
$koek1 = "0";
$lunch1 = "0";
if (isset($_POST['cat1'])) {
$koffie1 = "koffie";}
if (isset($_POST['cat2'])) {
$koek1 = "koek";}
if (isset($_POST['cat3'])) {
$lunch1 = "lunch";}
if (isset($_POST['beam'])) {
$beam1 = "Beamer";}
if (isset($_POST['digi'])) {
$digi1 = "Digibord";}
if (isset($_POST['flap'])) {
$flap1 = "Flapover";}
$naam = htmlspecialchars($_POST["naam"]);
$email = htmlspecialchars($_POST["mail"]);
$kpl = htmlspecialchars($_POST["kpl"]);
$telf = htmlspecialchars($_POST["telf"]);
$proj = htmlspecialchars($_POST["proj"]);
$opm = htmlspecialchars($_POST["opm"]);
$pers = htmlspecialchars($_POST["pers"]);
$opst = htmlspecialchars($_POST["opst"]);
$week = htmlspecialchars($_POST["week"]);

if($rep == "dag") {

for($y = 1; $y <= $week; $y++){
	$d="datum".$y;
	$b="begin".$y;
	$e="eind".$y;
$dat = htmlspecialchars($_POST[$d]);
$begin = htmlspecialchars($_POST[$b]);
$eind = htmlspecialchars($_POST[$e]);
array_push($dates, $dat);
array_push($start, $begin);
array_push($ends, $eind);
}
}
else {
	$dat = htmlspecialchars($_POST["datum"]);
	$begin = htmlspecialchars($_POST["begin"]);
	$eind = htmlspecialchars($_POST["eind"]);
	array_push($dates, $dat);
	array_push($start, $begin);
	array_push($ends, $eind);
}
if($rep == "maand") {
	$dag = htmlspecialchars($_POST["dag"]);
if ($dag == "maandag"){$dd = "MO";}
if ($dag == "dinsdag"){$dd = "TU";}
if ($dag == "woensdag"){$dd = "WE";}
if ($dag == "donderdag"){$dd = "TH";}
if ($dag == "vrijdag"){$dd = "FR";}
$num = htmlspecialchars($_POST["num"]);
$maand = array();
array_push($maand, $num, $dag, $dd);
}
$info = array();
array_push($info, $koffie1,$koek1,$naam,$email,$kpl,$telf,$proj,$opm,$pers,$week,$beam1,$digi1,$flap1);
session_start();
$_SESSION['dates']= $dates;
$_SESSION['start']= $start;
$_SESSION['ends']= $ends;
$_SESSION['info']= $info;
$_SESSION['maand']= $maand;
$_SESSION['rep']= $rep;
$_SESSION['lok']= $lok;
$_SESSION['lu']= $lunch1;
$_SESSION['lunch']= "";
	
if ($lunch1 == "lunch" OR $koffie1 == "koffie") {
		$dates1 = $_SESSION['dates'];
		$start1 = $_SESSION['start'];
		$ends1 = $_SESSION['ends'];
		$info1 = $_SESSION['info'];
		$maand1 = $_SESSION['maand'];
		$lok1 = $_SESSION['lok']; 
		$_SESSION['dates1']= $dates1;
		$_SESSION['start1']= $start1;
		$_SESSION['ends1']= $ends1;
		$_SESSION['info1']= $info1;
		$_SESSION['maand1']= $maand1;
		$_SESSION['rep']= $rep;
		$_SESSION['lok']= $lok;
		$_SESSION['lunch']= $lunch1;
		$_SESSION['koffie']= $koffie1;
		$_SESSION['koek']= $koek1;
		$_SESSION['lok1']= $lok1;
		
		
echo "<script type='text/javascript'> document.location = 'catering.php'; </script>";
}

echo "<script type='text/javascript'> document.location = 'agenda3.php'; </script>";
}
?>