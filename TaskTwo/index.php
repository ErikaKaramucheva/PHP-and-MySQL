<style>
    body{
        background-color:lightcoral;
        text-align:center;
    }
</style>
<h2 >Тримесечия</h2>
<form method="post" >
    <label>Задайте стойност за първото тримесечие</label>
    <input type="number" name="first" />
    <br />
    <label>Задайте стойност за второто тримесечие</label>
    <input type="number" name="second" />
    <br />
    <label>Задайте стойност за третото тримесечие</label>
    <input type="number" name="third" />
    <br />
    <label>Задайте стойност за четвъртото тримесечие</label>
    <input type="number"  name="fourth" />
    <br />
    <input type="submit" name="submit" value="Потвърдете" />

</form>
<?php
/*function swap($a,$b){
    $temp=$a;
    $a=$b;
    $b=$temp;
}*/
if(array_key_exists('submit',$_POST)){
    $first=$_POST['first'];
    $second=$_POST['second'];
    $third=$_POST['third'];
    $fourth=$_POST['fourth'];
  //  if($first!=null && $second!=null && $third!=null && $fourth!=null){
        $avg=($first+$second+$third+$fourth)/4;
        $values=array($first,$second,$third,$fourth);
        sort($values);
        for($i =0;$i<sizeof($values);$i++){
            echo $values[$i] . PHP_EOL;
        }

        $min=$values[0];
        $min_index=1;
        $max=$values[3];
        $max_index=4;
        $second_min=$values[1];
        $second_min_index=2;
        $second_max=$values[2];
        $second_max_index=3;
        // ако минем първата проверка то това означава, че $min е най-малкото
       /* if($min<$second_min && $min<$second_max){
            //ако втората проверка мине, това би означавало, че 3 числа са подредени
            if($second_min<$second_max){
                return;
            }
            //в противен случай 3-тото е по-малко от 2-рото
            else{
                $temp=$second_min;
                $second_min=$second_max;
                $second_max=$temp;
                $temp_index=$second_min_index;
                $second_min_index=$second_max_index;
                $second_max_index=$temp_index;
            }}else if($second_min<$min && $second_min<$second_max){
            //второто число е най-малко- разменяме първото и второто
            swap($second_min,$min);
            swap($second_min_index,$min_index);
            if($second_min<$second_max){
                return;
            }

            else{
                swap($second_min,$second_max);
                swap($second_min_index,$second_max_index);
            }
        }else if($second_max<$min && $second_max<$second_min){
            swap($second_max,$min);
            swap($second_max_index,$min_index);
            if($second_min<$second_max){
                return;
            }
            else{
                swap($second_min,$second_max);
                swap($second_min_index,$second_max_index);
            }
        }*/




     // }else{
    //        $avg=0;
     //       $first=0;
      //      $second=0;
       //     $third=0;
        //    $fourth=0;
        //}

        include 'Result.php';
    }

