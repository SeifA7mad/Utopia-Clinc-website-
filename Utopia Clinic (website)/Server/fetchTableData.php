<?php
    //Make the connection with the sql database and store it in $database
    $database = mysqli_connect("localhost", "root", "", "utopiaclinic");
    if (!($database))
        die("<p>Could not connect to database </p>");

    session_start();

    if ($_GET["activeTab"] == "#Patients") {
        $query = "  SELECT patient.National_ID, Fname, Lname, DOB, PhoneNo, Gender 
                    FROM patient, user 
                    WHERE patient.National_ID = user.National_ID";
    } else if ($_GET["activeTab"] == "#Doctors") {
        $query = "  SELECT doctor.National_ID, Fname, Lname, DOB, PhoneNo, Gender, MedicalSpecialist, Address
                    FROM doctor, user 
                    WHERE doctor.National_ID = user.National_ID";
    } else if ($_GET["activeTab"] == "#Offers") {
        $query = " SELECT OfferID, OfferName, OfferDescription, OfferPrice, expireDate, Clinic_Lab_ID FROM offer";
    } else if ($_GET["activeTab"] == "#Daily") {
        $query = "SELECT ReservationID, p.Fname AS 'Patient Name', Specialty, Date, Time, Price, d.Fname AS 'Doctor Name'
                    FROM reservation, clinic_lab, user p, user d
                    WHERE p.National_ID = reservation.Patient_ssn 
                    AND reservation.Clinic_Lab_ID = clinic_lab.Clinic_Lab_ID 
                    AND clinic_lab.Doctor_ssn = d.National_ID 
                    AND Date = CURDATE();";
    } else if ($_GET["activeTab"] == "#Weekly") {
        $query = "SELECT ReservationID, p.Fname AS 'Patient Name', Specialty, Date, Time, Price, d.Fname AS 'Doctor Name'
                    FROM reservation, clinic_lab, user p, user d
                    WHERE p.National_ID = reservation.Patient_ssn 
                    AND reservation.Clinic_Lab_ID = clinic_lab.Clinic_Lab_ID 
                    AND clinic_lab.Doctor_ssn = d.National_ID 
                    AND Date < CURDATE();";
    } else if ($_GET["activeTab"] == "#DailyTasks") {
        $query = "SELECT ReservationID, Patient_ssn, Fname, Syptoms, Date, Time
                    FROM reservation, clinic_lab, user
                    WHERE reservation.Clinic_Lab_ID = clinic_lab.Clinic_Lab_ID AND reservation.Patient_ssn = user.National_ID
                    AND clinic_lab.Doctor_ssn = '.$_SESSION[ssn].' AND Date = CURDATE();";
    }

    $result = mysqli_query($database, $query);
    $array = array();

    while($row = mysqli_fetch_assoc($result)) {
        array_push($array, $row);
    }

    echo json_encode($array);
    mysqli_close($database);
?>