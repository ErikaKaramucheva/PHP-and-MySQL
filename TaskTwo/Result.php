

<?php
include 'index.htm';
if(array_key_exists('submit',$_POST)){
    $first=$_POST['first'];
    $second=$_POST['second'];
    $third=$_POST['third'];
    $fourth=$_POST['fourth'];
        $avg=($first+$second+$third+$fourth)/4;
        //$values=array(1=>$first,2=>$second,3=>$third,4=>$fourth);

        $values[1]=$first;
        $values[2]=$second;
        $values[3]=$third;
        $values[4]=$fourth;
        sort($values);
        $min=$values[0];
        $min_index=1;
        $max=$values[3];
        $max_index=4;
        $second_min=$values[1];
        $second_min_index=2;
        $second_max=$values[2];
        $second_max_index=3;
        switch($values[0]){
            case $first: $min_index=1; break;
            case $second: $min_index=2; break;
            case $third: $min_index=3; break;
            case $fourth: $min_index=4; break;
        }
        switch($values[1]){
            case $first: $second_min_index=1; break;
            case $second: $second_min_index=2; break;
            case $third: $second_min_index=3; break;
            case $fourth: $second_min_index=4; break;
        }
        switch($values[2]){
            case $first: $second_max_index=1; break;
            case $second: $second_max_index=2; break;
            case $third: $second_max_index=3; break;
            case $fourth: $second_max_index=4; break;
        }
        switch($values[3]){
            case $first: $max_index=1; break;
            case $second: $max_index=2; break;
            case $third: $max_index=3; break;
            case $fourth: $max_index=4; break;
        }





    }
?>
<h2 style="text-align:center">Тримесечия</h2>
<p>
    Стойности по тримесечия: <?php echo $first ,", ", $second,", " ,$third,", ",$fourth; ?>
</p>
<p>
   Минималната стойност е:  
   <?php echo 
         $min," с индекс= ", $min_index;
   //array_search($first, array_keys($values));
   ?>
</p>
<p>
    Максималната стойност е:  <?php echo $max," с индекс= ", $max_index; ?>
</p>
<p>
    Средната стойност е:  <?php echo $avg;?>
</p>
<p>
    След сортиране:  <?php echo $min ,", ", $second_min,", " ,$second_max,", ",$max; ?>
    
</p>
<p>
    Сортиране по тримесечия: <?php  echo $min_index,", ",$second_min_index,", ",$second_max_index,", ",$max_index;
                             //array_keys($values);
                             ?>
</p>
