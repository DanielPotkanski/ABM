<?php  
 $connect = mysqli_connect("127.0.0.1", "ignacybrawura", "12345678De", "ignacybrawura");
 $output = '';  
 $sql = "SELECT * FROM Sprzet ORDER BY id DESC";  
 $result = mysqli_query($connect, $sql);  
 $output .= '  
      <div class="table-responsive">  
           <table class="table table-bordered">  
                <tr>  
                     <th width="10%">Rodzaj</th>  
                     <th width="15%">Model</th> 
					 <th width="15%">Oznaczenie</th>
					 <th width="10%">Rok Zakupu</th>
					 <th width="10%">Wartosc</th>
					 <th width="10%">Opis</th>
					 <th width="20%">Stanowisko Pracy</th>
                     <th width="10%">Usun</th>  
                </tr>';  
 if(mysqli_num_rows($result) > 0)  
 {  
      while($row = mysqli_fetch_array($result))  
      {  
           $output .= '  
                <tr>    
                     <td class="rodzaj" data-id1b="'.$row["id"].'" contenteditable>'.$row["rodzaj"].'</td> 
					 <td class="model" data-id2b="'.$row["id"].'" contenteditable>'.$row["model"].'</td> 
					 <td class="oznaczenie" data-id3b="'.$row["id"].'" contenteditable>'.$row["oznaczenie"].'</td>
					 <td class="rokzakupu" data-id4b="'.$row["id"].'" contenteditable>'.$row["rokzakupu"].'</td> 
 					 <td class="wartosc" data-id5b="'.$row["id"].'" contenteditable>'.$row["wartosc"].'</td>
					 <td class="opisb" data-id6b="'.$row["id"].'" contenteditable>'.$row["opisb"].'</td>
					 <td class="stanowiskopracy" data-id7b="'.$row["id"].'" contenteditable>'.$row["stanowiskopracy"].'</td>
                     <td><button type="button" name="delete_btn" data-id8b="'.$row["id"].'" class="btn btn-xs btn-danger btn_delete2">x</button></td>  
                </tr>  
           ';  
      }  
      $output .= '  
           <tr>   
                <td id="rodzaj" contenteditable></td> 
				<td id="model" contenteditable></td>
				<td id="oznaczenie" contenteditable></td>
				<td id="rokzakupu" contenteditable></td>
				<td id="wartosc" contenteditable></td>
				<td id="opisb" contenteditable></td>
				<td id="stanowiskopracy" contenteditable></td>
                <td><button type="button" name="btn_add2" id="btn_add2" class="btn btn-xs btn-success">+</button></td>  
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