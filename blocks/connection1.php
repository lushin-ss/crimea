<?php
// соединение с БД как в примере ролика Ютюба
echo 'help mee 2';
$host="tkudina.com.ua";
$user="sa";
$password="siski1";
$dbname="crimea";
echo 'help mee 3';
$link = mysqli_connect($host, $user, $password, $dbname)
or die("Ошибка " . mysqli_error($link));

$ users = mysqli_query("SELECT * FROM username");
$userSql= mysqli_fetch_array ($userSql);
echo $userSql['username']
?>

