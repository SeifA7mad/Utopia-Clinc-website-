<!DOCTYPE html>
<html lang="en">
	<head>
		<title> Utopia Clinic </title>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="./includes/styles.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
					<div class="sign-in-form">
						<h2> Sign in </h2>
						<form name="Sign-in">
							<label for="sign-in-email"> E-mail: </label>
							<input type="text" name="sign-in-email" id="sign-in-email" class="email">
							<label for="sign-in-password"> Password: </label>
							<input type="password" name="sign-in-password" id="sign-in-password" class="pass">
							<input type="button" name="button" value="Sign in" class="btn btn1 sign-btn validate" style="cursor: pointer; margin-top: 20px;">
						</form>
						<a href="./Sign-up.php" class="btn btn1"> Sign up</a>
					</div>
					<div class="profile-modal-content">
						<img src="./images/profilePicture.png">
						<p> </p>
					</div>
				</div>
				<i class="fa fa-bell-o fa-2x notification" aria-hidden="true"> <div class="notification-icon"> <!-- Dynamic generated --> 1 </div> </i>
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
					<div class="topCon">
						<h1>Ask Doctor</h1>
						<p> Please Feel free to ask one of our doctors about your sever issue. </p>
					</div>
				</div>
				<div class="popup" id="popup-1">
					<div class="overlay"></div>
					<div class="contentPopUp">
					
					<h1>Confirmation</h1>
					<p> Your Comment Has been Saved and waiting for our doctors to reveiwe and we will be back soon</p>
					<button type="button"  name="button" id="Submit2"> <a href="./home.php"> Close </a> </button>
				</div>
					
			</div>
				<div class="nav-bottom">
					<div class="askadoctor-container">
						<input type="text" id="input" placeholder="write your issue">
						<div class="buttons">
							<button type="button" name="button" id="cancel">cancel</button>
							<button type="button" name="button" onclick= "myFunciotn()"id="comment">comment </button>
						</div>
						<div class="boxContainer">
							<div class="box"></div>
						
							<button type="button" name="button" id="delete">delete</button>
							<button type="button"  name="button" id="Add">Add</button>
						</div>
					</div>
				</div>
			</div>   
		</nav>
	</header>

<body>
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