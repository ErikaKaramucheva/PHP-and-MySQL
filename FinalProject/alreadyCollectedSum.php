<?php

?><!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Събраната в момената сума от фирмата</title>
    <link rel="stylesheet" type="text/css" href="style.css" />
</head>

<body>
    <h2 style="font-family: 'Pacifico', cursive;
    font-size: xx-large">
        Изчисляване на събраната в момента сума от фирмата
    </h2>
    <h4 style=" color: #00348d;">
        Събраната до момента сума се получава като:<br />
        - съберем крайните суми за всички поръчки, в които клиентът е заплатил авансово цялата поръчка  <br />
        - към тях прибавяме по 15% за всяка поръчка, където клиентът е заплатил авансово една част от сумата (15%).

    </h4>
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
FROM Orders WHERE User_type=1 OR User_type=2";
        $result=$conn->query($sql);
        $sum_one=0;
        $sum_two=0;
        if ($result->num_rows > 0)
        {   // output data of each row
            while($row = $result->fetch_assoc())    {
                $type=$row['User_type'];
                if($type=="1"){
                    $sum_one+=$row['Total_price'];
                }else{
                    $sum_form_one=$row['Total_price'];
                    $sum_two+=($sum_form_one*0.15);
                }
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
               echo "<td>" ;
               $type=$row["User_type"];
    if($type=="1"){
        echo "Заплатил е всичко авансово";
    }else {
        echo "Предплатил авансово само 15%";
    }
    echo "<td>" . $row["Quantity"].
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
    <hr style="color:black; border:solid"/>
    <h2 style="color:black">
        Сума от клиенти, заплатили цялата поръчка авансово => <?php echo $sum_one?>. <br />
        Сума от клиенти, заплатили 15% авансово => <?php echo round($sum_two,2);?>.<br />
        Обща сума => <?php echo round(($sum_one+$sum_two),2)?>
    </h2>
    <br />
    <a href="index.htm#menu>"> Начална страница =>  </a>
</body>
</html>
