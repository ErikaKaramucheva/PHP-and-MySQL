<?php
include "config.php";
$sql= "INSERT INTO Customer(Code,Name) VALUES ".
"(1,'Сладкарница \"Неделя\"'),".
"(2,'Хлебарница \"Златен рай\"')";
if ($conn->query($sql) === TRUE)
{     echo "<p>Таблица Customer е попълнена успешно с 2 записа.";  }
else {  echo "<p>Грешка при вмъкването на данните в таблицата: " . $conn->error; }

$sql2= "INSERT INTO Product(Code,Name,Unit_price) VALUES ".
"(1,'Аромат на ванилия х60 гр.',6.30),".
"(2,'Малинова глазура х1 кг.',24)";
if ($conn->query($sql2) === TRUE)
{     echo "<p>Таблица Product е попълнена успешно с 2 записа.";  }
else {  echo "<p>Грешка при вмъкването на данните в таблицата: " . $conn->error; }

$sql3= "INSERT INTO Orders(Code,Customer_id,Product_id,User_type,Quantity,Total_price,Date_of_request) VALUES ".
"(1,1,2,1,5,120,'2018-03-21')";
if ($conn->query($sql3) === TRUE)
{     echo "<p>Таблица Orders е попълнена успешно с 1 запис.";  }
else {  echo "<p>Грешка при вмъкването на данните в таблицата: " . $conn->error; }
$conn->close();

?>