<?php
// Include database connection or any other necessary files
include("include/connection.php");

// Check if the query parameter is set
if (isset($_POST['query'])) {
    // Sanitize and escape the input to prevent SQL injection
    $query = mysqli_real_escape_string($connect, $_POST['query']);

    // Perform a database query to fetch limited suggestions based on the input
    $sql = "SELECT name FROM template WHERE name LIKE '%$query%' LIMIT 5"; // Limit suggestions to 5
    $result = mysqli_query($connect, $sql);

    // Check if there are any results
    if ($result && mysqli_num_rows($result) > 0) {
        // Output suggestions
        while ($row = mysqli_fetch_assoc($result)) {
            // Output suggestions in bold without brackets or inverted commas
            echo '<div class="autocomplete-item"><b>' . $row['name'] . '</b></div>';
        }
    } else {
        // Handle no suggestions found
        echo '<div class="autocomplete-item">No suggestions found</div>';
    }
}

// Close database connection
mysqli_close($connect);
?>