<html>
<head>
    <title> Търсене на продукт</title>
    <link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>
    <h2 style="font-family: 'Pacifico', cursive;
    font-size: xx-large">
        Търсене на продукти по име
    </h2>
    <form method="post">
        <h3>
            <b>
            Моля въведете име на продукта:</b>
            <input type="text" name="Name" />
        </h3>

        <input type="submit" name="submit" />
    </form>
    <table>
        <tr>
            <th> Код </th>
            <th>Име</th>
            <th>Единична цена</th>
        </tr>

        <?php
        include 'config.php';
        $sql="SELECT * FROM Product ORDER BY Code";
        if(array_key_exists('submit',$_POST)){
            $name=$_POST['Name'];
            $sql="SELECT * FROM Product WHERE Name LIKE '%$name%' ORDER BY Code";
        }
        $result=$conn->query($sql);
        if ($result->num_rows <= 0)
            echo "0 резултата";
        else
        {

            while($row = $result->fetch_assoc())
            {
                echo"<tr>";
                echo "<td>". $row["Code"].
                "<td>" . $row["Name"].
                "<td>" . $row["Unit_price"];

                echo"</tr>";
            }
        }
        $conn->close();
        ?>
    </table><p>
    <br />
        <a href="index.htm"> Начална страница => </a>
</body>
</html>
