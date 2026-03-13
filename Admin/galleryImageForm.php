<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Add Image to Gallery</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(to right, #2c3e50, #3498db);
            color: #fff;
            padding: 50px;
            /* Increased padding */
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            /* Set height to fill viewport */
        }

        #container {
            background-color: rgba(255, 255, 255, 0.1);
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.3);
            /* Increased shadow */
            display: flex;
            max-width: 2000px;
            height: 700px;
        }

        form {
            flex: 1;
            /* Occupy remaining space */
            padding: 30px;
            /* Increased padding */
        }

        label {
            display: block;
            margin-bottom: 15px;
            /* Increased margin */
            font-size: 18px;
            /* Increased font size */
        }

        input[type='text'],
        input[type='file'] {
            width: calc(100% - 20px);
            /* Adjusted width */
            padding: 15px;
            /* Increased padding */
            margin-bottom: 20px;
            /* Increased margin */
            border: none;
            border-radius: 8px;
            background-color: rgba(255, 255, 255, 0.8);
            color: #333;
            box-sizing: border-box;
            font-size: 16px;
            /* Increased font size */
        }

        .custom-file-upload {
            display: inline-block;
            padding: 15px 20px;
            /* Increased padding */
            background-color: #3498db;
            color: #fff;
            border: none;
            border-radius: 8px;
            cursor: pointer;
        }

        .custom-file-upload:hover {
            background-color: #2980b9;
        }

        input[type='file'] {
            display: none;
            /* Hide default file input */
        }

        input[type='submit'] {
            background-color: #27ae60;
            color: #fff;
            padding: 15px 25px;
            /* Increased padding */
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 18px;
            /* Increased font size */
        }

        input[type='submit']:hover {
            background-color: #219653;
        }

        .preview-container {
            padding: 20px;
            width: 300px;
            /* Set width for preview container */
            border-left: 2px dashed rgba(255, 255, 255, 0.5);
            /* Added border */
        }

        .preview-container p {
            font-size: 20px;
            margin-bottom: 15px;
        }

        .preview-container img {
            max-width: 100%;
            max-height: 300px;
        }
    </style>
</head>

<body>
    <div id="container">
        <form action="saveGalleryImage.php" method="post" enctype="multipart/form-data">
            <h2 style="text-align: center">Add Image to Gallery</h2>

            <label for="image">Select Image:</label>
            <label class="custom-file-upload" for="image">Choose File</label>
            <input type="file" id="image" name="Gimage" accept="image/*" required />

            <label for="name">Name:</label>
            <input type="text" id="name" name="Gname" required />

            <label for="created_by">Created By:</label>
            <input type="text" id="created_by" name="Gcreated_by" required />

            <input type="submit" value="Submit" name="Gsubmit" />
        </form>

        <div class="preview-container" id="preview-container">
            <p>Selected Image Preview</p>
            <img id="preview-image" src="#" alt="Selected Image" style="display: none" />
        </div>
    </div>

    <script>
        const fileInput = document.getElementById('image');
        const previewImage = document.getElementById('preview-image');
        const previewContainer =
            document.getElementById('preview-container');

        fileInput.addEventListener('change', function () {
            const file = this.files[0];

            if (file) {
                const reader = new FileReader();

                reader.onload = function () {
                    previewImage.src = reader.result;
                    previewImage.style.display = 'block';
                };

                reader.readAsDataURL(file);
                previewContainer.style.display = 'block';
            } else {
                previewImage.style.display = 'none';
                previewContainer.style.display = 'none';
            }
        });
    </script>
</body>

</html>