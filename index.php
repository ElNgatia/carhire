<?php
// Include config file
require_once "config.php";

// Define variables and initialize with empty values
$name = $email = $phone = $date = $time = $people = $message = $location = "";
$name_err = $email_err = $phone_err = $date_err = $time_err = $people_err = $message_err = $location_err = "";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate name
    $input_name = trim($_POST["name"]);
    if (empty($input_name)) {
        $name_err = "Please enter a name.";
    } elseif (!filter_var($input_name, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => "/^[a-zA-Z\s]+$/")))) {
        $name_err = "Please enter a valid name.";
    } else {
        $name = $input_name;
    }

    // Validate email address
    $input_email = trim($_POST["email"]);
    if (empty($input_email)) {
        $email_err = "Please enter an email address.";
    } else {
        $email = $input_email;
    }

    // Validate phone number
    $input_phone = trim($_POST["phone"]);
    if (empty($input_phone)) {
        $phone_err = "Please enter a phone number.";
    } elseif (!ctype_digit($input_phone)) {
        $phone_err = "Please enter a positive integer value.";
    } else {
        $phone = $input_phone;
    }

    // Validate date
    $input_date = trim($_POST["date"]);
    if (empty($input_date)) {
        $date_err = "Please enter a date.";
    } else {
        $date = $input_date;
    }

    // Validate time
    $input_time = trim($_POST["time"]);
    if (empty($input_time)) {
        $time_err = "Please enter a time.";
    } else {
        $time = $input_time;
    }

    // Validate people
    $input_people = trim($_POST["people"]);
    if (empty($input_people)) {
        $people_err = "Please enter a number of people.";
    } elseif (!ctype_digit($input_people)) {
        $people_err = "Please enter a positive integer value.";
    } else {
        $people = $input_people;
    }

    // Validate location
    $input_location = trim($_POST["location"]);
    if (empty($input_location)) {
        $location_err = "Please enter a location.";
    } else {
        $location = $input_location;
    }

    // Check input errors before inserting in database
    if (empty($name_err) && empty($email_err) && empty($phone_err) && empty($date_err) && empty($time_err) && empty($people_err) && empty($message_err) && empty($location_err)) {
        // Prepare an insert statement
        $sql = "INSERT INTO reservations (name, email, phone, date, time, people, message, location) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

        if ($stmt = mysqli_prepare($link, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssssssss", $param_name, $param_email, $param_phone, $param_date, $param_time, $param_people, $param_message, $param_location);

            // Set parameters
            $param_name = $name;
            $param_email = $email;
            $param_phone = $phone;
            $param_date = $date;
            $param_time = $time;
            $param_people = $people;
            $param_message = $message;
            $param_location = $location;

            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                // Records created successfully. Redirect to landing page
                header("location: index.php");
                exit();
            } else {
                echo "Something went wrong. Please try again later.";
            }
        }

        // Close statement
        mysqli_stmt_close($stmt);
    }

    // Close connection
    mysqli_close($link);
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/7f76cc6e18.js" crossorigin="anonymous"></script>
    <script src="index.js"></script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CeeJay's Car Hire</title>
</head>

