<?php include('includes/conn.php'); ?>

<html>
<head>
<title>Admin Form</title>

<link type="text/css" rel="stylesheet" href="css/style.css" />
<!-- <script type='text/javascript' src='js/ajax.js' /> -->
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
          <?php if($settings_Admin_Show_Tasks) { ?>??
            <div class='list'>
              <div class='title'>Tasks List</div>
            
              <?php 
                  foreach($tasks_list as $task){ 
                        $task_name = $task['name'];   
                        if($i % 2 == 0) 
                          echo "<div class='odd'>$task_name</div>";
                        else                       
                          echo "<div class='even'>$task_name</div>";
                        $i++;
                        
                    } 
              ?>

            </div>
          <?php } ?>
<!--	 <form method="post" action="helpers/admin_tasks.php?t=add" >-->
            <table>
              <tr>
                <td><p>Add Task</p></td>
                <td><input type='text' name='name' /></td>
              </tr>
              <tr>
                <td colspan='2'>
                  <input type='text' size=255 name='description' style='width:200px;height:60px' />                    
                </td>
              </tr>
              <tr>
                <td colspan=2>
                  <button onclick='add_task()'></button>
                </td>
              </tr>
            </table>
         <!-- </form>-->
		<div class="content">
                  <table>
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
