<style>
    body{
        background-color:aliceblue;
        text-align:center;
    }
    table{
        margin-left:auto;
        margin-right:auto;
    }
</style>
<h1><a href="message.php">Пощенска банка</a></h1>

<h3 >Лихвени нива</h3>


<table style="border-style:solid">
    <tr>
        <td > Валута</td>
        <td> Лева </td>

    </tr>
     <tr>
         <td>Нива</td>
         <td> Периоди </td>

    </tr>
     <tr>
         <td></td>
         <td>Три месеца</td>
        <td> Шест месеца </td>

    </tr>
    <tr>
        <td>
           100-1000
        </td>
        <td>
            1,53%
        </td>
        <td>
            2,54%
        </td>
        </tr>
    <tr>
        <td>
           1000,01-3000
        </td>
        <td>
            2,22%
        </td>
        <td>3,33%</td>
    </tr>
    <tr>
        <td>Над 3000</td>
        <td>3,15%</td>
        <td>4,35%</td>
    </tr>
</table>
<form method="post">
<p>Задайте начална сума>=100:
    <input  type="number" name="startValue"/>
    <br />
    Задайте период в брой месеци (3 или 6):
    <input type="number" name="monthValue" />
    </p>
    <input type="submit" name="submit" value="Потвърдете" />
</form>
<?php
if(array_key_exists('submit',$_POST)){
    $sum=$_POST['startValue'];
    $months=$_POST['monthValue'];
    if($sum<100){
        echo 'Сумата трябва да е над 100 лева.';
        exit();
    }
    
    if($months!=3 && $months!=6){
       echo 'Месеците трябва да бъдат 3 или 6';
       exit();
    }
    $days;
    $percent;
    if($months==3){
        $days=90/360;
        if($sum>=100 && $sum<=1000){
            $percent=1.53;
        }else if($sum>=1000.01 && $sum<=3000){
            $percent=2.22;
        }else{
            $percent=3.15;
        }
    }else{
        $days=180/360;
        if($sum>=100 && $sum<=1000){
            $percent=2.54;
        }else if($sum>=1000.01 && $sum<=3000){
            $percent=3.33;
        }else{
            $percent=4.35;
        }
    }
    $w=$days*$sum*($percent/100);

    include 'ResultScript.php';

}
