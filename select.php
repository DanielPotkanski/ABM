<?php  
 $connect = mysqli_connect("127.0.0.1", "ignacybrawura", "12345678De", "ignacybrawura");
 $output = '';  
 $sql = "SELECT * FROM Rezerwacja ORDER BY id DESC";  
 $result = mysqli_query($connect, $sql);  
 $output .= '  
      <div class="table-responsive">  
           <table class="table table-bordered">  
                <tr>  
                     
                     <th width="10%">ID Miejsca Pracy </th>  
                     <th width="15%">Start Rezerwacji </th> 
					 <th width="15%">Koniec Rezerwacji </th>
					 <th width="10%">Imie </th>
					 <th width="10%">Nazwisko </th>
					 <th width="10%">Telefon </th>
					 <th width="10%">Email </th>
					 <th width="10%">Opis </th>
                     <th width="10%">Usun</th>  
                </tr>';  
 if(mysqli_num_rows($result) > 0)  
 {  
      while($row = mysqli_fetch_array($result))  
      {  
           $output .= '  
                <tr>    
                     <td class="ID_MiejscePracy" data-id1="'.$row["id"].'">'.$row["ID_MiejscePracy"].'</td> 
					 <td class="StartRezerwacjiH" data-id2="'.$row["id"].'">'.$row["StartRezerwacjiH"].'</td> 
					 <td class="KoniecRezerwacjiH" data-id3="'.$row["id"].'">'.$row["KoniecRezerwacjiH"].'</td>
					 <td class="Imie" data-id4="'.$row["id"].'">'.$row["Imie"].'</td> 
 					 <td class="Nazwisko" data-id5="'.$row["id"].'">'.$row["Nazwisko"].'</td>
					 <td class="Telefon" data-id6="'.$row["id"].'">'.$row["Telefon"].'</td>
					 <td class="Email" data-id7="'.$row["id"].'">'.$row["Email"].'</td>
					 <td class="Opis" data-id8="'.$row["id"].'">'.$row["Opis"].'</td>
                     <td><button type="button" name="delete_btn" data-id9="'.$row["id"].'" class="btn btn-xs btn-danger btn_delete">x</button></td>  
                </tr>  
           ';  
      }  
      $output .= '  
           <tr>   
                <td id="ID_MiejscePracy" contenteditable></td> 
				<td id="StartRezerwacjiH" contenteditable></td>
				<td id="KoniecRezerwacjiH" contenteditable></td>
				<td id="Imie" contenteditable></td>
				<td id="Nazwisko" contenteditable></td>
				<td id="Telefon" contenteditable></td>
				<td id="Email" contenteditable></td>
				<td id="Opis" contenteditable></td>
                <td><button type="button" name="btn_add" id="btn_add" class="btn btn-xs btn-success">+</button></td>  
           </tr>  
      ';  
 }  
 else  
 {  
      $output .= '<tr>  
                          <td colspan="4">Data not Found</td>  
                     </tr>';  
 }  
 $output .= '</table>  
      </div>';  
 echo $output;  
 ?>