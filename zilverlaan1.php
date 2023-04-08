<?php
session_start();
$user = "Zilverlaan1";
$loc = "zilverlaan1";

$datx = $_SESSION['datum']; 
if($datx == ""){$datx = date('Y-m-d');}
$dat = date('Y-m-d', strtotime($datx)); 
$dat1 = date('d-m-Y', strtotime($datx)); 

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
	overflow-y: hidden;
	overflow-x: hidden;
	background-color:#489337;
}
.table-wrapper {
  display: grid;
  grid-template-columns: repeat(1, minmax(0, 1fr));
  overflow: auto;
  white-space: nowrap;
}


.overlay {
    position: fixed;
    width: 97%;
    height: calc(100% - 20px);
    left: 0;
    top: 10%;
    overflow-x: hidden;
    overflow-y:hidden;
    z-index: 10;
} 

/* Scrollbar style for Chrome */

/* Track */
::-webkit-scrollbar
{
  width: 14px;
  height: 14px;
}

::-webkit-scrollbar-track
{
  background: green;
  border: solid 2px rgba(50, 168, 82,0.5);
}


/* Thumb */
::-webkit-scrollbar-thumb
{
  background: #24521d;
}

::-webkit-scrollbar-thumb:hover
{
  background: #256916;
}

::-webkit-scrollbar-thumb:active
{
  background: #6e9e67;
}

::-webkit-scrollbar-thumb:vertical
{
  border-top: solid 2px rgba(50, 168, 82,0.5);
  border-bottom: solid 2px rgba(50, 168, 82,0.5);
}

::-webkit-scrollbar-thumb:horizontal
{
  border-right: solid 2px rgba(50, 168, 82,0.5);
  border-left: solid 2px rgba(50, 168, 82,0.5);
}


/* Buttons */
::-webkit-scrollbar-button
{
  border-style: solid;
  height: 16px;
  width: 16px;
}


/* Up */
::-webkit-scrollbar-button:vertical:decrement
{
  border-width: 0 7px 14px 7px;
  border-color: transparent transparent #32a852 transparent;
}

::-webkit-scrollbar-button:vertical:decrement:hover
{
  border-color: transparent transparent #505050 transparent;
}


/* Down */
::-webkit-scrollbar-button:vertical:increment
{
  border-width: 14px 7px 0 7px;
  border-color: #32a852 transparent transparent transparent;
}

::-webkit-scrollbar-button:vertical:increment:hover
{
  border-color: #505050 transparent transparent transparent;
}


/* Left */
::-webkit-scrollbar-button:horizontal:decrement
{
  border-width: 7px 14px 7px 0;
  border-color: transparent #32a852 transparent transparent;
}

::-webkit-scrollbar-button:horizontal:decrement:hover
{
  border-color: transparent #505050 transparent transparent;
}


/* Right */
::-webkit-scrollbar-button:horizontal:increment
{
  border-width: 7px 0 7px 14px;
  border-color: transparent transparent transparent #32a852;
}

::-webkit-scrollbar-button:horizontal:increment:hover
{
  border-color: transparent transparent transparent #505050;
}
::-webkit-scrollbar-corner { background: rgba(72, 147, 55,0.5); }
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
        border:1px solid #a6a6a6;font-size:1vw;font-weight:500;
		color:#ffffff;
		background-color:#24521d;
		min-width:100px;
		max-width:100px;
		text-align: center;
    }
.outside-while2{
        border:1px solid #a6a6a6;font-size:1vw;font-weight:500;
		color:#ffffff;
		background-color:#24521d;
		min-width:100px;
		max-width:100px;
		text-align: center;
    }
.outside-while3{
        border:1px solid #a6a6a6;font-size:1vw;font-weight:500;
		color:#ffffff;
		background-color:#24521d;
		min-width:75px;
		max-width:75px;
		text-align: center;
    }
.outside-while4{
        border:1px solid #a6a6a6;font-size:1vw;font-weight:500;
		color:#ffffff;
		background-color:#24521d;
		min-width:750px;
		max-width:750px;
		text-align: left;
    }
.outside-while5{
        border:1px solid #a6a6a6;font-size:1vw;font-weight:500;
		color:#ffffff;
		background-color:#24521d;
		min-width:50px;
		max-width:50px;
		text-align: center;
    }
