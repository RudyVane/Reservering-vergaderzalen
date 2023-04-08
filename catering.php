<?php
$dates = array();
$start = array();
$ends = array();
$info = array();
$maand = array();
$dates1 = array();
$info1 = array();
$maand1 = array();

session_start();
	$dates = $_SESSION['dates1'];
	$start = $_SESSION['start1'];
	$ends = $_SESSION['ends1'];
	$info = $_SESSION['info1'];
	$maand = $_SESSION['maand1'];
	$lunch = $_SESSION['lunch']; 
	$koffie = $_SESSION['koffie']; 
	$koek = $_SESSION['koek']; 
	$lok = $_SESSION['lok1']; 
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
	
$sql = "SELECT * FROM Lokaties WHERE `Lokatie` = '$lok'";
  $ret = $db->query($sql);

    while($row = $ret->fetchArray(SQLITE3_ASSOC) ){  
	$lunch1 = $row['Lunch1'];
	$lunch2 = $row['Lunch2'];
	$lunch3 = $row['Lunch3'];
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
	border: 1px solid #489337;
}
table {
	width: 80%;
}
td {
	font-size:2vw;
	color:#000000;
	width:50%;
}		
a {
	color: ##489337;
}
p {
	font-size:5vw;
	color:#000000;
}
p2 {
	font-size:3vw;
	color:#000000;
}
p3 {
	font-size:2.5vw;
	color:#000000;
}
@media screen and (max-width: 600px) {
	
#tijd{
 width:120px; 
 font-size:12px; 
}
p {
	font-size:5vw;
	color:#000000;
}
p1 {
	font-size:3vw;
	color:#489337;
}
p2 {
	font-size:3vw;
	color:#000000;
}
p3 {
	font-size:3vw;
	color:#000000;
}
h9 {
	font-size:6vw;
}
a {
	font-size:2vw;
}
td {
	font-size:3vw;
}
input {
	font-size:14px;
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
<br>
<form method="POST" action=""> 
<?php
echo "<p style='font-size:3vw; color:blue;'>" . $dates[0] . "/" . $start[0] . "-" . $ends[0] . "<br>";
	
if($koffie == "koffie"){$kofx = "ja";
	?>
	<p>Koffie</p>
	<p3>Bij binnenkomst zal er koffie en thee klaarstaan. Indien u nog een refill wil, geef dan hieronder het tijdstip van de koffiepauze(s) aan.<p3><br>
	<table>
	<tr><td> </td><td><input type="text" name="kofx" value = "<?php echo $kofx; ?>" hidden /></td></tr>
	<tr><td>Koffietijd 1: </td><td><input type="time" name="koffietijd1" size="5" /></td></tr>
	<tr><td>Koffietijd 2: </td><td><input type="time" name="koffietijd2" size="5" /></td></tr>
	</table><br>
	<?php
	}
if($lunch == "lunch"){$lunx = "ja";	
?>				
	<p>Lunch</p>
	<table>
	<tr><td> </td><td><input type="text" name="lunx" value = "<?php echo $lunx; ?>" hidden /></td></tr>
	<tr><td>Lunchpauze</td><td><input type="time" name="lunchtijd" size="5" /></td></tr>
	</table><br>
	<p2>Lunchkeuze:</p2>
	
	<table>
	<tr><td><?php echo "Lunch 1: " . $lunch1 ?></td><td><input type="text" name="lun1" size="10"  placeholder = "aantal personen" /></td></tr>
	<tr><td><?php echo "Lunch 2: " . $lunch2 ?></td><td><input type="text" name="lun2" size="10"  placeholder = "aantal personen" /></td></tr>
	<tr><td><?php echo "Lunch 3: " . $lunch3 ?></td><td><input type="text" name="lun3" size="10"  placeholder = "aantal personen" /></td></tr>
	
	</table>
	<br>
	<p2> Of broodje:</p2><br>
	
	<table>
	<tr><td>ham</td><td><input type="text" name="ham" size="5"  placeholder = "aantal" /></td></tr>
	<tr><td>kaas</td><td><input type="text" name="kaas" size="5"  placeholder = "aantal" /></td></tr>
	<tr><td>gezond</td><td><input type="text" name="gezond" size="5"  placeholder = "aantal" /></td></tr>
	<tr><td>kroket</td><td><input type="text" name="kroket" size="5"  placeholder = "aantal" /></td></tr>
	<tr><td>gehaktbal</td><td><input type="text" name="gehakt" size="5"  placeholder = "aantal" /></td></tr>
	</table>
	<br>
	<p2>Drinken:</p2><br>
	
	<table>
	<tr><td>melk</td><td><input type="text" name="melk" size="5"  placeholder = "aantal" /></td></tr>
	<tr><td>jus d'orange</td><td><input type="text" name="2" size="5"  placeholder = "aantal" /></td></tr>
	<tr><td>karnemelk</td><td><input type="text" name="3" size="5"  placeholder = "aantal" /></td></tr>
	<tr><td>chocomel</td><td><input type="text" name="4" size="5"  placeholder = "aantal" /></td></tr>
	<tr><td>.....</td><td><input type="text" name="5" size="5"  placeholder = "aantal" /></td></tr>
	</table>
	<br>
	<?php
}
	$_SESSION['dates1'] = $dates; 
	$_SESSION['start1'] = $start; 
	$_SESSION['ends1'] = $ends; 
	$_SESSION['info1'] = $info; 
	$_SESSION['maand1'] = $maand; 
	$_SESSION['lok1'] = $lok; 
	?>
<input type="submit" name="Submit" value="Formulier verzenden" /><br><br>
</form>
<?php

if(isset($_POST['Submit'])){
	session_start();
	$dates1 = $_SESSION['dates1'];
	$start1 = $_SESSION['start1'];
	$ends1 = $_SESSION['ends1'];
	$info1 = $_SESSION['info1'];
	$maand1 = $_SESSION['maand1'];
	$lok1 = $_SESSION['lok1'];
	$lunch = array();
	array_push($lunch, $_POST['koffietijd1'],$_POST['koffietijd2'],$_POST['lunchtijd'],$_POST['lun1'],$_POST['lun2'],$_POST['lun3'],$_POST['ham'],$_POST['kaas'],$_POST['gezond'],$_POST['kroket'],$_POST['gehakt'],$_POST['melk'],$_POST['2'],$_POST['3'],$_POST['4'],$_POST['5']);
	$_SESSION['lunch']=$lunch; 
	$_SESSION['dates']=$dates1;
	$_SESSION['start']=$start1;
	$_SESSION['ends']=$ends1;
	$_SESSION['info']=$info1;
	$_SESSION['maand'] = $maand1; 
	$_SESSION['lok'] = $lok1; 
	$_SESSION['kofx'] = $_POST['kofx']; 
	$_SESSION['lunx'] = $_POST['lunx'];
	echo "<script type='text/javascript'> document.location = 'agenda3.php'; </script>";
	
}
?>



