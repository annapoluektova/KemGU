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
  "01.00.00.00" => "�������",
  "01.01.00.00" => "������� ���������. �������� ��� �����������",
  "01.02.00.00" => "�������. �������� ��� ���������",
  "01.03.00.00" => "������������",
  "01.04.00.00" => "���� �������",
  "01.05.00.00" => "������� �������� ���������",
  "01.06.00.00" => "����������� ������ �� ����: �������� ������� (������������� �������)",    
  "01.07.00.00" => "������",    
  "01.08.00.00" => "����������",      
);
if (isset($_REQUEST['surname'])) {
  $name = $names[$_REQUEST['$_REQUEST']];
  echo "�� �������: {$_REQUEST['surname']}, {$name} ";
}
?>
<form action="?=$_SERVER['SCRIPT_NAME']?>" method=post>
  �������� ��� ����:
  <select name=surname>
    <?=selectItems($names, $_REQUEST['surname'])?>
  </select><br>
  <input type=submit value="�������">
</form>