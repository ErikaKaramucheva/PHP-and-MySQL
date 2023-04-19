<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Справка за продукти</title>
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
    <h2> Всички продукти </h2>
    <table>
        <caption>
            <big>
                <b>Продукти</b>
            </big>
        </caption>
        <tr>
            <th>Код </th>
            <th>Име</th>
            <th>Потребител</th>
            <th>Единична цена</th>
        </tr>

        <?php
        include "config.php";
        $sql="SELECT * FROM Product ORDER BY CODE";
        $result=$conn->query($sql);
        if ($result->num_rows > 0)
        {   // output data of each row
            while($row = $result->fetch_assoc())    {
                echo"<tr>";
                echo "<td>". $row["Code"] .
                "<td>" . $row["Name"] .
                "<td>" . $row["User_id"] .
                "<td>" . $row["Unit_price"];
                echo"</tr>";
            }
        } else echo "0 results";
        $conn->close();

        ?>
    </table><p>
        Легенда за вида: 1 => Дистрибутор;  2 => Клиент.
        <p>
            <a href="index.htm#menu>"> Меню =>  </a>
</body>
</html>
