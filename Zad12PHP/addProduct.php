<html>
<head>
    <title> Добавяне на продукт </title>
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

        $sql= "INSERT INTO Product (Code,Name,User_id,Unit_price) VALUES (" .
        (int)$_POST["Code"] . ",'" .
        $_POST["Name"] . "'," .
        (int)$_POST["Kind"] . "," .
        (float)$_POST["Unit_price"] . ")";
        $result=$conn->query($sql);
        if($result===TRUE)
            echo "<font><b>Записът е добавен успешно!</b></font>";
        else  echo "<font><b>Записът не е добавен!</b></font>";
    }
   
    ?>
        <form name="f2" method="post">
            Номер: <input type="text" size="6" name="Code"
                value="<?php
                       $sql='select Code from User ORDER BY Code DESC';
                       $result=$conn->query($sql);

                       $res=$result->fetch_assoc();
                       echo $res['Code']+1;
                       ?>" />
            <p>
                Име на продукта: <input type="text" size="32" name="Name" />
                <p>
                   Потребител: <select name="Kind" >
                                  <?php
                                    $sql2="Select Name, Code from User";
                                    $result= $conn->query($sql2);
                                    $names=array();
                                    if ($result->num_rows > 0){
                                        while($row = $result->fetch_assoc())
                                        {array_push($names,$row );}
                                    }
                                        foreach($names as $name){

                                            $type=$name['Code'];
                                            echo "<option value=\"$type\">" ,$name['Name'],"</option>";
                                        }
                                    ?>
                   </select>
                    
                    <p>
                        Единична цена <input type="text" name="Unit_price" />
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
