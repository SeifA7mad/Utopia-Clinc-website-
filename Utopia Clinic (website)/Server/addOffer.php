<?php
    $database = mysqli_connect("localhost", "root", "", "utopiaclinic");
    if (!($database))
        die("<p>Could not connect to database </p>");

        $offerName = $_POST['offerName'];
        $offerDesc = $_POST['Description'];
        $offerDate = $_POST['offerDate'];
        $offerPrice = $_POST['offerPrice'];
        $Clinic_Lab_ID = $_POST['clinc_lab_ID'];

        $check = getimagesize($_FILES["image"]["tmp_name"]);

        if ($check !== false) {
            $image = $_FILES['image']['tmp_name'];
            $imgContent = addslashes(file_get_contents($image));
        }
        
        $query = "  INSERT INTO offer (OfferName, OfferDescription, OfferImage, OfferPrice, expireDate, Clinic_Lab_ID)
                    VALUES ('$offerName', '$offerDesc', '$imgContent', '$offerPrice', '$offerDate', '$Clinic_Lab_ID')";
        
        $result = mysqli_query($database, $query);

        mysqli_close($database);
        header("Location: ../admin/dashboard.php");
?>