<?php 
 include 'DB.php';

 //$clinicID = val($_POST["ClinicalID"]);

$Address = val($_POST["Address"]);
$Symptoms = val($_POST["selectReservation"]);
$FurtherInfo = val($_POST["FurtherInfo"]);
$date =val($_POST["date"]);

function val($data){
	$data= trim($data);
	$data=stripslashes($data);
	$data= htmlspecialchars($data);
	return $data;
}
echo  $Address.$Symptoms.$FurtherInfo.$date ;
	

 		$sql= "INSERT INTO reservation (ReservationID, Clinic_Lab_ID, Patient_ssn, Syptoms, Date, Time, Type, Address, furtherInfo) VALUES
		 ('', '2', '6', '$Symptoms', '$date', '', 'Home Reservation', '$Address', '$FurtherInfo');";
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
