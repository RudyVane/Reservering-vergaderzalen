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
<title>Reserveer Bus</title>
<link rel="stylesheet" type="text/css" href="stylessl.css">
<script>
function basicPopup(url) {
popupWindow = window.open(url,'popUpWindow','height=600,width=600,left=50,top=50,resizable=yes,scrollbars=yes,toolbar=yes,menubar=no,location=no,directories=no, status=yes')
	}

</script>
<style>


.img1 {
	width:8vw;
	height:8vw;
	
}
.img2 {
	width:3vw;
	height:3vw;
	position: absolute;top:6vw;left: 2vw;
    -webkit-animation: spin 4s infinite linear;
}
.img3 {
	width:4vw;
	height:4vw;
	position: absolute;top:9vw;left: 4.5vw; 
    -webkit-animation: spin1 4s infinite linear;
}
.logo1 {
	position: absolute;top:5.5vw;left: 3.5vw;width:3vw;height:3vw;
    -webkit-animation: spin 4s infinite linear;
}
@-webkit-keyframes spin {
    0%  {-webkit-transform: rotate(0deg);}
    100% {-webkit-transform: rotate(360deg);}   
}

.logo2 {
	position: absolute;top:8.5vw;left: 6vw; width:4vw;height:4vw;
    -webkit-animation: spin1 4s infinite linear;
}
@-webkit-keyframes spin1 {
    0%  {-webkit-transform: rotate(360deg);}
    100% {-webkit-transform: rotate(0deg);}   
}
#bg-image {
    height: 100%;
    width: 100%;
    position: absolute;
    background-image: url(Gebouw.png);
    background-position: center center;
    background-repeat: no-repeat;
    background-size: 100% 100%;
	
    opacity: 0.6;
}
#tijd{
 width:120px; 
 font-size:18px; 
}
input[type="submit"]{
    border-radius: 10px;
    border: none;
	background-color: #88CFBE;
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
	width: 5%;
    font-size: 2vw;
}
.button {
  background-color: #88CFBE;
  border: none;
  color: #333;
  width: 500px;
  padding: 1px 1px;
  text-align: center;
  text-decoration: none;
  display: block;
  font-size: 12px;
}
textarea {
	width:500px;
}
input {
	font-size:18px;
	border: 1px solid #88CFBE;
}
td {
	font-size:2vw;
}		
a {
	color: #88CFBE;
	font-size:2vw;
}
p {
	font-size:3w;
	color:#000000;
}
p2 {
	font-size:2vw;
	color:#000000;
}
h9 {
	font-size:2.5vw;
}
@media screen and (max-width: 600px) and (orientation: portrait){

#tijd{
 width:120px; 
 font-size:12px; 
}
input[type="submit"]{
    border-radius: 10px;
    border: none;
	background-color: #88CFBE;
    box-shadow: none;
    font-family: inherit;
	height: 30px;
    font-size: 3vw;
}
input[type="number"]{
    border-radius: 5px;
    border: 1px solid black;
	background-color: #ABAAAA;
    box-shadow: none;
    font-family: inherit;
	width: 20%;
	height: 30px;
    font-size: 3vw;
}
p {
	font-size:3vw;
	color:#000000;
}
p1 {
	font-size:4vw;
	color:#88CFBE;
}
p2 {
	font-size:4vw;
	color:#000000;
}
h9 {
	font-size:5vw;
}
a {
	font-size:4vw;
}
td {
	font-size:4vw;
}
input {
	font-size:10px;
}
	.btn-group .button {
  background-color: white;
  border: 1px solid #88CFBE;
  color: #333;
  
  text-align: left;
  text-decoration: none;
  font-size: 3vw;
  cursor: pointer;
  width: 25%;
  
  display: block;
	}
.btn-mail .button{
  background-color: #88CFBE;
  border: none;
  color: #333;
  width: 200px;
  padding: 1px 1px;
  text-align: center;
  text-decoration: none;
  display: block;
  font-size: 12px;
}
textarea {
	width:200px;
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
<div style="position: absolute;top:0%;right: 2%; text-align:right;">
<img src="WerkPro logo.png" style="width:20%;height:auto;"; class = "center"></div>

<div style="position: absolute;top:1vw;left: 1vw; ">	
<img class = "img1"src="logo.png" ></div>
<img class = "img2" src="wiel.png" >
<img class = "img3"src="wiel.png" >
</div>
<div class = "container" style="position: absolute;top:40%;left: 2%; text-align:left;">
<br><br>
<a href = "index.php">Terug</a>
</div>
<div style="position: absolute;top:2%;left: 1%; width:100%; text-align:left;">