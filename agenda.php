<?php
include('header.php');
session_start();
$_SESSION['dates']= "";
$_SESSION['info']= "";
$_SESSION['maand']= "";
$rep = $_SESSION['rep'];
$lok = $_SESSION['lok'];
$id = $_SESSION['id'];

$x1 = $_GET['maand'];
if($x1 == '1') {$xx = 1;}
if($x1 == '-1') {$xx = -1;}
if($x1 == '') {$xx = 0;}
$mndx = $_SESSION['mnd']; 
$x = $mndx + $xx;
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
<div class = "container" style="position: absolute;top:0.5vw;left: 20vw; width: 80%;text-align:left;">	
<h9 style = "margin-left:5%">Overzicht vergaderzaal <?php echo $lok; ?> </h9>
<br>

<br>

<div class = "overlay" style="position: absolute;top:6vw;left:2%;">
<div style="height:800px; width:100%; overflow:hidden;">


<?php

$nu = date('Y-m-d');
$time = strtotime($nu);
$final = date("Y-m-d", strtotime("+".$x." month", $time));
$_SESSION['mnd'] = $x;
$time1 = strtotime($final);
$count = date('Y-m-01', $time1);
$days_count = date('t', $time1); 
$current_day = date('d', $time1);
$mndx = date('m', $time1);
$jaarx = date('Y', $time1);
$mndx1 = (int)$mndx;	
  $dag_vd_week = date("w");
  $mnd = date("m");
  $maand_vh_jaar = date("n")-1;
  $jaar = date("Y");
  $datum = date("d");
  $dagen = array('zondag', 'maandag', 'dinsdag', 'woensdag', 'donderdag', 'vrijdag', 'zaterdag');
  $maanden = array('januari', 'februari', 'maart', 'april', 'mei', 'juni', 'juli', 'augustus', 'september', 'oktober', 'november', 'december');
  $dag = $dagen[$dag_vd_week];
  $maand = $maanden[$maand_vh_jaar];
  $d1 = mktime(0, 0, 0, $mnd, 01, $jaar);
  $d2 = mktime(0, 0, 0, $mnd, 01, $jaar + 1);
  $dag1 = date('d-m-Y h:i:s',$d1);
  $weekdag = date('w',$d1);
  $mndnieuw = $maanden[$mndx1-1];

echo "<table>";
echo "<tr'>";
                echo "<th class='outside-while3' style ='width:30%; text-align:left'><a href = 'agenda.php?maand= -1' style = 'color: #d6d147;'>Maand terug </a></th>";
				echo "<th class='outside-while1' style ='width:40%; color: white; text-align:center'>". $mndnieuw . " " . $jaarx . "</th>";
				echo "<th class='outside-while2' style ='width:30%; text-align:right'><a href = 'agenda.php?maand=1' style = 'color: #449adb ;'>Maand vooruit </a></th>";
				
			echo "</tr>";
			echo "</table>";

			?>
<div id="" style="overflow:scroll; width:100%; height:600px;">		
<?php		
echo "<table>";

            echo "<tr'>";
                echo "<th class='outside-while1' style ='width:20%; text-align:center'>Dag</th>";
                echo "<th class='outside-while3' style ='width:10%; text-align:center'>Datum</th>";
				echo "<th class='outside-while2' style ='width:70%; text-align:center'>Gereserveerd</th>";
				
			echo "</tr>";

?>


<?php  
for ($w = 0; $w <= $days_count - 1; $w++){
  $month = date('n', strtotime($count. ' + ' . $w . ' days'));
  $year = date('Y', strtotime($count. ' + ' . $w . ' days'));
  $t = date('Y-n-j', strtotime($count. ' + ' . $w . ' days'));
  $t1 = date('Y-m-d', strtotime($count. ' + ' . $w . ' days'));
  $tijd1 = array();

  
  $sql = "SELECT * FROM $lok ORDER BY `Datum`,`Begin` ASC";
  $ret = $db->query($sql);

    while($row = $ret->fetchArray(SQLITE3_ASSOC) ){  
	
	$tdd = $row['Datum'];
	if($tdd==$t1) {
	$stat1 = $row['Status'];	
	$txx2 = $row['Begin'];
	$txx3 = $row['Eind'];
	
	if($stat1 == "Aanvraag") {
		$stat = " - in aanvraag";
	}
	else {
		$stat = "";
	}	
	$tx = $txx2."-".$txx3.$stat."*";	
	array_push($tijd1,$tx);
	
	
	}
}

sort($tijd1);

$tdx = implode($tijd1);




$count1 = strtotime($count);
$count2=$count1 + ($w*86400);
  $td = str_replace("*", "\n", $tdx);
  
  $dag = strtotime($t);
 
  $wd = date('w', $count2);
  $t1 = date('d', $count2);
  $t2 = date('M', $count2);
  $t3 = date('m', $count2);
  $wdnl = $dagen[$wd];
  $tm1 = date('n', $count2)-1;
  $tj = date('Y',$dag);
  $tm = $maanden[$tm1];
 
      
  

echo "<tr>";
                echo "<td class='inside-while1' style = 'text-align:left'>" . $wdnl . "</td>";
                echo "<td class='inside-while3' style = 'text-align:left'>" . $t1 . "</td>";
				echo nl2br('<td valign = "top" class="inside-while2" style = "text-align:left">' . $td . '</td>');
				
				            
            echo "</tr>";
        }
        echo "</table>";
		?>
		</div></div></div></div>
<div class = "menu1">
<?php
if($rep == "dag") {?>
<form action="agenda2.php" method="post" onsubmit="target_popup(this)">
<p>Hoeveel dagen wilt u reserveren?</p><br>
<input type="text" name="rep" value = "dag" hidden>
<input type="text" name="lok" value = "<?php echo $lok; ?>" hidden>
<input type="number" id = "x" name="tel" value = "1" min="1" max="10" required ><br><br>
<input type = "submit" id = "OK" name="OK" value = "RESERVEREN" >
</form>
<?php
}
if($rep == "week") {?>
<form action="agenda2.php" method="post" onsubmit="target_popup(this)">
<p>Hoeveel weken wilt u reserveren?</p><br>
<input type="text" name="rep" value = "week" hidden>
<input type="text" name="lok" value = "<?php echo $lok; ?>" hidden>
<input type="number" id = "x" name="tel" min="2" max = "8" value = "2" required ><br><br>
<input type = "submit" id = "OK" name="OK" value = "RESERVEREN">
</form>
<?php
}
if($rep == "maand") {?>
<form action="agenda2.php" method="post" onsubmit="target_popup(this)">
<p>Hoeveel maanden wilt u reserveren?</p><br>
<input type="text" name="rep" value = "maand" hidden>
<input type="text" name="lok" value = "<?php echo $lok; ?>" hidden>
<input type="number" id = "x" name="tel" min="2" max="3" value = "2" required ><br><br>
<input type = "submit" id = "OK" name="OK" value = "RESERVEREN" >
</form>
<?php
}
?>

<script>
function target_popup(form) {
    window.open('', 'formpopup', 'width=600,height=1000,resizeable,scrollbars');
    form.target = 'formpopup';
}
</script>

</body>
</html>	