<?
// ini_set('display_errors',1);
// error_reporting(E_ALL); 


	   /* Соединяемся, выбираем базу данных */
	   function db_connect ()
	   {
    $link = mysql_connect("test.tkudina.com.ua", "sa", "siski")
        or die("Could not connect : " . mysql_error());
    print "Подключение к серверу прошло успешно";
    mysql_select_db("crimea", $link) or die("Не могу выбрать базу данных");

    /* Выполняем SQL-запрос */
 	//меню
	
	return $link;
	
	   }
	
function get_menu ()
{
	db_connect ();
    $resultMenu = mysql_query("SELECT * FROM menu") or die("запрос неудачен : " . mysql_error());
	while ($row = mysql_fetch_array ($resultMenu))
	{
		$res_array [$count] = $row;
		$cout++; //счетчик
	}
		return $res_array;
}
?>		