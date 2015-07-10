<?php ## Простейшая гостевая книга.
require_once "mysql_connect.php";
require_once "lib/mysql_qw.php";




// Имя таблицы 0.
define("TBLNAME0", "guestbook");

// Создаем таблицу 0, если она еще не существует.
mysql_qw('
  CREATE TABLE IF NOT EXISTS '.TBLNAME0.' (
  id    INT AUTO_INCREMENT PRIMARY KEY,
  stamp TIMESTAMP,
  name  VARCHAR(60),
  text  TEXT
)
') or die(mysql_error());




// Имя таблицы 1.
define("TBLNAME1", "S_bank_test_task");

// Создаем таблицу 1, если она еще не существует.
mysql_qw('
  CREATE TABLE IF NOT EXISTS '.TBLNAME1.' (
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



// Имя таблицы 2.
define("TBLNAME2", "S_subjects");

// Создаем таблицу, если она еще не существует.
mysql_qw('
  CREATE TABLE IF NOT EXISTS '.TBLNAME2.' (
  id_s_s                                   INT AUTO_INCREMENT PRIMARY KEY,
  code_subject                             INT,
  subject                                  TEXT,
  level_mean_subject                       TEXT,
  giperreference                           TEXT
)
') or die(mysql_error());



// Имя таблицы 3.
define("TBLNAME3", "S_forms_test_tasks");

// Создаем таблицу, если она еще не существует.
mysql_qw('
  CREATE TABLE IF NOT EXISTS '.TBLNAME3.' (
  id_s_f_t_t                               INT AUTO_INCREMENT PRIMARY KEY,
  form_test_task                           TEXT,
  example                                  INT
)
') or die(mysql_error());



// Имя таблицы 4.
define("TBLNAME4", "S_mentality");

// Создаем таблицу, если она еще не существует.
mysql_qw('
  CREATE TABLE IF NOT EXISTS '.TBLNAME4.' (
  id_s_m                                   INT AUTO_INCREMENT PRIMARY KEY,
  name_image_mentality                     TEXT,
  view_image_mentality                     TEXT,
  explanation                              TEXT
)
') or die(mysql_error());




// Обрабатываем кнопки и действия 0.
if (@$_REQUEST['doAdd']) {  // Получаем данные из формы.
  $element = $_REQUEST['element'];
  // Удаляем слэши в данных, которые PHP вставил в режиме
  // magic_quotes_gpc (если он включен).
  if (ini_get("magic_quotes_gpc"))
    $element = array_map('stripslashes', $element);
  // Вставляем запись 0.
  mysql_qw(
    'INSERT INTO '.TBLNAME0.' SET name=?, text=?, stamp=?, id=?',
    $element['name'],
    $element['text'],
    $element['stamp'],
    $element['id']
  ) or die(mysql_error());
    // Выполняем "самопереадресацию", чтобы при нажатии кнопки
    // "Обновить" в браузере сообщение не добавлялось снова и снова.
    Header("Location: {$_SERVER['SCRIPT_NAME']}?".time());
    exit();
}



// Обрабатываем кнопки и действия 1.
if (@$_REQUEST['doAdd']) {
  // Получаем данные из формы.
  $element = $_REQUEST['element'];
  // Удаляем слэши в данных, которые PHP вставил в режиме
  // magic_quotes_gpc (если он включен).
  if (ini_get("magic_quotes_gpc"))
    $element = array_map('stripslashes', $element);
  // Вставляем запись 1.
  mysql_qw(
    'INSERT INTO '.TBLNAME1.' SET id_s_b_t_t=?,
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
    $element[' complicate_test_task'],
    $element['quality_evalution_complicate_test_task']
  ) or die(mysql_error());
    // Выполняем "самопереадресацию", чтобы при нажатии кнопки
    // "Обновить" в браузере сообщение не добавлялось снова и снова.
    Header("Location: {$_SERVER['SCRIPT_NAME']}?".time());
    exit();
}



// Обрабатываем кнопки и действия 2.
if (@$_REQUEST['doAdd']) {
  // Получаем данные из формы.
  $element = $_REQUEST['element'];
  // Удаляем слэши в данных, которые PHP вставил в режиме
  // magic_quotes_gpc (если он включен).
  if (ini_get("magic_quotes_gpc"))
    $element = array_map('stripslashes', $element);
  // Вставляем запись 2.
  mysql_qw(
    'INSERT INTO '.TBLNAME2.' SET id_s_s=?,
                                  code_subject=?,
                                  subject=?,
                                  level_mean_subject=?,
                                  giperreference=?',
    $element['id_s_s'],
    $element['code_subject'],
    $element['subject'],
    $element['level_mean_subject'],
    $element['giperreference']
  ) or die(mysql_error());
    // Выполняем "самопереадресацию", чтобы при нажатии кнопки
    // "Обновить" в браузере сообщение не добавлялось снова и снова.
    Header("Location: {$_SERVER['SCRIPT_NAME']}?".time());
    exit();
}



// Обрабатываем кнопки и действия 3.
if (@$_REQUEST['doAdd']) {
  // Получаем данные из формы.
  $element = $_REQUEST['element'];
  // Удаляем слэши в данных, которые PHP вставил в режиме
  // magic_quotes_gpc (если он включен).
  if (ini_get("magic_quotes_gpc"))
    $element = array_map('stripslashes', $element);
  // Вставляем запись 3.
  mysql_qw(
    'INSERT INTO '.TBLNAME3.' SET id_s_f_t_t=?,
                                  form_test_task=?,
                                  example=?',
    $element['id_s_f_t_t'],
    $element['form_test_task'],
    $element['example']
  ) or die(mysql_error());
    // Выполняем "самопереадресацию", чтобы при нажатии кнопки
    // "Обновить" в браузере сообщение не добавлялось снова и снова.
    Header("Location: {$_SERVER['SCRIPT_NAME']}?".time());
    exit();
}



// Обрабатываем кнопки и действия 4.
if (@$_REQUEST['doAdd']) {
  // Получаем данные из формы.
  $element = $_REQUEST['element'];
  // Удаляем слэши в данных, которые PHP вставил в режиме
  // magic_quotes_gpc (если он включен).
  if (ini_get("magic_quotes_gpc"))
    $element = array_map('stripslashes', $element);
  // Вставляем запись 4.
  mysql_qw(
    'INSERT INTO '.TBLNAME4.' SET id_s_m=?,
                                  name_image_mentality=?,
                                  view_image_mentality=?,
                                  explanation=?',
    $element['id_s_m'],
    $element['name_image_mentality'],
    $element['view_image_mentality'],
    $element['explanation']
  ) or die(mysql_error());
    // Выполняем "самопереадресацию", чтобы при нажатии кнопки
    // "Обновить" в браузере сообщение не добавлялось снова и снова.
    Header("Location: {$_SERVER['SCRIPT_NAME']}?".time());
    exit();
}






// Удаление сообщения с указанным ID 0.
if ($delid = @$_REQUEST['delete']) {
  mysql_qw('DELETE FROM '.TBLNAME0.' WHERE id=?', $delid)
    or die(mysql_error());
}
// Удаление сообщения с указанным ID 1.
if ($delid = @$_REQUEST['delete']) {
  mysql_qw('DELETE FROM '.TBLNAME1.' WHERE id_s_b_t_t=?', $delid)
    or die(mysql_error());
}
// Удаление сообщения с указанным ID 2.
if ($delid = @$_REQUEST['delete']) {
  mysql_qw('DELETE FROM '.TBLNAME2.' WHERE id_s_s=?', $delid)
    or die(mysql_error());
}
// Удаление сообщения с указанным ID 3.
if ($delid = @$_REQUEST['delete']) {
  mysql_qw('DELETE FROM '.TBLNAME3.' WHERE id_s_f_t_t=?', $delid)
    or die(mysql_error());
}
// Удаление сообщения с указанным ID 4.
if ($delid = @$_REQUEST['delete']) {
  mysql_qw('DELETE FROM '.TBLNAME4.' WHERE id_s_m=?', $delid)
    or die(mysql_error());
}



// Выбираем все записи из таблицы, начиная с самой новой 0.
$result = mysql_qw('
  -- Функция MySQL UNIX_TIMESTAMP() коныертирует timistamp
  -- из формата MySQL в число секунд с начала эпохи Unix.
    SELECT *, UNIX_TIMESTAMP(stamp) AS stamp
    FROM '.TBLNAME0.'
    ORDER BY stamp DESC
') or die(mysql_error());
// Выбираем все записи из таблицы, начиная с самой новой 1.
$result = mysql_qw('
  -- Функция MySQL UNIX_TIMESTAMP() коныертирует timistamp
  -- из формата MySQL в число секунд с начала эпохи Unix.
    SELECT *, UNIX_TIMESTAMP(stamp) AS stamp
    FROM '.TBLNAME1.'
    ORDER BY stamp DESC
') or die(mysql_error());
// Выбираем все записи из таблицы, начиная с самой новой 2.
$result = mysql_qw('
  -- Функция MySQL UNIX_TIMESTAMP() коныертирует timistamp
  -- из формата MySQL в число секунд с начала эпохи Unix.
    SELECT *, UNIX_TIMESTAMP(stamp) AS stamp
    FROM '.TBLNAME2.'
    ORDER BY stamp DESC
') or die(mysql_error());
// Выбираем все записи из таблицы, начиная с самой новой 3.
$result = mysql_qw('
  -- Функция MySQL UNIX_TIMESTAMP() коныертирует timistamp
  -- из формата MySQL в число секунд с начала эпохи Unix.
    SELECT *, UNIX_TIMESTAMP(stamp) AS stamp
    FROM '.TBLNAME3.'
    ORDER BY stamp DESC
') or die(mysql_error());
// Выбираем все записи из таблицы, начиная с самой новой 4.
$result = mysql_qw('
  -- Функция MySQL UNIX_TIMESTAMP() коныертирует timistamp
  -- из формата MySQL в число секунд с начала эпохи Unix.
    SELECT *, UNIX_TIMESTAMP(stamp) AS stamp
    FROM '.TBLNAME4.'
    ORDER BY stamp DESC
') or die(mysql_error());


for ($book=array(); $row=mysql_fetch_array($result); $book[]=$row);
?>





<!-- Далее идет шаблон книги. -->
<form action="" method="post">
<table>
<tr valign="top">
  <td>Ваше имя:</td>
  <td><input type="text" name="element[name]"></td>
</tr>
<tr valign="top">
  <td>Текст сообщения:</td>
  <td><textarea name="element[text]" cols="60" rows="5"></textarea></td>
</tr>
<tr>
  <td>&nbsp;</td>
  <td><input type="submit" name="doAdd" value="Добавить"></td>
<tr valign="top">
  <td>Проверка:</td>
  <td><textarea name="element[explanation]" cols="40" rows="4"></textarea></td>
</tr>


</table>
</form>
<hr>
<?foreach($book as $element) {?>
  <b>
    <?=date("d.m.Y", $element['stamp'])?>
    <?=htmlspecialchars($element['name'])?>
  </b> написал:
  <a href="<?=$_SERVER['SCRIPT_NAME']?>?delete=<?=$element['id']?>">
    [удалить]</a>
  <br>
  <blockquote>
    <?=nl2br(htmlspecialchars($element['text']))?>
  </blockquote>
  <hr>
<?}?>