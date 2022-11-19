<?php

$plik = fopen("licznik.txt","r"); //plik, gdzie będzie znajdować się licznik
$_SESSION['licznik'] = fgets($plik);
fclose($plik);

if(!isset($_COOKIE['odwiedziny'])) {
setcookie("odwiedziny", time() - 86400); //tutaj czas w sekundach, co ile ma być naliczany licznik 86400
$_SESSION['licznik']++;
$plik = fopen("licznik.txt","w"); //tutaj wpisujemy taki plik, jak wyżej
fwrite($plik, $_SESSION['licznik']);
fclose($plik);
}

