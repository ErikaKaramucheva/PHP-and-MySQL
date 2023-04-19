<html>
<head>
    <title> Търсене на продукт </title>
    <link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>
    <h2 style="font-family: 'Pacifico', cursive;
    font-size: xx-large">
        Търсене на продукти по цена
    </h2>
    <form method="post">
        <h2>
            <b>
            Моля въведете цена:</b>
            <input type="text" name="Unit_price" />
        </h2>
            <h2>
                <b>
                Зададената цена е:</b></h2>
        <p>
                <input type="radio" name="Type" value="1" checked="checked"/> Минимална
                <input type="radio" name="Type" value="2" /> Максимална
            </p>
        

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
            $price=$_POST['Unit_price'];
            $type=$_POST['Type'];
            if($type=="1"){
                $sql="SELECT * FROM Product WHERE Unit_price>=$price ORDER BY Code";
            }else{
                $sql="SELECT * FROM Product WHERE Unit_price<=$price ORDER BY Code";
            }
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
