<?php
include 'index.htm';
    $name=$_POST['name'];
    $form = filter_input(INPUT_POST, 'form', FILTER_SANITIZE_STRING);
    $courses=filter_input(INPUT_POST, 'courses', FILTER_SANITIZE_STRING, FILTER_REQUIRE_ARRAY);
    $sum=0;
    if(in_array('php',$courses)){
        $sum+=200;
    }
    if(in_array('html',$courses)){
        $sum+=100;
    }
   if(in_array('js',$courses)){
        $sum+=150;
    }
    if(in_array('java',$courses)){
        $sum+=250;
    }
     if(in_array('c#',$courses)){
        $sum+=250;
    }
     if(in_array('css',$courses)){
        $sum+=200;
    }


?>
<h1>Избор на курсове</h1>
<h3>Въведеното име е: <?php echo $name?></h3>
<h3>Форма на обучение: <?php switch($form){
                                 case 'dis': echo "Дистанционно обучение";break;
                                 case 'zad':echo "Задочно обучение";break;
                                 case 'red':echo "Редовно обучени";break;
                             };
                           ?></h3>
<h3>Избрани курсове: 
    <?php foreach ($courses as $course) {
              echo $course," .";
          };
          
          ?>
    </h3>
<h3>Сумата за плащане  е: <?php echo $sum?> лева. </h3>



