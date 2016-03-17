<?php // функция загрузки информации о странице
function loadPage($page){
	// массив страниц, на данном этапе имеем стативный код
	// в будущем будем извлекать из специальных шаблонов и наполнять данными из БД
	include 'blocks/bd_menu.php';
	
	$pages=[
		'404'=>['title'=>'404. Страница не найдена', 'pagetitle'=>'404. Страница не найдена', 'content'=> "Страница не найдена. Возможно адрес не верный, можете начать <a href=\"/\">главной</a> страницы."],
		'contacts'=>['title'=>'Контакты', 'content'=> "$x"],
		'news'=>['title'=>'New', 'content'=>'<section>
				<a href="#" class="image"><img src="images/pic02.jpg" alt="" data-position="top center" /></a>
				<div class="content">
					<div class="inner">
						<h2>Feugiat consequat</h2>
						<ul class="actions">
							<li><a href="#" class="button">Learn more</a></li>
						</ul>
					</div>
				</div>
			</section>']
	];
	// выводим заголовок в зависимости от страницы, если ничего не задано, то выводим "Главная"
	// используем сокращенную форму условного оператора и функцию проверки
	// наличия элемента в массиве in_array($value, $array), возвращает true или false
	// и функцию получения массива ключей массива array_keys($array), возвращает array
	// echo in_array($_GET['page'], array_keys($pages)) ? $pages[$_GET['page']]['title'] : 'Главная';
	// развернутый вариант условия
	if(in_array($_GET['page'], array_keys($pages))){
		return $pages[$_GET['page']];
	}else{
		return $pages['404'];
	}
}
?>