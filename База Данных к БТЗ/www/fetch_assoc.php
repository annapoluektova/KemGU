<?php ## ��������� ���������� �������.
require_once "mysql_connect.php";
// ��������� ������.
$r = mysql_query("SELECT * FROM people ORDER BY id')
  or die(mysql_error());
$data = array();
while (($row=mysql_fetch_assoc($r)) !== false) {	$data() = $row
}
echo "<pre>"; print_r($data); echo "</pre>";
?>