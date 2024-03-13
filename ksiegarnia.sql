-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 13 Mar 2024, 00:27
-- Wersja serwera: 10.4.25-MariaDB
-- Wersja PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `ksiegarnia`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `ksiazki`
--

CREATE TABLE `ksiazki` (
  `id` int(10) UNSIGNED NOT NULL,
  `tytul` text NOT NULL,
  `autor` text NOT NULL,
  `rok_wyd` varchar(4) NOT NULL,
  `rodzaj_okladki` varchar(10) NOT NULL,
  `ilosc` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `ksiazki`
--

INSERT INTO `ksiazki` (`id`, `tytul`, `autor`, `rok_wyd`, `rodzaj_okladki`, `ilosc`) VALUES
(1, 'Ojciec chrzestny polskich Freak Fightów', 'Marcin Najman', '2024', 'miękka', 2),
(2, 'Stan futbolu', 'Krzysztof Stanowski', '2016', 'miękka', 4),
(3, 'Krew elfów', 'Andrzej Sapkowski', '1994', 'miękka', 1),
(4, 'Sezon burz', 'Andrzej Sapkowski', '2013', 'miękka', 0),
(5, 'Legendarne postacie futbolu', 'Bernard Morlino', '2014', 'Twarda', 5),
(7, 'Oni byli pierwsi', 'Teo Gomez', '2014', 'Twarda', 2),
(8, 'Dżuma', 'Albert Camus', '1947', 'miękka', 2);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `uzytkownicy`
--

CREATE TABLE `uzytkownicy` (
  `id` int(10) UNSIGNED NOT NULL,
  `login` text NOT NULL,
  `haslo` text NOT NULL,
  `email` text NOT NULL,
  `imie` varchar(30) NOT NULL,
  `nazwisko` varchar(50) NOT NULL,
  `miejscowosc` varchar(70) NOT NULL,
  `ulica` varchar(50) NOT NULL,
  `nr_domu` varchar(10) NOT NULL,
  `kodpocztowy` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `uzytkownicy`
--

INSERT INTO `uzytkownicy` (`id`, `login`, `haslo`, `email`, `imie`, `nazwisko`, `miejscowosc`, `ulica`, `nr_domu`, `kodpocztowy`) VALUES
(1, 'Bronek23', 'Br@nek!2', 'bronek@gmail.com', 'Bronisław', 'Haszkiewicz', 'Tarnowskie Góry', 'Sienkiewicza', '45', '42-600'),
(2, 'benek', '$2y$10$Mvbrz/f0iL37phYqeKpTOOfyAPwjoHTHGr7xtewtxr8Ec.4xK2svS', 'benek@wp.pl', 'Benek', 'Krok', 'cos', 'cos', 'cos', 'cos'),
(3, 'agata', '$2y$10$KPn0ALhenOCH7FWqIi9jcewca6TyqTn4fHtzFH/xzDR0xoeC0ZXGa', 'agata@wp.pl', 'agata', 'brok', 'cos', 'cos', 'cos', 'cos');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `wypozyczenie`
--

CREATE TABLE `wypozyczenie` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_ksiazki` int(10) UNSIGNED NOT NULL,
  `id_uzytkownika` int(10) UNSIGNED NOT NULL,
  `data_wypozyczenia` date NOT NULL,
  `data_zwrotu` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `wypozyczenie`
--

INSERT INTO `wypozyczenie` (`id`, `id_ksiazki`, `id_uzytkownika`, `data_wypozyczenia`, `data_zwrotu`) VALUES
(8, 1, 2, '2024-03-12', '2024-05-12');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `ksiazki`
--
ALTER TABLE `ksiazki`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `uzytkownicy`
--
ALTER TABLE `uzytkownicy`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `wypozyczenie`
--
ALTER TABLE `wypozyczenie`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `ksiazki`
--
ALTER TABLE `ksiazki`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT dla tabeli `uzytkownicy`
--
ALTER TABLE `uzytkownicy`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT dla tabeli `wypozyczenie`
--
ALTER TABLE `wypozyczenie`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
