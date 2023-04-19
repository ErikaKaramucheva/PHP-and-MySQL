<html>
<head>
    <title> Записване на студент </title>
    <style>
                 body{
             background-color:burlywood;
             text-align:center;
         }
    </style>
</head>
<body>
    <h3>Добавяне </h3>

    <?php
    include "config.php";
    if(isset($_POST['submit']))
    {
        if(($_POST['Course_id']=="4" || $_POST['Course_id']=="5"||$_POST['Course_id']=="6") && $_POST['Form']==2){
            echo" Специалностите Бизнес математаика, Приложна математика и Математика не поддържат задочна форма на обучение. <br/>";
           
        }else{
            

            $sql= "INSERT INTO Student  (Faculty_number,Name,Course,Course_id,Form,Avg_grades) VALUES (" .
            (int)$_POST["Faculty_number"] . ",'" .
            $_POST["Name"] . "'," .
            (int)$_POST["Course"] . "," .
            (int)$_POST["Course_id"] . "," .
            (int)$_POST["Form"] . "," .
            (float)$_POST["Avg_grades"] . ")";
            $result=$conn->query($sql);
            if($result===TRUE)
                echo "<font><b>Записът е добавен успешно!</b></font>";
            else  echo "<font><b>Записът не е добавен!</b></font>";
        }
    }

    ?>
    <form method="post">
        Факултетен номер: <input type="text" size="6" name="Faculty_number" />
        <p>
            Име на студента: <input type="text" name="Name" />
            <p>
                Курс:<select name="Course">
                <option  value="1">1 курс</option>
                <option value="2">2 курс</option>
                <option value="3">3 курс</option>
                <option value="4">4 курс</option>
                </select>
                <p>
                Специалност: <select name="Course_id">
                    <?php
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
                    <p> Форма на обучение
                         
        <input type="radio" name="Form" value="1" checked="checked" /> Редовно обучение
        <input type="radio" name="Form" value="2" /> Задочно обучение
        
                <p>
                    Среден успех: <input type="text" name="Avg_grades" />
                    <p>
                        <input type="submit" name="submit" value="Добавяне" />
    </form>
    <?php
        $conn->close();
    ?>
    <p>
        <a href="index.htm#menu"> Меню =>> </a>
</body>
</html>
