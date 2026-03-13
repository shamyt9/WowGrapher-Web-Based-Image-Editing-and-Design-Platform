<?php
include "../include/connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $id = $_GET["uid"];
    $name = $_POST["aname"];
    $orientation = $_POST["orientation"];
    $orcode = $_POST["orcode"];

    // Check if file upload is successful
    if ($_FILES["aimage"]["error"] == UPLOAD_ERR_OK) {
        $image_tmp = $_FILES["aimage"]["tmp_name"];
        $image_name = $_FILES["aimage"]["name"];
        $image_path = "../backendimages/" . $image_name;

        // Move uploaded file to specified path
        move_uploaded_file($image_tmp, $image_path);

        // Update template in the database
        $update_query = "UPDATE template SET name='$name', orientation='$orientation', Orcode='$orcode', image='$image_name' WHERE id='$id'";
        $update_result = mysqli_query($connect, $update_query);

        if ($update_result) {
            echo "Template updated successfully.";
        } else {
            echo "Error updating template: " . mysqli_error($connect);
        }
    } else {
        echo "File upload failed.";
    }
} else {
    echo "Invalid request method.";
}
?>