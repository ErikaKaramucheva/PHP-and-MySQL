<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Всички поръчки</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <h2 style="font-family: 'Pacifico', cursive;
    font-size: xx-large"> Всички поръчки </h2>
    <table>
<caption> <b> <big> За сортиране кликнете в името на колоната </big> </b> </caption>
<tr>
<th > <a href="allOrders.php?sort=Code"> Код </a> </th>
<th > <a href="allOrders.php?sort=Customer_id"> Клиент </a> </th>
<th > <a href="allOrders.php?sort=Product_id"> Продукт </a> </th>
<th > <a href="allOrders.php?sort=User_type"> Вид на потребителя </a> </th>
<th > <a href="allOrders.php?sort=Quantity"> Количество </a> </th>
<th > <a href="allOrders.php?sort=Total_price"> Обща сума </a> </th>
<th > <a href="allOrders.php?sort=Date_of_request"> Дата </a> </th>
</tr>

<?php
if( isset($_REQUEST['sort']) && $_REQUEST['sort'] != "")
    $sort = $_REQUEST['sort'];
else $sort="Code";
$sort=urlencode($sort);
echo "<a href='allOrders.php?sort=$sort'>";
include "config.php";
$sql="SELECT * FROM Orders ORDER BY " . $sort . " ASC";
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
<td><?php $cust=$row["Customer_id"];
          $sqlStatement="SELECT Name FROM Customer WHERE Code=".(int)$cust;
          $result2= $conn->query($sqlStatement);
          if ($result2->num_rows > 0){
              while($row2 = $result2->fetch_assoc())
              {echo $row2['Name'];}
          }
    
    ?></td>
<td><?php $product=$row["Product_id"];
          $sqlS="SELECT Name FROM Product WHERE Code=".(int)$product;
          $result3= $conn->query($sqlS);
          if ($result3->num_rows > 0){
              while($row3 = $result3->fetch_assoc())
              {echo $row3['Name'];}
          }?></td>
<td><?php $type=$row["User_type"];
    if($type=="1"){
        echo "Заплатил е всичко авансово";
    }else if($type=="2"){
        echo "Предплатил авансово само 15%";
    }else{
        echo "Не е заплатил";
    }
    ?></td>
<td><?php echo $row["Quantity"] ?></td>
<td><?php echo $row["Total_price"] ?></td>
<td><?php $date=date_create($row["Date_of_request"]);
                echo date_format($date,"d.m.Y"); ?></td>
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
