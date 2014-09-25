<?php
  include('tables.php');

  // columns for the table tasks
  $_col_tasks__id   = 'id';
  $_col_tasks__name = 'name';
  $_col_tasks__description = 'description';

  // columns for the table users';
  $_col_users__id       = 'id';
  $_col_users__name     = 'name';
  $_col_users__username = 'name';
  $_col_users__password = 'password';
  $_col_users__role_id  = 'role_id';

  // columns for the table tasks_users';
  $_col_tasks_users__id         = 'id';
  $_col_tasks_users__user_id    = 'user_id';
  $_col_tasks_users__task_id    = 'task_id';
  $_col_tasks_users__start      = 'start';
  $_col_tasks_users__end        = 'end';
  $_col_tasks_users__percentage = 'percentage';
  $_col_tasks_users__status     = 'status';

  // columns for the table roles 
  $_col_roles__id   = 'id';
  $_col_roles__name = 'name';

  // columns for the table setting
  $_col_settings__id    = 'id';
  $_col_settings__name  = 'name';
  $_col_settings__value = 'value';
  $_col_settings__description = 'description';


?>
