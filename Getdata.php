<?php
$dat = $_GET["datum"];
class MyDB extends SQLite3
   {
      function __construct()
      {
         $this->open('Vergaderzaal.db');
      }
   }
   $db = new MyDB();
   if(!$db){
      echo $db->lastErrorMsg();
   } else {
      
   } 

$sql = "SELECT * FROM `reserveer` WHERE `Datum` = '$dat'";
$ret = $db->query($sql);
          
		$response["naam"] = array();   
        while($row = $ret->fetchArray(SQLITE3_ASSOC) ){		
		
			foreach ($row as $col => $val) {
                
				array_push($response["naam"], $val);
			}
                
            
        }
        
echo json_encode($response);
	?>