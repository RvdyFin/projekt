<?php
if(isset($_POST['wyslij'])){
    $serwer = 'localhost';
    $db_user = 'root';
    $password = '';
    $baza = 'ksiegarnia';

    $do_bazy = mysqli_connect($serwer,$db_user,$password,$baza);
    if(!$do_bazy===true){
        exit('Błąd połączenia z bazą danych!');
    }else{
        $password_hash = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $zapytanie = mysqli_query($do_bazy,"INSERT INTO `uzytkownicy`(`id`, `login`, `haslo`, `email`, `imie`, `nazwisko`, `miejscowosc`, `ulica`, `nr_domu`, `kodpocztowy`) VALUES ('','".$_POST['username']."','".$password_hash."','".$_POST['email']."','".$_POST['imie']."','".$_POST['nazwisko']."','".$_POST['miejscowosc']."','".$_POST['ulica']."','".$_POST['nr_domu']."','".$_POST['kod_pocztowy']."')");
        if(!$zapytanie===true){
            mysqli_close($do_bazy);
            echo "Błąd zaytania";
            exit;
        }else{
            header('Location: index.php');
        }
    }
}
?>