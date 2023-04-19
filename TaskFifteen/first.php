<?php
include "config.php";
$sql= "INSERT INTO Courses(Code,Name) VALUES ".
"(1,'Софтуерно инженерство'),".
"(2,'Софтуерни технологии и дизайн'),".
"(4,'Бизнес математика'),".
"(5,'Приложна математика')".
"(6,'Математика')"

;
if ($conn->query($sql) === TRUE)
{     echo "<p>Таблица Courses е попълнена успешно с 5 записа.";  }
else {  echo "<p>Грешка при вмъкването на данните в таблицата: " . $conn->error; }

$sql2= "INSERT INTO Student(Faculty_number,Name,Course,Course_id,Form,Avg_grades) VALUES ".
"(2101321067,'Ерика Веселинова Карамучева',2,1,1,5.70)";
if ($conn->query($sql2) === TRUE)
{     echo "<p>Таблица Student е попълнена успешно с 1 запис.";  }
else {  echo "<p>Грешка при вмъкването на данните в таблицата: " . $conn->error; }

$conn->close();

?>