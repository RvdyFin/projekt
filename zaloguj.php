<?php
if(isset($_POST['wyslij'])){
    $serwer = 'localhost';
    $db_user = 'root';
    $password = '';
    $baza = 'ksiegarnia';

    $do_bazy = mysqli_connect($serwer,$db_user,$password,$baza);
    if(!$do_bazy===true){
        exit('Błąd połączenia z bazą danych!');
    }
    else{
        $password = $_POST['password'];
        $password_hash = password_hash($password, PASSWORD_DEFAULT);
        $username = $_POST['username'];
        $zapytanie = mysqli_query($do_bazy,"SELECT haslo, id FROM uzytkownicy where login='".$username."';");
        if(!$zapytanie===true){
            mysqli_close($do_bazy);
            exit('Błąd zapytania!');
        }else{
            if(mysqli_num_rows($zapytanie)>0){
                $row = mysqli_fetch_array($zapytanie);
                if(password_verify($_POST['password'], $row['haslo'])){
                    session_start();
                    $_SESSION['zalogowany']=true;
                    $_SESSION['name']=$_POST['username'];
                    $_SESSION['id']=$row['id'];
                    mysqli_close($do_bazy);
                    header('Location: index.php');
                }
            }
            else{
                echo ("<script LANGUAGE='JavaScript'>
                window.location.href='logowanie.php';
                window.alert('Błąd logowania!');
                </script>");
            }
        }
    }
}else{
    header('Location: logowanie.php');
}
?>