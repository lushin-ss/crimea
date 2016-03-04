<?php //подключение функции загрузки информации о странице, почему-то не работает
				include 'blocks/loadPage.php';
		
			$menu=[ // создаем массив меню (это пока понятно)
                ['title'=>'Главная', 'link'=>'/', 'level'=>2],
                ['title'=>'Номера', 'link'=>'#intro', 'level'=>2, 
                    'children'=>[
                        ['title'=>'3-х местные', 'link'=>'#three', level=>2],
                        ['title'=>'4-х местные', 'link'=>'for', 'level'=>2],
                        ['title'=>'2-х комнатные', 'link'=>'two', 'level'=>2]
                    ]
                ],
                ['title'=>'Цены', 'link'=>'price'],
				['title'=>'Бронирование', 'link'=>'forms'],
				['title'=>'Отдых с детьми', 'link'=>'price-1'],
				['title'=>'Питание', 'link'=>'food'],
				['title'=>'Контакты', 'link'=>'/?page=contacts'],
				['title'=>'Отзывы', 'link'=>'index_test.php'],
				['title'=>'тест1', 'link'=>'test1.php'],
			];
		
			// создаем массив классов // массив классов для разных уровней иерархии (насколько правильно так делать? ведь если брать его из БД, то количество уровней неизвестно? и его луше задать переменной?)
			$classes = [ 0=> 'menu', 'submenu' , 'third-level'];
			
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
          
			
	?>
