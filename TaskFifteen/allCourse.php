<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Всички специалности</title>
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
    <h2> Всички специалности </h2>
    <table>
<caption> <b> <big> За сортиране кликнете в името на колоната </big> </b> </caption>
<tr>
<th > <a href="allCourse.php?vid=Code"> Код </a> </th>
<th > <a href="allCourse.php?vid=Name"> Име </a> </th>
</tr>

<?php
if( isset($_REQUEST['vid']) && $_REQUEST['vid'] != "")
    $vid = $_REQUEST['vid'];
else $vid="Code";
$vid=urlencode($vid);
echo "<a href='allCourse.php?vid=$vid'>";
include "config.php";
$sql="SELECT * FROM Courses ORDER BY " . $vid . " ASC";
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
<td align=center><?php echo $row["Code"] ?> </td>
<td><?php echo $row["Name"] ?></td>
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
