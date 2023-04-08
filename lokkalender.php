<?php
session_start();
$user = "Protonstraat";
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
<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
<title>Agenda</title>

<link rel="stylesheet" type="text/css" href="style.css">

<style>
html, body {
	overflow: auto;
	background-color:#ffffff;
}
.overlay {
    position: fixed;
    width: 97%;
    height: auto;
    left: 0;
    top: 5%;
    
    z-index: 10;
  }
.knop {
  background-color: blue;
  border: none;
  color: white;
  padding: 5px 5px;
  text-align: center;
  font-size: 20px;
  cursor: pointer;
  height:100px;
}
	
.outside-while1{
        border:1px solid #a6a6a6;font-size:2vw;font-weight:500;
		color:#ffffff;
		background-color:#3f6ad9;
		width:25%;
		text-align: center;
    }
.outside-while2{
        border:1px solid #a6a6a6;font-size:2vw;font-weight:500;
		color:#ffffff;
		background-color:#3f6ad9;
		width:25%;
		text-align: center;
    }
.outside-while3{
        border:1px solid #a6a6a6;font-size:2vw;font-weight:500;
		color:#ffffff;
		background-color:#3f6ad9;
		width:10%;
		text-align: center;
    }

.inside-while1{
        border:1px solid #a6a6a6;
		color:#000000;
		background-color:#00c8ff;
		width:25%;
		font-size:2vw;
		font-weight:300;
		padding:15px;
		text-align: left;
    }
	

.inside-while2{
        border:1px solid #a6a6a6;
		color:#000000;
		background-color:#00e1ff;
		width:25%;
		font-size:2vw;
		font-weight:300;
		text-align: left;
    }
.inside-while3{
        border:1px solid #a6a6a6;
		color:#000000;
		background-color:#00c8ff;
		width:10%;
		font-size:2vw;
		font-weight:300;
		text-align: center;
    }

.container{
	font-size:4vw;
	width:100%;
}
textarea {
	width:500px;
}
input {
	position: relative;
	font-size:1vw;
	border: 1px solid #bebebe;
	
}		

p {
	font-size:1.2vw;
}
h9 {
	font-size:4vw;
	color: #0000ff;
}
table, th, td {
  border: 1px solid blue;
  font-size:1.5vw;
}

@media screen and (max-width: 600px) {
p {
	font-size:4vw;
}
h9 {
	font-size:6vw;
	color: #0000ff;
}
a {
	font-size:2vw;
	color:blue;
}
table, th, td {
  border: 1px solid black;
}
td {
	font-size:4vw;
}
input {
	font-size:8px;
}
.outside-while1{
        border:1px solid #a6a6a6;font-size:3vw;font-weight:500;
		color:#ffffff;
		width:3%;
		text-align: center;
    }
.outside-while2{
        border:1px solid #a6a6a6;font-size:3vw;font-weight:500;
		color:#ffffff;
		width:20%;
		text-align: center;
    }
.outside-while3{
        border:1px solid #a6a6a6;font-size:3vw;font-weight:500;
		color:#ffffff;
		width:3%;
		text-align: center;
    }
.outside-while4{
        border:1px solid #a6a6a6;font-size:3vw;font-weight:500;
		color:#ffffff;
		width:20%;
		text-align: center;
    }
.inside-while1{
        border:1px solid #a6a6a6;
		color:#000000;
		width:3%;
		font-size:3vw;
		font-weight:300;
		padding:2px;
		text-align: left;
    }
	

.inside-while2{
        border:1px solid #a6a6a6;
		color:#000000;
		width:20%;
		font-size:2vw;
		font-weight:300;
		text-align: left;
    }
.inside-while3{
        border:1px solid #a6a6a6;
		color:#000000;
		width:10%;
		font-size:3vw;
		font-weight:300;
		text-align: center;
    }
.inside-while4{
        border:1px solid #a6a6a6;
		color:#000000;
		width:20%;
		font-size:2vw;
		font-weight:300;
		text-align: left;
    }
.container{
	font-size:5vw;
}
textarea {
	width:200px;
}	
}
</style> 
<script>
function basicPopup(url) {
popupWindow = window.open(url,'popUpWindow','height=650,width=700,left=50,top=50,resizable=yes,scrollbars=yes,toolbar=yes,menubar=no,location=no,directories=no, status=yes')
	}

</script>
</head>
<body >

<div class = "overlay" style="position: absolute;top:2%;left:5%;">
<div style = "margin-left:0%"; >
<?php
echo "<table>";
            echo "<tr>";
                echo "<th class='outside-while1'>Dag</th>";
                echo "<th class='outside-while3'>Datum</th>";
				echo "<th class='outside-while2'>Gereserveerd</th>";
			echo "</tr>";
  
        
        echo "</table>";
		?>
<div id="" style="overflow:auto; ">
<div style = "margin-right:5%"; > 
<?php

$days_count = date('t');
$current_day = date('d');

$count = date('Y-m-01');
	
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


for ($w = 0; $w <= 365; $w++){
  $month = date('n', strtotime($count. ' + ' . $w . ' days'));
  $year = date('Y', strtotime($count. ' + ' . $w . ' days'));
  $t = date('Y-n-j', strtotime($count. ' + ' . $w . ' days'));
  $t1 = date('Y-m-d', strtotime($count. ' + ' . $w . ' days'));
  $tijd1 = array();
  $inf= array();
  $sql = "SELECT * FROM $user ORDER BY `Datum`,`Begin` ASC";
  $ret = $db->query($sql);

    while($row = $ret->fetchArray(SQLITE3_ASSOC) ){  
	
	$tdd = $row['Datum'];
	if($tdd==$t1) {
	$txx2 = $row['Begin'];
	$txx3 = $row['Eind'];
	$tx = $txx2."-".$txx3."*";	
	array_push($tijd1,$tx);
		
	}
}

sort($tijd1);

$tekst = implode($tijd1);

$count1 = strtotime($count);
$count2=$count1 + ($w*86400);
  $oc = str_replace("*", "\n", $tekst);
  $dag = strtotime($t);
 
  $wd = date('w', $count2);
  $t1 = date('d', $count2);
  $wdnl = $dagen[$wd];
  $tm1 = date('n', $count2)-1;
  $tj = date('Y',$dag);
  $tm = $maanden[$tm1];
  
  if($t1 == "01"){
	  echo "</table>";
	  ?>
	  <br>
	  <?php
	  echo "<h9>" . $maanden[$month-1] . "  " . $year; 
	  ?><br>
	  <?php
echo "<table>";
            echo "<tr>";
                echo "<tr>";
                echo "<th class='outside-while1' style = 'Background-color:white'>Dag</th>";
                echo "<th class='outside-while3' style = 'Background-color:white'>Datum</th>";
				echo "<th class='outside-while2' style = 'Background-color:white'>Gereserveerd</th>";
			echo "</tr>";
				
			
				
            echo "</tr>";
  }

echo "<tr>";
                echo "<td class='inside-while1'>" . $wdnl . "</td>";
                echo "<td class='inside-while3'>" . $t1 . "</td>";
				echo nl2br("<td valign = 'top' class='inside-while2'>" . $oc . "</td>");
			
				            
            echo "</tr>";
        }
        echo "</table>";
  
	 
	
		?>



</body>

</html>
