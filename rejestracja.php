<?php 
session_start();
if(isset($_SESSION['zalogowany'])){
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
            <a href="logowanie.php">Logowanie</a>
        </nav>
        <p id="czas"></p>
    </header>

    <section class="main-content">
    <form name="rejestracja" action="zarejestroj.php" method="POST" onsubmit="return checkForm()">
        <h1>Rejestracja</h1>
        <input type="text" name="username" placeholder="Nazwa użytkownika">
        <input type="password" name="password" placeholder="Hasło">
        <input type="password" name="password_check" placeholder="Powtórz hasło">
        <input type="text" name="email" placeholder="Adres poczty elektronicznej">
        <input type="text" name="imie" placeholder="Imię">
        <input type="text" name="nazwisko" placeholder="Nazwisko">
        <input type="text" name="miejscowosc" placeholder="Miejscowość">
        <input type="text" name="ulica" placeholder="Ulica">
        <input type="text" name="nr_domu" placeholder="Nr. domu">
        <input type="text" name="kod_pocztowy" placeholder="Kod pocztowy">
        <input type="text" name="nr_tel" placeholder="Nr. telefonu">
        <input type="submit" name=" wyslij" value="Zajerjestruj się">
        <p id="reg_alert"></p>
    </form>
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