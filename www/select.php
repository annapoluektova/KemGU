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
  "01.00.00.00" => "Алгебра",
  "01.01.00.00" => "Понятие множества. Операции над множествами",
  "01.02.00.00" => "Матрицы. Операции над матрицами",
  "01.03.00.00" => "Определители",
  "01.04.00.00" => "Ранг матрицы",
  "01.05.00.00" => "Системы линейных уравнений",
  "01.06.00.00" => "Контрольная работа по теме: Линейная алгебра (тренировочный вариант)",    
  "01.07.00.00" => "Ответы",    
  "01.08.00.00" => "Литература",      
);
if (isset($_REQUEST['surname'])) {
  $name = $names[$_REQUEST['$_REQUEST']];
  echo "Вы выбрали: {$_REQUEST['surname']}, {$name} ";
}
?>
<form action="?=$_SERVER['SCRIPT_NAME']?>" method=post>
  Выберите код темы:
  <select name=surname>
    <?=selectItems($names, $_REQUEST['surname'])?>
  </select><br>
  <input type=submit value="нажмите">
</form>