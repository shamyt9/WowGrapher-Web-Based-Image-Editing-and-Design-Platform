<?php
session_start();
include ("../include/connection.php");

//for likes count per image


$sessionId = $_SESSION['id'];

// Start building the output variable
$output = "";

// Fetch data from the database
$gettingdata = "SELECT * FROM gallery";
$result = mysqli_query($connect, $gettingdata);

if ($result) {
    // Loop through each row in the result set
    while ($row = mysqli_fetch_assoc($result)) {
        // Check if the user has liked this image
        $liked = false;
        $likesData = "SELECT * FROM likes WHERE id = '$sessionId' AND gallery_id = '{$row['gallery_id']}'";
        $executeLikes = mysqli_query($connect, $likesData);
        if ($executeLikes && mysqli_num_rows($executeLikes) > 0) {
            $liked = true;
        }
        $likesDatacount = "SELECT * FROM likes where  gallery_id = '{$row['gallery_id']}'";
        $countLikeExecute = mysqli_query($connect, $likesDatacount);
        $totalLikes = mysqli_num_rows($countLikeExecute);


        // Determine the class for the like icon based on whether the user has liked the image
        $class = $liked ? "fa-solid" : "fa-regular";

        // Concatenate HTML for each row to the $output variable
        $output .= '<div class="image">
                        <i class="' . $class . ' fa-heart like-icon" data-id="' . $row['gallery_id'] . '" title="Like"></i>
                        <img src="backendimages/' . $row["gallery_image"] . '" alt="Image 1">
                        <div class="textElement">
                            <p>' . $row["galery_image_name"] . '</p>
                            <div class="creatorLikes">
                                <p class="btn btn-primary">Created by: ' . $row["creator"] . '</p>
                                <p class="btn btn-danger p-1 text-light">Likes: ' . $totalLikes . '</p>
                            </div>
                        </div>
                    </div>';
    }

    // Output the concatenated HTML
    echo $output;
} else {
    // Handle errors
    echo "Error: " . mysqli_error($connect);
}
?>