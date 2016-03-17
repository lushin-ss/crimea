<?php
  function db_connect ()
	   {
    $link = mysql_connect("test.tkudina.com.ua", "sa", "siski")
        or die("Could not connect : " . mysql_error());
  //  print "Подключение к серверу прошло успешно";
    mysql_select_db("crimea", $link) or die("Не могу выбрать базу данных");

    /* Выполняем SQL-запрос */
 	//меню
	
	return $link;
	
	   }
	
function get_menu ()
{
	db_connect ();
    $resultMenu = mysql_query("SELECT * FROM menu WHERE menu.parent='0'") or die("запрос неудачен : " . mysql_error());
	while ($row = mysql_fetch_array ($resultMenu))
	{
		$res_array [$count] = $row;
		$count++; //счетчик
	}
		return $res_array;
}	

function get_submenu ($parent)
{
	db_connect ();
    $resultMenu = mysql_query("SELECT * FROM menu WHERE menu.parent='$parent'") or die("запрос неудачен : " . mysql_error());
	while ($row = mysql_fetch_array ($resultMenu))
	{
		$res_array [$count] = $row;
		$count++; //счетчик
	}
		return $res_array;
}

$menu = get_menu ();
?>
<ul>
<?
foreach ($menu as $item)
{
$submenu = get_submenu($item['link']);

?>
<li><a href="index.php?view=<?=$item["link"];?>"><?=$item['title'];?></a></li>
<? 
if (!empty($submenu))
{
echo "<ul>";
foreach ($submenu as $item2)
{
?>
<li> <a href="index.php?view=<?=$item["link"];?>&t=<?=$item2['link'];?>"><?=$item2['title'];?></a> </li>
<?
}
echo "</ul>";
}
}
?>
</ul>