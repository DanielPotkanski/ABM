<?php  
 $connect = mysqli_connect("127.0.0.1", "ignacybrawura", "12345678De", "ignacybrawura"); 
 $output = '';
 $test = "SELECT * FROM Rezerwacja WHERE ID_MiejscePracy = '".$_POST["ID_MiejscePracy"]."' AND ((StartRezerwacjiH >= '".$_POST["StartRezerwacjiH"]."' AND KoniecRezerwacjiH < '".$_POST["KoniecRezerwacjiH"]."') OR (StartRezerwacjiH > '".$_POST["StartRezerwacjiH"]."' AND StartRezerwacjiH < '".$_POST["KoniecRezerwacjiH"]."') OR (StartRezerwacjiH <= '".$_POST["StartRezerwacjiH"]."' AND KoniecRezerwacjiH >= '".$_POST["KoniecRezerwacjiH"]."') OR (KoniecRezerwacjiH > '".$_POST["StartRezerwacjiH"]."' AND KoniecRezerwacjiH < '".$_POST["KoniecRezerwacjiH"]."'))";
 $result = mysqli_query($connect, $test);
 
 if (mysqli_num_rows($result) > 0){
     echo 'To miejsce jest juz zajete! Zmien miejsce lub czas rezerwacji.';
 }
 else{
    $sql = "INSERT INTO Rezerwacja(ID_MiejscePracy, StartRezerwacjiH, KoniecRezerwacjiH, Imie, Nazwisko, Telefon, Email, Opis) VALUES('".$_POST["ID_MiejscePracy"]."', '".$_POST["StartRezerwacjiH"]."', '".$_POST["KoniecRezerwacjiH"]."','".$_POST["Imie"]."','".$_POST["Nazwisko"]."','".$_POST["Telefon"]."','".$_POST["Email"]."','".$_POST["Opis"]."')";
     if(mysqli_query($connect, $sql)){ 
        echo 'Dane zostaly pomyslnie wstawione.';
        $try = mysqli_query($connect, "SELECT s.rodzaj FROM `Sprzet` as s INNER JOIN `Rezerwacja` as r ON s.stanowiskopracy = r.ID_MiejscePracy WHERE (r.ID_MiejscePracy = '".$_POST["ID_MiejscePracy"]."' AND r.StartRezerwacjiH = '".$_POST["StartRezerwacjiH"]."' AND r.KoniecRezerwacjiH =  '".$_POST["KoniecRezerwacjiH"]."')");
        if(mysqli_num_rows($try) > 0){
            echo "Na miejscu jest nastepujacy sprzet: \n";
            while($row = mysqli_fetch_array($try)){
                echo  "\n".$row[0];
            }
        }
        else{
            echo "Do tego miejsca nie ma poki co przypisanego sprzetu. ";
        }
    }
 }
 

 
 ?> 