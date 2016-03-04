<html>
	<?php
		// массив страниц, на данном этапе имеем стативный код
		// в будущем будем извлекать из специальных шаблонов и наполнять данными из БД
		$pages=[
			'contacts'=>['title'=>'Contacts', 'content'=>'
				<section>
					<form method="post" action="#">
						<div class="field half first">
							<label for="name">Name</label>
							<input type="text" name="name" id="name" />
						</div>
						<div class="field half">
							<label for="email">Email</label>
							<input type="text" name="email" id="email" />
						</div>
						<div class="field">
							<label for="message">Message</label>
							<textarea name="message" id="message" rows="5"></textarea>
						</div>
						<ul class="actions">
							<li><a href="" class="button submit">Send Message</a></li>
						</ul>
					</form>
				</section>'],
			'news'=>['title'=>'New', 'content'=>'<section>
					<a href="#" class="image"><img src="images/pic02.jpg" alt="" data-position="top center" /></a>
					<div class="content">
						<div class="inner">
							<h2>Feugiat consequat</h2>
							<p>Phasellus convallis elit id ullamcorper pulvinar. Duis aliquam turpis mauris, eu ultricies erat malesuada quis. Aliquam dapibus.</p>
							<ul class="actions">
								<li><a href="#" class="button">Learn more</a></li>
							</ul>
						</div>
					</div>
				</section>']
		];
                
                
		?>
		<!-- Sidebar -->
			<section id="sidebar">
				<div class="inner">
					<nav>
						<!-- обращаемся к Файлу меню и выводим его -->
						<?php 
						include 'menu.php';
						 echo printMenu($menu, 0);?>
					</nav>
				</div>
			</section>

		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Intro -->
					<section id="intro" class="wrapper style1 fullscreen fade-up">
						<div class="inner">
							<?php
							// условная база пользователей
							$users=[
								['title'=>'test', 'pass'=>'789', 'type'=>'user'],
								['title'=>'admin', 'pass'=>'12345', 'type'=>'admin'],
							];
							// результат авторизации, по умолчанию будет false, чтобы типы не приводить
							$result=false;
							// перебираем всех пользователей в базе
							foreach($users AS $i=>$user){
								// проверяем это ли искомый пользователь
								if(strcmp($user['title'],$_REQUEST['user'])==0){
									// если искомый пользователь найден, то проверяем совпадает ли пароль
									if(strcmp($user['pass'],$_REQUEST['pass'])==0){
										// если искомый пользователь найден и пароль правильный, то возвращаем результат, что пользователь авторизован
										$result = $user['title'].' authorized';
									}else{
										// если искомый пользователь найден и пароль правильный, то возвращаем результат, что пароль неправильный
										$result =  'password is incorrect';
									}
									// т.к. пользователь найден, то прерываем цикл перебора
									break;
								}
							}
							// по-умолчанию false, в цикле мы либо меняем $result и прерываем цикл, либо выходим из него, а значит любое значение даст true
							if($result){
								// если пользователь найден
								echo $result;
							// проверяем установлена ли переменная
							}elseif(isset($_REQUEST['user'])){
								// если пользователь не найден
								echo 'user '.$_REQUEST['title'].' not registered<br/>';
							}
							?>
							<h1>
							<?php
								// выводим заголовок в зависимости от страницы, если ничего не задано, то выводим "Главная"
								// используем сокращенную форму условного оператора и функцию проверки
								// наличия элемента в массиве in_array($value, $array), возвращает true или false
								// и функцию получения массива ключей массива array_keys($array), возвращает array
								echo in_array($_GET['page'], array_keys($pages)) ? $pages[$_GET['page']]['title'] : 'Главная';
								// развернутый вариант условия
								/*
								if(in_array($_GET['page'], array_keys($pages))){
									echo $pages[$_GET['page']]['title'];
								}else{
									echo 'Главная';
								}
								echo $pages[$_GET['page']]['content'];
								*/
							?>
							</h1>
							<br>
							<br>
							<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
							<br><br>
							
							<p>Just another fine responsive site template designed by <a href="http://html5up.net">HTML5 UP</a><br />
							and released for free under the <a href="http://html5up.net/license">Creative Commons</a>.</p>
							<!-- Это HTML комментарий, будет выведен на странице -->
							<!-- Форма авторизации, передаем данные через POST -->
							<form action="index.php" method="post">
								<!-- имя пользователя -->
								<input name="user" type="text" value="" />
								<!-- пароль -->
								<input name="pass" type="password" value="" />
								<!-- кнопка "отправить" -->
								<input name="submit" type="submit" value="submit" />
							</form>
							<?php echo in_array($_GET['page'], array_keys($pages)) ? $pages[$_GET['page']]['content'] : 'Главная';?>
	

		
			

</html>