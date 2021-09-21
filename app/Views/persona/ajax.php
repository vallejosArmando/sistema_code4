<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Live Data Search in Codeigniter using Ajax JQuery</title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
		<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" />
	</head>
	<body>
		<div class="container">
			<br />
			<br />
			<br />
			<h2 align="center">Live Data Search in Codeigniter using Ajax JQuery</h2><br />
			<div class="form-group">
				<div class="input-group">
					<span class="input-group-addon">Search</span>
					<input  type="text" name="datos" id="datos" onclick="data();"placeholder="Search by Customer Details" class="form-control" />
				</div>
			</div>
			<br />
			<div id="result"></div>
		</div>
		<div style="clear:both"></div>
		<br />
		<br />
		<br />
		<br />
	</body>
</html>


<script>
$(document).ready(function(){

	data();

	function data(dato)
	{
		$.ajax({
			url:"<?php echo base_url(); ?>/Ajaxx/fetch",
			method:"POST",
			data:JSON,
			success:function(data){
				$('#result').html(data);
			}
		})
	}

	$('#datos').keyup(function(){
		var datos = $(this).val();
		if(datos!= '')
		{
			data(datos);
		}
		else
		{
			data();
		}
	});
});
</script>