<?php

include("include/connection.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>header</title>
    <!-- BOOTSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />




    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Merriweather', serif;
        }

        .header {
            display: flex;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            align-items: center;
            z-index: 100;
        }

        .navbar {

            width: 100%;
            justify-content: space-between;
            align-items: center;
            z-index: 1000;
            background-color: transparent;
            backdrop-filter: blur(25px);
            padding: 10px 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3), inset -2px -2px 1px white;
        }

        .navbar-brand {
            color: #000;
            font-size: 1.5rem;
            font-weight: bold;

        }

        .navbar-brand img {
            max-height: 50px;
            border-radius: 50%;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3), inset -2px -2px 1px white;
        }

        .navbar-nav .nav-link {
            color: #000;
            font-size: 1.4rem;
            font-weight: bold;
            font-family: Arial, sans-serif;
            transition: all 0.3s ease;
            margin-left: 20px;
            padding: 10px;
        }

        .navbar-nav .nav-link:hover {
            box-shadow: 2px 2px 2px red, inset -1px -1px 1px white, inset 2px 2px 1px red;
            border-top-left-radius: 10px;
            border-bottom-right-radius: 10px;
            background: black;

            color: red;

        }

        .navbar-toggler {
            border-color: #a6fdf4;
            font-size: 1rem;
            margin-left: 30px;

        }

        .navbar-toggler-icon {
            background-color: #a6fdf4;
            margin-right: 5px;
        }

        .navbar-collapse {
            justify-content: flex-end;
        }

        .form-control {
            background-color: #f0f0f0;
            border: 2px solid #ccc;
            color: #000;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            border-radius: 20px;
            font-weight: 600;
            width: 100%;
        }

        .btn-outline-success {
            border-color: #000;
            color: #000;
            font-weight: bold;
        }

        .btn-outline-success:hover {
            background-color: #000;
            color: #fff;
        }

        /* Custom styles */
        .navbar-content {
            display: flex;
            align-items: center;
        }

        /* Responsive styles */
        @media (max-width: 991.98px) {
            .navbar-nav {
                flex-direction: column;
                align-items: flex-start;
            }

            .navbar-nav .nav-item {
                margin-top: 10px;
            }

            .navbar-nav .nav-link {
                padding: 5px 0;
            }


        }

        .search-input {
            border-radius: 20px;

        }

        .suggestion-box {
            top: calc(100% + 1px);
            max-width: 100%;
            margin-left: 5%;
            max-height: 200px;
            overflow-y: auto;
            background: whitesmoke;
            border: 1px solid #ced4da;
            border-radius: 8px;
            box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.1);
        }

        .suggestion {
            cursor: pointer;
            padding: 10px;
            color: black;


        }

        .suggestion:hover {
            border: 2px solid red;
            color: red;
            font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
            font-weight: bold;


        }

        #suggestionsContainer {
            font-family: Verdana, Geneva, Tahoma, sans-serif;
        }
    </style>

</head>

