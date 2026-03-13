<?php
include ("../include/connection.php");
$searched = $_POST['search'];
$gettingdata = "SELECT * FROM template WHERE name LIKE '%{$searched}%' ";
$result = mysqli_query($connect, $gettingdata);
$output = "";
if ($result) {
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
    echo "Error: " . mysqli_error($connect);
}
echo $output;
?>