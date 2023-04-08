<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/PHPMailer/src/Exception.php';
require 'PHPMailer/PHPMailer/src/PHPMailer.php';

session_start();
$tel = $_POST["tel"];
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
    background-color:#88CFBE;
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
<body>
<div id="bg-image"></div>
<div class = "container" style="position: absolute;top:2%;left: 10%; text-align:left; ">
<br>

<form method="POST" action="">
<?php
for($z = 1; $z <= $tel; $z++){
	$d="datum".$z;
	?>
<p>Kies datum<?php echo $z?></p>

<input type = "date" onkeydown="return false" name = "<?php echo $d?>"/><br>
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
}
?>
<p style="color:#FF0000;">
<input type="text" name="week" value="<?php echo $tel;?>" hidden /><br>
<input type="text" name="kpl" size="40%" placeholder = "kostenplaats" required />*<br>
<input type="text" name="proj" size="40%" placeholder = "project" required />*<br>
<input type="text" name="naam" size="40%" placeholder = "uw naam" required />*<br>
<input type="text" name="mail" size="40%" placeholder = "uw emailadres" required />*<br>
<input type="text" name="telf" size="40%" placeholder = "uw mobiele telefoonnummer" required />*<br>
<input type="text" name="pers" size="40" placeholder = "aantal personen" required />*<br>
<input type="text" name="opm" size="40%" placeholder = "eventuele opmerkingen" /><br><br></p>
<p2>Geef hieronder aan of u gebruik wil maken van de catering,<br>
dan zorgen wij dat het op tijd klaar staat.<br>
<input type="checkbox" name="cat1">  <label for="cat1">Koffie/thee</label><br>
<input type="checkbox" name="cat2">  <label for="cat2">Koekjes/cake</label><br>
<input type="checkbox" name="cat3">  <label for="cat3">Lunch</label><br>
<br><br><br><br>
<input type="submit" name="Verzenden" value="Verzenden" /><br><br>
</p2>
</form>

<?php

if(isset($_POST['Verzenden'])){
$koffie = $_POST["cat1"];
$koek = $_POST["cat2"];
$lunch = $_POST["cat3"];
$naam = htmlspecialchars($_POST["naam"]);
$email = htmlspecialchars($_POST["mail"]);
$kpl = htmlspecialchars($_POST["kpl"]);
$telf = htmlspecialchars($_POST["telf"]);
$proj = htmlspecialchars($_POST["proj"]);
$opm = htmlspecialchars($_POST["opm"]);
$pers = htmlspecialchars($_POST["pers"]);
$week = htmlspecialchars($_POST["week"]);
$dates = array();
for($y = 1; $y <= $week; $y++){
	$d="datum".$y;
	$b="begin".$y;
	$e="eind".$y;
$dat = htmlspecialchars($_POST[$d]);
$begin = htmlspecialchars($_POST[$b]);
$eind = htmlspecialchars($_POST[$e]);
array_push($dates, $dat, $begin, $eind);
}
$info = array();
array_push($info, $koffie, $koek,$naam,$email,$kpl,$telf,$proj,$opm,$pers,$week);
session_start();
$_SESSION['dates']= $dates;
$_SESSION['info']= $info;
if ($lunch="on") {
		$dates1 = $_SESSION['dates'];
		$info1 = $_SESSION['info'];
		$_SESSION['dates1']= $dates1;
		$_SESSION['info1']= $info1;
echo "<script type='text/javascript'> document.location = 'catering.php'; </script>";
}
echo "<script type='text/javascript'> document.location = 'mailx3.php'; </script>";
}
?>



