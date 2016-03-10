<?php
// пример кода Bacic http://fi2.php.net/manual/ru/features.http-auth.php
//непонятно зачем пишем эту строчку и будем ее воследствии "доклеивать" в форточку (еще и скодировкой проблемма в форме, поэтму пока латиница)
$realm = 'pishem bla-bla-bla';
//user (массив с логином и паролем)
$users = array('admin' => '12345', 'guest' => '1');
//empty - определяет, установлена ли переменная. (в примере2 будем использовать !isset
//$_SERVER суперглобальный массив (так и не понял как в него загрузить данные, пробовал как с обычным массивом - не вышло)
//PHP_AUTH_DEGEST предопределенная переменная? не понятно, можно ли увидеть ее содержимое? 
//зависит ли от настроек АПАЧА? может поэтом и не работает? (в примере 2 используем PHP_AUTH_USER)
//header — Отправка HTTP заголовка (стремная штука, так-как нельзя ПЕРЕДАВАТЬ перед ней что-либо, даже тег <html> перед <?php)
//die — Эквивалент функции exit
if (empty($_SERVER['PHP_AUTH_DIGEST'])) {
	header('HTTP/1.1 401 Unauthorized'); 
    header('WWW-Authenticate: Digest realm="'.$realm. //header - направляем запрос браузеру на авторизацию
        '",qop="auth",nonce="'.uniqid().'",opaque="'.md5($realm).'"'); ////uniqid генерируем id (рекомендуют более сложные)
    die('Текст, отправляемый в том случае, если пользователь нажал кнопку Cancel'); //кнопка cancel работает!!!
}
//имеем тоже что и в случае 2, cansel работает... остальное нет

// анализируем переменную PHP_AUTH_DIGEST
if (!($data = http_digest_parse($_SERVER['PHP_AUTH_DIGEST'])) ||
    !isset($users[$data['username']]))
    die('Неправильные данные!');


// генерируем корректный ответ
$A1 = md5($data['username'] . ':' . $realm . ':' . $users[$data['username']]);
$A2 = md5($_SERVER['REQUEST_METHOD'].':'.$data['uri']);
$valid_response = md5($A1.':'.$data['nonce'].':'.$data['nc'].':'.$data['cnonce'].':'.$data['qop'].':'.$A2);

if ($data['response'] != $valid_response)
    die('Неправильные данные!');

// ok, логин и пароль верны
echo 'Вы вошли как: ' . $data['username'];


// функция разбора заголовка http auth
function http_digest_parse($txt)
{
    // защита от отсутствующих данных
    $needed_parts = array('nonce'=>1, 'nc'=>1, 'cnonce'=>1, 'qop'=>1, 'username'=>1, 'uri'=>1, 'response'=>1);
    $data = array();
    $keys = implode('|', array_keys($needed_parts));

    preg_match_all('@(' . $keys . ')=(?:([\'"])([^\2]+?)\2|([^\s,]+))@', $txt, $matches, PREG_SET_ORDER);

    foreach ($matches as $m) {
        $data[$m[1]] = $m[3] ? $m[3] : $m[4];
        unset($needed_parts[$m[1]]);
    }

    return $needed_parts ? false : $data;
}
?> 