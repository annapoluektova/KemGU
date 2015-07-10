<?php ## Создание таблиц в БД.
include_once "mysql_connect.php";



mysql_query('
  CREATE TABLE S_bank_test_task (
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
') or die("MySQL error: ".mysql_error());









mysql_query('
  CREATE TABLE S_subjects (
  id_s_s                                   INT AUTO_INCREMENT PRIMARY KEY,
  code_subject                             INT,
  subject                                  TEXT,
  level_mean_subject                       TEXT,
  giperreference                           TEXT
)
') or die("MySQL error: ".mysql_error());






mysql_query('
  CREATE TABLE S_forms_test_task (
  id_s_f_t_t                               INT AUTO_INCREMENT PRIMARY KEY,
  form_test_task                           TEXT,
  example                                  INT
)
') or die("MySQL error: ".mysql_error());









mysql_query('
  CREATE TABLE S_mentality (
  id_s_m                                   INT AUTO_INCREMENT PRIMARY KEY,
  name_image_mentality                     TEXT,
  view_image_mentality                     TEXT,
  explanation                              TEXT
)
') or die("MySQL error: ".mysql_error());








?>