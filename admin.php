<?php include('includes/conn.php'); ?>

<html>
<head>
<title>Admin Form</title>

<script src="js/ajax.js" />
<script>

</script>
<link type="text/css" rel="stylesheet" href="css/style.css" />
</head>

<?php 

  $settings_Admin_Show_Tasks = "";

  $tasks_query  = "select * from $_tasks_table";
  $tasks_result = mysql_query($tasks_query) or die( mysql_error() );

  //echo"<div style='background-color:red'>the results is  "  .var_dump($tasks_result) ." asdfasdf</div><hr>";


  $settings_Admin_Show_Tasks_query = "select * from $_settings_table where $_col_settings__name='admin_show_tasks'";
  $settings_Admin_Show_Tasks_result = mysql_query($settings_Admin_Show_Tasks_query) or die( mysql_error() );
  

  $settings_Admin_Show_Tasks_value = mysql_fetch_array($settings_Admin_Show_Tasks_result);
  $settings_Admin_Show_Tasks = $settings_Admin_Show_Tasks_value['value'];




  
  $i = 0;
//  $tasks_list = array();
//  echo  $tasks_query;
  while($task_row = mysql_fetch_array($tasks_result)){
    $tasks_list[$i] = $task_row;
    $i++;
  }

//  var_dump($tasks_list);
  $tasks_report_query = "
    SELECt u.id as user_id, u.name as user_name, t.name as task_name, tu.start as start, tu.percentage as percentage FROM users u 
       inner join `tasks_users` tu on tu.user_id = u.id 
       inner join tasks t on tu.task_id = t.id";

  $tasks_report_result = mysql_query($tasks_report_query) or die( mysql_error() );




?>

<body>
	<div class="container">
          
          <?php if(!$settings_Admin_Show_Tasks) { ?>

                  <ul id="accordion">

            
              <?php 
                  foreach($tasks_list as $task){ 
                        $task_name = $task[$_col_tasks__name];   
                        $task_id = $task[$_col_tasks__id];
                        $task_description = $task[$_col_tasks__description];
              ?>
            	        <li>
                          <a href="#task_<?php echo $task_id?>">
                                <h2><?php echo $task_name ?></h2>
                          </a>
                          <section id="task_<?php echo $task_id ?>" class="accordion_content">
                            <p><?php echo $task_description?></p>
                          </section>
                      </li>
                                    
              <?php
                        $i++;
                        
                    } 
              ?>

            </ul>
          <?php } ?>
<!--	 <form method="post" action="helpers/admin_tasks.php?t=add" >-->
            <table>
              <tr>
                <td><p>Add Task</p></td>
                <td><input type='text' id='task_name' name='task_name' /></td>
              </tr>
              <tr>
                <td colspan='2'>
                  <input type='text' size=255 name='description' style='width:226px;height:60px' />                    
                </td>
              </tr>
              <tr>
                <td colspan=2>
                  <input type="button" onclick='add_task()' value="Add"></button>
                </td>
              </tr>
            </table>
         <!-- </form>-->
		<div class="content">
                  <table class="admin_table">
	            <tr class="table_head">
		        <td>User ID</td>
		        <td>Name</td>
		        <td>Task Name</td>
		        <td>Task Status</td>
		        <td>Priority</td>
                    </tr>
                    <?php while($tasks_report_item = mysql_fetch_array($tasks_report_result)) { ?>
                          
                          <tr>
                            <td><?php echo $tasks_report_item['user_id'] ?></td>
                            <td><?php echo $tasks_report_item['user_name'] ?></td>
                            <td><?php echo $tasks_report_item['task_name'] ?></td>
                            <td><?php echo $tasks_report_item['start'] ?></td>
                            <td><?php echo $tasks_report_item['percentage'] ?></td>
                          </tr>        
            
                    <?php } ?>
        </table>

			<div class="submit_button">
				<input type="submit" value="Submit" id="button"/>
			</div>
			
		</div>
</body>
</html>
