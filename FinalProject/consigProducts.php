<?php

?><!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Продукти на консигнация</title>
    <link rel="stylesheet" type="text/css" href="style.css" />
</head>

<body>
    <h2 style="font-family: 'Pacifico', cursive;
    font-size: xx-large">
        Изчисляване на очаквана сума от дадените на консигнация продукти
    </h2>

    <table>
        <caption>
            <big>
                <b>Поръчки</b>
            </big>
        </caption>
        <tr>
            <th>Код </th>
            <th>Клиент</th>
            <th>Продукт</th>
            <th>Вид на потребителя</th>
            <th>Количество</th>
            <th>Обща сума</th>
            <th>Дата</th>
        </tr>

        <?php
        include "config.php";
        $sql="SELECT *
FROM Orders WHERE User_type=3";
        $result=$conn->query($sql);
        $total_sum=0;
        $price_for_one=0;
        $product_quantity=0;
        if ($result->num_rows > 0)
        {   // output data of each row
            while($row = $result->fetch_assoc())    {
                $price_for_one=$row['Total_price'];
                $product_quantity+=$row['Quantity'];
                $total_sum+=$price_for_one;
                echo"<tr>";
                echo "<td>" . $row["Code"] .
                "<td>" ;
                $cust=$row["Customer_id"];
                $sqlStatement="SELECT Name FROM Customer WHERE Code=".(int)$cust;
                $result2= $conn->query($sqlStatement);
                if ($result2->num_rows > 0){
                    while($row2 = $result2->fetch_assoc())
                    {echo $row2['Name'];}
                }
               echo "<td>" ;
                $product=$row["Product_id"];
                $sqlS="SELECT Name FROM Product WHERE Code=".(int)$product;
                $result3= $conn->query($sqlS);
                if ($result3->num_rows > 0){
                    while($row3 = $result3->fetch_assoc())
                    {echo $row3['Name'];}
                }
                echo "<td>" ."Не е заплатил".
                "<td>" . $row["Quantity"].
                "<td>" . $row["Total_price"].
                "<td>" ;
                $date=date_create($row["Date_of_request"]);
                echo date_format($date,"d.m.Y");
                echo"</tr>";


            }
        } else echo "0 резултата";
        $conn->close();

        ?>
    </table>
    <br />
    <hr style="color:black; border:solid" />
    <h2 style="color:black">
        Общ брой на дадените за консигнация продукти => <?php echo $product_quantity?>. <br />
        Очаквана сума => <?php echo $total_sum?>
    </h2>
    <br />
    <a href="index.htm#menu>"> Начална страница =>  </a>
</body>
</html>
