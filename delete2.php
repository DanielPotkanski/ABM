<?php  
 $connect = mysqli_connect("127.0.0.1", "ignacybrawura", "12345678De", "ignacybrawura");  
 $sql = "DELETE FROM Sprzet WHERE id = '".$_POST["id"]."'";  
 if(mysqli_query($connect, $sql))  
 {  
      echo 'Dane zostaly pomyslnie usuniete.';  
 }  
 ?>