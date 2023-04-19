<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Изчисляване на крайната печалба за фирмата</title>
    <style>
         body{
             background-color:thistle;
             text-align:center;
         }
         table{
           margin-right:auto;
           margin-left:auto;
        }
        
    </style>
</head>

<body>
    <h2>Изчисляване на крайната печалба за фирмата</h2>
   <p>Крайната печалба се изчислява като печалбата за всеки продукт, продаден от дистрибутор е 10%, а за всеки продукт, закупен от клиент- 20%.
    </p>
    <table>
        <caption>
            <big>
                <b>Потребители и продукти</b>
            </big>
        </caption>
        <tr>
            <th>Код на потребителя</th>
            <th>Име на потребителя</th>
            <th>Брой продукти</th>
            <th>Код на продукта</th>
            <th>Име на продукта</th>
            <th>Единична цена на продукта</th>
            <th>Вид на потребителя</th>
        </tr>

        <?php
        include "config.php";
        $sql="SELECT *
FROM (User as u INNER JOIN Product as p
ON u.Code=p.User_id)";
        $result=$conn->query($sql);
        $total_sum=0;
        $sum_one_product=0;
        if ($result->num_rows > 0)
        {   // output data of each row
            while($row = $result->fetch_assoc())    {
                $count=$row["u.Product_count"];
                $price=$row["p.Unit_price"];
                $sum_one_product=$count*$price;
                $percent=10;
                if($row['Kind']==2){
                    $percent=20;
                }
                $sum_one_product=$sum_one_product*($percent/100);
                $total_sum+=$sum_one_product;
                echo"<tr>";
                echo "<td>" . $row["u.Code"] .
                "<td>" . $row["u.Name"] .
                "<td>" . $row["u.Product_count"].
                "<td>" . $row["p.Code"].
                "<td>" . $row["p.Name"].
                "<td>" . $row["p.Unit_price"].
                "<td>" . $row["u.Kind"];
                echo"</tr>";


            }
        } else echo "0 резултата";
        $conn->close();

        ?>
    </table>
    <h2 style="color:red">Обща печалба => <?php echo $total_sum?></h2>

        <a href="index.htm#menu>"> Меню =>  </a>
</body>
</html>
