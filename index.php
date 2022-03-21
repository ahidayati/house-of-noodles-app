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
<!--    <link rel="stylesheet" href="assets/css/main.css">-->
    <link rel="stylesheet" href="assets/dist/main.css">

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
                        <a class="nav-link" href="tel:123-456-7890"><i class="fa-solid fa-phone"></i> 12.34.56.78.90</a>
                    </div>
                </div>
            </div>
        </nav>
    </section>

<!--header section-->
    <section id="header-section">
        <div>
            <h1 class="header-text">Welcome to the house of noodles</h1>
        </div>
    </section>

<!--menu section-->
    <section id="menu-section">
        <div class="text-center">
            <h2>Our Menu</h2>
            <p>Our menu changes occasionally. Any menu can be made vegetarian by replacing any meat with tofu or saitan. Ask our server for more information about specific allergen.</p>
        </div>
        <div class="text-center my-3">
            <button class="btn btn-outline-dark mx-5"><i class="fa-solid fa-cookie"></i> Starters</button>
            <button class="btn btn-dark mx-5"><i class="fa-solid fa-bowl-rice"></i> Main Dishes</button>
            <button class="btn btn-outline-dark mx-5"><i class="fa-solid fa-cheese"></i> Deserts</button>
            <button class="btn btn-outline-dark mx-5"><i class="fa-solid fa-martini-glass-citrus"></i> Drinks</button>
            <button class="btn btn-outline-dark mx-5"><i class="fa-solid fa-seedling"></i> Vegetarian</button>
        </div>
        <div class="container">
            <div class="row">
                <div class="col">
                    <div>
                        <h3>Bangkok Shrimp Pad Thai</h3>
                        <p>Stir-fried rice noodles with shrimp, peanuts, a scrambled egg, and bean sprouts.</p>
                        <span>15€</span>
                    </div>
                    <div>
                        <h3>Bali Chicken Fried Noodles</h3>
                        <p>Thin yellow noodles stir fried in cooking oil with garlic, onion, chicken, cabbages and tomatoes.</p>
                        <span>16€</span>
                    </div>
                </div>
                <div class="col">
                    <div>
                        <h3>Saigon Beef Pho Bo</h3>
                        <p>Vietnamese noodle soup dish consisting of broth, rice noodles, herbs, and beef meat.</p>
                        <span>14€</span>
                    </div>
                    <div>
                        <h3>Osaka Spicy Tofu Ramen</h3>
                        <p>Vegetarian ramen with mushroom, carrot, vegetable broth and sweet soy sauce braised tofu.</p>
                        <span>14€</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

<!--hours section-->
    <section id="hours-section">
        <div class="container text-center">
            <h2>Opening Hours</h2>
            <div class="row">
                <div class="col">
                    <h3>Monday to Thursday</h3>
                    <h4>09:00</h4>
                    <h4>23:00</h4>
                </div>
                <div class="col">
                    <h3>Friday and Saturday</h3>
                    <h4>08:00</h4>
                    <h4>24:00</h4>
                </div>
            </div>
<!--            <div class="row special-announcement">-->
<!--                <span>Closed for Summer Break: 15 July - 1 August 2022</span>-->
<!--            </div>-->
        </div>
    </section>

<!--reservation section-->
    <section id="reservation-section">
        <div class="container py-5">
            <h2 class="text-center">Reserve Your Table Now</h2>
            <form>
                <div class="row">
                    <div class="col-3 offset-lg-3 d-flex flex-column justify-content-center">
                        <div class="mb-3">
                            <label for="inputName" class="form-label">Name</label>
                            <input type="text" class="form-control" id="inputName">
                        </div>
                        <div class="mb-3">
                            <label for="inputEmail" class="form-label">Email Address</label>
                            <input type="email" class="form-control" id="inputEmail">
                        </div>
                        <div class="mb-3">
                            <label for="inputPhone" class="form-label">Phone No.</label>
                            <input type="tel" class="form-control" id="inputPhone">
                        </div>
                    </div>
                    <div class="col-3 d-flex flex-column justify-content-center">
                        <div class="mb-3">
                            <label for="inputPerson" class="form-label">How Many Person</label>
                            <select id="inputPerson" name="inputPerson">
                                <option value=1>1 person</option>
                                <option value=2>2 persons</option>
                                <option value=3>3 persons</option>
                                <option value=4>4 persons</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="inputDate" class="form-label">Date</label>
                            <input type="date" class="form-control" id="inputDate">
                        </div>
                        <div class="mb-3">
                            <label for="inputHour" class="form-label">Hour</label>
                            <input type="time" class="form-control" id="inputHour">
                        </div>
                    </div>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-dark">RESERVE A TABLE</button>
                </div>
            </form>
        </div>
    </section>

