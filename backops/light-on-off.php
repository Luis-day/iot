<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>IoT Digital input</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">


</head>

<body>
    <div class="container">
        <div class="row gap-3">

            <h1 class="mt-5">Encender y apagar el boton</h1>
            <form action="#" method='post'>
                <button class="btn btn-outline-primary" type='submit'>Encender/Apagar LED</button>
            </form>
            <h1>estado del foco</h1>
            <?php
            $db = new PDO(
                'mysql:host=127.0.0.1;
                dbname=2023_ti801_iot', 
                "root",
                ""
            );
            $query = 'SELECT * FROM testdigital';
            $stmt = $db->query($query);

            //$digitalDato = $stmt->fetch();
            $digitalDato = rand(0,1);

            if ($digitalDato == 0) {
                $image = 'light_off.svg';
            } else {
                $image = 'light_on.svg';
            }


            echo "<img src = '" , $image, "'"; 


            ?>
        </div>

    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
        crossorigin="anonymous"></script>
</body>

</html>