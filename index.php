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
                    <form action="reservation.php" method="post">
                        <label for="name">Name:</label>
                        <input type="text" name="name" id="name" placeholder="Enter your name">
                        <label for="email">Email:</label>
                        <input type="email" name="email" id="email" placeholder="Enter your email">
                        <label for="phone">Phone:</label>
                        <input type="text" name="phone" id="phone" placeholder="Enter your phone number">
                        <label for="date">Date:</label>
                        <input type="date" name="date" id="date" placeholder="Enter your date">
                        <label for="time">Time:</label>
                        <input type="time" name="time" id="time" placeholder="Enter your time">
                        <label for="people">People:</label>
                        <input type="number" name="people" id="people" placeholder="Enter the number of people">
                        <label for="car">Car:</label>
                        <select name="car" id="car">
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
                        <input type="text" name="location" id="location" placeholder="Enter your location">
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