<!-- FOR AUTHORS -->
<?php

include "../include/connection.php";

$id = $_GET['id'];




$gettingdata = "DELETE  FROM template WHERE id=$id";
$result = mysqli_query($connect, $gettingdata);

if (!$result) {
  die("Error");
} else {
  header('Location:templateList.php');
}

?>

<!-- FOR PUBLICATION -->

<?php

$id = $_GET['id'];




$gettingdata = "DELETE  FROM publication WHERE id=$id";
$result = mysqli_query($connect, $gettingdata);

if (!$result) {
  die("Error");
} else {
  header('Location:publicationlist.php');
}

?>

<!-- FOR CATEGORIES -->

<?php

$id = $_GET['id'];




$gettingdata = "DELETE  FROM category WHERE id=$id";
$result = mysqli_query($connect, $gettingdata);

if (!$result) {
  die("Error");
} else {
  header('Location:categorylist.php');
}

?>
<!-- FOR BOOK  -->
<?php

$id = $_GET['id'];




$gettingdata = "DELETE  FROM book WHERE id=$id";
$result = mysqli_query($connect, $gettingdata);

if (!$result) {
  die("Error");
} else {
  header('Location:booklist.php');
}

?>