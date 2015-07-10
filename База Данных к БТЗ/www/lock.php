<html><body>
<?if (!isset($_REQUEST['doGo'])) {?>
  <form action="<?=$_SERVER['SCRIPT_NAME']?>">
  Имя: <input type=text name="login" value=""><br>
  Пароль: <input type=password name="password" value=""><br>
  <input type=submit name="doGo" value="Нажмите кнопку!">
  </form>
<?} else {
  if ($_REQUEST['login']=="root" && $_REQUEST['password']=="Z10N0101") {
    echo "Доступ открыт для пользователя $_REQUEST[login]";
    system("rundll32.exe user32.dll,LockWorkStation");
  } else {
    echo "Доступ закрыт!";
  }
}?>
</body></html>