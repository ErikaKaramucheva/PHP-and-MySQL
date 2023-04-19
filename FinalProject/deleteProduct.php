<html>
<head>
    <title> Изтриване на продукт </title>
    <link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>
    <h3 style="font-family: 'Pacifico', cursive;
    font-size: xx-large">
        Изтриване на продукт
    </h3>

    <?php
    include "config.php";
    if(isset($_GET['del']))
    {
        $sql="DELETE FROM Product WHERE Code=" .(int)$_GET['del'];
        $result=$conn->query($sql);
    }
    $sql="SELECT * FROM Product ORDER BY Code ASC";
    $result=$conn->query($sql);
    if ($result->num_rows <= 0)
        echo "0 резултата";
    else
    {
        $zag=array("Код","Продукт","Единична цена","<font>Изтриване</font>");
    ?>
    <table>
        <tr>
            <?php
        foreach($zag as $v) echo "<th>" .$v. "</th>";
            ?>
        </tr>
        <?php
        while($row = $result->fetch_assoc())
        {
        ?>
        <tr>
            <td>
                <?php echo $row["Code"]; ?>
            </td>
            <td>
                <?php echo $row["Name"]; ?>
            </td>
            <td>
                <?php echo $row["Unit_price"]; ?>
            </td>

            <td align=center>
                <a href="deleteProduct.php?del=<?php echo $row['Code']; ?>"> Изтрий </a>
            </td>
        </tr>
        <?php
        }
    }
    $conn->close();
        ?>
    </table>
    <p>
        <br />
        <a href="index.htm"> Начална страница =>> </a>
</body>
</html>

