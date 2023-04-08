<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/PHPMailer/src/Exception.php';
require 'PHPMailer/PHPMailer/src/PHPMailer.php';

session_start();



?>

<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
<title>Reserveer vergaderzaal</title>
<link rel="stylesheet" type="text/css" href="stylessl.css">
<script>
function basicPopup(url) {
popupWindow = window.open(url,'popUpWindow','height=600,width=600,left=50,top=50,resizable=yes,scrollbars=yes,toolbar=yes,menubar=no,location=no,directories=no, status=yes')
	}

</script>
<style>
html, body {
	overflow: scroll;
	height:auto;
}

img {
  border-radius: 10%;
}
.menu1 {
	position: absolute;
	top:20vw;
	left: 1%; 
	width: 15%; 
	text-align:left;"
}
.column {
  float: left;
  width: 15%;
  margin-right: 40px;
  height: 100%;
}
.overlay {
    position: fixed;
    width: 97%;
    height: auto;
    left: 0;
    top: 15%;
    
    z-index: 10;
} 

table, th, td {
  width: 100%;
  border: 1px solid white;
  font-size:0.75vw;
 
}
.outside-while1{
        border:1px solid #24521d;font-size:1.5vw;font-weight:500;
		color:#ffffff;
		background-color:#24521d;
		width:10%;
		text-align: left;
    }
.outside-while2{
        border:1px solid #24521d;font-size:1.5vw;font-weight:500;
		color:#ffffff;
		background-color:#24521d;
		width:10%;
		text-align: center;
    }
.outside-while3{
        border:1px solid #24521d;font-size:1.5vw;font-weight:500;
		color:#ffffff;
		background-color:#24521d;
		width:10%;
		text-align: left;
    }

.inside-while1{
        border:1px solid #a6a6a6;
		color:#000000;
		background-color:#6e9e67;
		width:10%;
		font-size:1.5vw;
		font-weight:300;
		padding:15px;
		text-align: left;
    }
	

.inside-while2{
        border:1px solid #a6a6a6;
		color:#000000;
		background-color:#6e9e67;
		width:10%;
		font-size:1.5vw;
		font-weight:300;
		text-align: center;
    }
.inside-while3{
        border:1px solid #a6a6a6;
		color:#000000;
		background-color:#6e9e67;
		width:10%;
		font-size:1.5vw;
		font-weight:300;
		text-align: left;
    }
#bg-image {
    height: 1000%;
    width: 100%;
    position: absolute;
   
	background-color: #489337;
	
}

input[type="submit"]{
    border-radius: 10px;
    border: none;
	background-color: #8C004A;
	color: white;
    box-shadow: none;
    font-family: inherit;
    font-size: 1.5vw;
}
input[type="number"]{
    border-radius: 5px;
    border: 1px solid black;
	background-color: #ABAAAA;
    box-shadow: none;
    font-family: inherit;
	width: 4vw;
    font-size: 2vw;
}
.button {
  background-color: #8C004A;
  border: none;
  border-radius:10%;
  color: white;
  width: 10vw;
  padding: 1px 1px;
  text-align: center;
  text-decoration: none;
  display: block;
  font-size: 1vw;
}
textarea {
	width:500px;
}
input {
	font-size:18px;
	border: 1px solid #8C004A;
}
th {
  position: -webkit-sticky;
  position: sticky;
  top: 0;
  z-index: 2;
}
td {
	font-size:0.75vw;
	padding-left:5px;
	padding-right:5px;
	padding-top:0px;
	padding-bottom:0px;
	color:white;
}		
a {
	color: #8C004A;
	font-size:1.5vw;
}
p {
	font-size:3w;
	color:#ffffff;
}
p2 {
	font-size:2vw;
	color:#ffffff;
}
p3 {
	font-size:2.5vw;
	color:#ffffff;
}
h9 {
	font-size:2.5vw;
	color:#8C004A;
}
@media screen and (max-width: 600px){


.menu1 {
	position: absolute;
	top:80vw;
	left: 1%; 
	width: 15%; 
	text-align:left;"
}
#tijd{
 width:120px; 
 font-size:12px; 
}
input[type="submit"]{
    border-radius: 10px;
    border: none;
	background-color: #8C004A;
	color: white;
    box-shadow: none;
    font-family: inherit;
	height: 10px;
    font-size: 2vw;
}
input[type="number"]{
    border-radius: 5px;
    border: 1px solid black;
	background-color: #ABAAAA;
    box-shadow: none;
    font-family: inherit;
	width: 20%;
	height: 20px;
    font-size: 3vw;
}
p {
	font-size:2vw;
	color:#ffffff;
}
p1 {
	font-size:3vw;
	color:#ffffff;
}
p2 {
	font-size:3vw;
	color:#ffffff;
}
p3 {
	font-size:2vw;
	color:#ffffff;
}
h9 {
	font-size:3vw;
	color:#8C004A;
}
a {
	font-size:2vw;
}
td {
	font-size:2vw;
}
input {
	font-size:10px;
}
input[type="number"]{
    border-radius: 5px;
    border: 1px solid black;
	background-color: #ABAAAA;
    box-shadow: none;
    font-family: inherit;
	width: 8vw;
    font-size: 3vw;
}
	.btn-group .button {
  background-color: white;
  border: 1px solid #8C004A;
  color: #333;
  
  text-align: left;
  text-decoration: none;
  font-size: 2vw;
  cursor: pointer;
  width: 25%;
  
  display: block;
	}
