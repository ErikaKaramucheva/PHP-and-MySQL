<html>
<head>
    <title> Изтриване </title>
    <style>
                 body{
             background-color:thistle;
             text-align:center;
         }

    </style>
</head>
<body>
    <h3> Изтриване на потребител </h3>

    <?php
    include "config.php";
    if(isset($_GET['del']))
    {
        $sql="DELETE FROM User WHERE Code=" .(int)$_GET['del'];
        $result=$conn->query($sql);
    }
    $sql="SELECT * FROM User ORDER BY Name ASC";
    $result=$conn->query($sql);
    if ($result->num_rows <= 0)
        echo "0 резултата";
    else
    {
        $zag=array("Код","Име","Вид","Борй продукти","<font>Изтриване</font>");
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
                <?php echo $row["Kind"]; ?>
            </td>
            <td>
                <?php echo $row["Product_count"]; ?>
            </td>
            <td align=center>
                <a href="deleteUser.php?del=<?php echo $row['Code']; ?>"> Изтрий </a>
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

