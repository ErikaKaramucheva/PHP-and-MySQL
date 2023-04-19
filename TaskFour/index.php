<?php
include 'index.html';
$name=$_POST['name'];
$price=$_POST['price'];
$date=$_POST['date'];
$percent=$_POST['percent'];
$current_date=date("Y");
$final_price=$price;
$test_date=$current_date-$date;
if($test_date>=5){
    $final_price=$price-($price*($percent/100));
}
?>
<h1>Основно средство</h1>
<table>
    <caption>Амортизация</caption>
    <tr>
        <td>Име на средството</td>
        <td><?php echo $name?></td>
    </tr>
    <tr>
        <td>Стойност при закупуване</td>
        <td><?php echo $price?></td>
    </tr>
    <tr>
        <td>Година на закупуване</td>
        <td><?php echo $date?></td>
    </tr>
    <tr>
        <td>% за амортизация</td>
        <td><?php echo $percent?></td>
    </tr>
    <tr>
        <td>Стойност след проверка за амортизация</td>
        <td><?php echo $final_price?></td>
    </tr>
</table>
