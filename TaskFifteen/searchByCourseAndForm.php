<html>
<head>
    <title> Търсене </title>
    <style> body{
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
    <h2>Търсене по специалност и форма на обучение  </h2>
    <form method="post">
        <p>
            Моля изберете специалност:<select name="Course_id">
    <?php
    include 'config.php';
                                    $sql2="Select * from Courses";
                                    $result2= $conn->query($sql2);
                                    $names=array();
                                    if ($result2->num_rows > 0){
                                        while($row2 = $result2->fetch_assoc())
                                        {array_push($names,$row2 );}
                                    }
                                        foreach($names as $name){

                                            $course_code=$name['Code'];
                                            echo "<option  value=\"$course_code\">" ,$name['Name'],"</option>";
                                        }
    ?>
</select>
        </p>
        <p>Изберете форма на обучение

<input type="radio" name="Form" value="1" checked="checked" /> Редовно обучение
<input type="radio" name="Form" value="2" /> Задочно обучение
        </p>
        <input type="submit" name="submit" />
    </form>
    <table>
        <tr>
            <th> Факултетен номер </th>
            <th>Име</th>
            <th> Курс</th>
            <th> Специалност</th>
            <th> Форма </th>
            <th> Среден успех </th>
        </tr>

        <?php
        include 'config.php';
        $sql="SELECT * FROM Student ORDER BY Faculty_number";
        if(array_key_exists('submit',$_POST)){
            $course=$_POST['Course_id'];
            $form=$_POST['Form'];
            $sql="SELECT * FROM Student WHERE Course_id=".$course." and Form=".$form." ORDER BY Faculty_number";
        }
        $result=$conn->query($sql);
        if ($result->num_rows <= 0)
            echo "0 резултата";
        else
        {

            while($row = $result->fetch_assoc())
            {
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
        }
        $conn->close();
        ?>
    </table><p>
        <a href="index.htm#menu"> Меню =>> </a>
</body>
</html>
