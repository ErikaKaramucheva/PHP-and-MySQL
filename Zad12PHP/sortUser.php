<html>
<head>
    <title> Търсене </title>
    <style>
            body{
             background-color:thistle;
             text-align:center;
         }
    </style>
</head>
<body>
    <h2>Търсене по вид </h2>

    <?php
    include "config.php";
    $result=null;
    if(isset($_POST['vid']))
        $sql="SELECT * FROM User WHERE Kind = " .(int)$_POST['vid']. " ORDER BY Kind ASC";
    else
        $sql="SELECT * FROM User ORDER BY Kind ASC";
    $result=$conn->query($sql);
    if ($result->num_rows <= 0)
        echo "0 резултата";
    else
    {
        $zag=array("Код","Име","Вид","Брой продукти");
    ?>

    <table border="4" bordercolor="black" cellpadding="15" cellspacing="0">
        <caption>
            <b>
                <big>
                    Клиенти от избран вид: &nbsp; <?php echo $_POST['vid'];
                                                  ?>
                </big>
            </b>
        </caption>
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
                <?php echo $row["Kind"] ; ?>
            </td>
            <td>
                <?php echo $row["Product_count"] ; ?>
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
