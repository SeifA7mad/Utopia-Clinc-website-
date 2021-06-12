<?php 
	include 'DB.php';

$clincNumber = val($_POST["clincNumber"]);
$date=val($_POST["date"]);
$Symptoms = val($_POST["selectReservation"]);
$FurtherInfo = val($_POST["FurtherInfo"]);
//$time =val($_POST["time"]);

function val($data){
	$data= trim($data);
	$data=stripslashes($data);
	$data= htmlspecialchars($data);
	return $data;
}
	//echo $clincNumber.$Symptoms.$FurtherInfo.$date ;
$sql= "INSERT INTO reservation (ReservationID, Clinic_Lab_ID, Patient_ssn, Syptoms, Date, Time, Type, Address, furtherInfo) VALUES
		 ('', '1', '5', '$Symptoms', '$date', '', 'Clinic Reservation', '', '$FurtherInfo');";
				//$result = mysqli_query($conn,$sql);
		if($conn->query($sql)==TRUE){
			echo "New record added successfully ";
		}
		else{
			echo "0 results";

		}
	//$resultCheck = mysqli_num_rows($result);


$conn->close();


	



?>