<!-- Альтернативный систаксис if-else. -->
<?if (isset($_REQUEST['go'])):?>

  Форма ТЗ: <?=$_REQUEST['name']?>
<?else:?>
  <form action="<?=$_SERVER['REQUEST_URI']?>" method=post>
   Форма ТЗ: <input type=text name=name><br>

   <input type=submit name=go value="Прислать!">
<?endif?>