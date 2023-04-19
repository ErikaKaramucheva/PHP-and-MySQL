

<?php
include 'Index.htm';
$productName=$_POST['productName'];
$quantity=$_POST['quantity'];
$totalPrice=$_POST['totalPrice'];
$DDS=$_POST['DDS'];

$x=$totalPrice/($quantity*(1+($DDS/100)));
$x=round($x,2);
?>

<table style="border-color:black; border-block:solid; border-block-width:thick">
    <caption ><b> Изчисляване на единична цена без ДДС</b> </caption>
    <tr>
        <th>Име на стоката</th>
        <th><?php echo $productName; ?></th>
    </tr>
    <tr>
        <th>Количество</th>
        <th>
            <?php echo $quantity; ?>
        </th>
    </tr>
    <tr>
        <th>Обща сума с ДДС</th>
        <th>
            <?php echo $totalPrice; ?>
        </th>
    </tr>
    <tr>
        <th>ДДС в %</th>
        <th>
            <?php echo $DDS; ?>
        </th>
    </tr>
    <tr>
        <th>Единична цена без ДДС</th>
        <th>
            <?php echo $x; ?>
        </th>
    </tr>
</table>

