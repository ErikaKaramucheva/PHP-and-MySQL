<?php

$conn =mysqli_connect("localhost","root","")
  or die("Нямаме връзка със сървъра.");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "<p>Успешно свързване.<p>";

/*$sql = "CREATE DATABASE Task15";
if ($conn->query($sql) === TRUE) {
    echo "<p>Успешно създадена БД";
} else { echo "<p>Грешка при създаването на БД: " . $conn->error; }
*/
$conn = new mysqli("localhost","root","","Task15");
// свързване със създадената БД
/*$sql =
"CREATE TABLE Courses ( ".
"Code INT(6) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,".
"Name VARCHAR(33) NOT NULL)";
if ($conn->query($sql) === TRUE)
{   echo "<p>Таблицата за специалност е създадена успешно."; }
else {  echo "<p>Грешка при създаването на таблицата: " . $conn->error;  }
$sql2 =
"CREATE TABLE Student ( ".
"Faculty_number INT(10) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,".
"Name VARCHAR(33) NOT NULL,".
"Course INT NOT NULL,".
"Course_id INT
REFERENCES Courses(Code)
ON DELETE CASCADE
  ON UPDATE CASCADE,".
"Form INT NOT NULL,".
"Avg_grades DECIMAL(3,2) NOT NULL)";
if ($conn->query($sql2) === TRUE)
{   echo "<p>Таблицата за студент е създадена успешно."; }
else {  echo "<p>Грешка при създаването на таблицата: " . $conn->error;  }*/
$sql="ALTER TABLE Student MODIFY Name VARCHAR(255) ";
if ($conn->query($sql) === TRUE)
{   echo "<p>Колоната за име на студент е променена успешно."; }
else {  echo "<p>Грешка при промяна на колоната: " . $conn->error;  }

$conn->close();

?>