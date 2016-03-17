<?php
include_once 'blocks/cookie.php'; //подключаем cookie
?>
<?php
// подключаемся к БД
include_once 'blocks/select.php';
?>

<?php
include_once 'blocks/head.php'; //подключаем голову со стилями и title
?>
	<body>
	<!-- давайте посмотрим на ГИт -->
		<!-- Content -->
			<div id="content">
				<div class="inner">

		<?php
				include 'blocks/getUsers.php';
				
		?>		
				
		<?php 
		//	include 'page/post1.php'; // подключаем первую новость
		?>			
		<?php 
			include 'page/post2.php'; 
			// подключаем 2-ю новость,.
			// печатаем новость из таблицы public БД
	

		?>	
		<?php 
			include 'blocks/pagination.php'; //Pagination это кнопки, переключения между постами (страница 1,2,) и т.д. пусть побудут пока
		?>

				</div>
			</div>

		<!-- Sidebar боковая панель-->
			<div id="sidebar">
			<!-- Logo -->
					<h1 id="logo"><a href="blocks/authorization.php">Вход</a></h1>
				<?php
				include 'blocks/search.php';
				?>							
				<?php
				include 'blocks/menu.php';
				echo printMenu($menu, 0);
				?>
            
		<!-- Text -->
					<section class="box text-style1">
						<div class="inner">
							<p>
								<strong> это счетчик посещений <br> 
								<?php //выводим счетчик посещений из cookie (подключен 1-м)
								echo "<p>Вы посещали эту страницу <b>".@$_COOKIE['Mortal']."</b> раз</p>";
								?>
								</strong> 
							</p>
						</div>
					</section>

			<!-- ссылки -->
				<?php
				include 'blocks/link.php';	
				?>
				<?php
				include 'blocks/calendar.php';
				?>

				

				<!-- Copyright -->
					<ul id="copyright">
						<li>&copy; Можно</li><li>связаться <a href="mailo:ss.lushin@outlook.com">почта</a></li>
					</ul>

			</div>

		
		<!-- Scripts -->
               
			<?php include 'blocks/scripts.php';
			?>
			
	</body>
