<html>
<head>
    <title> Изтриване </title>
    <style> body {
            background-color:honeydew;
            text-align: center;
        }
 table{
     margin-right:auto;
     margin-left:auto;
 }
    </style>
</head>
<body>
    <h3> Изтриване на данни </h3>

    <?php
    include "config.php";
    if(isset($_GET['del']))
    {
        $sql="DELETE FROM Supplier WHERE Code=" .(int)$_GET['del'];
        $result=$conn->query($sql);
    }
    $sql="SELECT * FROM Supplier ORDER BY Name ASC";
    $result=$conn->query($sql);
    if ($result->num_rows <= 0)
        echo "0 резултата";
    else
    {
        $zag=array("Код","Име","Материал","Количество","Цена","<font>Изтриване</font>");
    ?>
    <table border="4" bordercolor="black" cellpadding="15" cellspacing="0">
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
                <?php echo $row["Material_name"]; ?>
            </td>
            <td>
                <?php echo $row["Quantity"]; ?>
            </td>
            <td>
                <?php echo $row["Unit_price"]; ?>
            </td>
            <td align=center>
                <a href="delete.php?del=<?php echo $row['Code']; ?>"> Изтрий </a>
            </td>
        </tr>
        <?php
        }
    }
    $conn->close();
        ?>
    </table>
    <p>
        <a href="index.htm#Menu"> Меню =>> </a>
</body>
</html>

