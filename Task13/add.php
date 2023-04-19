<html>
<head>
    <title> Добавяне </title>
    <style> body {
            background-color:honeydew;
            text-align: center;
        }
    </style>
</head>
<body>
    <h3> Вмъкване </h3>

    <?php
    include "config.php";
    if(isset($_POST['submit']))
    {
        $sql= "INSERT INTO Supplier (Code,Name,Material_name, Quantity,Unit_price) VALUES (" .
        (int)$_POST["Code"] . ",'" .
        $_POST["Name"] . "','" .
        (string)$_POST["Material_name"] . "'," .
        (int)$_POST["Quantity"] . "," .
        (float)$_POST["Unit_price"] . ")";
        $result=$conn->query($sql);
        if($result===TRUE)
            echo "<font><b>Записът е добавен успешно!</b></font>";
        else  echo "<font><b>Записът не е добавен!</b></font>";
    }
    ?>
    <p>
        <form name="form" method="post">
            Код: <input type="text" size="6" name="Code"
                value="<?php
                       $sql='select Code from Supplier ORDER BY Code DESC';
                       $result=$conn->query($sql);

                       $res=$result->fetch_assoc();
                       echo $res['Code']+1;
                       ?>" />
            <p>
                Име: <input type="text" size="32" name="Name" />
                <p>
                    Материал: <input type="text" size="32" name="Material_name" />
                    <p>
                        Единична цена: <input type="text" name="Unit_price" />
                        <p>
                             <p>Количество: <input type="number" name="Quantity" /></p>
                            <input type="submit" name="submit" value="Добавяне" />
        </form>
        <?php
        $conn->close();
        ?>
        <p>
            <a href="index.htm#menu"> Меню =>> </a>
</body>
</html>
