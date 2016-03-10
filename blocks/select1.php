<?php
//запрос к БД (sqlI запрос. запрос в форме sql в файле connection1.php)
$link = mysqli_connect($host, $user, $password, $dbname)
or die("Ошибка " . mysqli_error($link));
$query ="SELECT * FROM users";

$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));

if($result)

{

echo "Выполнение запроса прошло успешно";

};
mysqli_close($link); //и отключаемся от БД
?>