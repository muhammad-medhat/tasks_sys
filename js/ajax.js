function add_task(){
  alert('new');
}

              function get_XHR() {
			if (window.XMLHttpRequest)
			{
			  xhr=new XMLHttpRequest();
			}
			else
			{
			  xhr=new ActiveXObject("Microsoft.XMLHTTP");
			}
			return xhr;
		}




		function add_task(){
			xhr = get_XHR();

                        _task_name = document.getElementById('task_name');

			url = "helpers/ajax_requests.php?t=add_task&tname=" + _task_name;
			xhr.open("post", url , true);

			  // alert(_author);

			xhr.onreadystatechange=function()
			{
				if (xhr.readyState==4){						
					if(xhr.status==200)	{
						
						 alert(xhr.responseText);
					}						
				}
			}
			xhr.send();

		}
