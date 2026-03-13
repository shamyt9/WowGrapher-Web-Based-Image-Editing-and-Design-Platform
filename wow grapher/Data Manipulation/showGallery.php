<?php

include "../include/connection.php";
$gettingdata = "SELECT * FROM gallery";
$result = mysqli_query($connect, $gettingdata);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- bootstrap link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>


    <title>Document</title>
</head>

<body>

    <div class="container-fluid">
        <div class="row">
            <table class="table bordered">

                <tr>
                    <th>SR.No</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Creator</th>
                    <th>Likes</th>
                    <th>Upload Date</th>
                    <th>EDIT</th>
                    <th>Remove</th>
                </tr>
                <?php

                if ($result) {
                    if (mysqli_num_rows($result) > 0) {
                        $n = 1;
                        while ($row = mysqli_fetch_assoc($result)) { ?>
                            <tr>
                                <td>
                                    <?php echo $n; ?>
                                </td>
                                <td><img src='../backendimages/<?php echo $row["gallery_image"]; ?>' alt="" height="75px"></td>
                                <td>
                                    <?php echo $row["galery_image_name"]; ?>
                                </td>
                                <td>
                                    <?php echo $row["creator"]; ?>
                                </td>
                                <td>
                                    <?php echo $row["image_likes"]; ?>
                                </td>
                                <td>
                                    <?php echo $row["entry_date"]; ?>
                                </td>

                                <td><a href='updateTemplate.php?uid=<?php echo $row["id"]; ?>' class="btn btn-warning"
                                        name="update">UPDATE</a></td>

                                <td><a href="removeGalleryImage.php?id=<?php echo $row["gallery_id"]; ?>" class="btn btn-danger"
                                        name="delete">Delete</a>
                                </td>
                            </tr>


                            <?php

                            $n++;
                        }
                    }
                }
                ?>
            </table>
        </div>
    </div>







</body>

</html>