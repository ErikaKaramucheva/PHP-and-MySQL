<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Всички продукти</title>
     <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <h2 style="font-family: 'Pacifico', cursive;
    font-size: xx-large"> Всички продукти </h2>
    <table>
<caption> <b> <big> За сортиране кликнете в името на колоната </big> </b> </caption>
<tr>
<th > <a href="allProduct.php?sort=Code"> Код </a> </th>
<th > <a href="allProduct.php?sort=Name"> Име </a> </th>
<th > <a href="allProduct.php?sort=Unit_price"> Единична цена </a> </th>
</tr>

<?php
if( isset($_REQUEST['sort']) && $_REQUEST['sort'] != "")
    $sort = $_REQUEST['sort'];
else $sort="Code";
$sort=urlencode($sort);
echo "<a href='allProduct.php?sort=$sort'>";
include "config.php";
$sql="SELECT * FROM Product ORDER BY " . $sort . " ASC";
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
<td><?php echo $row["Unit_price"] ?></td>
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
