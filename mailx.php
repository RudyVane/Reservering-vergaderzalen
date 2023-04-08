<?php
include('header.php');
?>
<div class = "container" style="position: absolute;top:3%;left: 10%; text-align:left;">	
<h9>Reserveren vergaderzaal Protonstraat 6</h9>
<br><br>
<p1>Overzicht beschikbare uren</p1>
<p>In dit overzicht kunt u nog geen dagen aanklikken, dat komt op de volgende pagina!</p>
<br><iframe class="responsive-iframe" src="https://outlook.live.com/owa/calendar/48342298-900a-479a-8fed-416f3002bed4/c98b8f30-bc66-4099-8a7a-91d9c7cbea2d/cid-1AB6A1D550822EF2/index.html" style="border:solid 1px #777" width="1200" height="500" frameborder="0">
</iframe>
<br><br>
<div style = "text-align:center">
<form action="mailx2.php" method="post" onsubmit="target_popup(this)">
<p>Hoeveel dagen wilt u reserveren?</p><br>
<input type="number" id = "x" name="tel" min="1" max="10" style='width:4vw;height:3vw;font-size:2vw;' required >
<input type = "submit" id = "OK" name="OK" value = "RESERVEREN" style = "color: black; font-size:24px;">
</form>
<script>
function target_popup(form) {
    window.open('', 'formpopup', 'width=600,height=800,resizeable,scrollbars');
    form.target = 'formpopup';
}
</script>

</body>
</html>	