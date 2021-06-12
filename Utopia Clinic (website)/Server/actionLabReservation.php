<?php 
	include 'DB.php';

$testReservation = val($_POST["testReservation"]);
$date=val($_POST["date"]);
$FurtherInfo = val($_POST["FurtherInfo"]);


function val($data){
	$data= trim($data);
	$data=stripslashes($data);
	$data= htmlspecialchars($data);
	return $data;
}
	//echo $testReservation ;
$sql= "INSERT INTO reservation (ReservationID, Clinic_Lab_ID, Patient_ssn, Syptoms, Date, Time, Type, Address, furtherInfo) VALUES
		 ('', '1', '5', '', '$date', '', 'Lab Reservation', '', '$FurtherInfo');";
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