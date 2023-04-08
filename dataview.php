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
 $datum = $_SESSION['datum'];  
$dat = date('Y-m-d', strtotime($datum)); 
$dat1 = date('d-m-Y', strtotime($datum)); 
?>


<div class = "container" style="position: absolute;left:20%; top:2%; text-align:left; ">
<h9 style = "margin-left:10%">Bezet op <?php echo $dat1;?></h9><br><br>
<form method="POST" action="">
<input type="submit" name="verder" value="dag vooruit" />
<input type="submit" name="terug" value="dag terug" />
<br><br>
<?php
if(isset($_POST['verder'])){
	$time = strtotime($dat1);
$final = date("Y-m-d", strtotime("+1 day", $time));
$dat1 = $final;
$_SESSION['datum'] = $dat1; 
echo "<script type='text/javascript'> document.location = 'dataview.php'; </script>"; 
}
if(isset($_POST['terug'])){
	$time = strtotime($dat1);
$final = date("Y-m-d", strtotime("-1 day", $time));
$dat1 = $final;
$_SESSION['datum'] = $dat1; 
echo "<script type='text/javascript'> document.location = 'dataview.php'; </script>";
}
echo "<table style='width:80%'>";
            echo "<tr>";
                echo "<th class='outside-while3'>Lokatie</th>";
                echo "<th class='outside-while3'>Vrij/Bezet</th>";
				
			echo "</tr>";
$sql1="SELECT * FROM Lokaties";
   $ret1 = $db->query($sql1);
   while($row1 = $ret1->fetchArray(SQLITE3_ASSOC) ){
	   $lok = $row1['Lokatie']; 
$bez = "Vrij";
$tel = 0;
$sql2="SELECT * FROM Totaal WHERE Datum = '$dat' AND Lokatie = '$lok'";
   $ret2 = $db->query($sql2);
   while($row2 = $ret2->fetchArray(SQLITE3_ASSOC) ){
      $begin = $row2['Begin']; 
	  $eind = $row2['Eind'];
	  $lok = $row2['Lokatie'];
	  $stat = $row2['Status'];
	  if($stat == "Goedgekeurd") {
	  $bez = "van " . $begin . "-" . $eind . " bezet";}
	  else { $bez = "van " . $begin . "-" . $eind . " in aanvraag";}
	  $tel = 1;
echo "<tr>";
                echo "<td class='inside-while3'>" . $lok . "</td>";
                echo "<td class='inside-while3'>" . $bez . "</td>";
				
			
				            
            echo "</tr>";
        }
		if($tel == 0) {
			echo "<tr>";
                echo "<td class='inside-while3'>" . $lok . "</td>";
                echo "<td class='inside-while3'>" . $bez . "</td>";
				
			
				            
            echo "</tr>";
			
		}
   }
        echo "</table>";
  
   	 
	
		?>


