<?php
$db = "bibliotheque";
$dbhost = "localhost";
$dbport = 3306;
$dbuser = "Groot";
$dbpasswd = "iamroot";

$connexion = new PDO('mysql:host=' . $dbhost . ';port=' . $dbport . ';dbname=' . $db . '', $dbuser, $dbpasswd);
// Connexion à la base de données
/*$servername = "localhost";
$username = "Groot";
$password = "iamroot";
$dbname = "bibliotheque";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}*/