.inside-while1{
        border:1px solid #a6a6a6;
		color:#000000;
		background-color:#628561;
		
		font-size:1vw;
		font-weight:300;
		padding:15px;
		text-align: left;
    }
	

.inside-while2{
        border:1px solid #a6a6a6;
		color:#000000;
		background-color:#6e9e67;
		;
		font-size:1vw;
		font-weight:300;
		text-align: center;
    }
.inside-while3{
        border:1px solid #a6a6a6;
		color:#000000;
		background-color:#628561;
		
		font-size:1vw;
		font-weight:300;
		text-align: center;
    }
.inside-while4{
        border:1px solid #a6a6a6;
		color:#000000;
		background-color:#6e9e67;
		
		font-size:1vw;
		font-weight:300;
		text-align: left;
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
h1{
	font-size:2.5vw;
	color: #8C004A;
}
table, th, td {
  border: 1px #8C004A;
  font-size:1.5vw;
  
}
th {
  position: -webkit-sticky;
  position: sticky;
  top: 0;
  z-index: 2;
}
a {
	font-size:2vw;
	color:blue;
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
        border:1px solid #a6a6a6;font-size:2vw;font-weight:500;
		color:#ffffff;
		min-width:50px;
		max-width:50px;
		text-align: center;
    }
.outside-while2{
        border:1px solid #a6a6a6;font-size:2vw;font-weight:500;
		color:#ffffff;
		min-width:50px;
		max-width:50px;
		text-align: center;
    }
.outside-while3{
        border:1px solid #a6a6a6;font-size:2vw;font-weight:500;
		color:#ffffff;
		min-width:50px;
		max-width:50px;
		text-align: center;
    }
.outside-while4{
        border:1px solid #a6a6a6;font-size:2vw;font-weight:500;
		color:#ffffff;
		min-width:75px;
		max-width:75px;
		text-align: center;
    }
.inside-while1{
        border:1px solid #a6a6a6;
		color:#000000;
		
		font-size:2vw;
		font-weight:300;
		padding:2px;
		text-align: left;
    }
	

.inside-while2{
        border:1px solid #a6a6a6;
		color:#000000;
		
		font-size:2vw;
		font-weight:300;
		text-align: left;
    }
.inside-while3{
        border:1px solid #a6a6a6;
		color:#000000;
		
		font-size:2vw;
		font-weight:300;
		text-align: center;
    }
.inside-while4{
        border:1px solid #a6a6a6;
		color:#000000;
		
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

</head>
<body >

<div class = "overlay" style="position: absolute;top:0%;left:2%;">

<h1>Agenda van <?php echo $user; ?></h1>
</div><br>
<div class = "overlay" style="position: absolute;top:10%;left:1%;">
<form method="POST" action="">
<input type="submit" name="terug" value="maand terug" />
<input type="submit" name="verder" value="maand vooruit" />


<?php
if(isset($_POST['verder'])){
	$time = strtotime($dat1);
$final = date("Y-m-d", strtotime("+1 month", $time));
$dat1 = $final;
$_SESSION['datum'] = $dat1; 
echo "<script type='text/javascript'> document.location = $loc.'.php'; </script>"; 
}
if(isset($_POST['terug'])){
	$time = strtotime($dat1);
$final = date("Y-m-d", strtotime("-1 month", $time));
$dat1 = $final;
$_SESSION['datum'] = $dat1; 
echo "<script type='text/javascript'> document.location = $loc.'.php'; </script>"; 
}
?>
<?php


$time1 = strtotime($dat1);

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
?>
</div>
<div class = "overlay" style="position: absolute;top:5%;left:40%;">
<?php
echo "<h1>". $mndnieuw . " " . $jaarx . "</h1>";
?>
</div>
<div class = "overlay" style="position: absolute;top:20%;left:2%;">

<div class="table-wrapper" style="width:100%; height:600px;">
<?php 
echo "<table>";
            echo "<tr>";
                echo "<th class='outside-while1'>Dag</th>";
                echo "<th class='outside-while3'>Datum</th>";
				echo "<th class='outside-while2'>Tijdvenster</th>";
				echo "<th class='outside-while2'>Project</th>";
                echo "<th class='outside-while2'>Personen</th>";
				echo "<th class='outside-while2'>Koffie1</th>";
				echo "<th class='outside-while2'>Koffie2</th>";
                echo "<th class='outside-while2'>Lunchtijd</th>";
				echo "<th class='outside-while2'>Koffie</th>";
				echo "<th class='outside-while2'>Koek</th>";
				echo "<th class='outside-while2'>Lunch</th>";
				echo "<th class='outside-while4'>Info</th>";
			echo "</tr>";
?>

<?php  
for ($w = 0; $w <= $days_count - 1; $w++){
  $month = date('n', strtotime($count. ' + ' . $w . ' days'));
  $year = date('Y', strtotime($count. ' + ' . $w . ' days'));
  $t = date('Y-n-j', strtotime($count. ' + ' . $w . ' days'));
  $t1 = date('Y-m-d', strtotime($count. ' + ' . $w . ' days'));
  $tijd1 = array();
  $inf= array();
  $pers = array();
  $ko1 = array();
  $ko2 = array();
  $lun1 = array();
  $pro = array();
  $kfx = array();
  $kkx = array();
  $llx = array();
  
  $sql = "SELECT * FROM $user ORDER BY `Datum`,`Begin` ASC";
  $ret = $db->query($sql);

    while($row = $ret->fetchArray(SQLITE3_ASSOC) ){  
	
	$tdd = $row['Datum'];
	if($tdd==$t1) {
	$stat = $row['Status'];	
	$txx1 = $row['Project']."*";
	$txx2 = $row['Begin'];
	$txx3 = $row['Eind'];
	$pers1 = $row['Personen']."*";
	$kof1 = $row['Koffie1']."*";
	$kof2 = $row['Koffie2']."*";
	$lun = $row['Lunch']."*";
	$info = $stat . "/" . $row['Info']."*";
	$koffiex = $row['Koffie']."*";
	$koekx= $row['Koek']."*";
	$lunchx = $row['Eten']."*";
	$tx = $txx2."-".$txx3."*";	
	array_push($tijd1,$tx);
	array_push($inf,$info);
	array_push($pro,$txx1);
	array_push($pers,$pers1);
	array_push($ko1,$kof1);
	array_push($ko2,$kof2);
	array_push($lun1,$lun);
	array_push($kfx,$koffiex);
	array_push($kkx,$koekx);
	array_push($llx,$lunchx);
	
	}
}

sort($tijd1);

$tdx = implode($tijd1);
$prj = implode($pro);
$txinfo = implode($inf);
$txpers = implode($pers);
$txkof1 = implode($ko1);
$txkof2 = implode($ko2);
$txlun = implode($lun1);
$txko = implode($kfx);
$txkoek = implode($kkx);
$txlunx = implode($llx);



$count1 = strtotime($count);
$count2=$count1 + ($w*86400);
  $td = str_replace("*", "\n", $tdx);
  $fo = str_replace("*", "\n", $txinfo);
  $pr = str_replace("*", "\n", $prj);
  $prs = str_replace("*", "\n", $txpers);
  $lu = str_replace("*", "\n", $txlun);
  $k1 = str_replace("*", "\n", $txkof1);
  $k2 = str_replace("*", "\n", $txkof2);
  $ko = str_replace("*", "\n", $txko);
  $kk = str_replace("*", "\n", $txkoek);
  $ll = str_replace("*", "\n", $txlunx);
  
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
                echo "<td class='inside-while1'>" . $wdnl . "</td>";
                echo "<td class='inside-while3'>" . $t1 . "</td>";
				echo nl2br('<td valign = "top" class="inside-while2">' . $td . '</td>');
				echo nl2br('<td valign = "top" class="inside-while2">' . $pr . '</td>');
				echo nl2br('<td valign = "top" class="inside-while2">' . $prs . '</td>');
				echo nl2br('<td valign = "top" class="inside-while2">' . $k1 . '</td>');
				echo nl2br('<td valign = "top" class="inside-while2">' . $k2 . '</td>');
				echo nl2br('<td valign = "top" class="inside-while2">' . $lu . '</td>');
				echo nl2br('<td valign = "top" class="inside-while2">' . $ko . '</td>');
				echo nl2br('<td valign = "top" class="inside-while2">' . $kk . '</td>');
				echo nl2br('<td valign = "top" class="inside-while2">' . $ll . '</td>');
				echo nl2br('<td valign = "top" class="inside-while4">' . $fo . '</td>');
				            
            echo "</tr>";
        }
        echo "</table><br><br></div>";
		



		?>

</div></div>

</body>

</html>
