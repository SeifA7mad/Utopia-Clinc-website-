<!DOCTYPE html>

<html>

<head>
    <title> Utopia Clinic </title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="./../includes/styles.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
                <div class="sign-in-form">
                    <h2> Sign in </h2>
                    <form name="Sign-in">
                        <label for="sign-in-email"> E-mail: </label>
                        <input type="text" name="sign-in-email" id="sign-in-email" class="email">
                        <label for="sign-in-password"> Password: </label>
                        <input type="password" name="sign-in-password" id="sign-in-password" class="pass">
                        <input type="button" name="button" value="Sign in" class="btn btn1 sign-btn validate" style="cursor: pointer; margin-top: 20px;">
                    </form>
                    <a href="./Sign-up.htmphpl" class="btn btn1"> Sign up</a>
                </div>
                <div class="profile-modal-content">
                    <img src="./images/profilePicture.png">
                    <p> </p>
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
</header>

<body class="body-dashboard">
    <nav>
        <div class="side-nav">
            <ul>
                <li> <i class="fa fa-home fa-2x" aria-hidden="true"></i> <a href="../home.php" class="home-anker"> Home </a> </li>
                <li> <i class="fa fa-user fa-2x" aria-hidden="true"></i> <a href="#Profile"> Profile </a> </li>
                <li> <i class="fa fa-file-text fa-2x" aria-hidden="true"></i> <a href="#Report"> Report </a> </li>
                <li> <i class="fa fa-archive fa-2x" aria-hidden="true"></i> <a href="#Archive"> Archive </a> </li>
            </ul>
        </div>
    </nav>

    <main>
        <div class="body-container" id="Archive">
            <div class="body-container-top">
                <h1> Archive </h1>
            </div>
            <div class="body-container-bottom">
                <div class="tabs">
                    <a href="#Patients"> PATIENTS </a>
                    <a href="#Doctors"> DOCTORS </a>
                    <a href="#Offers"> OFFERS </a>
                </div>
                <div class="head">
                    <h3> </h3>
                    <input type="text" placeholder="Search">
                </div>
            </div>
        </div>

        <div class="body-container" id="Report">
            <div class="body-container-top">
                <h1> Report </h1>
            </div>
            <div class="body-container-bottom">
                <div class="tabs">
                    <a href="#Daily"> Daily Report </a>
                    <a href="#Weekly"> Weekly Report </a>
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
                    <img src="../images/profilePicture.png" alt="profilePicture">
                    <div class="profile-container-bottom">
                        <h1>Profile</h1>
                        <h2>Welcome Admin name</h2>
                        <h2>Email: admin@mycompany.com</h2>
                        <h2>Phone: 01025485663</h2>
                        <h2>Position: Manager</h2>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <div class="add-form" id="form-Doctors">
        <form>
            <i class="fa fa-times fa-2x" aria-hidden="true" onclick="closeForm()"></i>
            <h1> Enter Doctor Information </h1>
            <label for="name"> name</label>
            <input type="text" name="name" placeholder="Enter name" class=text>
            <label for="age"> Age</label>
            <input type="text" name="age" placeholder="Enter age" class="num">
            <label for="gender"> Gender</label>
            <input type="text" name="gender" placeholder="Enter gender" class="text">
            <label for="phoneNum"> Phone number</label>
            <input type="text" name="phoneNum" placeholder="Enter phone number" class="num">
            <label for="email"> Email</label>
            <input type="text" name="email" placeholder="Enter Email" class="email">
            <label for="adress"> Address</label>
            <input type="text" name="adress" placeholder="Enter Address" class="text">
            <label for="password"> Password </label>
            <input type="text" name="password" placeholder="Enter password" class="pass">
            <label for="speciality"> Medical Speciality</label>
            <input type="text" name="speciality" placeholder="Enter Medical Speciality" class="text">

            <button type="button" class="validate"> Add Doctor </button>
        </form>
    </div>
    <div class="add-form" id="form-Offers">
        <form method="POST" enctype="multipart/form-data" action="../Server/addOffer.php">
            <i class="fa fa-times fa-2x" aria-hidden="true" onclick="closeForm()"></i>
            <h1> Enter Offer Information </h1>
            <label for="offerName"> Offer name</label>
            <input type="text" name="offerName" placeholder="Enter name" class="text">
            <label for="Description"> Offer description</label>
            <input type="text" name="Description" placeholder="Enter Description" class="text">
            <label for="date"> Offer date</label>
            <input type="date" name="offerDate" placeholder="Enter date">
            <label for="price"> Offer price</label>
            <input type="text" name="offerPrice" placeholder="Enter price" class="num">
            <select name="clinc_lab_ID">
            </select>
            <label for="image"> Offer Image </label>
            <input type="file" name="image" placeholder="uploud image">
            <button type="button" name="sumbitOffer" class="validate"> Add Offer</button>
        </form>
    </div>
    <script src="./../includes/script.js"></script>
</body>

</html>