<?php
include('header.php');
?>

<div class = "container" style="position: absolute;top:3vw;left: 25vw; width: 80%;text-align:left;">	
<h9>Reserveren Vergaderzaal</h9>
<br>
<br>
<form action = "" method ="POST">
<p style="border: 6px solid #88CFBE; border-radius: 10px; width:80%; line-height:150%;text-align:center; padding:15px 15px 15px 15px;">
U kunt kiezen om van een lokatie de datamogelijkheden te bekijken of voor een bepaalde dag de lokatiemogelijkheden te bekijken.
<br><br>
<input type="submit" name="rep1" id="lok" value="zoeken op lokatie" style ="width:60%" ><br><br>
<input type="submit" name="rep2" id="dat" value="zoeken op datum" style ="width:60%" ><br><br>

<br>
<br>
</p>
<br><br>

<?php
if(isset($_POST['lok'])){
	
echo "<script type='text/javascript'> document.location = 'lokaties.php'; </script>";
}
if(isset($_POST['dat'])){	
$_SESSION['rep']= "week";
echo "<script type='text/javascript'> document.location = 'datum.php'; </script>";
}


?>