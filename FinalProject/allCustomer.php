<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Всички клиенти</title>
     <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <h2 style="font-family: 'Pacifico', cursive;
    font-size: xx-large"> Всички клиенти</h2>
    <table>
<caption> <b> <big> За сортиране кликнете в името на колоната </big> </b> </caption>
<tr>
<th > <a href="allCustomer.php?sort=Code"> Код </a> </th>
<th > <a href="allCustomer.php?sort=Name"> Име </a> </th>
</tr>

<?php
if( isset($_REQUEST['sort']) && $_REQUEST['sort'] != "")
    $sort = $_REQUEST['sort'];
else $sort="Code";
$sort=urlencode($sort);
echo "<a href='allCustomer.php?sort=$sort'>";
include "config.php";
$sql="SELECT * FROM Customer ORDER BY " . $sort . " ASC";
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
            <br />
            <a href="index.htm"> Начална страница =>  </a>
</body>
</html>