.btn-mail .button{
  background-color: #8C004A;
  border: none;
  color: #333;
  width: 150px;
  padding: 1px 1px;
  text-align: center;
  text-decoration: none;
  display: block;
  font-size: 12px;
}
.button {
  background-color: #8C004A;
  border: none;
  border-radius:10%;
  color: white;
  width: 10vw;
  padding: 1px 1px;
  text-align: center;
  text-decoration: none;
  display: block;
  font-size: 2vw;
}
textarea {
	width:200px;
}
.outside-while1{
        border:1px solid #a6a6a6;font-size:3vw;font-weight:500;
		color:#ffffff;
		min-width:50px;
		max-width:50px;
		text-align: center;
    }
.outside-while2{
        border:1px solid #a6a6a6;font-size:3vw;font-weight:500;
		color:#ffffff;
		min-width:50px;
		max-width:50px;
		text-align: center;
    }
.outside-while3{
        border:1px solid #a6a6a6;font-size:3vw;font-weight:500;
		color:#ffffff;
		min-width:50px;
		max-width:50px;
		text-align: center;
    }
.outside-while4{
        border:1px solid #a6a6a6;font-size:3vw;font-weight:500;
		color:#ffffff;
		min-width:75px;
		max-width:75px;
		text-align: center;
    }
.inside-while1{
        border:1px solid #a6a6a6;
		color:#000000;
		
		font-size:3vw;
		font-weight:300;
		padding:2px;
		text-align: left;
    }
	

.inside-while2{
        border:1px solid #a6a6a6;
		color:#000000;
		
		font-size:3vw;
		font-weight:300;
		text-align: left;
    }
.inside-while3{
        border:1px solid #a6a6a6;
		color:#000000;
		
		font-size:3vw;
		font-weight:300;
		text-align: center;
    }
.inside-while4{
        border:1px solid #a6a6a6;
		color:#000000;
		
		font-size:3vw;
		font-weight:300;
		text-align: left;
    }
.outside-while{
        border:1px solid #a6a6a6;font-size:1vw;font-weight:500;
		color:#a6a6a6;
		text-align: center;
    }
.inside-while{
        border:1px solid #a6a6a6;
		color:#a6a6a6;
		font-size:2.5vw;
		font-weight:500;
		text-align: center;
    }	
}
</style> 

</head>
<body >


<div id="bg-image"></div>

<div style="position: absolute;top:0%;left: 2%; text-align:left;">
<img src="WerkPro logo.png" style="width:20%;height:auto;"; class = "center"></div>

<div style="position: absolute;top:0%;right: 2%; text-align:right;">
<img src="WerkPro logo.png" style="width:20%;height:auto;"; class = "center"></div>

<div style="position: absolute;top:7vw;left: 2%; text-align:left; font-size:1vw">
<br><br>
<button class = "button" onclick="location.href='lokatie.php'" type="button" >
         Locatie kiezen</button><br>
<button class = "button" onclick="location.href='datum.php'" type="button" >
         Op datum zoeken</button>

</div>
<div style="position: absolute;top:2%;left: 1%; width:100%; text-align:left;">