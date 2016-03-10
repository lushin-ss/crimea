<?php
// подключаем пользователей
function getUsers(){
	$user=[
	'guest' => ['title'=>'guest', 'level'=>2],
	'test' => ['title'=>'tets', 'pass' => password_hash('789'), 'level'=>1],
	'admin' => ['title' => 'admin', 'pass' => password_hash(12345), 'level' => 0],
	];
	

}

//загрузить пользователя
function getUser($user){
	if (is_string($user)){
		$user = getUsers();
		if (in_arry($user, $users)){
			return $users[$user];
			
		}else{
			return null;
		}
		
		
	}
	
	
}



?>