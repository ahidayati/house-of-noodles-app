<?php

//echo "test";

//pdo connection test
//try{
//    $connect = new PDO("mysql:host=mariadb;port=3306;dbname=database", "user", "zeus");
//    $connect -> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
//    echo "Connected succesfully <br>";
//} catch(PDOException $e){
//    echo "Connection failed: " . $e -> getMessage();
//}
//
//$query = "SELECT * FROM table1;";
//$results = $connect->query($query);
//$results->execute();
//
//$rows = $results->fetchAll(PDO::FETCH_ASSOC);
//
//var_dump($rows);

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

    <!--google font-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!--font-awesome stylesheet-->
    <link href="node_modules/@fortawesome/fontawesome-free/css/all.css" rel="stylesheet" type="text/css">

    <!--css stylesheet-->
    <link rel="stylesheet" href="assets/css/main.css">
    <!--<link rel="stylesheet" href="assets/css/index.css">-->

<body>

<!--navbar section-->
    <section>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="#"><img src="assets/images/logo150px.png" class="navbar-logo"> The House of Noodles</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse flex-row-reverse" id="navbarNavAltMarkup">
                    <div class="navbar-nav">
                        <a class="nav-link" aria-current="page" href="#">Home</a>
                        <a class="nav-link" href="#">Menu</a>
                        <a class="nav-link" href="#">Reservation</a>
                        <a class="nav-link" href="#">Contact Us</a>
                        <a class="nav-link" href="#"><i class="fa-solid fa-phone"></i> 12.34.56.78.90</a>
                    </div>
                </div>
            </div>
        </nav>
    </section>

<!--header section-->
    <section>
        <div>

        </div>
    </section>

<!--menu section-->
    <section>

    </section>

<!--hours section-->
    <section>

    </section>

<!--reservation section-->
    <section>

    </section>

<!--testimonial section-->
    <section>

    </section>

<!--values section-->
    <section>

    </section>

<!--footer-->
    <footer>

    </footer>



    <!--jquery script-->
    <script src="node_modules/jquery/dist/jquery.js"></script>
    <!--bootstrap script-->
    <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <!--javascript-->
    <script src="assets/js/main.js"></script>
</body>
</html>
