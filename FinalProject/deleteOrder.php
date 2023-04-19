<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Изтрий поръчка</title>
    <link rel="stylesheet" type="text/css" href="style.css" />
</head>

<body>
    <h2 style="font-family: 'Pacifico', cursive;
    font-size: xx-large">
        Изтрий поръчка
    </h2>
    <?php
    include "config.php";
    if(isset($_GET['del']))
    {
        $sql="DELETE FROM Orders WHERE Code=" .(int)$_GET['del'];
        $result=$conn->query($sql);
    }
    $sql="SELECT * FROM Orders ORDER BY Code ASC";
    $result=$conn->query($sql);
    if ($result->num_rows <= 0)
        echo "0 резултата";
    else
    {
        $zag=array("Код","Клиент","Продукт","Вид на клиента","Количество","Крайна сума","Дата","<font>Изтриване</font>");
    ?>
        <table>
            <tr>
                <?php
        foreach($zag as $v) echo "<th>" .$v. "</th>";
                ?>
            </tr>
            <?php
        while($row = $result->fetch_assoc())
        {
            ?>
            <tr>
                <td >
                    <?php echo $row["Code"] ?>
                </td>
                <td>
                    <?php $cust=$row["Customer_id"];
                          $sqlStatement="SELECT Name FROM Customer WHERE Code=".(int)$cust;
                          $result2= $conn->query($sqlStatement);
                          if ($result2->num_rows > 0){
                              while($row2 = $result2->fetch_assoc())
                              {echo $row2['Name'];}
                          }

                    ?>
                </td>
                <td>
                    <?php $product=$row["Product_id"];
                          $sqlS="SELECT Name FROM Product WHERE Code=".(int)$product;
                          $result3= $conn->query($sqlS);
                          if ($result3->num_rows > 0){
                              while($row3 = $result3->fetch_assoc())
                              {echo $row3['Name'];}
                          }?>
                </td>
                <td>
                    <?php $type=$row["User_type"];
                          if($type=="1"){
                              echo "Заплатил е всичко авансово";
                          }else if($type=="2"){
                              echo "Предплатил авансово само 15%";
    }else{
        echo "Не е заплатил";
    }
                    ?>
                </td>
                <td>
                    <?php echo $row["Quantity"] ?>
                </td>
                <td>
                    <?php echo $row["Total_price"] ?>
                </td>
                <td>
                    <?php $date=date_create($row["Date_of_request"]);
                echo date_format($date,"d.m.Y"); ?>
                </td>
                <td align=center>
                    <a href="deleteOrder.php?del=<?php echo $row['Code']; ?>"> Изтрий </a>
                </td>
            </tr>
            <?php
        }
    }
    $conn->close();
            ?>
        </table>
        <p>
            <br />
            <a href="index.htm"> Начална страница => </a>
</body>
</html>