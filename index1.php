<?php
include('header.php');
?>

<div class = "container" style="position: absolute;top:3%;left: 10%; width: 100%;text-align:left;">	
<h9>Reserveren vergaderzaal Protonstraat 6</h9>
<br>
<br>
<form action = "" method ="POST">
<p style="border: 6px solid #88CFBE; width:800px; line-height:150%;text-align:center; padding:15px 15px 15px 15px;">
U kunt 1 of meerdere dagen reserveren voor bv een vergadering of cursus, of een wekelijks/maandelijks moment reserveren.
Kijkt u in de getoonde agenda of de gewenste dag en tijd nog beschikbaar is. Na verzenden moet de reservering nog goedgekeurd worden, u ontvangt daarvoor een email.<br><br>
Eenmalig of terugkerende afspraak?<br><br>
<input type="submit" name="rep1" id="rep1" value="één of meerdere dagen"><br>
<input type="submit" name="rep2" id="rep2" value="wekelijks"><br>
<input type="submit" name="rep3" id="rep3" value="maandelijks"><br>
<br>
<br>
</p>
<br><br>

<?php
if(isset($_POST['rep1'])){
	$_SESSION['rep']= "dag";
echo "<script type='text/javascript'> document.location = 'agenda.php'; </script>";
}
if(isset($_POST['rep2'])){	
$_SESSION['rep']= "week";
echo "<script type='text/javascript'> document.location = 'agenda.php'; </script>";
}
if(isset($_POST['rep3'])){
	$_SESSION['rep']= "maand";
echo "<script type='text/javascript'> document.location = 'agenda.php'; </script>";
}

?>
