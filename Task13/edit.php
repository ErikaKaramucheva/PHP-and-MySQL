<html>
<head>


    <title> Промяна </title>
    <style> body {
            background-color:honeydew;
            text-align: center;
        } table{
     margin-right:auto;
     margin-left:auto;
 }
    </style>
</head>
<body>
    <h3> Промяна </h3>
    <?php
    include "config.php";
    if(isset($_GET['edit']) && $_GET['edit'])
    {
        $sql="SELECT * FROM Supplier WHERE Code=" . (int)$_GET['edit'];
        $result=$conn->query($sql);
        $row=$result->fetch_assoc();
    ?>
    <form method="post" action="edit.php">
        <table cellpadding="8">
            <tr>
                <td> Код: </td>
                <td>
                    <input type="hidden" size="6" name="Code"
                        value="<?php echo $row['Code']; ?>" />
                </td>
            </tr>
            <tr>
                <td>    Име:</td>
                <td>
                    <input type="text" size="32" name="Name"
                        value="<?php echo $row['Name']; ?>" />
                </td>
            </tr>
            <tr>
                <td>Материал:</td>
                <td>
                    <input type="text" size="32" name="Material_name"
                        value="<?php echo $row['Material_name']; ?>" />
                </td>
            </tr>
            <tr>
                <td>Количество:</td>
                <td>
                    <input type="number"  name="Quantity"
                        value="<?php echo $row['Quantity']; ?>" />
                </td>
            </tr>
            <tr>
                <td>Единична цена:</td>
                <td>
                    <input type="text"  name="Unit_price"
                        value="<?php echo $row['Unit_price']; ?>" />
                </td>
            </tr>
        </table><p>
            <input type="submit" name="submit" value="Потвърди" />
    </form>
    <?php
    } else {
        if(isset($_POST['submit']))
        {
            $sql="UPDATE Supplier SET Name=' " . $_POST['Name'] . " ',Material_name=' " . $_POST['Material_name'] .
            "' ,Quantity=" .(float) $_POST['Quantity'] . ",Unit_price=" .(float) $_POST['Unit_price'] ." WHERE Code=" . (int) $_POST['Code'];
            $result=$conn->query($sql);
        }
        $result=$conn->query("SELECT * FROM Supplier ORDER BY Name ASC");

        if ($result->num_rows <= 0)
            echo "0 резултата";
        else
        {
            $zag=array("Код","Име","Материал","Количество","Единична цена");
    ?>
    <table border="4" bordercolor="black" cellpadding="15" cellspacing="0" >
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
                <a href="edit.php?edit=<?php echo $row['Code']; ?>">Промяна </a>
            </td>
        </tr>
        <?php
            }
        }
    }
        ?>
    </table>
    <?php   $conn->close();  ?>
    <p>
        <a href="index.htm#Menu"> Меню =>> </a>
</body>
</html>
