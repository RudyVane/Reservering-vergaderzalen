<?php
include('header.php');
   
?>


<div class = "container" style="position: absolute;left:20%; top:2%; text-align:left; ">
<h9>Beschikbaarheid vergaderzaal op datum</h9>
<br><br>
<form method="POST" action="">
<p>Voor welke datum zoekt u een vergaderruimte?</p><br>
<input type="date" name="datum" /><br><br>
<input type="submit" name="ok" value="Verzenden" style ="width:15%" ><br>

</p>
<br>
</form>
<?php
if(isset($_POST['ok'])){
	$_SESSION['datum']= $_POST['datum'];
	
echo "<script type='text/javascript'> document.location = 'dataview.php'; </script>";
}

