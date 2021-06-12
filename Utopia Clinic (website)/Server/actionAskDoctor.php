<?php 
	include 'DB.php';


$question=val($_POST["issue"]);


function val($data){
	$data= trim($data);
	$data=stripslashes($data);
	$data= htmlspecialchars($data);
	return $data;
}
	echo $question;
$sql = "INSERT INTO q&a(`QandA_ID`, question, Patient_ssn, Answer, Doctor_ssn) VALUES
		 ('', '$question', '', '', '');";
				//$result = mysqli_query($conn,$sql);
		if($conn->query($sql)==TRUE){
			echo "New record added successfully ";
		}
		else{
			echo "0 results";

		}
	


$conn->close();


	



?>