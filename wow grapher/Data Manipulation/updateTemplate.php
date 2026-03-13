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
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Template</title>
    <style>
        /* Global Styles */
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        body {
            background-color: #f8f9fa;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        /* Form Styles */
        .form-container {
            max-width: 500px;
            padding: 40px;
            border-radius: 10px;
            background-color: #fff;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }

        .form-header {
            text-align: center;
            margin-bottom: 30px;
        }

        .form-header h2 {
            color: #007bff;
            margin-bottom: 10px;
        }

        /* Form Inputs Styles */
        .form-control {
            width: 100%;
            padding: 12px;
            margin-bottom: 20px;
            border: 1px solid #ced4da;
            border-radius: 5px;
            font-size: 16px;
            transition: border-color 0.3s;
        }

        .form-control:focus {
            outline: none;
            border-color: #007bff;
        }

        /* Form Button Styles */
        .btn-primary {
            width: 100%;
            padding: 12px;
            border: none;
            border-radius: 5px;
            background-color: #007bff;
            color: #fff;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        /* Table Styles */
        .table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        .table th,
        .table td {
            border: 1px solid #ced4da;
            padding: 10px;
            text-align: left;
        }

        .table th {
            background-color: #f8f9fa;
        }
    </style>
</head>

<body>

    <div class="form-container">
        <div class="form-header">
            <h2>Update Template</h2>
        </div>

        <?php
        if (isset($_GET["uid"])) {
            $id = $_GET["uid"];

            $gettingdata = "SELECT * FROM template WHERE id='$id'";
            $result = mysqli_query($connect, $gettingdata);

            if ($result && mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
                ?>

                <form action="updateTemplateList.php?uid=<?php echo $id; ?>" method="POST" enctype="multipart/form-data">
                    <table class="table">
                        <tr>
                            <th>Image : </th>
                            <td><input type="file" name='aimage' class="form-control"></td>
                        </tr>
                        <tr>
                            <th>Name : </th>
                            <td><input type="text" name='aname' class="form-control" value="<?php echo $row["name"]; ?>">
                            </td>
                        </tr>
                        <tr>
                            <th>Selected Orientation:</th>
                            <td>
                                <?php echo $row["orientation"]; ?>
                            </td>
                        </tr>
                        <tr>
                            <th>Orientation : </th>
                            <td>
                                <select name="orientation" id="orientation" class="form-control">
                                    <option value="select">--Select Your Orientation--</option>
                                    <option value="Portrait">Portrait</option>
                                    <option value="Landscape">Landscape</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <th>Selected Orcode:</th>
                            <td>
                                <?php echo $row["Orcode"]; ?>
                            </td>
                        </tr>
                        <tr>
                            <th>Orientation Code:</th>
                            <td><input type="text" id="assignedValue" name="orcode" pattern="[01]"
                                    title="Enter Landscape_code = 0 or portrait_code = 1" placeholder="Enter Orientation Code"
                                    required class="form-control"></td>
                        </tr>
                    </table>
                    <button type="submit" class="btn btn-primary" name="asubmit">Update</button>
                </form>

                <?php
            }
        }
        ?>
    </div>

</body>

</html>