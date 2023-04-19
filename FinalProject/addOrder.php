<html>
<head>
    <title> Създаване на поръчка </title>
    <link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>
    <h3 style="font-family: 'Pacifico', cursive;
    font-size: xx-large">
        Създаване на поръчка
    </h3>

    <?php
    include "config.php";
    if(isset($_POST['submit']))
    {
        $sql4="SELECT * FROM Product WHERE Code=".(int)$_POST["Product_id"];
         $result4= $conn->query($sql4);
         if ($result4->num_rows > 0){
             while($row4 = $result4->fetch_assoc()){
                 $price=$row4['Unit_price'];
             }
         }else{
             echo "no";
         }

        $total_price=$price*(int)$_POST['Quantity'];
        $date=$_POST['Date_of_request'];

        $sql= "INSERT INTO Orders (Code,Customer_id,Product_id,User_type,Quantity,Total_price,Date_of_request) VALUES (" .
        (int)$_POST["Code"] . "," .
        (int)$_POST["Customer_id"] . "," .
        (int)$_POST["Product_id"] . "," .
        (int)$_POST["User_type"] . "," .
        (int)$_POST["Quantity"] . "," .
        (float)$total_price . ", '" .
        $date. " ')";
        $result=$conn->query($sql);
        if($result===TRUE)
            echo "<font><b>Записът е добавен успешно!</b></font>";
        else  echo "<font><b>Записът не е добавен!</b></font>";
    }

    ?>
    <form  method="post">
       <h3><b> Номер: </b><input type="text" size="6" name="Code"
            value="<?php
                       $sql='select Code from Orders ORDER BY Code DESC';
                       $result=$conn->query($sql);

                       $res=$result->fetch_assoc();
                       echo $res['Code']+1;
                       ?>" />
            <h3>
               <b> Клиент:</b> <select name="Customer_id">
                    <?php
                                    $sql2="Select * from Customer";
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
                <h3>
                    <b>Продукт:</b> <select name="Product_id">
                        <?php
                        $sql2="Select * from Product";
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
                    <h3>
                           <b> Вид на клиента:</b></h3>
                    <p>
                            <input type="radio" name="User_type" value="1" checked="checked" /> Заплатил всичко авансово 
                            <input type="radio" name="User_type" value="2" /> Предплатил авансово само 15%
                            <input type="radio" name="User_type" value="3" /> Не е заплатил
                       
                    <h3>
                       <b> Количество </b><input type="number" name="Quantity" />
                        <h3>
                           <b> Дата: </b><input type="date" name="Date_of_request" />
                            <p>
                                <input type="submit" name="submit" value="Добавяне" />
</form>
    <?php
        $conn->close();
    ?>
    <p>
        <br />
        <a href="index.htm"> Начална страница => </a>
</body>
</html>
