<?php
/*
// загрузить всех пользователей (новый код Александра с хешем), почему то не работает.
function getUsers(){
	$users=[
		'guest' => ['title'=>'guest', 'level' => 2 ],
		'test' => ['title'=>'test', 'pass'=>'789', 'level'=> 1 ],
		'admin' => ['title'=>'admin', 'pass'=>md5('12345'), 'level'=> 0 ],
	];
	return $users;
}

function getCurrUser(){
	$users = getUsers();
	return (isset($_COOKIES['user']) && $_COOKIES['user']) ? getUser($_COOKIES['user']):getUser('guest');
}

// загрузить пользователя
function getUser($user){
	// пока случай загрузки по имени
	if(is_string($user)){
		$users = getUsers();
		if(in_array($user, $users)){
			return $users[$user];
		}else{
			return $users['guest'];
		}
	}
}
*/
// кусок "старого" кода  Александра, который давался на занятии и точно работает 
//сечас переписываю переменную $users, иначе работать не будет!
//те.е. пользователь авторизацию пройти не сможет

$users=array('title'=>'test', 'pass'=>'789', 'type'=>'user','title'=>'admin', 'pass'=>'12345', 'type'=>'admin');


// результат авторизации, по умолчанию будет false, чтобы типы не приводить
							$result=false;
							// перебираем всех пользователей в базе
							foreach($users AS $i=>$user){
								// проверяем это ли искомый пользователь
								if(strcmp($user['title'],$_REQUEST['user'])==0){
									// если искомый пользователь найден, то проверяем совпадает ли пароль
									if(strcmp($user['pass'],$_REQUEST['pass'])==0){
										// если искомый пользователь найден и пароль правильный, то возвращаем результат, что пользователь авторизован
										$result = 'пользоватьель&ensp;'.$user['title'].' авторизован';
									}else{
										// если искомый пользователь найден и пароль правильный, то возвращаем результат, что пароль неправильный
										$result =  'пароль не верный';
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
	//тут по иде должно отображаться имя ненайденого пользователя но оно не отображается
								echo 'пользователь '.$_REQUEST['title'].'  не найден<br/>'; 
							}
?>

</h1>
							<p>введите логин и пароль</p>
							<!-- Это HTML комментарий, будет выведен на странице -->
							<!-- Форма авторизации, передаем данные через POST -->
							<form action="authorization.php" method="post">
								<!-- имя пользователя -->
								<input name="user" type="text" value="" />
								<!-- пароль -->
								<input name="pass" type="password" value="" />
								<!-- кнопка "отправить" -->
								<input name="submit" type="submit" value="submit" />
				</form>