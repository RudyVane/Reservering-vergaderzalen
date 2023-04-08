<?php
include('header.php');
$lok = $_SESSION['lok'];
$id = $_SESSION['id'];
?>

<div class = "container" style="position: absolute;top:3vw;left: 25vw; width: 80%;text-align:left;">	

<h9>Reserveren Vergaderzaal <?php echo $lok; ?></h9>
<br>
<br>
<form action = "" method ="POST">
<p style="border: 6px solid #88CFBE; border-radius: 10px; width:80%; line-height:150%;text-align:center; padding:15px 15px 15px 15px;">
U kunt 1 of meerdere dagen reserveren, of een wekelijks/maandelijks moment reserveren.
Kijkt u in de getoonde agenda of de gewenste dag en tijd nog beschikbaar is. Na verzenden moet de reservering nog goedgekeurd worden, u ontvangt daarvoor een email.<br><br>
Eenmalig of terugkerende afspraak?<br><br>
<input type="submit" name="rep1" id="rep1" value="één of meerdere dagen" style ="width:60%" ><br><br>
<input type="submit" name="rep2" id="rep2" value="wekelijks" style ="width:60%" ><br><br>
<input type="submit" name="rep3" id="rep3" value="maandelijks" style ="width:60%" ><br><br>
<br>
<br>
</p>
<br><br>

<?php
if(isset($_POST['rep1'])){
	$_SESSION['rep']= "dag";
	$_SESSION['lok']= $lok;
	$_SESSION['id'] = $id;
echo "<script type='text/javascript'> document.location = 'agenda.php'; </script>";
}
if(isset($_POST['rep2'])){	
$_SESSION['rep']= "week";
$_SESSION['lok']= $lok;
$_SESSION['id'] = $id;
echo "<script type='text/javascript'> document.location = 'agenda.php'; </script>";
}
if(isset($_POST['rep3'])){
	$_SESSION['rep']= "maand";
	$_SESSION['lok']= $lok;
	$_SESSION['id'] = $id;
echo "<script type='text/javascript'> document.location = 'agenda.php'; </script>";
}

?>
