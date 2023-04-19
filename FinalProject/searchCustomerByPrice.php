<html>
<head>
    <title> Търсене на клиенти, заплатили над определена сума </title>
    <link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>
    <h2 style="font-family: 'Pacifico', cursive;
    font-size: xx-large">
        Търсене на клиенти,заплатили над определена сума
    </h2>
    <form method="post">
        <h2>
            <b>
            Моля въведете минимална сума:</b>
            <input type="text" name="Price" />
        </h2>

        <input type="submit" name="submit" />
    </form>
    <table>
        <tr>
            <th> Код </th>
            <th>Клиент</th>
            <th>Продукт</th>
            <th>Вид на потребителя</th>
            <th>Количество</th>
            <th>Обща сума</th>
            <th>Дата</th>
        </tr>

        <?php
        include 'config.php';
        $sql="SELECT * FROM Orders ORDER BY Code";
        if(array_key_exists('submit',$_POST)){
            $min_price=$_POST['Price'];
            $sql="SELECT * FROM Orders WHERE Total_price>=$min_price ORDER BY Code";
        }
        $result=$conn->query($sql);
        if ($result->num_rows <= 0)
            echo "0 резултата";
        else
        {

            while($row = $result->fetch_assoc())
            {
                echo"<tr>".
                "<td>". $row["Code"].
                "<td>";
                $cust=$row["Customer_id"];
                $sqlStatement="SELECT Name FROM Customer WHERE Code=".(int)$cust;
                $result2= $conn->query($sqlStatement);
                if ($result2->num_rows > 0){
                    while($row2 = $result2->fetch_assoc())
                    {echo $row2['Name'];};

                    echo "<td>";
                    $product=$row["Product_id"];
                    $sqlS="SELECT Name FROM Product WHERE Code=".(int)$cust;
                    $result3= $conn->query($sqlS);
                    if ($result3->num_rows > 0){
                        while($row3 = $result3->fetch_assoc())
                        {echo $row3['Name'];}
                    };
                    echo "<td>";
                    $type=$row["User_type"];
                    if($type=="1"){
                        echo "Заплатил е всичко авансово";
                    }else if($type=="2"){
                        echo "Предплатил авансово само 15%";
                    }else{
                        echo "Не е заплатил";
                    };
                    echo "<td>". $row["Quantity"].
                    "<td>". $row["Total_price"].
                    "<td>" ;
                    $date=date_create($row["Date_of_request"]);
                    echo date_format($date,"d.m.Y");

                    echo"</tr>";
                }
            }
        }
        $conn->close();
        ?>
    </table><p>
    <br />
        <a href="index.htm"> Начална страница => </a>
</body>
</html>
