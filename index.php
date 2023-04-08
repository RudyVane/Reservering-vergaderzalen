<?php
include('header.php');
?>
</div>
<div style="position: absolute;top:15vw;left: 2vw; width: 100%;text-align:left;">	
<img src="protonstraat.jpg" style="width:18%;height:auto;"><br><br>
<img src="zilverlaan1.jpg" style="width:18%;height:auto;margin-right:25px;">
<img src="heemtuin.jpg" style="width:18%;height:auto;margin-right:25px;">
<img src="nme.jpg" style="width:18%;height:auto;margin-right:25px;">
<img src="oosterpark.jpg" style="width:18%;height:auto;">

</div>
<div style="position: absolute;top:15vw;left: 2vw; width: 97%;text-align:right;">
<img src="zilverlaan2.jpg" style="width:18%;height:auto;"><br><br><br>
<img src="ambacht.jpg" style="width:18%;height:auto;">

</div>	
<div  style="position: absolute;top:1vw; width: 100%;text-align:center;">	
<h9>Reserveren Vergaderzaal</h9></div>
<br>
<br>
<div class = "container" style="position: absolute;top:4vw;left: 25vw; width: 80%;text-align:left;">	
<form action = "" method ="POST">
<p style="border: 6px solid #24521d; border-radius: 10px; width:80%; line-height:150%;text-align:center; padding:15px 15px 15px 15px;">
U kunt kiezen om van een lokatie de datummogelijkheden te bekijken of voor een bepaalde dag de lokatiemogelijkheden te bekijken.
<br><br>
<input type="submit" name="lok" id="lok" value="zoeken op lokatie" style ="width:60%" ><br><br>
<input type="submit" name="dat" id="dat" value="zoeken op datum" style ="width:60%" ><br><br>

<br>
<br>
</p>
<br><br>

<?php
if(isset($_POST['lok'])){
	
echo "<script type='text/javascript'> document.location = 'lokatie.php'; </script>";
}
if(isset($_POST['dat'])){	

echo "<script type='text/javascript'> document.location = 'datum.php'; </script>";
}


?>