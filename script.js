function czas() {
    let date = new Date(); 
    let hh = date.getHours();
    let mm = date.getMinutes();
    let ss = date.getSeconds();
    let rok = date.getFullYear();
    let mies = date.getMonth() + 1;
    let dzien = date.getDate();
    
    if(ss<10){
      ss = "0" + ss;
    }
    if(mm<10){
      mm = "0" + mm;
    }
    if(hh<10){
      hh = "0" + hh;
    }
    if(dzien<10){
      dzien = "0" + dzien;
    }
    if(mies<10){
      mies = "0" + mies;
    }
  
    let time = hh + ":" + mm + ":" + ss + " " + dzien + "." + mies + "." + rok;;
  
    document.getElementById("czas").innerText =  time; 
    let t = setTimeout(function(){ czas() }, 1000);
  }
  czas();
  function checkForm(){
		document.getElementById('reg_alert').innerHTML = "";
		var username = document.forms["rejestracja"]["username"].value;
		var password = document.forms["rejestracja"]["password"].value;
		var password_check = document.forms["rejestracja"]["password_check"].value;
		var email = document.forms["rejestracja"]["email"].value;
		var imie = document.forms["rejestracja"]["imie"].value;
		var nazwisko = document.forms["rejestracja"]["nazwisko"].value;
		var miejscowosc = document.forms["rejestracja"]["miejscowosc"].value;
		var ulica = document.forms["rejestracja"]["ulica"].value;
		var nr_domu = document.forms["rejestracja"]["nr_domu"].value;
		var kod_pocztowy = document.forms["rejestracja"]["kod_pocztowy"].value;
		var nr_tel = document.forms["rejestracja"]["nr_tel"].value;
		if((username == null || username == "") || (password == null || password == "") || (password_check == null || password_check == "") || (email == null || email == "") || (imie == null || imie == "") || (nazwisko == null || nazwisko == "") || (miejscowosc == null || miejscowosc == "") || (ulica == null || ulica == "") || (nr_domu == null || nr_domu == "") || (kod_pocztowy == null || kod_pocztowy == "") || (nr_tel == null || nr_tel == "")){
			document.getElementById('reg_alert').style.color = "red";
			document.getElementById('reg_alert').innerHTML = "Wypełnij wszystkie pola!";
			return false;
		}else{
			if(password !== password_check){
				document.getElementById('reg_alert').style.color = "red";
				document.getElementById('reg_alert').innerHTML = "Hasła nie są takie same!";
				return false;
			}else{
				return true;
			}
		}
	}