<html>
<head>
    <title> Вмъкване </title>
    <style>
         body{
             background-color:mediumaquamarine;
             text-align:center;
         }
    </style>
</head>
<body>
    <h3> Вмъкване </h3>

    <?php
    include "config.php";
    if(isset($_POST['submit']))
    {
        $sql= "INSERT INTO User (Code,Name,Kind,Sum) VALUES (" .
        (int)$_POST["Code"] . ",'" .
        $_POST["Name"] . "'," .
        (int)$_POST["Kind"] . "," .
        (float)$_POST["Sum"] . ")";
        $result=$conn->query($sql);
        if($result===TRUE)
            echo "<font><b>Записът е добавен успешно!</b></font>";
        else  echo "<font><b>Записът не е добавен!</b></font>";
    }
    ?>
    <form name="f1" method="post">
        Вид на партньора:
        <input type="radio" name="user" value="1" checked="checked" /> Вземане &nbsp;
        <input type="radio" name="user" value="2" /> Задължение <br />
        <input type="submit" name="submit2" value="Изберете" />
        <?php
        if(isset($_POST['user']))
            $help = $_POST['user'];
        else $help="1";
        ?>
    </form><p>
        <form name="f2" method="post">
            Код: <input type="text" size="6" name="Code"
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
                        Сума: <input type="text" name="Sum" />
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
