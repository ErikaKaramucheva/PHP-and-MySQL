<html>
 <head> 
    <title> Сортиране </title>
      <style>
        body{
             
             background-color:cornflowerblue;
             text-align:center;
             color:mediumvioletred;
         }
    </style>
 </head>
<body>
<h2>Сортиране по избрана колона </h2>
<table>
<caption> <b> <big> За сортиране кликнете в името на колоната </big> </b> </caption>
<tr>
<th > <a href="sort.php?vid=Code"> Код </a> </th>
<th > <a href="sort.php?vid=Name"> Име </a> </th>
<th > <a href="sort.php?vid=Unit_price"> Единична цена </a> </th>
<th > <a href="sort.php?vid=Quantity"> Количество </a> </th>
</tr>

<?php
if( isset($_REQUEST['vid']) && $_REQUEST['vid'] != "")
    $vid = $_REQUEST['vid'];
else $vid="Code";
$vid=urlencode($vid);
echo "<a href='sort.php?vid=$vid'>";
include "config.php";
$sql="SELECT * FROM Goods ORDER BY " . $vid . " ASC";
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
<td><?php echo $row["Quantity"] ?></td>
</tr>

<?php
    }
}
$conn->close();
?>
</table> <p>
<a href="index.htm#menu"> Меню =>> </a>
</body> </html>
