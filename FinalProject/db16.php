<?php

$conn =mysqli_connect("localhost","root","")
  or die("Нямаме връзка със сървъра.");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "<p>Успешно свързване.<p>";

$sql = "CREATE DATABASE Task16";
if ($conn->query($sql) === TRUE) {
    echo "<p>Успешно създадена БД";
} else { echo "<p>Грешка при създаването на БД: " . $conn->error; }

$conn = new mysqli("localhost","root","","Task16");
// свързване със създадената БД
$sql =
"CREATE TABLE Customer ( ".
"Code INT(6) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,".
"Name VARCHAR(100) NOT NULL)";
if ($conn->query($sql) === TRUE)
{   echo "<p>Таблицата за клиент е създадена успешно."; }
else {  echo "<p>Грешка при създаването на таблицата: " . $conn->error;  }

$sql2 =
"CREATE TABLE Product ( ".
"Code INT(6) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,".
"Name VARCHAR(100) NOT NULL,".
"Unit_price DECIMAL(6,2) NOT NULL)";
if ($conn->query($sql2) === TRUE)
{   echo "<p>Таблицата за продукт е създадена успешно."; }
else {  echo "<p>Грешка при създаването на таблицата: " . $conn->error;  }

$sql3 =
"CREATE TABLE Orders ( ".
"Code INT(6) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,".
"Customer_id INT
REFERENCES Customer(Code)
ON DELETE CASCADE
  ON UPDATE CASCADE,".
"Product_id INT
REFERENCES Product(Code)
ON DELETE CASCADE
  ON UPDATE CASCADE,".
"User_type INT NOT NULL,".
"Quantity INT NOT NULL,".
"Total_price DECIMAL(9,2) NOT NULL,".
"Date_of_request DATE NOT NULL)";
if ($conn->query($sql3) === TRUE)
{   echo "<p>Таблицата за поръчка е създадена успешно."; }
else {  echo "<p>Грешка при създаването на таблицата: " . $conn->error;  }

$conn->close();

?>