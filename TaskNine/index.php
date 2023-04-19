<?php
include 'index.htm';

$name=$_POST['name'];
$position=$_POST['catRadio'];
$allowance=$_POST['sRadio'];


?>

<h1>Заплати</h1>
<p>Въведеното име е <?php echo $name; ?>.
    <br />
    Категорията е: <?php
                   $salary=0;
                   switch($position){
                       case 'manager':echo "ръководител по щат: 1000 лева"; $salary=1000;break;
                       case 'associate':echo "сътрудник по щат: 600 лева"; $salary=600;break;
                       case 'specialist':echo "специалист по щат: 800 лева"; $salary=800;break;
                       case 'other':echo "други по щат: 500 лева"; $salary=500;break;
                   }

?> .
    <br />
    Надбавката за години е <?php
                           $al=0;
                   switch($allowance){
                       case 'first':echo "надбавката за 0-5 години е 4%."; $al=4;break;
                       case 'second':echo "надбавката за 6-12 години е 7%."; $al=7;break;
                       case 'third':echo "надбавката за 13-22 години е 11%."; $al=11;break;
                       case 'fourth':echo "надбавката за над 22 години е 16%."; $al=16;break;
                   }?> .
    <br />
    Сумата от категория и стаж е  <?php $sum=$salary+($salary*($al/100));
                                        echo $sum;
                                  ?> 
    лева.
    <br />
    Удръжките от 10% плосък данък и 5% здравно осигуряване са <?php $ded=$sum*0.15;
                                        echo $ded;
?>.
    <br />
    Крайната заплата за получаване е <?php $total_salary=$sum-$ded;
                                        echo $total_salary;
?> лева.
    
    </p>