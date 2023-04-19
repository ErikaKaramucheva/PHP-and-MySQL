<html>
<head>
    <title> Всички продукти </title>
    <style>
                  body{

             background-color:cornflowerblue;
             text-align:center;
             color:mediumvioletred;
         }

        table{
           margin-right:auto;
           margin-left:auto;
        }
    </style>
</head>
<body>
    <h2> Всички продукти </h2>
    <form method="post">
    <p>За изчисляване на крайна цена с ДДС, въведете стойността на ДДС в проценти:
        </p>
    <input type="number" name="DDS" />
        <input type="submit" name="submit" />
           </form>
    </p>
    <table>
        <caption>
            <big>
                <b>Магазин</b>
            </big>
        </caption>
        <tr>
            <th>Код </th>
            <th>Име</th>
            <th>Единична цена</th>
            <th>Количество</th>
            <th>Единична цена с ДДС</th>
        </tr>

        <?php
        include "config.php";
        $sql="SELECT * FROM Goods ORDER BY CODE";
        $result=$conn->query($sql);
        if ($result->num_rows > 0)
        {   // output data of each row
            while($row = $result->fetch_assoc())    {
                echo"<tr>";
                echo "<td>". $row["Code"] .
                "<td>" . $row["Name"] .
                "<td>" . $row["Unit_price"] .
                "<td>" . $row["Quantity"];

                 if(array_key_exists('submit',$_POST)) {
                     $DDS=$_POST["DDS"];
                     $price_with_DDS=$row["Unit_price"]*(1+($DDS/100));
               echo "<td>" . $price_with_DDS;
            }
                 else{
                    echo "<td>" . $row["Unit_price"];
                 }
                 echo"</tr>";
        } }else echo "0 резултата";
        $conn->close();

        ?>
    </table>
            <a href="index.htm#menu>"> Меню =>  </a>
</body>
</html>
