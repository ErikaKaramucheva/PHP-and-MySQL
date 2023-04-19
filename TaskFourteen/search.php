<html>
<head>
    <title> Търсене </title>
    <style>
                 body{

             background-color:cornflowerblue;
             text-align:center;
             color:mediumvioletred;
         }

        table{
           margin-right:auto;
           margin-left:auto;
        }
    </style>
</head>
<body>
    

    <?php
    include "config.php";
    $result=null;
   // if(isset($_POST['search'])){
        $search=$_POST['search'];
        if($search=="1"){
            $sql="SELECT * FROM Goods WHERE Quantity<=5";
            echo "<h2> Извеждане на продукти с критично количество (<=5)</h2>";
        }else if($search=="2"){
            $price=$_POST['price'];
            $sql="SELECT * FROM Goods WHERE Unit_price>= " .(int)$price. " ORDER BY Unit_price ASC";
            echo "<h2> Извеждане на продукти с минимална цена ". $price." </h2>";
        }
   // }
    else{
        $sql="SELECT * FROM Goods";
        echo "<h2> Извеждане на всички продукти=> неуспешно зададен критерий</h2>"; }
    $result=$conn->query($sql);
    if ($result->num_rows <= 0)
        echo "0 резултата";
    else
    {
        $zag=array("Код","Име","Единична цена","Количество");
    ?>

    <table >
       
        <tr>
            <?php
        foreach($zag as $v) echo "<th>" .$v. "</th>";
            ?>
        </tr>

        <?php
        while($row = $result->fetch_assoc())
        { ?>
        <tr>
            <td>
                <?php echo $row["Code"] ; ?>
            </td>
            <td>
                <?php echo $row["Name"] ; ?>
            </td>
            <td>
                <?php echo $row["Unit_price"] ; ?>
            </td>
            <td>
                <?php echo $row["Quantity"] ; ?>
            </td>
        </tr>
        <?php
        }
    }
        ?>
    </table>
    <?php
    $conn->close();
    ?><p>
        <a href="index.htm#Menu"> Меню=>> </a>
</body>
</html>
