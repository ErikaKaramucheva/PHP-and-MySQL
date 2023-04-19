<html>
<head>
    <title> Търсене на клиенти </title>
    <link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>
    <h2 style="font-family: 'Pacifico', cursive;
    font-size: xx-large">
        Търсене на клиенти по име
    </h2>
    <form method="post">
        <h2><b>
            Моля въведете име на клиента:</b>
            <input type="text" name="Name" />
        </h2>
        
        <input type="submit" name="submit" />
    </form>
    <table>
        <tr>
            <th> Код </th>
            <th>Име</th>
        </tr>

        <?php
        include 'config.php';
        $sql="SELECT * FROM Customer ORDER BY Code";
        if(array_key_exists('submit',$_POST)){
            $name=$_POST['Name'];
            $sql="SELECT * FROM Customer WHERE Name LIKE '%$name%' ORDER BY Code";
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
                "<td>" . $row["Name"];
               
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
