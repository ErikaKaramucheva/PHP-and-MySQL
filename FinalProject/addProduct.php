<html>
<head>
    <title> Добавяне на продукт </title>
    <link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>
    <h3 style="font-family: 'Pacifico', cursive;
    font-size: xx-large">
        Добавяне на продукт
    </h3>

    <?php
    include "config.php";
    if(isset($_POST['submit']))
    {

        $sql= "INSERT INTO Product (Code,Name,Unit_price) VALUES (" .
        (int)$_POST["Code"] . ",'" .
        $_POST["Name"] . "',".
        (float)$_POST["Unit_price"].")";
        $result=$conn->query($sql);
        if($result===TRUE)
            echo "<font><b>Записът е добавен успешно!</b></font>";
        else  echo "<font><b>Записът не е добавен!</b></font>";
    }

    ?>
    <form method="post">
       <h3><b> Номер: </b><input type="text" size="6" name="Code"
            value="<?php
                   $sql='select Code from Product ORDER BY Code DESC';
                   $result=$conn->query($sql);

                   $res=$result->fetch_assoc();
                   echo $res['Code']+1;
                   ?>" />
        <h3>
           <b> Име: </b><input type="text" size="100" name="Name" />
            <h3>
             <b>   Единична цена: </b><input type="text" name="Unit_price" />
                <p>
                <input type="submit" name="submit" value="Добавяне" />
    </form>
    <?php
    $conn->close();
    ?>
    <p>
        <br />
        <a href="index.htm"> Начална страница =>> </a>
</body>
</html>
