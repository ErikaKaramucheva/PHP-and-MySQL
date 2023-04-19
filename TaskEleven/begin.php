<?php
include "config.php";
$sql= "INSERT INTO User(Code,Name,Kind,Sum) VALUES ".
"(1,'Hotel Maritza',1,222.22),".
"(2,'Banka BAKB',2,111.11)";
if ($conn->query($sql) === TRUE)
   {     echo "<p>Таблица USER е попълнена успешно с 2 записа.";  }
else {  echo "<p>Грешка при вмъкването на данните в таблицата: " . $conn->error; }
$conn->close();

?>