<?php

$conn =mysqli_connect("localhost","root","")
  or die("Нямаме връзка със сървъра.");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "<p>Успешно свързване.<p>";
//$sql5="Drop DATABASE Zad12";
//if ($conn->query($sql5) === TRUE) {
//    echo "<p>Успешно изтрита БД";
//} else { echo "<p>Грешка при изтриването на БД: " . $conn->error; }

$sql = "CREATE DATABASE Zad12";
if ($conn->query($sql) === TRUE) {
    echo "<p>Успешно създадена БД";
} else { echo "<p>Грешка при създаването на БД: " . $conn->error; }

$conn = new mysqli("localhost","root","","Zad12");
// свързване със създадената БД

$sql =
"CREATE TABLE User ( ".
"Code INT(6) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,".
"Name VARCHAR(33) NOT NULL,".
"Kind INT NOT NULL,".
"Product_count INT NOT NULL)";
if ($conn->query($sql) === TRUE)
{   echo "<p>Таблицата за потребител е създадена успешно."; }
else {  echo "<p>Грешка при създаването на таблицата: " . $conn->error;  }

$sql2 =
"CREATE TABLE Product ( ".
"Code INT(6) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,".
"Name VARCHAR(33) NOT NULL,".
"User_id INT
REFERENCES User(Code)
ON DELETE CASCADE
  ON UPDATE CASCADE,".
"Unit_price DECIMAL(6,2) NOT NULL)";
if ($conn->query($sql2) === TRUE)
{   echo "<p>Таблицата за продукт е създадена успешно."; }
else {  echo "<p>Грешка при създаването на таблицата: " . $conn->error;  }

$conn->close();
?>