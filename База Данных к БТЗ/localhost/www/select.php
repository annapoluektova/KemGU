<?php
function selectItems($items, $selected=0) {  $text = "";
  foreach ($items as $k=>$v) {    if ($k === $selected) $ch = " selected"; else $ch = "";
    $text .= "<option$ch value='$k'>$v</option>\n";
  }
  return $text;
}
$names = array(
  "Weaving" => "Hugo",
  "Goddard" => "Paul",
  "Taylor" => "Robert",
);
if (isset($_REQUEST['surname'])) {  $name = $names[$_REQUEST['$_REQUEST']];
  echo "Вы выбрали: {$_REQUEST['surname']}, {$name} ";
}
?>
<form action="?=$_SERVER['SCRIPT_NAME']?>" method=post>
  Выберите имя:
  <select name=surname>
    <?=selectItems($names, $_REQUEST['surname'])?>
  </select><br>
  <input type=submit value="Узнать фамилию">
</form>