<html>
<head>
    <title> Добавяне на специалност </title>
    <style>
                body{
             background-color:burlywood;
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

        $sql= "INSERT INTO Courses (Code,Name) VALUES (" .
        (int)$_POST["Code"] . ",'" .
        $_POST["Name"] . "')";
        $result=$conn->query($sql);
        if($result===TRUE)
            echo "<font><b>Записът е добавен успешно!</b></font>";
        else  echo "<font><b>Записът не е добавен!</b></font>";
    }

    ?>
    <form method="post">
        Номер: <input type="text" size="6" name="Code"
            value="<?php
                       $sql='select Code from Courses ORDER BY Code DESC';
                       $result=$conn->query($sql);

                       $res=$result->fetch_assoc();
                       echo $res['Code']+1;
                       ?>" />
        <p>
            Специалност: <input type="text" size="32" name="Name" />
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
