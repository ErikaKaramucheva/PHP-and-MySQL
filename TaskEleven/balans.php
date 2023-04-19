<html>
<head>
    <meta charset="UTF-8" />
    <title> ������ </title>
    <style>
         body{
             background-color:mediumaquamarine;
             text-align:center;
         }
        
    </style>

</head>
<body>
    <h3> ������ �� ������� </h3>
    <table>
        <caption>
            <big>
                <b> ������ �� ������� </b>
            </big>
        </caption>
        <tr>
            <th>��� </th>
            <th>��� </th>
            <th>��� �� ������ </th>
            <th>���� </th>
        </tr>

        <?php
        include "config.php";
        $s=0;
        $sql="SELECT * FROM User";
        $result=$conn->query($sql);
        if ($result->num_rows > 0)
        {
            while($row = $result->fetch_assoc())
            {
                echo "<tr>";
                echo "<td>". $row["Code"].
                "<td>" . $row["Name"].
                "<td>" . $row["Kind"].
                "<td>" . $row["Sum"];
                if($row["Kind"]==1)
                    $s+=$row["Sum"];
                else $s-=$row["Sum"];
                echo "</tr>\n";
            }
        } else echo "0 ���������";
        $conn->close();

        $s=round($s,2);
        echo "<tr>";
echo "<th colspan=2>    ������:";
echo "<th colspan=2>" . $s . "</tr>\n";
        ?>
    </table><p>
       ������� �� ����: 1 => �������;  2 => ����������.
        <p>
            <a href="index.htm#menu>"> ���� =>  </a>
</body>
</html>