<body>
    <header class="header_container" id="header_container">
        <div class="top_header" id="top_header">
            <div class="header_img" id="header_id">
                <a href="index.html"><img src="images/logo.png" alt="CeeJays Car Hire" id="logo"></a>
            </div>
        </div>
        <div class="nav_bar" id="nav_bar">

            <a href="index.php">HOME</a>
            <a href="hire.php">HIRE A CAR!</a>
            <a href="policy.html">HIRE POLICY</a>
            <a href="about.html">ABOUT US</a>
            <a href="contact.html">CONTACT US</a>
            <a href="javascript:void(0);" class="icon" onclick="myFunction()">
                <i class="fa fa-bars"></i></a>
        </div>

        </div>

    </header>

    <div class="content_container" id="content_container">
        <div class="intro" id="intro" style="background-image: url('images/pano.jpg') ; background-size:cover;">
            <h1 style="color: aqua;">Welcome to CeeJay's Car Hire</h1>
            <p style="color: #00bfff;">Whether day or night, we got you covered on transport from self-driven cars to
                chaufferd <br>Travelling
                in/out of the country, contact us for the best airport transfer services in Nairobi.<br> We, at CeeJay's
                Car Hire, ensure you get the best value for money.
            </p>
            <br>
            <div class="car_slide" id="car_slide">
                <div class="car_slide_img fade">
                    <div class="numbertext">1 / 4</div>
                    <img src="images/car_slide/car1.jpg" style="width:550px; height: 400px">
                </div>
                <div class="car_slide_img fade">
                    <div class="numbertext">2 / 4</div>
                    <img src="images/car_slide/car2.jpg" style="width:550px; height: 400px;">
                </div>
                <div class="car_slide_img fade">
                    <div class="numbertext">3 / 4</div>
                    <img src="images/car_slide/car3.jpg" style="width:550px; height:400px">
                </div>
                <div class="car_slide_img fade">
                    <div class="numbertext">4 / 4</div>
                    <img src="images/car_slide/car4.jpg" style="width:550px; height: 400px">
                </div>
            </div>
            <br>
            <div style="text-align:center">
                <span class="dot"></span>
                <span class="dot"></span>
                <span class="dot"></span>
                <span class="dot"></span>
            </div>
        </div>

        <div class="content" id="content">
            <div class="serv">
                <h2>Our Services</h2>
                <p>Our cars are available for the following services:
                <ul class="services" id="services">
                    <li>Airport Transfers</li>
                    <li>Chauffeured Cars</li>
                    <li>Self-Driven Cars </li>
                    <li>Hotel Transfers</li>
                </ul>
                </p>
            </div>
            <br>
            <div class="reservation" id="reservation">
                <h2 style="text-align: center;">Send a reservation</h2>
            </div>
            <div class="form_container">
                <form method="post" target="_self">
                    <div class="row">
                        <div class="col-25">
                            <label for="name">Name:</label>
                        </div>
                        <div class="col-75">
                            <input type="text" name="name" id="name" placeholder="Enter your name" class="form-control" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-25">
                            <label for="email">Email:</label>
                        </div>
                        <div class="col-75">
                            <input type="email" name="email" id="email" placeholder="Enter your email" class="form-control" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-25">
                            <label for="phone">Phone:</label>
                        </div>
                        <div class="col-75">
                            <input type="number" name="phone" id="phone" placeholder="Enter your phone number" class="form-control" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-25">
                            <label for="date">Date:</label>
                        </div>
                        <div class="col-75">
                            <input type="date" name="date" id="date" placeholder="Enter your date" class="form-control" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-25">
                            <label for="time">Time:</label>
                        </div>
                        <div class="col-75">
                            <input type="time" name="time" id="time" placeholder="Enter your time" class="form-control" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-25">
                            <label for="people">People:</label>
                        </div>
                        <div class="col-75">
                            <input type="number" name="people" id="people" placeholder="Enter the number of people" class="form-control" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-25">
                            <label for="car">Car:</label>
                        </div>
                        <div class="col-75">
                            <select name="car" id="car" class="form-control" required>
                                <option value="">Select a car</option>
                                <option value="Toyota">Toyota</option>
                                <option value="Honda">Honda</option>
                                <option value="Nissan">Nissan</option>
                                <option value="Mercedes">Mercedes</option>
                                <option value="BMW">BMW</option>
                                <option value="Audi">Audi</option>
                                <option value="Ford">Ford</option>
                                <option value="Volkswagen">Volkswagen</option>
                                <option value="Chevrolet">Chevrolet</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-25">
                            <label for="location">Location:</label>
                        </div>
                        <div class="col-75">
                            <input type="text" name="location" id="location" placeholder="Enter your location" class="form-control" required>
                        </div>
                    </div>
                    <div class="row">
                        <input type="submit" value="Submit">
                    </div>
                </form>
            </div>


        </div>

    </div>



    <!-- Footer -->
    <footer class="text-center text-lg-start text-white" style="background-color: #1c2331">
        <!-- Section: Social media -->
        <section class="d-flex justify-content-between p-4" style="background-color: #6351ce">
            <!-- Left -->
            <div class="me-5">
                <span>Get connected with us on social networks:</span>
            </div>
            <!-- Left -->

            <!-- Right -->
            <div>
                <a href="" class="text-white me-4">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a href="" class="text-white me-4">
                    <i class="fab fa-google"></i>
                </a>
                <a href="https://www.instagram.com/cejays__carhire/" class="text-white me-4">
                    <i class="fab fa-instagram"></i>
                </a>
            </div>
            <!-- Right -->
        </section>
        <!-- Section: Social media -->

        <!-- Section: Links  -->
        <section class="">
            <div class="container text-center text-md-start mt-5">
                <!-- Grid row -->
                <div class="row mt-3">
                    <!-- Grid column -->
                    <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                        <!-- Content -->
                        <h6 class="text-uppercase fw-bold">CeeJay's Car Hire</h6>
                        <hr class="mb-4 mt-0 d-inline-block mx-auto" style="width: 60px; background-color: #7c4dff; height: 2px" />
                        <p>
                           We are proud to serve your needs in and around Nairobi. Reach us at the following numbers: <br> +254712345678 
                        </p>
                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
                        <!-- Links -->
                        <h6 class="text-uppercase fw-bold">Products</h6>
                        <hr class="mb-4 mt-0 d-inline-block mx-auto" style="width: 60px; background-color: #7c4dff; height: 2px" />
                        <p>
                            <a href="#!" class="text-white">Airport Transfers</a>
                        </p>
                        <p>
                            <a href="#!" class="text-white">Hotel Transfers</a>
                        </p>
                        <p>
                            <a href="#!" class="text-white">Hire Services</a>
                        </p>
                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
                        <!-- Links -->
                        <h6 class="text-uppercase fw-bold">Useful links</h6>
                        <hr class="mb-4 mt-0 d-inline-block mx-auto" style="width: 60px; background-color: #7c4dff; height: 2px" />
                        <p>
                            <a href="#!" class="text-white">WhatsApp us!</a>
                        </p>
                        <!-- <p>
                            <a href="#!" class="text-white">Become an Affiliate</a>
                        </p>
                        <p>
                            <a href="#!" class="text-white">Shipping Rates</a>
                        </p>
                        <p>
                            <a href="#!" class="text-white">Help</a>
                        </p> -->
                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                        <!-- Links -->
                        <h6 class="text-uppercase fw-bold">Contact</h6>
                        <hr class="mb-4 mt-0 d-inline-block mx-auto" style="width: 60px; background-color: #7c4dff; height: 2px" />
                        <p><i class="fas fa-home mr-3"></i>Nairobi, Kenya</p>
                        <p><i class="fas fa-envelope mr-3"></i> ceejays@gmail.com</p>
                        <p><i class="fas fa-phone mr-3"></i> +254712345678</p>
                    </div>
                    <!-- Grid column -->
                </div>
                <!-- Grid row -->
            </div>
        </section>
        <!-- Section: Links  -->

        <!-- Copyright -->
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2)">
            © 2022 Copyright:
            <a class="text-white" href="https://mdbootstrap.com/">MDBootstrap.com</a>
        </div>
        <!-- Copyright -->
    </footer>
    <!-- Footer -->















</body>

<script>
    let slideIndex = 0;
    showSlides();

    function showSlides() {
        let i;
        let slides = document.getElementsByClassName("car_slide_img");
        let dots = document.getElementsByClassName("dot");
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        slideIndex++;
        if (slideIndex > slides.length) {
            slideIndex = 1
        }
        for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" active", "");
        }
        slides[slideIndex - 1].style.display = "block";
        dots[slideIndex - 1].className += " active";
        setTimeout(showSlides, 2000); // Change image every 2 seconds
    }
</script>


</html>