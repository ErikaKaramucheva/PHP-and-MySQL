<html>
<head>
    <title> Промяна </title>
    <style>
        body {
            background-color: burlywood;
            text-align: center;
        }
    </style>
</head>
<body>
    <h3> Промяна данните за специалност </h3>
    <?php
    include "config.php";
    if(isset($_GET['edit']) && $_GET['edit'])
    {
        $sql="SELECT * FROM Courses WHERE Code=" . (int)$_GET['edit'];
        $result=$conn->query($sql);
        $row=$result->fetch_assoc();
    ?>
    <form method="post" action="editCourse.php">
        <table cellpadding="8">
            <tr>
                <td> Код: </td>
                <td>
                    <input type="hidden" size="6" name="Code"
                        value="<?php echo $row['Code']; ?>" />
                </td>
            </tr>
            <tr>
                <td>Име:</td>
                <td>
                    <input type="text" size="32" name="Name"
                        value="<?php echo $row['Name']; ?>" />
                </td>
            </tr>
            
        </table><p>
            <input type="submit" name="submit" value="Промени" />
    </form>
    <?php
    } else {
        if(isset($_POST['submit']))
        {
            $sql="UPDATE Courses SET Name=' " . $_POST['Name'] . " ' WHERE Code=" . (int) $_POST['Code'];
            $result=$conn->query($sql);
        }
        $result=$conn->query("SELECT * FROM Courses ORDER BY Name ASC");

        if ($result->num_rows <= 0)
            echo "0 резултата";
        else
        {
            $zag=array("Код","Специалност");
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
                <a href="editCourse.php?edit=<?php echo $row['Code']; ?>">Промени </a>
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
        <a href="index.htm#Menu"> Меню =>> </a>
</body>
</html>
