<?php 
	$database = mysqli_connect("localhost", "root", "", "utopiaclinic");
	session_start();
    if (!($database))
        die("<p>Could not connect to database </p>");

$clincNumber = $_POST["clincNumber"];
$Symptoms = $_POST["symptoms"];
$date= $_POST["date"];
$time = $_POST["time"];
$FurtherInfo = $_POST["FurtherInfo"];

if (isset($_SESSION['ssn'])) {
	$sql= "	INSERT INTO reservation (Clinic_Lab_ID, Patient_ssn, Syptoms, Date, Time, FurtherInfo)
	 		VALUES ('$clincNumber', '.$_SESSION[ssn].', '$Symptoms', '$date', '$time', '$FurtherInfo')";

		if(mysqli_query($database, $sql)){
			echo "New record added successfully ";
		}
		else{
			echo "0 results";

		}
	}
$database->close();

header("Location: ../home.php");
?>