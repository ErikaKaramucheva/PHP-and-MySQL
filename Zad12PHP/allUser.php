<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Справка за потребители</title>
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
    <h2> Всички потребители </h2>
    <table>
        <caption>
            <big>
                <b>Потребители</b>
            </big>
        </caption>
        <tr>
            <th>Код </th>
            <th>Име</th>
            <th>Вид</th>
            <th>Брой продукти</th>
        </tr>

        <?php
        include "config.php";
        $sql="SELECT * FROM User ORDER BY CODE";
        $result=$conn->query($sql);
        if ($result->num_rows > 0)
        {   // output data of each row
            while($row = $result->fetch_assoc())    {
                echo"<tr>";
                echo "<td>". $row["Code"] .
                "<td>" . $row["Name"] .
                "<td>" . $row["Kind"] .
                "<td>" . $row["Product_count"];
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
