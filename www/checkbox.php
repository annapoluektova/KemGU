<?php
if (@$_REQUEST['doGo']) {
  	else echo "�� �� ������ ����� $k. <br>";
  }
}
?>
<form action="<?=$_SERVER['SCRIPT_NAME']?>" method=post>
����� ����� ���������������� �� ������?<br>
<input type=hidden name="known[PHP]" value="0">
  <input type=checkbox name="known[PHP]" value="1">PHP<br>
<input type=hidden name="known[Perl]" value="0">
  <input type=checkbox name="known[Perl]" value="1">Perl<br>
<input type=submit name="doGo" value="Go!">
</form>