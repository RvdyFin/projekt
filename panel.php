<?php 
session_start();
if(!isset($_SESSION['zalogowany'])){
    header('Location: index.php');
}else{
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wypożycz Książkę</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body> 
    <header>
        <h1>Wypożyczalnia Książek</h1>
        <nav>
            <a href="index.php">Strona Główna</a>
            <a href="katalog.php">Katalog Książek</a>
            <a href="wypozycz.php">Wypożycz Książkę</a>
            <?php
            if(!isset($_SESSION['zalogowany'])){
                echo '<a href="logowanie.php">Logowanie</a>';
            }else{
                echo '<a href="panel.php">Panel</a>';
                echo '<a href="wyloguj.php">Wyloguj</a>';
            }
            ?>
        </nav>
        <p id="czas"></p>
    </header>
    <section id="panel">
<?php 
    $serwer = 'localhost';
    $db_user = 'root';
    $password = '';
    $baza = 'ksiegarnia';

    $do_bazy = mysqli_connect($serwer,$db_user,$password,$baza);
    if(!$do_bazy===true){
        exit('Błąd połączenia z bazą danych!');
    }
    else{
        $zapytanie = mysqli_query($do_bazy,"SELECT * from uzytkownicy Where id = ".$_SESSION['id'].";");
        if(!$zapytanie===true){
            echo "Błąd zapytania!";
            mysqli_close($do_bazy);
            exit;
        }
        else{
            $row = mysqli_fetch_array($zapytanie);
            echo "<p><b>Nazwa użytkownika</b>: ".$row['login']."<br></p>";
            echo "<p><b>E-mail</b>: ".$row['email']."<br></p>";
            echo "<p><b>Imię</b>: ".$row['imie']."<br></p>";
            echo "<p><b>Nazwisko</b>: ".$row['nazwisko']."<br></p>";
            echo "<p><b>Miejsce zamieszkania</b>: ".$row['miejscowosc']."<br></p>";
            echo "<p><b>Ulica</b>: ".$row['ulica']."<br></p>";
            echo "<p><b>Nr. domu/bloku</b>: ".$row['nr_domu']."<br></p>";
            echo "<p><b>Kod pocztowy</b>: ".$row['kodpocztowy']."<br></p>";
        }
    }
?>
    <a href="panel_wyp.php"><button>Sprawdź swoje wypożyczenia</button></a>
    </section>
    <footer>
        &copy; 2024 Wypożyczalnia Książek. Wszelkie prawa zastrzeżone.</p>
    </footer>
    <script src="script.js"></script>
</body>
</html>
<?php 
}
?>