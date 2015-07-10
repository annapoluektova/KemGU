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
  "1)" => "Знание-знакомство",
  "2)" => "Знание определения базового термина",
  "3)" => "Знание-воспроизведение копии",
  "4)" => "Знание-умение и применение", 
);
if (isset($_REQUEST['surname'])) {
  $name = $names[$_REQUEST['$_REQUEST']];
  echo "Вы выбрали: {$_REQUEST['surname']}, {$name} ";
}
?>
<form action="?=$_SERVER['SCRIPT_NAME']?>" method=post>
  Выберите код образа мышления:
  <select name=surname>
    <?=selectItems($names, $_REQUEST['surname'])?>
  </select><br>
  <input type=submit value="нажмите">
</form><!-- Страница с формой -->
<html><body>
<form action=hello.php>
Ссылка на мультимедийный файл <input type=text name="login" value=""><br>
Правильный ответ <input type=text name="login" value=""><br>
Штрафной ответ <input type=text name="login" value=""><br>
<input type=submit value="Нажмите кнопку, чтобы запустить сценарий!">
</form>
</body></html>
