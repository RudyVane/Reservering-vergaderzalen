<?php
include('header.php');
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
</div>
<div style="position: absolute; top:2%; width: 100%; text-align:center; ">


<h9>Reserveren vergaderzaal</h9>
</div><br><br>
<div style="position: absolute;left:15%; top:4vw; text-align:left; ">	
<form method="POST" action="">
<?php

$sql="SELECT * FROM Lokaties";
   $ret = $db->query($sql);
   while($row = $ret->fetchArray(SQLITE3_ASSOC) ){
      $koffie = $row['Koffie/thee']; 
	  $lunch = $row['Lunch'];
	  $beamer = $row['Beamer'];
	  $digi = $row['Digibord'];
	  $lok = $row['Lokatie'];
	  $id = $row['id'];
	  $foto = $row['Foto'];
	  $min = $row['Minimaal'];
	  $max = $row['Maximaal'];
	  if($lok=="Ambacht") { $lok = "d'Ambacht";}
?>

<div class="column">

<input type="text" name="id" value="<?php echo $id ?>" hidden />
<input type="submit" name="lok" value="<?php echo $lok ?>" style ="width:100%; font-size:1vw;font-weight:bold;" ><br>
<table style="width:100%">
<tr><td colspan="2" style="height:10vw"><img src="<?php echo $foto; ?>" width="100%" ></td></tr>
<tr><td style = "text-align:left;font-size:0.75vw;">Koffie/thee:</td><td style = "text-align:left;font-size:0.75vw;"><?php echo $koffie;?></td></tr>
<tr><td style = "text-align:left;font-size:0.75vw;">Lunch:</td><td style = "text-align:left;font-size:0.75vw;"><?php echo $lunch;?></td></tr>
<tr><td style = "text-align:left;font-size:0.75vw;">Beamer: </td><td style = "text-align:left;font-size:0.75vw;"><?php echo $beamer;?></td></tr>
<tr><td style = "text-align:left;font-size:0.75vw;">Digibord:</td><td style = "text-align:left;font-size:0.75vw;"><?php echo $digi;?></td></tr>
<tr><td style = "text-align:left;font-size:0.75vw;">Minimaal:</td><td style = "text-align:left;font-size:0.75vw;"><?php echo $min . '_pers.';?></td></tr>
<tr><td style = "text-align:left;font-size:0.75vw;">Maximaal:</td><td style = "text-align:left;font-size:0.75vw;"><?php echo $max . '_pers.';?></td></tr>

</table>
<br>
</div>
<?php
   }
   ?>
</form>

<?php
if(isset($_POST['lok'])){
	$lok1 = $_POST['lok'];
	$sql="SELECT * FROM Lokaties WHERE `Lokatie` = '$lok1'";
   $ret = $db->query($sql);
   while($row = $ret->fetchArray(SQLITE3_ASSOC) ){
      $id = $row['id'];
	  
	$_SESSION['lok']= $_POST['lok'];
	$_SESSION['id']= $id;
   }
echo "<script type='text/javascript'> document.location = 'reserveren.php'; </script>";
}