<body>

    <div class="header">
        <!-- Bootstrap Navbar -->
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid">
                <!-- Navbar content -->
                <div class="navbar-content">
                    <!-- Logo -->
                    <a class="navbar-brand" href="#">
                        <img src="./img/Wlogo.png" alt="Logo" />
                    </a>

                    <!-- Search form -->
                    <form id="searchForm" class="d-flex flex-grow-1">
                        <input id="searchInput" class="form-control me-2" type="search" placeholder="Search Tools"
                            aria-label="Search" style="background:transparent; border: 2px solid white;" />
                        <button class="btn btn-outline-primary" type="submit" id="submit">
                            Search
                        </button>
                    </form>
                    <!-- Suggestions container to show auto-suggestions -->
                    <div id="suggestionsContainer" class="position-absolute start-0 suggestion-box  flex-grow-1"></div>
                    <!-- Navbar toggler for mobile -->
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fa-solid fa-bars fa-beat"></i>
                        <!-- Navicon -->
                    </button>
                </div>

                <!-- Navbar links -->
                <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                    <ul class="navbar-nav mb-2 mb-lg-0">
                        <!-- Your menus from the provided code -->
                        <li class="nav-item">
                            <a class="nav-link" href="index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./templates.php">Templates</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./create.php">Tools</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./guide.php">Guide</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./about.php">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./gallery.php">Gallery</a>
                        </li>
                    </ul>

                    <!-- User profile and logout -->
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="#" title="Comming Soon">
                                <i class="ri-account-circle-fill navr-icon-profile"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./logout.php">Logout</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- End Bootstrap Navbar -->

        <!-- Bootstrap JavaScript -->

    </div>

    <script>
        // List of suggestions
        const suggestions = ["wow editor", "wow background remover", "wow enhancer", "wow compressor", "wow result generator"];

        // Get references to the form and input field
        const form = document.getElementById('searchForm');
        const searchInput = document.getElementById('searchInput');

        // Suggestions container
        const suggestionsContainer = document.getElementById('suggestionsContainer');

        // Add event listener for input field keyup event
        searchInput.addEventListener('keyup', function () {
            const query = searchInput.value.trim().toLowerCase(); // Get search query and convert to lowercase
            const matchingSuggestions = getMatchingSuggestions(query); // Get matching suggestions
            displaySuggestions(matchingSuggestions); // Display matching suggestions
        });

        // Function to get matching suggestions based on the query
        function getMatchingSuggestions(query) {
            return suggestions.filter(suggestion => suggestion.toLowerCase().includes(query)); // Filter suggestions that include the query
        }

        // Function to display suggestions in the suggestions container
        function displaySuggestions(matchingSuggestions) {
            // Clear previous suggestions
            suggestionsContainer.innerHTML = '';

            // Display new suggestions, up to a maximum of 4
            for (let i = 0; i < Math.min(4, matchingSuggestions.length); i++) {
                const suggestion = matchingSuggestions[i];
                const suggestionElement = document.createElement('div');
                const suggestionHtml = highlightMatchingLetters(suggestion, searchInput.value.trim().toLowerCase());
                suggestionElement.innerHTML = suggestionHtml;
                suggestionElement.classList.add('suggestion');
                suggestionsContainer.appendChild(suggestionElement);

                // Add click event listener to suggestion
                suggestionElement.addEventListener('click', function () {
                    searchInput.value = suggestion; // Insert suggestion into search input
                    suggestionsContainer.style.display = 'none'; // Hide suggestions container after selecting a suggestion
                });
            }

            // Display suggestions container
            suggestionsContainer.style.display = matchingSuggestions.length ? 'block' : 'none';
        }

        // Function to highlight matching letters within a suggestion
        function highlightMatchingLetters(suggestion, query) {
            const index = suggestion.toLowerCase().indexOf(query);
            if (index !== -1) {
                const matchedPart = suggestion.substring(index, index + query.length);
                return suggestion.replace(matchedPart, `<strong>${matchedPart}</strong>`);
            }
            return suggestion;
        }

        // Function to handle form submission
        form.addEventListener('submit', function (event) {
            event.preventDefault(); // Prevent default form submission
            const query = searchInput.value.trim(); // Get search query

            // Perform redirection based on the query
            switch (query.toLowerCase()) {
                case 'wow editor':
                    window.location.href = 'createIdCard.php';
                    break;
                case 'wow background remover':
                    window.location.href = 'bgeraser.php';
                    break;

                case 'wow enhancer':
                    window.location.href = 'imageEnhancer.php';
                    break;
                case 'wow compressor':
                    window.location.href = 'Imagecompress.php';
                    break;

                case 'wow result generator':
                    window.location.href = 'result.php';
                    break;
                default:
                    // If no specific redirection, perform a general search (you can implement this part)
                    console.log("Perform search with query:", query);
                    break;
            }
        });

        // Add event listener to document to handle clicks outside the search box
        document.addEventListener('click', function (event) {
            const target = event.target;
            if (target !== searchInput && !suggestionsContainer.contains(target)) {
                suggestionsContainer.style.display = 'none'; // Hide suggestions container if clicked outside the search box or suggestions
            }
        });

    </script>


</body>

</html>