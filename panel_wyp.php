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
        $zapytanie = mysqli_query($do_bazy,"SELECT * from wypozyczenie Where id_uzytkownika = ".$_SESSION['id'].";");
        if(!$zapytanie===true){
            echo "Błąd zapytania!";
            mysqli_close($do_bazy);
            exit;
        }
        else{
            echo '<table>';
            echo '<tr>';
            echo '<th>Tytuł</th>';
            echo '<th>Autor</th>';
            echo '<th>Data wypożyczenia</th>';
            echo '<th>Data oddania</th>';
            echo '</tr>';
            while($row = mysqli_fetch_array($zapytanie)){
                $autor = mysqli_query($do_bazy,"SELECT tytul, autor FROM ksiazki where id = ".$row['id_ksiazki'].";");
                $row_autor = mysqli_fetch_array($autor);
                echo '<tr>';
                echo '<th>'.$row_autor['tytul'].'</th>';
                echo '<th>'.$row_autor['autor'].'</th>';
                echo '<th>'.$row['data_wypozyczenia'].'</th>';
                echo '<th>'.$row['data_zwrotu'].'</th>';
                echo '</tr>';
            }
            echo '</table>';
        }
    }
?>
    <a href="panel.php"><button>Sprawdź swoje informacje</button></a>
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