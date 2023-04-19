<html>
 <head> 
    <title> Сортиране </title>
     <style> body {
            background-color:honeydew;
            text-align: center;
        }
  table{
     margin-right:auto;
     margin-left:auto;
 }
    </style>
 </head>
<body>
<h2>Сортиране по цена </h2>
    <form method="post">
    <p>Моля въведете името на желания материал:
    <input type="text" name="material" />

    </p>
        <input type="submit" name="submit" />
        </form>
<table >
<tr>
<th >  Код </th>
<th >Име  </th>
<th > Материал</th>
<th > Количество </th>
<th > Единична цена </th>
</tr>

    <?php
    include 'config.php';
 $sql="SELECT * FROM Supplier ORDER BY Unit_price";
  if(array_key_exists('submit',$_POST)){
      $material=$_POST['material'];
     $sql="SELECT * FROM Supplier WHERE Material_name LIKE '%$material%' ORDER BY Unit_price,Quantity";
 }
    $result=$conn->query($sql);
        if ($result->num_rows <= 0)
            echo "0 резултата";
        else
        {

            while($row = $result->fetch_assoc())
            {
echo"<tr>";
echo"<td >".$row["Code"] .
"<td>" .$row["Name"] .
"<td>". $row["Material_name"] .
"<td>". $row["Quantity"] .
"<td>". $row["Unit_price"];
echo"</tr>";
            }
        }
        $conn->close();
    ?>
</table> <p>
<a href="index.htm#menu"> Меню =>> </a>
</body> </html>
