<html>
<head>
    <title> Търсене </title>
    <style>
         body{
             background-color:mediumaquamarine;
             text-align:center;
         }
    </style>
</head>
<body>
    <h2>Търсене по сума </h2>
    <?php
    include "config.php";
    $result=null;
    if(isset($_POST['max']))
        $sql="SELECT * FROM User WHERE Kind = 2 AND Sum > " .(float)$_POST['max']. " ORDER BY Sum ASC";
    else
        $sql="SELECT * FROM User WHERE Kind = 2 AND Sum > 0 ORDER BY Sum ASC";
    $result=$conn->query($sql);
    if ($result->num_rows <= 0)
        echo "0 резултата";
    else
    {
        $zag=array("Kod","Ime","Vid","Suma");
    ?>

    <table border="4" bordercolor="black" cellpadding="15" cellspacing="0" width=50%>
        <caption>
            <b>
                <big>Партньори, на които фирмата има задължения над
                    <?php echo $_POST['max']; ?> лева:
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
                <?php echo $row["Sum"] ; ?>
            </td>
        </tr>
        <?php
}
}
        ?>
    </table><p>
        <?php  $conn->close();  ?>
        <a href="index.htm#Menu"> Меню=>> </a>
</body>
</html>
