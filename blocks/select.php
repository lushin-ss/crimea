<?php
    /* Соединяемся, выбираем базу данных */
    $link = mysql_connect("test.tkudina.com.ua", "sa", "siski")
        or die("Could not connect : " . mysql_error());
    print "Подключение к серверу прошло успешно";
    mysql_select_db("crimea") or die("Не могу выбрать базу данных");

    /* Выполняем SQL-запрос */
	//выбираем пользователей
    $queryUsers = "SELECT * FROM users";
    $resultUsers = mysql_query($queryUsers) or die("запрос неудачен : " . mysql_error());
	//выбираем новости
	$queryPublic = "SELECT * FROM public";
    $resultPublic = mysql_query($queryPublic) or die("запрос неудачен : " . mysql_error());
   
   /* Выводим результаты в html */
    print "<table>\n";
    while ($line = mysql_fetch_array($resultUsers, MYSQL_ASSOC)) {
        print "\t<tr>\n";
        foreach ($line as $col_value) {
            print "\t\t<td>$col_value</td>\n";
        }
       print "1"."\t</tr>\n";
    }
    print "2"."</table>\n";

	
	
    /* Освобождаем память от результата */
    mysql_free_result($result);

    /* Закрываем соединение */
    mysql_close($link);
?>
