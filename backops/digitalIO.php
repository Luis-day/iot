<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylsheet" type="text/css" href="C:\xampp\apps\iot\backops\css\style.css" />
	<title>digitalIO</title>
</head>
<body>
	<h1>Digital Input</h1>
	
		<?php 
			$digitalInput = rand(0, 1);
			echo "$digitalInput\n";
		?>

	<h3>Analogal input</h3>
		<?php 
			$analogalInput = rand(0, 1024);
			echo "$analogalInput";
		?>
		<br>
<button class = "btn success">On</button>
<br>
	<h2>read digital data from MySQL</h2>
		<?php 
		try {
			$db = new PDO(
				'mysql:host=127.0.0.1;
				dbname=2023_ti801_iot', 
				"root",
				""
				);
			$query = 'SELECT * FROM testDigital';
			$stmt = $db -> query($query);
			$digitalDato = $stmt -> fetch();
			var_dump($digitalDato);
			echo '<br></br>';
			echo $digitalDato[1];
		} catch (PDOException $e) {
			echo 'servicio no disponible!! ';
			//echo  $e->getMessage();
			exit();
		}

		?>
</body>
</html>