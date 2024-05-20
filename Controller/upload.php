<?php

// $targetfolder = "./Assets/deThi/";
$targetfolder = "../Assets/deThi/";

$targetfolder = $targetfolder . $_POST['idTest'].'.pdf';
// $targetfolder = $targetfolder . basename($_FILES['fileToUpload']['name']);

$ok = 1;

$file_type = $_FILES['fileToUpload']['type'];

if ($file_type == "application/pdf") {

    if (move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $targetfolder)) {

        // echo "The file " . basename($_FILES['fileToUpload']['name']) . " is uploaded";
        echo "success";
    } else {

        echo "Problem uploading file";
    }
} else {

    echo "fail";
}
