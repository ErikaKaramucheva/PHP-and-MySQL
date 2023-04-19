<html>
<head>
    <title> Промяна данните за поръчка </title>
    <link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>
    <h3 style="font-family: 'Pacifico', cursive;
    font-size: xx-large">
        Промяна данните за поръчка
    </h3>
    <?php
    include "config.php";
    if(isset($_GET['edit']) && $_GET['edit'])
    {
        $sql="SELECT * FROM Orders WHERE Code=" . (int)$_GET['edit'];
        $result=$conn->query($sql);
        $row=$result->fetch_assoc();
    ?>
    <form method="post" action="editOrder.php">
        <table>
            <tr>
                <td> <b> Код:</b> </td>
                <td>
                    <input type="hidden" size="6" name="Code"
                        value="<?php echo $row['Code']; ?>" />
                </td>
            </tr>
            <tr>
                <td> <b>Клиент:</b></td>
                <td>
                    <select name="Customer_id">
                        <?php
        $sql2="Select * from Customer";
        $result2= $conn->query($sql2);
        $names=array();
        if ($result2->num_rows > 0){
            while($row2 = $result2->fetch_assoc())
            {array_push($names,$row2 );}
        }
        foreach($names as $name){

            $type=$name['Code'];
            echo "<option value=\"$type\">" ,$name['Name'],"</option>";
        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td><b>Продукт:</b></td>
                <td>
                    <select name="Product_id">
                        <?php
        $sql3="Select * from Product";
        $result3= $conn->query($sql3);
        $names=array();
        if ($result3->num_rows > 0){
            while($row3 = $result3->fetch_assoc())
            {array_push($names,$row3 );}
        }
        foreach($names as $name){
            $type=$name['Code'];
            echo "<option value=\"$type\">" ,$name['Name'],"</option>";
        }
                        ?>
                    </select>
                </td>
            </tr>
           
               <tr>
                   <td> <b>Вид на клиента:</b></td>
                   <td>
                       <?php
        $type=$row['User_type'];
        if($type=="1"){
            echo" <input type=\"radio\" name=\"User_type\" value=\"1\" checked=\"checked\" /> Заплатил всичко авансово <br/>";
            echo"   <input type=\"radio\" name=\"User_type\" value=\"2\" /> Предплатил авансово само 15%<br/>";
            echo" <input type=\"radio\" name=\"User_type\" value=\"3\" /> Не е заплатил <br/>";
        }else if($type=="2"){
            echo" <input type=\"radio\" name=\"User_type\" value=\"1\" /> Заплатил всичко авансово <br/>";
            echo"   <input type=\"radio\" name=\"User_type\" value=\"2\" checked=\"checked\" /> Предплатил авансово само 15%<br/>";
            echo" <input type=\"radio\" name=\"User_type\" value=\"3\" /> Не е заплатил <br/>";
        }else{
            echo" <input type=\"radio\" name=\"User_type\" value=\"1\" /> Заплатил всичко авансово <br/>";
            echo"   <input type=\"radio\" name=\"User_type\" value=\"2\" /> Предплатил авансово само 15%<br/>";
            echo" <input type=\"radio\" name=\"User_type\" value=\"3\" checked=\"checked\" /> Не е заплатил <br/>";
        };
                       ?>
                    
                       </td>
                </tr>
        <tr>
                        <td><b>Количество</b></td>
            <td><input type="number" name="Quantity" value="<?php echo $row['Quantity']; ?>" /></td>
        </tr>
        <tr>
            <td>
                         <b>   Дата:</b> </td>
            <td><input type="date" name="Date_of_request" value="<?php $date=date_create($row["Date_of_request"]);
                echo date_format($date,"d.m.Y"); ?>" />
            </td>
            </tr>
        </table><p>
            <input type="submit" name="submit" value="Промени" />
    </form>
    <?php
    } else {
        if(isset($_POST['submit']))
        {
            $sql4="SELECT * FROM Product WHERE Code=".(int)$_POST["Product_id"];
            $result4= $conn->query($sql4);
            if ($result4->num_rows > 0){
                while($row4 = $result4->fetch_assoc()){
                    $price=$row4['Unit_price'];
                    echo $price;
                }
            }else{
                echo "no";
            }

            $total_price=$price*(int)$_POST['Quantity'];

            $sql="UPDATE Orders SET Customer_id= " .(int) $_POST['Customer_id'] .
            " ,Product_id= " .(int) $_POST['Product_id'] .
            " ,User_type= " .(int) $_POST['User_type'] .
            " ,Quantity= " .(int) $_POST['Quantity'] .
                " ,Total_price=" .(float) $total_price.
                ",Date_of_request=' ".$_POST['Date_of_request'].
                " ' WHERE Code=" . (int) $_POST['Code'];
            $result=$conn->query($sql);
        }
        $result=$conn->query("SELECT * FROM Orders ORDER BY Code ASC");

        if ($result->num_rows <= 0)
            echo "0 резултата";
        else
        {
            $zag=array("Код","Клиент","Продукт","Вид на клиента","Количество","Крайна сума","Дата", "Промяна");
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
                <?php echo $row["Code"] ?>
            </td>
            <td>
                <?php $cust=$row["Customer_id"];
                          $sqlStatement="SELECT Name FROM Customer WHERE Code=".(int)$cust;
                          $result2= $conn->query($sqlStatement);
                          if ($result2->num_rows > 0){
                              while($row2 = $result2->fetch_assoc())
                              {echo $row2['Name'];}
                          }

                ?>
            </td>
            <td>
                <?php $product=$row["Product_id"];
                          $sqlS="SELECT Name FROM Product WHERE Code=".(int)$product;
                          $result3= $conn->query($sqlS);
                          if ($result3->num_rows > 0){
                              while($row3 = $result3->fetch_assoc())
                              {echo $row3['Name'];}
                          }?>
            </td>
            <td>
                <?php $type=$row["User_type"];
                          if($type=="1"){
                              echo "Заплатил е всичко авансово";
                          }else if($type=="2"){
                              echo "Предплатил авансово само 15%";
    }else{
        echo "Не е заплатил";
    }
                ?>
            </td>
            <td>
                <?php echo $row["Quantity"] ?>
            </td>
            <td>
                <?php echo $row["Total_price"] ?>
            </td>
            <td>
                <?php  $date=date_create($row["Date_of_request"]);
                echo date_format($date,"d.m.Y"); ?>
            </td>
            <td align=center>
                <a href="editOrder.php?edit=<?php echo $row['Code']; ?>">Промени </a>
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
