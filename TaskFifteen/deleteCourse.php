<html>
<head>
    <title> Изтриване </title>
    <style>
                        body{
             background-color:burlywood;
             text-align:center;
         }

    </style>
</head>
<body>
    <h3> Премахване на специалност </h3>

    <?php
    include "config.php";
    if(isset($_GET['del']))
    {
        $sql="DELETE FROM Courses WHERE Code=" .(int)$_GET['del'];
        $result=$conn->query($sql);
    }
    $sql="SELECT * FROM Courses ORDER BY Name ASC";
    $result=$conn->query($sql);
    if ($result->num_rows <= 0)
        echo "0 резултата";
    else
    {
        $zag=array("Код","Специалност","<font>Изтриване</font>");
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
                <?php echo $row["Code"]; ?>
            </td>
            <td>
                <?php echo $row["Name"]; ?>
            </td>
            
            <td align=center>
                <a href="deleteCourse.php?del=<?php echo $row['Code']; ?>"> Изтрий </a>
            </td>
        </tr>
        <?php
        }
    }
    $conn->close();
        ?>
    </table>
    <p>
        <a href="index.htm#Menu"> Меню =>> </a>
</body>
</html>

