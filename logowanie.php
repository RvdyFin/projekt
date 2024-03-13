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
            <a href="#">Strona Główna</a>
            <a href="#">Katalog Książek</a>
            <a href="#">Wypożycz Książkę</a>
            <a href="#">Logowanie</a>
        </nav>
    </header>
    <body>
        <section id="form_logowania">
            <h2>Logowanie</h2>
            <form action="zaloguj.php" method="post">
                <label for="username">Nazwa użytkownika:</label>
                <input type="text" id="username" name="username" required>
    
                <label for="password">Hasło:</label>
                <input type="password" id="password" name="password" required>
    
                <button type="submit" name="wyslij">Zaloguj się</button>
            </form>
            <h2>Nie masz jeszcze konta?</h2>
            <h2>załóż je już teraz!</h2>
            <a href="rejestracja.php" class="register-link">Zarejestruj się</a>
        </section>
        <footer>
            <p>&copy; 2024 Wypożyczalnia Książek. Wszelkie prawa zastrzeżone.</p>
        </footer>
</body>
</html>
<?php 
}
?>