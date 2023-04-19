<style>
    body{
        background-color:lightskyblue;
        text-align:center;
    }
</style>

<h1>Изчисляване на времето за пристигане:</h1>
<form method="post">
    <h3>Въведете път за изминаване в км: 
    <input type="number" name="km" />
    </h3>
    <h3>Въведете час на тръгване:
        <input type="number" name="startHour" />
    
        и минути:
        <input type="number" name="startMinutes" />
    </h3>
    <h3>
        Въведете час на пристигане:
        <input type="number" name="endHour" />

        и минути:
        <input type="number" name="endMinutes" />
    </h3>
    <input type="submit" name="submit" />
</form>


<?php
if(array_key_exists('submit',$_POST)){
    $km=$_POST['km'];
    $start_hour=$_POST['startHour'];
    $start_minutes=$_POST['startMinutes'];

    $end_hour=$_POST['endHour'];
    $end_minutes=$_POST['endMinutes'];

    if($start_hour<0 ||  $end_hour>24 ||$end_hour<0 ||$start_minute>24 ){
        echo 'Задайте час между 0-24';
        exit();
    }
    if($start_minutes<0 || $start_minutes>59 || $end_hour<0 ||$end_hour>24){
        echo 'Минутите трябва да бъдате между 0 и 59';
        exit();
    }
    if($km<=0 ){
        echo "Невалидни километри. Моля въведете положително число, което да е по- голямо от 0.";
        exit();
    }
    //v=s/t;
    $hour=$end_hour-$start_hour-1;
    if($end_mintutes>$start_minutes){
        $minutes=$minutes+($end_mintutes-$start_minutes);
    }else{
        $minutes=$minutes+((60-$start_minutes)+$end_minutes);
    }
    if($minutes>=60){
        $hour++;
        $minutes-=60;
    }
    $minutes=$minutes/60;
    $hour=$hour+$minutes;
    $avgSpeed=0;
    $avgSpeed=$km/$hour;
    $avgSpeed=round($avgSpeed,2);
    echo "Средна скорост: ",$avgSpeed;



}

