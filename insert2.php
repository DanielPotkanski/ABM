<?php  
 $connect = mysqli_connect("127.0.0.1", "ignacybrawura", "12345678De", "ignacybrawura"); 
 $sql = "INSERT INTO Sprzet(rodzaj, model, oznaczenie, rokzakupu, wartosc, opisb, stanowiskopracy) VALUES('".$_POST["rodzaj"]."', '".$_POST["model"]."','".$_POST["oznaczenie"]."', '".$_POST["rokzakupu"]."','".$_POST["wartosc"]."','".$_POST["opisb"]."','".$_POST["stanowiskopracy"]."')";  
 if(mysqli_query($connect, $sql))  
 { 
      echo 'Dane zostaly pomyslnie wstawione';  
 }  
 ?> 