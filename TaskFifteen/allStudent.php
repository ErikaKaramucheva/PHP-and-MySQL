<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Всички студенти</title>
    <style>
                 body{
             background-color:burlywood;
             text-align:center;
         }
        table{
           margin-right:auto;
           margin-left:auto;
        }
    </style>
</head>

<body>
    <h2> Всички студенти </h2>
    <table>
<caption> <b> <big> За сортиране кликнете в името на колоната </big> </b> </caption>
<tr>
<th > <a href="allStudent.php?vid=Faculty_number"> Факултетен номер </a> </th>
<th > <a href="allStudent.php?vid=Name"> Име </a> </th>
<th > <a href="allStudent.php?vid=Course"> Курс </a> </th>
<th > <a href="allStudent.php?vid=Course_id"> Специалност </a> </th>
<th > <a href="allStudent.php?vid=Form"> Форма </a> </th>
<th > <a href="allStudent.php?vid=Avg_grades"> Среден успех </a> </th>
</tr>

<?php
if( isset($_REQUEST['vid']) && $_REQUEST['vid'] != "")
    $vid = $_REQUEST['vid'];
else $vid="Faculty_number";
$vid=urlencode($vid);
echo "<a href='allStudent.php?vid=$vid'>";
include "config.php";
$sql="SELECT * FROM Student ORDER BY " . $vid . " ASC";
$result=$conn->query($sql);
if ($result->num_rows <= 0)
    echo "0 резултата";
else
{
?>
</tr>

<?php
    while($row = $result->fetch_assoc())
    {
?>
<tr>
<td align=center><?php echo $row["Faculty_number"] ?> </td>
<td><?php echo $row["Name"] ?></td>
<td><?php echo $row["Course"] ?></td>
<td><?php $sql2="Select Name FROM Courses Where Code= ".$row["Course_id"];
          $result2= $conn->query($sql2);
          if ($result2->num_rows > 0){
              while($row2 = $result2->fetch_assoc()){
                  echo $row2["Name"];
             }
          }else{
              echo "null";
          }
    ?></td>
<td><?php if($row["Form"]=="1"){
    echo "Редовно обучение";}
          else{
              echo "Задочно обучение";
          }
    ?></td>
<td><?php echo $row["Avg_grades"] ?></td>
</tr>

<?php
    }
}
$conn->close();
?>
</table>
   
        <p>
            <a href="index.htm#menu>"> Меню =>  </a>
</body>
</html>
