<?php ## Простейшая гостевая книга.
require_once "mysql_connect.php";
require_once "lib/mysql_qw.php";




// Имя таблицы.
define("TBLNAME", "S_bank_test_task");

// Создаем таблицу, если она еще не существует.
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



// Обрабатываем кнопки и действия.
if (@$_REQUEST['doAdd']) {
  // Получаем данные из формы.
  $element = $_REQUEST['element'];
  // Удаляем слэши в данных, которые PHP вставил в режиме
  // magic_quotes_gpc (если он включен).
  if (ini_get("magic_quotes_gpc"))
    $element = array_map('stripslashes', $element);
  // Вставляем запись.
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
    // Выполняем "самопереадресацию", чтобы при нажатии кнопки
    // "Обновить" в браузере сообщение не добавлялось снова и снова.
    Header("Location: {$_SERVER['SCRIPT_NAME']}?".time());
    exit();
}



// Удаление сообщения с указанным ID.
if ($delid = @$_REQUEST['delete']) {
  mysql_qw('DELETE FROM '.TBLNAME.' WHERE id_s_b_t_t=?', $delid)
    or die(mysql_error());
}


// Выбираем все записи из таблицы, начиная с самой новой.
$result = mysql_qw('
  -- Функция MySQL UNIX_TIMESTAMP() конвертирует timistamp
  -- из формата MySQL в число секунд с начала эпохи Unix.
    SELECT *, UNIX_TIMESTAMP(average_time) AS average_time
    FROM '.TBLNAME.'
    ORDER BY average_time DESC
') or die(mysql_error());


for ($book=array(); $row=mysql_fetch_array($result); $book[]=$row);
?>



<!-- Далее идет шаблон книги. -->
<form action="" method="post">
<table>

<tr valign="top">
  <td>Ключевое поле:</td>
  <td><input type="text" name="element[id_s_b_t_t]"></td>
</tr>


<tr valign="top">
  <td>Код темы:</td>
  <td><input type="text" name="element[code_subject_XXYYZZPP]"></td>
</tr>


<tr valign="top">
  <td>Код формы ТЗ:</td>
  <td><input type="text" name="element[code_form_test_task]"></td>
</tr>


<tr valign="top">
  <td>Ссылка на мультимедийный файл:</td>
  <td><input type="text" name="element[referance]"></td>
</tr>


<tr valign="top">
  <td>Правильный ответ:</td>
  <td><input type="text" name="element[right_answer]"></td>
</tr>

<tr valign="top">
  <td>"Штрафной" ответ:</td>
  <td><input type="text" name="element[fine_answer]"></td>
</tr>


<tr valign="top">
  <td>Код образа мышления:</td>
  <td><input type="text" name="element['code_image_mentality']"></td>
</tr>


<tr valign="top">
  <td>Количество используемых концептов:</td>
  <td><input type="text" name="element[quantity_use_concept]"></td>
</tr>

<tr valign="top">
  <td>Среднее время на решение ТЗ:</td>
  <td><input type="text" name="element[average_time]"></td>
</tr>

<tr valign="top">
  <td>Максисально допустимое время решения ТЗ:</td>
  <td><input type="text" name="element[max_admission_time]"></td>
</tr>

<tr valign="top">
  <td>Сложность ТЗ:</td>
  <td><input type="text" name="element[complicate_test_task]"></td>
</tr>


<tr valign="top">
  <td>Качественная оценка сложности:</td>
  <td><input type="text" name="element[quality_evalution_complicate_test_task]"></td>
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
    <?=htmlspecialchars( $element['code_subject_XXYYZZPP'])?>
    <?=htmlspecialchars( $element['code_form_test_task'])?>
    <?=htmlspecialchars( $element['code_image_mentality'])?>
    <?=htmlspecialchars( $element['quantity_use_concept'])?>
    <?=date("d.m.Y", $element['average_time'])?>
    <?=date("d.m.Y", $element['max_admission_time'])?>
  </b> написал:
  <a href="<?=$_SERVER['SCRIPT_NAME']?>?delete=<?=$element['id_s_b_t_t']?>">
    [удалить]</a>
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