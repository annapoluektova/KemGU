<?php
function selectItems($items, $selected=0) {
  $text = "";
  foreach ($items as $k=>$v) {
    if ($k === $selected) $ch = " selected"; else $ch = "";
    $text .= "<option$ch value='$k'>$v</option>\n";
  }
  return $text;
}
$names = array(
  "(1)" => "Задание с выбором одного правильного ответа",
  "(2)" => "Задание с выбором нескольких правильных ответов",
  "(3)" => "Задание с выбором наиболее правильного ответа",
  "(4)" => "Задание открытой формы",
  "(5)" => "Задание на установление соответствия",
  "(6)" => "Задание на установление правильной последовательности",
);
if (isset($_REQUEST['surname'])) {
  $name = $names[$_REQUEST['$_REQUEST']];
  echo "Вы выбрали: {$_REQUEST['surname']}, {$name} ";
}
?>
<form action="?=$_SERVER['SCRIPT_NAME']?>" method=post>
  Выберите код формы ТЗ:
  <select name=surname>
    <?=selectItems($names, $_REQUEST['surname'])?>
  </select><br>
  <input type=submit value="нажмите">
</form>