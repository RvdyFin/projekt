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
    <main>
        <div class="main_item">
            <h1>Witamy w naszej wypożyczalni!</h1>
            <p>Oferujemy dużą game tytułów z wszystkich gatunków literatury od nauki po fantasy!</p>
        </div>
    </main>
    <footer>
        &copy; 2024 Wypożyczalnia Książek. Wszelkie prawa zastrzeżone.</p>
    </footer>
    <script src="script.js"></script>
</body>
</html>