<!DOCTYPE html>

<html>
    <head>
        <title> Utopia Clinic </title>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="./../includes/styles.css">
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
        <div class="head-dashboard">
            <div class="head-dashboard-left">
                <img src="../images/logo2.png">
                <h3> Utopia Clinic </h3>
            </div> 
            <div class="head-dashboard-right small-nav">
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
                    </div>
                    <div class="profile-modal-content" <?php echo $styleS;?>>
                        <img src=".<?php echo $_SESSION['profilePic']?>">
                        <p> <?php echo $fisrtName;?> </p>
                        <a <?php echo $link;?>> Dashboard <a>
                        <a href="../Server/logout.php">Logout</a>
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
    </header>

    <body class="body-dashboard">
       <nav>
            <div class="side-nav">
                <ul>
                    <li> <i class="fa fa-home fa-2x" aria-hidden="true"></i> <a href="../home.php" class="home-anker"> Home </a> </li>
                    <li> <i class="fa fa-user fa-2x" aria-hidden="true"></i> <a href="#Profile"> Profile </a> </li>
                    <li> <i class="fa fa-tasks fa-2x" aria-hidden="true"></i> <a href="#Tasks"> Tasks </a> </li>
                    <li> <i class="fa fa-tasks fa-2x" aria-hidden="true"></i> <a href="#AskaDoctor"> Ask a Doctor </a> </li>
                </ul>
            </div>
        </nav>

        <main>
            <div class="body-container" id="Tasks"> 
               <div class="body-container-top">
                   <h1> Tasks </h1>
               </div>
               <div class="body-container-bottom">
                   <div class="tabs"> 
                       <a href="#DailyTasks"> Daily Tasks</a>
                   </div>
                   <div class="head">
                       <h3> </h3>
                       <input type="text" placeholder="Search">
                   </div>
               </div>
            </div> 
            
            <div class="body-container" id="Profile"> 
                <div class="body-container-top">
                    <h1> Profile </h1>
                </div>

                <div class="body-container-bottom">
                    <div class="profile-container">
                        <img src=".<?php echo $_SESSION['profilePic']?>" alt="profilePicture">
                        <div class="profile-container-bottom">
                            <h1>Profile</h1>
                            <h2><?php echo $_SESSION['Fname']?></h2>
                            <h2>Speciality</h2>
                            <div class="Speciality">
                            </div>
                            <h4>Experience: 22 years</h4>
                            <h4>Language: English Spanish</h4>
                            <h4>Rating</h4>
                        </div>
                    </div>    
                </div>
            </div>

            <div class="body-container" id="AskaDoctor"> 
                <div class="body-container-top">
                    <h1> Ask a Doctor </h1>
                </div>
                <div class="body-container-bottom">
                    <div class="tabs"> 
                        
                    </div>
                    <div class="head">
                        <h3> </h3>
                        <input type="text" placeholder="Search">
                    </div>

                        <form class="ask-doc">
                            <label for = "PatientQuestion"> Patient Question </label>
                            <input type = "text" name=" PatientQuestion" id="name" placeholder="write answer here" class="text">
                            <button type = "button" class="validate"> SEND ANSWER</button> 
                        </form>
                                          
                </div>
             </div> 
        </main>
        <script src="./../includes/script.js"></script>
    </body>
   
</html>

