<html>
<head>
    <title> Добавяне </title>
    <style>
         body{
             
             background-color:cornflowerblue;
             text-align:center;
             color:mediumvioletred;
         }
    </style>
</head>
<body>
    <h3> Добавяне</h3>

    <?php
    include "config.php";
    if(isset($_POST['submit']))
    {
        $sql= "INSERT INTO Goods (Code,Name,Unit_price,Quantity) VALUES (" .
        (int)$_POST["Code"] . ",'" .
        $_POST["Name"] . "'," .
         (float)$_POST["Unit_price"]. ",".
        (int)$_POST["Quantity"] . ")" ;
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
                       $sql='select Code from Goods ORDER BY Code DESC';
                       $result=$conn->query($sql);

                       $res=$result->fetch_assoc();
                       echo $res['Code']+1;
                       ?>" />
            <p>
                Име: <input type="text" size="32" name="Name" />
                <p>
                    Единична цена: <input type="text" name="Unit_price"  />
                    <p>
                        Количество: <input type="number" name="Quantity" />
                        <p>
                            <input type="submit" name="submit" value="Добавяне" />
        </form>
        <?php
        $conn->close();
        ?>
        <p>
            <a href="index.htm#menu"> Меню =>> </a>
</body>
</html>
