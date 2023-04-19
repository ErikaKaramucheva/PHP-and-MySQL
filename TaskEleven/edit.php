<html>
<head>
   
   
    <title> ������� </title>
    <style>
         body{
             background-color:mediumaquamarine;
             text-align:center;
         }

    </style>
</head>
<body >
    <h3> ������� �� ����� </h3>
    <?php
    include "config.php";
    if(isset($_GET['edit']) && $_GET['edit'])
    {
        $sql="SELECT * FROM User WHERE Code=" . (int)$_GET['edit'];
        $result=$conn->query($sql);
        $row=$result->fetch_assoc();
    ?>
    <form method="post" action="edit.php">
        <table cellpadding="8">
            <tr>
                <td> ���: </td>
                <td>
                    <input type="hidden" size="6" name="Code"
                        value="<?php echo $row['Code']; ?>" />
                </td>
            </tr>
            <tr>
                <td>���:</td>
                <td>
                    <input type="text" size="32" name="Name"
                        value="<?php echo $row['Name']; ?>" />
                </td>
            </tr>
            <tr>
                <td>��� (1=>�������;2=>����������):</td>
                <td>
                    <input type="text" size="8" name="Kind"
                        value="<?php echo $row['Kind']; ?>" />
                </td>
            </tr>
            <tr>
                <td>����:</td>
                <td>
                    <input type="text" size="6" name="Sum"
                        value="<?php echo $row['Sum']; ?>" />
                </td>
            </tr>
        </table><p>
            <input type="submit" name="submit" value="�������" />
    </form>
    <?php
    } else {
        if(isset($_POST['submit']))
        {
            $sql="UPDATE User SET Name=' " . $_POST['Name'] . " ',Kind=" .(int) $_POST['Kind'] .
            ",Sum=" .(float) $_POST['Sum'] . " WHERE Code=" . (int) $_POST['Code'];
            $result=$conn->query($sql);
        }
        $result=$conn->query("SELECT * FROM User ORDER BY Name ASC");

        if ($result->num_rows <= 0)
            echo "0 ���������";
        else
        {
            $zag=array("���","���","���","����","�������");
    ?>
    <table border="4" bordercolor="black" cellpadding="15" cellspacing="0" bgcolor="yellow">
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
            <td>
                <?php echo $row["Kind"]; ?>
            </td>
            <td>
                <?php echo $row["Sum"]; ?>
            </td>
            <td align=center>
                <a href="edit.php?edit=<?php echo $row['Code']; ?>">������� </a>
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
        <a href="index.htm#Menu"> ���� =>> </a>
</body>
</html>
