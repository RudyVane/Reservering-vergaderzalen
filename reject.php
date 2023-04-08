<?php

$dat = $_GET['datum'];
$begin = $_GET['begin'];
$eind = $_GET['eind'];
$mail = $_GET['mail'];
$lok = $_GET['lokl'];
$uniek = $_GET['uniek'];
$msg="Helaas is uw reservering voor vergaderzaal " . $lok . "op " . $dat . ", van " . $begin . " tot " . $eind . " niet goedgekeurd.";
// send email
mail($mail,"Afwijzing reservering Vergaderruimte " . $lok ,$msg,"From: info@werkpro.nl");
echo "Afwijzing verstuurd";
?>