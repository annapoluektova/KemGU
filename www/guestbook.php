<?php ## ���������� �������� �����.
require_once "mysql_connect.php";
require_once "lib/mysql_qw.php";




// ��� �������.
define("TBLNAME", "S_bank_test_task");

// ������� �������, ���� ��� ��� �� ����������.
mysql_qw('
  CREATE TABLE IF NOT EXISTS '.TBLNAME.' (
  id_s_b_t_t                               INT AUTO_INCREMENT PRIMARY KEY,
  code_subject_XXYYZZPP                    INT,
  code_form_test_task                      INT,
  reference                                TEXT,
  right_answer                             TEXT,
  fine_answer                              TEXT,
  code_image_mentality                     INT,
  quantity_use_concept                     INT,
  average_time                             TIMESTAMP,
  max_admission_time                       TIMESTAMP,
  complicate_test_task                     TEXT,
  quality_evalution_complicate_test_task   TEXT
)
') or die(mysql_error());



// ������������ ������ � ��������.
if (@$_REQUEST['doAdd']) {
  // �������� ������ �� �����.
  $element = $_REQUEST['element'];
  // ������� ����� � ������, ������� PHP ������� � ������
  // magic_quotes_gpc (���� �� �������).
  if (ini_get("magic_quotes_gpc"))
    $element = array_map('stripslashes', $element);
  // ��������� ������.
  mysql_qw(
    'INSERT INTO '.TBLNAME.' SET  id_s_b_t_t=?,
                                  code_subject_XXYYZZPP=?,
                                  code_form_test_task=?,
                                  reference=?,
                                  right_answer=?,
                                  fine_answer=?,
                                  code_image_mentality=?,
                                  quantity_use_concept=?,
                                  average_time=?,
                                  max_admission_time=?,
                                  complicate_test_task=?,
                                  quality_evalution_complicate_test_task=?',
    $element['id_s_b_t_t'],
    $element['code_subject_XXYYZZPP'],
    $element['code_form_test_task'],
    $element['reference'],
    $element['right_answer'],
    $element['fine_answer'],
    $element['code_image_mentality'],
    $element['quantity_use_concept'],
    $element['average_time'],
    $element['max_admission_time'],
    $element['complicate_test_task'],
    $element['quality_evalution_complicate_test_task']
  ) or die(mysql_error());
    // ��������� "�����������������", ����� ��� ������� ������
    // "��������" � �������� ��������� �� ����������� ����� � �����.
    Header("Location: {$_SERVER['SCRIPT_NAME']}?".time());
    exit();
}



// �������� ��������� � ��������� ID.
if ($delid = @$_REQUEST['delete']) {
  mysql_qw('DELETE FROM '.TBLNAME.' WHERE id_s_b_t_t=?', $delid)
    or die(mysql_error());
}


// �������� ��� ������ �� �������, ������� � ����� �����.
$result = mysql_qw('
  -- ������� MySQL UNIX_TIMESTAMP() ������������ timistamp
  -- �� ������� MySQL � ����� ������ � ������ ����� Unix.
    SELECT *, UNIX_TIMESTAMP(average_time) AS average_time
    FROM '.TBLNAME.'
    ORDER BY average_time DESC
') or die(mysql_error());


for ($book=array(); $row=mysql_fetch_array($result); $book[]=$row);
?>



<!-- ����� ���� ������ �����. -->
<form action="" method="post">
<table>

<tr valign="top">
  <td>�������� ����:</td>
  <td><input type="text" name="element[id_s_b_t_t]"></td>
</tr>


<tr valign="top">
  <td>��� ����:</td>
  <td><input type="text" name="element[code_subject_XXYYZZPP]"></td>
</tr>


<tr valign="top">
  <td>��� ����� ��:</td>
  <td><input type="text" name="element[code_form_test_task]"></td>
</tr>


<tr valign="top">
  <td>������ �� �������������� ����:</td>
  <td><input type="text" name="element[referance]"></td>
</tr>


<tr valign="top">
  <td>���������� �����:</td>
  <td><input type="text" name="element[right_answer]"></td>
</tr>

<tr valign="top">
  <td>"��������" �����:</td>
  <td><input type="text" name="element[fine_answer]"></td>
</tr>


<tr valign="top">
  <td>��� ������ ��������:</td>
  <td><input type="text" name="element['code_image_mentality']"></td>
</tr>


<tr valign="top">
  <td>���������� ������������ ���������:</td>
  <td><input type="text" name="element[quantity_use_concept]"></td>
</tr>

<tr valign="top">
  <td>������� ����� �� ������� ��:</td>
  <td><input type="text" name="element[average_time]"></td>
</tr>

<tr valign="top">
  <td>����������� ���������� ����� ������� ��:</td>
  <td><input type="text" name="element[max_admission_time]"></td>
</tr>

<tr valign="top">
  <td>��������� ��:</td>
  <td><input type="text" name="element[complicate_test_task]"></td>
</tr>


<tr valign="top">
  <td>������������ ������ ���������:</td>
  <td><input type="text" name="element[quality_evalution_complicate_test_task]"></td>
</tr>




<tr>
  <td>&nbsp;</td>
  <td><input type="submit" name="doAdd" value="��������"></td>
<tr valign="top">
  <td>��������:</td>
  <td><textarea name="element[explanation]" cols="40" rows="4"></textarea></td>
</tr>


</table>
</form>


<hr>
<?foreach($book as $element) {?>
  <b>
    <?=htmlspecialchars( $element['code_subject_XXYYZZPP'])?>
    <?=htmlspecialchars( $element['code_form_test_task'])?>
    <?=htmlspecialchars( $element['code_image_mentality'])?>
    <?=htmlspecialchars( $element['quantity_use_concept'])?>
    <?=date("d.m.Y", $element['average_time'])?>
    <?=date("d.m.Y", $element['max_admission_time'])?>
  </b> �������:
  <a href="<?=$_SERVER['SCRIPT_NAME']?>?delete=<?=$element['id_s_b_t_t']?>">
    [�������]</a>
  <br>
  <blockquote>
    <?=nl2br(htmlspecialchars( $element['referance']))?>
    <?=nl2br(htmlspecialchars( $element['right_answer']))?>
    <?=nl2br(htmlspecialchars( $element['fine_answer']))?>
    <?=nl2br(htmlspecialchars( $element['complicate_test_task']))?>
    <?=nl2br(htmlspecialchars( $element['quality_evalution_complicate_test_task']))?>
  </blockquote>
  <hr>
<?}?>