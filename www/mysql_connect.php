<?php ## ����������� � ���� MySQL.
$user = "root";
$pass = "";
$db = "S_teacher";

// ������������ � ���� MySQL.
mysql_connect("localhost", $user, $pass)
  or die("Could not connect: ".mysql_error());
// ������� �� $db - ��� ����� ������ ������ �����������������!
// ���� �� ��� ����������, ����� ������, �� ��� �� �������.
@mysql_query("CREATE DATABASE $db");
// �������� �� $db (������ ��� ��������� ��� ��� ������������).
mysql_select_db($db)
  or die("Could not select database: ".mysql_error());
?>