<html>  
      <head>  
           <title>Prosty System Rezerwacyjny</title>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
      </head>  
      <body>  
           <div class="container">  
                <br />  
                <br />  
                <br />  
                <div class="table-responsive">  
                     <h3 align="center">Dokonaj Rezerwacji</h3><br />  
                     <div id="live_data"></div> 
                </div> 
                <div class="table-responsive">  
                     <h3 align="center">Przypisz wyposażenie</h3><br />  
                     <div id="live_data2"></div> 
                </div> 
           </div>  
      </body>  
 </html>  
 <script> 
    	       
function validString(input){
	return !(/[\\/&;]/.test(input));
}
        
function isNumber(n){
       return !isNaN(parseFloat(n)) && isFinite(n);
}
        
function validateEmail(email){
	var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
	return re.test(email);
}
    
 $(document).ready(function(){  
 
      function fetch_data()  
      {  
           $.ajax({  
                url:"select.php",  
                method:"POST", 
		success:function(data){  
                     $('#live_data').html(data);  
                }  
           });  
      }
	fetch_data();	  
	
	
		function fetch_data2()  
      {  
           $.ajax({  
                url:"select2.php",  
                method:"POST", 
		success:function(data){  
                     $('#live_data2').html(data);  
                }  
           });  
      } 
	  
      fetch_data2(); 

	  
	  
	// INSERT TAB 1	  
	
	
	
      $(document).on('click', '#btn_add', function(){ 
           var ID_MiejscePracy = $('#ID_MiejscePracy').text();  
           var StartRezerwacjiH = $('#StartRezerwacjiH').text();
		   var KoniecRezerwacjiH = $('#KoniecRezerwacjiH').text(); 
		   var Imie = $('#Imie').text();
		   var Nazwisko = $('#Nazwisko').text();
		   var Telefon = $('#Telefon').text();
		   var Email = $('#Email').text();
		   var Opis = $('#Opis').text();
           
           if(ID_MiejscePracy == '' || !(isNumber(ID_MiejscePracy)) || ID_MiejscePracy < 0 || ID_MiejscePracy > 100) 
           {  
                alert("Wprowadz do ID Miejsca Pracy wartosc numeryczna w zakresie (0,100)"); 
                return false;  
           }  
           if(StartRezerwacjiH == '')  
           {  
                alert("Wprowadz Start Rezerwacji ");  
                return false;  
           }
           if(isNaN(Date.parse(StartRezerwacjiH)))
           {
                alert("Wprowadz Start Rezerwacji w formacie -> YYYY-MM-DD HH:DD:SS");  
                return false;  
           }           
		   if(KoniecRezerwacjiH == '')  
           {  
                alert("Wprowadz Koniec Rezerwacji ");  
                return false;  
           }   
           if(isNaN(Date.parse(KoniecRezerwacjiH)))
           {
                alert("Wprowadz Koniec Rezerwacji w formacie -> YYYY-MM-DD HH:DD:SS");  
                return false;  
           }
           if(StartRezerwacjiH >= KoniecRezerwacjiH)  
           {  
                alert("Start Rezerwacji powinien byc wczesniej Koniec Rezerwacji");  
                return false;  
           } 
		   if(!(validString(Imie)) || Imie == '')
           {  
                alert("Wprowadz do Imie alfabetyczne znaki");  
                return false;  
           }
		    if(!(validString(Nazwisko)) || Nazwisko == '') 
           {  
                alert("Wprowadz do Nazwisko alfabetyczne znaki");  
                return false;  
           }  
		    if(!(isNumber(Telefon)) || Telefon == '') 
           {  
                alert("Wprowadz do Telefon cyfry w formacie -> XXXXXXXXX");  
                return false;  
           }  
		   if(!(validateEmail(Email)) || Email == '') 
           {  
                alert("Wprowadz Email w formacie -> xxx@yyy.zzz");  
                return false;  
           }  
		   if(!(validString(Opis)) || Opis == '') 
           {  
                alert("Wprowadz do Opis alfabetyczne znaki");  
                return false;  
           }  
           
           $.ajax({  
                url:"insert.php",  
                method:"POST",  
                data:{ID_MiejscePracy:ID_MiejscePracy, StartRezerwacjiH:StartRezerwacjiH, KoniecRezerwacjiH:KoniecRezerwacjiH, Imie:Imie, Nazwisko:Nazwisko, Telefon:Telefon, Email:Email, Opis:Opis,},    
                success:function(data)  
                {  
                     alert(data);  
                     fetch_data();  
                }  
           })  
      });
	  
	  
	  // INSERT TAB 2

	$(document).on('click', '#btn_add2', function(){  
        var rodzaj = $('#rodzaj').text();  
        var model = $('#model').text();
	var oznaczenie = $('#oznaczenie').text(); 
	var rokzakupu = $('#rokzakupu').text();
	var wartosc = $('#wartosc').text();
	var opisb = $('#opisb').text();
	var stanowiskopracy = $('#stanowiskopracy').text();
		   
		 
           if(!(validString(rodzaj)) || rodzaj == '') 
           {  
                alert("Wprowadz do Rodzaj tylko alfabetyczne znaki "); 
                return false;  
           }  
           if(model == '')  
           {  
                alert("Wprowadz Model");  
                return false;  
           } 
           if(oznaczenie == '')  
           {  
                alert("Wprowadz Oznaczenie");  
                return false;  
           } 
           if(!(isNumber(rokzakupu)) || rokzakupu == '')
           {
                alert("Wprowadz Rok Zakupu w formacie -> YYYY");  
                return false;  
           }
		   if(!(isNumber(wartosc)) || wartosc == '')  
           {  
                alert("Wprowadz Wartosc w formacie -> x.y");  
                return false;  
           }   
          
		   if(!(validString(opisb)) || opisb == '') 
           {  
                alert("Wprowadz do Opis alfabetyczne znaki");  
                return false;  
           }  
		   if(stanowiskopracy == '' || !(isNumber(stanowiskopracy)) || stanowiskopracy < 0 || stanowiskopracy > 100) 
           {  
                alert("Wprowadz do Stanowisko Pracy wartosc numeryczna w zakresie (0,100)"); 
                return false;  
           }  
           
           $.ajax({  
                url:"insert2.php",  
                method:"POST",  
                data:{rodzaj:rodzaj, model:model, oznaczenie:oznaczenie, rokzakupu:rokzakupu, wartosc:wartosc, opisb:opisb, stanowiskopracy:stanowiskopracy},    
                success:function(data)  
                {  
                     alert(data);  
                     fetch_data2();  
                }  
           })  
      });	
  
	  // EDIT TABLE 2
	  
      function edit_data2(id, text, column_name)  
      {  
           $.ajax({  
                url:"edit2.php",  
                method:"POST",  
                data:{id:id, text:text, column_name:column_name},               
				success:function(data){  
                     alert(data);  
                }  
           });  
      } 
	  
	  
	  // METHODS TABLE 2
	  
	  
	  $(document).on('blur', '.rodzaj', function(){  
           var id = $(this).data("id1b");  
           var rodzaj = $(this).text();
           if(!(validString(rodzaj)) || rodzaj == '') 
           {  
                alert("Wprowadz do Rodzaj alfabetyczne znaki "); 
                return false;  
           } 
           edit_data2(id, rodzaj, "rodzaj");  
      });
	  $(document).on('blur', '.model', function(){  
           var id = $(this).data("id2b");  
           var model = $(this).text();
           if(model == '')  
           {  
                alert("Wprowadz Model");  
                return false;  
           } 
           edit_data2(id, model, "model");  
      });
	  $(document).on('blur', '.oznaczenie', function(){  
           var id = $(this).data("id3b");  
           var oznaczenie = $(this).text();
           if(!(validString(oznaczenie)) || oznaczenie == '') 
           {  
                alert("Wprowadz Oznaczenie");  
                return false;  
           } 
           edit_data2(id, oznaczenie, "oznaczenie");  
      });
	  $(document).on('blur', '.rokzakupu', function(){  
           var id = $(this).data("id4b");  
           var rokzakupu = $(this).text();
           if(!(isNumber(rokzakupu)) || rokzakupu == '')
           {
                alert("Wprowadz Rok Zakupu w formacie -> (YYYY)");  
                return false;  
           }
           edit_data2(id, rokzakupu, "rokzakupu");  
      });
	  $(document).on('blur', '.wartosc', function(){  
           var id = $(this).data("id5b");  
           var wartosc = $(this).text();
           if(!(isNumber(wartosc)) || wartosc == '')  
           {  
                alert("Wprowadz Wartosc w formacie -> x.y");  
                return false;  
           }     
           edit_data2(id, wartosc, "wartosc");  
      });
	  $(document).on('blur', '.opisb', function(){  
           var id = $(this).data("id6b");  
           var opisb = $(this).text();
           if(!(validString(opisb)) || opisb == '') 
           {  
                alert("Wprowadz do Opis alfabetyczne znaki");  
                return false;  
           } 
           edit_data2(id, opisb, "opisb");  
      });
	  $(document).on('blur', '.stanowiskopracy', function(){  
           var id = $(this).data("id7b");  
           var stanowiskopracy = $(this).text();
           if(stanowiskopracy == '' || !(isNumber(stanowiskopracy)) || stanowiskopracy < 0 || stanowiskopracy > 100) 
           {  
                alert("Wprowadz do Stanowisko Pracy wartosc numeryczna w zakresie (0,100)"); 
                return false;  
           }  
           edit_data2(id, stanowiskopracy, "stanowiskopracy");  
      });
	  
	  
	  // DELETE TAB 1
	  
	  
      $(document).on('click', '.btn_delete', function(){  
           var id=$(this).data("id9");  
           if(confirm("Czy napewno chcesz usunac ten rekord?"))  
           {  
                $.ajax({  
                     url:"delete.php",  
                     method:"POST",  
                     data:{id:id},					 		 
                     success:function(data){  
                          alert(data);  
                          fetch_data();  
                     }  
                });  
           }  
      }); 
		// DELETE TAB 2

		$(document).on('click', '.btn_delete2', function(){  
           var id=$(this).data("id8b");  
           if(confirm("Czy napewno chcesz usunac ten rekord?"))  
           {  
                $.ajax({  
                     url:"delete2.php",  
                     method:"POST",  
                     data:{id:id},					 		 
                     success:function(data){  
                          alert(data);  
                          fetch_data2();  
                     }  
                });  
           }  
      
	  }); 

 });  
 </script>
