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
    <h3> Премахване на студент </h3>

    <?php
    include "config.php";
    if(isset($_GET['del']))
    {
        $sql="DELETE FROM Student WHERE Faculty_number=" .(int)$_GET['del'];
        $result=$conn->query($sql);
    }
    $sql="SELECT * FROM Student ORDER BY Name ASC";
    $result=$conn->query($sql);
    if ($result->num_rows <= 0)
        echo "0 резултата";
    else
    {
        $zag=array("Факултетен номер","Име","Курс","Специалност","Форма","Среден успех","<font>Изтриване</font>");
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
                <?php echo $row["Faculty_number"]; ?>
            </td>
            <td>
                <?php echo $row["Name"]; ?>
            </td>
            <td>
                <?php echo $row["Course"]; ?>
            </td>
            <td>
                <?php
            $course_id=$row["Course_id"];
            $sql2="Select Name from Courses WHERE Code= ".$course_id;
            $result2= $conn->query($sql2);
            if ($result2->num_rows > 0){
                 while($row2 = $result2->fetch_assoc())
                                      echo $row2["Name"];
                                    } else{
                echo "null";
            }


                ?>
            </td>
            <td>
                <?php if ($row["Form"]=="1"){
                echo "Редовно обучение";}
                      else{ echo "Задочно обучение";}
                ; ?>
            </td>
            <td>
                <?php echo $row["Avg_grades"]; ?>
            </td>
            <td align=center>
                <a href="deleteStudent.php?del=<?php echo $row['Faculty_number']; ?>"> Изтрий </a>
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

