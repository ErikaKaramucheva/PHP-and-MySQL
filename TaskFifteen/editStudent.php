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
    <h3> Промяна данните за студент </h3>
    <?php
    include "config.php";
    if(isset($_GET['edit']) && $_GET['edit'])
    {
        $sql="SELECT * FROM Student WHERE Faculty_number=" . (int)$_GET['edit'];
        $result=$conn->query($sql);
        $row=$result->fetch_assoc();
    ?>
    <form method="post" action="editStudent.php">
        <table cellpadding="8">
            <tr>
                <td> Факултетен номер: </td>
                <td>
                    <input type="text" size="6" name="Faculty_number"
                        value="<?php echo $row['Faculty_number']; ?>" />
                </td>
            </tr>
            <tr>
                <td>Име:</td>
                <td>
                    <input type="text" name="Name"
                        value="<?php echo $row['Name']; ?>" />
                </td>

            </tr>
            <tr>
                <td>Курс:</td>
                <td>
                    <select name="Course">
                <option value="1">1 курс</option>
                <option value="2">2 курс</option>
                <option value="3">3 курс</option>
                <option  value="4">4 курс</option>
                </select>
                </td>
            </tr>
             <tr>
                <td>Специалност:</td>
                <td>
                   <select name="Course_id">
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
            echo "<option value=\"$course_code\">" ,$name['Name'],"</option>";
        }
                    ?>
                </select>
                </td>
            </tr>
        <tr>
          <td>Форма на обучение:</td>
                <td>
                    <?php
        $form=$row['Form'];
         if($form=="1"){
        echo"<input type=\"radio\" name=\"Form\" value=\"1\" checked=\"checked\" /> Редовно обучение <br/>";
        echo"<input type= \"radio\" name=\"Form\" value=\"2\" /> Задочно обучение";
         }
         else{
             echo"<input type=\"radio\" name=\"Form\" value=\"1\"  /> Редовно обучение <br/>";
             echo"<input type= \"radio\" name=\"Form\" value=\"2\" checked=\"checked\"/> Задочно обучение";
         }
        ?>
               </td>
            </tr>
        <tr>
                <td>Среден успех:</td>
                <td>
                    <input type="text" name="Avg_grades"
                        value="<?php echo $row['Avg_grades']; ?>" />
                </td>

            </tr>

        </table><p>
            <input type="submit" name="submit" value="Промени" />
    </form>
    <?php
    } else {
        if(isset($_POST['submit']))
        {
            $sql="UPDATE Student SET Name=' " . $_POST['Name'] . " ',Course=".(int)$_POST['Course'].",Course_id=".(int)$_POST['Course_id'].
                ",Form=".(int)$_POST['Form'].",Avg_grades=".(float)$_POST['Avg_grades'].
                " WHERE Faculty_number=" . (int) $_POST['Faculty_number'];
            $result=$conn->query($sql);
        }
        $result=$conn->query("SELECT * FROM Student ORDER BY Name ASC");

        if ($result->num_rows <= 0)
            echo "0 резултата";
        else
        {
            $zag=array("Факултетен номер","Име","Курс","Специалност","Форма","Среден успех");
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
                <?php $sql2="SELECT Name FROM Courses WHERE Code= ".$row["Course_id"];
                      $result2= $conn->query($sql2);
                      if ($result2->num_rows > 0){
                          while($row2 = $result2->fetch_assoc())
                              echo $row2["Name"];
                      }else{
                          echo "null";
                      }; ?>
            </td>
            <td>
                <?php if($row["Form"]=="1"){
                echo "редовно обучение";}
                      else{
                          echo "задочно обучение";
                      }
                ; ?>
            </td>
            <td>
                <?php echo $row["Avg_grades"]; ?>
            </td>

            <td align=center>
                <a href="editStudent.php?edit=<?php echo $row['Faculty_number']; ?>">Промени </a>
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
