
<html>
<titel>
контактная информация
<br> 
</titel>
<body>


<?php



$i = 1; 

echo "<table border=\"1\" align=\"center\">";
echo "<tr><th>телефон для связи</th>";
echo "<th>номер</th></tr>";
while ($i <=9) {
echo "<tr><td>";
echo "связаться со мной можно по телефону";
echo "</td><td>"; 
echo $i;
echo "</td></tr>"; 
$i++;

}
echo "</table>";

?>

</html>