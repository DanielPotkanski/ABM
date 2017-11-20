<?php  
 $connect = mysqli_connect("127.0.0.1", "ignacybrawura", "12345678De", "ignacybrawura");   
 $id = $_POST["id"];  
 $text = $_POST["text"];  
 $column_name = $_POST["column_name"];  
 $sql = "UPDATE Sprzet SET ".$column_name."='".$text."' WHERE id='".$id."'";  
 if(mysqli_query($connect, $sql))  
 {  
      echo 'Dane zostaly pomyslnie zmodyfikowane.';  
 }  
 ?>