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

            <a href="index.html">HOME</a>
            <a href="hire.html">HIRE A CAR!</a>
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
            <h2>Our Services</h2>
            <p>Our cars are available for the following services:
            <ul class="services" id="services">
                <li>Airport Transfers</li>
                <li>Chauffeured Cars</li>
                <li>Self-Driven Cars </li>
                <li>Hotel Transfers</li>

            </ul>
            </p>

            <div class="reservation" id="reservation">
                <div>
                    <h2>Send a reservation</h2>
                    <form action="" method="post">
                        <label for="name">Name:</label>
                        <input type="text" name="name" id="name" placeholder="Enter your name" class="form-control">
                        <label for="email">Email:</label>
                        <input type="email" name="email" id="email" placeholder="Enter your email" class="form-control">
                        <label for="phone">Phone:</label>
                        <input type="text" name="phone" id="phone" placeholder="Enter your phone number"class="form-control">
                        <label for="date">Date:</label>
                        <input type="date" name="date" id="date" placeholder="Enter your date"class="form-control">
                        <label for="time">Time:</label>
                        <input type="time" name="time" id="time" placeholder="Enter your time"class="form-control">
                        <label for="people">People:</label>
                        <input type="number" name="people" id="people" placeholder="Enter the number of people"class="form-control">
                        <label for="car">Car:</label>
                        <select name="car" id="car"class="form-control">
                            <option value="">Select a car</option>
                            <option value="1">Toyota</option>
                            <option value="2">Honda</option>
                            <option value="3">Nissan</option>
                            <option value="4">Mercedes</option>
                            <option value="5">BMW</option>
                            <option value="6">Audi</option>
                            <option value="7">Ford</option>
                            <option value="8">Volkswagen</option>
                            <option value="9">Chevrolet</option>
                            <option value="10">Dodge</option>
                            <option value="11">Jeep</option>
                            <option value="12">Fiat</option>
                            <option value="13">Citroen</option>
                            <option value="14">Peugeot</option>
                            <option value="15">Renault</option>
                        </select>
                        <label for="location">Location:</label>
                        <input type="text" name="location" id="location" placeholder="Enter your location"class="form-control">
                        <input type="submit" value="Submit">
                    </form>
                </div>

            </div>

        </div>














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
        if (slideIndex > slides.length) { slideIndex = 1 }
        for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" active", "");
        }
        slides[slideIndex - 1].style.display = "block";
        dots[slideIndex - 1].className += " active";
        setTimeout(showSlides, 2000); // Change image every 2 seconds
    }
</script>


</html>