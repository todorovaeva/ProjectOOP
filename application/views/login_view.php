<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Login</title>
</head>
<body>
	<div id='login_form'>
		<form action='<?php echo base_url();?>index.php/login/procedure' method='post' name='procedure'>
			<h2>Login</h2>
			
			<?php if(! is_null($param)) echo $param;?>	
			<p>		
			<label for='username'>Username</label>
			<input type='text' name='username' id='username'>
			</p>
			<p>
			<label for='password'>Password</label>
			<input type='password' name='password' id='password'>							
			</p>
			<input type='Submit' value='Login' />			
		</form>
	</div>
</body>
</html>