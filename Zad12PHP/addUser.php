<html>
<head>
    <title> Добавяне на потребител </title>
    <style>
         body{
             background-color:thistle;
             text-align:center;
         }
    </style>
</head>
<body>
    <h3>Добавяне </h3>

    <?php
    include "config.php";
    if(isset($_POST['submit']))
    {
        $sql= "INSERT INTO User (Code,Name,Kind,Product_count) VALUES (" .
        (int)$_POST["Code"] . ",'" .
        $_POST["Name"] . "'," .
        (int)$_POST["Kind"] . "," .
        (float)$_POST["Product_count"] . ")";
        $result=$conn->query($sql);
        if($result===TRUE)
            echo "<font><b>Записът е добавен успешно!</b></font>";
        else  echo "<font><b>Записът не е добавен!</b></font>";
    }
    ?>
    <form name="f1" method="post">
        Вид на клиента:
        <input type="radio" name="user" value="1" checked="checked" /> Дистрибутор &nbsp;
        <input type="radio" name="user" value="2" /> Клиент <br />
        <input type="submit" name="submit2" value="Изберете" />
        <?php
        if(isset($_POST['user']))
            $help = $_POST['user'];
        else $help="1";
        ?>
    </form><p>
        <form name="f2" method="post">
            Номер: <input type="text" size="6" name="Code"
                value="<?php
                       $sql='select Code from User ORDER BY Code DESC';
                       $result=$conn->query($sql);

                       $res=$result->fetch_assoc();
                       echo $res['Code']+1;
                       ?>" />
            <p>
                Име: <input type="text" size="32" name="Name" />
                <p>
                    Вид: <input type="text" size="5" name="Kind" value=" <?php echo $help;  ?> " />
                    <p>
                        Брой продукти: <input type="text" name="Product_count" />
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
