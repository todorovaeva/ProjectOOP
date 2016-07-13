<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Flowers template</title>
	<link href='https://https://fonts.googleapis.com/css?family=Tangerine' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Verdana' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="style.css">

<link href="jquery/jquery-ui.css" rel="stylesheet">

<style>
	body{
		font: 62.5% "Trebuchet MS", sans-serif;
		margin: 50px;
	}
	.demoHeaders {
		margin-top: 2em;
	}
	#dialog-link {
		padding: .4em 1em .4em 20px;
		text-decoration: none;
		position: relative;
	}
	#dialog-link span.ui-icon {
		margin: 0 5px 0 0;
		position: absolute;11`````````````````````````````````````````````````````````
		left: .2em;
		top: 50%;
		margin-top: -8px;
	}
	#icons {
		margin: 0;
		padding: 0;
	}
	#icons li {
		margin: 2px;
		position: relative;
		padding: 4px 0;
		cursor: pointer;
		float: left;
		list-style: none;
	}
	#icons span.ui-icon {
		float: left;
		margin: 0 4px;
	}
	.fakewindowcontain .ui-widget-overlay {
		position: absolute;
	}
	select {
		width: 200px;
	}
	</style>


</head>

<body>

<!--HEADER-->
<div id="header"> <!--заради старите браузъри не съм ползвала header tag-->
<div id="wrap"> <!--зарaди транспарентната бяла лента горе  целият хедър да ми има за фон снимката с цветята-->
	<div id="logo">
		<img src="img/logo.png">
	</div>
<!--NAVIGATION-->
	<nav>
		<ul>
			<li><a href="#">Home</a></li>
			<li><a href="#">About us</a></li>
			<li><a href="#">Services</a></li>
			<li><a href="#">Contact</a></li>
		</ul>
	</nav>
	<!--END OF NAVIGATION-->
</div>
<!--END OF WRAP-->
	<div class="opacity">
		<h1>Welcome to PE Holidays</h1>
		<h5>Find the best deals for your holidays! Here! NOW!</h5>
	</div>
</div>
<!--END OF HEADER-->
<!--BEGIN OF CONTENT-->
<content>
<!--FIRST PART OF CONTENT-->
	<div id="info">
		<h3>Select your conditions</h3>

		<span>Type:</span>
<label>
<h2 class="demoHeaders">Selectmenu</h2>
<select id="selectmenu">
        <option selected> Select Box </option>
        <option>Short Option</option>
        <option>This Is A Longer Option</option>
    </select>
</label>


		<span>Price:</span>
<label>
<h2 class="demoHeaders">Selectmenu</h2>
<select id="selectmenu">
        <option selected> Select Box </option>
        <option>Short Option</option>
        <option>This Is A Longer Option</option>
    </select>
</label>



<span>Start date:</span>
<h2 class="demoHeaders">Datepicker</h2>
<div id="datepicker"></div>

<span>End date:</span>
<h2 class="demoHeaders">Datepicker</h2>
<div id="datepicker"></div>



	</div>
<!--END OF FIRST PART OF CONTENT-->
	
