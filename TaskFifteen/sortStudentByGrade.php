<html>
<head>
    <title> Търсене на студенти с отличен среден успех </title>
    <style>
         body{
            background-color:burlywood;
             text-align:center;
         }

        table{
           margin-right:auto;
           margin-left:auto;
        }
    </style>
</head>
<body>
    <h2> Търсене на студенти с отличен среден успех </h2>
    <table>
        <caption>
            <big>
                <b>Студенти с отличен успех</b>
            </big>
        </caption>
        <tr>
            <th>Факултетен номер </th>
            <th>Име</th>
            <th>Курс</th>
            <th>Специалност</th>
            <th>Форма</th>
            <th>Среден успех</th>
        </tr>

        <?php
        include "config.php";
        $sql="SELECT * FROM Student WHERE Avg_grades>=5.5 ORDER BY  Avg_grades DESC";
        $result=$conn->query($sql);
        if ($result->num_rows > 0)
        {   // output data of each row
            while($row = $result->fetch_assoc())    {
                echo"<tr>";
                echo "<td>". $row["Faculty_number"].
                "<td>" . $row["Name"] .
                "<td>" . $row["Course"] .
                    "<td>";
                $sql2="SELECT Name FROM Courses Where Code= ".$row["Course_id"];
                $result2= $conn->query($sql2);
                if ($result2->num_rows > 0){
                    while($row2 = $result2->fetch_assoc()){
                        echo $row2["Name"];
                    }
                }else{
                    echo "null";
                }
                echo "<td>";
                if($row["Form"]=="1"){
                    echo "редовно обучение";
                }else{
                    echo "задочно обучение";
                }
                echo "<td>" . $row["Avg_grades"];
                echo"</tr>";
            }
        } else echo "0 резултата";
        $conn->close();

        ?>
    </table>
            <a href="index.htm#menu>"> Меню =>  </a>
</body>
</html>
