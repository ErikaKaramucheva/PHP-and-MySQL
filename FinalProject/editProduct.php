<html>
<head>
    <title> Промяна данните за продукт </title>
    <link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>
    <h3 style="font-family: 'Pacifico', cursive;
    font-size: xx-large">
        Промяна данните за продукт
    </h3>
    <?php
    include "config.php";
    if(isset($_GET['edit']) && $_GET['edit'])
    {
        $sql="SELECT * FROM Product WHERE Code=" . (int)$_GET['edit'];
        $result=$conn->query($sql);
        $row=$result->fetch_assoc();
    ?>
    <form method="post" action="editProduct.php">
        <table>
            <tr>
                <td><b> Код:</b> </td>
                <td>
                    <input type="hidden" size="6" name="Code"
                        value="<?php echo $row['Code']; ?>" />
                </td>
            </tr>
            <tr>
                <td><b>Име:</b></td>
                <td>
                    <input type="text" size="100" name="Name"
                        value="<?php echo $row['Name']; ?>" />
                </td>
            </tr>
            <tr>
                <td><b>Единична цена:</b></td>
                <td>
                    <input type="text" size="100" name="Unit_price"
                        value="<?php echo $row['Unit_price']; ?>" />
                </td>
            </tr>

        </table><p>
            <input type="submit" name="submit" value="Промени" />
    </form>
    <?php
    } else {
        if(isset($_POST['submit']))
        {
            $sql="UPDATE Product SET Name=' " . $_POST['Name'] . " ',Unit_price=" .(float) $_POST['Unit_price'] ." WHERE Code=" . (int) $_POST['Code'];
            $result=$conn->query($sql);
        }
        $result=$conn->query("SELECT * FROM Product ORDER BY Code ASC");

        if ($result->num_rows <= 0)
            echo "0 резултата";
        else
        {
            $zag=array("Код","Продукт","Единична цена", "Промяна");
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
                <a href="editProduct.php?edit=<?php echo $row['Code']; ?>">Промени </a>
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
        <br />
        <a href="index.htm"> Начална страница => </a>
</body>
</html>