<!--testimonial section-->
    <section id="testimonial-section">
        <div class="container py-5">
            <div class="col-5 offset-7">
                <i class="fa-solid fa-quote-right"></i>
                <p class="testimonial-text">I ordered the spicy tonkotsu ramen, the flavor profile was 10/10. I truly appreciate how much care they put into the presentation of the bowl. That really took the experience the extra mile for me. The noodles are fresh, the cuts of pork belly are juicy and the broth is delicious and not too salty. It was an excellent experience, must try for noodle lovers!</p>
                <p class="testimonial-name">Lucy Liu</p>
            </div>
        </div>
    </section>

<!--values section-->
    <section id="values-section">
        <div class="container py-5">
            <h2 class="text-center">Our Values</h2>
            <p class="text-center">Our core values allow us to bring the best foods and services to you</p>
            <div class="row">
                <div class="col-4">
                    <div class="card text-white">
                        <img src="assets/images/card-1.jpg" class="card-img" alt="card-image">
                        <div class="card-img-overlay d-flex flex-column justify-content-center">
                            <h5 class="card-title text-center">High Quality</h5>
                            <p class="card-text">Every ingredients are sourced from responsible suppliers who provide high quality products.</p>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card text-white">
                        <img src="assets/images/card-2.jpg" class="card-img" alt="card-image">
                        <div class="card-img-overlay d-flex flex-column justify-content-center">
                            <h5 class="card-title text-center">Authenticity</h5>
                            <p class="card-text">The recipes used are authentic from deep research and have been passed down for generations.</p>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card text-white">
                        <img src="assets/images/card-3.jpg" class="card-img" alt="card-image">
                        <div class="card-img-overlay d-flex flex-column justify-content-center">
                            <h5 class="card-title text-center">Made With Love</h5>
                            <p class="card-text">Every dish is made by our professional chefs with love and passion for good food.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


<!--footer-->
    <footer id="footer-section">
        <div class="container pt-5 pb-2">
            <div class="row">
                <div class="col">
                    <h2 class="text-center">Contact Us</h2>
                    <form>
                        <div class="row">
                            <div class="col-6 d-flex flex-column justify-content-center">
                                <div class="mb-3">
                                    <label for="inputName" class="form-label" hidden>Name</label>
                                    <input type="text" class="form-control" id="inputName" placeholder="Name">
                                </div>
                                <div class="mb-3">
                                    <label for="inputEmail" class="form-label" hidden>Email Address</label>
                                    <input type="email" class="form-control" id="inputEmail" placeholder="Email Address">
                                </div>
                                <div class="mb-3">
                                    <label for="inputPhone" class="form-label" hidden>Phone No.</label>
                                    <input type="tel" class="form-control" id="inputPhone" placeholder="Phone No.">
                                </div>
                            </div>
                            <div class="col-6 d-flex flex-column justify-content-center">
                                <div class="mb-3">
                                    <label for="inputSubject" class="form-label" hidden>Subject</label>
                                    <input type="text" class="form-control" id="inputSubject" placeholder="Subject">
                                </div>
                                <div class="mb-3">
                                    <label for="inputMessage" class="form-label" hidden>Message</label>
                                    <textarea rows="3" type="text" class="form-control" id="inputMessage" placeholder="Message"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-outline-light">Submit</button>
                        </div>
                    </form>
                </div>
                <div class="col d-flex flex-column justify-content-center">
                    <div class="mx-auto">
                        <img src="assets/images/screenshot_map.png" class="map-img mb-3" alt="map-image">
                        <p>Address: 9 Noodle Street, Noodle City 63000</p>
                        <p>Phone: 12.34.56.78.90</p>
                        <p>Email: noodles@mail.com</p>
                    </div>
                </div>
            </div>
            <div class="row text-center">
                <div>
                    <a href="#"><i class="social-logo fab fa-twitter"></i></a>
                    <a href="#"><i class="social-logo fab fa-facebook-f"></i></a>
                    <a href="#"><i class="social-logo fab fa-instagram"></i></a>
                </div>
                <div>
                    <p class="copyright-text">
                        © 2022 The House of Noodles | developed by ahidayati | All rights reserved.
                    </p>
                </div>
            </div>
            <a href="#" class="admin-connection-text">Admin Connection</a>
        </div>
    </footer>



    <!--jquery script-->
<!--    <script src="node_modules/jquery/dist/jquery.js"></script>-->
    <!--bootstrap script-->
<!--    <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>-->
    <!--javascript-->
<!--    <script src="assets/js/main.js"></script>-->

    <script src="assets/dist/all.js"></script>

</body>
</html>
