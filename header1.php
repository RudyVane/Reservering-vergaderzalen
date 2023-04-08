
<!DOCTYPE html>
<html>
<head>
<style> 
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
.img {
  width: 500px;
  height: 1000px;
  background-image: url("logotrans.png");
  position: relative;
  background-repeat:no-repeat;
  animation: move 5s infinite alternate;
  
}
@keyframes move {
  from {top: 50px;}
  to {top: 200px;}
  
}

</style>
</head>
<body>

<body >

<div class = "img"></div>
</body>
</html>



