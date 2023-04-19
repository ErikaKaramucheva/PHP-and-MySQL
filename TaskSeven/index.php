<?php
include 'index.htm';
$name1=$_POST['name1'];
$n=$_POST['n'];
$m=$_POST['m'];
$name2=$_POST['name2'];
$email=$_POST['e-mail'];


?>
<h1>Доставка</h1>
<table>
    <caption>Начални данни</caption>
    <tr>
        <td>Име на продукта</td>
        <td><?php echo $name1?></td>
    </tr>
    <tr>
        <td>Наличен брой материали</td>
        <td>
            <?php echo $n?>
        </td>
    </tr>
    <tr>
        <td>Минимален брой материали</td>
        <td>
            <?php echo $m?>
        </td>
    </tr>
    <tr>
        <td>Име на доставчика</td>
        <td>
            <?php echo $name2?>
        </td>
    </tr>
    <tr>
        <td>E-mail на доставчика</td>
        <td>
            <?php echo $email?>
        </td>
    </tr>
</table>
<br />

<?php if($n<$m){
          $k=$m-$n;
          include 'request.php';
      }

?>
