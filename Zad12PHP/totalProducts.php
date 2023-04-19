<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Общ брой реализирани продукти</title>
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
    <h2>Общ брой реализирани продукти</h2>
    <table>
        <caption>
            <big>
                <b>Потребители и продукти</b>
            </big>
        </caption>
        <tr>
            <th>Име</th>
            <th>Брой продукти</th>
        </tr>

        <?php
        include "config.php";
        $sql="SELECT Name, Product_count FROM User ORDER BY CODE";
        $result=$conn->query($sql);
        $total_products=0;
        if ($result->num_rows > 0)
        {   // output data of each row
            while($row = $result->fetch_assoc())    {
                $total_products+=$row['Product_count'];
                echo"<tr>";
                echo "<td>" . $row["Name"] .
                "<td>" . $row["Product_count"];
                echo"</tr>";


            }
        } else echo "0 резултата";
        $conn->close();

        ?>
    </table>
    <h2 style="color:red">
        <b>
            Общ брой реализирани продукти => <?php echo $total_products;?>
        </b>
    </h2>
    
            <a href="index.htm#menu>"> Меню =>  </a>
</body>
</html>
