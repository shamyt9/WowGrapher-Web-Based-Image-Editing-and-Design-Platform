<?php

include "../include/connection.php";




$gettingdata = "SELECT * FROM accounttable";
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
                    <th>Name</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>Images</th>

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
                                <td>
                                    <?php echo $row["name"]; ?>
                                </td>
                                <td>
                                    <?php echo $row["email"]; ?>
                                </td>
                                <td>
                                    <?php echo $row["userPassword"]; ?>
                                </td>
                                <td>
                                    <img src="../backendimages/<?php echo $row["image"]; ?>" alt="" height="85px">
                                </td>



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