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
    </header>

    <section class="main-content">
        <h2>Wypożycz Książkę</h2>
        
        <form action="" method="post">
            <label for="tytul">Tytuł Książki:</label>
            <input type="text" name="tytul">
            <label for="autor">Autor:</label>
            <input type="text" name="autor">

            <button type="submit" name="wyslij">Wypożycz</button>
        </form>
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
        $zapytanie = mysqli_query($do_bazy,'SELECT * FROM ksiazki WHERE tytul = "'.$_POST['tytul'].'" AND autor = "'.$_POST['autor'].'";');
        if(!$zapytanie===true){
            exit('Błąd zapytania!');
        }
        else{
            $row = mysqli_fetch_array($zapytanie);
            if($row<1){
                echo ("<script LANGUAGE='JavaScript'>
                window.alert('Nie mamy takiego tytułu');
                </script>");
                mysqli_close($do_bazy);
            }
            elseif($row['ilosc']==0){
                echo ("<script LANGUAGE='JavaScript'>
                window.alert('Nie mamy jej akutalnie do wypożyczenia');
                </script>");
                mysqli_close($do_bazy);
            }
            else{
                echo ("<script LANGUAGE='JavaScript'>
                window.alert('Wypożyczono pomyślnie');
                </script>");
                $zapytanie2 = mysqli_query($do_bazy,"INSERT INTO `wypozyczenie`(`id`, `id_ksiazki`, `id_uzytkownika`, `data_wypozyczenia`, `data_zwrotu`) VALUES ('','".$row['id']."','".$_SESSION['id']."','".date("Y-m-d")."','".date('Y-m-d', strtotime("+2 months"))."')");
                if(!$zapytanie2===true){
                    exit('Błąd zapytania!');
                    mysqli_close($do_bazy);
                }
                else{
                    $nowa_ilosc = $row['ilosc'] - 1;
                    $zapytanie3 = mysqli_query($do_bazy,"UPDATE `ksiazki` SET `ilosc`='".$nowa_ilosc."' WHERE id = ".$row['id']."");
                    if(!$zapytanie3===true){
                        exit('Błąd zapytania!');
                        mysqli_close($do_bazy);
                    }else{
                        mysqli_close($do_bazy);
                        header('Location: index.php');
                    }
                }
            }
        }
        
    }
}
?>
    </section>

    <footer>
        &copy; 2024 Wypożyczalnia Książek. Wszelkie prawa zastrzeżone.</p>
    </footer>
</body>
</html>
<?php 
}
?>
