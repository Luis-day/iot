<!DOCTYPE html>
 <html>
<head>
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>IoT Digital input</title>   
</head>
<body>
    <h1>Encender y apagar el boton</h1>
    <form action="#" method='post'>
        <button type='submit'>Encender/Apagar LED</button>
    </form>

    <h1>estaado del foco</h1>
    <?php
		$db = new PDO(
			'mysql:host=127.0.0.1;
			dbname=2023_ti801_iot', 
			"root",
			""
			);
        $query = 'SELECT * FROM testDigital';
        $stmt = $db->fetch();

        $digitalDato = $stmt->fetch();
        if ( $digitalDato[1] == 0){
            $image = 'apagado.png';
        } else {
            $image = 'encendido.png';

        }

        echo "<img src = '" , $image; "'"; 

        
    ?>
</body>
</html>