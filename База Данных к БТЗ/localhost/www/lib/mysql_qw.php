<?php ## Простейшая функция для работы с placeholders.

function mysql_qw() {	// Получаем все аргументы функции.
	$args = func_get_args();
	// Если первый параметр имеет тип "ресурс", то это ID-соединения.
	$conn = null;
	if (is_resource($args[0])) $conn = array_shift($args);
	// Формируем запрос по шаблону.
	$query = call_user_func_array("mysql_make_qw", $args);
	// Вызываем SQL-фунуцию.
	return $conn!==null? mysql_query($query, $conn) : mysql_query($query);
}

function mysql_make_qw() {
	$args = func_get_args();
	// Получаем в $tmpl ССЫЛКУ на шаблон запроса.
	$tmpl = & $args[0];
	$tmpl = str_replace("%", "%%", $tmpl);
	$tmpl = str_replace("?", "%s", $tmpl);
	// После этого $args[0] также окажется измененным.
	// Теперь экранируем все аргументы, кроме первого.
	foreach ($args as $i=>$v) {	  if (!$i) continue;         // это шаблон.
	  if (is_int($v)) continue;  // целые числа не нужно экранировать.
	  $args[$i] = "'".mysql_escape_string($v)."'";
    }
    for ($i=$c=count($args)-1; $i<$c+20; $i++)
      $args[$i+1] = "UNKNOWN_PLACEHOLDER_$i";
    // Формируем SQL-запрос.
    return call_user_func_array("sprintf", $args);
}
?>