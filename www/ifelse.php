<!-- Альтернативный систаксис if-else. -->
<?if (isset($_REQUEST['go'])):?>
  Форма ТЗ: <?=$_REQUEST['name']?>
  Образ мышления для решения ТЗ: <?=$_REQUEST['name']?>
  Количество концептов: <?=$_REQUEST['name']?>
  Уровень значимости темы: <?=$_REQUEST['name']?>
<?else:?>
  <form action="<?=$_SERVER['REQUEST_URI']?>" method=post>
   Форма ТЗ: <input type=text name=name><br>
   Образ мышления для решения ТЗ: <input type=text name=name><br>
   Количество концептов: <input type=text name=name><br>
   Уровень значимости темы: <input type=text name=name><br>
   <input type=submit name=go value="Отослать!">
<?endif?>