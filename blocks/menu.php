﻿<?php //подключение функции загрузки информации о странице, почему-то не работает
				include 'blocks/loadPage.php';
		
		
//первая функция соединения с БД
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
//2-я 
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
//3-я
/*
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
*/
$menu = get_menu ();
 		
//echo printMenu($menu, 0);		
			// создаем массив классов // массив классов для разных уровней иерархии (насколько правильно так делать? ведь если брать его из БД, то количество уровней неизвестно? и его луше задать переменной?)
//			$classes = [ 0=> 'menu', 'submenu' , 'third-level'];
			
			// в лоб печатаем меню
			
       //   echo "<ul id=\"nav\">\n"; //в этой строке потянули по id стили меню и вывели его
		//		foreach($menu AS $i=>$item){
		//			echo "\t<li class='item-$i'>\n\t\t<a href='{$item['link']}'>{$item['title']}</a>\n";
				
      //          if(count($item['children'])){
      //              echo "\t\t<ul class=\"submenu\">\n";
							
      //              foreach($item['children'] AS $k=>$subitem){
      //                echo "\t\t\t<li class='item-$k'>\n"
      //                   . "\t\t\t\t<a href='{$subitem['link']}'>{$subitem['title']}</a>\n"
       //                     . "\t\t\t</li>\n";
		//			}
       //            echo "\t\t</ul>\n";
		//		}
       //         echo "\t</li>\n";
      //  }
      //     echo '</ul>';
         // это сделали выше $classes=['nav', 'submen', 'sub-submen'];
        
// объявляем функцию
		function printMenu ($menu, $level) {
// объявляем доступ к глобальной переменной (переменная "classes", которая массиив стала глобальной?)
               global $classes;
     // начинаем формирование меню с учетом класса соответствующего текущему уровню иерархии
	 // $html= "<ul class=\"{$classes[$level]}\">\n";
	 $html= "<ul id=\"nav\">\n"; // выводим с учетом id для подтягивания стиля
			
// в цикле выводим все элементы текущего уровня			
		 foreach($menu AS $i=>$item){
			 // выводим конкретный текущий элемент
                  $html.="\t<li class='item-$i'>\n\t\t<a href='{$item['link']}'>{$item['title']}</a>\n";
				  // проверяем есть ли дочерние элементы
                   if(count($item['children'])){
					   // выводим дочерние элементы, если они есть
                       $html.=printMenu($item['children'], $level+1);
                    }
                    // конец формирования вывода
				$html.="</li>\n";
			}
			// завершаем формирование
			$html.= '</ul>';
			// возвращаем результат
			return $html;
            }
       echo printMenu($menu, 0);   
			
	?>
