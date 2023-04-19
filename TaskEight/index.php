<?php
include 'index.htm';
$name=$_GET['custName'];
$product=$_GET['product'];


?>

<h1>Продажба на софтуерни проддукти</h1>
<h3>Въведеното име е: <?php echo $name?></h3>
<br />
<?php
$price=0;

foreach ($product as $p){
        if($p=='sklad'){
            echo 'Закупен е Склад за 100 лева.';
            echo"<br/>";
            $price+=100;
        }
         if($p=='schetovodstvo'){
            echo 'Закупено е Счетоводство за 200 лева.';
            echo"<br/>";
            $price+=200;
        }
         if($p=='plasment'){
             echo 'Закупен е Пласмент за 250 лева.';
             echo"<br/>";
             $price+=250;
         }
    }
if(sizeof($product)>1){
    $price=$price-($price*0.1);
}

?>
<p3>Сумата за плащане е <?php echo $price?> лева.</p3>
