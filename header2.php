
<!DOCTYPE html>
<html>
<head>
<style> 
.container {	
  width: 100vmin;
  height: 100vmin;
}
.dot {
  width:500px;
  height:300px;
  --d:radial-gradient(farthest-side,#ff00ff 90%,#0000);
  background:var(--d),var(--d),var(--d),var(--d);
  background-size:20px 20px;
  background-repeat:no-repeat;
  animation:mymove 1s infinite alternate;
}

@keyframes mymove {
  
  0%{background-position:calc(0*100%/3) 100%, calc(1*100%/3) 100%, calc(2*100%/3) 100%, calc(3*100%/3) 100%}
  12.5%{background-position:calc(0*100%/3) 0   , calc(1*100%/3) 100%, calc(2*100%/3) 100%, calc(3*100%/3) 100%}
  25%{background-position:calc(0*100%/3) 0   , calc(1*100%/3) 0   , calc(2*100%/3) 100%, calc(3*100%/3) 100%}
  37.5%{background-position:calc(0*100%/3) 0   , calc(1*100%/3) 0   , calc(2*100%/3) 0   , calc(3*100%/3) 100%}
  50%{background-position:calc(0*100%/3) 0   , calc(1*100%/3) 0   , calc(2*100%/3) 0   , calc(3*100%/3) 0   }
  62.5%{background-position:calc(0*100%/3) 100%, calc(1*100%/3) 0   , calc(2*100%/3) 0   , calc(3*100%/3) 0   }
  75%{background-position:calc(0*100%/3) 100%, calc(1*100%/3) 100%, calc(2*100%/3) 0   , calc(3*100%/3) 0   }
  87.5%{background-position:calc(0*100%/3) 100%, calc(1*100%/3) 100%, calc(2*100%/3) 100%, calc(3*100%/3) 0   }
  100%{background-position:calc(0*100%/3) 100%, calc(1*100%/3) 100%, calc(2*100%/3) 100%, calc(3*100%/3) 100%}
  
}

@keyframes move {
  from {top: 50px;}
  to {top: 200px;}
  
}
.logo1 {
    -webkit-animation: spin 4s infinite linear;
}
@-webkit-keyframes spin {
    0%  {-webkit-transform: rotate(0deg);}
    100% {-webkit-transform: rotate(360deg);}   
}

.logo2 {
    -webkit-animation: spin1 4s infinite linear;
}
@-webkit-keyframes spin1 {
    0%  {-webkit-transform: rotate(360deg);}
    100% {-webkit-transform: rotate(0deg);}   
}



@keyframes move {
  from {top: 50px;}
  to {top: 200px;}
  
}
.img1 {
	width:25vmin;
	height:25vmin;
}
.img2 {
	width:6vmin;
	height:6vmin;
}
.img3 {
	width:8vmin;
	height:8vmin;
}
</style>
</head>


<body >
<div class = "container">
<div style="position: absolute;top:1vmin;left: 0vmin; ">	
<img class = "img1"src="logo1b.png" >
</div>
<div class = "logo1" style="position: absolute;top:11.5vmin;left: 6.5vmin; ">
<img class = "img2" src="logowiel2b.png" >
</div>
<div class = "logo2" style="position: absolute;top:17vmin;left: 12.5vmin; ">
<img class = "img3"src="logowiel1b.png" >
</div>
</body>
</html>



