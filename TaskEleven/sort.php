<html>
 <head> 
    <title> Сортиране </title>
      <style>
         body{
             background-color:mediumaquamarine;
             text-align:center;
         }
    </style>
 </head>
<body>
<h2>Сортиране по избрана колона </h2>
<table border="4" bordercolor="black" cellpadding="15" cellspacing="0" bgcolor="lightgreen" width=50%>
<caption> <b> <big> За сортиране кликнете в името на колоната </big> </b> </caption>
<tr>
<th > <a href="sort.php?vid=Code"> Код </a> </th>
<th > <a href="sort.php?vid=Name"> Име </a> </th>
<th > <a href="sort.php?vid=Kind"> Вид </a> </th>
<th > <a href="sort.php?vid=Sum"> Сума </a> </th>
</tr>

<?php
if( isset($_REQUEST['vid']) && $_REQUEST['vid'] != "")
    $vid = $_REQUEST['vid'];
else $vid="Code";
$vid=urlencode($vid);
echo "<a href='sort.php?vid=$vid'>";
include "config.php";
$sql="SELECT * FROM User ORDER BY " . $vid . " ASC";
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
<td><?php echo $row["Kind"] ?></td>
<td><?php echo $row["Sum"] ?></td>
</tr>

<?php
    }
}
$conn->close();
?>
</table> <p>
<a href="index.htm#menu"> Меню =>> </a>
</body> </html>
