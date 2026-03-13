<?php
include ("../include/connection.php");
$selected = $_POST['selected'];
if ($selected == 'all' || $selected == '') {
    $gettingdata = "SELECT * FROM template";
    $result = mysqli_query($connect, $gettingdata);
} elseif ($selected == 'portrait') {
    $gettingdata = "SELECT * FROM template WHERE Orcode=1";
    $result = mysqli_query($connect, $gettingdata);
} else {
    $gettingdata = "SELECT * FROM template WHERE Orcode=0";
    $result = mysqli_query($connect, $gettingdata);
}

$output = "";
if ($result) {
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {

            $output .= '<div class="col-xl-3 col-lg-3 col-md-6  template-cards">
            <a href="createIdCard.php" style="text-decoration:none; color:white;">
                <div class="card">
                    <img src="backendimages/' . $row["image"] . '" class="card-img-top" alt="...">
                    <div class="card-body">
                        <p class="card-text">
                            ' . $row["name"] . '
                        </p>
                    </div>
                </div>

            </a>
        </div>';

        }

    } else {
        $output = '<p>No Data Found</p>';
    }

} else {
    echo "Error: " . mysqli_error($connect);
}
echo $output;
?>