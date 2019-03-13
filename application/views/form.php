<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Test App</title>

	<style type="text/css">

	::selection { background-color: #E13300; color: white; }
	::-moz-selection { background-color: #E13300; color: white; }
	
	#container {
		margin: 30px 10%;
		border: 1px solid #D0D0D0;
		box-shadow: 0 0 8px #D0D0D0;
	}

	.inner {
		margin: 0 30px;
		padding: 20px 0;
	}
	
	.inner p{
		color: #F00;
	}
	
	#form input{
		width: 100%;
		margin: 10px 0;
		padding: 5px;
	}
	</style>
</head>
<body>

<div id="container">
	<div class="inner">
		<?=validation_errors()?>
		<form id="form" action="" method="post">
			<label for="link">Сокращение ссылок</label>
			<input type="text" id="link" name="link" placeholder="Укажите URL">
			<input type="submit" value="Получить короткую ссылку">
		</form>
	</div>
</div>

</body>
</html>