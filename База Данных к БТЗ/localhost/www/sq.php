<html><body>
<h1>������������!</h1>
<?php
$dat = date("d.m y");
$tm = date("h:i:s");
echo "������� ����: $dat ����<br>\n";
echo "������� �����: $tm<br>\n";
echo "� ��� �������� � ���� ������ 5 ����������� �����:<br>\n";
for ($i=1; $i<=5; $i++) {
  echo "<li>$i � �������� = " . ($i*$i);
  echo ", $i � ���� = " . ($i*$i*$i) . "\n";
}
?>
</body></html>