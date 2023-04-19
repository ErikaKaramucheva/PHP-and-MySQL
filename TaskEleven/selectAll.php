<html>
<head>
    <title> Всички данни </title>
    <style>
         body{
             background-color:mediumaquamarine;
             text-align:center;
         }
         
        table{
           margin-right:auto;
           margin-left:auto;
        }
    </style>
</head>
<body>
    <h2> Всички данни </h2>
    <table>
        <caption>
            <big>
                <b>Софтуерна фирма "Успех"</b>
            </big>
        </caption>
    <tr>
            <th>Код </th>
            <th>Име</th>
            <th>Вид</th>
            <th>Сума</th>
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
                "<td>" . $row["Sum"];
                echo"</tr>";
            }
        } else echo "0 results";
        $conn->close();

        ?>
    </table><p>
        Легенда за вида: 1 => вземане;  2 => задължение.
        <p>
            <a href="index.htm#menu>"> Меню =>  </a>
</body>
</html>
