<?php

$conn =mysqli_connect("localhost","root","")
  or die("Нямаме връзка със сървъра.");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "<p>Успешно свързване.<p>";

$sql = "CREATE DATABASE Zad11";
if ($conn->query($sql) === TRUE) {
    echo "<p>Успешно създадена БД";
} else { echo "<p>Грешка при създаването на БД: " . $conn->error; }

$conn = new mysqli("localhost","root","","Zad11"); 
// свързване със създадената БД
$sql =
"CREATE TABLE User ( ".
"Code INT(6) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,".
"Name VARCHAR(33) NOT NULL,".
"Kind INT(4) NOT NULL,".
"Sum DECIMAL(9,2) NOT NULL)";
if ($conn->query($sql) === TRUE)
{   echo "<p>Таблицата за потребител е създадена успешно."; }
else {  echo "<p>Грешка при създаването на таблицата: " . $conn->error;  }
$conn->close();

?>