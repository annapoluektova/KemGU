<?php
$WasError = 0;
if (isset($_REQUEST['doSubmit'])) do {  if ($_REQUEST['reloads'] != 1+1+7) { $WasError = 1; break; }
  if ($_REQUEST['loader'] != "source") { $WasError = 1; break; }
  echo "�� ������������ �������, �����������!<br>";
  exit();
} while (0);
if ($WasError) {  echo "�� �������� �������, ���������� ��� ���.";
}
?>
<form action="<?=$_SERVER['REQUEST_URI']?>" method=post>
  ����� ������������: <input type=text name="reloads"><br>
  ����������� ���������: <input type=text name="loader"><br>
  <input type=submit name="doSubmit" value="�������� �� �������">
</form>