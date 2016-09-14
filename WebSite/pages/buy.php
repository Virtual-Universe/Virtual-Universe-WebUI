<html>
<head>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
</head>
<body>
<form name="ajaxform" id="ajaxform" action="post.php" method="POST">
	Amount of Currency to add: <input type="text" name="amount" value ="0"/> <br/>
</form>
<input type="button"  id="simple-post" value="Run Code" />
<div id="simple-msg"></div>

<script>
$(document).ready(function()
{

	
$("#simple-post").click(function()
{
	$("#ajaxform").submit(function(e)
	{
		$("#simple-msg").html("<img src='loading.gif'/>");
		var postData = $(this).serializeArray();
		var formURL = $(this).attr("action");
		$.ajax(
		{
			url : formURL,
			type: "POST",
			data : postData,
			success:function(data, textStatus, jqXHR) 
			{
				$("#simple-msg").html('<pre><code class="prettyprint">'+data+'</code></pre>');

			},
			error: function(jqXHR, textStatus, errorThrown) 
			{
				$("#simple-msg").html('<pre><code class="prettyprint">AJAX Request Failed<br/> textStatus='+textStatus+', errorThrown='+errorThrown+'</code></pre>');
			}
		});
	    e.preventDefault();	//STOP default action
	    e.unbind();
	});
		
	$("#ajaxform").submit(); //SUBMIT FORM
});

});
</script>
</body>