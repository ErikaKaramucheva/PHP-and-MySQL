<?php
include 'index.html';
$initial=$_POST['initial'];
$final=$_POST['final'];
$percent=$_POST['percent'];
$months=0;
$i=$initial;
while($final>=$i){
    $i=$i+($initial*($percent/100));

    $months+=1;
    
}
$years=0;
$month=$months;
while($month>12){
    $years+=1;
    $month-=12;
}

?>

<h2>Начална сума: <?php echo $initial?> </h2>
<h2>Крайна сума: <?php echo $final?></h2>
<h2> Сумата ще бъде превишена след <?php echo $months?> месеца или <?php echo $years," години и ",$month?> месеца.</h2>
