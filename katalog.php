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
            session_start();
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
    <center><h1>Katalog ksiazek</h1></center>
    <section id="katalog">
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
    $zapytanie = mysqli_query($do_bazy,"SELECT * FROM ksiazki");
    if(!$zapytanie===true){
        mysqli_close($do_bazy);
        close('Błąd zapytania');
    }else{
        while($row = mysqli_fetch_array($zapytanie)){
            echo '<div class="katalog_item">';
            echo '<p>'.$row['tytul'].'</p>';
            echo '<p>'.$row['autor'].'</p>';
            echo '<p>Rok wydania: '.$row['rok_wyd'].'</p>';
            echo '<p>Rodzaj okładki: '.$row['rodzaj_okladki'].'</p>';
            echo '</div>';
        }
    }
}
?>
    </section>
    <footer>
        &copy; 2024 Wypożyczalnia Książek. Wszelkie prawa zastrzeżone.</p>
    </footer>
    <script src="script.js"></script>
</body>
</html>