<!DOCTYPE html>

<html>

<head>
    <title> Utopia Clinic </title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="./includes/styles.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <?php 
        session_start();
        if (isset($_SESSION['email'])) {
            if ($_SESSION['accType'] == "Doctor") {
                $link = "href='./doctor/dashboard.php'";
            } else if ($_SESSION['accType'] == "Admin") {
                $link = "href='./doctor/dashboard.php'";
            } else {
                $link = "style='display:none';";
            }
            $fisrtName = $_SESSION['Fname'];
            $styleH = "style='display:none';";
            $styleS = "style='display:flex';";
        } else {
            $styleH = "style='display:flex';";
            $styleS = "style='display:none';";
        }
    ?>
</head>

<header>
    <div class="head-home">
        <div class="info">
            <i class="fa fa-phone fa-lg" aria-hidden="true"> 01028877643 </i>
            <i class="fa fa-map-marker fa-lg" aria-hidden="true"> Mokattam </i>
            <i class="fa fa-clock-o fa-lg" aria-hidden="true"> 6:00am to 4:00pm</i>
        </div>
        <div class="small-nav">
            <i class="fa fa-user fa-2x profile" aria-hidden="true"></i>
            <div class="profile-modal">
                <div class="sign-in-form" <?php echo $styleH;?>>
                    <h2> Sign in </h2>
                    <form method="POST" name="Sign-in" action="./Server/loginRegister.php">
                        <label for="sign-in-email"> E-mail: </label>
                        <input type="text" name="sign-in-email" id="sign-in-email" class="email">
                        <label for="sign-in-password"> Password: </label>
                        <input type="password" name="sign-in-password" id="sign-in-password" class="pass">
                        <input type="button" name="login" value="Sign in" class="btn btn1 sign-btn validate" style="cursor: pointer; margin-top: 20px;">
                    </form>
                    <a href="./Sign-up.php" class="btn btn1"> Sign up</a>
                </div>
                <div class="profile-modal-content" <?php echo $styleS;?>>
                    <img src="<?php echo $_SESSION['profilePic']?>">
                    <p> <?php echo $fisrtName;?> </p>
                    <a <?php echo $link;?>> Dashboard <a>
                    <a href="./Server/logout.php">Logout</a>
                </div>
            </div>
            <i class="fa fa-bell-o fa-2x notification" aria-hidden="true">
                <div class="notification-icon">
                    <!-- Dynamic generated --> 1
                </div>
            </i>
            <div class="notification-modal">
                <h2> Notifications </h2>
                <!-- Dynamic generated -->
                <div class="notification-item">
                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Aspernatur, deleniti.
                </div>
            </div>
        </div>
    </div>
    <nav>
        <div class="nav-container">
            <div class="nav-top">
                <img src="images/Utopia-logo.png">
                <div class="nav-elements">
                    <a href="./home.php"> Home </a>
                    <a href="./Offers.php"> Offers </a>
                    <a href="./AboutUs.php"> About Us </a>
                </div>
            </div>
            <div class="nav-center">
                <h1> About <span style="color: rgba(64, 224, 208, 0.78);"> Us </span> </h1>
            </div>
            <div class="nav-bottom">
                <div class="about-section">
                    <div class="content">
                        <p> Utopia Clinic is driven by a Team of Internet Pioneers with a demonstrated reputation of helping specialists use the most current advances and showcasing methodologies to develop their practices. In the wake of working with a huge number of specialists as customers, we chose to assemble the Utopia Web-based Application for one straightforward reason: Doctors urgently required it! </p>
                        <h2> Here are a few measurements you should think about your training: </h2>
                        <ul>
                            <li>98% of your patients call first before booking an arrangement.</li>
                            <li>Half of the patients who have decided not to keep visiting your training have done as such in view of an affair they have had with your front work area staff.</li>
                            <li>Over half of your promoting spend is being squandered on advertisement positions that don’t create a solitary new patient for your training.</li>
                            <li>Utopia tackles the issues that are presently influencing your training by giving you the apparatuses important to drive and change over more telephone calls to booked arrangements.</li>
                        </ul> <br>
                        <p class="more-text"> 
                            To start with, Utopia diminishes the measure of blown telephone calls happening at your front work area. The call recording highlights wipe out the mystery about what is being said between your patients and your staff individuals – and conveys exceedingly successful staff instructional courses. <br>
                            Next, Utopia enables you to quit sitting around idly and cash on publicizing or advancements that don’t have what it takes. Our application tracks where each call originates from, and gives you new places to advance your training. <br> 
                            At long last, Utopia incorporates FREE Marketing Consultation. Truth is stranger than fiction; when you enroll for Utopia it resembles procuring your very own group of Professional Marketers that will work with you at every turn to execute an advertising plan that will be both reasonable and powerful for your training.
                        </p>
                        <a class="read-more-btn"> Read more... </a>
                    </div>
                </div>
            </div>
        </div>  
    </nav>
</header>
<body>
    <main>
    </main>
    <script src="./includes/script.js"></script>
</body>

<footer>
    <div class="footer-top">
        <img src="images/Utopia-logo.png">
        <div class="social-icons">
            <p> Follow us -</p>
            <span class="icons"> <i class="fa fa-instagram fa-lg" aria-hidden="true"></i> </span>
            <span class="icons"> <i class="fa fa-facebook fa-lg" aria-hidden="true"></i> </span>
            <span class="icons"> <i class="fa fa-twitter fa-lg" aria-hidden="true"></i> </span>
            <span class="icons"> <i class="fa fa-google-plus fa-lg" aria-hidden="true"></i> </span>
        </div>
    </div>
    <div class="footer-bottom">
        <div>
            <h1> About Us </h1>
            <p> Lorem ipsum dolor sit amet consectetur, adipisicing elit. Accusantium esse eos velit aperiam vero iure quo ullam numquam molestiae ipsa aut obcaecati, illum eaque ipsum asperiores similique sint repellat ex.</p>
            <span class="icons"> <i class="fa fa-phone" aria-hidden="true"></i> <p> <span style="color: rgba(64, 224, 208, 0.692);"> Hotline: </span> </p>  </span>
            <span class="icons"> <i class="fa fa-map-marker" aria-hidden="true"></i> <p> <span style="color: rgba(64, 224, 208, 0.692);"> Address: </span> </p> </span>
            <span class="icons"> <i class="fa fa-clock-o" aria-hidden="true"></i> <p><span style="color: rgba(64, 224, 208, 0.692);"> Sat-Thurs: </span> </p></span>
        </div>
        <div>
            <h1> Explore </h1>
            <ul>
                <div style="display: flex; flex-direction: column;">
                    <li> <a href="./home.php"> Home </a> </li>
                    <li> <a href="./Offers.php"> Offers </a> </li>
                    <li> <a href="./AboutUs.php"> About Us </a> </li>
                    <li> <a href="./doctor/dashboard.php"> Dashboard Doctor </a> </li>
                </div>
                <div style="display: flex; flex-direction: column;">
                    <li> <a href="./Reservation1.php"> Reservation </a> </li>
                    <li> <a href="./AskDoctor.php"> Ask a Doctor </a> </li>
                    <li> <a href="./admin/dashboard.php"> Dashboard Admin </a> </li>
               </div>
            </ul>
        </div>
        <div>
            <h1> Recent News </h1>
        </div>
    </div>
</footer>
</html>